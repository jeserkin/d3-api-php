<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Api;

use Diablo3\Client;

abstract class AbstractApi implements ApiInterface
{
	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @param Client $client
	 * @return AbstractApi
	 */
	public function __construct( Client $client )
	{
		$this->client = $client;
	}

	/**
	 * @return Client
	 */
	protected function getClient()
	{
		return $this->client;
	}

	/**
	 * @param string $path
	 * @return mixed
	 */
	public function get( $path )
	{
		return $this->client->get( $path );
	}
}
