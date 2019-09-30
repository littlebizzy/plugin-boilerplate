<?php

// Module namespace
namespace LittleBizzy\PluginNamespace\Includes;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ){
	exit;
}

// Use main plugin namespace
use LittleBizzy\PluginNamespace as PluginRoot;
use function LittleBizzy\PluginNamespace\Includes\pluginRender;

// Module class
Class Settings_Page {
	private static $instance;
	private $prefix = PluginRoot\PREFIX;
	private $plugin_file = PluginRoot\FILE;

	private function __construct() {
		//enqueue scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );
	}

	public static function get_instance() {
		if(! isset(self::$instance)) {
			self::$instance = new self;
			self::$instance->setup();
		}

		return self::$instance;
	}

	public function setup() {
		// admin menu
		add_action('admin_menu', array($this, 'admin_menu'));

		// save settings
		add_action(sprintf("admin_action_%s_save_settings", $this->prefix), array($this, 'save_settings'));
	}

	public function load_scripts() {
		// load additional css for this settings page
		wp_enqueue_style('settings-page', plugins_url('assets/admin/css/settings-page.css', $this->plugin_file));
	}

	public function admin_menu() {
		add_menu_page('LittleBizzy', 'LittleBizzy', 'manage_options',
			sprintf("%s-settings", $this->prefix), array($this, 'settings_do_page'));
	}

	public function settings_do_page() {
		//params for view file
		$params = array(
			'prefix'  => $this->prefix,
			'data'    => $this->get_settings(),
			'updated' => isset($_GET['updated']) ? $_GET['updated'] : false
		);

		// load settings page view
		pluginRender( 'admin/html-settings-page', $params );
	}

	public function save_settings() {
		// check nonce
	    check_admin_referer( 'save-plugin-settings' );

    	$post_data = array(
			'first_option' => sanitize_text_field($_POST['first_option']),
			'second_option' => sanitize_text_field($_POST['second_option']),
		);

	    // get previous data
	    $previous_data = $this->get_settings();

		// merge previous data with post data
	    $updated_data = array_merge($previous_data, $post_data);

	    // update settings
	    $option_name = sprintf("%s-settings", $this->prefix);
	    update_option($option_name, $updated_data);

	    // redirect
	    wp_redirect(add_query_arg('updated', '1', $_SERVER['HTTP_REFERER']));
	    exit();
	}

	public function get_settings() {
		$option_name = sprintf("%s-settings", $this->prefix);
		$default = array(
			'first_option' => '',
			'second_option' => '',
		);

		return get_option($option_name, $default);
	}
}