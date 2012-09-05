<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Follower;

use Diablo3\Api\Data\ArrayCollection;

class Follower extends \Diablo3\Api\Data\Follower
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $realName;

	/**
	 * @var string
	 */
	private $portrait;

	/**
	 * @param string $name
	 */
	public function setName( $name )
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $realName
	 */
	public function setRealName( $realName )
	{
		$this->realName = $realName;
	}

	/**
	 * @return string
	 */
	public function getRealName()
	{
		return $this->realName;
	}

	/**
	 * @param string $portrait
	 */
	public function setPortrait( $portrait )
	{
		$this->portrait = $portrait;
	}

	/**
	 * @return string
	 */
	public function getPortrait()
	{
		return $this->portrait;
	}
}
