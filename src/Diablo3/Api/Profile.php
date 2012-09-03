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
	 * @link http://blizzard.github.com/d3-api-docs/#career-profile/career-profile-example
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
	 * @param Data\Profile\Profile $Profile
	 * @param \stdClass $Progressions
	 * @param string|null $type
	 * @return void
	 */
	private function setProgression( Data\Profile\Profile $Profile, $Progressions, $type = null )
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
				$Act->setCompleted( $ActItem->completed );

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

		$Progression = new Data\Profile\Progression();
		$setType     = 'setProgression';

		if ( null !== $type )
		{
			$Progression->setType( $type );
			$setType = 'set' . ucfirst( $type ) . 'Progression';
		}

		$Progression->setDifficulties( $ProgressionDifficulties );
		$Profile->$setType( $Progression );
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
}
