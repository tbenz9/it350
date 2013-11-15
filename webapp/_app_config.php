<?php
/**
 * @package IT350
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Computer
	'GET:computers' => array('route' => 'Computer.ListView'),
	'GET:computer/(:any)' => array('route' => 'Computer.SingleView', 'params' => array('computersId' => 1)),
	'GET:api/computers' => array('route' => 'Computer.Query'),
	'POST:api/computer' => array('route' => 'Computer.Create'),
	'GET:api/computer/(:any)' => array('route' => 'Computer.Read', 'params' => array('computersId' => 2)),
	'PUT:api/computer/(:any)' => array('route' => 'Computer.Update', 'params' => array('computersId' => 2)),
	'DELETE:api/computer/(:any)' => array('route' => 'Computer.Delete', 'params' => array('computersId' => 2)),
		
	// Device
	'GET:devices' => array('route' => 'Device.ListView'),
	'GET:device/(:any)' => array('route' => 'Device.SingleView', 'params' => array('devicesId' => 1)),
	'GET:api/devices' => array('route' => 'Device.Query'),
	'POST:api/device' => array('route' => 'Device.Create'),
	'GET:api/device/(:any)' => array('route' => 'Device.Read', 'params' => array('devicesId' => 2)),
	'PUT:api/device/(:any)' => array('route' => 'Device.Update', 'params' => array('devicesId' => 2)),
	'DELETE:api/device/(:any)' => array('route' => 'Device.Delete', 'params' => array('devicesId' => 2)),
		
	// Employee
	'GET:employees' => array('route' => 'Employee.ListView'),
	'GET:employee/(:any)' => array('route' => 'Employee.SingleView', 'params' => array('employeesId' => 1)),
	'GET:api/employees' => array('route' => 'Employee.Query'),
	'POST:api/employee' => array('route' => 'Employee.Create'),
	'GET:api/employee/(:any)' => array('route' => 'Employee.Read', 'params' => array('employeesId' => 2)),
	'PUT:api/employee/(:any)' => array('route' => 'Employee.Update', 'params' => array('employeesId' => 2)),
	'DELETE:api/employee/(:any)' => array('route' => 'Employee.Delete', 'params' => array('employeesId' => 2)),
		
	// Harddrive
	'GET:harddrives' => array('route' => 'Harddrive.ListView'),
	'GET:harddrive/(:any)' => array('route' => 'Harddrive.SingleView', 'params' => array('harddrivesId' => 1)),
	'GET:api/harddrives' => array('route' => 'Harddrive.Query'),
	'POST:api/harddrive' => array('route' => 'Harddrive.Create'),
	'GET:api/harddrive/(:any)' => array('route' => 'Harddrive.Read', 'params' => array('harddrivesId' => 2)),
	'PUT:api/harddrive/(:any)' => array('route' => 'Harddrive.Update', 'params' => array('harddrivesId' => 2)),
	'DELETE:api/harddrive/(:any)' => array('route' => 'Harddrive.Delete', 'params' => array('harddrivesId' => 2)),
		
	// License
	'GET:licenses' => array('route' => 'License.ListView'),
	'GET:license/(:num)' => array('route' => 'License.SingleView', 'params' => array('licensesId' => 1)),
	'GET:api/licenses' => array('route' => 'License.Query'),
	'POST:api/license' => array('route' => 'License.Create'),
	'GET:api/license/(:num)' => array('route' => 'License.Read', 'params' => array('licensesId' => 2)),
	'PUT:api/license/(:num)' => array('route' => 'License.Update', 'params' => array('licensesId' => 2)),
	'DELETE:api/license/(:num)' => array('route' => 'License.Delete', 'params' => array('licensesId' => 2)),
		
	// Macaddress
	'GET:macaddresses' => array('route' => 'Macaddress.ListView'),
	'GET:macaddress/(:num)' => array('route' => 'Macaddress.SingleView', 'params' => array('macaddressesId' => 1)),
	'GET:api/macaddresses' => array('route' => 'Macaddress.Query'),
	'POST:api/macaddress' => array('route' => 'Macaddress.Create'),
	'GET:api/macaddress/(:num)' => array('route' => 'Macaddress.Read', 'params' => array('macaddressesId' => 2)),
	'PUT:api/macaddress/(:num)' => array('route' => 'Macaddress.Update', 'params' => array('macaddressesId' => 2)),
	'DELETE:api/macaddress/(:num)' => array('route' => 'Macaddress.Delete', 'params' => array('macaddressesId' => 2)),
		
	// Monitor
	'GET:monitors' => array('route' => 'Monitor.ListView'),
	'GET:monitor/(:any)' => array('route' => 'Monitor.SingleView', 'params' => array('monitorsId' => 1)),
	'GET:api/monitors' => array('route' => 'Monitor.Query'),
	'POST:api/monitor' => array('route' => 'Monitor.Create'),
	'GET:api/monitor/(:any)' => array('route' => 'Monitor.Read', 'params' => array('monitorsId' => 2)),
	'PUT:api/monitor/(:any)' => array('route' => 'Monitor.Update', 'params' => array('monitorsId' => 2)),
	'DELETE:api/monitor/(:any)' => array('route' => 'Monitor.Delete', 'params' => array('monitorsId' => 2)),
		
	// Phone
	'GET:phones' => array('route' => 'Phone.ListView'),
	'GET:phone/(:any)' => array('route' => 'Phone.SingleView', 'params' => array('phonesId' => 1)),
	'GET:api/phones' => array('route' => 'Phone.Query'),
	'POST:api/phone' => array('route' => 'Phone.Create'),
	'GET:api/phone/(:any)' => array('route' => 'Phone.Read', 'params' => array('phonesId' => 2)),
	'PUT:api/phone/(:any)' => array('route' => 'Phone.Update', 'params' => array('phonesId' => 2)),
	'DELETE:api/phone/(:any)' => array('route' => 'Phone.Delete', 'params' => array('phonesId' => 2)),
		
	// Review
	'GET:reviews' => array('route' => 'Review.ListView'),
	'GET:review/(:any)' => array('route' => 'Review.SingleView', 'params' => array('reviewer' => 1)),
	'GET:api/reviews' => array('route' => 'Review.Query'),
	'POST:api/review' => array('route' => 'Review.Create'),
	'GET:api/review/(:any)' => array('route' => 'Review.Read', 'params' => array('reviewer' => 2)),
	'PUT:api/review/(:any)' => array('route' => 'Review.Update', 'params' => array('reviewer' => 2)),
	'DELETE:api/review/(:any)' => array('route' => 'Review.Delete', 'params' => array('reviewer' => 2)),
		
	// Switch
	'GET:switches' => array('route' => 'Switch.ListView'),
	'GET:switch/(:any)' => array('route' => 'Switch.SingleView', 'params' => array('switchesId' => 1)),
	'GET:api/switches' => array('route' => 'Switch.Query'),
	'POST:api/switch' => array('route' => 'Switch.Create'),
	'GET:api/switch/(:any)' => array('route' => 'Switch.Read', 'params' => array('switchesId' => 2)),
	'PUT:api/switch/(:any)' => array('route' => 'Switch.Update', 'params' => array('switchesId' => 2)),
	'DELETE:api/switch/(:any)' => array('route' => 'Switch.Delete', 'params' => array('switchesId' => 2)),
		
	// Warranty
	'GET:warranties' => array('route' => 'Warranty.ListView'),
	'GET:warranty/(:num)' => array('route' => 'Warranty.SingleView', 'params' => array('warrantyId' => 1)),
	'GET:api/warranties' => array('route' => 'Warranty.Query'),
	'POST:api/warranty' => array('route' => 'Warranty.Create'),
	'GET:api/warranty/(:num)' => array('route' => 'Warranty.Read', 'params' => array('warrantyId' => 2)),
	'PUT:api/warranty/(:num)' => array('route' => 'Warranty.Update', 'params' => array('warrantyId' => 2)),
	'DELETE:api/warranty/(:num)' => array('route' => 'Warranty.Delete', 'params' => array('warrantyId' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>