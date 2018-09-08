<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/includes
 * @author     Harshil Joshi <harshiljoshi37@gmail.com>
 */
class Rt_Slideshow_Activator {

	public static function activate() {
		global $wpdb;
		$catsql = "CREATE TABLE rt_plugin_category(category_id int(3) AUTO_INCREMENT,
		category_name varchar(50) NOT NULL,
		PRIMARY KEY(category_id));";
		$wpdb->query($catsql);

		$imgsql = "CREATE TABLE rt_plugin_image(image_id int(3) AUTO_INCREMENT,
		category_id int(3),
 		title varchar(50) NOT NULL,
		image varchar(255) NOT NULL,
 		imgorder int(10),
 		PRIMARY KEY(image_id),
		FOREIGN KEY (category_id) REFERENCES rt_plugin_category(category_id)
		ON DELETE CASCADE);";
		$wpdb->query($imgsql);

		$catEntry = "INSERT INTO rt_plugin_category VALUES('1','Test')";
		$wpdb->query($catEntry);

		$imgEntry1 = "INSERT INTO rt_plugin_image VALUES('1','1','ec1.jpg','wp-content/plugins/rtcamp-plugin-assigment-1/images/ec1.jpg','1')";
		$imgEntry2 = "INSERT INTO rt_plugin_image VALUES('2','1','ec2.jpg','wp-content/plugins/rtcamp-plugin-assigment-1/images/ec2.jpg','2')";
		$wpdb->query($imgEntry1);
		$wpdb->query($imgEntry2);
	}

}
