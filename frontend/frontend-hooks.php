<?php 
// Just to Make Sure Nothing Unexpected Happens if the Script is Called Directly
if ( ! defined( 'WPINC' ) ) {
	die;
}

//Enqueue Styles and Scripts
function pw_lightweight_social_media_slider_plugin_styles() {
	
	if ('public' == esc_attr( get_option('smsb-slider-active', 'disabled')) || ('admin' == esc_attr( get_option('smsb-slider-active', 'disabled')) && current_user_can( 'manage_options' ))) {
	
		wp_enqueue_style( 'social-sliderbox-font', plugin_dir_url( dirname(__FILE__) ) . 'font/social-slider-font.css', false );
		wp_enqueue_style( 'social-sliderbox-css', plugin_dir_url( dirname(__FILE__) ) . 'style/lightweight-social-media-slider.css', false );
		wp_enqueue_script( 'social-sliderbox-js', plugin_dir_url( dirname(__FILE__) ) . 'js/lightweight-social-media-slider.js', array('jquery'), '1.0.0', true );
	
	}

}

add_action( 'wp_enqueue_scripts', 'pw_lightweight_social_media_slider_plugin_styles' );

//Load HTML to wp_footer
function pw_lightweight_social_media_slider_plugin_html() {
	
	if ('public' == esc_attr( get_option('smsb-slider-active', 'disabled')) || ('admin' == esc_attr( get_option('smsb-slider-active', 'disabled')) && current_user_can( 'manage_options' ))) {
		include_once 'frontend-template.php';
	}
}
add_action( 'wp_footer', 'pw_lightweight_social_media_slider_plugin_html', 19 );

?>