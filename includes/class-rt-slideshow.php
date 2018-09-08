<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/includes
 */

class Rt_Slideshow {



	protected $plugin_name;

	protected $version;

	public function __construct() {

		$this->plugin_name = 'rt-plugin';
		$this->version = '1.0.0';

		$this->load_dependencies();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-rt-slideshow-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-rt-slideshow-admin.php';

	}

	public function run() {
		$shrt = new Rt_Slideshow_Public();
		$shrt->register_scripts();
		$shrt->register_shortcode();
		$sadmin = new Rt_Slideshow_Admin();
		$sadmin->register_scripts();
		//$sadmin->register_button();
	}
}
