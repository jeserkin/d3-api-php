<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Rune
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $slug;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $type;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $name;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $level;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $description;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("simpleDescription")
	 * @var string
	 */
	private $simpleDescription;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("tooltipParams")
	 * @var string
	 */
	private $tooltipParams;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("skillCalcId")
	 * @var string
	 */
	private $skillCalcId;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $order;

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getSimpleDescription()
	{
		return $this->simpleDescription;
	}

	/**
	 * @return string
	 */
	public function getTooltipParams()
	{
		return $this->tooltipParams;
	}

	/**
	 * @return string
	 */
	public function getSkillCalcId()
	{
		return $this->skillCalcId;
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return $this->order;
	}
}