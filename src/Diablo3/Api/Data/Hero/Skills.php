<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Skills
{
	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Hero\ActiveSkill>")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $active;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Hero\PassiveSkill>")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $passive;

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getPassive()
	{
		return $this->passive;
	}
}