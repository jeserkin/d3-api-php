<?php
namespace Diablo3\Util;

class Curl
{
	const
		GET  = 1,
		POST = 2,
		PUT  = 3;

	protected
		$curl,
		$rawData,
		$cookies        = array(),
		$postFields     = array(),
		$followLocation = 0,
		$requestMethod  = self::GET,
		$importCookies  = false,
		$includeHeaders = false,
		$curlTimeout    = 600;

	/**
	 * @throws \Exception
	 * @return \Diablo3\Util\Curl
	 */
	public function __construct()
	{
		if ( ! function_exists( 'curl_init' ) )
		{
			throw new \Exception( 'curl not installed' );
		}

		$this->curl = curl_init();
	}

	/**
	 * @param string $url
	 * @param array $params
	 *
	 * @return \Diablo3\Util\Curl
	 */
	public function curlGet( $url, array $params = array() )
	{
		if ( count( $params ) )
		{
			$url .= '?' . $this->generatePostFields( $params );
		}

		$this->setCurlParam( CURLOPT_URL, $url );
		$this->requestMethod = self::GET;

		return $this;
	}

	/**
	 * @param bool $followLocation
	 * @return \Diablo3\Util\Curl
	 */
	public function followLocation( $followLocation )
	{
		$this->followLocation = ( (bool) $followLocation ? 1 : 0 );

		return $this;
	}

	/**
	 * @param string $paramsId
	 * @param mixed $paramsValue
	 * @return \Diablo3\Util\Curl
	 */
	public function setCurlParam( $paramsId, $paramsValue )
	{
		curl_setopt( $this->curl, $paramsId, $paramsValue );

		return $this;
	}

	/**
	 * @param string $url
	 * @param array $postData
	 * @param string|null $rawData
	 * @return \Diablo3\Util\Curl
	 */
	public function curlPost( $url, array $postData = array(), $rawData = null )
	{
		$this->setCurlParam( CURLOPT_URL, $url );
		$this->requestMethod = self::POST;
		$this->postFields    = $postData;
		$this->rawData       = $rawData;

		return $this;
	}

	/**
	 * @param string $url
	 * @param array $postData
	 * @param string|null $rawData
	 * @return \Diablo3\Util\Curl
	 */
	public function curlPut( $url, array $postData = array(), $rawData = null )
	{
		$this->setCurlParam( CURLOPT_URL, $url );
		$this->requestMethod = self::PUT;
		$this->postFields    = $postData;
		$this->rawData       = $rawData;

		return $this;
	}

	/**
	 * @param string $savePath
	 */
	public function download( $savePath )
	{
		$file = fopen( $savePath, 'w' );

		curl_setopt( $this->curl, CURLOPT_FILE, $file );

		$this->sendRequest();

		$this->closeRequest();

		fclose( $file );
	}

	/**
	 * @return mixed
	 */
	public function fetch()
	{
		curl_setopt( $this->curl, CURLOPT_RETURNTRANSFER, 1 );

		$result = $this->sendRequest();

		return $result;
	}

	public function getCookies()
	{
		$this->importCookies( true );

		curl_setopt( $this->curl, CURLOPT_RETURNTRANSFER, 1 );

		$result = $this->sendRequest();

		$this->closeRequest();

		return $this->exportCookies( $result );
	}

	/**
	 * @param array $cookies
	 */
	public function setCookies( array $cookies )
	{
		$this->cookies = $cookies;
	}

	/**
	 * @param bool $importCookies
	 */
	public function importCookies( $importCookies = true )
	{
		$this->importCookies = (bool) $importCookies;
	}

	/**
	 * @param bool $includeHeaders
	 */
	public function includeHeaders( $includeHeaders = true )
	{
		$this->includeHeaders = (bool) $includeHeaders;
	}

	/**
	 * @return resource
	 */
	protected function sendRequest()
	{
		curl_setopt( $this->curl, CURLOPT_HEADER, ( ( $this->includeHeaders || $this->importCookies ) ? 1 : 0 ) );
		curl_setopt( $this->curl, CURLOPT_FOLLOWLOCATION, $this->followLocation );
		curl_setopt( $this->curl, CURLOPT_TIMEOUT, $this->curlTimeout );
		curl_setopt( $this->curl, CURLOPT_SSL_VERIFYPEER, false );

		//Proxy test
		//curl_setopt( $this->curl, CURLOPT_PROXY, 'localhost' );
		//curl_setopt( $this->curl, CURLOPT_PROXYPORT, 8888 );

		if ( self::POST === $this->requestMethod )
		{
			// Отправить запрос методом POST
			curl_setopt( $this->curl, CURLOPT_POST, 1 );
			curl_setopt( $this->curl, CURLOPT_POSTFIELDS, $this->getPostFieldsString() );
		}
		elseif ( self::PUT === $this->requestMethod )
		{
			// Отправить запрос методом PUT
			curl_setopt( $this->curl, CURLOPT_CUSTOMREQUEST, 'PUT' );
			curl_setopt( $this->curl, CURLOPT_HTTPHEADER, array( 'Content-Length: ' . strlen( $this->getPostFieldsString() ) ) );
			curl_setopt( $this->curl, CURLOPT_POSTFIELDS, $this->getPostFieldsString() );
		}

		if ( count( $this->cookies ) )
		{
			// Отсылаем куки
			curl_setopt( $this->curl, CURLOPT_COOKIE, $this->generateCookies( $this->cookies ) );
		}

		return curl_exec( $this->curl );
	}

	/**
	 * @return void
	 */
	public function closeRequest()
	{
		curl_close( $this->curl );
	}

	/*
	if ( $exportCookies )
	{
		// Получаем заголовки
		$this->exportCookies( $this->getHeaders( $str_response ) );
	}

	if ( false === $includeHeaders )
	{
		// Убираем заголовки
		$str_response =& $this->removeHeaders( $str_response );
	}
	*/

	/**
	 * Retrieve headers
	 *
	 * @param string $source
	 * @param bool $continue
	 * @return string
	 */
	public function getHeaders( $source, $continue = true )
	{
		if ( false !== ( $separator_pos = strpos( $source, "\r\n\r\n" ) ) )
		{
			if ( $continue && false !== strpos( $source, 'HTTP/1.1 100 Continue' ) )
			{
				$source = trim( substr( $source, $separator_pos + 4 ) );
				$source = $this->getHeaders( $source, false );
			}
			else
			{
				$source = trim( substr( $source, 0, $separator_pos ) );
			}

			return $source;
		}

		return '';
	}

	/**
	 * @param string $source
	 * @param bool $continue
	 * @return string
	 */
	public function &removeHeaders( $source, $continue = true )
	{
		if ( false !== ( $separator_pos = strpos( $source, "\r\n\r\n" ) ) )
		{
			if ( $continue && false !== strpos( $source, 'HTTP/1.1 100 Continue' ) )
			{
				$source = trim( substr( $source, $separator_pos + 4 ) );
				$source =& $this->removeHeaders( $source, false );
			}
			else
			{
				$source = trim( substr( $source, $separator_pos + 4 ) );
			}
		}

		return $source;
	}

	/**
	 * If cookies were sent, save them
	 *
	 * @param string $source
	 * @return array
	 */
	public function exportCookies( $source )
	{
		$cookies = array();

		if ( preg_match_all( '#Set-Cookie:\s*([^=]+)=([^;]+)#i', $source, $matches ) )
		{
			for ( $i = 0, $cnt = count( $matches[1] ); $i < $cnt; ++$i )
			{
				$cookies[ trim( $matches[1][ $i ] ) ] = trim( $matches[2][ $i ] );
			}
		}

		return $cookies;
	}

	/**
	 * @return string
	 */
	public function getPostFieldsString()
	{
		if ( ! empty( $this->rawData ) )
		{
			return $this->rawData;
		}

		return $this->generatePostFields( $this->postFields );
	}

	/**
	 * @param array $inputArray
	 * @return string
	 */
	public function generatePostFields( array $inputArray )
	{
		return http_build_query( $inputArray );
	}

	/**
	 * @param array $inputArray
	 * @return string
	 */
	public function generateCookies( array $inputArray )
	{
		$cookies = array();

		foreach ( $inputArray as $field => $value )
		{
			$cookies[] = $field . '=' . $value;
		}

		return implode( ';', $cookies );
	}

	/**
	 * @return bool|string
	 */
	public function prepareCookies()
	{
		if ( count( $this->cookies ) )
		{
			return implode( ';', $this->cookies );
		}
		else
		{
			return false;
		}
	}

	/**
	 * @return int
	 */
	public function getCurlTimeout()
	{
		return $this->curlTimeout;
	}

	/**
	 * @param int $curlTimeout
	 */
	public function setCurlTimeout( $curlTimeout )
	{
		$this->curlTimeout = $curlTimeout;
	}

	/**
	 * @return bool|string
	 */
	public function getError()
	{
		if ( curl_errno( $this->curl ) )
		{
			return curl_error( $this->curl );
		}

		return false;
	}

	/**
	 * @param int $option
	 * @return array|mixed
	 */
	public function getCurlInfo( $option = null )
	{
		if ( null !== $option )
		{
			return curl_getinfo( $this->curl, $option );
		}

		return curl_getinfo( $this->curl );
	}
}