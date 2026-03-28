<?php
/**
 * フロントページ：文学部デジタルパンフレット
 *
 * @package Rissho_University
 */

get_header( 'pamphlet' );

$students = array(
	array(
		'course' => __( '哲学専攻コース', 'rissho-university' ),
	),
	array(
		'course' => __( '歴史専攻コース', 'rissho-university' ),
	),
	array(
		'course' => __( '社会学専攻コース', 'rissho-university' ),
	),
	array(
		'course' => __( '日本語日本文学専攻コース', 'rissho-university' ),
	),
	array(
		'course' => __( '英語英米文学専攻コース', 'rissho-university' ),
	),
);

/* Figma 2707:10702：左イラスト＋4カード（哲・社・日文・英文） */
$graduates = array(
	array(
		'label' => __( '哲学科（卒業生インタビュー）', 'rissho-university' ),
	),
	array(
		'label' => __( '社会学科（卒業生インタビュー）', 'rissho-university' ),
	),
	array(
		'label' => __( '文学科 日本語日本文学専攻コース（卒業生インタビュー）', 'rissho-university' ),
	),
	array(
		'label' => __( '文学科 英語英米文学専攻コース（卒業生インタビュー）', 'rissho-university' ),
	),
);

$placeholder = rissho_university_img_url( 'avatar-placeholder.svg' );

$mv_w = 1604;
$mv_h = 830;
$mv_sp_w = RISSHO_MV_SP_FIGMA_W;
$mv_sp_h = RISSHO_MV_SP_FIGMA_H;
/* MV 人物イラスト 5 体：クリックで #students-voice へ */
$mv_sv_anchor_nodes = array( '2703:8401', '2703:8564', '2703:8730', '2703:9187', '2703:8482' );
?>

<section class="ru-hero" data-figma-node="2704:9421" aria-labelledby="ru-hero-heading">
	<h1 id="ru-hero-heading" class="screen-reader-text">
		<?php esc_html_e( '立正大学文学部デジタルパンフレット', 'rissho-university' ); ?>
	</h1>
	<div class="ru-hero__menu-wrap">
		<button
			type="button"
			class="ru-hero__menu-btn"
			aria-label="<?php esc_attr_e( 'メニュー', 'rissho-university' ); ?>"
			aria-expanded="false"
			aria-controls="ru-fmenu"
		>
			<img
				src="<?php echo esc_url( rissho_university_img_url( 'menu-btn-sp.svg' ) ); ?>"
				alt=""
				width="56"
				height="10"
				loading="eager"
				decoding="async"
				aria-hidden="true"
			>
		</button>
	<?php
	$fmenu_items = array(
		array(
			'kind'  => 'link',
			'href'  => '#students-voice',
			'label' => __( '学生インタビュー', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => '#graduates',
			'label' => __( '卒業生の声', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => 'https://letters.ris.ac.jp/',
			'label' => __( '立正大学文学部', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => 'https://ris.web-opencampus.com/',
			'label' => __( 'オープンキャンパス', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => '#',
			'label' => __( '交通広告', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => 'https://letters.rissho.jp/examination/wp-content/uploads/2025/02/pamphlet2026.pdf',
			'label' => __( 'デジタルパンフレット', 'rissho-university' ),
		),
		array(
			'kind'  => 'link',
			'href'  => '#sns',
			'label' => __( '文学部SNS', 'rissho-university' ),
		),
	);
	?>
	<div id="ru-fmenu" class="ru-fmenu" aria-hidden="true">
		<nav class="ru-fmenu__panel" aria-label="<?php esc_attr_e( 'メニュー', 'rissho-university' ); ?>">
			<?php foreach ( $fmenu_items as $it ) : ?>
				<?php
				$is_ext = isset( $it['href'][0] ) && '#' !== $it['href'][0];
				?>
				<a
					class="ru-fmenu__item"
					href="<?php echo esc_url( $it['href'] ); ?>"
					<?php if ( $is_ext ) : ?>
					target="_blank"
					rel="noopener noreferrer"
					<?php endif; ?>
				>
					<p><?php echo esc_html( $it['label'] ); ?></p>
				</a>
			<?php endforeach; ?>
			<div class="ru-fmenu__footer" aria-hidden="true"></div>
		</nav>
	</div>
	</div>
	<div class="ru-hero__mv ru-hero__mv--desktop" role="presentation" data-figma-board="2704:9421">
		<?php foreach ( rissho_mv_2704_9421_layers() as $layer ) : ?>
			<?php
			$left_pct = ( $layer['x'] / $mv_w ) * 100;
			$top_pct  = ( $layer['y'] / $mv_h ) * 100;
			$w_pct    = ( $layer['w'] / $mv_w ) * 100;
			$h_pct    = ( $layer['h'] / $mv_h ) * 100;
			$style    = sprintf(
				'left:%s%%;top:%s%%;width:%s%%;height:%s%%;',
				round( $left_pct, 4 ),
				round( $top_pct, 4 ),
				round( $w_pct, 4 ),
				round( $h_pct, 4 )
			);
			if ( isset( $layer['rot'] ) ) {
				$style .= sprintf( 'transform:rotate(%.4fdeg);transform-origin:center center;', $layer['rot'] );
			}
			$is_title     = ( '2703:9418' === $layer['node'] );
			$is_sv_anchor = in_array( $layer['node'], $mv_sv_anchor_nodes, true );
			$layer_tag    = $is_sv_anchor ? 'a' : 'div';
			?>
			<<?php echo esc_attr( $layer_tag ); ?>
				class="ru-hero__layer"
				style="<?php echo esc_attr( $style ); ?>"
				data-node-id="<?php echo esc_attr( $layer['node'] ); ?>"
				<?php if ( $is_sv_anchor ) : ?>
				href="#students-voice"
				aria-label="<?php echo esc_attr__( '学生の声セクションへ移動', 'rissho-university' ); ?>"
				<?php endif; ?>
			>
				<img
					src="<?php echo esc_url( rissho_university_img_url( $layer['file'] ) ); ?>"
					alt="<?php echo $is_title ? esc_attr( __( 'ブンガク', 'rissho-university' ) ) : ''; ?>"
					loading="<?php echo $is_title ? 'eager' : 'lazy'; ?>"
					decoding="async"
				>
			</<?php echo esc_attr( $layer_tag ); ?>>
		<?php endforeach; ?>
	</div>
	<div class="ru-hero__mv ru-hero__mv--sp" role="presentation" data-figma-node="2776:23194">
		<?php foreach ( rissho_mv_sp_2776_23194_layers() as $layer ) : ?>
			<?php
			$left_pct = ( $layer['x'] / $mv_sp_w ) * 100;
			$top_pct  = ( $layer['y'] / $mv_sp_h ) * 100;
			$w_pct    = ( $layer['w'] / $mv_sp_w ) * 100;
			$h_pct    = ( $layer['h'] / $mv_sp_h ) * 100;
			$style    = sprintf(
				'left:%s%%;top:%s%%;width:%s%%;height:%s%%;',
				round( $left_pct, 4 ),
				round( $top_pct, 4 ),
				round( $w_pct, 4 ),
				round( $h_pct, 4 )
			);
			if ( isset( $layer['rot'] ) ) {
				$style .= sprintf( 'transform:rotate(%.4fdeg);transform-origin:center center;', $layer['rot'] );
			}
			$is_title     = ( '2703:9418' === $layer['node'] );
			$is_sv_anchor = in_array( $layer['node'], $mv_sv_anchor_nodes, true );
			$layer_tag    = $is_sv_anchor ? 'a' : 'div';
			?>
			<<?php echo esc_attr( $layer_tag ); ?>
				class="ru-hero__layer"
				style="<?php echo esc_attr( $style ); ?>"
				data-node-id="<?php echo esc_attr( $layer['node'] ); ?>"
				<?php if ( $is_sv_anchor ) : ?>
				href="#students-voice"
				aria-label="<?php echo esc_attr__( '学生の声セクションへ移動', 'rissho-university' ); ?>"
				<?php endif; ?>
			>
				<img
					src="<?php echo esc_url( rissho_university_img_url( $layer['file'] ) ); ?>"
					alt="<?php echo $is_title ? esc_attr( __( 'ブンガク', 'rissho-university' ) ) : ''; ?>"
					loading="<?php echo $is_title ? 'eager' : 'lazy'; ?>"
					decoding="async"
				>
			</<?php echo esc_attr( $layer_tag ); ?>>
		<?php endforeach; ?>
	</div>
</section>

<section class="ru-navcards" data-figma-node="2703:4716" aria-label="<?php esc_attr_e( '関連リンク', 'rissho-university' ); ?>">
	<div class="ru-navcards__inner">
		<?php
		$navcards_meta = array(
			array(
				'href'  => 'https://letters.ris.ac.jp/',
				'label' => __( '立正大学文学部（詳細へ）', 'rissho-university' ),
			),
			array(
				'href'  => '#',
				'label' => __( '交通広告（詳細へ）', 'rissho-university' ),
			),
			array(
				'href'  => 'https://ris.web-opencampus.com/',
				'label' => __( 'オープンキャンパス（詳細へ）', 'rissho-university' ),
			),
			array(
				'href'  => 'https://letters.rissho.jp/examination/wp-content/uploads/2025/02/pamphlet2026.pdf',
				'label' => __( 'デジタルパンフレット（ダウンロード）', 'rissho-university' ),
			),
		);
		foreach ( rissho_navcards_2703_4716_defs() as $i => $def ) :
			$meta = isset( $navcards_meta[ $i ] ) ? $navcards_meta[ $i ] : array( 'href' => '#', 'label' => '' );
			?>
		<a class="ru-navcard ru-navcard--figma" href="<?php echo esc_url( $meta['href'] ); ?>" data-figma-node="<?php echo esc_attr( $def['node'] ); ?>">
			<span class="screen-reader-text"><?php echo esc_html( $meta['label'] ); ?></span>
			<div class="ru-navcard__canvas" role="presentation">
				<?php if ( 'flat' === $def['kind'] && ! empty( $def['file'] ) ) : ?>
					<img
						class="ru-navcard__flat"
						src="<?php echo esc_url( rissho_university_img_url( $def['file'] ) ); ?>"
						alt=""
						width="439"
						height="109"
						loading="lazy"
						decoding="async"
					>
				<?php elseif ( 'layers' === $def['kind'] && ! empty( $def['layers'] ) ) : ?>
					<?php foreach ( $def['layers'] as $layer ) : ?>
					<div class="ru-navcard__layer" style="<?php echo esc_attr( $layer['style'] ); ?>">
						<img
							src="<?php echo esc_url( rissho_university_img_url( $layer['file'] ) ); ?>"
							alt=""
							loading="lazy"
							decoding="async"
						>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</a>
			<?php
		endforeach;
		?>
	</div>
</section>

<section id="students-voice" class="ru-section ru-section--students-voice" data-figma-node="2707:10699" aria-labelledby="ru-sv-heading">
	<h2 id="ru-sv-heading" class="screen-reader-text"><?php esc_html_e( "STUDENT'S VOICE", 'rissho-university' ); ?></h2>
	<div class="ru-sv__stage" data-figma-artboard="2704:10591">
		<div class="ru-sv__decor" aria-hidden="true" role="presentation">
			<?php
			$sv_mv_w = 1625.48046875;
			$sv_mv_h = 893;
			foreach ( rissho_students_voice_decor_layers() as $zi => $dl ) :
				$decor_file = rissho_students_voice_decor_asset_relpath( $dl['subdir'] );
				if ( ! $decor_file ) {
					continue;
				}
				$dl_left = round( ( $dl['x'] / $sv_mv_w ) * 100, 4 );
				$dl_top  = round( ( $dl['y'] / $sv_mv_h ) * 100, 4 );
				$dl_wpct = round( ( $dl['w'] / $sv_mv_w ) * 100, 4 );
				$dl_hpct = round( ( $dl['h'] / $sv_mv_h ) * 100, 4 );
				$dl_style = sprintf(
					'left:%s%%;top:%s%%;width:%s%%;height:%s%%;z-index:%d;',
					$dl_left,
					$dl_top,
					$dl_wpct,
					$dl_hpct,
					1 + $zi
				);
				?>
			<div class="ru-sv-decor__layer" style="<?php echo esc_attr( $dl_style ); ?>" data-node-id="<?php echo esc_attr( $dl['node'] ); ?>">
				<img src="<?php echo esc_url( rissho_university_img_url( $decor_file ) ); ?>" alt="" loading="lazy" decoding="async">
			</div>
				<?php
			endforeach;
			?>
		</div>
		<div class="ru-sv__main">
			<div class="ru-sv">
		<?php
		$sv_slots     = rissho_students_voice_figma_slots();
		$sv_title_svg = rissho_university_img_url( 'figma-students-voice-2707-10699/students-voice.svg' );
		?>
		<div class="ru-sv__row ru-sv__row--middle">
			<?php
			$idx  = 0;
			$row  = $students[ $idx ];
			$meta = $sv_slots[ $idx ];
			?>
			<div class="ru-sv__slot ru-sv__slot--<?php echo esc_attr( $meta['slot'] ); ?>">
				<a
					class="ru-sv-card ru-sv-card--figma-face <?php echo esc_attr( $meta['modifier'] ); ?>"
					href="<?php echo esc_url( $meta['youtube_url'] ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<span class="screen-reader-text">
						<?php echo esc_html( $row['course'] ); ?>
						<?php esc_html_e( '（インタビュー動画・YouTubeが別タブで開きます）', 'rissho-university' ); ?>
					</span>
					<span class="ru-sv-card__photo-wrap<?php echo ! empty( $meta['photo_hover'] ) ? ' ru-sv-card__photo-wrap--crossfade' : ''; ?>" aria-hidden="true">
						<img
							class="ru-sv-card__photo ru-sv-card__photo--rest"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php if ( ! empty( $meta['photo_hover'] ) ) : ?>
						<img
							class="ru-sv-card__photo ru-sv-card__photo--hover"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo_hover'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php endif; ?>
					</span>
				</a>
			</div>
			<div class="ru-sv__title" aria-hidden="true">
				<img
					class="ru-sv__title-img"
					src="<?php echo esc_url( $sv_title_svg ); ?>"
					alt=""
					width="389"
					height="313"
					loading="lazy"
					decoding="async"
				>
			</div>
			<?php
			$idx  = 1;
			$row  = $students[ $idx ];
			$meta = $sv_slots[ $idx ];
			?>
			<div class="ru-sv__slot ru-sv__slot--<?php echo esc_attr( $meta['slot'] ); ?>">
				<a
					class="ru-sv-card ru-sv-card--figma-face <?php echo esc_attr( $meta['modifier'] ); ?>"
					href="<?php echo esc_url( $meta['youtube_url'] ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<span class="screen-reader-text">
						<?php echo esc_html( $row['course'] ); ?>
						<?php esc_html_e( '（インタビュー動画・YouTubeが別タブで開きます）', 'rissho-university' ); ?>
					</span>
					<span class="ru-sv-card__photo-wrap<?php echo ! empty( $meta['photo_hover'] ) ? ' ru-sv-card__photo-wrap--crossfade' : ''; ?>" aria-hidden="true">
						<img
							class="ru-sv-card__photo ru-sv-card__photo--rest"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php if ( ! empty( $meta['photo_hover'] ) ) : ?>
						<img
							class="ru-sv-card__photo ru-sv-card__photo--hover"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo_hover'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php endif; ?>
					</span>
				</a>
			</div>
		</div>
		<div class="ru-sv__row ru-sv__row--bottom">
			<?php
			/*
			 * PC：下段グリッドは DOM 順＝左から右。1 番目と 3 番目の並びを [bl][bc][br]（voice03|04|05）にする。
			 * SP：display:contents ＋ .ru-sv__slot--* でセル固定のため順序変更の影響なし。
			 */
			foreach ( array( 2, 3, 4 ) as $idx ) :
				$row  = $students[ $idx ];
				$meta = $sv_slots[ $idx ];
				?>
			<div class="ru-sv__slot ru-sv__slot--<?php echo esc_attr( $meta['slot'] ); ?>">
				<a
					class="ru-sv-card ru-sv-card--figma-face <?php echo esc_attr( $meta['modifier'] ); ?>"
					href="<?php echo esc_url( $meta['youtube_url'] ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<span class="screen-reader-text">
						<?php echo esc_html( $row['course'] ); ?>
						<?php esc_html_e( '（インタビュー動画・YouTubeが別タブで開きます）', 'rissho-university' ); ?>
					</span>
					<span class="ru-sv-card__photo-wrap<?php echo ! empty( $meta['photo_hover'] ) ? ' ru-sv-card__photo-wrap--crossfade' : ''; ?>" aria-hidden="true">
						<?php if ( 'figma-students-voice-2707-10699/voice04.svg' === $meta['photo'] ) : ?>
						<picture>
							<source media="(max-width: 768px)" srcset="<?php echo esc_url( rissho_university_img_url( 'figma-graduates-2707-10702/bungaku-sp.svg' ) ); ?>">
							<img
								class="ru-sv-card__photo ru-sv-card__photo--rest"
								src="<?php echo esc_url( rissho_university_img_url( $meta['photo'] ) ); ?>"
								alt=""
								width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
								height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
								loading="lazy"
								decoding="async"
							>
						</picture>
						<?php else : ?>
						<img
							class="ru-sv-card__photo ru-sv-card__photo--rest"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php endif; ?>
						<?php if ( ! empty( $meta['photo_hover'] ) ) : ?>
						<img
							class="ru-sv-card__photo ru-sv-card__photo--hover"
							src="<?php echo esc_url( rissho_university_img_url( $meta['photo_hover'] ) ); ?>"
							alt=""
							width="<?php echo esc_attr( round( $meta['img_w'] ) ); ?>"
							height="<?php echo esc_attr( round( $meta['img_h'] ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<?php endif; ?>
					</span>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
		</div>
	</div>
</section>

<section id="graduates" class="ru-section ru-section--graduates" data-figma-node="2707:10702" aria-labelledby="ru-grad-heading">
	<h2 id="ru-grad-heading" class="screen-reader-text"><?php esc_html_e( '卒業生 INTERVIEW', 'rissho-university' ); ?></h2>
	<div class="ru-grad__stage">
		<div class="ru-grad__canvas">
		<div class="ru-grad__decor" aria-hidden="true" role="presentation">
			<?php
			$gw = RISSHO_GRAD_FIGMA_W;
			$gh = RISSHO_GRAD_FIGMA_H;
			foreach ( rissho_graduates_2707_10702_decor_layers() as $zi => $dl ) :
				$dstyle = sprintf(
					'left:%s%%;top:%s%%;width:%s%%;height:%s%%;z-index:%d;',
					round( ( $dl['x'] / $gw ) * 100, 4 ),
					round( ( $dl['y'] / $gh ) * 100, 4 ),
					round( ( $dl['w'] / $gw ) * 100, 4 ),
					round( ( $dl['h'] / $gh ) * 100, 4 ),
					1 + (int) $zi
				);
				?>
			<div class="ru-grad-decor__layer" style="<?php echo esc_attr( $dstyle ); ?>" data-node-id="<?php echo esc_attr( $dl['node'] ); ?>">
				<img src="<?php echo esc_url( rissho_university_img_url( $dl['file'] ) ); ?>" alt="" loading="lazy" decoding="async">
			</div>
				<?php
			endforeach;
			?>
		</div>
		<div class="ru-grad__main">
			<div class="ru-grad__title-wrap">
				<img
					class="ru-grad__title-sp"
					src="<?php echo esc_url( rissho_university_img_url( 'figma-graduates-2707-10702/title-sp.svg' ) ); ?>"
					alt=""
					loading="lazy"
					decoding="async"
				>
				<?php foreach ( rissho_graduates_2707_10702_title_layers() as $tl ) : ?>
				<div
					class="ru-grad-title__layer"
					style="<?php echo esc_attr( sprintf( 'left:%s%%;top:%s%%;width:%s%%;height:%s%%;', $tl['left'], $tl['top'], $tl['w'], $tl['h'] ) ); ?>"
					data-node-id="<?php echo esc_attr( $tl['node'] ); ?>"
				>
					<img src="<?php echo esc_url( rissho_university_img_url( $tl['file'] ) ); ?>" alt="" loading="lazy" decoding="async">
				</div>
				<?php endforeach; ?>
			</div>
			<div class="ru-grad__row">
				<?php
				$gidx = 0;
				foreach ( rissho_graduates_2707_10702_row_columns() as $col ) :
					if ( 'illo' === $col['kind'] ) :
						$asp = $col['aspect'];
						$ar  = sprintf( 'aspect-ratio:%F / %F;', $asp['w'], $asp['h'] );
						?>
				<div
					class="ru-grad__col ru-grad__col--illo"
					style="<?php echo esc_attr( sprintf( '--ru-grad-col-w:%F;--ru-grad-col-h:%F;', $asp['w'], $asp['h'] ) ); ?>"
				>
						<?php if ( ! empty( $col['voice_text'] ) ) : ?>
					<button
						type="button"
						class="ru-grad-illo-btn"
						data-ru-grad-voice-text="<?php echo esc_url( rissho_university_img_url( $col['voice_text'] ) ); ?>"
						<?php if ( ! empty( $col['voice_text_sp'] ) ) : ?>
						data-ru-grad-voice-text-sp="<?php echo esc_url( rissho_university_img_url( $col['voice_text_sp'] ) ); ?>"
						<?php endif; ?>
						aria-expanded="false"
						aria-controls="ru-grad-voice-text"
						style="<?php echo esc_attr( $ar ); ?>"
					>
						<span class="screen-reader-text"><?php esc_html_e( '卒業生インタビュー（コメントを表示）', 'rissho-university' ); ?></span>
						<img src="<?php echo esc_url( rissho_university_img_url( $col['photo'] ) ); ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
					</button>
						<?php else : ?>
					<div class="ru-grad-illo" style="<?php echo esc_attr( $ar ); ?>">
						<img src="<?php echo esc_url( rissho_university_img_url( $col['photo'] ) ); ?>" alt="" loading="lazy" decoding="async">
					</div>
						<?php endif; ?>
				</div>
						<?php
					else :
						$g   = isset( $graduates[ $gidx ] ) ? $graduates[ $gidx ] : array( 'label' => '' );
						$gidx++;
						$asp = $col['aspect'];
						?>
				<div
					class="ru-grad__col ru-grad__col--card"
					style="<?php echo esc_attr( sprintf( '--ru-grad-col-w:%F;--ru-grad-col-h:%F;', $asp['w'], $asp['h'] ) ); ?>"
				>
					<button
						type="button"
						class="ru-grad-card"
						<?php if ( ! empty( $col['voice_text'] ) ) : ?>
						data-ru-grad-voice-text="<?php echo esc_url( rissho_university_img_url( $col['voice_text'] ) ); ?>"
						<?php if ( ! empty( $col['voice_text_sp'] ) ) : ?>
						data-ru-grad-voice-text-sp="<?php echo esc_url( rissho_university_img_url( $col['voice_text_sp'] ) ); ?>"
						<?php endif; ?>
						aria-expanded="false"
						aria-controls="ru-grad-voice-text"
						<?php else : ?>
						data-open-interview-modal
						<?php endif; ?>
						style="<?php echo esc_attr( sprintf( 'aspect-ratio:%F / %F;', $asp['w'], $asp['h'] ) ); ?>"
					>
						<span class="screen-reader-text"><?php echo esc_html( $g['label'] ); ?></span>
						<span class="ru-grad-card__stack" aria-hidden="true">
							<?php if ( ! empty( $col['flat'] ) ) : ?>
							<span class="ru-grad-card__flat">
								<img src="<?php echo esc_url( rissho_university_img_url( $col['photo'] ) ); ?>" alt="" loading="lazy" decoding="async">
							</span>
							<?php else : ?>
								<?php
								$layers = isset( $col['layers'] ) ? $col['layers'] : array();
								foreach ( $layers as $layer ) :
									if ( '_photo' === $layer['file'] ) :
										$pstyle = sprintf(
											'z-index:%d;inset:%s;',
											(int) $layer['z'],
											$layer['inset']
										);
										?>
							<span class="ru-grad-card__photo" style="<?php echo esc_attr( $pstyle ); ?>">
								<img src="<?php echo esc_url( rissho_university_img_url( $col['photo'] ) ); ?>" alt="" loading="lazy" decoding="async">
							</span>
										<?php
									else :
										$lst = sprintf(
											'left:%s%%;top:%s%%;width:%s%%;height:%s%%;z-index:%d;',
											$layer['left'],
											$layer['top'],
											$layer['w'],
											$layer['h'],
											(int) $layer['z']
										);
										?>
							<span class="ru-grad-card__layer" style="<?php echo esc_attr( $lst ); ?>">
								<img src="<?php echo esc_url( rissho_university_img_url( $layer['file'] ) ); ?>" alt="" loading="lazy" decoding="async">
							</span>
										<?php
									endif;
								endforeach;
								?>
							<?php endif; ?>
						</span>
					</button>
				</div>
						<?php
					endif;
				endforeach;
				?>
			</div>
		</div>
		</div>
		<div id="ru-grad-voice-text" class="ru-grad__voice-text" aria-hidden="true">
			<div class="ru-grad__voice-text-inner">
				<img class="ru-grad__voice-text-img" src="" alt="<?php echo esc_attr__( '卒業生のコメント', 'rissho-university' ); ?>" decoding="async">
			</div>
		</div>
	</div>
</section>

<div id="ru-interview-modal" class="ru-modal-overlay" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="ru-modal-title">
	<div class="ru-modal">
		<button type="button" class="ru-modal__close" aria-label="<?php esc_attr_e( '閉じる', 'rissho-university' ); ?>">×</button>
		<p class="ru-modal__tag"><?php esc_html_e( '文学科', 'rissho-university' ); ?></p>
		<h2 id="ru-modal-title" class="ru-modal__title">
			<?php esc_html_e( '大学の授業で学んだ「文学の魅力」を中学生にも伝えたい。', 'rissho-university' ); ?>
		</h2>
		<div class="ru-modal__meta">
			<time datetime="2021-03"><?php esc_html_e( '2021年3月卒業', 'rissho-university' ); ?></time>
			<span><?php esc_html_e( '東京都中学校国語科教諭', 'rissho-university' ); ?></span>
		</div>
		<div class="ru-modal__body">
			<h3><?php esc_html_e( '仲間に励まされて最後までがんばれた', 'rissho-university' ); ?></h3>
			<p><?php esc_html_e( '中学の担任の先生へのあこがれから教員を志し、高校、大学を経て、その思いがより強くなっていきました。大学では同じ道を目指す仲間の励ましもあって、最後までがんばることができました。現在は大規模な中学校で1年生の担任をしており、生徒たちと日々楽しく過ごしています。', 'rissho-university' ); ?></p>
			<h3><?php esc_html_e( '文学を消費する人から生産する人へ', 'rissho-university' ); ?></h3>
			<p><?php esc_html_e( '大学の学びで特に印象に残っているのは、ゼミでもお世話になった先生の「消費する人から生産する人へ」という言葉です。作品に対して、ただ面白い、つまらないと感想を言うのは「消費」であって、学びにはならない。作品をどう解釈し、どのような意味を見いだすかで「生産者」になることができるというお話でした。', 'rissho-university' ); ?></p>
			<h3><?php esc_html_e( '学生同士がつながりを持てるようサポート', 'rissho-university' ); ?></h3>
			<p><?php esc_html_e( '日本語日本文学専攻コースでは、学生同士が関わりを持ちやすいよう、オリエンテーションキャンプという行事がありました。入学直後の不安な気持ちが解消され、とても思い出に残っています。', 'rissho-university' ); ?></p>
			<h3><?php esc_html_e( '大学で学んだ「文学の魅力」を中学生に伝えたい', 'rissho-university' ); ?></h3>
			<p><?php esc_html_e( '教員として日々の仕事に追われる毎日ですが、少しずつ自分なりのルーティンが確立できたら、大学で学んだ「文学の魅力」を中学生にも伝えるような授業をしたいと考えています。', 'rissho-university' ); ?></p>
		</div>
	</div>
</div>

<?php
get_footer( 'pamphlet' );
