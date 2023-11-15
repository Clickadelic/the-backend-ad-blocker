<?php
/*
Plugin Name: WordPress Backend AdBlocker
Plugin URI:  https://bitbucket.org/webdev-hq/dod-motors-admin-customization/src/master/
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
			add_action("admin_enqueue_style", [$this, "load_backend_style"]);
		}

		public static function load_backend_style(){
			admin_enqueue_style("wp-backend-ad-blocker-style",  plugin_dir_url( __FILE__ ) . '/assets/css/wp-backend-ad-blocker.css', null, null, 'all');
		}
	}
}

$wp_backend_ad_blocker = new WP_Backend_Ad_Blocker();