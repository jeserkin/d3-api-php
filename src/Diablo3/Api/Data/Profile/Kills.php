<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Kills
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $monsters;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $elites;
	
	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("hardcoreMonsters")
	 * @var int
	 */
	private $hardcoreMonsters;

	/**
	 * @return int
	 */
	public function getMonsters()
	{
		return $this->monsters;
	}

	/**
	 * @return int
	 */
	public function getElites()
	{
		return $this->elites;
	}
	
	/**
	 * @return int
	 */
	public function getHardcoreMonsters()
	{
		return $this->hardcoreMonsters;
	}
}