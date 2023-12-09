<?php
/*
Plugin Name: WordPress Backend AdBlocker
Plugin URI:  https://github.com/Clickadelic/wp-backend-ad-blocker
Description: Blocks many of the Pro-Ads for plugins in the WordPress backend.
Version:     1.0.0
Author:      Tobias Hopp
Author URI:  https://www.tobias-hopp.de
License:     GPL2
License URI: GPL2
Text Domain: wp-backend-ad-blocker
Domain Path: /languages
*/

if(!defined('ABSPATH')) {
	exit('You don\'t belong here!');
}

if(!class_exists('WP_Backend_Ad_Blocker')){
	class WP_Backend_Ad_Blocker {
		public function __construct(){
			add_action("init", [$this, "init_plugin_textdomain"]);
			add_action("admin_enqueue_style", [$this, "load_backend_style"]);
		}

		public static function load_backend_style(){
			admin_enqueue_script("wp-backend-ad-blocker-style",  plugin_dir_url( __FILE__ ) . 'assets/css/wp-backend-ad-blocker.css', null, false, 'all');
		}

		public static function init_plugin_textdomain(){
			load_plugin_textdomain( 'wp-backend-ad-blocker', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
	}
}

$WP_Backend_Ad_Blocker = new WP_Backend_Ad_Blocker();