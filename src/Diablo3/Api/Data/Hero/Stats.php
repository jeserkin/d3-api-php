<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Hero;

class Stats
{
	/**
	 * @var int
	 */
	private $life;

	/**
	 * @var float
	 */
	private $damage;

	/**
	 * @var float
	 */
	private $attackSpeed;

	/**
	 * @var int
	 */
	private $armor;

	/**
	 * @var int
	 */
	private $strength;

	/**
	 * @var int
	 */
	private $dexterity;

	/**
	 * @var int
	 */
	private $vitality;

	/**
	 * @var int
	 */
	private $intelligence;

	/**
	 * @var int
	 */
	private $physicalResist;

	/**
	 * @var int
	 */
	private $fireResist;

	/**
	 * @var int
	 */
	private $coldResist;

	/**
	 * @var int
	 */
	private $lightningResist;

	/**
	 * @var int
	 */
	private $poisonResist;

	/**
	 * @var int
	 */
	private $arcaneResist;

	/**
	 * @var float
	 */
	private $critDamage;

	/**
	 * @var float
	 */
	private $damageIncrease;

	/**
	 * @var float
	 */
	private $critChance;

	/**
	 * @var float
	 */
	private $damageReduction;

	/**
	 * @var float
	 */
	private $blockChance;

	/**
	 * @var int
	 */
	private $thorns;

	/**
	 * @var float
	 */
	private $lifeSteal;

	/**
	 * @var int
	 */
	private $lifePerKill;

	/**
	 * @var float
	 */
	private $goldFind;

	/**
	 * @var float
	 */
	private $magicFind;

	/**
	 * @var int
	 */
	private $blockAmountMin;

	/**
	 * @var int
	 */
	private $blockAmountMax;

	/**
	 * @var int
	 */
	private $lifeOnHit;

	/**
	 * @var int
	 */
	private $primaryResource;

	/**
	 * @var int
	 */
	private $secondaryResource;

	/**
	 * @param int $life
	 */
	public function setLife( $life )
	{
		$this->life = $life;
	}

	/**
	 * @return int
	 */
	public function getLife()
	{
		return $this->life;
	}

	/**
	 * @param float $damage
	 */
	public function setDamage( $damage )
	{
		$this->damage = $damage;
	}

	/**
	 * @return float
	 */
	public function getDamage()
	{
		return $this->damage;
	}

	/**
	 * @param float $attackSpeed
	 */
	public function setAttackSpeed( $attackSpeed )
	{
		$this->attackSpeed = $attackSpeed;
	}

	/**
	 * @return float
	 */
	public function getAttackSpeed()
	{
		return $this->attackSpeed;
	}

	/**
	 * @param int $armor
	 */
	public function setArmor( $armor )
	{
		$this->armor = $armor;
	}

	/**
	 * @return int
	 */
	public function getArmor()
	{
		return $this->armor;
	}

	/**
	 * @param int $strength
	 */
	public function setStrength( $strength )
	{
		$this->strength = $strength;
	}

	/**
	 * @return int
	 */
	public function getStrength()
	{
		return $this->strength;
	}

	/**
	 * @param int $dexterity
	 */
	public function setDexterity( $dexterity )
	{
		$this->dexterity = $dexterity;
	}

	/**
	 * @return int
	 */
	public function getDexterity()
	{
		return $this->dexterity;
	}

	/**
	 * @param int $vitality
	 */
	public function setVitality( $vitality )
	{
		$this->vitality = $vitality;
	}

	/**
	 * @return int
	 */
	public function getVitality()
	{
		return $this->vitality;
	}

	/**
	 * @param int $intelligence
	 */
	public function setIntelligence( $intelligence )
	{
		$this->intelligence = $intelligence;
	}

	/**
	 * @return int
	 */
	public function getIntelligence()
	{
		return $this->intelligence;
	}

	/**
	 * @param int $physicalResist
	 */
	public function setPhysicalResist( $physicalResist )
	{
		$this->physicalResist = $physicalResist;
	}

	/**
	 * @return int
	 */
	public function getPhysicalResist()
	{
		return $this->physicalResist;
	}

	/**
	 * @param int $fireResist
	 */
	public function setFireResist( $fireResist )
	{
		$this->fireResist = $fireResist;
	}

	/**
	 * @return int
	 */
	public function getFireResist()
	{
		return $this->fireResist;
	}

	/**
	 * @param int $coldResist
	 */
	public function setColdResist( $coldResist )
	{
		$this->coldResist = $coldResist;
	}

	/**
	 * @return int
	 */
	public function getColdResist()
	{
		return $this->coldResist;
	}

	/**
	 * @param int $lightningResist
	 */
	public function setLightningResist( $lightningResist )
	{
		$this->lightningResist = $lightningResist;
	}

	/**
	 * @return int
	 */
	public function getLightningResist()
	{
		return $this->lightningResist;
	}

	/**
	 * @param int $poisonResist
	 */
	public function setPoisonResist( $poisonResist )
	{
		$this->poisonResist = $poisonResist;
	}

	/**
	 * @return int
	 */
	public function getPoisonResist()
	{
		return $this->poisonResist;
	}

	/**
	 * @param int $arcaneResist
	 */
	public function setArcaneResist( $arcaneResist )
	{
		$this->arcaneResist = $arcaneResist;
	}

	/**
	 * @return int
	 */
	public function getArcaneResist()
	{
		return $this->arcaneResist;
	}

	/**
	 * @param float $critDamage
	 */
	public function setCritDamage( $critDamage )
	{
		$this->critDamage = $critDamage;
	}

	/**
	 * @return float
	 */
	public function getCritDamage()
	{
		return $this->critDamage;
	}

	/**
	 * @param float $damageIncrease
	 */
	public function setDamageIncrease( $damageIncrease )
	{
		$this->damageIncrease = $damageIncrease;
	}

	/**
	 * @return float
	 */
	public function getDamageIncrease()
	{
		return $this->damageIncrease;
	}

	/**
	 * @param float $critChance
	 */
	public function setCritChance( $critChance )
	{
		$this->critChance = $critChance;
	}

	/**
	 * @return float
	 */
	public function getCritChance()
	{
		return $this->critChance;
	}

	/**
	 * @param float $damageReduction
	 */
	public function setDamageReduction( $damageReduction )
	{
		$this->damageReduction = $damageReduction;
	}

	/**
	 * @return float
	 */
	public function getDamageReduction()
	{
		return $this->damageReduction;
	}

	/**
	 * @param float $blockChance
	 */
	public function setBlockChance( $blockChance )
	{
		$this->blockChance = $blockChance;
	}

	/**
	 * @return float
	 */
	public function getBlockChance()
	{
		return $this->blockChance;
	}

	/**
	 * @param int $thorns
	 */
	public function setThorns( $thorns )
	{
		$this->thorns = $thorns;
	}

	/**
	 * @return int
	 */
	public function getThorns()
	{
		return $this->thorns;
	}

	/**
	 * @param float $lifeSteal
	 */
	public function setLifeSteal( $lifeSteal )
	{
		$this->lifeSteal = $lifeSteal;
	}

	/**
	 * @return float
	 */
	public function getLifeSteal()
	{
		return $this->lifeSteal;
	}

	/**
	 * @param int $lifePerKill
	 */
	public function setLifePerKill( $lifePerKill )
	{
		$this->lifePerKill = $lifePerKill;
	}

	/**
	 * @return int
	 */
	public function getLifePerKill()
	{
		return $this->lifePerKill;
	}

	/**
	 * @param float $goldFind
	 */
	public function setGoldFind( $goldFind )
	{
		$this->goldFind = $goldFind;
	}

	/**
	 * @return float
	 */
	public function getGoldFind()
	{
		return $this->goldFind;
	}

	/**
	 * @param float $magicFind
	 */
	public function setMagicFind( $magicFind )
	{
		$this->magicFind = $magicFind;
	}

	/**
	 * @return float
	 */
	public function getMagicFind()
	{
		return $this->magicFind;
	}

	/**
	 * @param int $blockAmountMin
	 */
	public function setBlockAmountMin( $blockAmountMin )
	{
		$this->blockAmountMin = $blockAmountMin;
	}

	/**
	 * @return int
	 */
	public function getBlockAmountMin()
	{
		return $this->blockAmountMin;
	}

	/**
	 * @param int $blockAmountMax
	 */
	public function setBlockAmountMax( $blockAmountMax )
	{
		$this->blockAmountMax = $blockAmountMax;
	}

	/**
	 * @return int
	 */
	public function getBlockAmountMax()
	{
		return $this->blockAmountMax;
	}

	/**
	 * @param int $lifeOnHit
	 */
	public function setLifeOnHit( $lifeOnHit )
	{
		$this->lifeOnHit = $lifeOnHit;
	}

	/**
	 * @return int
	 */
	public function getLifeOnHit()
	{
		return $this->lifeOnHit;
	}

	/**
	 * @param int $primaryResource
	 */
	public function setPrimaryResource( $primaryResource )
	{
		$this->primaryResource = $primaryResource;
	}

	/**
	 * @return int
	 */
	public function getPrimaryResource()
	{
		return $this->primaryResource;
	}

	/**
	 * @param int $secondaryResource
	 */
	public function setSecondaryResource( $secondaryResource )
	{
		$this->secondaryResource = $secondaryResource;
	}

	/**
	 * @return int
	 */
	public function getSecondaryResource()
	{
		return $this->secondaryResource;
	}
}
