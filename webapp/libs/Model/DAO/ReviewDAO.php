<?php
/** @package It350::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ReviewMap.php");

/**
 * ReviewDAO provides object-oriented access to the reviews table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package It350::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ReviewDAO extends Phreezable
{
	/** @var string */
	public $Reviewer;

	/** @var date */
	public $ReviewDate;

	/** @var int */
	public $Rating;



}
?>