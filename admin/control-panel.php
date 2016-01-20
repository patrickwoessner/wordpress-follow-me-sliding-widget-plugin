<?php
// Make sure the script isn't called directly
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Create Admin Menu and Register Menu Settings
add_action('admin_menu', 'pw_lightweight_social_media_slider_plugin_create_menu');

function pw_lightweight_social_media_slider_plugin_create_menu() {

	//Create new Settings Sub-Menu
	add_submenu_page('options-general.php','Lightweight Social Media Slider Plugin Settings', 'Social Media Slider', 'administrator', __FILE__, 'pw_lightweight_social_media_slider_plugin_settings_page');

	//Call Register Settings Function
	add_action( 'admin_init', 'pw_lightweight_social_media_slider_plugin_register_settings' );
}

//Register Plugin Settings
function pw_lightweight_social_media_slider_plugin_register_settings() {
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-social-uri' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-social-network' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-position-visible-after' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-position-distance' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-slider-active' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-social-pic-uri' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-text-headline' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-text-description' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-text-cta' );
	register_setting( 'pw-lightweight-social-media-slider-settings-group', 'smsb-text-close' );
}

//Build Options Page Form
function pw_lightweight_social_media_slider_plugin_settings_page() {
	
	$available_social_networks = array (
			0 => array ('name' => 'Facebook', 'short' => 'fb'),
			1 => array ('name' => 'Twitter', 'short' => 'tw'),
			2 => array ('name' => 'Instagram', 'short' => 'ig'),
			3 => array ('name' => 'Google+', 'short' => 'gp'),
			4 => array ('name' => 'Pinterest', 'short' => 'pi'),
			5 => array ('name' => 'YouTube', 'short' => 'yt'),
			6 => array ('name' => 'Flickr', 'short' => 'fl'),
			7 => array ('name' => 'Linkedin', 'short' => 'li'),
			8 => array ('name' => 'Vimeo', 'short' => 'vi'),
			9 => array ('name' => 'E-Mail', 'short' => 'em'),
			10 => array ('name' => 'RSS', 'short' => 'rs'),
	);
?>
<div class="wrap">
<h2>Lightweight Social Media Slider Plugin Settings</h2>

<h3>Social Media Profiles</h3>

<form method="post" action="options.php">
    <?php settings_fields( 'pw-lightweight-social-media-slider-settings-group' ); ?>
    <?php do_settings_sections( 'pw-lightweight-social-media-slider-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Social Profile URL</th>
        <td><input type="text" name="smsb-social-uri" value="<?php echo esc_attr( get_option('smsb-social-uri', 'https://facebook.com/slug' )); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Social Network</th>
        <td>
	        <select name="smsb-social-network">
				<?php foreach ($available_social_networks as $option) { ?>
					<option <?php if (esc_attr( get_option('smsb-social-network', 'fb' )) == $option['short'] ){ echo 'selected="selected"'; } ?> value="<?php echo $option['short']; ?>"><?php echo htmlentities($option['name']); ?></option>
				<?php } ?>
			</select>
		</td>
        </tr>
    </table>
    
<h3>Social Profile Image</h3>
    
    <label for="upload_image">
    	<input class="pw-lightweight-admin-upload-image" type="text" size="36" name="smsb-social-pic-uri" value="<?php echo esc_attr( get_option('smsb-social-pic-uri', plugin_dir_url( dirname(__FILE__) ).'img/dummy-profile-pic.jpg' )); ?>"> 
    	<input class="pw-lightweight-admin-upload-image-button button" type="button" value="Upload Image">
    	<br />Enter a URL or upload an image. Image size is 80x80 px.
	</label>
	
<h3>Slider Text</h3>

 	<table class="form-table">
        <tr valign="top">
        <th scope="row">Headline</th>
        <td><input type="text" name="smsb-text-headline" value="<?php echo esc_attr( get_option('smsb-text-headline', 'Follow us on Facebook' )); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Description</th>
        <td><input type="text" name="smsb-text-description" value="<?php echo esc_attr( get_option('smsb-text-description', 'And never miss an update.' )); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Call-To-Action / Button Text</th>
        <td><input type="text" name="smsb-text-cta" value="<?php echo esc_attr( get_option('smsb-text-cta', 'Follow us' )); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Close Text</th>
        <td><input type="text" name="smsb-text-close" value="<?php echo esc_attr( get_option('smsb-text-close', 'Don\'t bother me again' )); ?>" /></td>
        </tr>
	</table>
    
<h3>Position</h3>

	<table class="form-table">
	    <tr valign="top">
        	<th scope="row">Visible after Px</th>
        	<td><input type="text" name="smsb-position-visible-after" value="<?php echo esc_attr( get_option('smsb-position-visible-after', '1000') ); ?>" /></td>
        </tr>
        <tr valign="top">
        	<th scope="row">Distance to Right in Px</th>
        	<td><input type="text" name="smsb-position-distance" value="<?php echo esc_attr( get_option('smsb-position-distance', '20') ); ?>" /></td>
        </tr>
    
    </table>
    
<h3>Toggle Slider Box</h3>

	<table class="form-table">
    
	    <tr valign="top">
	        <th scope="row">Visible to Any Visitor</th>
	        <td><input type="radio" name="smsb-slider-active" value="public"<?php checked( 'public' == esc_attr( get_option('smsb-slider-active', 'disabled') ) ); ?> /></td>
		</tr>
		<tr valign="top">
	        <th scope="row">Only Visible to Admin</th>
	        <td><input type="radio" name="smsb-slider-active" value="admin"<?php checked( 'admin' == esc_attr( get_option('smsb-slider-active', 'disabled') ) ); ?> /></td>
		</tr>
		<tr valign="top">
	        <th scope="row">Slider Disabled</th>
	        <td><input type="radio" name="smsb-slider-active" value="disabled"<?php checked( 'disabled' == esc_attr( get_option('smsb-slider-active', 'disabled') ) ); ?> /></td>
	    </tr>
    
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
<?php

//Enqueue Admin Styles and Scripts
function pw_lightweight_social_media_slider_plugin_admin_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'follow-me-sliding-widget-plugin/admin/control-panel.php') {
        wp_enqueue_media();
        wp_register_script('social-sliderbox-admin-js', plugin_dir_url( dirname(__FILE__) ).'admin/control-panel.js', array('jquery'));
        wp_enqueue_script('social-sliderbox-admin-js');
	}
}

add_action('admin_enqueue_scripts', 'pw_lightweight_social_media_slider_plugin_admin_scripts');

?>
