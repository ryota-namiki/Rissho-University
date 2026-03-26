<?php
/**
 * フッター（Figma 2752:17145）— アセットパス・SNSリンク
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 見出し SVG（文学部公式アカウント・1枚）
 *
 * @return string themes/images/ からの相対パス
 */
function rissho_footer_2752_17145_heading_title_file() {
	$file = 'figma-footer-2752-17145/sns-title.svg';
	/**
	 * デジタルパンフレットフッター見出し画像
	 *
	 * @param string $file 相対パス.
	 */
	return apply_filters( 'rissho_footer_2752_17145_heading_title_file', $file );
}

/**
 * SNSカラム（左から Facebook, Instagram, X, TikTok）— 各1枚の合成 SVG
 *
 * @return array<int, array{node: string, url: string, label: string, image: string}>
 */
function rissho_footer_2752_17145_social_columns() {
	$b = 'figma-footer-2752-17145/';
	$cols = array(
		array(
			'node'  => '2696:5377',
			'url'   => '#',
			'label' => __( 'Facebook', 'rissho-university' ),
			'image' => $b . 'facebook.svg',
		),
		array(
			'node'  => '2696:5390',
			'url'   => '#',
			'label' => __( 'Instagram', 'rissho-university' ),
			'image' => $b . 'instagram.svg',
		),
		array(
			'node'  => '2696:5411',
			'url'   => '#',
			'label' => __( 'X', 'rissho-university' ),
			'image' => $b . 'x.svg',
		),
		array(
			'node'  => '2696:5419',
			'url'   => '#',
			'label' => __( 'TikTok', 'rissho-university' ),
			'image' => $b . 'ticktock.svg',
		),
	);

	/**
	 * デジタルパンフレットフッターの SNS カラム（URL・画像パスなどを差し替え可能）
	 *
	 * @param array<int, array<string, string>> $cols カラム定義の配列.
	 */
	return apply_filters( 'rissho_footer_2752_17145_social_columns', $cols );
}
