<?php
/**
 * メインテンプレート（フォールバック）
 *
 * @package Rissho_University
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php if ( is_singular() ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
				<?php endif; ?>
			</header>
			<div class="entry-content">
				<?php
				if ( is_singular() ) {
					the_content();
				} else {
					the_excerpt();
				}
				?>
			</div>
		</article>
	<?php endwhile; ?>

	<?php the_posts_pagination(); ?>

<?php else : ?>
	<p><?php esc_html_e( '投稿が見つかりませんでした。', 'rissho-university' ); ?></p>
<?php endif; ?>

<?php
get_footer();
