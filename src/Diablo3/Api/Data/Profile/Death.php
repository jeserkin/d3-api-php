<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS,
	
	DateTime;

class Death
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $killer;

	/**
	 * @JMS\Type("integer")
	 * @JMS\Accessor(getter="getTime", setter="setTime")
	 * @var \DateTime
	 */
	private $time;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $location;

	/**
	 * @return int
	 */
	public function getKiller()
	{
		return $this->killer;
	}

	/**
	 * @param int $time
	 */
	public function setTime( $time )
	{
		$this->time = new DateTime();
		$this->time->setTimestamp( $time );
	}

	/**
	 * @return \DateTime
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * @return int
	 */
	public function getLocation()
	{
		return $this->location;
	}
} 