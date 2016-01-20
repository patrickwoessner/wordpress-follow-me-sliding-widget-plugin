<?php 
// Just to Make Sure Nothing Unexpected Happens if the Script is Called Directly
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="pw-lightweight-sliderbox pw-lightweight-sliderbox-mode-<?php echo esc_attr( get_option('smsb-social-network')); ?> js-pw-lightweight-sliderbox-container" data-scrolldistance="<?php echo esc_attr( get_option('smsb-position-visible-after')); ?>" data-bottom="<?php echo esc_attr( get_option('smsb-position-distance-bottom')); ?>">
    <div class="pw-lightweight-sliderbox-header">
        <span class="pw-lightweight-sliderbox-close js-pw-lightweight-sliderbox-close"><?php echo esc_html( get_option('smsb-text-close')); ?> <strong>X</strong></span>
        <span class="pw-lightweight-sliderbox-title"><?php echo esc_html( get_option('smsb-text-headline')); ?></span>
        <p class="pw-lightweight-sliderbox-description"><?php echo esc_html( get_option('smsb-text-description')); ?></p>
    </div>
    <div class="pw-lightweight-sliderbox-content">
    	<div class="pw-lightweight-sliderbox-content-photo">
    		<img width="80" height="80" src="<?php echo esc_attr( get_option('smsb-social-pic-uri')); ?>" alt="<?php bloginfo( 'name' ); ?>">
    	</div>
    	<div class="pw-lightweight-sliderbox-content-cta">
    		<a href="<?php echo esc_attr( get_option('smsb-social-uri')); ?>" target="_blank"><span class="pw-lightweight-sliderbox-content-cta-button"><i class="social-font icon-<?php echo esc_attr( get_option('smsb-social-network')); ?>"></i><?php echo esc_attr( get_option('smsb-text-cta')); ?></span></a>
    	</div>
    </div>
    <div class="pw-lightweight-sliderbox-footer">
    </div>
</div>