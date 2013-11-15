<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * ReviewMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ReviewDAO to the reviews datastore.
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
class ReviewMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Review object
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
			$fm["Reviewer"] = new FieldMap("Reviewer","reviews","reviewer",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["ReviewDate"] = new FieldMap("ReviewDate","reviews","review_date",false,FM_TYPE_DATE,null,null,false);
			$fm["Rating"] = new FieldMap("Rating","reviews","rating",false,FM_TYPE_INT,11,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Review object
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