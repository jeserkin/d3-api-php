<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Reagent
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $quantity;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $item;

	/**
	 * @return int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getItem()
	{
		return $this->item;
	}
}