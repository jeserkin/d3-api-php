<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Item;

use Diablo3\Api\Data\ArrayCollection;

class Item extends \Diablo3\Api\Data\Item
{
	/**
	 * @var int
	 */
	private $requiredLevel;

	/**
	 * @var int
	 */
	private $itemLevel;

	/**
	 * @var int
	 */
	private $bonusAffixes;

	/**
	 * @var string
	 */
	private $typeName;

	/**
	 * @var string
	 */
	private $typeId;

	/**
	 * @var bool
	 */
	private $twoHanded;

	/**
	 * @var ArrayCollection
	 */
	private $armor;

	/**
	 * @var ArrayCollection
	 */
	private $dps;

	/**
	 * @var ArrayCollection
	 */
	private $attacksPerSecond;

	/**
	 * @var ArrayCollection
	 */
	private $minDamage;

	/**
	 * @var ArrayCollection
	 */
	private $maxDamage;

	/**
	 * @var ArrayCollection
	 */
	private $attributes;

	/**
	 * @var ArrayCollection
	 */
	private $attributesRaw;

	/**
	 * @var ArrayCollection
	 */
	private $socketEffects;

	/**
	 * @var ArrayCollection
	 */
	private $salvage;

	/**
	 * @var ArrayCollection
	 */
	private $gems;

	/**
	 * @param int $requiredLevel
	 */
	public function setRequiredLevel( $requiredLevel )
	{
		$this->requiredLevel = $requiredLevel;
	}

	/**
	 * @return int
	 */
	public function getRequiredLevel()
	{
		return $this->requiredLevel;
	}

	/**
	 * @param int $itemLevel
	 */
	public function setItemLevel( $itemLevel )
	{
		$this->itemLevel = $itemLevel;
	}

	/**
	 * @return int
	 */
	public function getItemLevel()
	{
		return $this->itemLevel;
	}

	/**
	 * @param int $bonusAffixes
	 */
	public function setBonusAffixes( $bonusAffixes )
	{
		$this->bonusAffixes = $bonusAffixes;
	}

	/**
	 * @return int
	 */
	public function getBonusAffixes()
	{
		return $this->bonusAffixes;
	}

	/**
	 * @param string $typeName
	 */
	public function setTypeName( $typeName )
	{
		$this->typeName = $typeName;
	}

	/**
	 * @return string
	 */
	public function getTypeName()
	{
		return $this->typeName;
	}

	/**
	 * @param string $typeId
	 */
	public function setTypeId( $typeId )
	{
		$this->typeId = $typeId;
	}

	/**
	 * @return string
	 */
	public function getTypeId()
	{
		return $this->typeId;
	}

	/**
	 * @param boolean $twoHanded
	 */
	public function setTwoHanded( $twoHanded )
	{
		$this->twoHanded = $twoHanded;
	}

	/**
	 * @return boolean
	 */
	public function getTwoHanded()
	{
		return $this->twoHanded;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $armor
	 */
	public function setArmor( $armor )
	{
		$this->armor = $armor;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getArmor()
	{
		return $this->armor;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $dps
	 */
	public function setDps( $dps )
	{
		$this->dps = $dps;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getDps()
	{
		return $this->dps;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $attacksPerSecond
	 */
	public function setAttacksPerSecond( $attacksPerSecond )
	{
		$this->attacksPerSecond = $attacksPerSecond;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getAttacksPerSecond()
	{
		return $this->attacksPerSecond;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $minDamage
	 */
	public function setMinDamage( $minDamage )
	{
		$this->minDamage = $minDamage;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getMinDamage()
	{
		return $this->minDamage;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $maxDamage
	 */
	public function setMaxDamage( $maxDamage )
	{
		$this->maxDamage = $maxDamage;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getMaxDamage()
	{
		return $this->maxDamage;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $attributes
	 */
	public function setAttributes( $attributes )
	{
		$this->attributes = $attributes;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $attributesRaw
	 */
	public function setAttributesRaw( $attributesRaw )
	{
		$this->attributesRaw = $attributesRaw;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getAttributesRaw()
	{
		return $this->attributesRaw;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $socketEffects
	 */
	public function setSocketEffects( $socketEffects )
	{
		$this->socketEffects = $socketEffects;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getSocketEffects()
	{
		return $this->socketEffects;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $salvage
	 */
	public function setSalvage( $salvage )
	{
		$this->salvage = $salvage;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getSalvage()
	{
		return $this->salvage;
	}

	/**
	 * @param \Diablo3\Api\Data\ArrayCollection $gems
	 */
	public function setGems( $gems )
	{
		$this->gems = $gems;
	}

	/**
	 * @return \Diablo3\Api\Data\ArrayCollection
	 */
	public function getGems()
	{
		return $this->gems;
	}
}
