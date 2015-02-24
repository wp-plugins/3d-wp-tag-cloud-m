<?php 
/*
Plugin Name: 3D WP Tag Cloud-M
Plugin URI: http://peter.bg/archives/7373
Description: This is the Multiple Clouds variation of 3D WP Tag Cloud. It creates multiple instances widget that draws and animates a HTML5 canvas based tag cloud. Plugin may rotate Pages, Recent Posts, External Links (blogroll), Menus, Blog Archives, List of Authors and of course Post Tags and Post Categories. It allows showing up to 8 types of content in one widget activated from static or dynamic menu (another cloud). Option values are preset and don't have to be typed but selected. Multiple fonts, multiple colors and multiple backgrounds can be applied to the cloud content. Full variety of fonts from Google Font Library is available. The plugin allows creating clouds of images. In case of Recent posts, Pages, Menus, List of Authors and External Links (blogroll) tags may consist of both image and text. It gives an option to put images and/or text in the center of the cloud. It accepts background images as well. The Number of tags in the cloud is adjustable. The plugin automatically includes WP Links panel for users who started using WP since v 3.5, when Links Manager and blogroll were made hidden by default. 3D WP Tag Cloud uses Graham Breach's Javascript class TagCanvas v. 2.5.1 and includes most of its 70+ options in the Control Panel settings. Supports following shapes: sphere, hcylinder for a cylinder that starts off horizontal, vcylinder for a cylinder that starts off vertical, hring for a horizontal circle and vring for a vertical circle.
Version: 1.2
Author: Peter Petrov
Author URI: http://peter.bg
Update Server: http://peter.bg/
License: LGPL v3
*/
// Enabling link manager for users of WP 3.5+
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
// ===
// Creating Widget
	class wpTagCanvasWidgetM extends WP_Widget {
		function wpTagCanvasWidgetM () {
			parent::__construct(
			'wpTagCanvasWidgetM', // Base ID
				__('3D WP Tag Cloud-M', 'text_domain'), // Name
				array( 'description' => __( 'Draws & Animates multiple 3D tag cloud.', 'text_domain' ), ) // Args
			);
		}
// ===
		function widget($args, $instance) {  
			extract($args);
			$inst_id = mt_rand(0,999999);
//  Registration of TagCanvas.js & including an external file				
			wp_register_script('jq-tagcloud', plugin_dir_url( __FILE__ ) . 'js/jquery.tagcanvas.js', array('jquery'), '2.6.1',true);
			wp_enqueue_script('jq-tagcloud');
			include 'm.variables.php';
			echo $before_widget;
// ===
?>
<!-- Loading Google Fonts -->
			<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
			<script type="text/javascript">
				goof = '<?= $arch_google_font; ?>';
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $auth_google_font; ?>';						
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $cat_google_font; ?>';
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $lin_google_font; ?>';						
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $men_google_font; ?>';						
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $pag_google_font; ?>';					
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $pos_google_font; ?>';
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				goof = '<?= $rec_google_font; ?>';
				if(goof != ''){WebFont.load({google: {families: [goof]}});};
				WebFont.load({google: {families: ['<?= $all_font_cf; ?>']}});
			</script>
			<script type="text/javascript" src="<?= $all_cf_url; ?>"></script>			
<?php		
	if( $title ) {
		echo $before_title . $title . $after_title;
	}
?>

<!-- HTML Clouds Template -->
		<style>
			.all_in_one{
				display: inline-block;
				padding: 2px 5px; 
				margin: 0 2px!important; 
				border-radius: 5px;
			}
			.all-menu-tooltip{
				font-size: 12px;
				background: #ffffed;
				border: 1px solid #000;
				border-radius: 4px;
				padding: 0px 3px; 
			}
		</style>
		
<!-- Building tag containers -->
			<?php
				if( $arch_menu_item == 'on'){
					echo '<div id="all_archives_container_' . $inst_id . '" hidden>';
					$arch_args = array ('type' => 'monthly', 'limit' => $all_archives_limit, 'format' => 'custom', 'before' => '<span>', 'after' => '</span>', 'show_post_count' => true); 
					wp_get_archives( $arch_args );
					echo '</div>';
					}
				if( $auth_menu_item == 'on'){
					echo '<div id="all_authors_container_' . $inst_id . '" hidden>';				
					$auto_args = array('number' => $all_authors_limit, 'exclude' => $all_exclude);
					$users = get_users($auto_args);
					foreach( $users as $user ){ 
						$userAvatar = get_avatar($user->ID);
						$userFName = $user->first_name;
						$userLName = $user->last_name;
						$userPosts = count_user_posts($user->ID);
						$userPostsURL = get_author_posts_url($user->ID);
						echo '<a href="'.$userPostsURL.'" style="font-size: '.$userPosts.'px">'.$userAvatar, $userFName.'<br>'.$userLName.'<br>('.$userPosts.')</a>';
					};	
					echo '</div>';					
				}
				if( $cat_menu_item == 'on'){
					echo '<div id="all_categories_container_' . $inst_id . '" hidden>';				
					$cat_args = array ('number' => $all_categories_limit, 'taxonomy' => 'category'); 
					wp_tag_cloud($cat_args);
					echo '</div>';					
				}
				if( $lin_menu_item == 'on'){
					echo '<div id="all_links_container_' . $inst_id . '" hidden>';				
					$lin_args = array ('category' => $all_links_category, 'hide_invisible' => 0, 'limit' => $all_links_limit); 
					$bookmarks = get_bookmarks($lin_args);
					foreach( $bookmarks as $bookmark ){
						echo '<a href="' . $bookmark->link_url . '">';
						if ($bookmark->link_image) { echo '<img src="' .$bookmark->link_image . '" width="96" height="96">';}
						echo  $bookmark->link_name . '</a>';
					}
					echo '</div>';					
				}
				if( $men_menu_item == 'on'){
					echo '<div id="all_menu_container_' . $inst_id . '" hidden>';				
					$menu_args = array ('menu' => $all_menu_name); 
					wp_nav_menu($menu_args);
					echo '</div>';					
				}
				if( $pag_menu_item == 'on'){
					echo '<div id="all_pages_container_' . $inst_id . '" hidden>';				
					$page_args = array ('number' => $pages_limit); $pages = get_pages($page_args);
					foreach( $pages as $page ){
						echo '<a href="' . get_page_link( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'thumbnail' ), $page->post_title . '</a>';
					}
					echo '</div>';					
				}
				if( $pos_menu_item == 'on'){
					echo '<div id="all_post_tags_container_' . $inst_id . '" hidden>';				
					$post_args = array ('number' => $all_post_tags_limit, 'taxonomy' => 'post_tag');
					wp_tag_cloud($post_args);
					echo '</div>';					
				}
				if( $rec_menu_item == 'on'){
					echo '<div id="all_recent_posts_container_' . $inst_id . '" hidden>';				
					$recent_posts = abs($recent_posts);
					$count=0; 
					$bigest=$weight_size*3; 
					if($recent_posts>0){
						$increment=($bigest-3)/$recent_posts;};
						$rp_args= array ('numberposts' => $all_recent_posts_limit, 'category' => $all_recent_posts_category); 
						$recent_posts = wp_get_recent_posts($rp_args); 
						foreach( $recent_posts as $recent ){
							$count=$count+1; $font_size=round($bigest-$increment*$count); 
							if($weight_mode != "none") { echo '<a href="' . get_permalink($recent["ID"]) . '" style="font-size: ' . $font_size . 'px;" title="Look '.esc_attr($recent["post_title"]).'" >' . get_the_post_thumbnail( $recent["ID"], 'thumbnail' ), $recent["post_title"].'</a> ';}	
							else {echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_the_post_thumbnail( $recent["ID"], 'thumbnail' ), $recent["post_title"].'</a> ';};
						};
					echo '</div>';						
				}
			?>	
        <canvas title="" id="all_tag_canvas_<?= $inst_id; ?>" width="<?= $width; ?>" height="<?= $height; ?>"></canvas>
		
<!-- Preparing menu container -->
		<div id="all_in_one_menu_container_<?= $inst_id; ?>"  style="width: <?= $width;?>px; height: <?= $all_menu_height;?>px; text-align: center; display: none;">
		<?php
			if( $arch_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="arc-link" class="all_in_one" data-id="archives_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Archives</a>';
			};	
			if( $auth_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="aut-link" class="all_in_one" data-id="authors_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Authors</a>';
			};					
			if( $cat_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="cat-link" class="all_in_one" data-id="categories_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Categories</a>';
			};					
			if( $lin_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="lin-link" class="all_in_one" data-id="links_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Links</a>';
			};
			if( $men_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="men-link" class="all_in_one" data-id="menu_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Menu</a>';
			};
			if( $pag_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="pag-link" class="all_in_one" data-id="pages_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Pages</a>';
			};	
			if( $pos_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="pos-link" class="all_in_one" data-id="post_tags_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Post Tags</a>';
			};
			if( $rec_menu_item == 'on'){
				echo '<a title="'; if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; echo '" href="javascript:;" id="rec-link" class="all_in_one" data-id="recent_posts_container_' . $inst_id . '" style="box-shadow:' . $all_m_shadowoff . 'px ' . $all_m_shadowoff . 'px '; 
				if( $all_m_shadowoff == "1" ){ echo " 3";} 
				else {echo " 0";}; 
				echo 'px #' . $all_m_shadow . '; color: #' . $all_m_fontcolor . '; font-size: ' . $all_m_fontsize . 'px; background-color: #' . $all_m_bgcolor . ';">Recent Posts</a>';
			};	
		?>
		</div>		
        <canvas title="<?php if($all_m_tooltip == 'on' && $all_menu_type == 'dynamic'){echo 'Drag or Click';}; ?>" id="all_menu_canvas_<?= $inst_id; ?>" width="<?= $width; ?>" height="<?= $all_menu_height; ?>" style="display: none;"></canvas>	
			<script type="text/javascript">
				<?php include 'js/m.functions.js'; ?>
				<?php include 'js/m.cf.js'; ?>
			</script>
			
<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$tag_option = array();
		
// Basic new instance variables
		$tag_option['all_bg_colour_cf'] = $new_instance['all_bg_colour_cf'];
		$tag_option['all_border_cf'] = $new_instance['all_border_cf'];
		$tag_option['all_cf_image_loc'] = $new_instance['all_cf_image_loc'];
		$tag_option['all_cf_name'] = $new_instance['all_cf_name'];
		$tag_option['all_cf_opacity'] = $new_instance['all_cf_opacity'];
		$tag_option['all_cf_rotation'] = $new_instance['all_cf_rotation'];
		$tag_option['all_cf_url'] = $new_instance['all_cf_url'];
		$tag_option['all_cont_border'] = $new_instance['all_cont_border'];
		$tag_option['all_font_cf'] = $new_instance['all_font_cf'];
		$tag_option['all_font_h'] = $new_instance['all_font_h'];
		$tag_option['all_font_w'] = $new_instance['all_font_w'];
		$tag_option['all_img_reduction'] = $new_instance['all_img_reduction'];
		$tag_option['all_text_color_cf'] = $new_instance['all_text_color_cf'];
		$tag_option['all_text_cont'] = $new_instance['all_text_cont'];
		$tag_option['all_text_line_1'] = $new_instance['all_text_line_1'];
		$tag_option['all_text_line_2'] = $new_instance['all_text_line_2'];
		$tag_option['all_text_line_3'] = $new_instance['all_text_line_3'];
		$tag_option['all_text_line_4'] = $new_instance['all_text_line_4'];
		$tag_option['all_text_line_5'] = $new_instance['all_text_line_5'];
		$tag_option['all_text_zoom'] = $new_instance['all_text_zoom'];	
		$tag_option['height'] = $new_instance['height'];
		$tag_option['taxonomy'] = $new_instance['taxonomy'];
		$tag_option['title'] = $new_instance['title'];
		$tag_option['tooltip_status'] = $new_instance['tooltip_status'];
		$tag_option['width'] = $new_instance['width'];

// Multiple menu options update
		$tag_option['active_bg_color'] = $new_instance['active_bg_color'];
		$tag_option['all_menu_font'] = $new_instance['all_menu_font'];	
		$tag_option['all_menu_height'] = $new_instance['all_menu_height'];
		$tag_option['all_menu_type'] = $new_instance['all_menu_type'];
		$tag_option['all_m_fontsize'] = $new_instance['all_m_fontsize'];
		$tag_option['all_m_fontcolor'] = $new_instance['all_m_fontcolor'];
		$tag_option['all_m_bgcolor'] = $new_instance['all_m_bgcolor'];
		$tag_option['all_m_borderwidth'] = $new_instance['all_m_borderwidth'];
		$tag_option['all_m_bordercolor'] = $new_instance['all_m_bordercolor'];
		$tag_option['all_m_outlcolor'] = $new_instance['all_m_outlcolor'];
		$tag_option['all_m_radius_x'] = $new_instance['all_m_radius_x'];
		$tag_option['all_m_radius_y'] = $new_instance['all_m_radius_y'];
		$tag_option['all_m_radius_z'] = $new_instance['all_m_radius_z'];
		$tag_option['all_m_shadow'] = $new_instance['all_m_shadow'];
		$tag_option['all_m_shadowoff'] = $new_instance['all_m_shadowoff'];
		$tag_option['all_m_tooltip'] = $new_instance['all_m_tooltip'];
		$tag_option['all_taxonomy'] = $new_instance['all_taxonomy'];
		$tag_option['arch_menu_item'] = $new_instance['arch_menu_item'];
		$tag_option['auth_menu_item'] = $new_instance['auth_menu_item'];
		$tag_option['cat_menu_item'] = $new_instance['cat_menu_item'];
		$tag_option['lin_menu_item'] = $new_instance['lin_menu_item'];
		$tag_option['men_menu_item'] = $new_instance['men_menu_item'];
		$tag_option['pag_menu_item'] = $new_instance['pag_menu_item'];
		$tag_option['pos_menu_item'] = $new_instance['pos_menu_item'];
		$tag_option['rec_menu_item'] = $new_instance['rec_menu_item'];
		$tag_option['rotation'] = $new_instance['rotation'];
		
// Archives options update
		$tag_option['all_archives_limit'] = $new_instance['all_archives_limit'];
		$tag_option['arc_img_url'] = $new_instance['arc_img_url'];
		$tag_option['arch_bg_color'] = $new_instance['arch_bg_color'];
		$tag_option['arch_bg_outline'] = $new_instance['arch_bg_outline'];
		$tag_option['arch_borderwidth'] = $new_instance['arch_borderwidth'];
		$tag_option['arch_brightness'] = $new_instance['arch_brightness'];
		$tag_option['arch_click_to_front'] = $new_instance['arch_click_to_front'];
		$tag_option['arch_drag_ctrl'] = $new_instance['arch_drag_ctrl'];
		$tag_option['arch_fontsize'] = $new_instance['arch_fontsize'];
		$tag_option['arch_google_font'] = $new_instance['arch_google_font'];
		$tag_option['arch_initial_x'] = $new_instance['arch_initial_x'];
		$tag_option['arch_initial_y'] = $new_instance['arch_initial_y'];
		$tag_option['arch_lock'] = $new_instance['arch_lock'];
		$tag_option['arch_max_speed'] = $new_instance['arch_max_speed'];		
		$tag_option['arch_min_speed'] = $new_instance['arch_min_speed'];
		$tag_option['arch_outline_color'] = $new_instance['arch_outline_color'];		
		$tag_option['arch_outline_method'] = $new_instance['arch_outline_method'];
		$tag_option['arch_pulsate_to'] = $new_instance['arch_pulsate_to'];
		$tag_option['arch_radius_x'] = $new_instance['arch_radius_x'];
		$tag_option['arch_radius_y'] = $new_instance['arch_radius_y'];
		$tag_option['arch_radius_z'] = $new_instance['arch_radius_z'];
		$tag_option['arch_shadow'] = $new_instance['arch_shadow'];
		$tag_option['arch_shadowblur'] = $new_instance['arch_shadowblur'];
		$tag_option['arch_shadowoff_x'] = $new_instance['arch_shadowoff_x'];
		$tag_option['arch_shadowoff_y'] = $new_instance['arch_shadowoff_y'];
		$tag_option['arch_shape'] = $new_instance['arch_shape'];
		$tag_option['arch_split_width'] = $new_instance['arch_split_width'];
		$tag_option['arch_text_color'] = $new_instance['arch_text_color'];
		$tag_option['arch_text_font'] = $new_instance['arch_text_font'];
		$tag_option['arch_tooltip'] = $new_instance['arch_tooltip'];
		$tag_option['arch_weight'] = $new_instance['arch_weight'];
		$tag_option['arch_weightsizemax'] = $new_instance['arch_weightsizemax'];
		$tag_option['arch_weightsizemin'] = $new_instance['arch_weightsizemin'];
		$tag_option['arch_weight_mode'] = $new_instance['arch_weight_mode'];
		$tag_option['arch_weight_size'] = $new_instance['arch_weight_size'];
		$tag_option['arch_weight_gradient_1'] = $new_instance['arch_weight_gradient_1'];
		$tag_option['arch_weight_gradient_2'] = $new_instance['arch_weight_gradient_2'];
		$tag_option['arch_weight_gradient_3'] = $new_instance['arch_weight_gradient_3'];
		$tag_option['arch_weight_gradient_4'] = $new_instance['arch_weight_gradient_4'];
	
// Authors options update
		$tag_option['all_authors_limit'] = $new_instance['all_authors_limit'];
		$tag_option['all_exclude'] = $new_instance['all_exclude'];
		$tag_option['aut_img_url'] = $new_instance['aut_img_url'];
		$tag_option['auth_bg_color'] = $new_instance['auth_bg_color'];
		$tag_option['auth_bg_outline'] = $new_instance['auth_bg_outline'];
		$tag_option['auth_borderwidth'] = $new_instance['auth_borderwidth'];
		$tag_option['auth_brightness'] = $new_instance['auth_brightness'];
		$tag_option['auth_click_to_front'] = $new_instance['auth_click_to_front'];
		$tag_option['auth_drag_ctrl'] = $new_instance['auth_drag_ctrl'];
		$tag_option['auth_fontsize'] = $new_instance['auth_fontsize'];
		$tag_option['auth_google_font'] = $new_instance['auth_google_font'];
		$tag_option['auth_image_align'] = $new_instance['auth_image_align'];
		$tag_option['auth_image_mode'] = $new_instance['auth_image_mode'];
		$tag_option['auth_image_padding'] = $new_instance['auth_image_padding'];
		$tag_option['auth_image_position'] = $new_instance['auth_image_position'];
		$tag_option['auth_image_scale'] = $new_instance['auth_image_scale'];
		$tag_option['auth_image_valign'] = $new_instance['auth_image_valign'];
		$tag_option['auth_initial_x'] = $new_instance['auth_initial_x'];
		$tag_option['auth_initial_y'] = $new_instance['auth_initial_y'];
		$tag_option['auth_lock'] = $new_instance['auth_lock'];
		$tag_option['auth_max_speed'] = $new_instance['auth_max_speed'];
		$tag_option['auth_min_speed'] = $new_instance['auth_min_speed'];
		$tag_option['auth_outline_color'] = $new_instance['auth_outline_color'];
		$tag_option['auth_outline_method'] = $new_instance['auth_outline_method'];
		$tag_option['auth_pulsate_to'] = $new_instance['auth_pulsate_to'];
		$tag_option['auth_radius_x'] = $new_instance['auth_radius_x'];
		$tag_option['auth_radius_y'] = $new_instance['auth_radius_y'];
		$tag_option['auth_radius_z'] = $new_instance['auth_radius_z'];
		$tag_option['auth_shadow'] = $new_instance['auth_shadow'];
		$tag_option['auth_shadowblur'] = $new_instance['auth_shadowblur'];
		$tag_option['auth_shadowoff_x'] = $new_instance['auth_shadowoff_x'];
		$tag_option['auth_shadowoff_y'] = $new_instance['auth_shadowoff_y'];
		$tag_option['auth_shape'] = $new_instance['auth_shape'];
		$tag_option['auth_split_width'] = $new_instance['auth_split_width'];
		$tag_option['auth_text_align'] = $new_instance['auth_text_align'];
		$tag_option['auth_text_color'] = $new_instance['auth_text_color'];
		$tag_option['auth_text_font'] = $new_instance['auth_text_font'];
		$tag_option['auth_text_valign'] = $new_instance['auth_text_valign'];
		$tag_option['auth_tooltip'] = $new_instance['auth_tooltip'];
		$tag_option['auth_weight'] = $new_instance['auth_weight'];
		$tag_option['auth_weightsizemax'] = $new_instance['auth_weightsizemax'];
		$tag_option['auth_weightsizemin'] = $new_instance['auth_weightsizemin'];
		$tag_option['auth_weight_mode'] = $new_instance['auth_weight_mode'];
		$tag_option['auth_weight_size'] = $new_instance['auth_weight_size'];
		$tag_option['auth_weight_gradient_1'] = $new_instance['auth_weight_gradient_1'];
		$tag_option['auth_weight_gradient_2'] = $new_instance['auth_weight_gradient_2'];
		$tag_option['auth_weight_gradient_3'] = $new_instance['auth_weight_gradient_3'];
		$tag_option['auth_weight_gradient_4'] = $new_instance['auth_weight_gradient_4'];
		
// Categories options update
		$tag_option['all_categories_limit'] = $new_instance['all_categories_limit'];
		$tag_option['cat_bg_color'] = $new_instance['cat_bg_color'];
		$tag_option['cat_bg_outline'] = $new_instance['cat_bg_outline'];
		$tag_option['cat_borderwidth'] = $new_instance['cat_borderwidth'];
		$tag_option['cat_brightness'] = $new_instance['cat_brightness'];
		$tag_option['cat_click_to_front'] = $new_instance['cat_click_to_front'];
		$tag_option['cat_drag_ctrl'] = $new_instance['cat_drag_ctrl'];
		$tag_option['cat_fontsize'] = $new_instance['cat_fontsize'];
		$tag_option['cat_google_font'] = $new_instance['cat_google_font'];
		$tag_option['cat_img_url'] = $new_instance['cat_img_url'];
		$tag_option['cat_initial_x'] = $new_instance['cat_initial_x'];
		$tag_option['cat_initial_y'] = $new_instance['cat_initial_y'];
		$tag_option['cat_lock'] = $new_instance['cat_lock'];
		$tag_option['cat_max_speed'] = $new_instance['cat_max_speed'];
		$tag_option['cat_min_speed'] = $new_instance['cat_min_speed'];
		$tag_option['cat_outline_color'] = $new_instance['cat_outline_color'];
		$tag_option['cat_outline_method'] = $new_instance['cat_outline_method'];	
		$tag_option['cat_pulsate_to'] = $new_instance['cat_pulsate_to'];
		$tag_option['cat_radius_x'] = $new_instance['cat_radius_x'];
		$tag_option['cat_radius_y'] = $new_instance['cat_radius_y'];
		$tag_option['cat_radius_z'] = $new_instance['cat_radius_z'];
		$tag_option['cat_shadow'] = $new_instance['cat_shadow'];
		$tag_option['cat_shadowblur'] = $new_instance['cat_shadowblur'];
		$tag_option['cat_shadowoff_x'] = $new_instance['cat_shadowoff_x'];
		$tag_option['cat_shadowoff_y'] = $new_instance['cat_shadowoff_y'];
		$tag_option['cat_shape'] = $new_instance['cat_shape'];
		$tag_option['cat_split_width'] = $new_instance['cat_split_width'];
		$tag_option['cat_text_color'] = $new_instance['cat_text_color'];
		$tag_option['cat_text_font'] = $new_instance['cat_text_font'];
		$tag_option['cat_tooltip'] = $new_instance['cat_tooltip'];
		$tag_option['cat_weight'] = $new_instance['cat_weight'];
		$tag_option['cat_weightsizemax'] = $new_instance['cat_weightsizemax'];
		$tag_option['cat_weightsizemin'] = $new_instance['cat_weightsizemin'];
		$tag_option['cat_weight_mode'] = $new_instance['cat_weight_mode'];
		$tag_option['cat_weight_size'] = $new_instance['cat_weight_size'];
		$tag_option['cat_weight_gradient_1'] = $new_instance['cat_weight_gradient_1'];
		$tag_option['cat_weight_gradient_2'] = $new_instance['cat_weight_gradient_2'];
		$tag_option['cat_weight_gradient_3'] = $new_instance['cat_weight_gradient_3'];
		$tag_option['cat_weight_gradient_4'] = $new_instance['cat_weight_gradient_4'];

// Links options update
		$tag_option['all_links_limit'] = $new_instance['all_links_limit'];
		$tag_option['all_links_category'] = $new_instance['all_links_category'];
		$tag_option['lin_bg_color'] = $new_instance['lin_bg_color'];
		$tag_option['lin_bg_outline'] = $new_instance['lin_bg_outline'];
		$tag_option['lin_borderwidth'] = $new_instance['lin_borderwidth'];
		$tag_option['lin_brightness'] = $new_instance['lin_brightness'];
		$tag_option['lin_click_to_front'] = $new_instance['lin_click_to_front'];
		$tag_option['lin_drag_ctrl'] = $new_instance['lin_drag_ctrl'];
		$tag_option['lin_fontsize'] = $new_instance['lin_fontsize'];
		$tag_option['lin_google_font'] = $new_instance['lin_google_font'];
		$tag_option['lin_image_scale'] = $new_instance['lin_image_scale'];
		$tag_option['lin_img_url'] = $new_instance['lin_img_url'];
		$tag_option['lin_image_align'] = $new_instance['lin_image_align'];
		$tag_option['lin_image_mode'] = $new_instance['lin_image_mode'];
		$tag_option['lin_image_padding'] = $new_instance['lin_image_padding'];
		$tag_option['lin_image_position'] = $new_instance['lin_image_position'];
		$tag_option['lin_image_scale'] = $new_instance['lin_image_scale'];
		$tag_option['lin_image_valign'] = $new_instance['lin_image_valign'];
		$tag_option['lin_initial_x'] = $new_instance['lin_initial_x'];
		$tag_option['lin_initial_y'] = $new_instance['lin_initial_y'];
		$tag_option['lin_lock'] = $new_instance['lin_lock'];
		$tag_option['lin_max_speed'] = $new_instance['lin_max_speed'];
		$tag_option['lin_min_speed'] = $new_instance['lin_min_speed'];
		$tag_option['lin_outline_color'] = $new_instance['lin_outline_color'];
		$tag_option['lin_outline_method'] = $new_instance['lin_outline_method'];
		$tag_option['lin_pulsate_to'] = $new_instance['lin_pulsate_to'];
		$tag_option['lin_radius_x'] = $new_instance['lin_radius_x'];
		$tag_option['lin_radius_y'] = $new_instance['lin_radius_y'];
		$tag_option['lin_radius_z'] = $new_instance['lin_radius_z'];
		$tag_option['lin_shadow'] = $new_instance['lin_shadow'];
		$tag_option['lin_shadowblur'] = $new_instance['lin_shadowblur'];
		$tag_option['lin_shadowoff_x'] = $new_instance['lin_shadowoff_x'];
		$tag_option['lin_shadowoff_y'] = $new_instance['lin_shadowoff_y'];
		$tag_option['lin_shape'] = $new_instance['lin_shape'];
		$tag_option['lin_split_width'] = $new_instance['lin_split_width'];
		$tag_option['lin_text_align'] = $new_instance['lin_text_align'];
		$tag_option['lin_text_color'] = $new_instance['lin_text_color'];
		$tag_option['lin_text_font'] = $new_instance['lin_text_font'];
		$tag_option['lin_text_valign'] = $new_instance['lin_text_valign'];
		$tag_option['lin_tooltip'] = $new_instance['lin_tooltip'];
		$tag_option['lin_weight'] = $new_instance['lin_weight'];
		$tag_option['lin_weightsizemax'] = $new_instance['lin_weightsizemax'];
		$tag_option['lin_weightsizemin'] = $new_instance['lin_weightsizemin'];
		$tag_option['lin_weight_mode'] = $new_instance['lin_weight_mode'];
		$tag_option['lin_weight_size'] = $new_instance['lin_weight_size'];
		$tag_option['lin_weight_gradient_1'] = $new_instance['lin_weight_gradient_1'];
		$tag_option['lin_weight_gradient_2'] = $new_instance['lin_weight_gradient_2'];
		$tag_option['lin_weight_gradient_3'] = $new_instance['lin_weight_gradient_3'];
		$tag_option['lin_weight_gradient_4'] = $new_instance['lin_weight_gradient_4'];

// Menu options update
		$tag_option['all_menu_name'] = $new_instance['all_menu_name'];
		$tag_option['men_bg_color'] = $new_instance['men_bg_color'];
		$tag_option['men_bg_outline'] = $new_instance['men_bg_outline'];
		$tag_option['men_borderwidth'] = $new_instance['men_borderwidth'];
		$tag_option['men_brightness'] = $new_instance['men_brightness'];
		$tag_option['men_click_to_front'] = $new_instance['men_click_to_front'];
		$tag_option['men_drag_ctrl'] = $new_instance['men_drag_ctrl'];
		$tag_option['men_fontsize'] = $new_instance['men_fontsize'];
		$tag_option['men_google_font'] = $new_instance['men_google_font'];
		$tag_option['men_image_align'] = $new_instance['men_image_align'];
		$tag_option['men_image_mode'] = $new_instance['men_image_mode'];
		$tag_option['men_image_padding'] = $new_instance['men_image_padding'];
		$tag_option['men_image_position'] = $new_instance['men_image_position'];
		$tag_option['men_image_scale'] = $new_instance['men_image_scale'];
		$tag_option['men_image_valign'] = $new_instance['men_image_valign'];
		$tag_option['men_img_url'] = $new_instance['men_img_url'];
		$tag_option['men_initial_x'] = $new_instance['men_initial_x'];
		$tag_option['men_initial_y'] = $new_instance['men_initial_y'];
		$tag_option['men_lock'] = $new_instance['men_lock'];
		$tag_option['men_max_speed'] = $new_instance['men_max_speed'];
		$tag_option['men_min_speed'] = $new_instance['men_min_speed'];
		$tag_option['men_outline_color'] = $new_instance['men_outline_color'];
		$tag_option['men_outline_method'] = $new_instance['men_outline_method'];
		$tag_option['men_pulsate_to'] = $new_instance['men_pulsate_to'];
		$tag_option['men_radius_x'] = $new_instance['men_radius_x'];
		$tag_option['men_radius_y'] = $new_instance['men_radius_y'];
		$tag_option['men_radius_z'] = $new_instance['men_radius_z'];
		$tag_option['men_shadow'] = $new_instance['men_shadow'];
		$tag_option['men_shadowblur'] = $new_instance['men_shadowblur'];
		$tag_option['men_shadowoff_x'] = $new_instance['men_shadowoff_x'];
		$tag_option['men_shadowoff_y'] = $new_instance['men_shadowoff_y'];
		$tag_option['men_shape'] = $new_instance['men_shape'];
		$tag_option['men_split_width'] = $new_instance['men_split_width'];
		$tag_option['men_text_align'] = $new_instance['men_text_align'];
		$tag_option['men_text_color'] = $new_instance['men_text_color'];
		$tag_option['men_text_font'] = $new_instance['men_text_font'];
		$tag_option['men_text_valign'] = $new_instance['men_text_valign'];
		$tag_option['men_tooltip'] = $new_instance['men_tooltip'];
		
// Pages options update
		$tag_option['all_pages_limit'] = $new_instance['all_pages_limit'];
		$tag_option['pag_bg_color'] = $new_instance['pag_bg_color'];
		$tag_option['pag_bg_outline'] = $new_instance['pag_bg_outline'];
		$tag_option['pag_borderwidth'] = $new_instance['pag_borderwidth'];
		$tag_option['pag_brightness'] = $new_instance['pag_brightness'];
		$tag_option['pag_click_to_front'] = $new_instance['pag_click_to_front'];
		$tag_option['pag_drag_ctrl'] = $new_instance['pag_drag_ctrl'];
		$tag_option['pag_fontsize'] = $new_instance['pag_fontsize'];
		$tag_option['pag_google_font'] = $new_instance['pag_google_font'];
		$tag_option['pag_img_url'] = $new_instance['pag_img_url'];
		$tag_option['pag_image_align'] = $new_instance['pag_image_align'];
		$tag_option['pag_image_mode'] = $new_instance['pag_image_mode'];
		$tag_option['pag_image_padding'] = $new_instance['pag_image_padding'];
		$tag_option['pag_image_position'] = $new_instance['pag_image_position'];
		$tag_option['pag_image_scale'] = $new_instance['pag_image_scale'];
		$tag_option['pag_image_valign'] = $new_instance['pag_image_valign'];
		$tag_option['pag_initial_x'] = $new_instance['pag_initial_x'];
		$tag_option['pag_initial_y'] = $new_instance['pag_initial_y'];
		$tag_option['pag_lock'] = $new_instance['pag_lock'];
		$tag_option['pag_max_speed'] = $new_instance['pag_max_speed'];
		$tag_option['pag_min_speed'] = $new_instance['pag_min_speed'];
		$tag_option['pag_outline_color'] = $new_instance['pag_outline_color'];
		$tag_option['pag_outline_method'] = $new_instance['pag_outline_method'];
		$tag_option['pag_pulsate_to'] = $new_instance['pag_pulsate_to'];
		$tag_option['pag_radius_x'] = $new_instance['pag_radius_x'];
		$tag_option['pag_radius_y'] = $new_instance['pag_radius_y'];
		$tag_option['pag_radius_z'] = $new_instance['pag_radius_z'];
		$tag_option['pag_shadow'] = $new_instance['pag_shadow'];
		$tag_option['pag_shadowblur'] = $new_instance['pag_shadowblur'];
		$tag_option['pag_shadowoff_x'] = $new_instance['pag_shadowoff_x'];
		$tag_option['pag_shadowoff_y'] = $new_instance['pag_shadowoff_y'];
		$tag_option['pag_shape'] = $new_instance['pag_shape'];
		$tag_option['pag_split_width'] = $new_instance['pag_split_width'];
		$tag_option['pag_text_align'] = $new_instance['pag_text_align'];
		$tag_option['pag_text_color'] = $new_instance['pag_text_color'];
		$tag_option['pag_text_font'] = $new_instance['pag_text_font'];
		$tag_option['pag_text_valign'] = $new_instance['pag_text_valign'];
		$tag_option['pag_tooltip'] = $new_instance['pag_tooltip'];

// Post Tags options update
		$tag_option['all_post_tags_limit'] = $new_instance['all_post_tags_limit'];
		$tag_option['pos_bg_color'] = $new_instance['pos_bg_color'];
		$tag_option['pos_bg_outline'] = $new_instance['pos_bg_outline'];
		$tag_option['pos_borderwidth'] = $new_instance['pos_borderwidth'];
		$tag_option['pos_brightness'] = $new_instance['pos_brightness'];
		$tag_option['pos_click_to_front'] = $new_instance['pos_click_to_front'];
		$tag_option['pos_drag_ctrl'] = $new_instance['pos_drag_ctrl'];
		$tag_option['pos_fontsize'] = $new_instance['pos_fontsize'];
		$tag_option['pos_google_font'] = $new_instance['pos_google_font'];
		$tag_option['pos_img_url'] = $new_instance['pos_img_url'];
		$tag_option['pos_initial_x'] = $new_instance['pos_initial_x'];
		$tag_option['pos_initial_y'] = $new_instance['pos_initial_y'];
		$tag_option['pos_lock'] = $new_instance['pos_lock'];
		$tag_option['pos_max_speed'] = $new_instance['pos_max_speed'];
		$tag_option['pos_min_speed'] = $new_instance['pos_min_speed'];
		$tag_option['pos_outline_color'] = $new_instance['pos_outline_color'];
		$tag_option['pos_outline_method'] = $new_instance['pos_outline_method'];
		$tag_option['pos_pulsate_to'] = $new_instance['pos_pulsate_to'];
		$tag_option['pos_radius_x'] = $new_instance['pos_radius_x'];
		$tag_option['pos_radius_y'] = $new_instance['pos_radius_y'];
		$tag_option['pos_radius_z'] = $new_instance['pos_radius_z'];
		$tag_option['pos_shadow'] = $new_instance['pos_shadow'];
		$tag_option['pos_shadowblur'] = $new_instance['pos_shadowblur'];
		$tag_option['pos_shadowoff_x'] = $new_instance['pos_shadowoff_x'];
		$tag_option['pos_shadowoff_y'] = $new_instance['pos_shadowoff_y'];
		$tag_option['pos_shape'] = $new_instance['pos_shape'];
		$tag_option['pos_split_width'] = $new_instance['pos_split_width'];
		$tag_option['pos_text_color'] = $new_instance['pos_text_color'];
		$tag_option['pos_text_font'] = $new_instance['pos_text_font'];
		$tag_option['pos_tooltip'] = $new_instance['pos_tooltip'];
		$tag_option['pos_weight'] = $new_instance['pos_weight'];
		$tag_option['pos_weightsizemax'] = $new_instance['pos_weightsizemax'];
		$tag_option['pos_weightsizemin'] = $new_instance['pos_weightsizemin'];
		$tag_option['pos_weight_mode'] = $new_instance['pos_weight_mode'];
		$tag_option['pos_weight_size'] = $new_instance['pos_weight_size'];
		$tag_option['pos_weight_gradient_1'] = $new_instance['pos_weight_gradient_1'];
		$tag_option['pos_weight_gradient_2'] = $new_instance['pos_weight_gradient_2'];
		$tag_option['pos_weight_gradient_3'] = $new_instance['pos_weight_gradient_3'];
		$tag_option['pos_weight_gradient_4'] = $new_instance['pos_weight_gradient_4'];
		
// Recent Posts options update
		$tag_option['all_recent_posts_limit'] = $new_instance['all_recent_posts_limit'];
		$tag_option['all_recent_posts_category'] = $new_instance['all_recent_posts_category'];
		$tag_option['rec_bg_color'] = $new_instance['rec_bg_color'];
		$tag_option['rec_bg_outline'] = $new_instance['rec_bg_outline'];
		$tag_option['rec_borderwidth'] = $new_instance['rec_borderwidth'];
		$tag_option['rec_brightness'] = $new_instance['rec_brightness'];
		$tag_option['rec_click_to_front'] = $new_instance['rec_click_to_front'];
		$tag_option['rec_drag_ctrl'] = $new_instance['rec_drag_ctrl'];
		$tag_option['rec_fontsize'] = $new_instance['rec_fontsize'];
		$tag_option['rec_google_font'] = $new_instance['rec_google_font'];
		$tag_option['rec_image_align'] = $new_instance['rec_image_align'];
		$tag_option['rec_image_mode'] = $new_instance['rec_image_mode'];
		$tag_option['rec_image_padding'] = $new_instance['rec_image_padding'];
		$tag_option['rec_image_position'] = $new_instance['rec_image_position'];
		$tag_option['rec_image_scale'] = $new_instance['rec_image_scale'];
		$tag_option['rec_image_valign'] = $new_instance['rec_image_valign'];
		$tag_option['rec_img_url'] = $new_instance['rec_img_url'];
		$tag_option['rec_initial_x'] = $new_instance['rec_initial_x'];
		$tag_option['rec_initial_y'] = $new_instance['rec_initial_y'];
		$tag_option['rec_lock'] = $new_instance['rec_lock'];
		$tag_option['rec_max_speed'] = $new_instance['rec_max_speed'];
		$tag_option['rec_min_speed'] = $new_instance['rec_min_speed'];
		$tag_option['rec_outline_color'] = $new_instance['rec_outline_color'];
		$tag_option['rec_outline_method'] = $new_instance['rec_outline_method'];
		$tag_option['rec_pulsate_to'] = $new_instance['rec_pulsate_to'];
		$tag_option['rec_radius_x'] = $new_instance['rec_radius_x'];
		$tag_option['rec_radius_y'] = $new_instance['rec_radius_y'];
		$tag_option['rec_radius_z'] = $new_instance['rec_radius_z'];
		$tag_option['rec_shadow'] = $new_instance['rec_shadow'];
		$tag_option['rec_shadowblur'] = $new_instance['rec_shadowblur'];
		$tag_option['rec_shadowoff_x'] = $new_instance['rec_shadowoff_x'];
		$tag_option['rec_shadowoff_y'] = $new_instance['rec_shadowoff_y'];
		$tag_option['rec_shape'] = $new_instance['rec_shape'];
		$tag_option['rec_split_width'] = $new_instance['rec_split_width'];
		$tag_option['rec_text_align'] = $new_instance['rec_text_align'];
		$tag_option['rec_text_color'] = $new_instance['rec_text_color'];
		$tag_option['rec_text_font'] = $new_instance['rec_text_font'];
		$tag_option['rec_text_valign'] = $new_instance['rec_text_valign'];
		$tag_option['rec_tooltip'] = $new_instance['rec_tooltip'];
		$tag_option['rec_weight'] = $new_instance['rec_weight'];
		$tag_option['rec_weightsizemax'] = $new_instance['rec_weightsizemax'];
		$tag_option['rec_weightsizemin'] = $new_instance['rec_weightsizemin'];
		$tag_option['rec_weight_mode'] = $new_instance['rec_weight_mode'];
		$tag_option['rec_weight_size'] = $new_instance['rec_weight_size'];
		$tag_option['rec_weight_gradient_1'] = $new_instance['rec_weight_gradient_1'];
		$tag_option['rec_weight_gradient_2'] = $new_instance['rec_weight_gradient_2'];
		$tag_option['rec_weight_gradient_3'] = $new_instance['rec_weight_gradient_3'];
		$tag_option['rec_weight_gradient_4'] = $new_instance['rec_weight_gradient_4'];

		return $tag_option;
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
		
// Basic Options

			'all_bg_colour_cf' => 'fff',		
			'all_border_cf' => '000',		
			'all_cf_image_loc' => 'http://peter.bg/cube.png',
			'all_cf_name' => '',
			'all_cf_opacity' => '1',
			'all_cf_rotation' => '0',				
			'all_cf_url' => '',		
			'all_cont_border' => '0',		
			'all_font_cf' => 'Special Elite',		
			'all_font_h' => '16',		
			'all_font_w' => 'normal',		
			'all_img_reduction' => '0.25',
			'all_text_color_cf' => '000',		
			'all_text_line_1' => 'Fill up',		
			'all_text_line_2' => 'these lines',		
			'all_text_line_3' => 'with your',		
			'all_text_line_4' => 'text or',		
			'all_text_line_5' => 'leave empty.',		
			'all_text_cont' => 'square',		
			'all_text_zoom' => '1.2',	
			'height' => '260',	
			'taxonomy' => 'post_tag',
			'title' => 'My 3D WP Tag Cloud',			
			'tooltip_status' => 'on',			
			'width' => '260',	

// Multiple menu options
			'active_bg_color' => '00ffcc',			
			'all_menu_font' => 'Arial',			
			'all_menu_height' => '42',	
			'all_menu_type' => 'dynamic',		
			'all_m_bgcolor' => 'fff',	
			'all_m_bordercolor' => '222',	
			'all_m_borderwidth' => '0',		
			'all_m_fontcolor' => '000',		
			'all_m_fontsize' => '9',			
			'all_m_outlcolor' => '369d88',
			'all_m_radius_x' => '5',
			'all_m_radius_y' => '5',
			'all_m_radius_z' => '5',			
			'all_m_shadow' => '000',
			'all_m_shadowoff' => '0',
			'all_m_tooltip' => 'on',			
			'all_taxonomy' => 'post_tags',				
			'rotation' => 'l2r',
			'arch_menu_item' => 'on',
			'auth_menu_item' => 'on',
			'cat_menu_item' => 'on',
			'lin_menu_item' => 'on',
			'men_menu_item' => 'on',
			'pag_menu_item' => 'on',
			'pos_menu_item' => 'on',
			'rec_menu_item' => 'on',

// Archives Cloud Options
			'all_archives_limit' => '',
			'arc_img_url' => '',
			'arch_bg_color' => '',
			'arch_bg_outline' => '',
			'arch_borderwidth' => '0',
			'arch_brightness' => '0.1',
			'arch_click_to_front' => '1000',
			'arch_drag_ctrl' => 'false',
			'arch_fontsize' => '10',
			'arch_google_font' => '',
			'arch_initial_x' => '0',
			'arch_initial_y' => '0',
			'arch_lock' => 'none',
			'arch_max_speed' => '0.05',
			'arch_min_speed' => '0',
			'arch_outline_color' => '369d88',
			'arch_outline_method' => 'block',
			'arch_pulsate_to' => '0',
			'arch_radius_x' => '1',
			'arch_radius_y' => '1',
			'arch_radius_z' => '1',
			'arch_shadow' => '000',
			'arch_shadowblur' => '0',
			'arch_shadowoff_x' => '0',
			'arch_shadowoff_y' => '0',
			'arch_shape' => 'sphere',
			'arch_split_width' => '100',
			'arch_text_color' => '000',
			'arch_text_font' => 'Arial',
			'arch_tooltip' => '',
			'arch_weight' => 'false',
			'arch_weight_mode' => 'both',
			'arch_weightsizemax' => '20',
			'arch_weightsizemin' => '6',
			'arch_weight_size' => '1',
			'arch_weight_gradient_1' => 'f00',
			'arch_weight_gradient_2' => 'ff0',
			'arch_weight_gradient_3' => '0f0',
			'arch_weight_gradient_4' => '00f',

// Authors Cloud Options
			'all_authors_limit' => '',
			'all_exclude' => '',
			'aut_img_url' => '',
			'auth_bg_color' => '',
			'auth_bg_outline' => '',
			'auth_borderwidth' => '0',
			'auth_brightness' => '0.1',
			'auth_click_to_front' => '1000',
			'auth_drag_ctrl' => 'false',
			'auth_fontsize' => '10',
			'auth_google_font' => '',
			'auth_image_align' => 'centre',
			'auth_image_mode' => '',
			'auth_image_padding' => '2',
			'auth_image_position' => 'left',
			'auth_image_scale' => '0.325',
			'auth_image_valign' => 'middle',
			'auth_initial_x' => '0',
			'auth_initial_y' => '0',
			'auth_lock' => 'none',
			'auth_max_speed' => '0.05',
			'auth_min_speed' => '0',
			'auth_outline_color' => '369d88',
			'auth_outline_method' => 'block',
			'auth_pulsate_to' => '0',
			'auth_radius_x' => '1',
			'auth_radius_y' => '1',
			'auth_radius_z' => '1',
			'auth_shadow' => '000',
			'auth_shadowblur' => '0',
			'auth_shadowoff_x' => '0',
			'auth_shadowoff_y' => '0',
			'auth_shape' => 'sphere',
			'auth_split_width' => '100',
			'auth_text_align' => 'centre',
			'auth_text_color' => '000',
			'auth_text_font' => 'Arial',
			'auth_text_valign' => 'middle',
			'auth_tooltip' => '',
			'auth_weight' => 'false',
			'auth_weight_mode' => 'both',
			'auth_weightsizemax' => '20',
			'auth_weightsizemin' => '6',
			'auth_weight_size' => '1',
			'auth_weight_gradient_1' => 'f00',
			'auth_weight_gradient_2' => 'ff0',
			'auth_weight_gradient_3' => '0f0',
			'auth_weight_gradient_4' => '00f',

// Categories Cloud Options
			'all_categories_limit' => '',
			'cat_bg_color' => '',
			'cat_bg_outline' => '',
			'cat_borderwidth' => '0',
			'cat_brightness' => '0.1',
			'cat_click_to_front' => '1000',
			'cat_drag_ctrl' => 'false',
			'cat_fontsize' => '10',
			'cat_google_font' => '',
			'cat_img_url' => '',
			'cat_initial_x' => '0',
			'cat_initial_y' => '0',
			'cat_lock' => 'none',
			'cat_max_speed' => '0.05',
			'cat_min_speed' => '0',
			'cat_outline_color' => '369d88',
			'cat_outline_method' => 'block',
			'cat_pulsate_to' => '0',
			'cat_radius_x' => '1',
			'cat_radius_y' => '1',
			'cat_radius_z' => '1',
			'cat_shadow' => '000',
			'cat_shadowblur' => '0',
			'cat_shadowoff_x' => '0',
			'cat_shadowoff_y' => '0',
			'cat_shape' => 'sphere',
			'cat_split_width' => '100',
			'cat_tooltip' => '',
			'cat_text_color' => '000',
			'cat_text_font' => 'Arial',
			'cat_weight' => 'false',
			'cat_weight_mode' => 'both',
			'cat_weightsizemax' => '20',
			'cat_weightsizemin' => '6',
			'cat_weight_size' => '1',
			'cat_weight_gradient_1' => 'f00',
			'cat_weight_gradient_2' => 'ff0',
			'cat_weight_gradient_3' => '0f0',
			'cat_weight_gradient_4' => '00f',

// Links Cloud Options
			'all_links_limit' => '-1',
			'all_links_category' => '',
			'lin_bg_color' => '',
			'lin_bg_outline' => '',
			'lin_borderwidth' => '0',
			'lin_brightness' => '0.1',
			'lin_click_to_front' => '1000',
			'lin_drag_ctrl' => 'false',
			'lin_fontsize' => '10',
			'lin_google_font' => '',
			'lin_image_scale' => '1',
			'lin_img_url' => '',
			'lin_image_align' => 'centre',
			'lin_image_mode' => '',
			'lin_image_padding' => '2',
			'lin_image_position' => 'top',
			'lin_image_scale' => '0.5',
			'lin_image_valign' => 'middle',
			'lin_initial_x' => '0',
			'lin_initial_y' => '0',
			'lin_lock' => 'none',
			'lin_max_speed' => '0.05',
			'lin_min_speed' => '0',
			'lin_outline_color' => '369d88',
			'lin_outline_method' => 'block',
			'lin_pulsate_to' => '0',
			'lin_radius_x' => '1',
			'lin_radius_y' => '1',
			'lin_radius_z' => '1',
			'lin_shadow' => '000',
			'lin_shadowblur' => '0',
			'lin_shadowoff_x' => '0',
			'lin_shadowoff_y' => '0',
			'lin_shape' => 'sphere',
			'lin_split_width' => '100',
			'lin_text_align' => 'centre',
			'lin_text_color' => '000',
			'lin_text_font' => 'Arial',
			'lin_text_valign' => 'middle',
			'lin_tooltip' => '',
			'lin_weight' => 'false',
			'lin_weight_mode' => 'both',
			'lin_weightsizemax' => '20',
			'lin_weightsizemin' => '6',
			'lin_weight_size' => '1',
			'lin_weight_gradient_1' => 'f00',
			'lin_weight_gradient_2' => 'ff0',
			'lin_weight_gradient_3' => '0f0',
			'lin_weight_gradient_4' => '00f',

// Menu Cloud Options
			'all_menu_name' => '',
			'men_bg_color' => '',
			'men_bg_outline' => '',
			'men_borderwidth' => '0',
			'men_brightness' => '0.1',
			'men_click_to_front' => '1000',
			'men_drag_ctrl' => 'false',
			'men_fontsize' => '10',
			'men_google_font' => '',
			'men_img_url' => '',
			'men_image_align' => 'centre',
			'men_image_mode' => '',
			'men_image_padding' => '2',
			'men_image_position' => 'left',
			'men_image_scale' => '0.75',
			'men_image_valign' => 'middle',
			'men_initial_x' => '0',
			'men_initial_y' => '0',
			'men_lock' => 'none',
			'men_max_speed' => '0.05',
			'men_min_speed' => '0',
			'men_outline_color' => '369d88',
			'men_outline_method' => 'block',
			'men_pulsate_to' => '0',
			'men_radius_x' => '1',
			'men_radius_y' => '1',
			'men_radius_z' => '1',
			'men_shadow' => '000',
			'men_shadowblur' => '0',
			'men_shadowoff_x' => '0',
			'men_shadowoff_y' => '0',
			'men_shape' => 'sphere',
			'men_split_width' => '100',
			'men_text_align' => 'centre',
			'men_text_color' => '000',
			'men_text_font' => 'Arial',
			'men_text_valign' => 'middle',
			'men_tooltip' => '',
			
// Pages Cloud Options
			'all_pages_limit' => '',
			'pag_bg_color' => '',
			'pag_bg_outline' => '',
			'pag_borderwidth' => '0',
			'pag_brightness' => '0.1',
			'pag_click_to_front' => '1000',
			'pag_drag_ctrl' => 'false',
			'pag_fontsize' => '10',
			'pag_google_font' => '',
			'pag_img_url' => '',
			'pag_image_align' => 'centre',
			'pag_image_mode' => '',
			'pag_image_padding' => '2',
			'pag_image_position' => 'left',
			'pag_image_scale' => '0.5',
			'pag_image_valign' => 'middle',
			'pag_initial_x' => '0',
			'pag_initial_y' => '0',
			'pag_lock' => 'none',
			'pag_max_speed' => '0.05',
			'pag_min_speed' => '0',
			'pag_outline_color' => '369d88',
			'pag_outline_method' => 'block',
			'pag_pulsate_to' => '0',
			'pag_radius_x' => '1',
			'pag_radius_y' => '1',
			'pag_radius_z' => '1',
			'pag_shadow' => '000',
			'pag_shadowblur' => '0',
			'pag_shadowoff_x' => '0',
			'pag_shadowoff_y' => '0',
			'pag_shape' => 'sphere',
			'pag_split_width' => '100',
			'pag_text_align' => 'centre',
			'pag_text_color' => '000',
			'pag_text_font' => 'Arial',
			'pag_text_valign' => 'middle',
			'pag_tooltip' => '',

// Post Tags Cloud Options
			'all_post_tags_limit' => '45',
			'pos_bg_color' => '',
			'pos_bg_outline' => '',
			'pos_borderwidth' => '0',
			'pos_brightness' => '0.1',
			'pos_click_to_front' => '1000',
			'pos_drag_ctrl' => 'false',
			'pos_fontsize' => '10',
			'pos_google_font' => '',
			'pos_img_url' => '',
			'pos_initial_x' => '0',
			'pos_initial_y' => '0',
			'pos_lock' => 'none',
			'pos_max_speed' => '0.05',
			'pos_min_speed' => '0',
			'pos_outline_color' => '369d88',
			'pos_outline_method' => 'block',
			'pos_pulsate_to' => '0',
			'pos_radius_x' => '1',
			'pos_radius_y' => '1',
			'pos_radius_z' => '1',
			'pos_shadow' => '000',
			'pos_shadowblur' => '0',
			'pos_shadowoff_x' => '0',
			'pos_shadowoff_y' => '0',
			'pos_shape' => 'sphere',
			'pos_split_width' => '100',
			'pos_text_color' => '000',
			'pos_text_font' => 'Arial',
			'pos_tooltip' => '',
			'pos_weight' => 'false',
			'pos_weight_mode' => 'both',
			'pos_weightsizemax' => '20',
			'pos_weightsizemin' => '6',
			'pos_weight_size' => '1',
			'pos_weight_gradient_1' => 'f00',
			'pos_weight_gradient_2' => 'ff0',
			'pos_weight_gradient_3' => '0f0',
			'pos_weight_gradient_4' => '00f',

// Recent Posts Cloud Options
			'all_recent_posts_limit' => '10',
			'all_recent_posts_category' => '',
			'rec_bg_color' => '',
			'rec_bg_outline' => '',
			'rec_borderwidth' => '0',
			'rec_brightness' => '0.1',
			'rec_click_to_front' => '1000',
			'rec_drag_ctrl' => 'false',
			'rec_fontsize' => '10',
			'rec_google_font' => '',
			'rec_img_url' => '',
			'rec_image_align' => 'centre',
			'rec_image_mode' => '',
			'rec_image_padding' => '2',
			'rec_image_position' => 'left',
			'rec_image_scale' => '0.5',
			'rec_image_valign' => 'middle',
			'rec_initial_x' => '0',
			'rec_initial_y' => '0',
			'rec_lock' => 'none',
			'rec_max_speed' => '0.05',
			'rec_min_speed' => '0',
			'rec_outline_color' => '369d88',
			'rec_outline_method' => 'block',
			'rec_pulsate_to' => '0',
			'rec_radius_x' => '1',
			'rec_radius_y' => '1',
			'rec_radius_z' => '1',
			'rec_shadow' => '000',
			'rec_shadowblur' => '0',
			'rec_shadowoff_x' => '0',
			'rec_shadowoff_y' => '0',
			'rec_shape' => 'sphere',
			'rec_split_width' => '100',
			'rec_text_align' => 'centre',
			'rec_text_color' => '000',
			'rec_text_font' => 'Arial',
			'rec_text_valign' => 'middle',
			'rec_tooltip' => '',
			'rec_weight' => 'false',
			'rec_weight_mode' => 'both',
			'rec_weightsizemax' => '20',
			'rec_weightsizemin' => '6',
			'rec_weight_size' => '1.0',
			'rec_weight_gradient_1' => 'f00',
			'rec_weight_gradient_2' => 'ff0',
			'rec_weight_gradient_3' => '0f0',
			'rec_weight_gradient_4' => '00f'
		));

		include 'm.variables.php';
		include 'm.CP.php'; 
 ?>
		<script type="text/javascript">
//------- Initialisation of jQuery widgets for WP Widget's page
        jQuery(window).load(function() {
			var inout = '<?= $check_widget_1; ?>';
			if (inout == '') {
				jQuery( document ).tooltip( 'option', 'disabled', true );
			} 
			else {
				jQuery(function(){
					setTimeout(function() {
						jQuery(".widget-inside").css("border", "1px solid #bbb");
						jQuery("#accordion-2, #wihead").css("visibility", "visible");	
						var tooltip_status = '<?= $tooltip_status; ?>';
						if (tooltip_status == 'on'){
							jQuery('#accordion-2, #wihead').tooltip( {show: {effect: 'fade', duration: 300}, hide: {effect: 'fade', duration: 50}, tooltipClass: 'custom-tooltip-styling'});
						}
						else {jQuery('#accordion-2, #wihead').tooltip( {show: {effect: 'fade', duration: 300}, hide: {effect: 'fade', duration: 50}, tooltipClass: 'custom-tooltip-styling', position: { my: 'left-300 top',  at: 'left bottom',  of: 'body'}});};			
					}, 250)
				});
			}
        });	
		</script>
<?php
	}
}
// Registering Widget
function wpTagCanvasMLoad() {
    register_widget( 'wpTagCanvasWidgetM' );    
}
add_action('widgets_init', 'wpTagCanvasMLoad');