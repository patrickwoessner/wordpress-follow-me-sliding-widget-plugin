<?php
/*
Plugin Name: Follow Me Social Sliding Widget Plugin
Plugin URI: https://woessner.me/lightweight-social-media-slider/
Description: This is a social slider plugin to grow your social media following. Ultra lightweight - tiny icon font, no social media platform SDKs or other external resources.
Author: Patrick Woessner
Version: 1.0
Author URI: https://woessner.me
License: GPLv3
*/
/*
 Copyright 2016  Patrick Woessner  (E-Mail : patrick@woessner.me)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 3, as
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Just to Make Sure Nothing Unexpected Happens if the Script is Called Directly
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Setup Plugin
function pw_lightweight_social_media_slider_plugin_activated() {
	add_option('smsb-social-uri', 'https://facebook.com/sluge');
	add_option('smsb-social-network', 'fb');
	add_option('smsb-position-visible-after', '1000');
	add_option('smsb-position-distance', '20');
	add_option('smsb-slider-active', 'disabled');
	add_option('smsb-social-pic-uri', plugin_dir_url( dirname(__FILE__) ).'img/dummy-profile-pic.jpg' );
	add_option('smsb-text-close', 'Don\'t bother me again');
	add_option('smsb-text-headline', 'Follow us on Facebook');
	add_option('smsb-text-description', 'And never miss an update.');
	add_option('smsb-text-cta', 'Follow us');
}

register_activation_hook( __FILE__, 'pw_lightweight_social_media_slider_plugin_activated' );

// Load Plugin
function pw_lightweight_social_media_slider_plugin_load_files() {
	require_once plugin_dir_path( __FILE__ ) .'/admin/control-panel.php';
	require_once plugin_dir_path( __FILE__ ) .'/frontend/frontend-hooks.php';
}

add_action('wp_loaded', 'pw_lightweight_social_media_slider_plugin_load_files');

?>