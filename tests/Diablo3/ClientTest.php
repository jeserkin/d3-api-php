<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Tests;

class ClientTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Diablo3\Client
	 */
	protected $diablo3;

	protected function setUp()
	{
		$this->diablo3 = new \Diablo3\Client( $GLOBALS['region'], $GLOBALS['battle_tag_name'], $GLOBALS['battle_tag_code'], $GLOBALS['locale'] );
	}

	public function testApi()
	{
		$ProfileService = $this->diablo3->api( 'profile' );
		$this->assertInstanceOf( 'Diablo3\Api\Profile', $ProfileService, 'ProfileService is not an instance of Api\Profile type!' );

		$ProfileService = $this->diablo3->profile();
		$this->assertInstanceOf( 'Diablo3\Api\Profile', $ProfileService, 'ProfileService is not an instance of Api\Profile type!' );
	}

	/**
	 * @throws \Exception
	 */
	public function testGetConfiguration()
	{
		throw new \Exception( 'TODO Implement Me' );
	}
}
