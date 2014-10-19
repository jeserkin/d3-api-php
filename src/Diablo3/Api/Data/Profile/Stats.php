<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class Stats
{
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $life;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $damage;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $toughness;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $healing;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $armor;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $strength;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $dexterity;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $vitality;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $intelligence;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("physicalResist")
	 * @var float
	 */
	private $physicalResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("fireResist")
	 * @var float
	 */
	private $fireResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("coldResist")
	 * @var float
	 */
	private $coldResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("lightningResist")
	 * @var float
	 */
	private $lightningResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("poisonResist")
	 * @var float
	 */
	private $poisonResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("arcaneResist")
	 * @var float
	 */
	private $arcaneResist;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("damageIncrease")
	 * @var float
	 */
	private $damageIncrease;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("critChance")
	 * @var float
	 */
	private $critChance;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("damageReduction")
	 * @var float
	 */
	private $damageReduction;

	/**
	 * @return float
	 */
	public function getLife()
	{
		return $this->life;
	}

	/**
	 * @return float
	 */
	public function getDamage()
	{
		return $this->damage;
	}

	/**
	 * @return float
	 */
	public function getToughness()
	{
		return $this->toughness;
	}

	/**
	 * @return float
	 */
	public function getHealing()
	{
		return $this->healing;
	}

	/**
	 * @return float
	 */
	public function getArmor()
	{
		return $this->armor;
	}

	/**
	 * @return float
	 */
	public function getStrength()
	{
		return $this->strength;
	}

	/**
	 * @return float
	 */
	public function getDexterity()
	{
		return $this->dexterity;
	}

	/**
	 * @return float
	 */
	public function getVitality()
	{
		return $this->vitality;
	}

	/**
	 * @return float
	 */
	public function getIntelligence()
	{
		return $this->intelligence;
	}

	/**
	 * @return float
	 */
	public function getPhysicalResist()
	{
		return $this->physicalResist;
	}

	/**
	 * @return float
	 */
	public function getFireResist()
	{
		return $this->fireResist;
	}

	/**
	 * @return float
	 */
	public function getColdResist()
	{
		return $this->coldResist;
	}

	/**
	 * @return float
	 */
	public function getLightningResist()
	{
		return $this->lightningResist;
	}

	/**
	 * @return float
	 */
	public function getPoisonResist()
	{
		return $this->poisonResist;
	}

	/**
	 * @return float
	 */
	public function getArcaneResist()
	{
		return $this->arcaneResist;
	}

	/**
	 * @return float
	 */
	public function getDamageIncrease()
	{
		return $this->damageIncrease;
	}

	/**
	 * @return float
	 */
	public function getCritChance()
	{
		return $this->critChance;
	}

	/**
	 * @return float
	 */
	public function getDamageReduction()
	{
		return $this->damageReduction;
	}
}