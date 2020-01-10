<?php
/*
Plugin Name: The Plugin Name
Plugin URI: https://www.littlebizzy.com/plugins/[plugin-slug]
Description: [Plugin description]
Version: 0.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
PBP Version: 1.2.1
WC requires at least: 3.3
WC tested up to: 3.8
Prefix: ABCDEF
*/

// Plugin namespace
namespace LittleBizzy\PluginNamespace;

// Plugin constants
const FILE = __FILE__;
const PREFIX = '[6 chars prefix]';
const VERSION = '0.0.0';
const REPO = '[github-account/repo-slug]';

// Boot
require_once dirname(FILE).'/helpers/boot.php';
Helpers\Boot::instance(FILE);
