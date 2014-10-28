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
}