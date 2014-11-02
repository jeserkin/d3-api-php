<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Act
{
	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $completed;

	/**
	 * @JMS\Type("ArrayCollection<Diablo3\Api\Data\Hero\CompletedQuest>")
	 * @JMS\SerializedName("completedQuests")
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 */
	private $completedQuests;

	/**
	 * @return bool
	 */
	public function isCompleted()
	{
		return $this->completed;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getCompletedQuests()
	{
		return $this->completedQuests;
	}
}