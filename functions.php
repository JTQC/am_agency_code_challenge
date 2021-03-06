<?php
/**
 * am_code_challenge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package am_code_challenge
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'am_code_challenge_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function am_code_challenge_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on am_code_challenge, use a find and replace
		 * to change 'am-code-challenge' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'am-code-challenge', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'am-code-challenge' ),
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
				'am_code_challenge_custom_background_args',
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
add_action( 'after_setup_theme', 'am_code_challenge_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function am_code_challenge_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'am_code_challenge_content_width', 640 );
}
add_action( 'after_setup_theme', 'am_code_challenge_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function am_code_challenge_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'am-code-challenge' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'am-code-challenge' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'am_code_challenge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function am_code_challenge_scripts() {
	wp_enqueue_style( 'am-code-challenge-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'am-code-challenge-style', 'rtl', 'replace' );

	wp_enqueue_script( 'am-code-challenge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_style('bootstrap-cdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'am_code_challenge_scripts' );

// /**
// 	=== AM CODE CHALLENGE CODE ===
// */

//Create taxanomies for post type

function am_taxanomies(){

	//Topic
	$topic_labels = array(
		'name' => _x( 'Topics', 'taxonomy general name' ),
		'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
		'search_items' => __( 'Search Topics' ),
		'all_items' => __( 'All Topics' ),
		'edit_item' => __( 'Edit Topic' ),
		'update_item' => __( 'Update Topic' ),
		'add_new_item' => __( 'Add New Topic' ),
		'new_item_name' => __( 'New Topic Name' ),
		'menu_name' => __( 'Topics' )
	);

	register_taxonomy('topic', 'resource',
		array(
			'hierarchial' => false,
			'labels' => $topic_labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => 'topic',
			'rewrite' => array( 'slug' => 'topic' ),
		)
	);

	//Audience
	$audience_labels = array(
		'name' => _x( 'Audiences', 'taxonomy general name' ),
		'singular_name' => _x( 'Audience', 'taxonomy singular name' ),
		'search_items' => __( 'Search Audiences' ),
		'all_items' => __( 'All Audiences' ),
		'edit_item' => __( 'Edit Audience' ),
		'update_item' => __( 'Update Audience' ),
		'add_new_item' => __( 'Add New Audience' ),
		'new_item_name' => __( 'New Audience Name' ),
		'menu_name' => __( 'Audiences' )
	);

	register_taxonomy('audience', 'resource',
		array(
			'hierarchial' => false,
			'labels' => $audience_labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => 'audience',
			'rewrite' => array( 'slug' => 'audience' ),
		)
	);
}

add_action( 'init', 'am_taxanomies');
// Create resource post type

function create_resource_post() {

	register_post_type('resource',
		array(
			'label' => 'Resource',
			'labels' => 'Resources',
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('topic', 'audience'),
			'supports' => array('title', 'editor', 'author', 'thumbnail', )
		)
	);
}

add_action( 'init', 'create_resource_post' );

//Add Custom Metabox for Download URL
function am_custom_metabox(){

    add_meta_box(
            'am-metabox',
            'Download URL',
            'am_custom_metabox_callback',
            'resource'
          );
}

add_action('add_meta_boxes', 'am_custom_metabox');

//Callback to display form for URL inside metabox
function am_custom_metabox_callback(){

	global $post;

    ?>
	<div class="row">
		<div class="label">File Download URL</div>
		<div class="fields">
			<input type="url" name="_am_download_url" value="<?php echo get_post_meta($post->ID, 'post_download_url', true); ?>"></input>
		</div>
	<?php
}

//Save meta value of form on update
function am_custom_metabox_save(){

	global $post;

	if(isset($_POST["_am_download_url"])){

		update_post_meta($post->ID, 'post_download_url', $_POST["_am_download_url"]);

	}
}

add_action('save_post', 'am_custom_metabox_save');


//Filter Searches for Resources

function am_filter_resources() {

	$term_value = $_POST['termvalue'];
	$tax_value = $_POST['taxvalue'];

	$ajaxposts = new WP_Query([
		'post_type' => 'resource',
		'tax_query' => array(
	        array(
	            'taxonomy' => $tax_value,
	            'field'    => 'slug',
	            'terms'    => $term_value,
	        ),
    	),
		'posts_per_page' => 10,
		'orderby' => 'menu_order',
		'order' => 'desc',
	]);
	$response = '';

	if($ajaxposts->have_posts()) {
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= get_template_part('template-parts/content-search');
		endwhile;
	}
	else {
		$response = '<p class="h2">Sorry no posts match your filter.</p>';
	}

	echo $response;

	exit;
}
add_action('wp_ajax_am_filter_resources', 'am_filter_resources');
add_action('wp_ajax_nopriv_am_filter_resources', 'am_filter_resources');

//=== END AM CODE CHALLENGE CODE ===//


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
