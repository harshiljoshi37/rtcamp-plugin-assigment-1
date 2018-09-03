<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/admin/partials
 */
?>

<div class="wrap">
	<h1>Admin Page</h1>
	<?php do_settings_sections( 'rt-plugin' ); ?>
	<div>
		<p>You can change the position of images only once per try,<br />The image u changed will swap the position with existing image on that postion,<br />
			Means if you change 1st image on 3rd Position then third image will get on 1st position and 1st will go on 3rd.<br />
			Then Click on Save Button and <b>REFRESH THE PAGE TO SEE THE APPLIED CHANGES.<b>
		</p>
		<input type="submit" name="save-btn" id="save-btn" class="button-primary" value="Save" />
		<!-- <input type="button" name="upload-btn" id="upload-btn" class="button-primary" value="Modify Images"> -->
		<button type="button" class="btn" data-toggle="modal" data-target="#insertImg">Insert New Image</button>
	</div>
</div>
<!-- Insert Modal Start-->
<div class="modal fade" id="insertImg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert New Image</h4>
        </div>
        <div class="modal-body">
		<form name="frm" name="imgForm" enctype="multipart/form-data">
          <select name="catg">
			  <?php
				global $wpdb;
				$categories = $wpdb->get_results("SELECT * FROM rt_plugin_category");
    			foreach ($categories as $category) {
			  ?>
			  <option value = "<?php echo $category->category_id ?>"><?php echo $category->category_name ?></option>
			  <?php
				}
			  ?>
		  </select>
		  Select Image:
		  <input type="file" name="file">
		  <input type="submit" name="iupload" class="btn-primary" value="Insert">
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
	</div>
  </div>
<!-- Insert Modal End -->
</form>
<?php
	if(isset($_REQUEST['iupload'])){
		$ids = $_REQUEST['catg'];
		$uploadDir = ABSPATH.'wp-content/plugins/rtcamp-plugin-assigment-1/images/';
		$iname = basename($_FILES["file"]["name"]);
		$pth = 'wp-content/plugins/rtcamp-plugin-assigment-1/images/'.basename($_FILES["file"]["name"]);
		$file = $uploadDir.basename($_FILES["file"]["name"]);
		$raw_file_name = $_FILES["file"]["tmp_name"];
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file)){
			global $wpdb;
			if($wpdb->query("INSERT INTO rt_plugin_image  VALUES('','$ids','$iname','$pth','')")){
				echo "Success";
			}
		}
		else{
			echo "Failure";
		}
	}
?>