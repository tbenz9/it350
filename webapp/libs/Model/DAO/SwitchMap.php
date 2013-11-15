<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * SwitchMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SwitchDAO to the switches datastore.
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
class SwitchMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Switch object
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
			$fm["SwitchesId"] = new FieldMap("SwitchesId","switches","switches_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["Password"] = new FieldMap("Password","switches","password",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Username"] = new FieldMap("Username","switches","username",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Location"] = new FieldMap("Location","switches","location",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Model"] = new FieldMap("Model","switches","model",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Smart"] = new FieldMap("Smart","switches","smart",false,FM_TYPE_TINYINT,1,null,false);
			$fm["Managed"] = new FieldMap("Managed","switches","managed",false,FM_TYPE_TINYINT,1,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Switch object
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