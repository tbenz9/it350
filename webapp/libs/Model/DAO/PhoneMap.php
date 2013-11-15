<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * PhoneMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PhoneDAO to the phones datastore.
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
class PhoneMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Phone object
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
			$fm["PhonesId"] = new FieldMap("PhonesId","phones","phones_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["SerialNumber"] = new FieldMap("SerialNumber","phones","serial_number",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["Model"] = new FieldMap("Model","phones","model",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Ip"] = new FieldMap("Ip","phones","ip",false,FM_TYPE_VARCHAR,15,null,false);
			$fm["SwitchPort"] = new FieldMap("SwitchPort","phones","switch_port",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["EmployeesId"] = new FieldMap("EmployeesId","phones","employees_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Phone object
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