<?php
namespace Diablo3\Tests\Api;

use Diablo3\Tests\Setup,

	Diablo3\Api\Data\Hero\Hero;

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

		$this->assertSkills( $Hero );
	}

	/**
	 * @param \Diablo3\Api\Data\Hero\Hero $Hero
	 */
	private function assertSkills( Hero $Hero )
	{
		$Skills = $Hero->getSkills();
		$this->assertInstanceOf( 'Diablo3\Api\Data\Hero\Skills', $Skills, 'Hero->Skills is not of type Diablo3\Api\Data\Hero\Skills!' );

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
}