<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */

class ProfileTest  extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Diablo3\Client
	 */
	protected $diablo3;

	protected function setUp()
	{
		$this->diablo3 = new \Diablo3\Client( $GLOBALS['region'], $GLOBALS['battle_tag_name'], $GLOBALS['battle_tag_code'] );
	}

	public function testGetProfileInfo()
	{
		$Profile = $this->diablo3->profile()->getProfileInfo();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Profile', $Profile, 'Profile is not an instance of Data\Profile\Profile type!' );

		$Heroes = $Profile->getHeroes();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Heroes, 'Heroes is not an instance of Data\ArrayCollection type!' );

		foreach ( $Heroes as $Hero )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Hero', $Hero, 'Hero is not an instance of Data\Profile\Hero type!' );
		}

		$Artisans = $Profile->getArtisans();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Artisans, 'Artisans is not an instance of Data\ArrayCollection type!' );

		foreach ( $Artisans as $Artisan )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Artisan', $Artisan, 'Artisan is not an instance of Data\Profile\Artisan type!' );
		}

		$Artisans = $Profile->getHardcoreArtisans();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Artisans, 'Artisans is not an instance of Data\ArrayCollection type!' );

		foreach ( $Artisans as $Artisan )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Artisan', $Artisan, 'Artisan is not an instance of Data\Profile\Artisan type!' );
		}

		$FallenHeroes = $Profile->getFallenHeroes();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $FallenHeroes, 'FallenHeroes is not an instance of Data\ArrayCollection type!' );

		foreach ( $FallenHeroes as $FallenHero )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Hero', $FallenHero, 'FallenHero is not an instance of Data\Hero\Hero type!' );
		}

		$Progression = $Profile->getProgression();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Progression', $Progression, 'Progression is not an instance of Data\Profile\Progression type!' );

		$Difficulties = $Progression->getDifficulties();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Difficulties, 'Difficulties is not an instance of Data\ArrayCollection type!' );

		foreach ( $Difficulties as $Acts )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Acts, 'Acts is not an instance of Data\ArrayCollection type!' );

			foreach ( $Acts as $Act )
			{
				foreach ( $Act as $CompletedQuests )
				{
					$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $CompletedQuests, 'CompletedQuests is not an instance of Data\ArrayCollection type!' );

					foreach ( $CompletedQuests as $CompletedQuest )
					{

						$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Quest', $CompletedQuest, 'CompletedQuest is not an instance of Data\Profile\Quest type!' );
					}
				}
			}
		}

		$Progression = $Profile->getHardcoreProgression();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Progression', $Progression, 'Progression is not an instance of Data\Profile\Progression type!' );

		$Difficulties = $Progression->getDifficulties();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Difficulties, 'Difficulties is not an instance of Data\ArrayCollection type!' );

		foreach ( $Difficulties as $Acts )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Acts, 'Acts is not an instance of Data\ArrayCollection type!' );

			foreach ( $Acts as $Act )
			{
				foreach ( $Act as $CompletedQuests )
				{
					$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $CompletedQuests, 'CompletedQuests is not an instance of Data\ArrayCollection type!' );

					foreach ( $CompletedQuests as $CompletedQuest )
					{

						$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Quest', $CompletedQuest, 'CompletedQuest is not an instance of Data\Profile\Quest type!' );
					}
				}
			}
		}
	}

	public function testGetHeroInfo()
	{
		$HeroProfile = $this->diablo3->profile()->getHeroInfo( $GLOBALS['hero_id'] );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Hero', $HeroProfile, 'HeroProfile is not an instance of Data\Hero\Hero type!' );

		$Skills = $HeroProfile->getSkills();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Skills, 'Skills is not an instance of ArrayCollection!' );

		foreach ( $Skills as $SkillList )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $SkillList, 'SkillList is not an instance of ArrayCollection!' );

			/** @var $Skill \Diablo3\Api\Data\Hero\Skill */
			foreach ( $SkillList as $Skill )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $Skill, 'Skill is not an instance of Data\Hero\Skill!' );

				if ( null !== $Skill->getRune() )
				{
					$Rune = $Skill->getRune();
					$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Rune', $Rune, 'Rune is not an instance of Data\Hero\Rune type!' );
				}
			}
		}

		$Items = $HeroProfile->getItems();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Items, 'Items is not an instance of ArrayCollection!' );

		foreach ( $Items as $Item )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Item', $Item, 'Item is not an instance of Data\Hero\Item!' );
		}

		$Followers = $HeroProfile->getFollowers();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Followers, 'Followers is not an instance of ArrayCollection!' );

		/** @var $Follower \Diablo3\Api\Data\Hero\Follower */
		foreach ( $Followers as $Follower )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower', $Follower, 'Follower is not an instance of Data\Hero\Follower!' );

			$FollowerItems = $Follower->getItems();
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $FollowerItems, 'FollowerItems is not an instance of ArrayCollection!' );

			foreach ( $FollowerItems as $FollowerItem )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Item', $FollowerItem, 'FollowerItem is not an instance of Data\Hero\Item!' );
			}

			$FollowerSkills = $Follower->getSkills();
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $FollowerSkills, 'FollowerSkills is not an instance of ArrayCollection!' );

			foreach ( $FollowerSkills as $FollowerSkillList )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $FollowerSkillList, 'FollowerSkillList is not an instance of ArrayCollection!' );

				foreach ( $FollowerSkillList as $FollowerSkill )
				{
					$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $FollowerSkill, 'FollowerSkill is not an instance of Data\Hero\Skill!' );
				}
			}
		}

		$Stats = $HeroProfile->getStats();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Stats', $Stats, 'FollowerSkill is not an instance of Data\Hero\Stats!' );

		$ProgressList = $HeroProfile->getProgress();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $ProgressList, 'ProgressList is not an instance of ArrayCollection!' );

		foreach ( $ProgressList as $difficulty => $Acts )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Acts, 'Acts is not an instance of ArrayCollection!' );

			/** @var $Act \Diablo3\Api\Data\Profile\Act */
			foreach ( $Acts as $actNumber => $Act )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Act', $Act, 'Act is not an instance of Data\Profile\Act!' );

				foreach ( $Act->getCompletedQuests() as $Quest )
				{
					$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Quest', $Quest, 'Quest is not an instance of Data\Profile\Quest!' );
				}
			}
		}
	}

	public function testGetItemInfo()
	{
		// MainHand
		$Item = $this->diablo3->profile()->getItemInfo( 'item/Cm0I_NKn9gsSBwgEFaogtUkdhgJj6h3j5anwHUxjTzAdyvzuyB1fDB6fHWPY6agiCwgAFcVEAwAYACAiMAk49AJAAFAQYPQCaiUKDAgAEOOdp7aAgIDgBxIVCJTDxP4DEgcIBBVJ9YtfMA04AEABGNSCqZsJUAhYAA' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Item\Item', $Item, 'Item is not an instance of Data\Item\Item!' );

		if ( null !== ( $Armor = $Item->getArmor() ) )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Armor, 'Armor is not an instance of ArrayCollection!' );
		}

		if ( null !== ( $Dps = $Item->getDps() ) )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Dps, 'Dps is not an instance of ArrayCollection!' );
		}

		if ( null !== ( $AttacksPerSecond = $Item->getAttacksPerSecond() ) )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $AttacksPerSecond, 'AttacksPerSecond is not an instance of ArrayCollection!' );
		}

		if ( null !== ( $MinDamage = $Item->getMinDamage() ) )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $MinDamage, 'MinDamage is not an instance of ArrayCollection!' );
		}

		if ( null !== ( $MaxDamage = $Item->getMaxDamage() ) )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $MaxDamage, 'MaxDamage is not an instance of ArrayCollection!' );
		}

		$ItemAttributes = $Item->getAttributes();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $ItemAttributes, 'ItemAttributes is not an instance of ArrayCollection!' );

		$ItemAttributesRaw = $Item->getAttributesRaw();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $ItemAttributesRaw, 'ItemAttributesRaw is not an instance of ArrayCollection!' );

		$Salvage = $Item->getSalvage();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Salvage, 'Salvage is not an instance of ArrayCollection!' );

		/** @var $SalvageItem Diablo3\Api\Data\Item\SalvageItem */
		foreach ( $Salvage as $SalvageItem )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Item\SalvageItem', $SalvageItem, 'SalvageItem is not an instance of Data\Item\SalvageItem!' );

			$InnerSalvageItem = $SalvageItem->getItem();
			$this->assertInstanceOf( 'Diablo3\Api\Data\Item', $InnerSalvageItem, 'InnerSalvageItem is not an instance of Data\Item!' );
		}
	}

	public function testGetFollowerInfo()
	{
		$Follower = $this->diablo3->profile()->getFollowerInfo( 'enchantress' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Follower\Follower', $Follower, 'Follower is not an instance of Data\Follower\Follower!' );

		$this->assertFollower( $Follower );
	}

	public function testGetEnchantressInfo()
	{
		$Follower = $this->diablo3->profile()->getEnchantressInfo();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Follower\Follower', $Follower, 'Follower is not an instance of Data\Follower\Follower!' );

		$this->assertFollower( $Follower );
	}

	public function testGetTemplarInfo()
	{
		$Follower = $this->diablo3->profile()->getTemplarInfo();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Follower\Follower', $Follower, 'Follower is not an instance of Data\Follower\Follower!' );

		$this->assertFollower( $Follower );
	}

	public function testScoundrelInfo()
	{
		$Follower = $this->diablo3->profile()->getScoundrelInfo();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Follower\Follower', $Follower, 'Follower is not an instance of Data\Follower\Follower!' );

		$this->assertFollower( $Follower );
	}

	private function assertFollower( \Diablo3\Api\Data\Follower\Follower $Follower )
	{
		$Skills = $Follower->getSkills();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Skills, 'Skills is not an instance of ArrayCollection!' );

		foreach ( $Skills as $FollowerSkillList )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $FollowerSkillList, 'FollowerSkillList is not an instance of ArrayCollection!' );

			foreach ( $FollowerSkillList as $FollowerSkill )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $FollowerSkill, 'FollowerSkill is not an instance of Data\Hero\Skill!' );
			}
		}
	}

	public function testGetArtisanInfo()
	{
		$Artisan = $this->diablo3->profile()->getArtisanInfo( 'blacksmith' );
		$this->assetArtisan( $Artisan );
	}

	public function testGetBlacksmithInfo()
	{
		$Artisan = $this->diablo3->profile()->getBlacksmithInfo();
		$this->assetArtisan( $Artisan );
	}

	public function testGetJewelerInfo()
	{
		$Artisan = $this->diablo3->profile()->getJewelerInfo();
		$this->assetArtisan( $Artisan );
	}

	private function assetArtisan( Diablo3\Api\Data\Artisan\Artisan $Artisan )
	{
		$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Artisan', $Artisan, 'Artisan is not an instance of Data\Artisan\Artisan!' );

		$Tiers = $Artisan->getTiers();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Tiers, 'Tiers is not an instance of ArrayCollection!' );

		/** @var $Tier \Diablo3\Api\Data\Artisan\Tier\Tier */
		foreach ( $Tiers as $tierNubmer => $Tier )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\Tier', $Tier, 'Tier is not an instance of Data\Artisan\Tier\Tier!' );

			$Levels = $Tier->getLevels();
			$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Levels, 'Levels is not an instance of ArrayCollection!' );

			/** @var $Level \Diablo3\Api\Data\Artisan\Tier\Level */
			foreach ( $Levels as $tierLevel => $Level )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\Level', $Level, 'Level is not an instance of Data\Artisan\Tier\Level!' );

				$TrainedRecipes = $Level->getTrainedRecipes();
				$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $TrainedRecipes, 'TrainedRecipes is not an instance of ArrayCollection!' );

				/** @var $TrainedRecipe \Diablo3\Api\Data\Artisan\Recipe */
				foreach ( $TrainedRecipes as $TrainedRecipe )
				{
					$this->assertRecipe( $TrainedRecipe );
				}

				$TaughtRecipes = $Level->getTaughtRecipes();
				$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $TaughtRecipes, 'TaughtRecipes is not an instance of ArrayCollection!' );

				/** @var $TaughtRecipe \Diablo3\Api\Data\Artisan\Recipe */
				foreach ( $TaughtRecipes as $TaughtRecipe )
				{
					$this->assertRecipe( $TaughtRecipe );
				}

				if ( null !== ( $UpgradeItems = $Level->getUpgradeItems() ) )
				{
					$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $TaughtRecipes, 'TaughtRecipes is not an instance of ArrayCollection!' );

					/** @var $UpgradeItem \Diablo3\Api\Data\Artisan\Tier\UpgradeItem */
					foreach ( $UpgradeItems as $UpgradeItem )
					{
						$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\Item', $UpgradeItem, 'UpgradeItem is not an instance of Data\Artisan\Tier\Item!' );
						$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\UpgradeItem', $UpgradeItem, 'UpgradeItem is not an instance of Data\Artisan\Tier\UpgradeItem!' );

						$Item = $UpgradeItem->getItem();
						$this->assertInstanceOf( 'Diablo3\Api\Data\Item', $Item, 'Item is not an instance of Data\Item!' );
					}
				}
			}
		}
	}

	/**
	 * @param Diablo3\Api\Data\Artisan\Recipe $Recipe
	 */
	private function assertRecipe( Diablo3\Api\Data\Artisan\Recipe $Recipe )
	{
		$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Recipe', $Recipe, 'Level is not an instance of Data\Artisan\Recipe!' );

		$Reagents = $Recipe->getReagents();
		$this->assertInstanceOf( 'Diablo3\Api\Data\ArrayCollection', $Reagents, 'Reagents is not an instance of ArrayCollection!' );

		/** @var $Reagent \Diablo3\Api\Data\Artisan\Tier\Reagent */
		foreach ( $Reagents as $Reagent )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\Item', $Reagent, 'Reagent is not an instance of Data\Artisan\Tier\Item!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Artisan\Tier\Reagent', $Reagent, 'Reagent is not an instance of Data\Artisan\Tier\Reagent!' );

			$Item = $Reagent->getItem();
			$this->assertInstanceOf( 'Diablo3\Api\Data\Item', $Item, 'Item is not an instance of Data\Item!' );
		}

		$ProducedItem = $Recipe->getItemProduced();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Item', $ProducedItem, 'ProducedItem is not an instance of Data\Item!' );
	}
}
