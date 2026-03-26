<?php
/**
 * デジタルパンフレット用ヘッダー（Figma node 2703:8728）
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h = 'figma-header-2703-8728';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'ru-pamphlet' ); ?>>
<?php wp_body_open(); ?>

<header class="ru-header" data-figma-node="2703:8728">
	<div class="ru-header__inner">
		<div class="ru-header__brand">
			<img
				class="ru-header__logo-line"
				src="<?php echo esc_url( rissho_university_img_url( $h . '/5c0bde5a15e53cf36c2bbd082f674d728e52919a.svg' ) ); ?>"
				alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
				width="271"
				height="19"
				loading="eager"
				decoding="async"
			>
			<div class="ru-header__kanji">
				<img
					src="<?php echo esc_url( rissho_university_img_url( 'ru-header__kanji.svg' ) ); ?>"
					alt="<?php esc_attr_e( '立正大学文学部デジタルパンフレット', 'rissho-university' ); ?>"
					width="657"
					height="42"
					loading="eager"
					decoding="async"
				>
			</div>
		</div>
		<nav class="ru-header__nav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'rissho-university' ); ?>">
			<a href="#students-voice"><?php esc_html_e( '学生インタビュー', 'rissho-university' ); ?></a>
			<a href="#graduates"><?php esc_html_e( '卒業生の声', 'rissho-university' ); ?></a>
		</nav>
	</div>
</header>

<main id="primary" class="site-main ru-pamphlet-main">
