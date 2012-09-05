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
}
