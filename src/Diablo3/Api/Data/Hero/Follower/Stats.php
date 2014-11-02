<?php
namespace Diablo3\Api\Data\Hero\Follower;

use JMS\Serializer\Annotation as JMS;

class Stats
{
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("goldFind")
	 * @var float
	 */
	private $goldFind;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("magicFind")
	 * @var float
	 */
	private $magicFind;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("experienceBonus")
	 * @var int
	 */
	private $experienceBonus;

	/**
	 * @return float
	 */
	public function getGoldFind()
	{
		return $this->goldFind;
	}

	/**
	 * @return float
	 */
	public function getMagicFind()
	{
		return $this->magicFind;
	}

	/**
	 * @return int
	 */
	public function getExperienceBonus()
	{
		return $this->experienceBonus;
	}
}