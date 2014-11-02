<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Follower
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $slug;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $level;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Follower\Items")
	 * @var \Diablo3\Api\Data\Hero\Follower\Items
	 */
	private $items;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Follower\Stats")
	 * @var \Diablo3\Api\Data\Hero\Follower\Stats
	 */
	private $stats;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Hero\Follower\Skill>")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $skills;

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Follower\Items
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Follower\Stats
	 */
	public function getStats()
	{
		return $this->stats;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getSkills()
	{
		return $this->skills;
	}
}