<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Artisan;

use Diablo3\Api\Data\ArrayCollection;

class Artisan extends \Diablo3\Api\Data\Artisan
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $portrait;

	/**
	 * @var ArrayCollection
	 */
	private $tiers;

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

	/**
	 * @param ArrayCollection $Tiers
	 */
	public function setTiers( ArrayCollection $Tiers )
	{
		$this->tiers = $Tiers;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getTiers()
	{
		return $this->tiers;
	}
}
