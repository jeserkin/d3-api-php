<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Hero
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $id;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $name;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $class;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $gender;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $level;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevel")
	 * @var int
	 */
	private $paragonLevel;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $hardcore;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $seasonal;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("seasonCreated")
	 * @var int
	 */
	private $seasonCreated;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Skills")
	 * @var \Diablo3\Api\Data\Hero\Skills
	 */
	private $skills;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Items")
	 * @var \Diablo3\Api\Data\Profile\Items
	 */
	private $items;
}