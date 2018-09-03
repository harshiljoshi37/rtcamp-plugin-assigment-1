<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1
 * @since      1.0.0
 *
 * @package    Rt_Plugin
 * @subpackage Rt_Plugin/public/partials
 */

?>
<?php
  $cateId = $this->category_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RT-CAMP SLIDER PLUGIN ASSIGNMENT</title>
  <!-- <link rel="stylesheet" href="../css/responsiveslides.css"> -->
  <!-- <link rel="stylesheet" href="../css/demo.css"> -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->
  <!-- <script src="../js/responsiveslides.min.js"></script> -->
  <script>
    jQuery.noConflict();
    jQuery(function () {

      // Slideshow 3
      jQuery("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 540
      });

    });
  </script>
</head>
<body>
  <div id="wrapper">
    <h1>ResponsiveSlides.js</h1>
    <!-- Slideshow 3 -->
    <ul class="rslides" id="slider3">
    <?php 
			global $wpdb;
			$images = $wpdb->get_results("SELECT * FROM rt_plugin_image WHERE category_id = '$cateId' ORDER BY imgorder ASC");

			if( $images ){
				foreach( $images as $image){
		?>
      <li><img src="<?php echo $image->image; ?>" alt=""></li>
    <?php
        }
      }
    ?>
    </ul>
    <!-- Slideshow 3 Pager -->
    <ul id="slider3-pager">
    <?php
    $images = $wpdb->get_results("SELECT * FROM rt_plugin_image WHERE category_id = '$cateId' ORDER BY imgorder ASC");

    if( $images ){
      foreach( $images as $image){
?>
      <li><a href="#"><img src="<?php echo $image->image; ?>" class="hwadjust" alt=""></a></li>
    <?php
      }
    }
    ?>
    </ul>
  </div>
</body>
</html>
