<?php

// Module namespace
namespace LittleBizzy\PluginNamespace\Includes\Modules\Sample_Module;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Module constants
const FILE = __FILE__;
const PREFIX = 'sample_module';
const VERSION = '1.0.0';

// Module class
Class Sample_Module {
	private static $instance;

	public static function get_instance() {
		if(! isset(self::$instance)) {
			self::$instance = new self;
			self::$instance->setup();
		}

		return self::$instance;
	}

	public function setup() {
		// custom wp-admin footer text
		add_filter('admin_footer_text', array($this, 'change_footer_admin_text'), 9999);
	}

	public function change_footer_admin_text() {
		return "Hello, my name is LittleBizzy";
	}

	private function __construct() {
		/* private for singleton purpose */ 
	}
}