<?php

require('lib/Misc.php');

/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'register_sidebars' ) );
		parent::__construct();
	}

	public function register_sidebars()
	{
		require('lib/sidebars.php');
	}

	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['site_header_menu']  = new Timber\Menu('Site header menu');
		$context['footer_menu_1'] = Timber::get_widgets('Footer Menu 1');
		$context['footer_menu_2'] = Timber::get_widgets('Footer Menu 2');
		$context['footer_menu_3'] = Timber::get_widgets('Footer Menu 3');
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		$custom_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
     	$context['custom_logo_url'] = $custom_logo_url;
		return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio'
			)
		);

		add_theme_support( 'custom-logo' );

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();

add_action('wp_enqueue_scripts', 'tbs_enqueue_scripts');
function tbs_enqueue_scripts()
{
	wp_enqueue_style('tbs-app', get_template_directory_uri() . '/static/css/app.css', [], '0.0.5');
	
	wp_enqueue_script('tbs-app', get_template_directory_uri() . '/static/js/app.js', ['jquery'], '0.0.2');
	
	wp_enqueue_script('tbs-header', get_template_directory_uri() . '/static/js/acf/header.js', ['jquery'], '0.0.3');
	wp_enqueue_script('tbs-faq', get_template_directory_uri() . '/static/js/acf/faq.js', ['jquery'], '0.0.3');
	wp_enqueue_script('tbs-index-list', get_template_directory_uri() . '/static/js/acf/index_list.js', ['jquery'], '0.0.3');
	wp_enqueue_script('tbs-program-render', get_template_directory_uri() . '/static/js/acf/program_render.js', ['jquery'], '0.0.3');
	wp_enqueue_script('tbs-smooth-scroll', get_template_directory_uri() . '/static/js/partials/smooth_scroll.js', ['jquery'], '0.0.3');
	
	wp_enqueue_style('tbs-font-lato', get_template_directory_uri() . '/static/font/Lato/stylesheet.css');
	
	wp_enqueue_style('tbs-font-fontawesome', get_template_directory_uri() . '/static/lib/fontawesome/css/fontawesome.min.css');
	wp_enqueue_style('tbs-font-fontawesome-regular', get_template_directory_uri() . '/static/lib/fontawesome/css/regular-separated.css');
	wp_enqueue_style('tbs-font-fontawesome-solid', get_template_directory_uri() . '/static/lib/fontawesome/css/solid-separated.css');
	wp_enqueue_style('tbs-font-fontawesome-brands', get_template_directory_uri() . '/static/lib/fontawesome/css/brands-separated.css');

	wp_enqueue_style('tbs-bootstrap-reboot', get_template_directory_uri() . '/static/lib/bootstrap/css/bootstrap-reboot.min.css');
	wp_enqueue_style('tbs-bootstrap-grid', get_template_directory_uri() . '/static/lib/bootstrap/css/bootstrap-grid.min.css');
}