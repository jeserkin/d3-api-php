<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Item;

use Diablo3\Api\Data\ArrayCollection,
	Diablo3\Api\Data\Item as InnerItem;

class Gem
{
	/**
	 * @var InnerItem
	 */
	private $item;

	/**
	 * @var ArrayCollection
	 */
	private $attributesRaw;

	/**
	 * @var ArrayCollection
	 */
	private $attributes;

	/**
	 * @param InnerItem $Item
	 */
	public function setItem( InnerItem $Item )
	{
		$this->item = $Item;
	}

	/**
	 * @return InnerItem
	 */
	public function getItem()
	{
		return $this->item;
	}

	/**
	 * @param ArrayCollection $attributesRaw
	 */
	public function setAttributesRaw( ArrayCollection $attributesRaw )
	{
		$this->attributesRaw = $attributesRaw;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getAttributesRaw()
	{
		return $this->attributesRaw;
	}

	/**
	 * @param ArrayCollection $Attributes
	 */
	public function setAttributes( ArrayCollection $Attributes )
	{
		$this->attributes = $Attributes;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}
}
