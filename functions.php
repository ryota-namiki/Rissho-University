<?php
/**
 * Rissho University テーマの機能定義
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/theme-helpers.php';
require_once get_template_directory() . '/inc/mv-2704-9421-layers.php';
require_once get_template_directory() . '/inc/navcards-2703-4716.php';
require_once get_template_directory() . '/inc/students-voice-2707-10699.php';
require_once get_template_directory() . '/inc/graduates-2707-10702.php';
require_once get_template_directory() . '/inc/footer-2752-17145.php';

/**
 * テーマのデフォルト設定
 */
function rissho_university_setup() {
	load_theme_textdomain( 'rissho-university', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'rissho_university_setup' );

/**
 * スタイルシートの読み込み
 */
function rissho_university_enqueue_styles() {
	wp_enqueue_style(
		'rissho-university-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	if ( is_front_page() ) {
		wp_enqueue_style(
			'rissho-university-digital-pamphlet',
			get_template_directory_uri() . '/css/digital-pamphlet.css',
			array( 'rissho-university-style' ),
			wp_get_theme()->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'rissho_university_enqueue_styles' );

/**
 * デジタルパンフレット用スクリプト・フォント
 */
function rissho_university_front_pamphlet_assets() {
	if ( ! is_front_page() ) {
		return;
	}

	$pamphlet_js = get_template_directory() . '/js/digital-pamphlet.js';
	wp_enqueue_script(
		'rissho-university-digital-pamphlet',
		get_template_directory_uri() . '/js/digital-pamphlet.js',
		array(),
		file_exists( $pamphlet_js ) ? (string) filemtime( $pamphlet_js ) : wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_style(
		'rissho-university-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'rissho_university_front_pamphlet_assets', 20 );
