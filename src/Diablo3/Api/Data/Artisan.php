<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data;

class Artisan
{
	const
		BLACKSMITH = 'blacksmith',
		JEWELER    = 'jeweler';

	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var array
	 */
	private $specialities = array(
		self::BLACKSMITH => 'Blacksmith',
		self::JEWELER    => 'Jeweler',
	);

	/**
	 * @var int
	 */
	private $level;

	/**
	 * @var int
	 */
	private $stepCurrent;

	/**
	 * @var int
	 */
	private $stepMax;

	/**
	 * @param string $slug
	 */
	public function setSlug( $slug )
	{
		$this->slug = $slug;
	}

	/**
	 * @param bool $formated
	 * @return string
	 */
	public function getSlug( $formated = false )
	{
		if ( $formated && isset( $this->specialities[ $this->slug ] ) )
		{
			return $this->specialities[ $this->slug ];
		}

		return $this->slug;
	}

	/**
	 * @param int $level
	 */
	public function setLevel( $level )
	{
		$this->level = $level;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param int $stepCurrent
	 */
	public function setStepCurrent( $stepCurrent )
	{
		$this->stepCurrent = $stepCurrent;
	}

	/**
	 * @return int
	 */
	public function getStepCurrent()
	{
		return $this->stepCurrent;
	}

	/**
	 * @param int $stepMax
	 */
	public function setStepMax( $stepMax )
	{
		$this->stepMax = $stepMax;
	}

	/**
	 * @return int
	 */
	public function getStepMax()
	{
		return $this->stepMax;
	}
}

