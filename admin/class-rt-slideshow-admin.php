<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/admin
 * @author     Harshil Joshi <harshiljoshi37@gmail.com>
 */
class Rt_Slideshow_Admin {

	public $category_id = 0;
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'admin_init', array( $this, 'register_button' ) );
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	function register_scripts() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
	function register_button(){
		if( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' )){
			add_filter('mce_external_plugins', array($this, 'get_our_js'));
			add_filter('mce_buttons', array( $this, 'register_but'));
		}
		// if ( 'true' == get_user_option( 'rich_editing' ) ){
		// 	add_filter('mce_external_plugins', array($this, 'get_our_js'));
		// 	add_filter('mce_buttons', array( $this, 'register_but'));
		// }
	}
	function get_our_js( $plugin_array ){
		$plugin_array['rt-plugin'] = plugins_url( 'js/button.js', __FILE__ );
		return $plugin_array;
	}
	function register_but( $buttons ){
		array_push( $buttons, 'separator', 'rt-plugin' );
		return $buttons;
	}
	public function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_style( 'rt-slideshow', plugins_url( '../public/css/demo.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow1', plugins_url( '../public/css/responsiveslides.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow2', plugins_url( 'css/rt-slideshow-admin.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow3', plugins_url( 'css/c.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow4', plugins_url( 'css/bootstrap.min.css', __FILE__ ));
		//wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'rt-slideshow' , plugins_url( 'js/rt-slideshow-admin.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow3' , plugins_url( 'js/jquery.min.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow4' , plugins_url( 'js/second.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow5' , plugins_url( 'js/bootstrap.min.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow1' , plugins_url( '../public/js/responsiveslides.min.js', __FILE__ ));
		wp_enqueue_script( 'rt-slideshow2' , plugins_url( '../public/js/responsiveslides.js', __FILE__ ));
		//wp_enqueue_script( 'rt-slideshow6' , plugins_url( 'js/button.js', __FILE__ ));
	}
	/**
	 * Adds an options page under the Settings submenu
	 *
	 * @since    1.0.0
	 */
	public function add_options_page() {

		 add_options_page(
			 'rtCamp Slideshow Plugin Admin Page',
			 'rt-plugin',
			 'manage_options',
			 'rt-plugin',
			 array( $this, 'display_options_page' )
		 );

		 $this->add_settings_section();
	}

	public function add_settings_section() {

		add_settings_section(
			'Manage Categories',
			'Categories',
			array( $this, 'display_category_section' ),
			'rt-plugin'
		);

		add_settings_section(
			'slider_preview',
			'Slider Live Preview',
			array( $this, 'display_slider_section' ),
			'rt-plugin'
		);

		add_settings_section(
			'selected_images',
			'Images',
			array( $this, 'display_images_section' ),
			'rt-plugin'
		);

	}

	public function display_slider_section() {
		$cateId = $this->category_id;
		include '../wp-content/plugins/rtcamp-plugin-assigment-1/public/partials/slider.php';

	}

	public function display_options_page() {

		include_once 'partials/rt-slideshow-admin-display.php';

	}

	public function display_images_section() {

		include_once 'partials/rt-slideshow-admin-display-images.php';

	}

	public function display_category_section() {

		$this->category_id = include_once 'partials/rt-slideshow-admin-select-category.php';

	}

}
