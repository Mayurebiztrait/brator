<?php
/**
 * brator functions and definitions [brator]
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brator  BRATOR_THEME_URI BRATOR
 */

 /**
 * This function adds a meta box with a callback function of my_metabox_callback()
 */
function my_custom_admin_head() {
	echo '<style>#menu-posts-reviews .wp-submenu li:nth-child(3){
		display:none;
	}</style>';
}
add_action( 'admin_head', 'my_custom_admin_head' );
 function global_notice_meta_box() {

    add_meta_box(
        'review_fields',
        __( 'Review Data', 'textdomain' ),
        'review_data_fun',
        'reviews',
		'normal',
		'low',
    );
}

add_action( 'add_meta_boxes', 'global_notice_meta_box' );


/**
 * Get post meta in a callback
 *
 * @param WP_Post $post    The current post.
 * @param array   $metabox With metabox id, title, callback, and args elements.
 */

function review_data_fun( $post, $metabox ) {
	// Output last time the post was modified.
	//print_r($post);
	$email = get_post_meta($post->ID,'_email',true);
	$name = get_post_meta($post->ID,'_name',true);
	$city = get_post_meta($post->ID,'_city',true);
	$state = get_post_meta($post->ID,'_state',true);
	$review = get_post_meta($post->ID,'_review',true);
	$filename = get_post_meta($post->ID,'_file',true);

	echo 'Name: ' . $name.'<br>';
	echo 'Email: ' . $email.'<br>';
	
	echo 'City: ' . $city.'<br>';
	echo 'State: ' . $state.'<br>';
	echo 'review: ' . $review.'<br>';
	echo 'File: <a href="'.get_template_directory_uri().'/assets/images/'.$filename.'">' . $filename.'</a><br>';


}

function custom_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Top Features', 'Post Type General Name', 'aodes' ),
		'singular_name'       => _x( 'Feature', 'Post Type Singular Name', 'aodes' ),
		'menu_name'           => __( 'Top Features', 'aodes' ),
		'parent_item_colon'   => __( 'Parent Feature', 'aodes' ),
		'all_items'           => __( 'All Top Features', 'aodes' ),
		'view_item'           => __( 'View Feature', 'aodes' ),
		'add_new_item'        => __( 'Add New Feature', 'aodes' ),
		'add_new'             => __( 'Add New', 'aodes' ),
		'edit_item'           => __( 'Edit Feature', 'aodes' ),
		'update_item'         => __( 'Update Feature', 'aodes' ),
		'search_items'        => __( 'Search Feature', 'aodes' ),
		'not_found'           => __( 'Not Found', 'aodes' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
	);
	  
// Set other options for Custom Post Type
	  
	$args = array(
		'label'               => __( 'Top Features', 'aodes' ),
		'description'         => __( 'Feature news and reviews', 'aodes' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','editor','thumbnail','page-attributes','custom-fields','post-formats'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'features-categories' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
  
	);
	  
	// Registering your Custom Post Type
	register_post_type( 'topfeatures', $args );

	$labels = array(
		'name' => 'Categories'  ,
		'singular_name' => 'Category',
		'search_items' =>  __( 'Search Categories' ),
		'all_items' => __( 'All Categories' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ), 
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
		'menu_name' => __( 'Categories' ),
	  );    
	 
	// Now register the taxonomy
	  register_taxonomy('features-categories',array('topfeatures'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'features-category' ),
	  ));

	// register taxonomy
   // register_taxonomy('features-categories', 'top-features', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'features-category' )));
  
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', 'aodes' ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'aodes' ),
            'menu_name'           => __( 'Testimonials', 'aodes' ),
            'parent_item_colon'   => __( 'Parent Testimonial', 'aodes' ),
            'all_items'           => __( 'All Testimonials', 'aodes' ),
            'view_item'           => __( 'View Testimonial', 'aodes' ),
            'add_new_item'        => __( 'Add New Testimonial', 'aodes' ),
            'add_new'             => __( 'Add New', 'aodes' ),
            'edit_item'           => __( 'Edit Testimonial', 'aodes' ),
            'update_item'         => __( 'Update Testimonial', 'aodes' ),
            'search_items'        => __( 'Search Testimonial', 'aodes' ),
            'not_found'           => __( 'Not Found', 'aodes' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'Testimonials', 'aodes' ),
            'description'         => __( 'Testimonial news and reviews', 'aodes' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title'),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'testimonials', $args );


		// Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Reviews', 'Post Type General Name', 'aodes' ),
            'singular_name'       => _x( 'Review', 'Post Type Singular Name', 'aodes' ),
            'menu_name'           => __( 'Reviews', 'aodes' ),
            'parent_item_colon'   => __( 'Parent Review', 'aodes' ),
            'all_items'           => __( 'All Reviews', 'aodes' ),
            'view_item'           => __( 'View Review', 'aodes' ),
            'add_new_item'        => __( 'Add New Review', 'aodes' ),
            'add_new'             => __( 'Add New', 'aodes' ),
            'edit_item'           => __( 'Edit Review', 'aodes' ),
            'update_item'         => __( 'Update Review', 'aodes' ),
            'search_items'        => __( 'Search Review', 'aodes' ),
            'not_found'           => __( 'Not Found', 'aodes' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'Reviews', 'aodes' ),
            'description'         => __( 'Review news and reviews', 'aodes' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title'   ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'Reviews', $args );
		
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Catalogs', 'Post Type General Name', 'aodes' ),
            'singular_name'       => _x( 'Catalog', 'Post Type Singular Name', 'aodes' ),
            'menu_name'           => __( 'Catalogs', 'aodes' ),
            'parent_item_colon'   => __( 'Parent Catalog', 'aodes' ),
            'all_items'           => __( 'All Catalogs', 'aodes' ),
            'view_item'           => __( 'View Catalog', 'aodes' ),
            'add_new_item'        => __( 'Add New Catalog', 'aodes' ),
            'add_new'             => __( 'Add New', 'aodes' ),
            'edit_item'           => __( 'Edit Catalog', 'aodes' ),
            'update_item'         => __( 'Update Catalog', 'aodes' ),
            'search_items'        => __( 'Search Catalog', 'aodes' ),
            'not_found'           => __( 'Not Found', 'aodes' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'Catalogs', 'aodes' ),
            'description'         => __( 'Catalog news and reviews', 'aodes' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title'   ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'catalogs', $args );

		$labels = array(
			'name' => 'Categories'  ,
			'singular_name' => 'Category',
			'search_items' =>  __( 'Search Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item' => __( 'Edit Category' ), 
			'update_item' => __( 'Update Category' ),
			'add_new_item' => __( 'Add New Category' ),
			'new_item_name' => __( 'New Category Name' ),
			'menu_name' => __( 'Categories' ),
		  );    
		 
		// Now register the taxonomy
		  register_taxonomy('catalogs_categories',array('catalogs'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'catalog-categories' ),
		  ));

		  // Set UI labels for Custom Post Type
		  $labels = array(
            'name'                => _x( 'FAQs', 'Post Type General Name', 'aodes' ),
            'singular_name'       => _x( 'Faq', 'Post Type Singular Name', 'aodes' ),
            'menu_name'           => __( 'FAQs', 'aodes' ),
            'parent_item_colon'   => __( 'Parent Faq', 'aodes' ),
            'all_items'           => __( 'All FAQs', 'aodes' ),
            'view_item'           => __( 'View Faq', 'aodes' ),
            'add_new_item'        => __( 'Add New Faq', 'aodes' ),
            'add_new'             => __( 'Add New', 'aodes' ),
            'edit_item'           => __( 'Edit Faq', 'aodes' ),
            'update_item'         => __( 'Update Faq', 'aodes' ),
            'search_items'        => __( 'Search Faq', 'aodes' ),
            'not_found'           => __( 'Not Found', 'aodes' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'FAQs', 'aodes' ),
            'description'         => __( 'Faq', 'aodes' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title' , 'editor'  ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'faqs', $args );

      
    }
      
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
      
    add_action( 'init', 'custom_post_type', 0 ); 
defined( 'BRATOR_THEME_URI' ) or define( 'BRATOR_THEME_URI', get_template_directory_uri() );
define( 'BRATOR_THEME_DRI', get_template_directory() );
define( 'BRATOR_IMG_URL', BRATOR_THEME_URI . '/assets/images/' );
define( 'BRATOR_CSS_URL', BRATOR_THEME_URI . '/assets/css/' );
define( 'BRATOR_JS_URL', BRATOR_THEME_URI . '/assets/js/' );
define( 'BRATOR_FRAMEWORK_DRI', BRATOR_THEME_DRI . '/framework/' );

require_once BRATOR_FRAMEWORK_DRI . 'styles/index.php';
require_once BRATOR_FRAMEWORK_DRI . 'styles/daynamic-style.php';
require_once BRATOR_FRAMEWORK_DRI . 'scripts/index.php';
require_once BRATOR_FRAMEWORK_DRI . 'plugin-list.php';
require_once BRATOR_FRAMEWORK_DRI . 'tgm/class-tgm-plugin-activation.php';
require_once BRATOR_FRAMEWORK_DRI . 'tgm/config-tgm.php';
require_once BRATOR_FRAMEWORK_DRI . 'dashboard/class-dashboard.php';

require_once BRATOR_FRAMEWORK_DRI . 'classes/brator-int.php';
require_once BRATOR_FRAMEWORK_DRI . 'classes/brator-act.php';

add_action( 'init', 'brator_kirki_init' );
function brator_kirki_init() {
	if ( class_exists( 'Kirki' ) ) {
		require_once BRATOR_FRAMEWORK_DRI . 'kirki/kirki-option.php';
	}
}

/**
* Theme option compatibility.
*/
if ( ! function_exists( 'brator_get_options' ) ) :
	function brator_get_options( $key ) {
		$opt_pref = 'brator_theme_option';
		if ( class_exists( 'Kirki' ) ) {
			$brator_options = Kirki::get_option( $opt_pref, $key );
		} else {
			$brator_options = null;
		}
		return $brator_options;
	}
endif;

if ( ! function_exists( 'brator_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brator_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on love us, use a find and replace
		* to change 'brator' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'brator', get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary', 'brator' ),
			)
		);

		function brator_upload_mimes( $existing_mimes ) {
			$existing_mimes['webp'] = 'image/webp';
			return $existing_mimes;
		}
		add_filter( 'mime_types', 'brator_upload_mimes' );

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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'brator_custom_background_args',
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

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_image_size( 'brator-search-pro-size', 60, 60, true );
		add_image_size( 'brator-sidebar-post-size', 110, 110, true );
		add_image_size( 'brator-blog-grid', 382, 223, true );
		add_image_size( 'brator-blog-grid-first', 656, 430, true );
		add_image_size( 'brator-blog-grid-2', 356, 234, true );
		add_image_size( 'brator-blog-list', 380, 250, true );
		add_image_size( 'brator-cart-img-size', 85, 85, true );
		add_image_size( 'brator-shop-pro-size', 225, 225, true );
		add_image_size( 'brator-sidebar-post-90', 90, 90, true );

		$GLOBALS['content_width'] = apply_filters( 'brator_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'brator_setup', 9 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brator_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'brator' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brator' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Sidebar', 'brator' ),
			'id'            => 'woo_sideber',
			'description'   => esc_html__( 'Add widgets here.', 'brator' ),
			'before_widget' => '<div id="%1$s" class="brator-sidebar-single-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="shop-sidebar-title"><h2>',
			'after_title'   => '</h2></div>',
		)
	);

}
add_action( 'widgets_init', 'brator_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/bootstrap-walker-menu.php';
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


if ( class_exists( 'woocommerce' ) ) {
	include_once BRATOR_THEME_DRI . '/woocommerce-functions.php';
	include_once BRATOR_THEME_DRI . '/woo-action-single.php';
}

function brator_get_all_product_categories() {
	$options = array();
	$terms   = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
		)
	);

	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			if ( isset( $term->slug ) ) {
				$options[ $term->slug ] = $term->name;
			}
		}
	}
	return $options;
}

/**
 * google font compatibility.
 */
function brator_google_font() {
	$protocol   = is_ssl() ? 'https' : 'http';
	$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
	$variants   = ':300,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$query_args = array(
		'family' => 'Inter' . $variants,
		'subset' => $subsets,
	);
	$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css?display=swap' );
	wp_enqueue_style( 'brator-google-fonts', $font_url, array(), null );
}
add_action( 'init', 'brator_google_font' );
/**
 * is_blog compatibility.
 */
function is_blog() {
	if ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) {
		return true;
	} else {
		return false;
	}
}

function brator_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		$pagearray['0'] = esc_html__( 'Select Template', 'brator' );
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}

function brator_query_vars_filter_for_style( $vars ) {
	$vars[] = 'blog_style';
	$vars[] = 'shop_layout';
	$vars[] = 'product_layout';

	return $vars;
}
add_filter( 'query_vars', 'brator_query_vars_filter_for_style' );

if ( ! function_exists( 'brator_get_product_options' ) ) :
	function brator_get_product_options() {
		$brator_product_options = get_query_var( 'product_layout' );
		if ( ! $brator_product_options ) {
			$brator_product_options = brator_get_options( 'product_layout' );
		}
		return $brator_product_options;
	}
endif;


function brator_set_post_views_count( $postID ) {
	$count_key = 'views';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}

/*
 * track post views
 */
function brator_track_post_views( $post_id ) {
	if ( is_single() ) {
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
			brator_set_post_views_count( $post_id );
		}
	}

	$user = wp_get_current_user();
	global $wp;
	$pages_array = explode('/', $wp->request);

	if ( in_array( 'Dealer', (array) $user->roles ) && $pages_array[0] == 'my-account') {
		?>
		<style>
			.brator-header-menu .mega-menu-item{
				display:none !important;
			}
			.brator-header-menu .mega-menu-item.dealer-menu{
				display:inline-block !important;
			}
			.brator-header-menu .mega-menu-item.dealer-menu .mega-menu-item{
				display:block !important;
			}
		</style>
		<?php 
	}else{
		?>
		<style>
			.brator-header-menu .mega-menu-item.dealer-menu{
				display:none !important;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'brator_track_post_views' );

add_role(
    'OEM', //  System name of the role.
    __( 'OEM'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => false,
        'delete_published_posts' => false,
        'edit_posts'   => false,
        'publish_posts' => false,
        'upload_files'  => false,
        'edit_pages'  => false,
        'edit_published_pages'  =>  false,
        'publish_pages'  => false,
        'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
    )
);

add_role(
    'Dealer', //  System name of the role.
    __( 'Dealer'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => false,
        'delete_published_posts' => false,
        'edit_posts'   => false,
        'publish_posts' => false,
        'upload_files'  => false,
        'edit_pages'  => false,
        'edit_published_pages'  =>  false,
        'publish_pages'  => false,
        'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
    )
);


add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
// Adds the new tab
    $tabs['desc_tab'] = array(
        'title'     => __( 'Vehicle Fit', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_new_product_tab_content'
    );
	return $tabs;
}

function woo_new_product_tab_content() {
	$model = "";
	$fuel = "";
	$engine = "";
	$year = "";
	$brand = "";
	global $product;
	
	$model_terms = get_the_terms( $product->get_id(), 'make_model' );
	if ( !empty( $model_terms ) ){
		foreach($model_terms as $model_term){
			$model .= $model_term->name." , ";
		}
	}

	$fuel_terms = get_the_terms( $product->get_id(), 'make_fuel_type' );
	if ( !empty( $fuel_terms ) ){
		foreach($fuel_terms as $fuel_term){
			$fuel .= $fuel_term->name." , ";
		}
	}

	$engine_terms = get_the_terms( $product->get_id(), 'make_engine' );
	if ( !empty( $engine_terms ) ){
		foreach($engine_terms as $engine_term){
			$engine .= $engine_term->name." , ";
		}
	}

	$brand_terms = get_the_terms( $product->get_id(), 'make_brand' );
	if ( !empty( $brand_terms ) ){
		foreach($brand_terms as $brand_term){
			$brand .= $brand_term->name." , ";
		}
	}

	$year_terms = get_the_terms( $product->get_id(), 'make_year' );
	if ( !empty( $year_terms ) ){
		foreach($year_terms as $year_term){
			$year .= $year_term->name." , ";
		}
	}
	?>
	<table class="woocommerce-product-attributes shop_attributes">
		<tbody>
			<?php if($brand != ""){ ?>
				<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
					<th class="woocommerce-product-attributes-item__label">Brand</th>
					<td class="woocommerce-product-attributes-item__value"><?php echo rtrim($brand, " ,"); ?></td>
				</tr>		
			<?php } ?>
			<?php if($model != ""){ ?>
				<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
					<th class="woocommerce-product-attributes-item__label">Model</th>
					<td class="woocommerce-product-attributes-item__value"><?php echo rtrim($model, " ,"); ?></td>
				</tr>		
			<?php } ?>
			<?php if($year != ""){ ?>
				<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
					<th class="woocommerce-product-attributes-item__label">year</th>
					<td class="woocommerce-product-attributes-item__value"><?= rtrim($year, " ,"); ?></td>
				</tr>		
			<?php } ?>
			<?php if($fuel != ""){ ?>
				<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
					<th class="woocommerce-product-attributes-item__label">Fuel Type</th>
					<td class="woocommerce-product-attributes-item__value"><?= $fuel ?></td>
				</tr>		
			<?php } ?>
		</tbody>
	</table>
	<?php
}

function wpse_131562_redirect() {
	if (! is_user_logged_in() && (is_woocommerce() || is_cart() || is_checkout())) {
		wp_redirect(home_url());
		exit;
	}
} 
 add_action('template_redirect', 'wpse_131562_redirect');

function vehicle_init() {
    $labels = array(
        'name' => 'Vehicle',
        'singular_name' => 'Vehicle',
        'add_new' => 'Add New Vehicle',
        'add_new_item' => 'Add New Vehicle',
        'edit_item' => 'Edit Vehicle',
        'new_item' => 'New Vehicle',
        'all_items' => 'All Vehicles',
        'view_item' => 'View Vehicles',
        'search_items' => 'Search Vehicles',
        'not_found' =>  'No Vehicles Found',
        'not_found_in_trash' => 'No Vehicles found in Trash', 
        'parent_item_colon' => '',
		'depth'     => 0,
        'menu_name' => 'Vehicles',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'vehicles'),
        'query_var' => true,
		'depth'     => 0,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'vehicle', $args );
    
    // register taxonomy
    register_taxonomy('vehicle_category', 'vehicle', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'vehicle-category' )));
    register_taxonomy('vehicle_color', 'vehicle', array('hierarchical' => true, 'label' => 'Color', 'query_var' => true, 'rewrite' => array( 'slug' => 'vehicle-color' )));
    register_taxonomy('vehicle_model', 'vehicle', array('hierarchical' => true, 'label' => 'Model', 'query_var' => true, 'rewrite' => array( 'slug' => 'vehicle-model' )));
    register_taxonomy('vehicle_accessories', 'vehicle', array('hierarchical' => true, 'label' => 'Accessories', 'query_var' => true, 'rewrite' => array( 'slug' => 'vehicle-accessories' )));
}
add_action( 'init', 'vehicle_init' );

add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
	//if(!is_admin()){
		if(is_user_logged_in()){
			$classes[] = 'login_customer_in';
		}else{
			$classes[] = 'logout_customer_in';
			
		}
	//}
	
	global $post;
    $post_slug = $post->post_name;
    $classes[] = $post_slug;
     
    return $classes;
}

add_action( 'woocommerce_before_add_to_cart_form', 'custom_before_title' );
function custom_before_title() {

    global $product;

    if ( $product->get_sku() ) {
        echo "SKU : ".$product->get_sku();
    }

}

add_action( 'woocommerce_before_add_to_cart_form', 'custom_after_category' );
function custom_after_category() {

    global $product;

    if ( $product->get_sku() ) {
		$categories = rtrim(get_product_category_by_id($product->get_id()),' ,');
        echo "</br>Category: ".$categories;
    }
}
function get_product_category_by_id( $product_id ) {
    $terms = get_the_terms( $product_id, 'product_cat' );
	$term_name = "";
	foreach ( $terms as $term ) {
		$term = get_term_by( 'id', $term->term_id, 'product_cat' );
		$term_name .= $term->name ." , ";
	}
    return $term_name;
}
add_filter( 'woocommerce_cart_item_name', 'display_sku_after_item_name', 5, 3 );
function display_sku_after_item_name( $item_name, $cart_item, $cart_item_key ) {
    $product = $cart_item['data']; // The WC_Product Object

    if( is_cart() && $product->get_sku() ) {
        $item_name .= '<br><span class="item-sku">SKU: '. $product->get_sku() . '</span>';
    }
    return $item_name;
}
function my_wc_hide_in_stock_message( $html, $product ) {
	if ( $product->is_in_stock() ) {
		return '';
	}

	return $html;
}

add_filter( 'woocommerce_get_stock_html', 'my_wc_hide_in_stock_message', 10, 2 );


add_action( 'init', 'register_custom_statuses_as_order_status' );
function register_custom_statuses_as_order_status() {

    register_post_status( 'wc-shipped', array(
        'label'                     => __('Shipped'),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Shipped<span class="count">(%s)</span>', 'Shipped <span class="count">(%s)</span>' )
    ) );

    register_post_status( 'wc-partially-shipped', array(
        'label'                     => __('Partially Shipped'),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Partially Shipped <span class="count">(%s)</span>', 'Partially Shipped <span class="count">(%s)</span>' )
    ) );
}

// Add to list of WC Order statuses
add_filter( 'wc_order_statuses', 'add_additional_custom_statuses_to_order_statuses' );
function add_additional_custom_statuses_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-shipped'] = __('Shipped');
            $new_order_statuses['wc-partially-shipped'] = __('Partially Shipped');
        }
    }
    return $new_order_statuses;
}

// Adding custom status  to admin order list bulk actions dropdown
add_filter( 'bulk_actions-edit-shop_order', 'custom_dropdown_bulk_actions_shop_order', 20, 1 );
function custom_dropdown_bulk_actions_shop_order( $actions ) {
    $actions['mark_shipped'] = __( 'Mark Partially Shipped', 'woocommerce' );
    $actions['mark_partially-shipped'] = __( 'Mark Shipped', 'woocommerce' );
    return $actions;
}
// Custom Menu For Page Left Sidebar
function my_custom_menu() {
    register_nav_menus(
        array(
            'left-sidebar-menu' => _( 'Page left sidebar' ),
           // 'my-custom-menu-2' =>_('My Second Custom Menu')
        )
    );
}
add_action( 'init', 'my_custom_menu' );
add_shortcode('sh_custom_menu_display', 'custom_menu_display');
function custom_menu_display(){
	wp_nav_menu( 
        array( 
            'theme_location' => 'left-sidebar-menu',
			'menu_class' => 'left-sidebar-menu'
        ) 
    ); 
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes['left-sidebar-menu'] = 'active ';
  }
  return $classes;
}
// 27 dec 
// Custom Care manuals Custom Post Type:
function custom_post_type_custom_care_manuals() {
  
// Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Manuals', 'Post Type General Name', 'aodes' ),
            'singular_name'       => _x( 'Manual', 'Post Type Singular Name', 'aodes' ),
            'menu_name'           => __( 'Manuals', 'aodes' ),
            'parent_item_colon'   => __( 'Parent Manual', 'aodes' ),
            'all_items'           => __( 'All Manuals', 'aodes' ),
            'view_item'           => __( 'View Manual', 'aodes' ),
            'add_new_item'        => __( 'Add New Manual', 'aodes' ),
            'add_new'             => __( 'Add New', 'aodes' ),
            'edit_item'           => __( 'Edit Manual', 'aodes' ),
            'update_item'         => __( 'Update Manual', 'aodes' ),
            'search_items'        => __( 'Search Manual', 'aodes' ),
            'not_found'           => __( 'Not Found', 'aodes' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aodes' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'Manuals', 'aodes' ),
            'description'         => __( 'Manual news and reviews', 'aodes' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title'   ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'manuals', $args );

		$labels = array(
			'name' => 'Categories'  ,
			'singular_name' => 'Category',
			'search_items' =>  __( 'Search Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item' => __( 'Edit Category' ), 
			'update_item' => __( 'Update Category' ),
			'add_new_item' => __( 'Add New Category' ),
			'new_item_name' => __( 'New Category Name' ),
			'menu_name' => __( 'Categories' ),
		  );    
		 
		// Now register the taxonomy
		  register_taxonomy('manuals_categories',array('manuals'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'manual-categories' ),
		  ));
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type_custom_care_manuals', 0 );