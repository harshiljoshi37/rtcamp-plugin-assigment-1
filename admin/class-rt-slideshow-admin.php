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

	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	function register_scripts() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }
	public function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_style( 'rt-slideshow', plugins_url( '../public/css/demo.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow1', plugins_url( '../public/css/responsiveslides.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow2', plugins_url( 'css/rt-slideshow-admin.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow3', plugins_url( 'css/c.css', __FILE__ ));
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'rt-slideshow' , plugins_url( 'js/rt-slideshow-admin.js', __FILE__));
		//wp_enqueue_script( 'rt-slideshow3' , plugins_url( 'js/first.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow4' , plugins_url( 'js/second.js', __FILE__));
		wp_enqueue_script( 'rt-slideshow1' , plugins_url( '../public/js/responsiveslides.min.js', __FILE__ ));
		wp_enqueue_script( 'rt-slideshow2' , plugins_url( '../public/js/responsiveslides.js', __FILE__ ));
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

		include '../wp-content/plugins/rtcamp-plugin-assigment-1/public/partials/slider.php';
		
	}

	public function display_options_page() {

		include_once 'partials/rt-slideshow-admin-display.php';

	}

	public function display_images_section() {

		include_once 'partials/rt-slideshow-admin-display-images.php';

	}

}
