<?php
/**
 * Plugin Name:     Aimomieli Request A Quote
 * Plugin URI:      https://aimomieli.fi
 * Description:     Request a quote sticky element in page bottom. Add shortcode [request_a_quote] to your post.
 * Author:          Aimomieli
 * Author URI:      https://aimomieli.fi
 * Text Domain:     aimomieli-request-a-quote
 * Domain Path:     /languages
 * Version:         0.1.1
 *
 * @package         Request_A_Quote
 */

namespace AimomieliRequestAQuote;

defined( 'ABSPATH' ) || exit;

if ( !defined( 'REQUEST_A_QUOTE_VERSION' ) ) {
	define( 'REQUEST_A_QUOTE_VERSION', '0.1.1' );
}

if ( !defined( 'REQUEST_A_QUOTE_SLUG' ) ) {
	define( 'REQUEST_A_QUOTE_SLUG', 'aimomieli_request_a_quote' );
}

// Contact Form 7
if ( !defined( 'REQUEST_A_QUOTE_CF7_ID' ) ) {
	define( 'REQUEST_A_QUOTE_CF7_ID', false );
}

// GravityForms

if ( !defined( 'REQUEST_A_QUOTE_GF_ID' ) ) {
	define( 'REQUEST_A_QUOTE_GF_ID', false );
}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\plugin_assets' );
function plugin_assets() {
    wp_enqueue_style( REQUEST_A_QUOTE_SLUG, plugins_url( '/assets/css/plugin.css' , __FILE__ ), [], REQUEST_A_QUOTE_VERSION );
    wp_enqueue_script( REQUEST_A_QUOTE_SLUG, plugins_url( '/assets/js/plugin.js' , __FILE__ ), ['jquery'], REQUEST_A_QUOTE_VERSION, true );
}

// Add Shortcode
function request_a_quote_shortcode( $atts ) {
	global $post;

	// Attributes
	$atts = shortcode_atts(
		array(
			'id' => $post->ID,
			'title' => get_the_title( $post ),
		),
		$atts,
		'request_a_quote'
	);

	display_form( $atts );

}

add_shortcode( 'request_a_quote', __NAMESPACE__ . '\request_a_quote_shortcode' );

function display_form( $atts ) {

	$heading = apply_filters( 'aimomieli_require_a_quote_heading', __('Pyydä tarjous', REQUEST_A_QUOTE_SLUG ) );
	$text = apply_filters( 'aimomieli_require_a_quote_text', __('Haluatko lisää tietoa tai tarjouksen tuotteesta', REQUEST_A_QUOTE_SLUG ) );
	$cf7_id = apply_filters( 'aimomieli_require_a_quote_cf7_id', REQUEST_A_QUOTE_CF7_ID );
	$gf_id = apply_filters( 'aimomieli_require_a_quote_gf_id', REQUEST_A_QUOTE_GF_ID );

	if ( is_array( $atts ) ) {
		if ( $atts['id'] ) {
			$id = $atts['id'];
		}
		if ( $atts['title'] ) {
			$title = $atts['title'];
		}
	}

	$heading = '<h4>' . $heading . '</h4>';
	$content = '<p>' .$text . ' ' . $title . '.</p>';
	$hiddencontent = '<section id="request-a-quote-hidden-data">';
	$hiddencontent .= '<input id="hidden-request-a-quote-id" type="hidden" name="request_a_quote_id" value="' . esc_attr( $id ). '">';
	$hiddencontent .= '<input id="hidden-request-a-quote-title" type="hidden" name="request_a_quote_title" value="' . esc_attr( $title ) . '">';
	$hiddencontent .= '</section>';

	if ( $id || $title ) {

		$html = '
		<section id="request-a-quote">
			<div id="request-a-quote-form">
		 		<button id="request-a-quote-hide-form-button">X</button>';

		$html .= '<div id="request-a-quote-content">';
		$html .= $heading;
		$html .= $content;
		$html .= $hiddencontent;
		$html .= '</div>';

		if ( $cf7_id ) {
			$html .= do_shortcode('[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]');
		} else if ( $gf_id ) {
			$html .= do_shortcode('[gravityform id="' . esc_attr( $gf_id ) . '" title="false" description="false" ajax="true"');
		} else {
			$html .= "<pre>Couldn't find any form attached.</pre>";
		}
		$html .= '</div>';

		$html .= '<div id="request-a-quote-cta">
				' . $heading . '
				' . $content;

		$html .= '<button id="request-a-quote-cta-button">' . __('Ota yhteyttä', REQUEST_A_QUOTE_SLUG ) . '</button>
				</div>
			</section>';

		echo $html;
	}
}
