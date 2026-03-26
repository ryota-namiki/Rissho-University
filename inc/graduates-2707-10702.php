<?php
/**
 * 卒業生 INTERVIEW ブロック（Figma 2707:10702）— アートボード座標・装飾レイヤー
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** @var float アートボード幅（Figma Frame 2707:10702） */
define( 'RISSHO_GRAD_FIGMA_W', 1606.6954345703125 );

/** @var float アートボード高さ */
define( 'RISSHO_GRAD_FIGMA_H', 545.7464599609375 );

/**
 * 装飾イラスト（フレーム直下の絶対配置レイヤー）
 *
 * @return array<int, array{node: string, file: string, x: float, y: float, w: float, h: float}>
 */
function rissho_graduates_2707_10702_decor_layers() {
	$base = 'figma-graduates-2707-10702/';
	return array(
		array( 'node' => '2707:11026', 'file' => $base . '9871ae3de54e70cd4a8313ef8d6450faf1106c19.svg', 'x' => 7.34765625, 'y' => 13.314453125, 'w' => 114.65653991699219, 'h' => 121.86140441894531 ),
		array( 'node' => '2707:11541', 'file' => $base . '6cb88506f0c16db8816c8e5496699605c5d0bcb3.svg', 'x' => 215.34765625, 'y' => 21.314453125, 'w' => 56.54454040527344, 'h' => 59.05310821533203 ),
		array( 'node' => '2707:11544', 'file' => $base . '6ca0835a964d4b8e8341d627a0e162592657dce3.svg', 'x' => 330.34765625, 'y' => 48.314453125, 'w' => 83.172607421875, 'h' => 87.64459228515625 ),
		array( 'node' => '2707:11562', 'file' => $base . 'cf52c961d15bdff011d0184f9a25a27db4fb17ae.svg', 'x' => 538.34765625, 'y' => 138.314453125, 'w' => 43.503440856933594, 'h' => 44.62834167480469 ),
		array( 'node' => '2707:11569', 'file' => $base . '360e33cb8251bcf9b59c2da8100fe291e1290372.svg', 'x' => 705.34765625, 'y' => 127.314453125, 'w' => 28.12021255493164, 'h' => 30.06525421142578 ),
		array( 'node' => '2707:11667', 'file' => $base . '9103227d5c1a7549b99724c7ea481fabd7453a73.svg', 'x' => 1011.30078125, 'y' => 119.8515625, 'w' => 48.54999923706055, 'h' => 39.09000015258789 ),
		array( 'node' => '2707:11702', 'file' => $base . '8af258b34992dcf5457113bea3b4b4e2da56583b.svg', 'x' => 1176.89453125, 'y' => 21.201171875, 'w' => 91.0, 'h' => 84.0 ),
		array( 'node' => '2707:11593', 'file' => $base . '8cbfe534ac003826a1855e649161b6c4a2e61679.svg', 'x' => 1322.34765625, 'y' => 59.314453125, 'w' => 40.09017562866211, 'h' => 35.08448028564453 ),
		array( 'node' => '2707:11615', 'file' => $base . 'd95f5c94614e153c1b05aedc9294aff8bb948cc5.svg', 'x' => 1249.34765625, 'y' => 141.314453125, 'w' => 100.3013687133789, 'h' => 66.73394775390625 ),
		array( 'node' => '2707:11603', 'file' => $base . 'e8dd8f65a6ac066ceafdc8e60a60119da5c1997a.svg', 'x' => 1435.34765625, 'y' => 28.314453125, 'w' => 77.51852416992188, 'h' => 97.57511901855469 ),
		array( 'node' => '2707:11639', 'file' => $base . '3a64ac2b1352fd0adab9c5d321ed120f33d1b01b.svg', 'x' => 920.34765625, 'y' => 506.314453125, 'w' => 74.3104248046875, 'h' => 60.9007568359375 ),
		array( 'node' => '2707:11644', 'file' => $base . '302e4309f67ab6d38d617af51fd278278d058113.svg', 'x' => 620.34765625, 'y' => 521.314453125, 'w' => 19.19527816772461, 'h' => 26.898836135864258 ),
		array( 'node' => '2707:11648', 'file' => $base . '4081c05a96b530c7c5304cfc4b85575bd6c6bb4c.svg', 'x' => 282.34765625, 'y' => 501.314453125, 'w' => 72.55738830566406, 'h' => 65.96089172363281 ),
		array( 'node' => '2707:11657', 'file' => $base . '6b961b424db875bd857cdd7079a03e3ea6aef6d4.svg', 'x' => 14.515625, 'y' => 516.556640625, 'w' => 76.31795501708984, 'h' => 77.37797546386719 ),
		array( 'node' => '2707:11515', 'file' => $base . '9871ae3de54e70cd4a8313ef8d6450faf1106c19.svg', 'x' => 275.34765625, 'y' => 319.314453125, 'w' => 114.65653991699219, 'h' => 121.86140441894531 ),
		array( 'node' => '2707:11625', 'file' => $base . '0725664d44a5cdd8eee60d1dd0da6ea7c0b5ca97.svg', 'x' => 1270.34765625, 'y' => 456.314453125, 'w' => 66.98670196533203, 'h' => 80.07152557373047 ),
		array( 'node' => '2707:11193', 'file' => $base . '8dbc26b6a18ff19212731481ff6f3df8636f79bc.svg', 'x' => -37.65234375, 'y' => 186.314453125, 'w' => 28.106529235839844, 'h' => 30.07501983642578 ),
	);
}

/**
 * タイトル「卒業生 / INTERVIEW / キャッチ」（Group 2707:10703 内の相対％）
 *
 * @return array<int, array{node: string, file: string, left: float, top: float, w: float, h: float}>
 */
function rissho_graduates_2707_10702_title_layers() {
	$base = 'figma-graduates-2707-10702/';
	$tw   = 620.872802734375;
	$th   = 83.3932876586914;
	$to_pct = static function ( $v, $den ) {
		return round( ( $v / $den ) * 100, 4 );
	};
	return array(
		array(
			'node' => '2707:10708',
			'file' => $base . 'interview-titile.svg',
			'left' => $to_pct( 0, $tw ),
			'top'  => $to_pct( 0, $th ),
			'w'    => $to_pct( 269.8180236816406, $tw ),
			'h'    => $to_pct( 79.84716796875, $th ),
		),
		array(
			'node' => '2707:10704',
			'file' => $base . 'ef515b1d60492021a59a91748d41abe5b5db28a8.svg',
			'left' => $to_pct( 500.11989736557007 - 492.91131591796875, $tw ),
			'top'  => $to_pct( 2.474609375, $th ),
			'w'    => $to_pct( 269.8180236816406, $tw ),
			'h'    => $to_pct( 79.84716796875, $th ),
		),
		array(
			'node' => '2707:10712',
			'file' => $base . 'ef79583fd87a20e6236ba6afa3d95cc8ec6a68d1.svg',
			'left' => $to_pct( 824.5596618652344 - 492.91131591796875, $tw ),
			'top'  => $to_pct( 23.462890625, $th ),
			'w'    => $to_pct( 289.224365234375, $tw ),
			'h'    => $to_pct( 59.930301666259766, $th ),
		),
		array(
			'node' => '2707:10722',
			'file' => $base . '560f3a9efaf18768cb8a2aa8ba89819274bc3e2c.svg',
			'left' => $to_pct( 825.2641906738281 - 492.91131591796875, $tw ),
			'top'  => $to_pct( 1.373046875, $th ),
			'w'    => $to_pct( 273.23858642578125, $tw ),
			'h'    => $to_pct( 12.723201751708984, $th ),
		),
	);
}

/**
 * メイン行のカラム（左イラスト＋4カード）— Figma Frame 2707:10747 基準の幅比
 *
 * @return array<int, array{kind: string, col_w: float, photo?: string, flat?: bool, voice_text?: string, aspect?: array{w: float, h: float}, layers?: array<int, array<string, float|string>>}>
 */
function rissho_graduates_2707_10702_row_columns() {
	$base = 'figma-graduates-2707-10702/';
	return array(
		array(
			'kind'       => 'illo',
			'col_w'      => 273.9984130859375,
			'photo'      => $base . 'interview01.webp',
			'voice_text' => $base . 'voice-text01.svg',
			'aspect'     => array( 'w' => 273.9984130859375, 'h' => 340.1529846191406 ),
		),
		array(
			'kind'       => 'card',
			'col_w'      => 265.1437683105469,
			'photo'      => $base . 'interview02.webp',
			'flat'       => true,
			'voice_text' => $base . 'voice-text02.svg',
			'aspect'     => array( 'w' => 265.1437683105469, 'h' => 341.1289367675781 ),
		),
		array(
			'kind'       => 'card',
			'col_w'      => 292.89678955078125,
			'photo'      => $base . 'interview03.webp',
			'flat'       => true,
			'voice_text' => $base . 'voice-text03.svg',
			'aspect'     => array( 'w' => 292.89678955078125, 'h' => 397.3531799316406 ),
		),
		array(
			'kind'       => 'card',
			'col_w'      => 262.357421875,
			'photo'      => $base . 'interview04.webp',
			'flat'       => true,
			'voice_text' => $base . 'voice-text04.svg',
			'aspect'     => array( 'w' => 262.357421875, 'h' => 389.00634765625 ),
		),
		array(
			'kind'       => 'card',
			'col_w'      => 336.299072265625,
			'photo'      => $base . 'interview05.webp',
			'flat'       => true,
			'voice_text' => $base . 'voice-text05.svg',
			'aspect'     => array( 'w' => 336.299072265625, 'h' => 368.5242919921875 ),
		),
	);
}
