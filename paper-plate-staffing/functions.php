<?php

// Enqueue Styles and Scripts
function bcb_bootstrap_child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('swiper' , get_stylesheet_directory_uri() . '/css/swiper.css' );
	wp_enqueue_script('swiper' , get_stylesheet_directory_uri() . '/js/swiper.js', array('jquery'), '10.2.0', false );
	wp_enqueue_style('fancybox' , get_stylesheet_directory_uri() . '/css/fancybox.css' );
	wp_enqueue_script('fancybox' , get_stylesheet_directory_uri() . '/js/fancybox.js', array('jquery'), '5.0', false );
	wp_enqueue_style('owl' , get_stylesheet_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_script('owl' , get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.3.4', false );
}
add_action( 'wp_enqueue_scripts', 'bcb_bootstrap_child_theme_enqueue_styles' );

// Theme Plugin Activation
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sd_register_required_plugins' );

function sd_register_required_plugins() {

	$plugins = array(

		// WP Forms
		array(
			'name'         => 'WP Forms', // The plugin name.
			'slug'         => 'wpforms', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://wpforms.com/', // Commercial plugin - install manually with your own license.
		),
		
		// ACF
		array(
			'name'         => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'         => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://www.advancedcustomfields.com/pro/', // Commercial plugin - install manually with your own license.
		),
		
		// Classic Editor
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => false,
		),

		// Classic Widgets
		array(
			'name'        => 'Classic Widgets',
			'slug'        => 'classic-widgets',
			'required'  => false,
		),
		
		// Page scroll to id
		array(
			'name'        => 'Page scroll to id',
			'slug'        => 'page-scroll-to-id',
			'required'  => false,
		),
		
		// Disable Comments
		array(
			'name'        => 'Disable Comments',
			'slug'        => 'disable-comments',
			'required'  => false,
		),
		
		// File Manager
		array(
			'name'        => 'File Manager',
			'slug'        => 'wp-file-manager',
			'required'  => false,
		),
		
		// Yoast SEO
		array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
			'required'  => false,
		),
		
		// HTML Editor Syntax Highlighter
		array(
			'name'        => 'HTML Editor Syntax Highlighter',
			'slug'        => 'html-editor-syntax-highlighter',
			'required'  => false,
		),
		
		// WP Mail SMTP
		array(
			'name'        => 'WP Mail SMTP',
			'slug'        => 'wp-mail-smtp',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

// Theme Settings
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// NOTE: plugin license keys are intentionally not stored in this repository.
// Define them in wp-config.php (e.g. define('WPFORMS_LICENSE_KEY', '...'))
// or enter them in each plugin's own settings screen.


// Create Home
function sd_generate_homepage() {
	
	$homepage_title = "Home";

  	if (get_page_by_title($homepage_title) == NULL) {

    	$current_user = wp_get_current_user();

		// create post object
		$page = array(
		  'post_title'      => __( 'Home' ),
		  'post_status'     => 'publish',
		  'post_author'     => $current_user->ID,
		  'post_type'       => 'page',
		  'page_template'   => "home.php"
		);

		// insert the post into the database
		wp_insert_post( $page );
  	}
}

add_action( 'wp_head', 'sd_generate_homepage');

// Initialize name and location
$menu_name     = 'Main Menu';
$menu_location = 'main-menu';
$menu_exists = wp_get_nav_menu_object( $menu_location );

// If it doesn't exist, let's create it.
if ( ! $menu_exists ) {
    $menu_id = wp_create_nav_menu( $menu_name );

    // Set up default menu items
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'   =>  __( 'Home', 'textdomain' ),
        'menu-item-classes' => 'home',
        'menu-item-url'     => '/#cmg-header',
        'menu-item-status'  => 'publish',
    ) );

    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'About Us', 'textdomain' ),
        'menu-item-url'    => '/#cmg-about',
        'menu-item-status' => 'publish',
    ) );
	
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Services', 'textdomain' ),
        'menu-item-url'    => '/#cmg-services',
        'menu-item-status' => 'publish',
    ) );
	
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Gallery', 'textdomain' ),
        'menu-item-url'    => '/#cmg-gallery',
        'menu-item-status' => 'publish',
    ) );
	
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'FAQ', 'textdomain' ),
        'menu-item-url'    => '/#cmg-faq',
        'menu-item-status' => 'publish',
    ) );
	
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Reviews', 'textdomain' ),
        'menu-item-url'    => '/#cmg-reviews',
        'menu-item-status' => 'publish',
    ) );
	
	wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'  =>  __( 'Contact Us', 'textdomain' ),
        'menu-item-url'    => '/#cmg-contact',
        'menu-item-status' => 'publish',
    ) );

} else {
    $nav_menu = get_term_by( 'slug', $menu_location, 'nav_menu' );
    $menu_id  = $nav_menu->term_id;
}

if (!has_nav_menu( $menu_location )) {
	$locations = get_theme_mod( 'nav_menu_locations' );
    $locations[ $menu_location ] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
}

// Add Custom Footer
function add_custom_footer() {
    include(__DIR__ . '/template-parts/modals/modal-location.php');
}
add_action('bcb_before_footer', 'add_custom_footer', 5 );

// Add Custom Colors
function klf_acf_input_admin_footer() {
	
    $primary_color = get_field('cmg_styles_colors_primary' , 'option');
	$secondary_color = get_field('cmg_styles_colors_secondary' , 'option');
	$dark_color = get_field('cmg_styles_colors_dark' , 'option');
    
    ?>
    <script type="text/javascript">
    (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ) {
            
            // add the hexadecimal codes here for the colors you want to appear as swatches
            args.palettes = ['<?php echo $primary_color; ?>', '<?php echo $secondary_color; ?>' , '<?php echo $dark_color; ?>' , '#ffffff'];
            
            // return colors
            return args;
            
        });
        
    })(jQuery);
    </script>
    
<?php
}

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

// CMG Form Template
if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * CMG Contact
 * Template for WPForms.
 */
class WPForms_Template_cmg_contact extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'CMG Contact';

		// Template slug
		$this->slug = 'cmg_contact';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'fields' => array (
		1 => array (
			'id' => '1',
			'type' => 'name',
			'label' => 'Name',
			'format' => 'simple',
			'required' => '1',
			'size' => 'large',
		),
		2 => array (
			'id' => '2',
			'type' => 'email',
			'label' => 'Email',
			'required' => '1',
			'size' => 'large',
			'default_value' => false,
		),
		3 => array (
			'id' => '3',
			'type' => 'phone',
			'label' => 'Phone',
			'format' => 'us',
			'size' => 'large',
		),
		4 => array (
			'id' => '4',
			'type' => 'textarea',
			'label' => 'Message',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
		),
	),
	'field_id' => 5,
	'settings' => array (
		'form_title' => 'CMG Contact',
		'submit_text' => 'Submit',
		'submit_text_processing' => 'Sending...',
		'ajax_submit' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Default Notification',
				'email' => '{admin_email}',
				'subject' => 'New Entry: Contact',
				'sender_name' => 'Paper Plate Staffing',
				'sender_address' => '{admin_email}',
				'message' => '{all_fields}',
				'file_upload_attachment_fields' => array (
				),
				'entry_csv_attachment_entry_information' => array (
				),
				'entry_csv_attachment_file_name' => 'entry-details',
			),
		),
		'confirmations' => array (
			1 => array (
				'name' => 'Default Confirmation',
				'type' => 'message',
				'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
				'message_scroll' => '1',
				'page' => '17',
				'message_entry_preview_style' => 'basic',
			),
		),
		'antispam' => '1',
		'anti_spam' => array (
			'time_limit' => array (
				'duration' => '3',
			),
			'country_filter' => array (
				'action' => 'allow',
				'country_codes' => array (
				),
				'message' => 'Sorry, this form does not accept submissions from your country.',
			),
			'keyword_filter' => array (
				'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
			),
		),
		'form_tags' => array (
		),
	),
	'meta' => array (
		'template' => 'cmg_contact',
	),
);
	}
}
new WPForms_Template_cmg_contact();
endif;


// Register "Reviews" custom post type
add_action( 'init', function() {
	register_post_type( 'review', array(
	'labels' => array(
		'name' => 'Reviews',
		'singular_name' => 'Review',
		'menu_name' => 'Reviews',
		'all_items' => 'All Reviews',
		'edit_item' => 'Edit Review',
		'view_item' => 'View Review',
		'view_items' => 'View Reviews',
		'add_new_item' => 'Add New Review',
		'new_item' => 'New Review',
		'parent_item_colon' => 'Parent Review:',
		'search_items' => 'Search Reviews',
		'not_found' => 'No reviews found',
		'not_found_in_trash' => 'No reviews found in Trash',
		'archives' => 'Review Archives',
		'attributes' => 'Review Attributes',
		'insert_into_item' => 'Insert into review',
		'uploaded_to_this_item' => 'Uploaded to this review',
		'filter_items_list' => 'Filter reviews list',
		'filter_by_date' => 'Filter reviews by date',
		'items_list_navigation' => 'Reviews list navigation',
		'items_list' => 'Reviews list',
		'item_published' => 'Review published.',
		'item_published_privately' => 'Review published privately.',
		'item_reverted_to_draft' => 'Review reverted to draft.',
		'item_scheduled' => 'Review scheduled.',
		'item_updated' => 'Review updated.',
		'item_link' => 'Review Link',
		'item_link_description' => 'A link to a review.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-testimonial',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
	),
	'delete_with_user' => false,
) );
} );

function enqueue_readmore_script() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreBtns = document.querySelectorAll('.read-more-btn');
            const readLessBtns = document.querySelectorAll('.read-less-btn');
            const readMoreWraps = document.querySelectorAll('.read-more-wrap');

            readMoreBtns.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    // Show full text
                    readMoreWraps[index].style.webkitLineClamp = 'unset';
                    readMoreBtns[index].style.display = 'none';
                    readLessBtns[index].style.display = 'inline-block';
                });
            });

            readLessBtns.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    // Truncate text after 3 lines
                    readMoreWraps[index].style.webkitLineClamp = '3';
                    readLessBtns[index].style.display = 'none';
                    readMoreBtns[index].style.display = 'inline-block';
                });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'enqueue_readmore_script');