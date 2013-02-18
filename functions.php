<?php

//	DP Gallery Plugin Options
// ************************************************************

update_option('dp_gallery_css_disabled', true);

global $dp_custom_repeater_fields;

$dp_custom_repeater_fields = array(
	array(
		"type" => "text",
	  "name" => "credit",
	  "label" => "Credit",
	  "desc" => "Enter any necessary credits here (ex. writer, photographer, etc"
  )

);

// Only display posts in search
function DPSearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','DPSearchFilter');

// Define the HTML that's displayed below the module content.
// Useful for displaying the custom fields that were defined above.

add_filter('dp_after_module', 'dp_after_module', 10, 1);
function dp_after_module( $post ){
	$credit = get_post_meta($post->ID, 'credit', true);

	$html .= '<div class="credit">'.$credit.'</div>';
	
	return $html;
}


	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	
	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 400 ) );
	
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );
	
	if ( function_exists( 'add_theme_support' ) ) {
	
			add_theme_support( 'post-thumbnails' ); // enable feature
		
			set_post_thumbnail_size( 100, 70, true ); // default size
		
			add_image_size( 'custom-post-image', 350, 300, true ); // custom size
			
			add_image_size('dp-full', 740, 9000, false);
		
		}
		
		function twentyten_widgets_init() {
			// Area 1, located at the top of the sidebar.
			register_sidebar( array(
				'name' => __( 'Main Sidebar', 'twentyten' ),
				'id' => 'mainsidebar',
				'description' => __( 'The primary widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h2>',
				'after_title' => '</h2>',
			) );
		
			// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
			register_sidebar( array(
				'name' => __( 'Secondary Widget Area', 'twentyten' ),
				'id' => 'secondary-widget-area',
				'description' => __( 'The secondary widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		
			// Area 3, located in the footer. Empty by default.
			register_sidebar( array(
				'name' => __( 'First Footer Widget Area', 'twentyten' ),
				'id' => 'first-footer-widget-area',
				'description' => __( 'The first footer widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		
			// Area 4, located in the footer. Empty by default.
			register_sidebar( array(
				'name' => __( 'Second Footer Widget Area', 'twentyten' ),
				'id' => 'second-footer-widget-area',
				'description' => __( 'The second footer widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		
			// Area 5, located in the footer. Empty by default.
			register_sidebar( array(
				'name' => __( 'Third Footer Widget Area', 'twentyten' ),
				'id' => 'third-footer-widget-area',
				'description' => __( 'The third footer widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		
			// Area 6, located in the footer. Empty by default.
			register_sidebar( array(
				'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
				'id' => 'fourth-footer-widget-area',
				'description' => __( 'The fourth footer widget area', 'twentyten' ),
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		}
		
		/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
		add_action( 'widgets_init', 'twentyten_widgets_init' );
		

		
		

		