<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Season
{
	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("seasonId")
	 * @var int
	 */
	private $seasonId;
	
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
	 * @JMS\Type("Diablo3\Api\Data\Profile\Kills")
	 * @var \Diablo3\Api\Data\Profile\Kills
	 */
	private $kills;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\TimePlayed")
	 * @JMS\SerializedName("timePlayed")
	 * @var \Diablo3\Api\Data\Profile\TimePlayed
	 */
	private $timePlayed;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("highestHardcoreLevel")
	 * @var int
	 */
	private $highestHardcoreLevel;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Progression")
	 * @var \Diablo3\Api\Data\Profile\Progression
	 */
	private $progression;

	/**
	 * @return int
	 */
	public function getSeasonId()
	{
		return $this->seasonId;
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
	 * @return \Diablo3\Api\Data\Profile\Kills
	 */
	public function getKills()
	{
		return $this->kills;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\TimePlayed
	 */
	public function getTimePlayed()
	{
		return $this->timePlayed;
	}

	/**
	 * @return int
	 */
	public function getHighestHardcoreLevel()
	{
		return $this->highestHardcoreLevel;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Progression
	 */
	public function getProgression()
	{
		return $this->progression;
	}
}