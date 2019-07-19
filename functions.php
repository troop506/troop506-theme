<?php

add_theme_support( 'html5', array( 'search-form' ) );
if ( ! isset( $content_width ) ) $content_width = 900;

// WP Updates for serving updates to the theme.



// Functions for the Scout Troop Theme
function scout_troop_setup() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	// This is required for WordPress themes.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	$font_url = urlencode( '//fonts.googleapis.com/css?family=Marcellus' );
  add_editor_style( $font_url );
	add_editor_style( array( 'editor-style.css' ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list') );
	
	/*Allow featured images*/
	add_theme_support( 'post-thumbnails' ); 
	add_image_size ('front-image', 660, 408);
	
	// Register menus
	register_nav_menus(
		array(
			'top-navigation' => 'Top navigation',
			'side-navigation' => 'Side navigation'
		)
	);

	// The first sidebar
	register_sidebar( array(
		'name' => 'First Sidebar',
		'id' => 'first-sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Left Sidebar in the footer
	register_sidebar( array(
		'name' => 'Left Footer Widget Area',
		'id' => 'footer-sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Middle Sidebar in the footer
	register_sidebar( array(
		'name' => 'Middle Footer Widget Area',
		'id' => 'footer-middle-sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Middle Sidebar in the footer
	register_sidebar( array(
		'name' => 'Right Footer Widget Area',
		'id' => 'footer-right-sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );
}
add_action( 'after_setup_theme', 'scout_troop_setup' );

// Adds the stylesheet to the header
// jQuery and a small script are required for the mobile menu.
function scout_troop_method() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'scouttroop_flexnav', get_template_directory_uri() . '/js/jquery.flexnav.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'scouttroop_hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'scout_troop_method' );

// Eliminate the home-page articles from the category widget
function exclude_widget_categories($args){
	$cat = get_term_by( 'slug', 'home-page', 'category' );
	$exclude = $cat->term_id; // The IDs of the excluding categories
	$args["exclude"] = $exclude;
	return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");

?>