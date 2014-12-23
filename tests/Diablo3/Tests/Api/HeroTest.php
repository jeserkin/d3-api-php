<?php
namespace Diablo3\Tests\Api;

use Diablo3\Tests\Setup,

	Diablo3\Api\Data\Hero\Act,
	Diablo3\Api\Data\Hero\Skills,
	Diablo3\Api\Data\Profile\Items,
	Diablo3\Api\Data\Profile\Item,
	Diablo3\Api\Data\Profile\Recipe,
	Diablo3\Api\Data\Hero\Followers,
	Diablo3\Api\Data\Hero\Follower,
	Diablo3\Api\Data\Hero\Follower\Items as FollowerItems;

class HeroTest extends Setup
{
	/**
	 * @return void
	 */
	public function testGetHero()
	{
		$Hero = $this->diablo3->hero()->getHero( $GLOBALS['hero_id'] );

		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Hero', $Hero, 'Hero is not of type Diablo3\Api\Data\Hero\Hero!' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Hero', $Hero, 'Hero is not of type Diablo3\Api\Data\Profile\Hero!' );

		$Skills = $Hero->getSkills();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skills', $Skills, 'Hero->Skills is not of type Diablo3\Api\Data\Hero\Skills!' );
		$this->assertSkills( $Skills );

		$Items = $Hero->getItems();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Items', $Items, 'Hero->Items is not of type Diablo3\Api\Data\Profile\Items!' );
		$this->assertItems( $Items );

		$Followers = $Hero->getFollowers();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Followers', $Followers, 'Hero->Followers is not of type Diablo3\Api\Data\Hero\Followers!' );
		$this->assertFollowers( $Followers );

		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Stats', $Hero->getStats(), 'Hero->Stats is not of type Diablo3\Api\Data\Hero\Stats!' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Kills', $Hero->getKills(), 'Hero->Kills is not of type Diablo3\Api\Data\Hero\Kills!' );

		$Progression = $Hero->getProgression();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Progression', $Progression, 'Hero->Progression is not of type Diablo3\Api\Data\Hero\Progression!' );

		$this->assertAct( $Progression->getAct1() );
		$this->assertAct( $Progression->getAct2() );
		$this->assertAct( $Progression->getAct3() );
		$this->assertAct( $Progression->getAct4() );
		$this->assertAct( $Progression->getAct5() );
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Skills $Skills
	 */
	protected function assertSkills( Skills $Skills )
	{
		$ActiveSkills = $Skills->getActive();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $ActiveSkills, 'Hero->Skills->Active is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Hero\ActiveSkill $ActiveSkill */
		foreach ( $ActiveSkills as $ActiveSkill )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\ActiveSkill', $ActiveSkill, 'ActiveSkill is not of type Diablo3\Api\Data\Hero\ActiveSkill!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $ActiveSkill->getSkill(), 'ActiveSkill->Skill is not of type Diablo3\Api\Data\Hero\Skill!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Rune', $ActiveSkill->getRune(), 'ActiveSkill->Rune is not of type Diablo3\Api\Data\Hero\Rune!' );
		}

		$PassiveSkills = $Skills->getPassive();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $PassiveSkills, 'Hero->Skills->Passive is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Hero\PassiveSkill $PassiveSkill */
		foreach ( $PassiveSkills as $PassiveSkill )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\PassiveSkill', $PassiveSkill, 'PassiveSkill is not of type Diablo3\Api\Data\Hero\PassiveSkill!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $PassiveSkill->getSkill(), 'PassiveSkill->Skill is not of type Diablo3\Api\Data\Hero\Skill!' );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Profile\Items $Items
	 */
	protected function assertItems( Items $Items )
	{
		$Head = $Items->getHead();

		if ( $Head )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Head, 'Items->Head is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Head );
		}

		$Torso = $Items->getTorso();

		if ( $Torso )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Torso, 'Items->Torso is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Torso );
		}

		$Feet = $Items->getFeet();

		if ( $Feet )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Feet, 'Items->Feet is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Feet );
		}

		$Hands = $Items->getHands();

		if ( $Hands )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Hands, 'Items->Hands is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Hands );
		}

		$Shoulders = $Items->getShoulders();

		if ( $Shoulders )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Shoulders, 'Items->Shoulders is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Shoulders );
		}

		$Legs = $Items->getLegs();

		if ( $Legs )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Legs, 'Items->Legs is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Legs );
		}

		$Bracers = $Items->getBracers();

		if ( $Bracers )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Bracers, 'Items->Bracers is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Bracers );
		}

		$MainHand = $Items->getMainHand();

		if ( $MainHand )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $MainHand, 'Items->MainHand is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $MainHand );
		}

		$OffHand = $Items->getOffHand();

		if ( $OffHand )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $OffHand, 'Items->MainHand is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $OffHand );
		}

		$Waist = $Items->getWaist();

		if ( $Waist )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Waist, 'Items->Waist is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Waist );
		}

		$RightFinger = $Items->getRightFinger();

		if ( $RightFinger )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $RightFinger, 'Items->RightFinger is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $RightFinger );
		}

		$LeftFinger = $Items->getLeftFinger();

		if ( $LeftFinger )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $LeftFinger, 'Items->LeftFinger is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $LeftFinger );
		}

		$Neck = $Items->getNeck();

		if ( $Neck )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Neck, 'Items->Neck is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Neck );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Profile\Item $Item
	 */
	protected function assertItem( Item $Item )
	{
		$this->assertRecipe( $Item->getRecipe() );

		$CraftedBy = $Item->getCraftedBy();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $CraftedBy, 'CraftedBy is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Profile\Recipe $Recipe */
		foreach ( $CraftedBy as $Recipe )
		{
			$this->assertRecipe( $Recipe );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Profile\Recipe $Recipe
	 */
	protected function assertRecipe( Recipe $Recipe = null )
	{
		if ( $Recipe )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Recipe', $Recipe, 'Recipe is not of type Diablo3\Api\Data\Profile\Recipe!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Recipe->getItemProduced(), 'Recipe->ItemProduced is not of type Diablo3\Api\Data\Profile\Item!' );

			$Reagents = $Recipe->getReagents();
			$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $Reagents, 'Reagents is not of type Doctrine\Common\Collections\ArrayCollection!' );

			/** @var \Diablo3\Api\Data\Profile\Reagent $Reagent */
			foreach ( $Reagents as $Reagent )
			{
				$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Reagent', $Reagent, 'Reagent is not of type Diablo3\Api\Data\Profile\Reagent!' );
				$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Reagent->getItem(), 'Reagent->Item is not of type Diablo3\Api\Data\Profile\Item!' );
			}
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Followers $Followers
	 */
	protected function assertFollowers( Followers $Followers )
	{
		$Enchantress = $Followers->getEnchantress();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower', $Enchantress, 'Hero->Followers->Enchantress is not of type Diablo3\Api\Data\Hero\Follower!' );
		$this->assertFollower( $Enchantress );

		$Scoundrel = $Followers->getScoundrel();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower', $Scoundrel, 'Hero->Followers->Scoundrel is not of type Diablo3\Api\Data\Hero\Follower!' );
		$this->assertFollower( $Scoundrel );

		$Templar = $Followers->getTemplar();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower', $Templar, 'Hero->Followers->Templar is not of type Diablo3\Api\Data\Hero\Follower!' );
		$this->assertFollower( $Templar );
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Follower $Follower
	 */
	protected function assertFollower( Follower $Follower )
	{
		$Items = $Follower->getItems();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower\Items', $Items, 'Follower->Items is not of type Diablo3\Api\Data\Hero\Follower\Items!' );
		$this->assertFollowerItems( $Items );

		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower\Stats', $Follower->getStats(), 'Follower->Stats is not of type Diablo3\Api\Data\Hero\Follower\Stats!' );

		$Skills = $Follower->getSkills();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $Skills, 'Follower->Skills is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Hero\Follower\Skill $Skill */
		foreach ( $Skills as $Skill )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Follower\Skill', $Skill, 'Skill is not of type Diablo3\Api\Data\Hero\Follower\Skill!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skill', $Skill->getSkill(), 'Skill->Skill is not of type Diablo3\Api\Data\Hero\Skill!' );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Follower\Items $Items
	 */
	protected function assertFollowerItems( FollowerItems $Items )
	{
		$Special = $Items->getSpecial();

		if ( $Special )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Special, 'Items->Special is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Special );
		}

		$MainHand = $Items->getMainHand();

		if ( $MainHand )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $MainHand, 'Items->MainHand is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $MainHand );
		}

		$OffHand = $Items->getOffHand();

		if ( $OffHand )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $OffHand, 'Items->OffHand is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $OffHand );
		}

		$RightFinger = $Items->getRightFinger();

		if ( $RightFinger )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $RightFinger, 'Items->RightFinger is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $RightFinger );
		}

		$LeftFinger = $Items->getLeftFinger();

		if ( $LeftFinger )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $LeftFinger, 'Items->LeftFinger is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $LeftFinger );
		}

		$Neck = $Items->getNeck();

		if ( $Neck )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Item', $Neck, 'Items->Neck is not of type Diablo3\Api\Data\Profile\Item!' );
			$this->assertItem( $Neck );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Act $Act
	 */
	protected function assertAct( Act $Act )
	{
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Act', $Act, 'Act is not of type Diablo3\Api\Data\Hero\Act!' );

		$CompletedQuests = $Act->getCompletedQuests();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $CompletedQuests, 'Act->CompletedQuests is not of type Doctrine\Common\Collections\ArrayCollection!' );

		foreach ( $CompletedQuests as $CompletedQuest )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\CompletedQuest', $CompletedQuest, 'CompletedQuest is not of type Diablo3\Api\Data\Hero\CompletedQuest!' );
		}
	}
}