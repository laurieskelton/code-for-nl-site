<?php
/**
 * bladzijde functions and definitions
 *
 * @package bladzijde
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bladzijde_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bladzijde_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bladzijde, use a find and replace
	 * to change 'bladzijde' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bladzijde', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bladzijde' ),
		'footer' => __( 'Secondary Menu', 'bladzijde' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bladzijde_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bladzijde_setup
add_action( 'after_setup_theme', 'bladzijde_setup' );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/options/' );
require_once dirname( __FILE__ ) . '/options/options-framework.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bladzijde_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bladzijde' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Footer', 'bladzijde' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bladzijde_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bladzijde_scripts() {
	wp_enqueue_style( 'bladzijde-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bladzijde-font-awesome', get_template_directory_uri() . '/fonts/css/font-awesome.min.css' );

	wp_enqueue_script( 'jquery');

	wp_enqueue_script( 'bladzijde-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bladzijde-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'bladzijde-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20140925', true );

	wp_enqueue_script( 'bladzijde-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('bladzijde-superfish'), '20140328', true );
                
	wp_enqueue_script( 'bladzijde-scripts', get_template_directory_uri() . '/js/bladzijde.js', '20140924', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bladzijde_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
* Creates short codes
*/

//for the circular photos
function sCirclePhoto($atts, $content = null) {
   return '<div class="circle-photo">' . do_shortcode($content) . '</div>';
}
add_shortcode('circle-photo', 'sCirclePhoto');

//for displaying photos horizontally
function sHorizontalDisplay($atts, $content = null) {
   return '<div class="display-horizontal">' . do_shortcode($content) . '</div>';
}
add_shortcode('display-horizontal', 'sHorizontalDisplay');


/*
* Loads Fonts
*/

function load_fonts() {
			$font_name = of_get_option( 'font_select', 'Lato' );
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|PT+Sans+Narrow|PT+Serif:400,700,400italic|Open+Sans:400,400italic,700,700italic|Open+Sans+Condensed:300,300italic');
            wp_enqueue_style( 'googleFonts');
			wp_register_style('optionsFonts', 'http://fonts.googleapis.com/css?family='. $font_name, false, '', 'all' );
			wp_enqueue_style('optionsFonts');
        }
add_action('wp_print_styles', 'load_fonts');


/* Adds the Editor Styles */

// This theme styles the visual editor to resemble the theme style.
$font_url = 'http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|PT+Sans+Narrow|PT+Serif:400,700,400italic|Open+Sans:400,400italic,700,700italic|Open+Sans+Condensed:300,300italic';
add_editor_style( array( 'inc/admin/css/editor-styles.css', str_replace( ',', '%2C', $font_url ) ) );

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

function bladzijde_font_customizer( $wp_customize ){

		$wp_customize->add_section(
	        'section_font',
	        array(
	            'title' => 'Font Settings',
	            'description' => 'This is the font settings section.',
	            'priority' => 25,
	        )
	    );
		//site title
    	$wp_customize->add_setting(
		    'branding-title',
		    array(
		        'default' => 'pt-sans',
		        'sanitize_callback' => 'sanitize_font',
		    )
		);
		 
		$wp_customize->add_control(
		    'branding-title',
		    array(
		        'type' => 'radio',
		        'label' => 'Font Choice for site title',
		        'section' => 'section_font',
		        'choices' => array(
		        	'lucida' => 'Lucida',
		            'pt-sans' => 'PT Sans (normal)',
		            'pt-sans-nar' => 'PT Sans (narrow)',
		            'pt-serif' => 'PT Serif',
		            'open-sans' => 'Open Sans (normal)',
		            'open-sans-con' => 'Open Sans (condensed)',
		        ),
		     
		    )
		);

		//entry title
		$wp_customize->add_setting(
		    'entry-title',
		    array(
		        'default' => 'pt-sans',
		        'sanitize_callback' => 'sanitize_font',
		    )
		);
		 
		$wp_customize->add_control(
		    'entry-title',
		    array(
		        'type' => 'radio',
		        'label' => 'Font Choice for entry titles',
		        'section' => 'section_font',
		        'choices' => array(
		        	'lucida' => 'Lucida',
		            'pt-sans' => 'PT Sans (normal)',
		            'pt-sans-nar' => 'PT Sans (narrow)',
		            'pt-serif' => 'PT Serif',
		            'open-sans' => 'Open Sans (normal)',
		            'open-sans-con' => 'Open Sans (condensed)',
		        ),
		     
		    )
		);
		//site tagline
		$wp_customize->add_setting(
		    'branding-tag',
		    array(
		        'default' => 'pt-sans',
		        'sanitize_callback' => 'sanitize_font',
		    )
		    
		);
		 
		$wp_customize->add_control(
		    'branding-tag',
		    array(
		        'type' => 'radio',
		        'label' => 'Font Choice for site tagline',
		        'section' => 'section_font',
		        'choices' => array(
		        	'lucida' => 'Lucida',
		            'pt-sans' => 'PT Sans (normal)',
		            'pt-sans-nar' => 'PT Sans (narrow)',
		            'pt-serif' => 'PT Serif',
		            'open-sans' => 'Open Sans (normal)',
		            'open-sans-con' => 'Open Sans (condensed)',
		        ),
		       
		    )
		);
		//content
    	$wp_customize->add_setting(
		    'font-choice',
		    array(
		        'default' => 'pt-sans',
		        'sanitize_callback' => 'sanitize_font',
		    )
		     
		);
		 
		$wp_customize->add_control(
		    'font-choice',
		    array(
		        'type' => 'radio',
		        'label' => 'Font Choice for main content',
		        'section' => 'section_font',
		        'choices' => array(
		        	'lucida' => 'Lucida',
		            'pt-sans' => 'PT Sans (normal)',
		            'pt-sans-nar' => 'PT Sans (narrow)',
		            'pt-serif' => 'PT Serif',
		            'open-sans' => 'Open Sans (normal)',
		            'open-sans-con' => 'Open Sans (condensed)',
		        ),
		      
		    )
		);

}
add_action( 'customize_register', 'bladzijde_font_customizer' );

function sanitize_font( $value ) {
    if ( ! in_array( $value, array( 'lucida', 'pt-sans','pt-sans-nar', 'pt-serif', 'open-sans', 'open-sans-con') ) )
        $value = 'PT Sans (normal)';
 
    return $value;
}

function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             a { color: <?php echo of_get_option( 'body_link_colorpicker', '#666666' ); ?>; }
             a:hover { color: <?php echo of_get_option( 'hover_link_colorpicker', '#dd9933' ); ?>; }
             a:visited { color:<?php echo of_get_option( 'body_link_colorpicker', '#666666' ); ?>; }
             
            body,
			button,
			input,
			select,
			textarea {
				color: <?php echo of_get_option( 'body_text_colorpicker', '#404040' ); ?>;
			}

			.site-branding { min-height: <?php echo of_get_option( 'header_height', '150' ); ?>px; }

             .site-header {
             	background: <?php echo of_get_option( 'headerbg_colorpicker', '' ); ?>;
             }

             .site-description {
				color: <?php echo of_get_option( 'tagline_text_colorpicker', '#404040' ); ?>;
			}

             .main-navigation {
             	background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
            }
             .main-navigation a {
			    color:  <?php echo of_get_option( 'top_text_colorpicker', '#ededed' ); ?>;
			}
			.main-navigation ul ul {
			   background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			}
			.main-navigation ul ul ul {
			   background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			}
			.main-navigation li:hover > a {
			 	color:  <?php echo of_get_option( 'hover_top_text_colorpicker', '#ffffff' ); ?>;
			 	background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			}
			.main-navigation ul ul a:hover {
			    background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			    color:  <?php echo of_get_option( 'hover_top_text_colorpicker', '#ffffff' ); ?>;
			}
			.main-navigation .current_page_item > a:hover,
			.main-navigation .current-menu-item > a:hover {
			    background: <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			    color:  <?php echo of_get_option( 'hover_top_text_colorpicker', '#ffffff' ); ?>;
			}

			.search-toggle { color:  <?php echo of_get_option( 'top_text_colorpicker', '#ededed' ); ?>;}
			.search-box-wrapper {
			    background:  <?php echo of_get_option( 'top_colorpicker', '#73C8A9' ); ?>;
			}

			/*Footer*/
			#colophon {
				background-color:  <?php echo of_get_option( 'bottom_colorpicker', '#73C8A9' ); ?>;
				color:  <?php echo of_get_option( 'bottom_text_colorpicker', '#ededed' ); ?>;
			}
			#colophon a {color:  <?php echo of_get_option( 'bottom_text_colorpicker', '#ededed' ); ?>;}
			#colophon a:hover {color:  <?php echo of_get_option( 'hover_bottom_text_colorpicker', '#ffffff' ); ?>;}
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');