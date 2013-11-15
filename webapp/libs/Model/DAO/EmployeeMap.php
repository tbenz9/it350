<?php
/** @package    It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * EmployeeMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EmployeeDAO to the employees datastore.
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
class EmployeeMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Employee object
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
			$fm["EmployeesId"] = new FieldMap("EmployeesId","employees","employees_ID",true,FM_TYPE_VARCHAR,10,null,false);
			$fm["EmployeeFirstname"] = new FieldMap("EmployeeFirstname","employees","employee_firstname",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["EmployeeLastname"] = new FieldMap("EmployeeLastname","employees","employee_lastname",false,FM_TYPE_VARCHAR,20,null,false);
			$fm["Email"] = new FieldMap("Email","employees","email",false,FM_TYPE_VARCHAR,40,null,false);
			$fm["Title"] = new FieldMap("Title","employees","title",false,FM_TYPE_VARCHAR,100,null,false);
			$fm["Manager"] = new FieldMap("Manager","employees","manager",false,FM_TYPE_VARCHAR,10,null,false);
			$fm["OfficeNumber"] = new FieldMap("OfficeNumber","employees","office_number",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["HireDate"] = new FieldMap("HireDate","employees","hire_date",false,FM_TYPE_DATE,null,null,false);
			$fm["PhoneNumber"] = new FieldMap("PhoneNumber","employees","phone_number",false,FM_TYPE_VARCHAR,20,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Employee object
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