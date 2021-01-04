<?php

/**
 * YOAST SEO PLUGIN SUPPORT
 *
 * Count the words in pages that are made with Optimizer Widgets 
 *
 * @package LayerFramework
 * 
 * @since  Optimizer 0.4.1
 */
if (!defined('WPSEO_VERSION') ) {
	return;
}

function optimizer_get_widget_data($sidebar_id) {
	global $wp_registered_sidebars, $wp_registered_widgets;
	
	// Holds the final data to return
	$output = array();
	
	if( !$sidebar_id ) {
		// There is no sidebar registered with the name provided.
		return $output;
	} 
	
	// A nested array in the format $sidebar_id => array( 'widget_id-1', 'widget_id-2' ... );
	$sidebars_widgets = wp_get_sidebars_widgets();
	$widget_ids = isset($sidebars_widgets[$sidebar_id]) ? $sidebars_widgets[$sidebar_id] : array();
	
	if( !$widget_ids ) {
		// Without proper widget_ids we can't continue. 
		return array();
	}
	
	// Loop over each widget_id so we can fetch the data out of the wp_options table.
	foreach( $widget_ids as $id ) {
		// The name of the option in the database is the name of the widget class.  
		$option_name = $wp_registered_widgets[$id]['callback'][0]->option_name;
		
		// Widget data is stored as an associative array. To get the right data we need to get the right key which is stored in $wp_registered_widgets
		$key = $wp_registered_widgets[$id]['params'][0]['number'];
		
		$widget_data = get_option($option_name);
		
		// Add the widget data on to the end of the output array.
		$output[] = $widget_data[$key];
	}
	
	if(!function_exists('optimizer_check_widget_content')){ function optimizer_check_widget_content($ar) {  if(isset($ar['content']) && $ar['content']!=null) return $ar['content'];  }}
	if(!function_exists('optimizer_check_widget_desc')){ function optimizer_check_widget_desc($ar) {  if(isset($ar['desc']) && $ar['desc'] !=null) return $ar['desc'];  }  }
	if(!function_exists('optimizer_check_widget_title')){ function optimizer_check_widget_title($ar) {  if(isset($ar['title']) && $ar['title'] !=null) return '<h2>'.$ar['title'].'</h2>';  }  }
	if(!function_exists('optimizer_check_widget_subtitle')){ function optimizer_check_widget_subtitle($ar) {  if(isset($ar['subtitle']) && $ar['subtitle'] !=null) return $ar['subtitle'];  }  }
	if(!function_exists('optimizer_check_widget_block1title')){ function optimizer_check_widget_block1title($ar) {  if(isset($ar['block1title']) && $ar['block1title'] !=null) return $ar['block1title'];  }  }
	if(!function_exists('optimizer_check_widget_block2title')){ function optimizer_check_widget_block2title($ar) {  if(isset($ar['block2title']) && $ar['block2title'] !=null) return $ar['block2title'];  }  }
	if(!function_exists('optimizer_check_widget_block3title')){ function optimizer_check_widget_block3title($ar) {  if(isset($ar['block3title']) && $ar['block3title'] !=null) return $ar['block3title'];  }  }
	if(!function_exists('optimizer_check_widget_block4title')){ function optimizer_check_widget_block4title($ar) {  if(isset($ar['block4title']) && $ar['block4title'] !=null) return $ar['block4title'];  }  }
	if(!function_exists('optimizer_check_widget_block5title')){ function optimizer_check_widget_block5title($ar) {  if(isset($ar['block5title']) && $ar['block5title'] !=null) return $ar['block5title'];  }  }
	if(!function_exists('optimizer_check_widget_block6title')){ function optimizer_check_widget_block6title($ar) {  if(isset($ar['block6title']) && $ar['block6title'] !=null) return $ar['block6title'];  }  }
	if(!function_exists('optimizer_check_widget_block1content')){ function optimizer_check_widget_block1content($ar) {  if(isset($ar['block1content']) && $ar['block1content'] !=null) return $ar['block1content'];  }  }
	if(!function_exists('optimizer_check_widget_block2content')){ function optimizer_check_widget_block2content($ar) {  if(isset($ar['block2content']) && $ar['block2content'] !=null) return $ar['block2content'];  }  }
	if(!function_exists('optimizer_check_widget_block3content')){ function optimizer_check_widget_block3content($ar) {  if(isset($ar['block3content']) && $ar['block3content'] !=null) return $ar['block3content'];  }  }
	if(!function_exists('optimizer_check_widget_block4content')){ function optimizer_check_widget_block4content($ar) {  if(isset($ar['block4content']) && $ar['block4content'] !=null) return $ar['block4content'];  }  }
	if(!function_exists('optimizer_check_widget_block5content')){ function optimizer_check_widget_block5content($ar) {  if(isset($ar['block5content']) && $ar['block5content'] !=null) return $ar['block5content'];  }  }
	if(!function_exists('optimizer_check_widget_block6content')){ function optimizer_check_widget_block6content($ar) {  if(isset($ar['block6content']) && $ar['block6content'] !=null) return $ar['block6content'];  }  }
   //$entry = [1 => false, 2 => -1,3 => null, 4 => ''];

	$content = array_map('optimizer_check_widget_content', $output);
	$desc = array_map('optimizer_check_widget_desc', $output);
	$title = array_map('optimizer_check_widget_title', $output);
	$subtitle = array_map('optimizer_check_widget_subtitle', $output);
	$block1title = array_map('optimizer_check_widget_block1title', $output);
	$block2title = array_map('optimizer_check_widget_block2title', $output);
	$block3title = array_map('optimizer_check_widget_block3title', $output);
	$block4title = array_map('optimizer_check_widget_block4title', $output);
	$block5title = array_map('optimizer_check_widget_block5title', $output);
	$block6title = array_map('optimizer_check_widget_block6title', $output);
	$block1content = array_map('optimizer_check_widget_block1content', $output);
	$block2content = array_map('optimizer_check_widget_block2content', $output);
	$block3content = array_map('optimizer_check_widget_block3content', $output);
	$block4content = array_map('optimizer_check_widget_block4content', $output);
	$block5content = array_map('optimizer_check_widget_block5content', $output);
	$block6content = array_map('optimizer_check_widget_block6content', $output);

	
	$widgetcontent = array_merge($content, $desc, $title, $subtitle, $block1title, $block1content, $block2title, $block2content, $block3title, $block3content, $block4title, $block4content, $block5title, $block5content, $block6title, $block6content);
   $finalContent = array();
   foreach ($widgetcontent as $key => $value) {
      if($value){
         array_push($finalContent, $value);
      }
   }
	return implode(" ",$finalContent);
}


function optimizer_yoast_widget_analysis() {
	if ( class_exists( 'WPSEO_Recalculate' )){
			$screen = get_current_screen();
		 ?>
		<?php if ( $screen->parent_base == 'edit' && $screen->id == 'page' ){ 
		
			 global $post;
			 $widgetized = get_post_meta( $post->ID, 'widgetized', true );
          $sidebarid = get_post_meta( $post->ID, 'page_sidebar', true );
          $widgetdata = optimizer_get_widget_data($sidebarid);

					if($widgetized == '1' && $sidebarid !=='null' ){
						echo '<script>
							(function($) {
								$(window).on("load", function(){
									/**
									 * Set up the Yoast Optimizer WIDGET Analysis 
									 */
									YoastWidgetFAnalysis = function() {
										// Register with YoastSEO
										YoastSEO.app.registerPlugin("yoastWidgetAnalysis", {status: "ready"});
										YoastSEO.app.registerModification("content", this.addAcfFieldsToContent, "yoastWidgetAnalysis", 5);
									}
							
									YoastWidgetFAnalysis.prototype.addAcfFieldsToContent = function(data) {
										var optim_widget_content = "";
										
											optim_widget_content += "'.str_replace('"',"'",$widgetdata).'";
							
										return data + optim_widget_content;
									};
							
									new YoastWidgetFAnalysis();
								});
							}(jQuery));
							</script>';
						}
				} ?>
		
	<?php } 
}
add_action('in_admin_footer', 'optimizer_yoast_widget_analysis');