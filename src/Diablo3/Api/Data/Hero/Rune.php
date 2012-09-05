<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Hero;

class Rune
{
	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $level;

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
	private $tooltipParams;

	/**
	 * @var string
	 */
	private $skillCalcId;

	/**
	 * @var int
	 */
	private $order;

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
	 * @param string $tooltipParams
	 */
	public function setTooltipParams( $tooltipParams )
	{
		$this->tooltipParams = $tooltipParams;
	}

	/**
	 * @return string
	 */
	public function getTooltipParams()
	{
		return $this->tooltipParams;
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
	 * @param int $order
	 */
	public function setOrder( $order )
	{
		$this->order = $order;
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return $this->order;
	}
}
