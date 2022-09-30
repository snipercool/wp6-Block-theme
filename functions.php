<?php 

define( 'THEME_VERSION', 1.0 );
define( 'THEME_NAME', 'test-theme' );

if ( ! isset( $content_width ) ) $content_width = 1200;

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', THEME_NAME ),
		'secondary'	=>	__( 'Secondary Menu', THEME_NAME ),
		'footer'	=>	__( 'Footer Menu', THEME_NAME )
	)
);



if ( ! function_exists( 'test_theme_support' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since My theme name 1.0
 *
 * @return void
 */
function test_theme_support() {

    // Add support for block styles.
    add_theme_support( 'wp-block-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style.css' );

}

endif;
add_action( 'after_setup_theme', 'test_theme_support' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function theme_scripts()  { 

	// get theme styles
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('blocks', get_stylesheet_directory_uri() . '/assets/css/blocks.css');
	
	// add theme scripts
	wp_register_script( 'theme-js', get_template_directory_uri() . '/dist/js/app.js', array("jquery"), THEME_VERSION, true );
    wp_localize_script('theme-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script( 'theme-js');
  
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

