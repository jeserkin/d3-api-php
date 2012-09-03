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
}
