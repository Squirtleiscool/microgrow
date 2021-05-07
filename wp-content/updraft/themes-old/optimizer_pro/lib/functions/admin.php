<?php
 /**
 * The ADMIN functions for OPTIMIZER
 *
 * Stores all the admin functions of the template.
 *
 * @package LayerFramework
 * 
 * @since  LayerFramework 1.0
 */
 
/**************** LOAD SHORTCODES ****************/
// Hooks your functions into the correct filters

add_filter( 'mce_external_plugins', 'optimizer_add_tinymce_plugin' );
// Declare script for new button
function optimizer_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['optimizer_mce_button'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	$plugin_array['noneditable'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	$plugin_array['save'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	
	$plugin_array['optimedia'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	$plugin_array['canceledit'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	$plugin_array['fullmode'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	$plugin_array['shorty'] = get_template_directory_uri() .'/assets/js/shortcodes_js.js';
	
	return $plugin_array;
}

add_filter( 'mce_buttons', 'optimizer_register_mce_button' );
// Register new button in the editor
function optimizer_register_mce_button( $buttons ) {
	array_push( $buttons, 'optimizer_mce_button' );
	return $buttons;
}

// Enable font size & font family selects in the editor
if ( ! function_exists( 'optimizer_mce_buttons' ) ) {
	function optimizer_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		array_splice( $buttons, 5, 0, 'backcolor' ); // Add Text background Button
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'optimizer_mce_buttons' );


// Customize mce editor font sizes
if ( ! function_exists( 'optimizer_mce_text_sizes' ) ) {
	function optimizer_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 30px 34px 36px 40px 46px 52px 60px 72px 90px 100px 120px 140px 160px 180px 200px 220px 240px 260px 280px 300px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'optimizer_mce_text_sizes' );


// Add Theme Fonts to POST EDITOR Fonts list
if ( ! function_exists( 'optimizer_fonts_editor' ) ) {
	function optimizer_fonts_editor( $initArray ) {
		$optimizer = optimizer_option_defaults();
		
		if(!empty($optimizer['ptitle_font_id']['font-family'])){ 
			$title_font = $optimizer['ptitle_font_id']['font-family'];
			$title_font = ''.$title_font.'='.$title_font.';';
		}else{ 
			$title_font =''; 
		}
		if(!empty($optimizer['logo_font_id']['font-family'])){ 
			$logo_font = $optimizer['logo_font_id']['font-family'];
			$logo_font = ''.$logo_font.'='.$logo_font.';';
		}else{ 
			$logo_font =''; 
		}
		
		if( !empty($optimizer['custom_font_ttf']) && !empty($optimizer['custom_font_eot']) && !empty($optimizer['custom_font_woff']) ){ 
			$fonturl = $optimizer['custom_font_ttf'];    
			$fontname = substr($fonturl, strrpos($fonturl, "/") + 1);  
			$fontname = str_replace('.ttf','', $fontname);
			$custom_font = $fontname;
			$custom_font = ''.$custom_font.'='.$custom_font.';';
		}else{ 
			$custom_font ='';
		}
		
		
	    $initArray['font_formats'] = ''.$title_font.$logo_font.$custom_font.'Lato=Lato;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
            return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'optimizer_fonts_editor' );


// Add Google Scripts for use with the editor
if ( ! function_exists( 'optimizer_editor_fonts_style_fontone' ) ) {
	function optimizer_editor_fonts_style_fonts() {
		$optimizer = optimizer_option_defaults();
		if(!empty($optimizer['ptitle_font_id']['font-family'])){
			if(!$optimizer['ptitle_font_id']['font-family'] == 'Sans Serif' || !$optimizer['ptitle_font_id']['font-family'] == 'Serif' || !$optimizer['ptitle_font_id']['font-family'] == 'Monospaced'){
				$font_url = 'https://fonts.googleapis.com/css?family='.str_replace(' ', '+', ''.$optimizer['ptitle_font_id']['font-family'].'' );
				add_editor_style( str_replace( ',', '%2C', $font_url ) );
			}
			
		}
		if(!empty($optimizer['logo_font_id']['font-family'])){
			if(!$optimizer['logo_font_id']['font-family'] == 'Sans Serif' || !$optimizer['logo_font_id']['font-family'] == 'Serif' || !$optimizer['logo_font_id']['font-family'] == 'Monospaced'){
				$font_url2 = 'https://fonts.googleapis.com/css?family='.str_replace(' ', '+', ''.$optimizer['logo_font_id']['font-family'].'' );
				add_editor_style( str_replace( ',', '%2C', $font_url2 ) );
			}
		}
	}
}
//Load the Fonts only on Editor Pages
add_action( 'init', 'optimizer_editor_fonts_style_fonts' );


//Add Custom Font to TinyMCE Editor Font List
$optimizer = optimizer_option_defaults();
if( !empty($optimizer['custom_font_ttf']) && !empty($optimizer['custom_font_eot']) && !empty($optimizer['custom_font_woff']) ){ 
	function optimizer_customfont_tinymce_css($init) {
	
			$optimizer = optimizer_option_defaults();
			
			
				$fonturl = $optimizer['custom_font_ttf'];    
				$fontname = substr($fonturl, strrpos($fonturl, "/") + 1);  
				$fontname = str_replace('.ttf','', $fontname);
	
				$css = '@font-face {font-family: "'.$fontname.'";src: url("'.$optimizer['custom_font_eot'].'");src: url("'.$optimizer['custom_font_eot'].'?#iefix") format("embedded-opentype"),url("'.$optimizer['custom_font_woff'].'") format("woff"),url("'.$optimizer['custom_font_ttf'].'")  format("truetype");font-style: normal;}'; 
			
			 ?>
				<script type="text/javascript">            
			
					function addTempCSS( ed ) {
						ed.on('init', function() {
							tinyMCE.activeEditor.dom.addStyle(<?php echo json_encode($css) ?>);
						} );
					};
				</script>
			
				<?php
				if (wp_default_editor() == 'tinymce')
					$init['setup'] = 'addTempCSS';
					
				return $init;
	
	}		

	add_filter('tiny_mce_before_init', 'optimizer_customfont_tinymce_css');
}


/**************** Get Category,Tags & Posts list for CUSTOM POST SHORTCODE ****************/
add_action( 'admin_head', 'optimizer_after_wp_tiny_mce' );
function optimizer_after_wp_tiny_mce() {

	echo '<script type="text/javascript">';
	$post_types = get_post_types( array('public'=> true), 'names' ); 
	echo 'var lts_posts =\'';
	foreach ( $post_types as $post_type ) {
	   echo '<option value="'.$post_type.'">'.$post_type.'</option>';
	}
	echo '\';';
	
	$lts_cats =  get_categories(array('type'=> 'post','child_of'=> 0,'orderby' => 'name','order'=> 'ASC','hide_empty'=> 0,'hierarchical'=> 0,'pad_counts'=> false ));
	echo 'var lts_cats =\'';
	foreach($lts_cats as $cats){
		echo '<option value="'.$cats->slug.'">'.esc_attr($cats->name).'</option>';
		}
	echo '\';';
		
	$lts_tags =  get_tags(array('orderby' => 'name','order'=> 'ASC','hide_empty'=> 0,'hierarchical'=> 0,'pad_counts'=> false ));
	echo 'var lts_tags =\'';
	foreach($lts_tags as $tagss){
		echo '<option value="'.$tagss->slug.'">'.esc_attr($tagss->name).'</option>';
		}
	echo '\';';	
	echo '</script>';
	
}

//LOAD SHORTCODES WINDOW STYLES & JS
add_action( 'admin_enqueue_scripts', 'optimizer_tmce_replace' );
function optimizer_tmce_replace($hook) {
		if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
         wp_enqueue_style('optimizer_shortcode_backend',get_template_directory_uri().'/assets/css/shortcodes.css');
      }
}


//SHOW BLINKING HIGHLIGHT ON OPTIMIZER OPTIONS MENU
function optimizer_options_highlight() {
	echo '<style type="text/css">
	/*THEME ACTIVATION HOOK*/
	body.themes-php #menu-appearance li a[href*="optimizer-license"]{color:white!important;}
	body.themes-php #menu-appearance li a[href*="optimizer-license"]:after{content:"";border: 3px solid #999;border-radius: 30px;height: 18px;width: 18px;position: absolute;left:130px;margin-top:-5px;animation: blinky 1s ease-out;animation-iteration-count: infinite; -moz-animation: blinky 1s ease-out;-moz-animation-iteration-count: infinite; -webkit-animation: blinky 1s ease-out;-webkit-animation-iteration-count: infinite; opacity: 0.0}
	@-webkit-keyframes blinky {
		0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
		50% {opacity: 1.0;}
		100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
	</style>';
}

add_action('after_switch_theme', 'optimizer_after_install');
function optimizer_after_install () {
	add_action('admin_head', 'optimizer_options_highlight');
}


function optimizer_post_colorpicker(){
	
	$screen = get_current_screen();
	if ( $screen->base == 'post' ){ 
		echo '<script type="text/javascript">jQuery(function() {    jQuery(".optimizer_meta_control .color-picker").wpColorPicker();    });</script>';
	}	
}
add_action('admin_head', 'optimizer_post_colorpicker');



/* Display NOTICE TO CONVERT TO LATEST OPTIONS */

add_action('admin_notices', 'optimizer_admin_notice');

function optimizer_admin_notice() {
	$optimizer = optimizer_option_defaults();
	global $optimizerdb; 
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'optimizer_update_ignore') && current_user_can('edit_theme_options') ) {

			//echo '<div class="error"><p>'; 
			//printf(__('Your Theme Optimizer has been updated. An action is required to update the Theme. <a href="https://www.layerthemes.com/improved-optimizer-wordpress-theme/" target="_blank">learn More</a>. | <a href="%1$s">Hide Notice</a>'), '?optimizer_update_ignore=0');
			//echo "</p></div>";

	}
}

add_action('admin_init', 'optimizer_notice_ignore');

function optimizer_notice_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['optimizer_update_ignore']) && '0' == $_GET['optimizer_update_ignore'] ) {
             add_user_meta($user_id, 'optimizer_update_ignore', 'true', true);
	}
}


//Display Brave Release notice
add_action('admin_notices', 'optimizer_brave_notice');
function optimizer_brave_notice() {
   global $current_user ;
   $user_id = $current_user->ID;
?>
	<?php if ( ! get_user_meta($user_id, 'optimizer_brave_ignore') && current_user_can('edit_theme_options') ) { ?>
	<div class="optmizer_brave_notice notice notice-success">
		<p>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128">
         <g fill="#fcc21b">
         <path d="M97.17 20.21c-3.5 0-6.94.61-10.25 1.83a5.105 5.105 0 0 0-3.34 5.13c.04.55.96 13.52 5.85 26.59c4.89 13.09 11.9 22.26 12.2 22.65a5.09 5.09 0 0 0 5.79 1.68c15.45-5.66 23.42-22.83 17.77-38.28c-4.29-11.72-15.55-19.6-28.02-19.6z"/>
         <path d="M59.07 3.27c-4.03 0-7.97.81-11.7 2.4c-7.33 3.12-13 8.92-15.98 16.32c-2.97 7.4-2.88 15.5.25 22.83c.8 1.9 2.67 3.1 4.69 3.1c.17 0 .33-.01.49-.02c.49-.05 11.97-1.21 24.87-6.61c12.87-5.38 22.96-13.59 23.38-13.94a5.093 5.093 0 0 0 1.45-5.95A29.8 29.8 0 0 0 59.07 3.27z"/></g>
         <path d="M77.53 49.99c-.1-.49-.44-.89-.88-1.08l-3.75-1.63c-.53-.23-1.14-.14-1.58.21c-.45.37-.65.95-.53 1.51c0 .02.47 2.47-.9 4.52c-.99 1.47-2.73 2.43-5.18 2.86c-6.52 1.15-7.25 5.38-7.77 8.46c-.5 2.92-.85 4.23-3.81 4.51c-3.29.31-5.71 1.54-7.2 3.66c-2.39 3.38-1.34 7.71-1.3 7.89c.11.46.44.84.88 1.03l3.75 1.63c.2.09.41.13.61.13a1.53 1.53 0 0 0 1.49-1.89c0-.03-.74-3.18.84-5.4c.96-1.34 2.63-2.14 4.98-2.36c5.43-.52 6.07-4.29 6.54-7.04c.5-2.9.88-5.19 5.28-5.96c3.3-.58 5.72-1.98 7.19-4.17c2.1-3.16 1.38-6.73 1.34-6.88z" fill="#ed6c30"/>
         <path d="M89.43 93.54c-2.3-1.89-1.86-3.16-.65-5.87c1.29-2.85 3.05-6.77-1.73-11.36c-1.78-1.71-2.69-3.48-2.7-5.24c-.02-2.49 1.76-4.27 1.77-4.29c.41-.4.56-.99.4-1.54c-.17-.55-.62-.96-1.19-1.06l-4.02-.74c-.48-.09-.98.06-1.34.4c-.1.11-2.71 2.67-2.7 6.46c0 2.63 1.24 5.14 3.64 7.47c3.22 3.09 2.27 5.21 1.06 7.9c-1.14 2.55-2.71 6.03 1.5 9.49c1.83 1.5 2.78 3.09 2.82 4.74c.08 2.73-2.29 4.93-2.31 4.94c-.44.39-.6 1-.45 1.55c.16.57.62.99 1.2 1.09l4.02.74c.09.02.18.03.27.03c.37 0 .74-.14 1.03-.39c.14-.13 3.43-3.13 3.33-7.27c-.08-2.58-1.4-4.95-3.95-7.05z" fill="#d7598b"/>
         <path d="M67.57 92.94c2.22-3.85 1-7.27.95-7.42c-.15-.4-.46-.73-.87-.88l-3.58-1.44c-.55-.22-1.19-.1-1.62.32c-.43.41-.59 1.05-.39 1.62c.03.09.76 2.28-.72 4.83c-.68 1.16-1.54 1.59-2.64 2.13c-1.25.61-2.81 1.37-3.75 3.39c-.88 1.88-.65 3.7-.46 5.31c.18 1.47.33 2.73-.27 3.98c-.63 1.34-1.71 2.01-2.96 2.79c-1.24.77-2.64 1.64-3.65 3.25c-.86 1.37-.96 2.93-1.06 4.45c-.17 2.47-.37 4.04-2.52 5.14c-.53.27-.86.83-.84 1.43c.03.6.4 1.13.96 1.35l3.58 1.44c.18.08.38.11.57.11c.24 0 .47-.06.69-.17c3.8-1.93 4.03-5.24 4.18-7.66c.08-1.19.15-2.31.61-3.02c.63-1.02 1.59-1.6 2.68-2.29c1.45-.91 3.08-1.92 4.1-4.07c.98-2.06.75-3.98.53-5.67c-.17-1.37-.31-2.56.2-3.64c.46-1 1.11-1.35 2.32-1.94c1.27-.62 2.83-1.37 3.96-3.34z" fill="#d7598b"/>
         <path d="M23.85 75.79c1.7-.06 3.63-.14 5.58-1.5c1.87-1.31 2.61-3.08 3.28-4.66c.54-1.28 1-2.38 1.98-3.07c1-.7 1.93-.6 2.97-.53c.41.03.83.05 1.24.05c.91 0 2.29-.1 3.84-1c3.84-2.23 4.47-5.82 4.5-5.97c.07-.42-.05-.86-.31-1.2l-2.4-3.03c-.37-.47-1-.68-1.58-.53c-.58.15-1.02.63-1.12 1.23c-.01.02-.45 2.33-3.02 3.82c-.71.42-1.38.59-2.3.59c-.35 0-.7-.02-1.05-.04c-.4-.03-.79-.05-1.19-.05c-1 0-2.32.13-3.74 1.14c-1.7 1.2-2.4 2.89-3.03 4.39c-.57 1.36-1.07 2.53-2.21 3.33c-1.21.84-2.48.89-3.95.95c-1.45.06-3.1.12-4.78 1.02c-1.42.77-2.29 2.07-3.12 3.33c-1.32 2-2.24 3.22-4.44 3.22l-.3-.01c-.58-.03-1.16.29-1.44.83c-.27.53-.21 1.18.17 1.65l2.4 3.03c.28.34.69.55 1.12.57c.15.01.3.02.45.02c3.95 0 5.71-2.65 6.99-4.59c.65-.99 1.28-1.93 2.02-2.33c1.03-.57 2.15-.61 3.44-.66z" fill="#d7598b"/>
         <path d="M38.22 88.2v-4.71c0-.85-.69-1.53-1.53-1.53h-4.72c-.84 0-1.53.68-1.53 1.53v4.71c0 .85.68 1.53 1.53 1.53h4.72c.85 0 1.53-.69 1.53-1.53z" fill="#ed6c30"/>
         <path d="M19.49 51.42l-3.33 3.33c-.6.6-.6 1.57 0 2.16l3.33 3.34c.3.29.69.45 1.08.45c.4 0 .79-.15 1.08-.45l3.34-3.34c.6-.6.6-1.56 0-2.16l-3.34-3.33c-.6-.6-1.57-.6-2.16 0z" fill="#40c0e7"/>
         <path d="M10.19 60.93c.29-.29.45-.67.45-1.08c0-.4-.16-.79-.45-1.08l-3.34-3.34c-.57-.57-1.59-.57-2.16 0l-3.33 3.34c-.29.29-.46.68-.46 1.08c0 .41.17.79.46 1.08l3.33 3.33a1.523 1.523 0 0 0 2.16 0l3.34-3.33z" fill="#ed6c30"/>
         <path d="M27.33 93c-.57-.58-1.59-.58-2.17 0l-3.33 3.33c-.6.6-.6 1.57 0 2.17l3.33 3.33a1.523 1.523 0 0 0 2.16 0l3.33-3.33c.6-.6.6-1.57 0-2.17L27.33 93z" fill="#40c0e7"/>
         <path d="M68.57 111.91c-.6-.6-1.57-.6-2.17 0l-3.13 3.13c-.6.6-.6 1.57 0 2.17l3.13 3.13a1.523 1.523 0 0 0 2.16 0l3.13-3.13c.6-.6.6-1.57 0-2.17l-3.12-3.13z" fill="#40c0e7"/><path d="M110.96 90.91a1.523 1.523 0 0 0 2.16 0l3.14-3.13c.59-.6.59-1.56 0-2.16l-3.14-3.13c-.6-.6-1.57-.6-2.16 0l-3.13 3.13c-.6.6-.6 1.56 0 2.16l3.13 3.13z" fill="#40c0e7"/>
         <path d="M101.22 112.57c-.59-.6-1.57-.6-2.17 0l-3.13 3.13c-.59.6-.59 1.57 0 2.17l3.13 3.13c.3.29.7.45 1.09.45c.39 0 .78-.15 1.08-.45l3.13-3.13c.6-.6.6-1.57 0-2.17l-3.13-3.13z" fill="#40c0e7"/>
         <path d="M44.43 104.66v-4.71c0-.84-.69-1.53-1.53-1.53h-4.72c-.85 0-1.53.69-1.53 1.53v4.71c0 .85.68 1.53 1.53 1.53h4.72c.84 0 1.53-.69 1.53-1.53z" fill="#40c0e7"/>
         <path d="M72.9 98.56h-4.43c-.84 0-1.53.68-1.53 1.53v4.43c0 .84.69 1.53 1.53 1.53h4.43c.84 0 1.53-.69 1.53-1.53v-4.43c0-.85-.68-1.53-1.53-1.53z" fill="#ed6c30"/><path d="M26.39 110.03h-4.72c-.84 0-1.53.69-1.53 1.53v4.71c0 .84.69 1.53 1.53 1.53h4.72c.85 0 1.53-.69 1.53-1.53v-4.71c0-.85-.68-1.53-1.53-1.53z" fill="#ed6c30"/>
         <path d="M12.76 96.33c-.59-.6-1.56-.6-2.16 0l-3.33 3.34c-.3.29-.45.67-.45 1.08c0 .41.16.8.45 1.08l3.33 3.33a1.523 1.523 0 0 0 2.16 0l3.33-3.33c.6-.6.6-1.57 0-2.16l-3.33-3.34z" fill="#40c0e7"/>
         <path d="M5.57 42.37c1.92.57 4.03.14 5.69-.33c1.32-.37 2.56-.67 3.63-.35c1.06.3 1.51.9 2.27 2c.79 1.14 1.77 2.56 3.89 3.39c1.16.45 2.36.69 3.55.69c.36 0 .69-.02 1.01-.05c.75-.08 1.34-.71 1.37-1.46l.14-3.72c.02-.41-.17-.82-.46-1.12c-.29-.3-.73-.47-1.14-.47c-.86 0-1.67-.15-2.47-.47c-1.25-.49-1.8-1.28-2.49-2.29c-.8-1.15-1.79-2.57-3.92-3.2c-1.77-.52-3.67-.12-5.31.34c-1.42.4-2.76.71-3.99.34c-.77-.23-1.42-.64-2.13-1.35c-.34-.32-.82-.49-1.28-.42c-.47.06-.88.34-1.12.75l-1.7 2.9c-.33.57-.27 1.28.17 1.78c1 1.14 2.25 2.42 4.29 3.04z" fill="#ed6c30"/>
         <path d="M126.37 112.08c-.31-.19-.57-.21-.86-.25c-3.15-.33-5.88-1.39-7.9-3.01c4.42-2.18 6.16-6.4 5.93-8.97c0-.1-.01-.23-.03-.36c-.33-3.71-2.61-6.1-5.81-6.1c-.79 0-1.63.14-2.56.42c-1.17.35-4.55 1.38-6.33 8.26c-2.23-1.58-4.03-4.08-5.16-7.24c-.1-.29-.18-.53-.44-.78c-.57-.57-1.58-.57-2.16 0l-3.31 3.32c-.57.57-.6 1.47-.08 2.07c-.15-.18-.21-.31-.2-.27c2.18 6.16 6.5 10.15 11.9 11.05c2.21 4.86 7.03 8 13.49 8.68c.1.02.19.02.29.02c.51 0 1.02-.26 1.31-.73l2.44-3.99c.42-.74.19-1.68-.52-2.12zm-9.83-9.71c-.73.4-1.46.73-2.09.97c-.04-.68-.04-1.5.06-2.34c.08-1.03 1.36-2.17 2.45-2.17c.27 0 .51.07.72.21c.42.27.66.73.64 1.21c-.03.75-.66 1.5-1.78 2.12z" fill="#ed6c30"/>
      </svg>

      <strong><?php _e('Yay! ', 'optimizer');?></strong><?php _e('OptimizerWP has released a Groundbreaking Free Popup Builder Plugin That lets you create any kind of Popups! We Recommend Installing the plugin ', 'optimizer'); ?><a class="optimizer_inline_button optimizer_inline_modal" data-width="930px" data-height="85%" href="<?php echo site_url();?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=brave-popup-builder&section=screenshots"><?php _e('Download Now', 'optimizer'); ?></a>
      
      </p>
      <?php
      $opti_current_url = $_SERVER['REQUEST_URI'];
      $opti_new_url = '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      if( strpos($opti_current_url, '?') === false){
         $opti_new_url = $opti_new_url.'?optimizer_brave_ignore=1';
      }else{
         $opti_new_url = $opti_new_url.'&optimizer_brave_ignore=1';
      }
?> 
      <a type="button" href="<?php echo $opti_new_url;?>" class="notice-dismiss"><span class="screen-reader-text"><?php _e('Dismiss this notice.', 'optimizer');?></span></a>
	</div>
   <?php } ?>
<?php }


//Remove Brave Release Notice Forever
add_action('admin_init', 'optimizer_brave_notice_ignore');
function optimizer_brave_notice_ignore() {
	global $current_user;
   $user_id = $current_user->ID;
   /* If user clicks to ignore the notice, add that to their user meta */
   if ( isset($_GET['optimizer_brave_ignore']) && '1' == $_GET['optimizer_brave_ignore'] ) {
      add_user_meta($user_id, 'optimizer_brave_ignore', 'true', true);
	}
}