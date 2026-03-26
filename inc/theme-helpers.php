<?php
/**
 * テーマ共通ヘルパー
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * images ディレクトリ内アセットの URL
 *
 * @param string $filename ファイル名。
 * @return string
 */
function rissho_university_img_url( $filename ) {
	return trailingslashit( get_template_directory_uri() ) . 'images/' . ltrim( $filename, '/' );
}
