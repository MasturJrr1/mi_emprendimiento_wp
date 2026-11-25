<?php
/**
 * functions.php — configuración básica del tema.
 * No cambies este archivo salvo que se te indique. Un error aquí rompe todo el sitio.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function mi_tema_configuracion() {
	add_theme_support( 'title-tag' );          // El título de cada página lo gestiona WordPress.
	add_theme_support( 'post-thumbnails' );    // Imagen destacada en entradas.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	register_nav_menus( array(
		'principal' => 'Menú principal',
	) );
}
add_action( 'after_setup_theme', 'mi_tema_configuracion' );

function mi_tema_estilos() {
	// Usa la versión del tema (style.css) para que el navegador descargue el CSS nuevo en cada actualización.
	wp_enqueue_style( 'mi-tema-estilo', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'mi_tema_estilos' );
