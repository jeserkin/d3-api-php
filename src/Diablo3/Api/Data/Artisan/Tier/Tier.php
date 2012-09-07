<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Artisan\Tier;

use Diablo3\Api\Data\ArrayCollection;

class Tier
{
	/**
	 * @var int
	 */
	private $tierNumber;

	/**
	 * @var ArrayCollection
	 */
	private $levels;

	/**
	 * @param int $tierNumber
	 */
	public function setTierNumber( $tierNumber )
	{
		$this->tierNumber = $tierNumber;
	}

	/**
	 * @return int
	 */
	public function getTierNumber()
	{
		return $this->tierNumber;
	}

	/**
	 * @param ArrayCollection $Levels
	 */
	public function setLevels( ArrayCollection $Levels )
	{
		$this->levels = $Levels;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getLevels()
	{
		return $this->levels;
	}
}
