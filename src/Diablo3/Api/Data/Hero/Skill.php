<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Hero;

class Skill
{
	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $icon;

	/**
	 * @var int
	 */
	private $level;

	/**
	 * @var string
	 */
	private $categorySlug;

	/**
	 * @var string
	 */
	private $tooltipUrl;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $simpleDescription;

	/**
	 * @var string
	 */
	private $skillCalcId;

	/**
	 * @var string
	 */
	private $flavor;

	/**
	 * @var Rune
	 */
	private $rune;

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
	 * @param string $icon
	 */
	public function setIcon( $icon )
	{
		$this->icon = $icon;
	}

	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->icon;
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
	 * @param string $categorySlug
	 */
	public function setCategorySlug( $categorySlug )
	{
		$this->categorySlug = $categorySlug;
	}

	/**
	 * @return string
	 */
	public function getCategorySlug()
	{
		return $this->categorySlug;
	}

	/**
	 * @param string $tooltipUrl
	 */
	public function setTooltipUrl( $tooltipUrl )
	{
		$this->tooltipUrl = $tooltipUrl;
	}

	/**
	 * @return string
	 */
	public function getTooltipUrl()
	{
		return $this->tooltipUrl;
	}

	/**
	 * @param string $description
	 */
	public function setDescription( $description )
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $simpleDescription
	 */
	public function setSimpleDescription( $simpleDescription )
	{
		$this->simpleDescription = $simpleDescription;
	}

	/**
	 * @return string
	 */
	public function getSimpleDescription()
	{
		return $this->simpleDescription;
	}

	/**
	 * @param string $skillCalcId
	 */
	public function setSkillCalcId( $skillCalcId )
	{
		$this->skillCalcId = $skillCalcId;
	}

	/**
	 * @return string
	 */
	public function getSkillCalcId()
	{
		return $this->skillCalcId;
	}

	/**
	 * @param Rune $Rune
	 */
	public function setRune( $Rune )
	{
		$this->rune = $Rune;
	}

	/**
	 * @return Rune
	 */
	public function getRune()
	{
		return $this->rune;
	}

	/**
	 * @param string $flavor
	 */
	public function setFlavor( $flavor )
	{
		$this->flavor = $flavor;
	}

	/**
	 * @return string
	 */
	public function getFlavor()
	{
		return $this->flavor;
	}
}
