<?php
// Theme supports
if ( ! function_exists( 'tensixtwentytwentytwo_add_theme_support' ) ) :
	function tensixtwentytwentytwo_add_theme_support() {
		// Adds dynamic title tag support
		add_theme_support( 'title-tag' );

		// Allows Upload a custom logo
		add_theme_support( 'custom-logo' );

		// Allows user to upload featured image
		add_theme_support( 'post-thumbnails' );

		// Allows all post formats
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'videos',
			'audio',
			'chat'
		) );
	}
endif;
add_action( 'after_setup_theme', 'tensixtwentytwentytwo_add_theme_support' );

// Register nav menus
if ( ! function_exists( 'tensixtwentytwentytwo_register_nav_menus' ) ) :
	function tensixtwentytwentytwo_register_nav_menus() {
		$locations = array(
			'primary' => 'Desktop primary left sidebar',
			'footer'  => 'Footer Menu Items'
		);
		register_nav_menus( $locations );
	}
endif;
add_action( 'init', 'tensixtwentytwentytwo_register_nav_menus' );

// Add Class to Our menu list ( ul > li )
if ( ! function_exists( 'add_nav_items_class' ) ) :
	function add_nav_items_class( $classes, $item, $args ) {
		if ( isset( $args->li_class ) ) :
			$classes[] = $args->li_class;
		endif;

		return $classes;
	}
endif;
add_filter( 'nav_menu_css_class', 'add_nav_items_class', 1, 3 );

// Add Class to Our menu links ( ul > li > a )
if ( ! function_exists( 'add_nav_items_link_class' ) ) :
	function add_nav_items_link_class( $atts, $item, $args ) {
		if ( property_exists( $args, 'link_class' ) ) :
			$atts['class'] = $args->link_class;
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
			array( 'tensixtwentytwentytwo-style-bootstrap' ),
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
	function tensixtwentytwentytwo_scripts() {

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
			'id'            => 'social-links',
			'name'          => __( 'Nous suivre', 'tensixtwentytwentytwo' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => ''
		);
		register_sidebar( $args_sidebar );

		$args_footer_1 = array(
			'id'            => 'footer 1',
			'name'          => __( 'Footer 1', 'tensixtwentytwentytwo' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => ''
		);
		register_sidebar( $args_footer_1 );

		$args_footer_2 = array(
			'id'            => 'footer 2',
			'name'          => __( 'Footer 2', 'tensixtwentytwentytwo' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => ''
		);
		register_sidebar( $args_footer_2 );

		$args_footer_3 = array(
			'id'            => 'footer 3',
			'name'          => __( 'Footer 3', 'tensixtwentytwentytwo' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => ''
		);
		register_sidebar( $args_footer_3 );

		$args_footer_4 = array(
			'id'            => 'footer 4',
			'name'          => __( 'Footer 4', 'tensixtwentytwentytwo' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => ''
		);
		register_sidebar( $args_footer_4 );

	}
endif;

add_action( 'widgets_init', 'tensixtwentytwentytwo_widget_areas' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/classes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'tensixtwentytwentytwo_register_js_composer_plugins' );

function tensixtwentytwentytwo_register_js_composer_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Visual Composer',
			// The plugin name.
			'slug'               => 'visual_composer',
			// The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory_uri() . '/lib/plugins/visualcomposer.44.3.1.zip',
			// The plugin source. It can be an external link, wordpress plugin repository or a GITHUB repository.
			'required'           => false,
			// If false, the plugin is only 'recommended' instead of required.
			'version'            => '',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL.
			'is_callable'        => '',
			// If set, this callable will be checked for availability to determine if a plugin is active.
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tensixtwentytwentytwo';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'           => $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug'  => 'themes.php', // Default parent URL slug
		'menu'             => 'install-required-plugins', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => false, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'Installer les plugins requis', $theme_text_domain ),
			'menu_title'                      => __( 'Installer les plugins', $theme_text_domain ),
			'installing'                      => __( 'Installation du plugin: %s', $theme_text_domain ),
			// %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     => _n_noop( 'Ce thème exige le plugin suivant: %1$s.', 'Ce thème exige les plugin suivants: %1$s.' ),
			// %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'Ce thème sera beaucoup plus mieux avec le plugin suivant: %1$s.', 'Ce thème sera beaucoup plus mieux avec les plugin suivants: %1$s.' ),
			// %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			// %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
			// %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'Le plugin recommandé suivant est actuellement inactif: %1$s.', 'Les plugins recommandé suivant est actuellement inactif: %1$s.' ),
			// %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			// %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
			// %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			// %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Commencez à installer le plugin', 'Commencez à installer les plugins' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                          => __( 'Retour à l\'installation des plugins requis', $theme_text_domain ),
			'plugin_activated'                => __( 'Le plugin a été activé avec succès.', $theme_text_domain ),
			'complete'                        => __( 'Tous les plugins sont installés et activés avec succès. %s', $theme_text_domain ),
			// %1$s = dashboard link
			'nag_type'                        => 'updated'
			// Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
