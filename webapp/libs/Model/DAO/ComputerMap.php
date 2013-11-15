<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * ComputerMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ComputerDAO to the computers datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package It350::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ComputerMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Computer object
	 *
	 * @access public
	 * @return array of FieldMaps
	 */
	public static function GetFieldMaps()
	{
		static $fm = null;
		if ($fm == null)
		{
			$fm = Array();
			$fm["ComputersId"] = new FieldMap("ComputersId","computers","computers_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["Hostname"] = new FieldMap("Hostname","computers","hostname",false,FM_TYPE_VARCHAR,64,null,false);
			$fm["OperatingSystem"] = new FieldMap("OperatingSystem","computers","operating_system",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Motherboard"] = new FieldMap("Motherboard","computers","motherboard",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Ram"] = new FieldMap("Ram","computers","ram",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["AssignmentDate"] = new FieldMap("AssignmentDate","computers","assignment_date",false,FM_TYPE_DATE,null,null,false);
			$fm["UpgradeDate"] = new FieldMap("UpgradeDate","computers","upgrade_date",false,FM_TYPE_DATE,null,null,false);
			$fm["EmployeesId"] = new FieldMap("EmployeesId","computers","employees_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Computer object
	 *
	 * @access public
	 * @return array of KeyMaps
	 */
	public static function GetKeyMaps()
	{
		static $km = null;
		if ($km == null)
		{
			$km = Array();
		}
		return $km;
	}

}

?>