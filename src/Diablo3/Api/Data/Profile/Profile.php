<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS,
	
	DateTime;

class Profile
{
	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("battleTag")
	 * @var string
	 */
	private $battleTag;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevel")
	 * @var int
	 */
	private $paragonLevel;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevelHardcore")
	 * @var int
	 */
	private $paragonLevelHardcore;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevelSeason")
	 * @var int
	 */
	private $paragonLevelSeason;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevelSeasonHardcore")
	 * @var int
	 */
	private $paragonLevelSeasonHardcore;

	/**
     * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Profile\Hero>")
	 * @var \Doctrine\Common\Collections\ArrayCollection
     */
	private $heroes;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("lastHeroPlayed")
	 * @var int
	 */
	private $lastHeroPlayed;

	/**
	 * @JMS\Type("integer")
	 * @JMS\Accessor(getter="getLastUpdated", setter="setLastUpdated")
	 * @JMS\SerializedName("lastUpdated")
	 * @var \DateTime
	 */
	private $lastUpdated;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Kills")
	 * @var \Diablo3\Api\Data\Profile\Kills
	 */
	private $kills;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("highestHardcoreLevel")
	 * @var int
	 */
	private $highestHardcoreLevel;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\TimePlayed")
	 * @JMS\SerializedName("timePlayed")
	 * @var \Diablo3\Api\Data\Profile\TimePlayed
	 */
	private $timePlayed;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Progression")
	 * @var \Diablo3\Api\Data\Profile\Progression
	 */
	private $progression;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Profile\FallenHero>")
	 * @JMS\SerializedName("fallenHeroes")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $fallenHeroes;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Blacksmith")
	 * @var \Diablo3\Api\Data\Profile\Blacksmith
	 */
	private $blacksmith;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Jeweler")
	 * @var \Diablo3\Api\Data\Profile\Jeweler
	 */
	private $jeweler;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Mystic")
	 * @var \Diablo3\Api\Data\Profile\Mystic
	 */
	private $mystic;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Blacksmith")
	 * @JMS\SerializedName("blacksmithHardcore")
	 * @var \Diablo3\Api\Data\Profile\Blacksmith
	 */
	private $blacksmithHardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Jeweler")
	 * @JMS\SerializedName("jewelerHardcore")
	 * @var \Diablo3\Api\Data\Profile\Jeweler
	 */
	private $jewelerHardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Mystic")
	 * @JMS\SerializedName("mysticHardcore")
	 * @var \Diablo3\Api\Data\Profile\Mystic
	 */
	private $mysticHardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Blacksmith")
	 * @JMS\SerializedName("blacksmithSeason")
	 * @var \Diablo3\Api\Data\Profile\Blacksmith
	 */
	private $blacksmithSeason;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Jeweler")
	 * @JMS\SerializedName("jewelerSeason")
	 * @var \Diablo3\Api\Data\Profile\Jeweler
	 */
	private $jewelerSeason;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Mystic")
	 * @JMS\SerializedName("mysticSeason")
	 * @var \Diablo3\Api\Data\Profile\Mystic
	 */
	private $mysticSeason;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Blacksmith")
	 * @JMS\SerializedName("blacksmithSeasonHardcore")
	 * @var \Diablo3\Api\Data\Profile\Blacksmith
	 */
	private $blacksmithSeasonHardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Jeweler")
	 * @JMS\SerializedName("jewelerSeasonHardcore")
	 * @var \Diablo3\Api\Data\Profile\Jeweler
	 */
	private $jewelerSeasonHardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Mystic")
	 * @JMS\SerializedName("mysticSeasonHardcore")
	 * @var \Diablo3\Api\Data\Profile\Mystic
	 */
	private $mysticSeasonHardcore;

	/**
	 * @JMS\Type("ArrayCollection<string, Diablo3\Api\Data\Profile\Season>")
	 * @JMS\SerializedName("seasonalProfiles")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $seasonalProfiles;

	/**
	 * @return string
	 */
	public function getBattleTag()
	{
		return $this->battleTag;
	}

	/**
	 * @return int
	 */
	public function getParagonLevel()
	{
		return $this->paragonLevel;
	}

	/**
	 * @return int
	 */
	public function getParagonLevelHardcore()
	{
		return $this->paragonLevelHardcore;
	}

	/**
	 * @return int
	 */
	public function getParagonLevelSeason()
	{
		return $this->paragonLevelSeason;
	}

	/**
	 * @return int
	 */
	public function getParagonLevelSeasonHardcore()
	{
		return $this->paragonLevelSeasonHardcore;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getHeroes()
	{
		return $this->heroes;
	}

	/**
	 * @return int
	 */
	public function getLastHeroPlayed()
	{
		return $this->lastHeroPlayed;
	}
	
	/**
	 * @param int $lastUpdated
	 */
	public function setLastUpdated( $lastUpdated )
	{
		$this->lastUpdated = new DateTime();
		$this->lastUpdated->setTimestamp( $lastUpdated );
	}

	/**
	 * @return \DateTime
	 */
	public function getLastUpdated()
	{
		return $this->lastUpdated;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Kills
	 */
	public function getKills()
	{
		return $this->kills;
	}

	/**
	 * @return int
	 */
	public function getHighestHardcoreLevel()
	{
		return $this->highestHardcoreLevel;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\TimePlayed
	 */
	public function getTimePlayed()
	{
		return $this->timePlayed;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Progression
	 */
	public function getProgression()
	{
		return $this->progression;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getFallenHeroes()
	{
		return $this->fallenHeroes;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Blacksmith
	 */
	public function getBlacksmith()
	{
		return $this->blacksmith;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Jeweler
	 */
	public function getJeweler()
	{
		return $this->jeweler;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Mystic
	 */
	public function getMystic()
	{
		return $this->mystic;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Blacksmith
	 */
	public function getBlacksmithHardcore()
	{
		return $this->blacksmithHardcore;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Jeweler
	 */
	public function getJewelerHardcore()
	{
		return $this->jewelerHardcore;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Mystic
	 */
	public function getMysticHardcore()
	{
		return $this->mysticHardcore;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Blacksmith
	 */
	public function getBlacksmithSeason()
	{
		return $this->blacksmithSeason;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Jeweler
	 */
	public function getJewelerSeason()
	{
		return $this->jewelerSeason;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Mystic
	 */
	public function getMysticSeason()
	{
		return $this->mysticSeason;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Blacksmith
	 */
	public function getBlacksmithSeasonHardcore()
	{
		return $this->blacksmithSeasonHardcore;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Jeweler
	 */
	public function getJewelerSeasonHardcore()
	{
		return $this->jewelerSeasonHardcore;
	}
	
	/**
	 * @return \Diablo3\Api\Data\Profile\Mystic
	 */
	public function getMysticSeasonHardcore()
	{
		return $this->mysticSeasonHardcore;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getSeasonalProfiles()
	{
		return $this->seasonalProfiles;
	}
}