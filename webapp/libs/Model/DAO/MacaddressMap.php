<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * MacaddressMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MacaddressDAO to the macaddresses datastore.
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
class MacaddressMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Macaddress object
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
			$fm["MacaddressesId"] = new FieldMap("MacaddressesId","macaddresses","macaddresses_ID",true,FM_TYPE_INT,11,null,true);
			$fm["ComputersId"] = new FieldMap("ComputersId","macaddresses","computers_ID",false,FM_TYPE_VARCHAR,10,null,false);
			$fm["MacAddress"] = new FieldMap("MacAddress","macaddresses","mac_address",false,FM_TYPE_VARCHAR,23,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Macaddress object
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