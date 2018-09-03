<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * 
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
global $wpdb;
$wpdb->query( "DROP TABLE IF EXISTS rt_plugin_image" );
$wpdb->query( "DROP TABLE IF EXISTS rt_plugin_category" );
