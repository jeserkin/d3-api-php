<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3;

use Diablo3\Api\Profile,
	Diablo3\Util\Curl,
	InvalidArgumentException;

class Client
{
	const
		URL = 'battle.net/api/d3/';

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
	 * The list of loaded API instances
	 *
	 * @var array
	 */
	private $apis = array();

	/**
	 * @param string $region
	 * @param string $battleTagName
	 * @param int $battleTagCode
	 */
	public function __construct( $region, $battleTagName, $battleTagCode )
	{
		$this->apiUrl        = 'http://' . $region . '.' . self::URL;
		$this->battleTagName = $battleTagName;
		$this->battleTagCode = $battleTagCode;
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
		$Curl->curlGet( $this->getApiUrl() . $path );

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
}
