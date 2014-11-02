<?php
namespace Diablo3\Api;

use Diablo3\Client,

	JMS\Serializer\SerializerBuilder;

abstract class AbstractApi implements ApiInterface
{
	/**
	 * @var \Diablo3\Client
	 */
	private $client;

	/**
	 * @param \Diablo3\Client $Client
	 * @return \Diablo3\Api\AbstractApi
	 */
	public function __construct( Client $Client )
	{
		$this->client = $Client;
	}

	/**
	 * @return \Diablo3\Client
	 */
	protected function getClient()
	{
		return $this->client;
	}

	/**
	 * @param string $class
	 * @param string $path
	 * @param array $options
	 * @return mixed
	 */
	protected function get( $class, $path, array $options = array() )
	{
		//$deserializeResponse = $this->deserializeResponse( $class, $this->client->get( $path, $options ) );
		//var_dump( $deserializeResponse ); exit;

		return $this->deserializeResponse( $class, $this->client->get( $path, $options ) );
	}

	/**
	 * @param string $class
	 * @param string $response
	 * @return mixed
	 */
	protected function deserializeResponse( $class, $response )
	{
		$class = 'Diablo3\Api\Data\\' . $class;

		/** @var \JMS\Serializer\SerializerBuilder $Builder */
		$Builder = SerializerBuilder::create();

		$Serializer = $Builder->build();

		return $Serializer->deserialize( $response, $class, 'json' );
	}
}