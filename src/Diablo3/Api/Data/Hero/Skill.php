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
}