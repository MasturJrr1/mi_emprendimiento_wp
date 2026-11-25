<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1B2A41">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="solo-lectores saltar-contenido" href="#contenido">Saltar al contenido</a>

<div class="franja-aviso">Envíos a todo Chile · 100% originales New Era</div>

<header class="sitio-header">
	<div class="contenedor">
		<a class="sitio-titulo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>, ir al inicio">
			ALTIMA.STR
		</a>

		<input type="checkbox" id="menu-toggle" class="menu-toggle">
		<label for="menu-toggle" class="menu-boton" aria-label="Abrir menú"><span></span></label>

		<nav aria-label="Menú principal">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'principal',
				'menu_class'     => 'menu-principal',
				'container'      => false,
				'fallback_cb'    => false,
			) );
			?>
		</nav>
	</div>
</header>

<main id="contenido">
