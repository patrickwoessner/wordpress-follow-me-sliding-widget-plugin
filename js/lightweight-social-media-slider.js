function closeSMSBSliderBox() {
	jQuery('.js-pw-lightweight-sliderbox-container').hide(250);
	setSMSBCookie("smsliderbox", 666, 30);
}
function setSMSBCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value)
				+ ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
                document.cookie = c_name + "=" + c_value;
}
function getSMSBCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}
jQuery( document ).ready(function() {
	
	if (jQuery ('.js-pw-lightweight-sliderbox-container').length ) {
		
		var sliderbox_scrolldistance = jQuery ('.js-pw-lightweight-sliderbox-container').attr('data-scrolldistance');
		var sliderbox_bottom = jQuery ('.js-pw-lightweight-sliderbox-container').attr('data-bottom');
		
		var sliderbox_pref = getSMSBCookie("smsliderbox");
	
		jQuery('.js-pw-lightweight-sliderbox-close').click(closeSMSBSliderBox);
		
	    if (sliderbox_pref != 666 && jQuery( window ).width() > 650) {
	    	var sliderbox_log = 0;
	    	
	        jQuery(window).scroll(function() {
	        	if (sliderbox_log == 0) {
	
	                if (jQuery(document).scrollTop() > sliderbox_scrolldistance) {
	
	        			jQuery('.js-pw-lightweight-sliderbox-container')
	        				.css('right', sliderbox_bottom+'px')
	        				.css('display', 'block')
	        				.animate({
	        					'bottom': '0px',
	        					'opacity': '1' 
	        				}, 800);
	                    sliderbox_log++;
	                 }
	             }
	        });
	    }
	}
});