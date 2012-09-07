<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api\Data\Artisan\Tier;

use Diablo3\Api\Data\ArrayCollection;

class Level
{
	/**
	 * @var int
	 */
	private $tierNumber;

	/**
	 * @var int
	 */
	private $tierLevel;

	/**
	 * @var int
	 */
	private $percet;

	/**
	 * @var ArrayCollection
	 */
	private $trainedRecipes;

	/**
	 * @var ArrayCollection
	 */
	private $taughtRecipes;

	/**
	 * @var ArrayCollection
	 */
	private $upgradeItems;

	/**
	 * @var int
	 */
	private $upgradeCost;

	/**
	 * @param int $tierNumber
	 */
	public function setTierNumber( $tierNumber )
	{
		$this->tierNumber = $tierNumber;
	}

	/**
	 * @return int
	 */
	public function getTierNumber()
	{
		return $this->tierNumber;
	}

	/**
	 * @param int $tierLevel
	 */
	public function setTierLevel( $tierLevel )
	{
		$this->tierLevel = $tierLevel;
	}

	/**
	 * @return int
	 */
	public function getTierLevel()
	{
		return $this->tierLevel;
	}

	/**
	 * @param int $percet
	 */
	public function setPercet( $percet )
	{
		$this->percet = $percet;
	}

	/**
	 * @return int
	 */
	public function getPercet()
	{
		return $this->percet;
	}

	/**
	 * @param ArrayCollection $TrainedRecipes
	 */
	public function setTrainedRecipes( ArrayCollection $TrainedRecipes )
	{
		$this->trainedRecipes = $TrainedRecipes;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getTrainedRecipes()
	{
		return $this->trainedRecipes;
	}

	/**
	 * @param ArrayCollection $TaughtRecipes
	 */
	public function setTaughtRecipes( ArrayCollection $TaughtRecipes )
	{
		$this->taughtRecipes = $TaughtRecipes;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getTaughtRecipes()
	{
		return $this->taughtRecipes;
	}

	/**
	 * @param ArrayCollection $UpgradeItems
	 */
	public function setUpgradeItems( ArrayCollection $UpgradeItems )
	{
		$this->upgradeItems = $UpgradeItems;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getUpgradeItems()
	{
		return $this->upgradeItems;
	}

	/**
	 * @param int $upgradeCost
	 */
	public function setUpgradeCost( $upgradeCost )
	{
		$this->upgradeCost = $upgradeCost;
	}

	/**
	 * @return int
	 */
	public function getUpgradeCost()
	{
		return $this->upgradeCost;
	}
}
