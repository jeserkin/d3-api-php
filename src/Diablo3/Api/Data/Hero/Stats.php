<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class Stats
{
	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $life;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $damage;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $toughness;

	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $healing;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("attackSpeed")
	 * @var float
	 */
	private $attackSpeed;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $armor;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $strength;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $dexterity;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $vitality;

	/**
	 * @JMS\Type("integer")
	 * @var int
	 */
	private $intelligence;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("physicalResist")
	 * @var int
	 */
	private $physicalResist;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("fireResist")
	 * @var int
	 */
	private $fireResist;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("coldResist")
	 * @var int
	 */
	private $coldResist;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("lightningResist")
	 * @var int
	 */
	private $lightningResist;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("poisonResist")
	 * @var int
	 */
	private $poisonResist;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("arcaneResist")
	 * @var int
	 */
	private $arcaneResist;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("critDamage")
	 * @var float
	 */
	private $critDamage;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("blockChance")
	 * @var float
	 */
	private $blockChance;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("blockAmountMin")
	 * @var float
	 */
	private $blockAmountMin;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("blockAmountMax")
	 * @var float
	 */
	private $blockAmountMax;

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
	 * @JMS\Type("double")
	 * @var float
	 */
	private $thorns;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("lifeSteal")
	 * @var int
	 */
	private $lifeSteal;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("lifePerKill")
	 * @var int
	 */
	private $lifePerKill;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("goldFind")
	 * @var float
	 */
	private $goldFind;

	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("magicFind")
	 * @var float
	 */
	private $magicFind;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("lifeOnHit")
	 * @var int
	 */
	private $lifeOnHit;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("primaryResource")
	 * @var int
	 */
	private $primaryResource;

	/**
	 * @JMS\Type("integer")
	 * @JMS\SerializedName("secondaryResource")
	 * @var int
	 */
	private $secondaryResource;

	/**
	 * @return int
	 */
	public function getLife()
	{
		return $this->life;
	}

	/**
	 * @return int
	 */
	public function getDamage()
	{
		return $this->damage;
	}

	/**
	 * @return int
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
	public function getAttackSpeed()
	{
		return $this->attackSpeed;
	}

	/**
	 * @return int
	 */
	public function getArmor()
	{
		return $this->armor;
	}

	/**
	 * @return int
	 */
	public function getStrength()
	{
		return $this->strength;
	}

	/**
	 * @return int
	 */
	public function getDexterity()
	{
		return $this->dexterity;
	}

	/**
	 * @return int
	 */
	public function getVitality()
	{
		return $this->vitality;
	}

	/**
	 * @return int
	 */
	public function getIntelligence()
	{
		return $this->intelligence;
	}

	/**
	 * @return int
	 */
	public function getPhysicalResist()
	{
		return $this->physicalResist;
	}

	/**
	 * @return int
	 */
	public function getFireResist()
	{
		return $this->fireResist;
	}

	/**
	 * @return int
	 */
	public function getColdResist()
	{
		return $this->coldResist;
	}

	/**
	 * @return int
	 */
	public function getLightningResist()
	{
		return $this->lightningResist;
	}

	/**
	 * @return int
	 */
	public function getPoisonResist()
	{
		return $this->poisonResist;
	}

	/**
	 * @return int
	 */
	public function getArcaneResist()
	{
		return $this->arcaneResist;
	}

	/**
	 * @return float
	 */
	public function getCritDamage()
	{
		return $this->critDamage;
	}

	/**
	 * @return float
	 */
	public function getBlockChance()
	{
		return $this->blockChance;
	}

	/**
	 * @return float
	 */
	public function getBlockAmountMin()
	{
		return $this->blockAmountMin;
	}

	/**
	 * @return float
	 */
	public function getBlockAmountMax()
	{
		return $this->blockAmountMax;
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

	/**
	 * @return float
	 */
	public function getThorns()
	{
		return $this->thorns;
	}

	/**
	 * @return int
	 */
	public function getLifeSteal()
	{
		return $this->lifeSteal;
	}

	/**
	 * @return int
	 */
	public function getPerKill()
	{
		return $this->lifePerKill;
	}

	/**
	 * @return float
	 */
	public function getGoldFind()
	{
		return $this->goldFind;
	}

	/**
	 * @return float
	 */
	public function getMagicFind()
	{
		return $this->magicFind;
	}

	/**
	 * @return int
	 */
	public function getLifeOnHit()
	{
		return $this->lifeOnHit;
	}

	/**
	 * @return int
	 */
	public function getPrimaryResource()
	{
		return $this->primaryResource;
	}

	/**
	 * @return int
	 */
	public function getSecondaryResource()
	{
		return $this->secondaryResource;
	}
}