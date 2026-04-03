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

/**
 * YouTube の視聴URLから動画ID（11文字）を取り出す（埋め込み用）
 *
 * @param string $url youtu.be / watch?v= / embed / shorts に対応。
 * @return string 取り出せない場合は空文字。
 */
function rissho_youtube_video_id( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return '';
	}
	if ( preg_match( '#(?:https?://)?(?:www\.)?youtu\.be/([a-zA-Z0-9_-]{11})#', $url, $m ) ) {
		return $m[1];
	}
	if ( preg_match( '#[?&]v=([a-zA-Z0-9_-]{11})#', $url, $m ) ) {
		return $m[1];
	}
	if ( preg_match( '#/embed/([a-zA-Z0-9_-]{11})#', $url, $m ) ) {
		return $m[1];
	}
	if ( preg_match( '#/shorts/([a-zA-Z0-9_-]{11})#', $url, $m ) ) {
		return $m[1];
	}
	return '';
}
