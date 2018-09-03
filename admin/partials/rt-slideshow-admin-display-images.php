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
			$cateId = $this->category_id; 
			$ids = array();
			$i = 1;
			global $wpdb;
			$images = $wpdb->get_results("SELECT * FROM rt_plugin_image WHERE category_id = '$cateId'  ORDER BY imgorder ASC");

			if( $images ){
				foreach( $images as $image){
					$ids[$i] = $image->image_id;
					$wpdb->query("UPDATE rt_plugin_image SET imgorder = '$i' WHERE image_id = '$image->image_id' ");
		?>
					<li class="ui-state-default" id="<?php echo $image->image_id; ?>"><img src="<?php echo $image->image; ?>" class="hwadjust"/></li>
		<?php
				$i++;
				}
			}
		?>
	</ul>
	<form name="frm" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="demo" id="demo" value="demo"/>
	<input type="hidden" name="demo1" id="demo1" value="demo1"/>
	<?php
		if(isset($_REQUEST['save-btn'])){
			$id = $_POST['demo'];
			$pos = $_POST['demo1'];
			$demopos = $wpdb->get_results("SELECT * FROM rt_plugin_image WHERE category_id = '$cateId' AND image_id = '$id' ");
			foreach ($demopos as $dp) {
				$idp = $dp->imgorder;
			}
			$demo1id = $wpdb->get_results("SELECT * FROM rt_plugin_image WHERE category_id = '$cateId' AND imgorder = '$pos' ");
			foreach ($demo1id as $did) {
				$pid = $did->image_id;
			}
			$wpdb->query("UPDATE rt_plugin_image SET imgorder = '$pos' WHERE image_id = '$id'");
			$wpdb->query("UPDATE rt_plugin_image SET imgorder = '$idp' WHERE image_id = '$pid'");
		}
	?>