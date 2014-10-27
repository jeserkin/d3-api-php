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
	 * @var
	 */
	private $passive;
}