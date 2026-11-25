<?php
/**
 * index.php — lista de entradas (la página Blog usa esta plantilla).
 */
get_header();
?>

<section class="cabecera-pagina">
	<div class="contenedor">
		<span class="antetitulo">Cultura de gorra</span>
		<h1><?php echo is_home() && get_option( 'page_for_posts' ) ? esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) : 'Blog'; ?></h1>
		<p>Guías, historia y cuidado de gorras New Era para la comunidad streetwear.</p>
	</div>
</section>

<section class="seccion">
	<div class="contenedor">
		<?php if ( have_posts() ) : ?>
			<div class="grilla-articulos">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="tarjeta-articulo">
						<div class="imagen">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); } else { ?><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/articulo.svg' ); ?>" alt="" width="640" height="360" loading="lazy"><?php } ?>
						</div>
						<div class="cuerpo">
							<?php $cat = get_the_category(); if ( $cat ) : ?><span class="etiqueta"><?php echo esc_html( $cat[0]->name ); ?></span><?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( get_the_date() ); ?></p>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>No hay entradas todavía.</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
