<?php
namespace Diablo3\Tests\Api;

use Diablo3\Tests\Setup,

	Diablo3\Api\Data\Profile\Profile,
	Diablo3\Api\Data\Profile\Items,
	Diablo3\Api\Data\Profile\Item,
	Diablo3\Api\Data\Profile\Recipe,
	Diablo3\Api\Data\Profile\Artisan;

class ProfileTest extends Setup
{
	/**
	 * @return void
	 */
	public function testGetProfile()
	{
		$Profile = $this->diablo3->profile()->getProfile();

		$this->assertHeroes( $Profile );
		$this->assertInstanceOf( 'DateTime', $Profile->getLastUpdated(), 'Profile->LastUpdated is not of type DateTime!' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Kills', $Profile->getKills(), 'Profile->Kills is not of type Diablo3\Api\Data\Profile\Kills!' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\TimePlayed', $Profile->getTimePlayed(), 'Profile->TimePlayed is not of type Diablo3\Api\Data\Profile\TimePlayed!' );
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Progression', $Profile->getProgression(), 'Profile->Progression is not of type Diablo3\Api\Data\Profile\Progression!' );
		$this->assertFallenHeroes( $Profile );
		$this->assertArtisan( $Profile->getBlacksmith() );
		$this->assertArtisan( $Profile->getJeweler() );
		$this->assertArtisan( $Profile->getMystic() );

		$this->assertArtisan( $Profile->getBlacksmithHardcore() );
		$this->assertArtisan( $Profile->getJewelerHardcore() );
		$this->assertArtisan( $Profile->getMysticHardcore() );

		$this->assertArtisan( $Profile->getBlacksmithSeason() );
		$this->assertArtisan( $Profile->getJewelerSeason() );
		$this->assertArtisan( $Profile->getMysticSeason() );

		$this->assertArtisan( $Profile->getBlacksmithSeasonHardcore() );
		$this->assertArtisan( $Profile->getJewelerSeasonHardcore() );
		$this->assertArtisan( $Profile->getMysticSeasonHardcore() );

		// @TODO assertSeasonalProfiles
	}

	/**
	 * @param \Diablo3\Api\Data\Profile\Profile $Profile
	 */
	protected function assertHeroes( Profile $Profile )
	{
		$Heroes = $Profile->getHeroes();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $Heroes, 'Heroes is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Profile\Hero $Hero */
		foreach ( $Heroes as $Hero )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Hero', $Hero, 'Hero is not of type Diablo3\Api\Data\Profile\Hero!' );
			$this->assertInstanceOf( 'DateTime', $Hero->getLastUpdated(), 'Hero->LastUpdated is not of type DateTime!' );
		}
	}

	/**
	 * @param \Diablo3\Api\Data\Profile\Profile $Profile
	 */
	protected function assertFallenHeroes( Profile $Profile )
	{
		$FallenHeroes = $Profile->getFallenHeroes();
		$this->assertInstanceOf( 'Doctrine\Common\Collections\ArrayCollection', $FallenHeroes, 'FallenHeroes is not of type Doctrine\Common\Collections\ArrayCollection!' );

		/** @var \Diablo3\Api\Data\Profile\FallenHero $FallenHero */
		foreach ( $FallenHeroes as $FallenHero )
		{
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\FallenHero', $FallenHero, 'FallenHero is not of type Diablo3\Api\Data\Profile\FallenHero!' );
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Stats', $FallenHero->getStats(), 'FallenHero->Stats is not of type Diablo3\Api\Data\Profile\Stats!' );

			$Items = $FallenHero->getItems();
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Items', $Items, 'FallenHero->Items is not of type Diablo3\Api\Data\Profile\Items!' );
			$this->assertItems( $Items );

			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Kills', $FallenHero->getKills(), 'FallenHero->Kills is not of type Diablo3\Api\Data\Profile\Kills!' );

			$Death = $FallenHero->getDeath();
			$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Death', $Death, 'FallenHero->Death is not of type Diablo3\Api\Data\Profile\Death!' );
			$this->assertInstanceOf( 'DateTime', $Death->getTime(), 'FallenHero->Death->Time is not of type DateTime!' );
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
	 * @param \Diablo3\Api\Data\Profile\Artisan $Artisan
	 */
	protected function assertArtisan( Artisan $Artisan )
	{
		$this->assertInstanceOf( 'Diablo3\Api\Data\Profile\Artisan', $Artisan, 'Artisan is not of type Diablo3\Api\Data\Profile\Artisan!' );
	}
}