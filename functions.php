<?php 

/** Consultas reutilizables **/
require get_template_directory() . '/inc/queries.php';

/*
    Cuando el tema es acivado
*/
function gymfitness_setup(){

    //Habilitar imágenes destacadas
    add_theme_support('post-thumbnails');

    //Agregar imágenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);

}

add_action('after_setup_theme', 'gymfitness_setup');


/*
    Menus de Navegacion para el tema, puedes agregar más menus al sitio 
    agregando más valores al arreglo contenido en la función register_nav_menus
*/

function gymfitness_menus(){
    
    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal' , 'gymfitness' )
    ));

}

add_action('init', 'gymfitness_menus');

/*
    Scripts y Styles
*/

function gymfitness_scripts_styles(){
    
    //Cargamos nuestros estilos de reset para CSS con normalize
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    //Cargamos nuestro archivo css para responsive nav jQuery plugin
    wp_enqueue_style('slickNavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

    //Cargamos nuestros estilos Open Sans de google web fonts
    wp_enqueue_style('openSans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap', array(), '1.0.0');
    //Cargamos nuestros estilos Raleway de google web fonts
    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css2?family=Raleway:wght@200;400&display=swap', array(), '1.0.0');
    //Cargamos nuestros estilos Staatliches de google web fonts
    wp_enqueue_style('staatliches', 'https://fonts.googleapis.com/css2?family=Staatliches&display=swap', array(), '1.0.0');
 
    //Cargamos la hoja de estilos principal de nuestro tema
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'openSans', 'raleway', 'staatliches'), '1.0.0');

    //Cargamos nuestro archivo js para responsive nav jQuery plugin    
    wp_enqueue_script('slickNavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

     //Cargamos nuestro archivo script principal para nuestro tema 
     wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');