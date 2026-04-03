<?php
/**
 * デジタルパンフレット用フッター（Figma 2752:17145）
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_title = rissho_footer_2752_17145_heading_title_file();
?>

<!-- RU_THEME_MARKER: footer-pamphlet.php 2026-03-30 -->

</main><!-- #primary -->
</div><!-- .ru-pamphlet-frame -->

<footer id="sns" class="ru-footer-pamphlet" data-figma-node="2752:17145">
	<div class="ru-footer-pamphlet__heading-wrap">
		<div class="ru-footer-pamphlet__heading">
			<img
				class="ru-footer-pamphlet__heading-img"
				src="<?php echo esc_url( rissho_university_img_url( $footer_title ) ); ?>"
				alt="<?php echo esc_attr__( '文学部公式アカウント', 'rissho-university' ); ?>"
				width="386"
				height="39"
				decoding="async"
				data-node-id="2752:17145"
			>
		</div>
	</div>

	<div class="ru-footer-pamphlet__bar">
		<div class="ru-footer-pamphlet__social-row">
			<?php foreach ( rissho_footer_2752_17145_social_columns() as $col ) : ?>
				<?php
				// フィルター等で url が '#' に戻るケースがあるため、最終的に data-node-id から強制復元します。
				$defaults = array(
					'2696:5377' => 'https://www.facebook.com/profile.php?id=100093303840512',
					'2696:5390' => 'https://www.instagram.com/rissho_bungakubu?igsh=emh5cnVwbW5xcXMz',
					'2696:5411' => 'https://x.com/ris_letters?s=11&t=rDnyTSOu4om6v2izSw2uZA',
					'2696:5419' => 'https://www.tiktok.com/@letkouhou?is_from_webapp=1&sender_device=pc',
				);

				$social_raw = isset( $col['url'] ) ? trim( (string) $col['url'] ) : '';
				$social_href = esc_url( $social_raw );
				if ( '' === $social_href && preg_match( '#\Ahttps?://#i', $social_raw ) ) {
					$social_href = esc_attr( $social_raw );
				}

				// '#' のままの場合は強制的に指定URLへ差し替え。
				if ( '#' === $social_href || '#' === $social_raw ) {
					$node = isset( $col['node'] ) ? (string) $col['node'] : '';
					if ( isset( $defaults[ $node ] ) ) {
						$social_href = esc_url( $defaults[ $node ] );
						$social_raw  = $defaults[ $node ];
					}
				}

				$social_ext = (bool) preg_match( '#\Ahttps?://#i', (string) $social_raw );
				?>
			<a
				class="ru-footer-pamphlet__col"
				href="<?php echo $social_href; ?>"
				data-node-id="<?php echo esc_attr( $col['node'] ); ?>"
				data-sns-href="<?php echo esc_attr( (string) $social_href ); ?>"
				<?php if ( $social_ext ) : ?>
				target="_blank"
				rel="noopener noreferrer"
				<?php endif; ?>
			>
				<span class="screen-reader-text">
					<?php echo esc_html( $col['label'] ); ?>
					<?php if ( $social_ext ) : ?>
						<?php esc_html_e( '（別サイトへ移動します）', 'rissho-university' ); ?>
					<?php endif; ?>
				</span>
				<span class="ru-footer-pamphlet__asset" aria-hidden="true">
					<img
						src="<?php echo esc_url( rissho_university_img_url( $col['image'] ) ); ?>"
						alt=""
						decoding="async"
						loading="lazy"
					>
				</span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
