<?php
/**
 * page.php — una página (Colección, Nosotros, Preguntas frecuentes, Contacto).
 * El extracto de la página se muestra como bajada bajo el título.
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="cabecera-pagina">
		<div class="contenedor">
			<span class="antetitulo">altima.str</span>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="seccion">
		<div class="contenedor">
			<article class="contenido-texto contenido-ancho">
				<?php the_content(); ?>
			</article>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?>
