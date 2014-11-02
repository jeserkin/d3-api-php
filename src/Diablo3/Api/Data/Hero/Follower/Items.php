<?php
namespace Diablo3\Api\Data\Hero\Follower;

use JMS\Serializer\Annotation as JMS;

class Items
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $special;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("mainHand")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $mainHand;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("offHand")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $offHand;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("rightFinger")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $rightFinger;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("leftFinger")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $leftFinger;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $neck;

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getSpecial()
	{
		return $this->special;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getMainHand()
	{
		return $this->mainHand;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getOffHand()
	{
		return $this->offHand;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getRightFinger()
	{
		return $this->rightFinger;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getLeftFinger()
	{
		return $this->leftFinger;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getNeck()
	{
		return $this->neck;
	}
}