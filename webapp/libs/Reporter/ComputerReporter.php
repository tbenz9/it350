<?php
/** @package    It350::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Computer object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package It350::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ComputerReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `computers` table
	public $CustomFieldExample;

	public $ComputersId;
	public $Hostname;
	public $OperatingSystem;
	public $Motherboard;
	public $Ram;
	public $AssignmentDate;
	public $UpgradeDate;
	public $EmployeesId;

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
			,`computers`.`computers_ID` as ComputersId
			,`computers`.`hostname` as Hostname
			,`computers`.`operating_system` as OperatingSystem
			,`computers`.`motherboard` as Motherboard
			,`computers`.`ram` as Ram
			,`computers`.`assignment_date` as AssignmentDate
			,`computers`.`upgrade_date` as UpgradeDate
			,`computers`.`employees_ID` as EmployeesId
		from `computers`";

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
		$sql = "select count(1) as counter from `computers`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>