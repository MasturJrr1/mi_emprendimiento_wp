<?php
/**
 * single.php — una entrada de blog.
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="cabecera-pagina">
		<div class="contenedor">
			<span class="antetitulo"><?php the_category( ' · ' ); ?></span>
			<h1><?php the_title(); ?></h1>
			<p class="entrada-meta" style="color:#fff"><?php echo esc_html( get_the_date() ); ?> · <?php echo esc_html( max( 1, round( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) ) ); ?> min de lectura</p>
		</div>
	</section>

	<section class="seccion">
		<div class="contenedor">
			<article class="contenido-texto">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entrada-imagen"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php endif; ?>

				<?php the_content(); ?>

				<div class="caja" style="margin-top:40px">
					<h3>¿Te gustó una gorra de este artículo?</h3>
					<p>Escríbenos y te confirmamos stock, talla y envío.</p>
					<a class="boton" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Consultar stock</a>
				</div>

				<nav class="navegacion-entradas" aria-label="Más artículos">
					<span><?php previous_post_link( '%link', '← %title' ); ?></span>
					<span><?php next_post_link( '%link', '%title →' ); ?></span>
				</nav>

				<?php
				// Comentarios (aquí actúa Akismet).
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</article>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?>
