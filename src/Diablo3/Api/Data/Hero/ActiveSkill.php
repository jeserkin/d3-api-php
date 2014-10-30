<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class ActiveSkill
{
	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Skill")
	 * @var \Diablo3\Api\Data\Hero\Skill
	 */
	private $skill;

	/**
	 * @JMS\Type("Diablo3\Api\Data\Hero\Rune")
	 * @var \Diablo3\Api\Data\Hero\Rune
	 */
	private $rune;

	/**
	 * @return \Diablo3\Api\Data\Hero\Skill
	 */
	public function getSkill()
	{
		return $this->skill;
	}

	/**
	 * @return \Diablo3\Api\Data\Hero\Rune
	 */
	public function getRune()
	{
		return $this->rune;
	}
}