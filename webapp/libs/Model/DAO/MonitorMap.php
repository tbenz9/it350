<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * MonitorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MonitorDAO to the monitors datastore.
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
class MonitorMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Monitor object
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
			$fm["MonitorsId"] = new FieldMap("MonitorsId","monitors","monitors_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["SerialNumber"] = new FieldMap("SerialNumber","monitors","serial_number",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["Model"] = new FieldMap("Model","monitors","model",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["ScreenSize"] = new FieldMap("ScreenSize","monitors","screen_size",false,FM_TYPE_TINYINT,4,null,false);
			$fm["ComputersId"] = new FieldMap("ComputersId","monitors","computers_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Monitor object
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