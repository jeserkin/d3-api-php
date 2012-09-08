<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3;

use Diablo3\Api\Profile,
	Diablo3\Util\Curl,
	InvalidArgumentException,
	Diablo3\Exception\NotFoundException;

class Client
{
	const
		URL = 'battle.net/api/d3/';

	const
		LOCALE_EN = 'en',
		LOCALE_ES = 'es',
		LOCALE_PT = 'pt',
		LOCALE_IT = 'it',
		LOCALE_DE = 'de',
		LOCALE_FR = 'fr',
		LOCALE_PL = 'pl',
		LOCALE_RU = 'ru',
		LOCALE_TR = 'tr',
		LOCALE_KO = 'ko',
		LOCALE_ZH = 'zh';

	/**
	 * @var string
	 */
	private $apiUrl;

	/**
	 * @var string
	 */
	private $battleTagName;

	/**
	 * @var int
	 */
	private $battleTagCode;

	/**
	 * @var string
	 */
	private $locale;

	/**
	 * @var array
	 */
	private $allowedLocales = array(
		'en', 'es', 'pt',
		'it', 'de', 'fr',
		'pl', 'ru', 'tr',
		'ko', 'zh',
	);

	/**
	 * The list of loaded API instances
	 *
	 * @var array
	 */
	private $apis = array();

	/**
	 * @param string $region
	 * @param string $battleTagName
	 * @param int $battleTagCode
	 * @param string $locale
	 * @throws NotFoundException
	 */
	public function __construct( $region, $battleTagName, $battleTagCode, $locale )
	{
		$this->apiUrl        = 'http://' . $region . '.' . self::URL;
		$this->battleTagName = $battleTagName;
		$this->battleTagCode = $battleTagCode;

		if ( ! in_array( $locale, $this->allowedLocales ) )
		{
			throw new NotFoundException( 'Specified is not used at present time!' );
		}

		$this->locale = $locale;
	}

	/**
	 * @return string
	 */
	private function getApiUrl()
	{
		return $this->apiUrl;
	}

	/**
	 * @return string
	 */
	public function getBattleTagName()
	{
		return $this->battleTagName;
	}

	/**
	 * @return int
	 */
	public function getBattleTagCode()
	{
		return $this->battleTagCode;
	}

	/**
	 * @param string $path
	 * @return mixed
	 */
	public function get( $path )
	{
		$Curl = new Curl();
		$Curl->curlGet( $this->getApiUrl() . $path, $this->getOptions() );

		return json_decode( $Curl->fetch() );
	}

	/**
	 * @param string $apiName
	 * @throws InvalidArgumentException
	 * @return Api\AbstractApi
	 */
	public function api( $apiName )
	{
		switch ( $apiName )
		{
			case 'profile':
			{
				return $this->profile();
			}

			default:
			{
				throw new InvalidArgumentException( 'No such api at present time!' );
			}
		}
	}

	/**
	 * @return Profile
	 */
	public function profile()
	{
		if ( ! isset( $this->apis['profile'] ) )
		{
			$this->apis['profile'] = new Profile( $this );
		}

		return $this->apis['profile'];
	}

	/**
	 * @return array
	 */
	private function getOptions()
	{
		$options = array();

		if ( null !== $this->locale )
		{
			$options['locale'] = $this->locale;
		}

		return $options;
	}
}
