<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Profile;

use Diablo3\Api\Data\ArrayCollection;

class Progression
{
	/**
	 * @var string
	 */
	private $type = 'default';

	/**
	 * @var ArrayCollection
	 */
	private $difficulties;

	/**
	 * @param string $type
	 */
	public function setType( $type )
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param ArrayCollection $Difficulties
	 */
	public function setDifficulties( ArrayCollection $Difficulties )
	{
		$this->difficulties = $Difficulties;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getDifficulties()
	{
		return $this->difficulties;
	}
}
