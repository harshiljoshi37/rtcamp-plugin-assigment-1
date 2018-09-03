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
		var id;
		var end;
		jQuery( "#sortable" ).sortable({
			update: function( event, ui ) {
    		id = ui.item.attr("id");
			},
          	stop: function(event, ui) {
			end = ui.item.index()+1;
			document.getElementById("demo").value = id;
			document.getElementById("demo1").value = end;
			}
		});
		jQuery( "#sortable" ).disableSelection();
	});
  </script>
</head>
<body>
	<ul id="sortable">
		<?php 
			$ids = array();
			$i = 1;
			global $wpdb;
			$images = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'attachment'  ORDER BY menu_order ASC");

			if( $images ){
				foreach( $images as $image){
					$ids[$i] = $image->ID;
					$wpdb->query("UPDATE wp_posts SET menu_order = '$i' WHERE ID = '$image->ID' ");
		?>
					<li class="ui-state-default" id="<?php echo $image->ID; ?>"><img src="<?php echo $image->guid; ?>" class="hwadjust"/></li>
		<?php
				$i++;
				}
			}
		?>
	</ul>
	<form name="frm" method="POST">
	<input type="hidden" name="demo" id="demo" value="demo"/>
	<input type="hidden" name="demo1" id="demo1" value="demo1"/>
	<?php
		if(isset($_REQUEST['save-btn'])){
			$id = $_POST['demo'];
			$pos = $_POST['demo1'];
			$demopos = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'attachment' AND ID = '$id' ");
			foreach ($demopos as $dp) {
				$idp = $dp->menu_order;
			}
			$demo1id = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'attachment' AND menu_order = '$pos' ");
			foreach ($demo1id as $did) {
				$pid = $did->ID;
			}
			$wpdb->query("UPDATE wp_posts SET menu_order = '$pos' WHERE ID = '$id'");
			$wpdb->query("UPDATE wp_posts SET menu_order = '$idp' WHERE ID = '$pid'");
		}
		if(isset($_REQUEST['manage-category'])){
			echo "<script language='javascript'>window.location.href='../wp-content/plugins/rtcamp-plugin-assigment-1/admin/partials/rt-slideshow-admin-manage-category.php'</script>";
		}
	?>