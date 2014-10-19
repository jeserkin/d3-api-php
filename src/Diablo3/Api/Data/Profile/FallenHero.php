<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class FallenHero
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $name;
	
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $level;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Stats")
	 * @var \Diablo3\Api\Data\Profile\Stats
	 */
	private $stats;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Items")
	 * @var \Diablo3\Api\Data\Profile\Items
	 */
	private $items;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Kills")
	 * @var \Diablo3\Api\Data\Profile\Kills
	 */
	private $kills;
	
	/**
	 * @JMS\Type("boolean")
	 * @var bool
	 */
	private $hardcore;
	
	/**
	 * @JMS\Type("Diablo3\Api\Data\Profile\Death")
	 * @var \Diablo3\Api\Data\Profile\Death
	 */
	private $death;
	
	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("heroId")
	 * @var int
	 */
	private $heroId;
	
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $gender;
	
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $class;

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
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Stats
	 */
	public function getStats()
	{
		return $this->stats;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Items
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Kills
	 */
	public function getKills()
	{
		return $this->kills;
	}

	/**
	 * @return bool
	 */
	public function isHardcore()
	{
		return $this->hardcore;
	}

	/**
	 * @return \Diablo3\Api\Data\Profile\Death
	 */
	public function getDeath()
	{
		return $this->death;
	}

	/**
	 * @return int
	 */
	public function getHeroId()
	{
		return $this->heroId;
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
		return ( Hero::WITCH_DOCTOR == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isMonk()
	{
		return ( Hero::MONK == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isDemonHunter()
	{
		return ( Hero::DEMON_HUNTER == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isBarbarian()
	{
		return ( Hero::BARBARIAN == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isWizard()
	{
		return ( Hero::WIZARD == $this->class );
	}

	/**
	 * @return bool
	 */
	public function isCrusader()
	{
		return ( Hero::CRUSADER == $this->class );
	}
}