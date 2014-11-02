<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Kills
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $elites;

	/**
	 * @return int
	 */
	public function getElites()
	{
		return $this->elites;
	}
}