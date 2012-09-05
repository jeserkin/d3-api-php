<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Hero;

use Diablo3\Api\Data\ArrayCollection,
	Diablo3\Api\Data\Hero\Stats;

class Hero extends \Diablo3\Api\Data\Hero
{
	/**
	 * @var ArrayCollection
	 */
	private $skills;

	/**
	 * @var ArrayCollection
	 */
	private $items;

	/**
	 * @var ArrayCollection
	 */
	private $followers;

	/**
	 * @var Stats
	 */
	private $stats;

	/**
	 * @var int
	 */
	private $eliteKills;

	/**
	 * @var ArrayCollection
	 */
	private $progress;

	public function __construct()
	{
		$this->skills = new ArrayCollection();
	}

	/**
	 * @param string $type
	 * @param ArrayCollection $Skills
	 * @return void
	 */
	public function addSkills( $type, ArrayCollection $Skills )
	{
		$this->skills->set( $type, $Skills );
	}

	/**
	 * @return ArrayCollection
	 */
	public function getSkills()
	{
		return $this->skills;
	}

	/**
	 * @param ArrayCollection $Items
	 */
	public function setItems( ArrayCollection $Items )
	{
		$this->items = $Items;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param ArrayCollection $Followers
	 */
	public function setFollowers( $Followers )
	{
		$this->followers = $Followers;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getFollowers()
	{
		return $this->followers;
	}

	/**
	 * @param Stats $Stats
	 */
	public function setStats( $Stats )
	{
		$this->stats = $Stats;
	}

	/**
	 * @return Stats
	 */
	public function getStats()
	{
		return $this->stats;
	}

	/**
	 * @param int $eliteKills
	 */
	public function setEliteKills( $eliteKills )
	{
		$this->eliteKills = $eliteKills;
	}

	/**
	 * @return int
	 */
	public function getEliteKills()
	{
		return $this->eliteKills;
	}

	/**
	 * @param ArrayCollection $Progress
	 */
	public function setProgress( $Progress )
	{
		$this->progress = $Progress;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getProgress()
	{
		return $this->progress;
	}
}
