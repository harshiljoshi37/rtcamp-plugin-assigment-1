<?php
/**
 * Contains test for Rt_Slideshow_Admin class
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/test
 */

 /**
  * The admin-specific test functionality of the plugin.
  *
  * @package    Rt_Plugin
  * @subpackage Rt_Plugin/test
  * @author     Harshil Joshi <harshiljoshi37@gmail.com>
  */
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TestUser extends TestCase{

    private $test;

    function setUp(){

        require( '../../public/class-rt-slideshow-public.php' );
        $this->test = new Rt_Slideshow_Public();

    }

    function test_plugin_initialization() {

		$this->assertFalse( null == $this->test );

    }
    
}