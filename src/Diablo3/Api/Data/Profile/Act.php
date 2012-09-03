<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Profile;

use Diablo3\Api\Data\ArrayCollection;

class Act
{
	/**
	 * @var bool
	 */
	private $completed = false;

	/**
	 * @var ArrayCollection
	 */
	private $completedQuests;

	/**
	 * @param bool $completed
	 */
	public function setCompleted( $completed )
	{
		$this->completed = $completed;
	}

	/**
	 * @return bool
	 */
	public function getCompleted()
	{
		return $this->completed;
	}

	/**
	 * @param ArrayCollection $CompletedQuests
	 */
	public function setCompletedQuests( ArrayCollection $CompletedQuests )
	{
		$this->completedQuests = $CompletedQuests;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getCompletedQuests()
	{
		return $this->completedQuests;
	}
}
