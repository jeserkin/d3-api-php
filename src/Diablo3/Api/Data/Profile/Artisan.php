<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Artisan
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
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("stepCurrent")
	 * @var int
	 */
	private $stepCurrent;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("stepMax")
	 * @var int
	 */
	private $stepMax;

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
	 * @return int
	 */
	public function getStepCurrent()
	{
		return $this->stepCurrent;
	}

	/**
	 * @return int
	 */
	public function getStepMax()
	{
		return $this->stepMax;
	}
} 