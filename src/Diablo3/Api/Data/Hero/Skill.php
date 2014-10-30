<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Skill
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
	private $name;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $icon;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $level;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("categorySlug")
	 * @var string
	 */
	private $categorySlug;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("tooltipUrl")
	 * @var string
	 */
	private $tooltipUrl;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $description;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $flavor;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("simpleDescription")
	 * @var string
	 */
	private $simpleDescription;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("skillCalcId")
	 * @var string
	 */
	private $skillCalcId;

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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->icon;
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
	public function getCategorySlug()
	{
		return $this->categorySlug;
	}

	/**
	 * @return string
	 */
	public function getTooltipUrl()
	{
		return $this->tooltipUrl;
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
	public function getFlavor()
	{
		return $this->flavor;
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
	public function getSkillCalcId()
	{
		return $this->skillCalcId;
	}
}