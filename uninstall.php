<?php
/**
 * Runs on Uninstall of Lightweight Social Media Slider
 *
 * @package   Lightweight Social Media Slider
 * @author    Patrick Woessner
 * @license   GPL-2.0+
 * @link      https://woessner.me/lightweight-social-media-slider/
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('smsb-social-uri');
delete_option('smsb-social-network');
delete_option('smsb-position-visible-after');
delete_option('smsb-position-distance');
delete_option('smsb-slider-active');
delete_option('smsb-social-pic-uri');
delete_option('smsb-text-close');
delete_option('smsb-text-headline');
delete_option('smsb-text-description');
delete_option('smsb-text-cta');

?>