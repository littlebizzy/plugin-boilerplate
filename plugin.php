<?php
/*
Plugin Name: The Plugin Name
Plugin URI: https://www.littlebizzy.com/plugins/[plugin-slug]
Description: [Plugin description]
Version: 1.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
Text Domain: the-plugin-name
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
PBP Version: 1.3.0
WC requires at least: 3.3
WC tested up to: 3.5
Prefix: littlebizzy
*/

// Plugin namespace
namespace LittleBizzy\PluginNamespace;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Plugin constants
const FILE = __FILE__;
const PREFIX = 'littlebizzy';
const VERSION = '1.0.0';
const REPO = '[github-account/repo-slug]';

// Main class
Class Plugin {
	private static $instance;
	public $includes_dir, $modules_dir;

	public static function get_instance() {
		if(! isset(self::$instance)) {
			self::$instance = new self;
			self::$instance->setup();
			self::$instance->load_includes();
			self::$instance->load_modules();
		}

		return self::$instance;
	}

	public function setup() {
		// set vars
		$this->includes_dir = dirname(FILE) . '/includes/';
		$this->modules_dir = $this->includes_dir . 'modules/';

		// load localization
		add_action('plugins_loaded', array($this, 'load_localization'));
	}

	public function load_localization() {
	    load_plugin_textdomain('the-plugin-name', false, dirname(plugin_basename(FILE)) . '/languages/');
	}

	public function load_includes() {
		// Include files
		require_once $this->includes_dir . 'notices/admin-notices-ms.php';
		require_once $this->includes_dir . 'notices/admin-notices.php';
		require_once $this->includes_dir . 'settings-page.php';

		// Admin Notices
		Includes\Notices\Admin_Notices::instance(__FILE__);

		/**
		 * Admin Notices Multisite check
		 * Uncomment "return;" to disable this plugin on Multisite installs
		 */
		if (false !== Includes\Notices\Admin_Notices_MS::instance(__FILE__)) { /* return; */ }

		// Run another instances
		Includes\Settings_Page::get_instance();
	}

	public function load_modules() {
		// Include files
		require_once $this->modules_dir . 'sample-module/sample-module.php';

		// Run instances
		Includes\Modules\Sample_Module\Sample_Module::get_instance();
	}

	private function __construct() {
		/* private for singleton purpose */ 
	}
}

Plugin::get_instance();