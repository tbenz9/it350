<?php
/** @package    It350::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Employee object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package It350::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EmployeeReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `employees` table
	public $CustomFieldExample;

	public $EmployeesId;
	public $EmployeeFirstname;
	public $EmployeeLastname;
	public $Email;
	public $Title;
	public $Manager;
	public $OfficeNumber;
	public $HireDate;
	public $PhoneNumber;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`employees`.`employees_ID` as EmployeesId
			,`employees`.`employee_firstname` as EmployeeFirstname
			,`employees`.`employee_lastname` as EmployeeLastname
			,`employees`.`email` as Email
			,`employees`.`title` as Title
			,`employees`.`manager` as Manager
			,`employees`.`office_number` as OfficeNumber
			,`employees`.`hire_date` as HireDate
			,`employees`.`phone_number` as PhoneNumber
		from `employees`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `employees`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>