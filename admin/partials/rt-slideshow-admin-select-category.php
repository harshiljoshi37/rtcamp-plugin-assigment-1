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
    <title>Manage Category Page</title>
</head>
<body>
<form name="frm" method="POST">
    <select id="category_select" name="category_select">
    <option value="">Select A Category</option>
<?php
    global $wpdb;
    $categories = $wpdb->get_results("SELECT * FROM rt_plugin_category");
    foreach ($categories as $category) {
?>
        <option id="<?php echo $category->category_id; ?>" value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
<?php
    }
?>
    </select>
    <br /><br />
    <input type="submit" name="s" value="Load Content" />
    <button type="button" class="btn" data-toggle="modal" data-target="#insert">Insert New Category</button>
    <button type="button" class="btn" data-toggle="modal" data-target="#manage">Manage Category</button>
<!-- Insert Modal Start-->
  <div class="modal fade" id="insert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert New Category</h4>
        </div>
        <div class="modal-body">
          Category Name: <input type="text" name="catName" placeholder="Enter New Category Name" /><br />
          <input type="submit" name="sub" class="btn-primary" value="Insert" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Insert Modal End -->
<!-- Manage Modal Start-->
<div class="modal fade" id="manage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Manage Categories</h4>
        </div>
        <div class="modal-body">
        <table border="2" align="center">
              <tr>
                  <th>Category Name</th>
                  <th>Options</th>
              </tr>
<?php
    global $wpdb;
    $categories = $wpdb->get_results("SELECT * FROM rt_plugin_category");
    foreach ($categories as $category) {
?>
        <tr>
            <td><?php echo $category->category_name; ?></td>
            <td><input type="text" name="catId" value="<?php echo $category->category_id ?>" /></td>
            <td><input type="submit" name="delete" class="btn-danger" value="Delete<?php echo $category->category_id ?>"/></td>
        </tr>
<?php
    }
?>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Manage Modal End -->
</form>
</body>
</html>
<?php
    if(isset($_POST['s'])){
        $category_id = $_POST['category_select'];
        return $category_id;
    }
    if(isset($_POST['sub'])){
        global $wpdb;
        $cn = $_POST['catName'];
        $catIns = "INSERT INTO rt_plugin_category VALUES('','$cn')";
        if($wpdb->query($catIns)){
            echo "Success";
        }
        else{
            echo "Fail";
        }
    }
    if(isset($_POST['delete'])){
        global $wpdb;
        $caId = substr($_POST['delete'],6);
        if($wpdb->query("DELETE FROM rt_plugin_category WHERE category_id = '$caId'")){
            echo "Success";
        }
        else{
            echo "Failure";
        }
    }
?>