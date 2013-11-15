<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * LicenseMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LicenseDAO to the licenses datastore.
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
class LicenseMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the License object
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
			$fm["LicensesId"] = new FieldMap("LicensesId","licenses","licenses_ID",true,FM_TYPE_INT,11,null,true);
			$fm["LicenseKey"] = new FieldMap("LicenseKey","licenses","license_key",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["NumberTimesActivated"] = new FieldMap("NumberTimesActivated","licenses","number_times_activated",false,FM_TYPE_TINYINT,4,null,false);
			$fm["MaxActivation"] = new FieldMap("MaxActivation","licenses","max_activation",false,FM_TYPE_TINYINT,4,null,false);
			$fm["LicenseName"] = new FieldMap("LicenseName","licenses","license_name",false,FM_TYPE_VARCHAR,45,null,false);
			$fm["LicenseExpirationDate"] = new FieldMap("LicenseExpirationDate","licenses","license_expiration_date",false,FM_TYPE_DATE,null,null,false);
			$fm["ComputersId"] = new FieldMap("ComputersId","licenses","computers_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the License object
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