<?php
namespace Diablo3\Api;

class Hero extends AbstractApi
{
	/**
	 * @param int $heroId
	 * @return \Diablo3\Api\Data\Hero\Hero
	 */
	public function getHero( $heroId )
	{
		return $this->get( 'Hero\Hero', '/profile/{battle-tag}/hero/{hero-id}', array(
			'search'  => array( '{hero-id}' ),
			'replace' => array( $heroId ),
		) );
	}
}