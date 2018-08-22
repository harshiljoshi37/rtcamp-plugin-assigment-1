<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/public
 */

class Rt_Slideshow_Public {

	function register_scripts() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }
	public function enqueue_scripts() {

		wp_enqueue_style( 'rt-slideshow', plugins_url( '../public/css/demo.css', __FILE__ ));
		wp_enqueue_style( 'rt-slideshow1', plugins_url( '../public/css/responsiveslides.css', __FILE__ ));
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'rt-slideshow' , plugins_url( '../public/js/responsiveslides.min.js', __FILE__ ));
		wp_enqueue_script( 'rt-slideshow2' , plugins_url( '../public/js/responsiveslides.js', __FILE__ ));
	}

	public function register_shortcode() {
		function shortcode( $atts = [], $content = null ) {

			$content .= Rt_Slideshow_Public::display_slider();
			return $content;

		}

		add_shortcode( 'do-it', 'shortcode' );

	}

	public static function display_slider() {

		// Start output buffering.
		ob_start();

		include_once 'partials/slider.php';

		// End output buffer and return it.
		return ob_get_clean();
	}

}
