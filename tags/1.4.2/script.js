jQuery(".wpcf7-intl-tel").intlTelInput({
  initialCountry: "auto",
  utilsScript: wpcf7_utils_url,
  geoIpLookup: function(callback) {
    jQuery.get('//ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  }
});


jQuery('.wpcf7-intl-tel').each(function(){
	var intl_tel_input = jQuery(this);
	var intl_tel_container = intl_tel_input.parents('span')[0];
	var intl_tel_form = intl_tel_input.parents('form');
	intl_tel_form.submit(function(){
		jQuery(intl_tel_container).children('input.wpcf7-intl-tel-full').val(intl_tel_input.intlTelInput('getNumber'));
		jQuery(intl_tel_container).children('input.wpcf7-intl-tel-country-name').val(intl_tel_input.intlTelInput('getSelectedCountryData').name);
		jQuery(intl_tel_container).children('input.wpcf7-intl-tel-country-code').val(intl_tel_input.intlTelInput('getSelectedCountryData').dialCode);
	});
});