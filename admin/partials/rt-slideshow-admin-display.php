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
		<input type="button" name="save-btn" id="save-btn" class="button-primary" value="Save">
		<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Modify Images">
	</div>
</div>
