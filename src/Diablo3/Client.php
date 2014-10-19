<?php
namespace Diablo3;

use Diablo3\Exception\InvalidRegionException,
	Diablo3\Exception\InvalidBattleTagException,
	Diablo3\Exception\InvalidLocaleException,
	Diablo3\Exception\NotFoundException,
	Diablo3\Util\Curl,
	Diablo3\Response\JsonResponse,

	InvalidArgumentException,
	RuntimeException;

class Client
{
	const
		BASE_URL = 'api.battle.net/d3/';

	const
		REGION_EU = 'eu',
		REGION_KR = 'kr',
		REGION_TW = 'tw',
		REGION_US = 'us';

	const
		LOCALE_EU_EN = 'en_GB',
		LOCALE_EU_DE = 'de_DE',
		LOCALE_EU_ES = 'es_ES',
		LOCALE_EU_FR = 'fr_FR',
		LOCALE_EU_IT = 'it_IT',
		LOCALE_EU_PL = 'pl_PL',
		LOCALE_EU_PT = 'pt_PT',
		LOCALE_EU_RU = 'ru_RU',

		LOCALE_KR_KO = 'ko_KR',

		LOCALE_TW_KO = 'zh_TW',

		LOCALE_US_EN = 'en_US',
		LOCALE_US_PT = 'pt_BR',
		LOCALE_US_ES = 'es_NX';

	/**
	 * @var string
	 */
	protected $apiUrl;

	/**
	 * @var string
	 */
	protected $apiKey;

	/**
	 * @var string
	 */
	protected $battleTag;

	/**
	 * @var string
	 */
	protected $locale;

	/**
	 * @var array
	 */
	protected $apis = array();

	/**
	 * @var array
	 */
	protected $allowedRegions = array(
		self::REGION_EU,
		self::REGION_KR,
		self::REGION_TW,
		self::REGION_US,
	);

	/**
	 * @var array
	 */
	protected $allowedLocales = array(
		self::REGION_EU => array(
			self::LOCALE_EU_EN,
			self::LOCALE_EU_DE,
			self::LOCALE_EU_ES,
			self::LOCALE_EU_FR,
			self::LOCALE_EU_IT,
			self::LOCALE_EU_PL,
			self::LOCALE_EU_PT,
			self::LOCALE_EU_RU,
		),
		self::REGION_KR => array(
			self::LOCALE_KR_KO,
		),
		self::REGION_TW => array(
			self::LOCALE_TW_KO,
		),
		self::REGION_US => array(
			self::LOCALE_US_EN,
			self::LOCALE_US_PT,
			self::LOCALE_US_ES,
		),
	);

	/**
	 * @param string $region
	 * @param string $battleTag
	 * @param string $locale
	 * @param string $apiKey
	 * @throws \Diablo3\Exception\InvalidBattleTagException
	 * @throws \Diablo3\Exception\InvalidLocaleException
	 * @throws \Diablo3\Exception\InvalidRegionException
	 */
	public function __construct( $region, $battleTag, $locale, $apiKey )
	{
		if ( ! $this->isValidRegion( $region ) )
		{
			throw new InvalidRegionException( 'Specified region [' . $region . '] is not allowed!' );
		}

		$this->apiUrl = 'https://' . $region . '.' . self::BASE_URL;

		if ( ! $this->isValidBattleTag( $battleTag ) )
		{
			throw new InvalidBattleTagException( 'Passed battle tag is of invalid format!' );
		}

		$this->battleTag = str_replace( '#', '-', $battleTag );

		if ( ! $this->isValidLocale( $locale, $region ) )
		{
			throw new InvalidLocaleException( 'Specified locale [' . $locale . '] is not allowed!' );
		}

		$this->locale = $locale;
		$this->apiKey = $apiKey;
	}

	/**
	 * @param string $region
	 * @return bool
	 */
	protected function isValidRegion( $region )
	{
		return in_array( $region, $this->allowedRegions );
	}

	/**
	 * @param string $battleTag
	 * @return bool
	 */
	protected function isValidBattleTag( $battleTag )
	{
		return ( 1 === preg_match( '#^[\p{L}]{1}[\p{L}\p{N}]{2,12}\-[\p{N}]{4,5}$#uim', str_replace( '#', '-', $battleTag ) ) );
	}

	/**
	 * @param string $locale
	 * @param string $region
	 * @return bool
	 */
	protected function isValidLocale( $locale, $region )
	{
		return in_array( $locale, $this->allowedLocales[ $region ] );
	}

	/**
	 * @return string
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * @return string
	 */
	public function getBattleTag()
	{
		return $this->battleTag;
	}

	/**
	 * @param string $path
	 * @param array $options
	 * @throws \Diablo3\Exception\NotFoundException
	 * @return string
	 */
	public function get( $path, array $options = array() )
	{
		$Curl = new Curl();
		$Curl->curlGet( $this->getRequestUrl( $path, $options ), $this->getRequestParameters() );

		$rawResponse = $Curl->fetch();
		
		if ( false !== ( $error = $Curl->getError() ) )
		{
			throw new RuntimeException( $error );
		}

		$httpCode = $Curl->getCurlInfo( CURLINFO_HTTP_CODE );

		$Curl->closeRequest();

		if ( 503 == $httpCode )
		{
            throw new RuntimeException( 'Limit exceeded' );
        }

		$Response = $this->getJsonResponse( $rawResponse );

        if( $Response->hasErrors() )
        {
	        switch ( $Response->getErrorCode() )
	        {
		        case 'NOTFOUND':
		        {
			        throw new NotFoundException( $Response->getErrorMessage() );
		        }
	        }
        }

		return $Response->getResponse();
	}

	/**
	 * @param string $path
	 * @param array $options
	 * @return string
	 */
	protected function getRequestUrl( $path, array $options )
	{
		$defautlOptions = array(
			'search' => array(
				'{battle-tag}',
			),
			'replace' => array(
				$this->battleTag,
			),
		);

		if ( ! isset( $options['search'] ) )
		{
			$options['search'] = array();
		}

		if ( ! isset( $options['replace'] ) )
		{
			$options['replace'] = array();
		}

		$options['search'] = array_merge( $options['search'], $defautlOptions['search'] );
		$options['replace'] = array_merge( $options['replace'], $defautlOptions['replace'] );

		$path = str_replace( $options['search'], $options['replace'], $path );

		return $this->apiUrl . trim( $path, '/' ) . '/';
	}

	/**
	 * @return array
	 */
	protected function getRequestParameters()
	{
		return array(
			'locale' => $this->locale,
			'apikey' => $this->apiKey,
		);
	}

	/**
	 * @param string $rawResponse
	 * @return \Diablo3\Response\ResponseInterface
	 */
	protected function getJsonResponse( $rawResponse )
	{
		return new JsonResponse( $rawResponse );
	}

	/**
	 * @param string $apiName
	 * @throws \InvalidArgumentException
	 * @return \Diablo3\Api\AbstractApi
	 */
	public function api( $apiName )
	{
		switch ( $apiName )
		{
			case 'profile':
			{
				return $this->profile();
			}

			case 'hero':
			{
				return $this->hero();
			}

			case 'item':
			{
				return $this->item();
			}

			case 'follower':
			{
				return $this->follower();
			}

			case 'artisan':
			{
				return $this->artisan();
			}

			default:
			{
				throw new InvalidArgumentException( 'No such api at present time!' );
			}
		}
	}

	/**
	 * @return \Diablo3\Api\Profile
	 */
	public function profile()
	{
		if ( ! isset( $this->apis['profile'] ) )
		{
			$this->apis['profile'] = new Api\Profile( $this );
		}

		return $this->apis['profile'];
	}

	/**
	 * @return \Diablo3\Api\Hero
	 */
	public function hero()
	{
		if ( ! isset( $this->apis['hero'] ) )
		{
			$this->apis['hero'] = new Api\Hero( $this );
		}

		return $this->apis['hero'];
	}

	/**
	 * @return \Diablo3\Api\Item
	 */
	public function item()
	{
		if ( ! isset( $this->apis['item'] ) )
		{
			$this->apis['item'] = new Api\Item( $this );
		}

		return $this->apis['item'];
	}

	/**
	 * @return \Diablo3\Api\Follower
	 */
	public function follower()
	{
		if ( ! isset( $this->apis['follower'] ) )
		{
			$this->apis['follower'] = new Api\Follower( $this );
		}

		return $this->apis['follower'];
	}

	/**
	 * @return \Diablo3\Api\Artisan
	 */
	public function artisan()
	{
		if ( ! isset( $this->apis['artisan'] ) )
		{
			$this->apis['artisan'] = new Api\Artisan( $this );
		}

		return $this->apis['artisan'];
	}
}