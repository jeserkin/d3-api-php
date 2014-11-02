<?php
namespace Diablo3\Api\Data\Hero;

use JMS\Serializer\Annotation as JMS;

class CompletedQuest
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $slug;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private $name;

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}