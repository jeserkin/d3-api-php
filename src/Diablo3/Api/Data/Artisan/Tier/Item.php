<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Artisan\Tier;

use Diablo3\Api\Data\Item as TierItem;

class Item
{
	/**
	 * @var int
	 */
	private $quantity;

	/**
	 * @var TierItem
	 */
	private $item;

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
	 * @param TierItem $Item
	 */
	public function setItem( TierItem $Item )
	{
		$this->item = $Item;
	}

	/**
	 * @return TierItem
	 */
	public function getItem()
	{
		return $this->item;
	}
}
