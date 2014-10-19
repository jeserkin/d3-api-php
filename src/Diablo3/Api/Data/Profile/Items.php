<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Items
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $head;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $torso;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $feet;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $hands;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $shoulders;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $legs;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $bracers;

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
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $waist;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("rightFinger")
	 * @var \Diablo3\Api\Data\Profile\Item
	 */
	private $rightFinger;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Item")
	 * @JMS\SerializedName("rightFinger")
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
	public function getHead()
	{
		return $this->head;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getTorso()
	{
		return $this->torso;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getFeet()
	{
		return $this->feet;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getHands()
	{
		return $this->hands;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getShoulders()
	{
		return $this->shoulders;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getLegs()
	{
		return $this->legs;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Item
	 */
	public function getBracers()
	{
		return $this->bracers;
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
	public function getWaist()
	{
		return $this->waist;
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