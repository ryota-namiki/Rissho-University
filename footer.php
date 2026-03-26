<?php
/**
 * フッターテンプレート
 *
 * @package Rissho_University
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

</main><!-- #primary -->

<footer class="site-footer">
	<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
