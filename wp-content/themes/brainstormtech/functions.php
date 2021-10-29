<?php
/**
 * brainstormtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brainstormtech
 */

add_filter( 'show_admin_bar', '__return_false' );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( 'URL' ) ) {
    define( 'URL', site_url() . '/wp-content/themes/' . get_option( 'stylesheet' ) . '/' );
}

if ( ! function_exists( 'brainstormtech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brainstormtech_setup() {
		/* 
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on brainstormtech, use a find and replace
		 * to change 'brainstormtech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brainstormtech', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'brainstormtech' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'brainstormtech_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'brainstormtech_setup' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'General',
        'menu_title'	=> 'General',
        'menu_slug' 	=> 'options',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'options',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'options',
    ));

}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brainstormtech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brainstormtech_content_width', 640 );
}
add_action( 'after_setup_theme', 'brainstormtech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brainstormtech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'brainstormtech' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brainstormtech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'brainstormtech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function brainstormtech_scripts() {
	wp_enqueue_style( 'brainstormtech-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'brainstormtech-style', 'rtl', 'replace' );

	wp_enqueue_script( 'brainstormtech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brainstormtech_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once 'inc/styles-scripts.php';

/* Register custom post for Services */
$labels = array(
    'name'                  => _x( 'Projects', 'Services Type General Name', 'brainstormtech' ),
    'singular_name'         => _x( 'Projects', 'Services Type Singular Name', 'brainstormtech' ),
    'menu_name'             => __( 'Projects', 'brainstormtech' ),
    'name_admin_bar'        => __( 'Projects Type', 'brainstormtech' ),
    'archives'              => __( 'Item Archives', 'brainstormtech' ),
    'attributes'            => __( 'Item Attributes', 'brainstormtech' ),
    'parent_item_colon'     => __( 'Parent ServProjectsices:', 'brainstormtech' ),
    'all_items'             => __( 'All Projects', 'brainstormtech' ),
    'add_new_item'          => __( 'Add New Projects', 'brainstormtech' ),
    'add_new'               => __( 'Add New Projects', 'brainstormtech' ),
    'new_item'              => __( 'New Projects', 'brainstormtech' ),
    'edit_item'             => __( 'Edit Projects', 'brainstormtech' ),
    'update_item'           => __( 'Update Projects', 'brainstormtech' ),
    'view_item'             => __( 'View Projects', 'brainstormtech' ),
    'view_items'            => __( 'View Projects list', 'brainstormtech' ),
    'search_items'          => __( 'Search Projects', 'brainstormtech' ),
    'not_found'             => __( 'Not found', 'brainstormtech' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'brainstormtech' ),
    'featured_image'        => __( 'Featured Image', 'brainstormtech' ),
    'set_featured_image'    => __( 'Set featured image', 'brainstormtech' ),
    'remove_featured_image' => __( 'Remove featured image', 'brainstormtech' ),
    'use_featured_image'    => __( 'Use as featured image', 'brainstormtech' ),
    'insert_into_item'      => __( 'Insert into item', 'brainstormtech' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'brainstormtech' ),
    'items_list'            => __( 'Projects list', 'brainstormtech' ),
    'items_list_navigation' => __( 'Projects list navigation', 'brainstormtech' ),
    'filter_items_list'     => __( 'Filter items list', 'brainstormtech' ),
);
$args = array(
    'label'                 => __( 'Projects', 'brainstormtech' ),
    'description'           => __( 'Projects Description', 'brainstormtech' ),
    'labels'                => $labels,
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-gallery',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'rewrite'               => array('slug' => 'projects','with_front' => false),
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
    'show_in_rest'          => true,
);
register_post_type( 'Projects', $args );

// Register taxonomy for portfolio
register_taxonomy( 'projects_cat', array('projects'), array(
    'hierarchical' => true,
    'label' => 'Categories',
    'singular_label' => 'Category',
    'show_in_rest'  => true,
    'show_ui'     => true,
    'rewrite' => array( 'slug' => 'projects_cat', 'with_front'=> false )
));
register_taxonomy_for_object_type( 'projects', array( 'projects' ));

add_filter('wpcf7_autop_or_not', '__return_false');

