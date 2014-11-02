<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Progression
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Act")
	 * @var \Diablo3\Api\Data\Hero\Act
	 */
	private $act1;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Act")
	 * @var \Diablo3\Api\Data\Hero\Act
	 */
	private $act2;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Act")
	 * @var \Diablo3\Api\Data\Hero\Act
	 */
	private $act3;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Act")
	 * @var \Diablo3\Api\Data\Hero\Act
	 */
	private $act4;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Act")
	 * @var \Diablo3\Api\Data\Hero\Act
	 */
	private $act5;

	/**
	 * @return \Diablo3\Api\Data\Hero\Act
	 */
	public function getAct1()
	{
		return $this->act1;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Act
	 */
	public function getAct2()
	{
		return $this->act2;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Act
	 */
	public function getAct3()
	{
		return $this->act3;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Act
	 */
	public function getAct4()
	{
		return $this->act4;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Act
	 */
	public function getAct5()
	{
		return $this->act5;
	}
}