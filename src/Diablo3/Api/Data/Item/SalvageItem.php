<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Item;

class SalvageItem
{
	/**
	 * @var int
	 */
	private $chance;

	/**
	 * @var int
	 */
	private $quantity;

	/**
	 * @var Item
	 */
	private $item;

	/**
	 * @param int $chance
	 */
	public function setChance( $chance )
	{
		$this->chance = $chance;
	}

	/**
	 * @return int
	 */
	public function getChance()
	{
		return $this->chance;
	}

	/**
	 * @param int $quantity
	 */
	public function setQuantity( $quantity )
	{
		$this->quantity = $quantity;
	}

	/**
	 * @return int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @param Item $Item
	 */
	public function setItem( Item $Item )
	{
		$this->item = $Item;
	}

	/**
	 * @return Item
	 */
	public function getItem()
	{
		return $this->item;
	}
}
