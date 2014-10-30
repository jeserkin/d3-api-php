<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class PassiveSkill
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Skill")
	 * @var \Diablo3\Api\Data\Hero\Skill
	 */
	private $skill;

	/**
	 * @return \Diablo3\Api\Data\Hero\Skill
	 */
	public function getSkill()
	{
		return $this->skill;
	}
}