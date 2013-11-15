<?php
/** @package It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("MonitorMap.php");

/**
 * MonitorDAO provides object-oriented access to the monitors table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package It350::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class MonitorDAO extends Phreezable
{
	/** @var string */
	public $MonitorsId;

	/** @var string */
	public $SerialNumber;

	/** @var string */
	public $Model;

	/** @var int */
	public $ScreenSize;

	/** @var string */
	public $ComputersId;



}
?>