<?php
namespace Diablo3;

use Diablo3\Exception\InvalidRegionException,
	Diablo3\Exception\InvalidBattleTagException,
	Diablo3\Exception\InvalidLocaleException,
	
	InvalidArgumentException;

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
		
		$this->apiUrl = 'http://' . $region . '.' . self::BASE_URL;
		
		if ( ! $this->isValidBattleTag( $battleTag ) )
		{
			throw new InvalidBattleTagException( 'Passed battle tag is of invalid format!' );
		}
		
		$this->battleTag = $battleTag;

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
	
	public function get()
	{
		
	}
	
	protected function parseRequestParameters()
	{
		
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