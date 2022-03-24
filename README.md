# Aimomieli Request A Quote

Request a quote sticky element positioned bottom right in a page view.

## Description

Just add a shortcode `[request_a_quote id="{POST ID}" title="{POST TITLE}"]` and replace `{POST ID}` and `{POST TITLE}` with actual values. You can leave id empty but title is mandatory field.

Currently supports GravityForms (not tested) and Contacf Form 7 (tested).

## Installation

1. Upload `aimomieli-request-a-quote` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `[request_a_quote id="{POST ID}" title="{POST TITLE}"]` shortcode in your post editor.
4. Replace {POST ID} (not mandatory) and {POST TITLE} in your shortcode.
5. Add following hidden fields `#hidden-request-a-quote-id` and `#hidden-request-a-quote-title` into your form. If you need to use some other named fields, go and edit `assets/js/plugin.js`
6. Set form id and texts with the following hooks.

## Hooks

Modify heading:
```
add_filter( 'aimomieli_require_a_quote_heading', function( $heading ) {
  return __("Wan't to know more?"); // Your heading
} );
```

Modify text:
```
add_filter( 'aimomieli_require_a_quote_text', function( $text ) {
  return __("Request a quote for this amazing product"); // Your text
} );
```

Add Contact Form 7 form:
```
add_filter( 'aimomieli_require_a_quote_cf7_id', function( $cf7_id ) {
  return '5'; // Your Contact Form 7 form id.
} );
```

Add GravityForms form:
```
add_filter( 'aimomieli_require_a_quote_gf_id', function( $gf_id ) {
  return '1'; // Your GravityForms form id.
} );
```

## Changelog

= 0.1.0 =
* First version
