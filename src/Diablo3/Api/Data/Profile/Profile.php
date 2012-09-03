<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Profile;

use Diablo3\Api\Data\ArrayCollection,
	Diablo3\Api\Data\Profile\Progression;

class Profile
{
	/**
	 * @var ArrayCollection
	 */
	private $heroes;

	/**
	 * @var int
	 */
	private $lastHeroPlayed;

	/**
	 * @var int
	 */
	private $lastUpdated;

	/**
	 * @var ArrayCollection
	 */
	private $artisans;

	/**
	 * @var ArrayCollection
	 */
	private $hardcoreArtisans;

	/**
	 * @var int
	 */
	private $monstersKilled;

	/**
	 * @var int
	 */
	private $elitesKilled;

	/**
	 * @var int
	 */
	private $hardcoreMonstersKilled;

	/**
	 * @var float
	 */
	private $timePlayedAsBarbarian;

	/**
	 * @var float
	 */
	private $timePlayedAsDemonHunter;

	/**
	 * @var float
	 */
	private $timePlayedAsMonk;

	/**
	 * @var float
	 */
	private $timePlayedAsWitchDoctor;

	/**
	 * @var float
	 */
	private $timePlayedAsWizard;

	/**
	 * @var ArrayCollection
	 */
	private $fallenHeroes;

	/**
	 * @var string
	 */
	private $battleTag;

	/**
	 * @var Data\Profile\Progression
	 */
	private $progression;

	/**
	 * @var Data\Profile\Progression
	 */
	private $hardcoreProgression;

	/**
	 * @param ArrayCollection $Heroes
	 */
	public function setHeroes( ArrayCollection $Heroes )
	{
		$this->heroes = $Heroes;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getHeroes()
	{
		return $this->heroes;
	}

	/**
	 * @param int $lastHeroPlayed
	 */
	public function setLastHeroPlayed( $lastHeroPlayed )
	{
		$this->lastHeroPlayed = $lastHeroPlayed;
	}

	/**
	 * @param bool $returnHero
	 * @return int|Hero
	 */
	public function getLastHeroPlayed( $returnHero = false )
	{
		if ( $returnHero && $this->heroes->hasKey( $this->lastHeroPlayed ) )
		{
			return $this->heroes->hasKey( $this->lastHeroPlayed );
		}

		return $this->lastHeroPlayed;
	}

	/**
	 * @param int $lastUpdated
	 */
	public function setLastUpdated( $lastUpdated )
	{
		$this->lastUpdated = $lastUpdated;
	}

	/**
	 * @param bool $formated
	 * @param string|null $format
	 * @return int|string
	 */
	public function getLastUpdated( $formated = false, $format = null )
	{
		if ( $formated )
		{
			if ( null !== $format )
			{
				$formatedDate = date( $format, $this->lastUpdated );
			}
			else
			{
				$formatedDate = date( 'Y-m-d H:i:s', $this->lastUpdated );
			}

			return $formatedDate;
		}

		return $this->lastUpdated;
	}

	/**
	 * @param ArrayCollection $Artisans
	 */
	public function setArtisans( ArrayCollection $Artisans )
	{
		$this->artisans = $Artisans;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getArtisans()
	{
		return $this->artisans;
	}

	/**
	 * @param ArrayCollection $HardcoreArtisans
	 */
	public function setHardcoreArtisans( ArrayCollection $HardcoreArtisans )
	{
		$this->hardcoreArtisans = $HardcoreArtisans;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getHardcoreArtisans()
	{
		return $this->hardcoreArtisans;
	}

	/**
	 * @param int $monstersKilled
	 */
	public function setMonstersKilled( $monstersKilled )
	{
		$this->monstersKilled = $monstersKilled;
	}

	/**
	 * @return int
	 */
	public function getMonstersKilled()
	{
		return $this->monstersKilled;
	}

	/**
	 * @param int $elitesKilled
	 */
	public function setElitesKilled( $elitesKilled )
	{
		$this->elitesKilled = $elitesKilled;
	}

	/**
	 * @return int
	 */
	public function getElitesKilled()
	{
		return $this->elitesKilled;
	}

	/**
	 * @param int $hardcoreMonstersKilled
	 */
	public function setHardcoreMonstersKilled( $hardcoreMonstersKilled )
	{
		$this->hardcoreMonstersKilled = $hardcoreMonstersKilled;
	}

	/**
	 * @return int
	 */
	public function getHardcoreMonstersKilled()
	{
		return $this->hardcoreMonstersKilled;
	}

	/**
	 * @param float $timePlayedAsBarbarian
	 */
	public function setTimePlayedAsBarbarian( $timePlayedAsBarbarian )
	{
		$this->timePlayedAsBarbarian = $timePlayedAsBarbarian;
	}

	/**
	 * @return float
	 */
	public function getTimePlayedAsBarbarian()
	{
		return $this->timePlayedAsBarbarian;
	}

	/**
	 * @param float $timePlayedAsDemonHunter
	 */
	public function setTimePlayedAsDemonHunter( $timePlayedAsDemonHunter )
	{
		$this->timePlayedAsDemonHunter = $timePlayedAsDemonHunter;
	}

	/**
	 * @return float
	 */
	public function getTimePlayedAsDemonHunter()
	{
		return $this->timePlayedAsDemonHunter;
	}

	/**
	 * @param float $timePlayedAsMonk
	 */
	public function setTimePlayedAsMonk( $timePlayedAsMonk )
	{
		$this->timePlayedAsMonk = $timePlayedAsMonk;
	}

	/**
	 * @return float
	 */
	public function getTimePlayedAsMonk()
	{
		return $this->timePlayedAsMonk;
	}

	/**
	 * @param float $timePlayedAsWitchDoctor
	 */
	public function setTimePlayedAsWitchDoctor( $timePlayedAsWitchDoctor )
	{
		$this->timePlayedAsWitchDoctor = $timePlayedAsWitchDoctor;
	}

	/**
	 * @return float
	 */
	public function getTimePlayedAsWitchDoctor()
	{
		return $this->timePlayedAsWitchDoctor;
	}

	/**
	 * @param float $timePlayedAsWizard
	 */
	public function setTimePlayedAsWizard( $timePlayedAsWizard )
	{
		$this->timePlayedAsWizard = $timePlayedAsWizard;
	}

	/**
	 * @return float
	 */
	public function getTimePlayedAsWizard()
	{
		return $this->timePlayedAsWizard;
	}

	/**
	 * @param ArrayCollection $FallenHeroes
	 */
	public function setFallenHeroes( ArrayCollection $FallenHeroes )
	{
		$this->fallenHeroes = $FallenHeroes;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getFallenHeroes()
	{
		return $this->fallenHeroes;
	}

	/**
	 * @param string $battleTag
	 */
	public function setBattleTag( $battleTag )
	{
		$this->battleTag = $battleTag;
	}

	/**
	 * @return string
	 */
	public function getBattleTag()
	{
		return $this->battleTag;
	}

	/**
	 * @param Progression $Progression
	 */
	public function setProgression( Progression $Progression )
	{
		$this->progression = $Progression;
	}

	/**
	 * @return Progression
	 */
	public function getProgression()
	{
		return $this->progression;
	}

	/**
	 * @param Progression $HardcoreProgression
	 */
	public function setHardcoreProgression( Progression $HardcoreProgression )
	{
		$this->hardcoreProgression = $HardcoreProgression;
	}

	/**
	 * @return Progression
	 */
	public function getHardcoreProgression()
	{
		return $this->hardcoreProgression;
	}
}
