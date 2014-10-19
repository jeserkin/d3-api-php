<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Recipe
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
	private $slug;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $name;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $cost;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Profile\Reagent>")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $reagents;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("itemProduced")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $itemProduced;

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
	 * @return int
	 */
	public function getCost()
	{
		return $this->cost;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getReagents()
	{
		return $this->reagents;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getItemProduced()
	{
		return $this->itemProduced;
	}
}