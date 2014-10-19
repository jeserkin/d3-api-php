<?php
namespace Diablo3\Api\Data\Profile;

use JMS\Serializer\Annotation as JMS;

class TimePlayed
{
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $barbarian;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $crusader;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("demon-hunter")
	 * @var float
	 */
	private $demonHunter;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $monk;
	
	/**
	 * @JMS\Type("double")
	 * @JMS\SerializedName("witch-doctor")
	 * @var float
	 */
	private $witchDoctor;
	
	/**
	 * @JMS\Type("double")
	 * @var float
	 */
	private $wizard;

	/**
	 * @return float
	 */
	public function getBarbarian()
	{
		return $this->barbarian;
	}

	/**
	 * @return float
	 */
	public function getCrusader()
	{
		return $this->crusader;
	}

	/**
	 * @return float
	 */
	public function getDemonHunter()
	{
		return $this->demonHunter;
	}

	/**
	 * @return float
	 */
	public function getMonk()
	{
		return $this->monk;
	}

	/**
	 * @return float
	 */
	public function getWitchDoctor()
	{
		return $this->witchDoctor;
	}

	/**
	 * @return float
	 */
	public function getWizard()
	{
		return $this->wizard;
	}
}