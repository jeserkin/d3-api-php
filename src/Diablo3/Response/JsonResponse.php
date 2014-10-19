<?php
namespace Diablo3\Response;

use Exception;

class JsonResponse implements ResponseInterface
{
	/**
	 * @var string
	 */
	protected $json;

	/**
	 * @param string $rawResponse
	 * @throws \Exception
	 */
	public function __construct( $rawResponse )
	{
		$this->json = $rawResponse;
	}

	/**
	 * @return bool
	 */
	public function hasErrors()
	{
		$hasErrors = false;

		try
		{
			$response = json_decode( $this->json, true );
		}
		catch ( Exception $e )
		{
			$response  = array();
			$hasErrors = true;
		}

		if ( ! $hasErrors && isset( $response['code'] ) )
		{
			$hasErrors = true;
		}

		return $hasErrors;
	}

	/**
	 * @return string
	 */
	public function getErrorCode()
	{
		$response = json_decode( $this->json, true );

		return $response['code'];
	}

	/**
	 * @return string
	 */
	public function getErrorMessage()
	{
		$response = json_decode( $this->json, true );

		return $response['reason'];
	}

	/**
	 * @return string
	 */
	public function getResponse()
	{
		return $this->json;
	}
}