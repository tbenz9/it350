<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * HarddriveMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HarddriveDAO to the harddrives datastore.
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
class HarddriveMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Harddrive object
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
			$fm["HarddrivesId"] = new FieldMap("HarddrivesId","harddrives","harddrives_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["Capacity"] = new FieldMap("Capacity","harddrives","capacity",false,FM_TYPE_INT,11,null,false);
			$fm["SerialNumber"] = new FieldMap("SerialNumber","harddrives","serial_number",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["Model"] = new FieldMap("Model","harddrives","model",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["ComputersId"] = new FieldMap("ComputersId","harddrives","computers_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Harddrive object
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