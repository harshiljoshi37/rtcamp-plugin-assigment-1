<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link      https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1 
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/admin/partials
 */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rt-Plugin</title>
	<script>
	jQuery.noConflict();
	jQuery( function() {
		jQuery( "#sortable" ).sortable();
		jQuery( "#sortable" ).disableSelection();
	} );
  </script>
</head>
<body>
	
</body>
</html>
	<ul id="sortable">
		<?php 
			global $wpdb;
			$images = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'attachment'  ORDER BY ID ASC");

			if( $images ){
				foreach( $images as $image){
		?>
					<li class="ui-state-default"><img src="<?php echo $image->guid; ?>" width="130px"/></li>
		<?php
				}
			}
		?>
	</ul>