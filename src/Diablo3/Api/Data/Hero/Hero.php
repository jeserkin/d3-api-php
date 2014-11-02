<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS,

	Diablo3\Api\Data\Profile;

class Hero extends Profile\Hero
{
	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("seasonCreated")
	 * @var int
	 */
	private $seasonCreated;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Skills")
	 * @var \Diablo3\Api\Data\Hero\Skills
	 */
	private $skills;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Items")
	 * @var \Diablo3\Api\Data\Profile\Items
	 */
	private $items;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Followers")
	 * @var \Diablo3\Api\Data\Hero\Followers
	 */
	private $followers;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Stats")
	 * @var \Diablo3\Api\Data\Hero\Stats
	 */
	private $stats;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Kills")
	 * @var \Diablo3\Api\Data\Hero\Kills
	 */
	private $kills;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Progression")
	 * @var \Diablo3\Api\Data\Hero\Progression
	 */
	private $progression;

	/**
	 * @return int
	 */
	public function getSeasonCreated()
	{
		return $this->seasonCreated;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Skills
	 */
	public function getSkills()
	{
		return $this->skills;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Items
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Followers
	 */
	public function getFollowers()
	{
		return $this->followers;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Stats
	 */
	public function getStats()
	{
		return $this->stats;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Kills
	 */
	public function getKills()
	{
		return $this->kills;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Progression
	 */
	public function getProgression()
	{
		return $this->progression;
	}
}