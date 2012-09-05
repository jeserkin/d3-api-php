<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Hero;

class Item
{
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $icon;

	/**
	 * @var string
	 */
	private $displayColor;

	/**
	 * @var string
	 */
	private $tooltipParams;

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
	 * @param string $displayColor
	 */
	public function setDisplayColor( $displayColor )
	{
		$this->displayColor = $displayColor;
	}

	/**
	 * @return string
	 */
	public function getDisplayColor()
	{
		return $this->displayColor;
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
}
