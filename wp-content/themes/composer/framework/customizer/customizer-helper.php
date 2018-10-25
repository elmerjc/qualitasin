<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function composer_generate_css() {
	composer_generate_options_css( get_theme_mods() );
}
add_action( 'customize_save_after', 'composer_generate_css' );


add_filter( 'kirki/my_config/l10n', 'kirki_translate' );

// Admin Enque Style and Scripts
function composer_customizer_admin_enqueue() {
	//Load css
	wp_enqueue_style( 'customizer-admin-css', COMPOSER_CUSTOMIZER_URI .'/css/customizer-admin.css', array( 'kirki-color-css', 'kirki-radio-buttonset-css', 'kirki-generic-css', 'kirki-select-css', 'kirki-slider-css', 'kirki-radio-image-css', 'kirki-multicheck-css', 'kirki-color-css', 'kirki-custom-sections', 'kirki-reset' ), '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'composer_customizer_admin_enqueue' );

/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
function composer_customizer_basic_style( $config ) {
	return wp_parse_args( array(
		'logo_image'   => get_template_directory_uri(). '/_images/logo.png',
		'description'  => esc_html__( 'Composer created to help you make awesome websites in just minutes. It has everything you need with hundreds of shortcodes there is no need for coding knowledge.', 'composer' ),
		'color_accent' => '#000',
		'color_back'   => '#000',
	), $config );
}

add_filter( 'kirki/config', 'composer_customizer_basic_style' );


add_filter( 'kirki/my_config/l10n', 'kirki_translate' );

function kirki_translate( $l10n ) {

	$l10n['background-color']      = esc_attr__( 'Background Color', 'composer' );
	$l10n['background-image']      = esc_attr__( 'Background Image', 'composer' );
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'composer' );
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'composer' );
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'composer' );
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'composer' );
	$l10n['inherit']               = esc_attr__( 'Inherit', 'composer' );
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'composer' );
	$l10n['cover']                 = esc_attr__( 'Cover', 'composer' );
	$l10n['contain']               = esc_attr__( 'Contain', 'composer' );
	$l10n['background-size']       = esc_attr__( 'Background Size', 'composer' );
	$l10n['fixed']                 = esc_attr__( 'Fixed', 'composer' );
	$l10n['scroll']                = esc_attr__( 'Scroll', 'composer' );
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'composer' );
	$l10n['left-top']              = esc_attr__( 'Left Top', 'composer' );
	$l10n['left-center']           = esc_attr__( 'Left Center', 'composer' );
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'composer' );
	$l10n['right-top']             = esc_attr__( 'Right Top', 'composer' );
	$l10n['right-center']          = esc_attr__( 'Right Center', 'composer' );
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'composer' );
	$l10n['center-top']            = esc_attr__( 'Center Top', 'composer' );
	$l10n['center-center']         = esc_attr__( 'Center Center', 'composer' );
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'composer' );
	$l10n['background-position']   = esc_attr__( 'Background Position', 'composer' );
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'composer' );
	$l10n['on']                    = esc_attr__( 'ON', 'composer' );
	$l10n['off']                   = esc_attr__( 'OFF', 'composer' );
	$l10n['all']                   = esc_attr__( 'All', 'composer' );
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'composer' );
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'composer' );
	$l10n['devanagari']            = esc_attr__( 'Devanagari', 'composer' );
	$l10n['greek']                 = esc_attr__( 'Greek', 'composer' );
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'composer' );
	$l10n['khmer']                 = esc_attr__( 'Khmer', 'composer' );
	$l10n['latin']                 = esc_attr__( 'Latin', 'composer' );
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'composer' );
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'composer' );
	$l10n['hebrew']                = esc_attr__( 'Hebrew', 'composer' );
	$l10n['arabic']                = esc_attr__( 'Arabic', 'composer' );
	$l10n['bengali']               = esc_attr__( 'Bengali', 'composer' );
	$l10n['gujarati']              = esc_attr__( 'Gujarati', 'composer' );
	$l10n['tamil']                 = esc_attr__( 'Tamil', 'composer' );
	$l10n['telugu']                = esc_attr__( 'Telugu', 'composer' );
	$l10n['thai']                  = esc_attr__( 'Thai', 'composer' );
	$l10n['serif']                 = _x( 'Serif', 'font style', 'composer' );
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'composer' );
	$l10n['monospace']             = _x( 'Monospace', 'font style', 'composer' );
	$l10n['font-family']           = esc_attr__( 'Font Family', 'composer' );
	$l10n['font-size']             = esc_attr__( 'Font Size', 'composer' );
	$l10n['font-weight']           = esc_attr__( 'Font Weight', 'composer' );
	$l10n['line-height']           = esc_attr__( 'Line Height', 'composer' );
	$l10n['font-style']            = esc_attr__( 'Font Style', 'composer' );
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'composer' );
	$l10n['top']                   = esc_attr__( 'Top', 'composer' );
	$l10n['bottom']                = esc_attr__( 'Bottom', 'composer' );
	$l10n['left']                  = esc_attr__( 'Left', 'composer' );
	$l10n['right']                 = esc_attr__( 'Right', 'composer' );
	$l10n['color']                 = esc_attr__( 'Color', 'composer' );
	$l10n['add-image']             = esc_attr__( 'Add Image', 'composer' );
	$l10n['change-image']          = esc_attr__( 'Change Image', 'composer' );
	$l10n['remove']                = esc_attr__( 'Remove', 'composer' );
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'composer' );
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'composer' );
	$l10n['variant']               = esc_attr__( 'Variant', 'composer' );
	$l10n['subsets']               = esc_attr__( 'Subset', 'composer' );
	$l10n['size']                  = esc_attr__( 'Size', 'composer' );
	$l10n['height']                = esc_attr__( 'Height', 'composer' );
	$l10n['spacing']               = esc_attr__( 'Spacing', 'composer' );
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'composer' );
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'composer' );
	$l10n['light']                 = esc_attr__( 'Light 200', 'composer' );
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'composer' );
	$l10n['book']                  = esc_attr__( 'Book 300', 'composer' );
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'composer' );
	$l10n['regular']               = esc_attr__( 'Normal 400', 'composer' );
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'composer' );
	$l10n['medium']                = esc_attr__( 'Medium 500', 'composer' );
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'composer' );
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'composer' );
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'composer' );
	$l10n['bold']                  = esc_attr__( 'Bold 700', 'composer' );
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'composer' );
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'composer' );
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'composer' );
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'composer' );
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'composer' );
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'composer' );

	return $l10n;

}
