<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api;

use Diablo3\Api\Data,
Diablo3\Api\Data\ArrayCollection,
Diablo3\Util\Util,
Diablo3\Exception\NotFoundException;

class Profile extends AbstractApi
{
	/**
	 * @link http://blizzard.github.com/d3-api-docs/#career-profile
	 *
	 * @throws NotFoundException
	 * @return Data\Profile\Profile
	 */
	public function getProfileInfo()
	{
		$Result = $this->get( 'profile/' . $this->getClient()->getBattleTagName() . '-' . $this->getClient()->getBattleTagCode() . '/' );

		if ( null === $Result )
		{
			throw new NotFoundException( 'No result returned' );
		}

		if ( isset( $Result->code ) )
		{
			throw new NotFoundException( Util::toSting( $Result->code ) . ' - ' . Util::toSting( $Result->reason ) );
		}

		$Profile = new Data\Profile\Profile();

		$this->setHeroes( $Profile, $Result );
		$Profile->setLastHeroPlayed( (int) $Result->lastHeroPlayed );
		$Profile->setLastUpdated( (int) $Result->lastUpdated );
		$this->setArtisans( $Profile, $Result );
		$this->setArtisans( $Profile, $Result, 'hardcore' );

		if ( isset( $Result->kills ) )
		{
			$this->setKills( $Profile, $Result->kills );
		}

		if ( isset( $Result->timePlayed ) )
		{
			$this->setTimePlayed( $Profile, $Result->timePlayed );
		}

		// @todo Need info about "fallenHeroes" section

		$Profile->setBattleTag( Util::toSting( $Result->battleTag ) );

		$this->setProgression( $Profile, $Result->progression );
		$this->setProgression( $Profile, $Result->hardcoreProgression, 'hardcore' );

		return $Profile;
	}

	/**
	 * http://blizzard.github.com/d3-api-docs/#hero-profile
	 *
	 * @param int $heroId
	 * @throws NotFoundException
	 * @return Data\Hero\Hero
	 */
	public function getHeroInfo( $heroId )
	{
		$Result = $this->get( 'profile/' . $this->getClient()->getBattleTagName() . '-' . $this->getClient()->getBattleTagCode() . '/hero/' . $heroId );

		if ( null === $Result )
		{
			throw new NotFoundException( 'No result returned' );
		}

		if ( isset( $Result->code ) )
		{
			throw new NotFoundException( Util::toSting( $Result->code ) . ' - ' . Util::toSting( $Result->reason ) );
		}

		$Hero = new Data\Hero\Hero();

		$Hero->setId( (int) $Result->id );
		$Hero->setName( Util::toSting( $Result->name ) );
		$Hero->setLevel( (int) $Result->level );
		$Hero->setHardcore( (bool) $Result->hardcore );
		$Hero->setParagonLevel( (int) $Result->paragonLevel );
		$Hero->setGender( (int) $Result->gender );
		$Hero->setDead( (bool) $Result->dead );
		$Hero->setClass( Util::toSting( $Result->class ) );

		$lastUpdated = 'last-updated';
		$Hero->setLastUpdated( (int) $Result->$lastUpdated );

		$this->setSkills( $Hero, $Result->skills->active, 'active' );
		$this->setSkills( $Hero, $Result->skills->passive, 'passive' );
		$this->setItems( $Hero, $Result->items );
		$this->setFollowers( $Hero, $Result->followers );
		$this->setStats( $Hero, $Result->stats );
		$Hero->setProgress( $this->fetchProgress( $Result->progress ) );

		$Hero->setEliteKills( (int) $Result->kills->elites );

		return $Hero;
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Progressions
	 * @param string|null $type
	 * @return void
	 */
	private function setProgression( Data\Profile\Profile $Profile, $Progressions, $type = null )
	{
		$Progression = new Data\Profile\Progression();
		$setType     = 'setProgression';

		if ( null !== $type )
		{
			$Progression->setType( $type );
			$setType = 'set' . ucfirst( $type ) . 'Progression';
		}

		$Progression->setDifficulties( $this->fetchProgress( $Progressions ) );
		$Profile->$setType( $Progression );
	}

	/**
	 * @param \stdClass $Progressions
	 * @return ArrayCollection
	 */
	private function fetchProgress( $Progressions )
	{
		$difficulties            = array_keys( get_object_vars( $Progressions ) );
		$ProgressionDifficulties = new ArrayCollection();

		foreach ( $difficulties as $difficulty )
		{
			$Acts          = new ArrayCollection();
			$actsIteration = 1;

			foreach ( $Progressions->$difficulty as $ActItem )
			{
				$Act = new Data\Profile\Act();
				$Act->setCompleted( (bool) $ActItem->completed );

				$Quests = new ArrayCollection();

				foreach ( $ActItem->completedQuests as $QuestItem )
				{
					$Quest = new Data\Profile\Quest();

					$Quest->setSlug( Util::toSting( $QuestItem->slug ) );
					$Quest->setName( Util::toSting( $QuestItem->name ) );

					$Quests->add( $Quest );
				}

				$Act->setCompletedQuests( $Quests );
				$Acts->set( $actsIteration, $Act );
				$actsIteration++;
			}

			$ProgressionDifficulties->set( $difficulty, $Acts );
		}

		return $ProgressionDifficulties;
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Timing
	 */
	private function setTimePlayed( Data\Profile\Profile $Profile, $Timing )
	{
		$Profile->setTimePlayedAsBarbarian( (float) $Timing->barbarian );

		$prop = 'demon-hunter';
		$Profile->setTimePlayedAsDemonHunter( (float) $Timing->$prop );
		$Profile->setTimePlayedAsMonk( (float) $Timing->monk );

		$prop = 'witch-doctor';
		$Profile->setTimePlayedAsWitchDoctor( (float) $Timing->$prop );
		$Profile->setTimePlayedAsWizard( (float) $Timing->wizard );
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Kills
	 */
	private function setKills( Data\Profile\Profile $Profile, $Kills )
	{
		$Profile->setMonstersKilled( (int) $Kills->monsters );
		$Profile->setElitesKilled( (int) $Kills->elites );
		$Profile->setHardcoreMonstersKilled( (int) $Kills->hardcoreMonsters );
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Result
	 */
	private function setHardcoreArtisans( Data\Profile\Profile $Profile, $Result )
	{
		$HardCoreArtisans = new ArrayCollection;

		if ( isset( $Result->hardcoreArtisans ) )
		{
			foreach ( $Result->hardcoreArtisans as $ArtisanItem )
			{
				$Artisan = new Data\Profile\Artisan();

				$Artisan->setSlug( Util::toSting( $ArtisanItem->slug ) );
				$Artisan->setLevel( (int) $ArtisanItem->level );
				$Artisan->setStepCurrent( (int) $ArtisanItem->stepCurrent );
				$Artisan->setStepMax( (int) $ArtisanItem->stepMax );

				$HardCoreArtisans->set( $Artisan->getSlug(), $Artisan );
			}
		}

		$Profile->setHardcoreArtisans( $HardCoreArtisans );
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Result
	 * @param string|null $type
	 * @return void
	 */
	private function setArtisans( Data\Profile\Profile $Profile, $Result, $type = null )
	{
		$NormalArtisans = new ArrayCollection;

		if ( isset( $Result->artisans ) )
		{
			foreach ( $Result->artisans as $ArtisanItem )
			{
				$Artisan = new Data\Profile\Artisan();

				$Artisan->setSlug( Util::toSting( $ArtisanItem->slug ) );
				$Artisan->setLevel( (int) $ArtisanItem->level );
				$Artisan->setStepCurrent( (int) $ArtisanItem->stepCurrent );
				$Artisan->setStepMax( (int) $ArtisanItem->stepMax );

				$NormalArtisans->set( $Artisan->getSlug(), $Artisan );
			}
		}

		$setType = 'setArtisans';

		if ( null !== $type )
		{
			$setType = 'set' . ucfirst( $type ) . 'Artisans';
		}

		$Profile->$setType( $NormalArtisans );
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Result
	 */
	private function setHeroes( Data\Profile\Profile $Profile, $Result )
	{
		$Heroes = new ArrayCollection();

		if ( isset( $Result->heroes ) )
		{
			foreach ( $Result->heroes as $HeroItem )
			{
				$Hero = new Data\Profile\Hero();

				$Hero->setId( (int) $HeroItem->id );
				$Hero->setName( Util::toSting( $HeroItem->name ) );
				$Hero->setLevel( (int) $HeroItem->level );
				$Hero->setHardcore( (bool) $HeroItem->hardcore );
				$Hero->setParagonLevel( (int) $HeroItem->paragonLevel );
				$Hero->setGender( (int) $HeroItem->gender );
				$Hero->setDead( (bool) $HeroItem->dead );
				$Hero->setClass( Util::toSting( $HeroItem->class ) );

				$lastUpdated = 'last-updated';
				$Hero->setLastUpdated( (int) $HeroItem->$lastUpdated );

				$Heroes->set( $Hero->getId(), $Hero );
			}
		}

		$Profile->setHeroes( $Heroes );
	}

	/**
	 * @param Data\Hero\Hero|Data\Hero\Follower $Character
	 * @param \stdClass $Skills
	 * @param string $type
	 */
	private function setSkills( $Character, $Skills, $type )
	{
		$SkillsList = new ArrayCollection();

		foreach ( $Skills as $SkillItem )
		{
			if ( ! isset( $SkillItem->skill ) )
			{
				continue;
			}

			$Skill = new Data\Hero\Skill();

			$Skill->setSlug( Util::toSting( $SkillItem->skill->slug ) );
			$Skill->setName( Util::toSting( $SkillItem->skill->name ) );
			$Skill->setIcon( Util::toSting( $SkillItem->skill->icon ) );
			$Skill->setTooltipUrl( Util::toSting( $SkillItem->skill->tooltipUrl ) );
			$Skill->setDescription( Util::toSting( $SkillItem->skill->description ) );
			$Skill->setLevel( (int) $SkillItem->skill->level );

			if ( isset( $SkillItem->skill->simpleDescription ) )
			{
				$Skill->setSimpleDescription( Util::toSting( $SkillItem->skill->simpleDescription ) );
			}

			if ( isset( $SkillItem->skill->flavor ) )
			{
				$Skill->setFlavor( Util::toSting( $SkillItem->skill->flavor ) );
			}

			$Skill->setSkillCalcId( Util::toSting( $SkillItem->skill->skillCalcId ) );

			if ( isset( $SkillItem->rune ) )
			{
				$Rune = new Data\Hero\Rune();

				$Rune->setSlug( Util::toSting( $SkillItem->rune->slug ) );
				$Rune->setType( Util::toSting( $SkillItem->rune->type ) );
				$Rune->setName( Util::toSting( $SkillItem->rune->name ) );
				$Rune->setLevel( (int) $SkillItem->rune->level );
				$Rune->setDescription( Util::toSting( $SkillItem->rune->description ) );
				$Rune->setSimpleDescription( Util::toSting( $SkillItem->rune->simpleDescription ) );
				$Rune->setTooltipParams( Util::toSting( $SkillItem->rune->tooltipParams ) );
				$Rune->setSkillCalcId( Util::toSting( $SkillItem->rune->skillCalcId ) );
				$Rune->setOrder( (int) $SkillItem->rune->order );

				$Skill->setRune( $Rune );
			}

			$SkillsList->add( $Skill );
		}

		$Character->addSkills( $type, $SkillsList );
	}

	/**
	 * @param Data\Hero\Hero|Data\Hero\Follower $Character
	 * @param \stdClass $Items
	 */
	private function setItems( $Character, $Items )
	{
		$bodyParts = array_keys( get_object_vars( $Items ) );
		$ItemsList = new ArrayCollection();

		foreach ( $bodyParts as $bodyPart )
		{
			$BodyPartItem = $Items->$bodyPart;

			$Item = new Data\Hero\Item();

			$Item->setId( (int) $BodyPartItem->id );
			$Item->setName( Util::toSting( $BodyPartItem->name ) );
			$Item->setIcon( Util::toSting( $BodyPartItem->icon ) );
			$Item->setDisplayColor( Util::toSting( $BodyPartItem->displayColor ) );
			$Item->setTooltipParams( Util::toSting( $BodyPartItem->tooltipParams ) );

			$ItemsList->set( $bodyPart, $Item );
		}

		$Character->setItems( $ItemsList );
	}

	/**
	 * @param Data\Hero\Hero $Hero
	 * @param \stdClass $Followers
	 */
	private function setFollowers( Data\Hero\Hero $Hero, $Followers )
	{
		$followersTitles = array_keys( get_object_vars( $Followers ) );
		$FollowersList   = new ArrayCollection();

		foreach ( $followersTitles as $followersTitle )
		{
			$FollowerCharacter = $Followers->$followersTitle;
			$Follower          = new Data\Hero\Follower();

			$Follower->setSlug( Util::toSting( $FollowerCharacter->slug ) );
			$Follower->setLevel( (int) $FollowerCharacter->level );

			$this->setItems( $Follower, $FollowerCharacter->items );
			$Follower->setGoldFind( (int) $FollowerCharacter->stats->goldFind );
			$Follower->setMagicFind( (int) $FollowerCharacter->stats->magicFind );
			$Follower->setExperienceBonus( (int) $FollowerCharacter->stats->experienceBonus );
			$this->setSkills( $Follower, $FollowerCharacter->skills, 'default' );

			$FollowersList->set( $Follower->getSlug(), $Follower );
		}

		$Hero->setFollowers( $FollowersList );
	}

	/**
	 * @param Data\Hero\Hero $Hero
	 * @param \stdClass $StatsItem
	 */
	private function setStats( Data\Hero\Hero $Hero, $StatsItem )
	{
		$Stats = new Data\Hero\Stats();

		$Stats->setLife( (int) $StatsItem->life );
		$Stats->setDamage( (float) $StatsItem->damage );
		$Stats->setAttackSpeed( (float) $StatsItem->attackSpeed );
		$Stats->setArmor( (int) $StatsItem->armor );
		$Stats->setStrength( (int) $StatsItem->strength );
		$Stats->setDexterity( (int) $StatsItem->dexterity );
		$Stats->setVitality( (int) $StatsItem->vitality );
		$Stats->setIntelligence( (int) $StatsItem->intelligence );
		$Stats->setPhysicalResist( (int) $StatsItem->physicalResist );
		$Stats->setFireResist( (int) $StatsItem->fireResist );
		$Stats->setColdResist( (int) $StatsItem->coldResist );
		$Stats->setLightningResist( (int) $StatsItem->lightningResist );
		$Stats->setPoisonResist( (int) $StatsItem->poisonResist );
		$Stats->setArcaneResist( (int) $StatsItem->arcaneResist );
		$Stats->setCritDamage( (float) $StatsItem->critDamage );
		$Stats->setDamageIncrease( (float) $StatsItem->damageIncrease );
		$Stats->setCritChance( (float) $StatsItem->critChance );
		$Stats->setDamageReduction( (float) $StatsItem->damageReduction );
		$Stats->setBlockChance( (float) $StatsItem->blockChance );
		$Stats->setThorns( (int) $StatsItem->thorns );
		$Stats->setLifeSteal( (float) $StatsItem->lifeSteal );
		$Stats->setLifePerKill( (int) $StatsItem->lifePerKill );
		$Stats->setGoldFind( (float) $StatsItem->goldFind );
		$Stats->setMagicFind( (float) $StatsItem->magicFind );
		$Stats->setBlockAmountMin( (int) $StatsItem->blockAmountMin );
		$Stats->setBlockAmountMax( (int) $StatsItem->blockAmountMax );
		$Stats->setLifeOnHit( (int) $StatsItem->lifeOnHit );
		$Stats->setPrimaryResource( (int) $StatsItem->primaryResource );
		$Stats->setSecondaryResource( (int) $StatsItem->secondaryResource );

		$Hero->setStats( $Stats );
	}
}
