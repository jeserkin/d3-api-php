<?php
namespace Diablo3\Api;

class Profile extends AbstractApi
{
	/**
	 * @return \Diablo3\Api\Data\Profile\Profile
	 */
	public function getProfile()
	{
		return $this->get( 'Profile\Profile', '/profile/{battle-tag}/' );
	}
}