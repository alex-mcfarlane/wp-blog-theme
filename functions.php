<?php

add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );
function theme_add_bootstrap() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
}

add_filter('body_class', 'mbe_body_class');
function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}
add_action('wp_head', 'mbe_wp_head');
function mbe_wp_head(){
    echo '<style>'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'@media only screen and (min-width: 783px) {'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'}</style>'
    .PHP_EOL;
}

add_action( 'widgets_init', 'mat_widget_areas' );
function mat_widget_areas() {
    register_sidebar( array(
        'name' => 'Theme Sidebar',
        'id' => 'mat-sidebar',
        'description' => 'The main sidebar shown on the right in our theme',
        'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ));
}