<?php
// Theme supports
if ( ! function_exists( 'tensixtwentytwentytwo_add_theme_support' ) ) :
    function tensixtwentytwentytwo_add_theme_support(){
        // Adds dynamic title tag support
        add_theme_support( 'title-tag' );

        // Allows Upload a custom logo 
        add_theme_support( 'custom-logo' );

        // Allows user to upload featured image
        add_theme_support( 'post-thumbnails' );

		// Allows all post formats
	    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'videos', 'audio', 'chat' ) );
    }
endif;
add_action( 'after_setup_theme', 'tensixtwentytwentytwo_add_theme_support' );

// Register nav menus
if ( ! function_exists( 'tensixtwentytwentytwo_register_nav_menus' ) ) :
    function tensixtwentytwentytwo_register_nav_menus(){
        $locations = array(
            'primary' => 'Desktop primary left sidebar',
            'footer' => 'Footer Menu Items'
        );
        register_nav_menus( $locations );
    }
endif;
add_action( 'init', 'tensixtwentytwentytwo_register_nav_menus' );

// Add Class to Our menu list ( ul > li )
if ( ! function_exists( 'add_nav_items_class' ) ) :
    function add_nav_items_class( $classes, $item, $args){
        if ( isset( $args->li_class ) ) : 
            $classes[] = $args->li_class;
        endif;

        return $classes;
    }
endif;
add_filter( 'nav_menu_css_class', 'add_nav_items_class', 1, 3 );

// Add Class to Our menu links ( ul > li > a )
if ( ! function_exists( 'add_nav_items_link_class' ) ) :
    function add_nav_items_link_class( $atts, $item, $args ){
        if ( property_exists( $args, 'link_class' ) ) : 
            $atts[ 'class' ] = $args->link_class;
        endif;

        return $atts;
    }
endif;
add_filter( 'nav_menu_link_attributes', 'add_nav_items_link_class', 1, 3 );


// Enqueueing Styles and Scripts
if ( ! function_exists( 'tensixtwentytwentytwo_styles' ) ) :
    /**
     * Enqueue styles
     *
     * @return void
     */
    function tensixtwentytwentytwo_styles() {
        // Register theme stylesheet
        $theme_version = wp_get_theme()->get( 'Version' );

        $version_string = is_string( $theme_version ) ? $theme_version : false;

        wp_register_style(
            'tensixtwentytwentytwo-styles',
            get_template_directory_uri() . '/style.css',
            array('tensixtwentytwentytwo-style-bootstrap'),
            $version_string
        );

        wp_register_style(
			'tensixtwentytwentytwo-style-bootstrap',
			'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
			array(),
			'4.4.1'
		);

        wp_register_style(
            'tensixtwentytwentytwo-fontawesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
            array(),
            '5.13.0'
        );
        
        // Enqueue theme stylesheet.
        wp_enqueue_style( 'tensixtwentytwentytwo-styles' );

        // Enqueue bootstrap.
        wp_enqueue_style( 'tensixtwentytwentytwo-style-bootstrap' );

        // Enqueue fontawesome.
        wp_enqueue_style( 'tensixtwentytwentytwo-fontawesome' );
        
    }

endif;

add_action( 'wp_enqueue_scripts', 'tensixtwentytwentytwo_styles' ); 


if ( ! function_exists( 'tensixtwentytwentytwo_scripts' ) ) :
    /**
     * Register all scripts
     *
     * @return void
     */
    function tensixtwentytwentytwo_scripts(){

        wp_enqueue_script(
            'tensixtwentytwentytwo-jquery',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
	        array(),
            '3.4.1',
            true
        );

        wp_enqueue_script(
            'tensixtwentytwentytwo-pooper',
            'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
            array(),
            '1.16.0',
            true
        );

        wp_enqueue_script(
            'tensixtwentytwentytwo-bootstrap-script',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
            array(),
            '4.4.1',
            true
        );

        $theme_version = wp_get_theme()->get( 'Version' );

        $version_string = is_string( $theme_version ) ? $theme_version : false;

        wp_enqueue_script(
            'tensixtwentytwentytwo-main-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array(),
            $version_string,
            true
        );

    }
endif;

add_action( 'wp_enqueue_scripts', 'tensixtwentytwentytwo_scripts' ); 


// Widget area 
if ( ! function_exists( 'tensixtwentytwentytwo_widget_areas' ) ) :
    function tensixtwentytwentytwo_widget_areas() {

        // Sidebar widget 
        $args_sidebar = array(
            'id' => 'social-links',
            'name' => __( 'Nous suivre', 'tensixtwentytwentytwo' ),
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        );
        register_sidebar( $args_sidebar );

        $args_footer_1 = array(
            'id' => 'footer 1',
            'name' => __( 'Footer 1', 'tensixtwentytwentytwo' ),
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        );
        register_sidebar( $args_footer_1 );

        $args_footer_2 = array(
            'id' => 'footer 2',
            'name' => __( 'Footer 2', 'tensixtwentytwentytwo' ),
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        );
        register_sidebar( $args_footer_2 );

        $args_footer_3 = array(
            'id' => 'footer 3',
            'name' => __( 'Footer 3', 'tensixtwentytwentytwo' ),
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        );
        register_sidebar( $args_footer_3 );

        $args_footer_4 = array(
            'id' => 'footer 4',
            'name' => __( 'Footer 4', 'tensixtwentytwentytwo'),
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        );
        register_sidebar( $args_footer_4 );

    }
endif;

add_action( 'widgets_init', 'tensixtwentytwentytwo_widget_areas' );