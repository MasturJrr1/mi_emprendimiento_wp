<?php
/**
 * front-page.php — el HOME de altima.str.
 * Secciones del prototipo de Stitch: hero del drop, novedades, texto de la página Inicio,
 * sellos de confianza, últimas entradas del blog y formulario de novedades.
 */
get_header();

$img = get_template_directory_uri() . '/assets/img/';

// Novedades del Drop 004 (en la etapa 2 vendrán de WooCommerce).
$novedades = array(
	array( 'nombre' => 'Yankees 59FIFTY Undervisor Gris', 'linea' => 'MLB · Fitted',       'precio' => '$39.990', 'img' => 'gorra-marino.svg', 'tag' => 'Quedan 2',  'tag_clase' => 'etiqueta-stock' ),
	array( 'nombre' => 'Dodgers 9FORTY Tierra',            'linea' => 'MLB · Casual',       'precio' => '$29.990', 'img' => 'gorra-cafe.svg',   'tag' => 'Nueva',     'tag_clase' => '' ),
	array( 'nombre' => 'Bulls 9FIFTY Snapback 90s',        'linea' => 'NBA · Snapback',     'precio' => '$34.990', 'img' => 'gorra-negra.svg',  'tag' => 'Retro 90s', 'tag_clase' => 'etiqueta-oscura' ),
	array( 'nombre' => 'Red Sox 59FIFTY Low Profile',      'linea' => 'MLB · Low Profile',  'precio' => '$39.990', 'img' => 'gorra-rosa.svg',   'tag' => 'Colección', 'tag_clase' => '' ),
);
$contacto = home_url( '/contacto/' );
?>

<!-- SECCIÓN 1: hero del drop -->
<section class="contenedor">
	<div class="hero-drop">
		<div>
			<span class="etiqueta">Drop 004 · Stock limitado</span>
			<h1>Curado pa' la calle</h1>
			<p>Gorras New Era originales: fitted de colección, ediciones especiales y casuales para el día a día.</p>
			<div class="botones">
				<a class="boton boton-secundario" href="<?php echo esc_url( home_url( '/coleccion/' ) ); ?>">Ver la colección</a>
				<a class="boton" style="border-color:#fff" href="<?php echo esc_url( $contacto ); ?>">Consultar stock</a>
			</div>
			<p class="datos">Quedan 8 unidades del drop · Envío a todo Chile</p>
		</div>
		<div class="hero-imagen">
			<img src="<?php echo esc_url( $img . 'gorra-hero.svg' ); ?>" alt="Gorra 59FIFTY azul marino del Drop 004" width="480" height="480">
			<span class="etiqueta">Edición 59FIFTY</span>
		</div>
	</div>
</section>

<!-- SECCIÓN 2: novedades -->
<section class="seccion">
	<div class="contenedor">
		<div class="seccion-cabecera">
			<div>
				<span class="antetitulo">Catálogo destacado · Disponibilidad inmediata</span>
				<h2>Novedades</h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/coleccion/' ) ); ?>">Ver toda la colección →</a>
		</div>

		<div class="grilla-productos">
			<?php foreach ( $novedades as $gorra ) : ?>
				<article class="tarjeta-producto">
					<div class="imagen">
						<img src="<?php echo esc_url( $img . $gorra['img'] ); ?>" alt="<?php echo esc_attr( $gorra['nombre'] ); ?>" width="400" height="400" loading="lazy">
						<span class="etiqueta <?php echo esc_attr( $gorra['tag_clase'] ); ?>"><?php echo esc_html( $gorra['tag'] ); ?></span>
					</div>
					<div class="meta"><span><?php echo esc_html( $gorra['linea'] ); ?></span><span class="autentica">Auténtica</span></div>
					<h3 class="nombre" style="font-family:var(--fuente-texto);font-size:1rem"><?php echo esc_html( $gorra['nombre'] ); ?></h3>
					<p class="precio"><?php echo esc_html( $gorra['precio'] ); ?></p>
					<a class="boton boton-contorno" href="<?php echo esc_url( $contacto ); ?>">Consultar</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- SECCIÓN 3: texto de la página Inicio (se edita en WordPress) -->
<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( trim( get_the_content() ) ) : ?>
		<section class="seccion seccion-destacada">
			<div class="contenedor contenido-texto">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endif; ?>
<?php endwhile; ?>

<!-- SECCIÓN 4: últimas entradas del blog -->
<section class="seccion">
	<div class="contenedor">
		<div class="seccion-cabecera">
			<div>
				<span class="antetitulo">Cultura de gorra</span>
				<h2>Del blog</h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Ver todos los artículos →</a>
		</div>
		<div class="grilla-articulos">
			<?php
			$ultimas = new WP_Query( array( 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) );
			if ( $ultimas->have_posts() ) :
				while ( $ultimas->have_posts() ) :
					$ultimas->the_post();
					?>
					<article class="tarjeta-articulo">
						<div class="imagen">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); } else { ?><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/articulo.svg' ); ?>" alt="" width="640" height="360" loading="lazy"><?php } ?>
						</div>
						<div class="cuerpo">
							<?php $cat = get_the_category(); if ( $cat ) : ?><span class="etiqueta"><?php echo esc_html( $cat[0]->name ); ?></span><?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( get_the_date() ); ?> · <?php echo esc_html( max( 1, round( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) ) ); ?> min de lectura</p>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p>Pronto publicamos nuestros primeros artículos.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- SECCIÓN 5: formulario de novedades -->
<section class="contenedor">
	<div class="form-novedades">
		<h2>Entérate primero de cada drop</h2>
		<p>Lanzamientos, reposiciones y 10% de descuento en tu primera gorra.</p>
		<?php if ( shortcode_exists( 'mailpoet_form' ) ) : ?>
			<?php echo do_shortcode( '[mailpoet_form id="1"]' ); ?>
		<?php else : ?>
			<a class="boton" href="https://www.instagram.com/altima.club/" target="_blank" rel="noopener">Síguenos en Instagram</a>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
