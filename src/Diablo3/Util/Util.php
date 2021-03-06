<?php
/**
 * @author  Eugene Serkin <jeserkin@gmail.com>
 * @version $Id$
 */
namespace Diablo3\Util;

class Util
{
	/**
	 * @static
	 * @param mixed $value
	 * @return string
	 */
	static public function toSting( $value )
	{
		return ( $value && trim( $value ) ) ? strval( $value ) : '';
	}
}
