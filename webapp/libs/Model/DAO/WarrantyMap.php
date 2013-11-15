<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * WarrantyMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WarrantyDAO to the warranties datastore.
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
class WarrantyMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Warranty object
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
			$fm["WarrantyId"] = new FieldMap("WarrantyId","warranties","warranty_ID",true,FM_TYPE_INT,11,null,true);
			$fm["Expires"] = new FieldMap("Expires","warranties","expires",false,FM_TYPE_DATE,null,null,false);
			$fm["Vendor"] = new FieldMap("Vendor","warranties","vendor",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["WarrantyLength"] = new FieldMap("WarrantyLength","warranties","warranty_length",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["PurchaseDate"] = new FieldMap("PurchaseDate","warranties","purchase_date",false,FM_TYPE_DATE,null,null,false);
			$fm["DevicesId"] = new FieldMap("DevicesId","warranties","devices_ID",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Warranty object
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