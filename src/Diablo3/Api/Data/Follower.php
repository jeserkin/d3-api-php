<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data;

use Diablo3\Api\Data\ArrayCollection;

class Follower
{
	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var int
	 */
	private $level;

	/**
	 * @var ArrayCollection
	 */
	private $items;

	/**
	 * @var int
	 */
	private $goldFind;

	/**
	 * @var int
	 */
	private $magicFind;

	/**
	 * @var int
	 */
	private $experienceBonus;

	/**
	 * @var ArrayCollection
	 */
	private $skills;

	public function __construct()
	{
		$this->skills = new ArrayCollection();
	}

	/**
	 * @param string $slug
	 */
	public function setSlug( $slug )
	{
		$this->slug = $slug;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
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
	 * @param ArrayCollection $Items
	 */
	public function setItems( $Items )
	{
		$this->items = $Items;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param int $goldFind
	 */
	public function setGoldFind( $goldFind )
	{
		$this->goldFind = $goldFind;
	}

	/**
	 * @return int
	 */
	public function getGoldFind()
	{
		return $this->goldFind;
	}

	/**
	 * @param int $magicFind
	 */
	public function setMagicFind( $magicFind )
	{
		$this->magicFind = $magicFind;
	}

	/**
	 * @return int
	 */
	public function getMagicFind()
	{
		return $this->magicFind;
	}

	/**
	 * @param int $experienceBonus
	 */
	public function setExperienceBonus( $experienceBonus )
	{
		$this->experienceBonus = $experienceBonus;
	}

	/**
	 * @return int
	 */
	public function getExperienceBonus()
	{
		return $this->experienceBonus;
	}

	/**
	 * @param string $type
	 * @param ArrayCollection $Skills
	 */
	public function addSkills( $type, $Skills )
	{
		$this->skills->set( $type, $Skills );
	}

	/**
	 * @return ArrayCollection
	 */
	public function getSkills()
	{
		return $this->skills;
	}
}
