<?php
namespace Diablo3\Tests\Api;

use Diablo3\Tests\Setup;

class HeroTest extends Setup
{
	/**
	 * @return void
	 */
	public function testGetHero()
	{
		$Hero = $this->diablo3->hero()->getHero( $GLOBALS['hero_id'] );
	}
}