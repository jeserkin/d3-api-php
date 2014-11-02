<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS,

	DateTime;

class Hero
{
	const
		WITCH_DOCTOR = 'witch-doctor',
		MONK         = 'monk',
		DEMON_HUNTER = 'demon-hunter',
		BARBARIAN    = 'barbarian',
		WIZARD       = 'wizard',
		CRUSADER     = 'crusader';

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("paragonLevel")
	 * @var int
	 */
	protected $paragonLevel;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	protected $seasonal;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	protected $name;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	protected $id;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	protected $level;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	protected $hardcore;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	protected $gender;

	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	protected $dead;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	protected $class;

	/**
	 * @JMS\Type("integer")
	 * @JMS\Accessor(getter="getLastUpdated", setter="setLastUpdated")
	 * @JMS\SerializedName("last-updated")
	 * @var \DateTime
	 */
	protected $lastUpdated;

	/**
	 * @return int
	 */
	public function getParagonLevel()
	{
		return $this->paragonLevel;
	}

	/**
	 * @return bool
	 */
	public function isSeasonal()
	{
		return $this->seasonal;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @return bool
	 */
	public function isHardcore()
	{
		return $this->hardcore;
	}

	/**
	 * @return string
	 */
	public function getGender()
	{
		return ( $this->gender ? 'female' : 'male' );
	}

	/**
	 * @return bool
	 */
	public function isMale()
	{
		return ( 0 == $this->gender );
	}

	/**
	 * @return bool
	 */
	public function isFemale()
	{
		return ( 1 == $this->gender );
	}

	/**
	 * @return bool
	 */
	public function isDead()
	{
		return $this->dead;
	}

	/**
	 * @return string
	 */
	public function getClass()
	{
		return $this->class;
	}

	/**
	 * @return bool
	 */
	public function isWitchDoctor()
	{
		return ( self::WITCH_DOCTOR == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isMonk()
	{
		return ( self::MONK == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isDemonHunter()
	{
		return ( self::DEMON_HUNTER == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isBarbarian()
	{
		return ( self::BARBARIAN == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isWizard()
	{
		return ( self::WIZARD == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isCrusader()
	{
		return ( self::CRUSADER == $this->class );
	}

	/**
	 * @param string $lastUpdated
	 */
	public function setLastUpdated( $lastUpdated )
	{
		$this->lastUpdated = new DateTime();
		$this->lastUpdated->setTimestamp( $lastUpdated );
	}

	/**
	 * @return \DateTime
	 */
	public function getLastUpdated()
	{
		return $this->lastUpdated;
	}
}