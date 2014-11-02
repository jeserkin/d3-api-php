<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Followers
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Follower")
	 * @var \Diablo3\Api\Data\Hero\Follower
	 */
	private $templar;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Follower")
	 * @var \Diablo3\Api\Data\Hero\Follower
	 */
	private $scoundrel;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Follower")
	 * @var \Diablo3\Api\Data\Hero\Follower
	 */
	private $enchantress;

	/**
	 * @return \Diablo3\Api\Data\Hero\Follower
	 */
	public function getTemplar()
	{
		return $this->templar;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Follower
	 */
	public function getScoundrel()
	{
		return $this->scoundrel;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Follower
	 */
	public function getEnchantress()
	{
		return $this->enchantress;
	}
}