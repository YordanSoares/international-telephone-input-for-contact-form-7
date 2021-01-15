=== International Telephone Input for Contact Form 7 ===
Contributors: damiarita, yordansoares
Tags: contact form 7, cf7 international phone input, international phone input, country code, telephone flags input
Stable tag: 1.5.7
Requires at least: 4.0 +
Tested up to: 5.6
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Addon for Contact Form 7 that creates a new type of input for entering and validating international telephone numbers. It adds a flag dropdown, detects the user's country, displays a relevant placeholder and provides formatting/validation methods.

== Description ==

Addon for Contact Form 7 that creates a new type of input for entering and validating international telephone numbers. It adds a flag dropdown with prefix of the telephone number, detects the user's country, displays a relevant placeholder and provides formatting/validation methods.

= How to use =

Once you have installed and activated your plugin, a new type of input field will be available in your Contact Form 7 forms. In order to add it to your form, you can either click on the "International Telephone" button above your form editor, or add the shortcode like: `[intl_tel* {your-phone}]`. Replace `{your-phone}` by the name do you want to give the field. Optionally, you can use the asterisk (*) to makes the field required.

To display the field's info on your email, use this tag: `[{your-phone}]`. It will display something like +12025550109

= Aditional info in your email =

You can also recover specific parts of the telephone number: the name of the country it refers to, the country code, the number without the country code. Use this tags:

* `[{your-phone}-cf7it-country-name]`: It prints the name of the country. For the example above: United States
* `[{your-phone}-cf7it-country-code]`: It prints the country code of the phone number. For the example above: 1
* `[{your-phone}-cf7it-country-iso2]`: It prints the country iso code. For the example above: us
* `[{your-phone}-cf7it-national]`: It prints the phone number without international prefix. For the example above: 2025550109

= Third-party software =

This plugin uses the [International Telephone Input](https://intl-tel-input.com/) JavaScript library and the [eXTReMe-IP-LOOKUP.com API](https://extreme-ip-lookup.com).

== Installation ==

= Automatic installation =
1. Go to your Dashboard » Plugins » Add new
2. In the search form write "International Telephone Input for Contact Form 7"
3. When the search return the result, click on the "Install Now" button
4. Finally, click on the "Activate" button
5. Enjoy the plugin!

= Manual Installation = 
1. Download the plugin from this page clicking on the "Download" button
2. Go to your Dashboard » Plugins » Add new
3. Now select "Upload Plugin" button
4. Click on "Select file" button and select the file you just download
5. Click on "Install Now" button and the "Activate Plugin"
6. Enjoy the plugin!

= FTP Installation =
1. Download the plugin from this page clicking on the "Download" button
2. Decompress the file in your desktop
3. Run your FTP client software and conect to your WordPress installation
4. Copy to [root folder]/wp-content/plugins/ the plugin directory you just descompress
5. Go to your Dashboard » Plugins » Find the plugin and click on "Activate" option
6. Enjoy the plugin!

== Frequently Asked Questions ==


== Screenshots ==

1. International telephone input
2. Adding a initial country. Now you can set a initial country by default. When this option is set, the IP lookup feature will be disabled.
3. Adding a default or placeholder value. Now you can set a default or placeholder value for the telephone input.

== Changelog ==

= 1.5.7 — Sep 15, 2020 =
* Added new options: Default or placeholder value. Now you can set a default or placeholder value for the telephone input.
* Added new option: Initial Country. Now you can set a initial country by default. When this option is set, the IP lookup feature will be disabled.

= 1.5.6 — May 11, 2020 =
* Fixed the flags alignment in Retina screens.
* Improvement: now the file size of flags images are 69% smaller. Thanks to [@marcusasiabc](https://wordpress.org/support/topic/suggestion-flag-images-compression/).

= 1.5.5 — April 25, 2020 =
* Switch API service from **freegeoip.app** (it no longer works) to **extreme-ip-lookup.com**, which offer free usage until 20 requests per minute and 50,000 requests per month.

= 1.5.4 — April 06, 2020 =
* Added a check to verify if Contact Form 7 is activated.
* Added support for Retina screens. Thanks to [Aboobacker P Ummer (@abooze)](https://wordpress.org/support/topic/suggestion-flags-not-loading-on-retina-screen/) for reporting.
* Fixed some typos in README.md. Thanks to [@sylvain68](https://wordpress.org/support/topic/slight-error-in-the-description-on-the-plugins-wordpress-page/) for reporting.

= 1.5.3 — April 03, 2020 =
* Code refactored.
* Updated the API service to freegeoip.app (up to 15,000 queries per hour).
* Now the plugin includes the "International Telephone Input" library built-in.
* Added new info tags in header comment.
* Fixed text domain in plugin header comment.
* Fixed some typos and strings without translation functions.

= 1.5.2 =
* We change ipinfo.io IP API by freegeoip.net IP API because it has a higher requests limit. As suggested at https://wordpress.org/support/topic/ipinfo-io-limits/

= 1.5.1 =
* We add the possibility to define de preferrec countries by adding the option preferredCountries. For example preferredCountries:es-fr (They have to be 2-letter country codes separated by hyphens '-')
* We add teh preferredCountries and size option to the GUI form tag creator form.

= 1.5.0 =
* We use upgrade JS version to 12.1.3. It fixes iPhone issues of old version
* We add mail tag that recovers iso code of the selected country

= 1.4.6 =
* We change to new CF7 functions naming (shortcode->form-tag) to avoid deprecated message with debug active (completed). No new features added

= 1.4.5 =
* We change to new CF7 functions naming (shortcode->form-tag) to avoid deprecated message with debug active (partial). No new features added

= 1.4.4 =
* We add the size attribute if it is sent as an option. For example: size:40

= 1.4.3 =
* We avoid the placeholder text to be copied into the value of the input field. This, sometimes caused the flags to desappear

= 1.4.2 =
* We repare special mail tags

= 1.4.1 =
* We make it https compatible

= 1.4.0 =
* We add new mail tags in order to be able to recover the country name of a telephone, the contry code and the telephone number without the country code
* In order to get the country name use [{your-phone}-cf7it-country-name] where {your-phone} has to be replaced by the name of your tag
* In order to get the country code use [{your-phone}-cf7it-country-code] where {your-phone} has to be replaced by the name of your tag
* In order to get the phone number without the country code use [{your-phone}-cf7it-national] where {your-phone} has to be replaced by the name of your tag

= 1.3.0 =
* We force the dependecies between the JS files

= 1.2.0 =
* We load the minified JS by default. If SCRIPT_DEBUG is set to true, we use the non-minified.

= 1.1.0 =

* CDN is used for all JS and CSS files and script is loaded at the bottom

= 1.0.0 =
* First release