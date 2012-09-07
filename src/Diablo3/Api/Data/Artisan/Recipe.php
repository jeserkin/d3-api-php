<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Artisan;

use Diablo3\Api\Data\ArrayCollection,
	Diablo3\Api\Data\Item;

class Recipe
{
	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $cost;

	/**
	 * @var ArrayCollection
	 */
	private $reagents;

	/**
	 * @var Item
	 */
	private $itemProduced;

	/**
	 * @param string $slug
	 */
	public function setSlug( $slug )
	{
		$this->slug = $slug;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name )
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param int $cost
	 */
	public function setCost( $cost )
	{
		$this->cost = $cost;
	}

	/**
	 * @return int
	 */
	public function getCost()
	{
		return $this->cost;
	}

	/**
	 * @param ArrayCollection $Reagents
	 */
	public function setReagents( ArrayCollection $Reagents )
	{
		$this->reagents = $Reagents;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getReagents()
	{
		return $this->reagents;
	}

	/**
	 * @param Item $ItemProduced
	 */
	public function setItemProduced( Item $ItemProduced )
	{
		$this->itemProduced = $ItemProduced;
	}

	/**
	 * @return Item
	 */
	public function getItemProduced()
	{
		return $this->itemProduced;
	}
}
