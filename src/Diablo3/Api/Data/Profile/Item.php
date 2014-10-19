<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Item
{
	/**
	 * @JMS\Type("string")
	 * @var string
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
	private $icon;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("displayColor")
	 * @var string
	 */
	private $displayColor;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("tooltipParams")
	 * @var string
	 */
	private $tooltipParams;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Recipe")
	 * @var \Diablo3\Api\Data\Profile\Recipe
	 */
	private $recipe;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Profile\Recipe>")
	 * @JMS\SerializedName("craftedBy")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $craftedBy;

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
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
	 * @return string
	 */
	public function getDisplayColor()
	{
		return $this->displayColor;
	}

	/**
	 * @return string
	 */
	public function getTooltipParams()
	{
		return $this->tooltipParams;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Recipe
	 */
	public function getRecipe()
	{
		return $this->recipe;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getCraftedBy()
	{
		return $this->craftedBy;
	}
}