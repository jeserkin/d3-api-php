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
		$Result = $this->get( 'profile/' . $this->getClient()->getBattleTagName() . '-' . $this->getClient()->getBattleTagCode() . '/index' );

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

		$this->setFallenHeroes( $Profile, $Result->fallenHeroes );

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
	 * @link http://blizzard.github.com/d3-api-docs/#item-information
	 *
	 * @param string $itemPath
	 * @throws NotFoundException
	 * @return Data\Item\Item
	 */
	public function getItemInfo( $itemPath )
	{
		$Result = $this->get( 'data/' . trim( $itemPath ) );

		if ( null === $Result )
		{
			throw new NotFoundException( 'No result returned' );
		}

		if ( isset( $Result->code ) )
		{
			throw new NotFoundException( Util::toSting( $Result->code ) . ' - ' . Util::toSting( $Result->reason ) );
		}

		$Item = new Data\Item\Item();

		$this->fillItem( $Item, $Result );

		$Item->setRequiredLevel( (int) $Result->requiredLevel );
		$Item->setItemLevel( (int) $Result->itemLevel );
		$Item->setBonusAffixes( (int) $Result->bonusAffixes );
		$Item->setTypeName( Util::toSting( $Result->typeName ) );
		$Item->setTypeId( Util::toSting( $Result->type->id ) );
		$Item->setTwoHanded( (bool) $Result->type->twoHanded );

		if ( isset( $Result->armor ) )
		{
			$Item->setArmor( $this->fetchMinMax( $Result->armor->min, $Result->armor->max ) );
		}

		if ( isset( $Result->dps ) )
		{
			$Item->setDps( $this->fetchMinMax( $Result->dps->min, $Result->dps->max ) );
		}

		if ( isset( $Result->attacksPerSecond ) )
		{
			$Item->setAttacksPerSecond( $this->fetchMinMax( $Result->attacksPerSecond->min, $Result->attacksPerSecond->max ) );
		}

		if ( isset( $Result->minDamage ) )
		{
			$Item->setMinDamage( $this->fetchMinMax( $Result->minDamage->min, $Result->minDamage->max ) );
		}

		if ( isset( $Result->maxDamage ) )
		{
			$Item->setMaxDamage( $this->fetchMinMax( $Result->maxDamage->min, $Result->maxDamage->max ) );
		}

		$this->setItemAttributes( $Item, $Result->attributes );
		$this->setItemAttributesRaw( $Item, $Result->attributesRaw );

		// @todo Need info about "socketEffects" section

		$this->setItemSalvage( $Item, $Result->salvage );
		$this->setItemGems( $Item, $Result->gems );

		return $Item;
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#follower-information
	 *
	 * @return Data\Follower\Follower
	 */
	public function getEnchantressInfo()
	{
		return $this->getFollowerInfo( 'enchantress' );
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#follower-information
	 *
	 * @return Data\Follower\Follower
	 */
	public function getTemplarInfo()
	{
		return $this->getFollowerInfo( 'templar' );
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#follower-information
	 *
	 * @return Data\Follower\Follower
	 */
	public function getScoundrelInfo()
	{
		return $this->getFollowerInfo( 'scoundrel' );
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#follower-information
	 *
	 * @param string $slug
	 * @throws NotFoundException
	 * @return Data\Follower\Follower
	 */
	public function getFollowerInfo( $slug )
	{
		$Result = $this->get( 'data/follower/' . trim( $slug ) );

		if ( null === $Result )
		{
			throw new NotFoundException( 'No result returned' );
		}

		if ( isset( $Result->code ) )
		{
			throw new NotFoundException( Util::toSting( $Result->code ) . ' - ' . Util::toSting( $Result->reason ) );
		}

		$Follower = new Data\Follower\Follower();

		$Follower->setSlug( Util::toSting( $Result->slug ) );
		$Follower->setName( Util::toSting( $Result->name ) );
		$Follower->setRealName( Util::toSting( $Result->realName ) );
		$Follower->setPortrait( Util::toSting( $Result->portrait ) );

		$this->setSkills( $Follower, $Result->skills->active, 'active' );
		$this->setSkills( $Follower, $Result->skills->passive, 'passive' );

		return $Follower;
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#artisan-information
	 *
	 * @return Data\Artisan\Artisan
	 */
	public function getBlacksmithInfo()
	{
		return $this->getArtisanInfo( 'blacksmith' );
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#artisan-information
	 *
	 * @return Data\Artisan\Artisan
	 */
	public function getJewelerInfo()
	{
		return $this->getArtisanInfo( 'jeweler' );
	}

	/**
	 * @link http://blizzard.github.com/d3-api-docs/#artisan-information
	 *
	 * @param string $slug
	 * @throws NotFoundException
	 * @return Data\Artisan\Artisan
	 */
	public function getArtisanInfo( $slug )
	{
		$Result = $this->get( 'data/artisan/' . trim( $slug ) );

		if ( null === $Result )
		{
			throw new NotFoundException( 'No result returned' );
		}

		if ( isset( $Result->code ) )
		{
			throw new NotFoundException( Util::toSting( $Result->code ) . ' - ' . Util::toSting( $Result->reason ) );
		}

		$Artisan = new Data\Artisan\Artisan();

		$Artisan->setSlug( Util::toSting( $Result->slug ) );
		$Artisan->setName( Util::toSting( $Result->name ) );
		$Artisan->setPortrait( Util::toSting( $Result->portrait ) );

		$ArtisanTiers = new ArrayCollection();

		foreach ( $Result->training->tiers as $ArtisanTier )
		{
			$Tier       = new Data\Artisan\Tier\Tier();
			$TierLevels = new ArrayCollection();

			$Tier->setTierNumber( (int) $ArtisanTier->tier );

			foreach ( $ArtisanTier->levels as $ArtisanTierLevel )
			{
				$Level = new Data\Artisan\Tier\Level();

				$Level->setTierNumber( (int) $ArtisanTierLevel->tier );
				$Level->setTierLevel( (int) $ArtisanTierLevel->tierLevel );
				$Level->setPercet( (int) $ArtisanTierLevel->percent );
				$Level->setUpgradeCost( (int) $ArtisanTierLevel->upgradeCost );

				$this->setRecipes( $Level, $ArtisanTierLevel->trainedRecipes, 'trained' );
				$this->setRecipes( $Level, $ArtisanTierLevel->taughtRecipes, 'taught' );

				if ( isset( $ArtisanTierLevel->upgradeItems ) )
				{
					$this->setUpgradeItems( $Level, $ArtisanTierLevel->upgradeItems );
				}

				$TierLevels->set( $Level->getTierLevel(), $Level );
			}

			$Tier->setLevels( $TierLevels );
			$ArtisanTiers->set( $Tier->getTierNumber(), $Tier );
		}

		$Artisan->setTiers( $ArtisanTiers );

		return $Artisan;
	}

	/**
	 * @param int $min
	 * @param int $max
	 * @return ArrayCollection
	 */
	private function fetchMinMax( $min, $max )
	{
		$Object      = new ArrayCollection();
		$minReturned = (int) $min;
		$maxReturned = (int) $max;

		if ( is_float( $min ) )
		{
			$minReturned = (float) $min;
		}

		if ( is_float( $max ) )
		{
			$maxReturned = (float) $max;
		}

		$Object->set( 'min', $minReturned );
		$Object->set( 'max', $maxReturned );

		return $Object;
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
	 * @param Data\Hero|Data\Follower $Character
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
			$Item         = new Data\Hero\Item();

			$this->fillItem( $Item, $BodyPartItem );
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
		$Stats = $this->getStatsSimple( $StatsItem );

		$Stats->setAttackSpeed( (float) $StatsItem->attackSpeed );
		$Stats->setCritDamage( (float) $StatsItem->critDamage );
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

	/**
	 * @param \stdClass $StatsItem
	 * @return Data\Hero\Stats
	 */
	private function getStatsSimple( $StatsItem )
	{
		$Stats = new Data\Hero\Stats();

		$Stats->setLife( (int) $StatsItem->life );
		$Stats->setDamage( (float) $StatsItem->damage );
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
		$Stats->setDamageIncrease( (float) $StatsItem->damageIncrease );
		$Stats->setCritChance( (float) $StatsItem->critChance );
		$Stats->setDamageReduction( (float) $StatsItem->damageReduction );

		return $Stats;
	}

	/**
	 * @param Data\Item\Item|Data\Item\Gem $Item
	 * @param \stdClass $ItemAttributes
	 */
	private function setItemAttributes( $Item, $ItemAttributes )
	{
		$Attributes = new ArrayCollection();

		foreach ( $ItemAttributes as $ItemAttribute )
		{
			$Attributes->add( Util::toSting( $ItemAttribute ) );
		}

		$Item->setAttributes( $Attributes );
	}

	/**
	 * @param Data\Item\Item|Data\Item\Gem $Item
	 * @param \stdClass $ItemAttributesRaw
	 */
	private function setItemAttributesRaw( $Item, $ItemAttributesRaw )
	{
		$AttributesRaw = new ArrayCollection();

		foreach ( $ItemAttributesRaw as $itemAttributeRawName => $ItemAttributeRaw )
		{
			$AttributesRaw->set( Util::toSting( $itemAttributeRawName ), $this->fetchMinMax( $ItemAttributeRaw->min, $ItemAttributeRaw->max ) );
		}

		$Item->setAttributesRaw( $AttributesRaw );
	}

	/**
	 * @param Data\Item\Item $Item
	 * @param \stdClass $SalvageItemsList
	 */
	private function setItemSalvage( Data\Item\Item $Item, $SalvageItemsList )
	{
		$Salvage = new ArrayCollection();

		foreach ( $SalvageItemsList as $ListItem )
		{
			$SalvageItem = new Data\Item\SalvageItem();

			$SalvageItem->setChance( (int) $ListItem->chance );
			$SalvageItem->setQuantity( (int) $ListItem->quantity );

			$SalvagedItem = new Data\Item();
			$this->fillItem( $SalvagedItem, $ListItem->item );

			$SalvageItem->setItem( $Item );
			$Salvage->add( $SalvageItem );
		}

		$Item->setSalvage( $Salvage );
	}

	/**
	 * @param Data\Item $Item
	 * @param \stdClass $ExtractionItem
	 */
	private function fillItem( Data\Item $Item, $ExtractionItem )
	{
		$Item->setId( Util::toSting( $ExtractionItem->id ) );
		$Item->setName( Util::toSting( $ExtractionItem->name ) );
		$Item->setIcon( Util::toSting( $ExtractionItem->icon ) );
		$Item->setDisplayColor( Util::toSting( $ExtractionItem->displayColor ) );
		$Item->setTooltipParams( Util::toSting( $ExtractionItem->tooltipParams ) );
	}

	/**
	 * @param Data\Item\Item $Item
	 * @param \stdClass $ItemGems
	 */
	private function setItemGems( Data\Item\Item $Item, $ItemGems )
	{
		$Gems = new ArrayCollection();

		foreach ( $ItemGems as $ItemGem )
		{
			$Gem     = new Data\Item\Gem();
			$GemItem = new Data\Item();

			$this->fillItem( $GemItem, $ItemGem->item );
			$Gem->setItem( $GemItem );

			$this->setItemAttributesRaw( $Gem, $ItemGem->attributesRaw );
			$this->setItemAttributes( $Gem, $ItemGem->attributes );

			$Gems->add( $Gem );
		}

		$Item->setGems( $Gems );
	}

	/**
	 * @param Data\Artisan\Tier\Level $Level
	 * @param \stdClass $Recipes
	 * @param string $type
	 * @throws NotFoundException
	 * @return void
	 */
	private function setRecipes( Data\Artisan\Tier\Level $Level, $Recipes, $type )
	{
		$RecipesList = new ArrayCollection();

		foreach ( $Recipes as $RecipeItem )
		{
			$Recipe = new Data\Artisan\Recipe();

			$Recipe->setSlug( Util::toSting( $RecipeItem->slug ) );
			$Recipe->setName( Util::toSting( $RecipeItem->name ) );
			$Recipe->setCost( (int) $RecipeItem->cost );

			$Reagents = new ArrayCollection();

			foreach ( $RecipeItem->reagents as $ReagentItem )
			{
				$Reagent = new Data\Artisan\Tier\Reagent();
				$Reagent->setQuantity( (int) $ReagentItem->quantity );

				$Item = new Data\Item();
				$this->fillItem( $Item, $ReagentItem->item );
				$Reagent->setItem( $Item );

				$Reagents->add( $Reagent );
			}

			$Recipe->setReagents( $Reagents );

			$Item = new Data\Item();
			$this->fillItem( $Item, $RecipeItem->itemProduced );
			$Recipe->setItemProduced( $Item );

			$RecipesList->add( $Recipe );
		}

		$method = 'set' . ucfirst( $type ) . 'Recipes';

		if ( ! method_exists( $Level, $method ) )
		{
			throw new NotFoundException( "No method with name '{$method}' in class '" . get_class( $Level ) . "'!" );
		}

		$Level->$method( $RecipesList );
	}

	/**
	 * @param Data\Artisan\Tier\Level $Level
	 * @param \stdClass $UpgradeItems
	 */
	private function setUpgradeItems( Data\Artisan\Tier\Level $Level, $UpgradeItems )
	{
		$UpgradeItemsList = new ArrayCollection();

		foreach ( $UpgradeItems as $UpgradeItemRow )
		{
			$UpgradeItem = new Data\Artisan\Tier\UpgradeItem();
			$UpgradeItem->setQuantity( (int) $UpgradeItemRow->quantity );

			$Item = new Data\Item();
			$this->fillItem( $Item, $UpgradeItemRow->item );
			$UpgradeItem->setItem( $Item );

			$UpgradeItemsList->add( $UpgradeItem );
		}

		$Level->setUpgradeItems( $UpgradeItemsList );
	}

	/**
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $FallenHeroes
	 */
	private function setFallenHeroes( Data\Profile\Profile $Profile, $FallenHeroes )
	{
		$FallenHeroesList = new ArrayCollection();

		foreach ( $FallenHeroes as $FallenHeroeRow )
		{
			$Hero = new Data\Hero\Hero();

			$Hero->setStats( $this->getStatsSimple( $FallenHeroeRow->stats ) );
			$Hero->setEliteKills( (int) $FallenHeroeRow->kills->elites );

			$this->setItems( $Hero, $FallenHeroeRow->items );

			$Hero->setDead( true );
			$Hero->setKilledBy( (int) $FallenHeroeRow->death->killer );
			$Hero->setKilledAt( (int) $FallenHeroeRow->death->location );
			$Hero->setKilledWhen( (int) $FallenHeroeRow->death->time );
			$Hero->setName( Util::toSting( $FallenHeroeRow->name ) );
			$Hero->setLevel( (int) $FallenHeroeRow->level );
			$Hero->setHardcore( (bool) $FallenHeroeRow->hardcore );
			$Hero->setGender( (int) $FallenHeroeRow->gender );
			$Hero->setClass( Util::toSting( $FallenHeroeRow->class ) );

			$FallenHeroesList->set( (int) $FallenHeroeRow->heroId, $Hero );
		}

		$Profile->setFallenHeroes( $FallenHeroesList );
	}
}
