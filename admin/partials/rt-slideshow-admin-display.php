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
		<input type="button" name="upload-btn" id="upload-btn" class="button-primary" value="Modify Images">
	</div>
</div>
</form>
