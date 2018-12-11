<?php
/*
Plugin Name: The Plugin Name
Plugin URI: https://www.littlebizzy.com/plugins/[plugin-slug]
Description: [Plugin description]
Version: 1.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 3.3
WC tested up to: 3.4
*/

// Plugin namespace
namespace LittleBizzy\PluginNamespace;

// Aliased namespaces
use LittleBizzy\PluginNamespace\Notices;

// Plugin constants
const FILE = __FILE__;
const PREFIX = '[6 chars prefix]';
const VERSION = '1.0.0';

// Block direct calls
if (!function_exists('add_action')) {
	die;
}

// Loader
require_once dirname(FILE).'/helpers/loader.php';

// Admin Notices
Notices\Admin_Notices::instance(FILE);

/**
 * Admin Notices Multisite check
 * Uncomment "return;" to disable this plugin on Multisite installs
 */
if (false !== Notices\Admin_Notices_MS::instance(FILE)) { /* return; */ }

// Run the main class
Helpers\Runner::start('Core\Core', 'instance');