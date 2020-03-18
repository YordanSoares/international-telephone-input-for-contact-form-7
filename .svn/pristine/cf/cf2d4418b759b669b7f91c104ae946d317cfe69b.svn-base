jQuery(".wpcf7-intl-tel").intlTelInput({
  initialCountry: "auto",
  utilsScript: wpcf7_utils_url,
  geoIpLookup: function(callback) {
    jQuery.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  }
});