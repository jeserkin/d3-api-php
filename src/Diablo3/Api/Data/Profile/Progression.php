<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS,
	
	InvalidArgumentException;

class Progression
{
	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $act1;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $act2;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $act3;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $act4;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $act5;

	/**
	 * @return bool
	 */
	public function getAct1()
	{
		return $this->act1;
	}

	/**
	 * @return bool
	 */
	public function getAct2()
	{
		return $this->act2;
	}

	/**
	 * @return bool
	 */
	public function getAct3()
	{
		return $this->act3;
	}

	/**
	 * @return bool
	 */
	public function getAct4()
	{
		return $this->act4;
	}

	/**
	 * @return bool
	 */
	public function getAct5()
	{
		return $this->act5;
	}

	/**
	 * @param int $act
	 * @throws \InvalidArgumentException
	 * @return bool
	 */
	public function isActFinished( $act )
	{
		if ( ! method_exists( $this, 'getAct' . $act ) )
		{
			throw new InvalidArgumentException( 'Act [' . $act . '] doesn\'t exist!' );
		}
		
		$act = 'getAct' . $act;
		
		return $this->$act();
	}
}