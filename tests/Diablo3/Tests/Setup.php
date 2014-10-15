<?php
namespace Diablo3\Tests;

use Diablo3\Client;

class Setup extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Diablo3\Client
	 */
	protected $diablo3;

	/**
	 * @return void
	 */
	public function setUp()
	{
		$this->diablo3 = new Client( $GLOBALS['region'], $GLOBALS['battle_tag'], $GLOBALS['locale'], $GLOBALS['api_key'] );
	}
}