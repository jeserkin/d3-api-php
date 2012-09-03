<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Profile;

class Hero
{
	const
		MALE   = 0,
		FEMALE = 1;

	const
		WD   = 'witch-doctor',
		MONK = 'monk',
		DH   = 'demon-hunter',
		WIZ  = 'wizard',
		BARB = 'barbarian';


	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $level;

	/**
	 * @var bool
	 */
	private $hardcore;

	/**
	 * @var int
	 */
	private $paragonLevel;

	/**
	 * @var int
	 */
	private $gender;

	/**
	 * @var array
	 */
	private $genders = array(
		self::MALE   => 'male',
		self::FEMALE => 'female',
	);

	/**
	 * @var bool
	 */
	private $dead;

	/**
	 * @var string
	 */
	private $class;

	/**
	 * @var array
	 */
	private $classes = array(
		self::WD   => 'Witch Doctor',
		self::MONK => 'Monk',
		self::DH   => 'Demon Hunter',
		self::WIZ  => 'Wizard',
		self::BARB => 'Barbarian',
	);

	/**
	 * @var int
	 */
	private $lastUpdated;

	/**
	 * @param int $id
	 */
	public function setId( $id )
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

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
	 * @param int $level
	 */
	public function setLevel( $level )
	{
		$this->level = $level;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param bool $hardcore
	 */
	public function setHardcore( $hardcore )
	{
		$this->hardcore = $hardcore;
	}

	/**
	 * @return bool
	 */
	public function getHardcore()
	{
		return $this->hardcore;
	}

	/**
	 * @param int $paragonLevel
	 */
	public function setParagonLevel( $paragonLevel )
	{
		$this->paragonLevel = $paragonLevel;
	}

	/**
	 * @return int
	 */
	public function getParagonLevel()
	{
		return $this->paragonLevel;
	}

	/**
	 * @param int $gender
	 */
	public function setGender( $gender )
	{
		$this->gender = $gender;
	}

	/**
	 * @param bool $formated
	 * @return int|string
	 */
	public function getGender( $formated = false )
	{
		if ( $formated && isset( $this->genders[ $this->gender ] ) )
		{
			return $this->genders[ $this->gender ];
		}

		return $this->gender;
	}

	/**
	 * @param bool $dead
	 */
	public function setDead( $dead )
	{
		$this->dead = $dead;
	}

	/**
	 * @return bool
	 */
	public function getDead()
	{
		return $this->dead;
	}

	/**
	 * @param string $class
	 */
	public function setClass( $class )
	{
		$this->class = $class;
	}

	/**
	 * @param bool $formated
	 * @return string
	 */
	public function getClass( $formated = false )
	{
		if ( $formated && isset( $this->classes[ $this->class ] ) )
		{
			return $this->classes[ $this->class ];
		}

		return $this->class;
	}

	/**
	 * @param int $lastUpdated
	 */
	public function setLastUpdated( $lastUpdated )
	{
		$this->lastUpdated = $lastUpdated;
	}

	/**
	 * @param bool $formated
	 * @param string|null $format
	 * @return int|string
	 */
	public function getLastUpdated( $formated = false, $format = null )
	{
		if ( $formated )
		{
			if ( null !== $format )
			{
				$formatedDate = date( $format, $this->lastUpdated );
			}
			else
			{
				$formatedDate = date( 'Y-m-d H:i:s', $this->lastUpdated );
			}

			return $formatedDate;
		}

		return $this->lastUpdated;
	}
}
