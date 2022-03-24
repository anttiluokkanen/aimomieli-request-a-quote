=== Aimomieli Request A Quote ===
Contributors: anttiluokkanen
Donate link: https://example.com/
Tags: comments, spam
Requires at least: 4.5
Tested up to: 5.9.2
Requires PHP: 7.4
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Request a quote sticky element positioned bottom right in a page view.

== Description ==

Just add a shortcode [request_a_quote id="{POST ID}" title="{POST TITLE}"] and replace {POST ID} and {POST TITLE} with actual values. You can leave id empty but title is mandatory field.

Currently supports GravityForms (not tested) and Contacf Form 7 (tested).

== Installation ==

1. Upload `aimomieli-request-a-quote` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `[request_a_quote id="{POST ID}" title="{POST TITLE}"]` shortcode in your post editor.
4. Replace {POST ID} (not mandatory) and {POST TITLE} in your shortcode.

== Hooks ==
`add_filter( 'aimomieli_require_a_quote_cf7_id', function( (string) $cf7_id ) {
  return '5'; // Your Contact Form 7 form id.
} );`

`add_filter( 'aimomieli_require_a_quote_gf_id', function( (string) $gf_id ) {
  return '1'; // Your GravityForms form id.
} );`

== Changelog ==

= 0.1.0 =
* A change since the previous version.
* Another change.
