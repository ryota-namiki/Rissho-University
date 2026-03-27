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
				$social_href = $col['url'];
				$social_ext  = $social_href && '#' !== $social_href;
				?>
			<a
				class="ru-footer-pamphlet__col"
				href="<?php echo esc_url( $social_href ); ?>"
				data-node-id="<?php echo esc_attr( $col['node'] ); ?>"
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
