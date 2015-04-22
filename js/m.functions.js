// 3D WP Tag Cloud-M: JS Functions
					
jQuery(function(){    
//----- Time out for loading Google Fonts ----
	setTimeout(function() {
	
//----- Preparing variables for various purposes -----
		var con;
		var all_in_1 = '<?= $all_in_1; ?>';
		var all_menu_type = '<?= $all_menu_type; ?>';
		var container = ['uni_tags_container_<?= $inst_id; ?>'];
		var content =['<?= $taxonomy; ?>'];
		var all_cf_name = '<?= $all_cf_name; ?>';
		if(all_cf_name !== ''){
			var zoom = false; 
			if(all_cf_name!='my_cf'){
				all_cf_name+= <?= $inst_id; ?>;
			}
		}
		else {var zoom = true;}
		container = ['all_archives_container_<?= $inst_id; ?>','all_authors_container_<?= $inst_id; ?>','all_categories_container_<?= $inst_id; ?>','all_links_container_<?= $inst_id; ?>','all_menu_container_<?= $inst_id; ?>','all_pages_container_<?= $inst_id; ?>','all_post_tags_container_<?= $inst_id; ?>','all_recent_posts_container_<?= $inst_id; ?>']
		content = ['archives','authors','categories','links','menu','pages','post_tags','recent_posts']

//----- Weighting Links and Recent Posts according to their order of appearance -----
		for (var i = 0; i < container.length; i++) {
			var taxonomy = content[i];
			var any_type_tags = jQuery('#'+container[i]+' a');		
			if((taxonomy=="links")||(taxonomy=="recent_posts")){
				if(taxonomy=="links"){var bigest = <?= $lin_weight_size; ?>*6;} 
				else {var bigest = <?= $rec_weight_size; ?>*6;};
				var increment = (bigest-6)/any_type_tags.length;
				for (var j = 0; j < any_type_tags.length; j++) { 
					var fsize = Math.round(bigest-increment*j);
					jQuery('#'+container[i]+' a').eq(j).css({'font-size':fsize+'px'});
				}
			}
			
//----- Weighting Archives according to the number of publications in them -----
			if(taxonomy=="archives"){
			var link_span = jQuery('#'+container[i]+' span');
			for (var j = 0; j < link_span.length; j++) { 
				var text_s = jQuery('#'+container[i]+' span').eq(j).text();
				var text_a = jQuery('#'+container[i]+' span a').eq(j).text();
				var weight_value = text_s.substring(text_a.length+2,text_s.length-1);
				jQuery('#'+container[i]+' span a').eq(j).text(text_s);
				jQuery('#'+container[i]+' span a').eq(j).css({'font-size': weight_value+'px'});
			}
			var clear_links = jQuery('#'+container[i]+' span a').detach();
			jQuery('#'+container[i]+' span').remove();
			jQuery(clear_links).appendTo('#'+container[i]);
			}
			
//-----  Adding image size attributes for Menu content -----
			if(taxonomy=="menu"){
			var link_img = jQuery('#'+container[i]+' a img');
			for (var j = 0; j < link_img.length; j++) { 
				jQuery('#'+container[i]+' div ul li a img').eq(j).attr({"width":"96","height":"96"});
			}
			}
		}
			
//----- Variables for Archives cloud -----
				var arc_img_url = '<?= $arc_img_url; ?>';
				
				var arch_text_font = '<?= $arch_text_font; ?>';
				var arch_google_font = '<?= $arch_google_font; ?>';
				if(arch_google_font!=="") {arch_text_font = arch_google_font;}
				
				var arch_bg_color = '<?= $arch_bg_color; ?>';
				if((arch_bg_color!=='')&&(arch_bg_color!='null')&&(arch_bg_color!='tag')){arch_bg_color = '#'+arch_bg_color;}
				if((arch_bg_color==='')||(arch_bg_color=='null')) {arch_bg_color = null;}
				var arch_bg_outline = '<?= $arch_bg_outline; ?>';
				if((arch_bg_outline!=='')&&(arch_bg_outline!='null')&&(arch_bg_outline!='tag')){arch_bg_outline = '#'+arch_bg_outline;}
				if((arch_bg_outline==='')||(arch_bg_outline=='null')) {arch_bg_outline = null;}
				var arch_click_to_front = '<?= $arch_click_to_front; ?>';
				var arch_text_color = '#<?= $arch_text_color; ?>';
				if(arch_text_color=='#'){arch_text_color = null;}
				var arch_weight_gradient_1 = '<?= $arch_weight_gradient_1; ?>';
				var arch_weight_gradient_2 = '<?= $arch_weight_gradient_2; ?>';
				var arch_weight_gradient_3 = '<?= $arch_weight_gradient_3; ?>';
				var arch_weight_gradient_4 = '<?= $arch_weight_gradient_4; ?>';
				if((arch_weight_gradient_1 === '')||(arch_weight_gradient_2 === '')||(arch_weight_gradient_3 === '')||(arch_weight_gradient_4 === '')){}
				else {var arch_weight_gradient = {0:'#<?= $arch_weight_gradient_1; ?>', 0.33:'#<?= $arch_weight_gradient_2; ?>', 0.67:'#<?= $arch_weight_gradient_3; ?>', 1:'#<?= $arch_weight_gradient_4; ?>'};
				}

				var all_archives_options = {
					bgColour: arch_bg_color,
					bgOutline: arch_bg_outline,
					bgOutlineThickness: <?= $arch_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $arch_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $arch_drag_ctrl; ?>,
					fadeIn: 1500,
					initial:  [<?= $arch_initial_x; ?>,<?= $arch_initial_y; ?>,<?= $arch_initial_z; ?>],
					lock: '<?= $arch_lock; ?>',
					maxSpeed: <?= $arch_max_speed; ?>,
					minBrightness: <?= $arch_brightness; ?>,
					minSpeed: <?= $arch_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $arch_outline_color; ?>',
					outlineMethod: '<?= $arch_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $arch_pulsate_to; ?>,
					radiusX: <?= $arch_radius_x; ?>,
					radiusY: <?= $arch_radius_y; ?>,
					radiusZ: <?= $arch_radius_z; ?>,
					shadow: '#<?= $arch_shadow; ?>',
					shadowBlur: <?= $arch_shadowblur; ?>,
					shadowOffset: [<?= $arch_shadowoff_x; ?>,<?= $arch_shadowoff_y; ?>],
					shape: '<?= $arch_shape; ?>',
					splitWidth: <?= $arch_split_width; ?>,
					textColour: arch_text_color,
					textFont: arch_text_font,
					textHeight: <?= $arch_fontsize; ?>,
					tooltip: 'div',
					weight: <?= $arch_weight; ?>,
					weightGradient: arch_weight_gradient,
					weightMode: '<?= $arch_weight_mode; ?>',
					weightSize: <?= $arch_weight_size; ?>,
					weightSizeMax: <?= $arch_weightsizemax; ?>,
					weightSizeMin: <?= $arch_weightsizemin; ?>,
					wheelZoom: zoom
				};	
				
//----- Variables for Authors cloud -----
				var aut_img_url = '<?= $aut_img_url; ?>';
								
				var auth_text_font = '<?= $auth_text_font; ?>';
				var auth_google_font = '<?= $auth_google_font; ?>';
				if(auth_google_font!="") {auth_text_font = auth_google_font};
				
				var auth_bg_color = '<?= $auth_bg_color; ?>';
				if((auth_bg_color!='')&&(auth_bg_color!='null')&&(auth_bg_color!='tag')){auth_bg_color = '#'+auth_bg_color;};
				if((auth_bg_color=='')||(auth_bg_color=='null')) {auth_bg_color = null;};
				var auth_bg_outline = '<?= $auth_bg_outline; ?>';
				if((auth_bg_outline!='')&&(auth_bg_outline!='null')&&(auth_bg_outline!='tag')){auth_bg_outline = '#'+auth_bg_outline;};
				if((auth_bg_outline=='')||(auth_bg_outline=='null')) {auth_bg_outline = null;};
				var auth_click_to_front = '<?= $auth_click_to_front; ?>';
				var auth_text_color = '#<?= $auth_text_color; ?>';
				if(auth_text_color=='#'){auth_text_color = null;};
				var auth_weight_gradient_1 = '<?= $auth_weight_gradient_1; ?>';
				var auth_weight_gradient_2 = '<?= $auth_weight_gradient_2; ?>';
				var auth_weight_gradient_3 = '<?= $auth_weight_gradient_3; ?>';
				var auth_weight_gradient_4 = '<?= $auth_weight_gradient_4; ?>';
				if((auth_weight_gradient_1 == '')||(auth_weight_gradient_2 == '')||(auth_weight_gradient_3 == '')||(auth_weight_gradient_4 == '')){}
				else {var auth_weight_gradient = {0:'#<?= $auth_weight_gradient_1; ?>', 0.33:'#<?= $auth_weight_gradient_2; ?>', 0.67:'#<?= $auth_weight_gradient_3; ?>', 1:'#<?= $auth_weight_gradient_4; ?>'};
				}
				
				var all_authors_options = {
					bgColour: auth_bg_color,
					bgOutline: auth_bg_outline,
					bgOutlineThickness: <?= $auth_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $auth_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $auth_drag_ctrl; ?>,
					fadeIn: 1500,
					imageAlign: '<?= $auth_image_align; ?>',
					imageMode: '<?= $auth_image_mode; ?>',
					imagePadding: <?= $auth_image_padding; ?>,
					imagePosition: '<?= $auth_image_position; ?>',
					imageScale: <?= $auth_image_scale; ?>,
					imageVAlign: '<?= $auth_image_valign; ?>',
					initial:  [<?= $auth_initial_x; ?>,<?= $auth_initial_y; ?>,<?= $auth_initial_z; ?>],
					lock: '<?= $auth_lock; ?>',
					maxSpeed: <?= $auth_max_speed; ?>,
					minBrightness: <?= $auth_brightness; ?>,
					minSpeed: <?= $auth_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $auth_outline_color; ?>',
					outlineMethod: '<?= $auth_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $auth_pulsate_to; ?>,
					radiusX: <?= $auth_radius_x; ?>,
					radiusY: <?= $auth_radius_y; ?>,
					radiusZ: <?= $auth_radius_z; ?>,
					shadow: '#<?= $auth_shadow; ?>',
					shadowBlur: <?= $auth_shadowblur; ?>,
					shadowOffset: [<?= $auth_shadowoff_x; ?>,<?= $auth_shadowoff_y; ?>],
					shape: '<?= $auth_shape; ?>',
					splitWidth: <?= $auth_split_width; ?>,
					textAlign: '<?= $auth_text_align; ?>',
					textColour: auth_text_color,
					textFont: auth_text_font,
					textHeight: <?= $auth_fontsize; ?>,
					textVAlign: '<?= $auth_text_valign; ?>',
					tooltip: 'div',
					weight: <?= $auth_weight; ?>,
					weightGradient: auth_weight_gradient,
					weightMode: '<?= $auth_weight_mode; ?>',
					weightSize: <?= $auth_weight_size; ?>,
					weightSizeMax: <?= $auth_weightsizemax; ?>,
					weightSizeMin: <?= $auth_weightsizemin; ?>,
					wheelZoom: zoom
				};
				
//----- Variables for Categories cloud -----
				var cat_img_url = '<?= $cat_img_url; ?>';
				
				var cat_text_font = '<?= $cat_text_font; ?>';
				var cat_google_font = '<?= $cat_google_font; ?>';
				if(cat_google_font!="") {cat_text_font = cat_google_font};
				
				var cat_bg_color = '<?= $cat_bg_color; ?>';
				if((cat_bg_color!='')&&(cat_bg_color!='null')&&(cat_bg_color!='tag')){cat_bg_color = '#'+cat_bg_color;};
				if((cat_bg_color=='')||(cat_bg_color=='null')) {cat_bg_color = null;};
				var cat_bg_outline = '<?= $cat_bg_outline; ?>';
				if((cat_bg_outline!='')&&(cat_bg_outline!='null')&&(cat_bg_outline!='tag')){cat_bg_outline = '#'+cat_bg_outline;};
				if((cat_bg_outline=='')||(cat_bg_outline=='null')) {cat_bg_outline = null;};
				var cat_click_to_front = '<?= $cat_click_to_front; ?>';
				var cat_text_color = '#<?= $cat_text_color; ?>';
				if(cat_text_color=='#'){cat_text_color = null;};
				var cat_weight_gradient_1 = '<?= $cat_weight_gradient_1; ?>';
				var cat_weight_gradient_2 = '<?= $cat_weight_gradient_2; ?>';
				var cat_weight_gradient_3 = '<?= $cat_weight_gradient_3; ?>';
				var cat_weight_gradient_4 = '<?= $cat_weight_gradient_4; ?>';
				if((cat_weight_gradient_1 == '')||(cat_weight_gradient_2 == '')||(cat_weight_gradient_3 == '')||(cat_weight_gradient_4 == '')){}
				else {var cat_weight_gradient = {0:'#<?= $cat_weight_gradient_1; ?>', 0.33:'#<?= $cat_weight_gradient_2; ?>', 0.67:'#<?= $cat_weight_gradient_3; ?>', 1:'#<?= $cat_weight_gradient_4; ?>'};
				}

				var all_categories_options = {
					bgColour: cat_bg_color,
					bgOutline: cat_bg_outline,
					bgOutlineThickness: <?= $cat_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $cat_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $cat_drag_ctrl; ?>,
					fadeIn: 1500,
					initial:  [<?= $cat_initial_x; ?>,<?= $cat_initial_y; ?>,<?= $cat_initial_z; ?>],
					lock: '<?= $cat_lock; ?>',
					maxSpeed: <?= $cat_max_speed; ?>,
					minBrightness: <?= $cat_brightness; ?>,
					minSpeed: <?= $cat_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $cat_outline_color; ?>',
					outlineMethod: '<?= $cat_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $cat_pulsate_to; ?>,
					radiusX: <?= $cat_radius_x; ?>,
					radiusY: <?= $cat_radius_y; ?>,
					radiusZ: <?= $cat_radius_z; ?>,
					shadow: '#<?= $cat_shadow; ?>',
					shadowBlur: <?= $cat_shadowblur; ?>,
					shadowOffset: [<?= $cat_shadowoff_x; ?>,<?= $cat_shadowoff_y; ?>],
					shape: '<?= $cat_shape; ?>',
					splitWidth: <?= $cat_split_width; ?>,
					textColour: cat_text_color,
					textFont: cat_text_font,
					textHeight: <?= $cat_fontsize; ?>,
					tooltip: '',
					weight: <?= $cat_weight; ?>,
					weightGradient: cat_weight_gradient,
					weightMode: '<?= $cat_weight_mode; ?>',
					weightSize: <?= $cat_weight_size; ?>,
					weightSizeMax: <?= $cat_weightsizemax; ?>,
					weightSizeMin: <?= $cat_weightsizemin; ?>,
					wheelZoom: zoom
				};

//----- Variables for Links cloud -----
				var lin_img_url = '<?= $lin_img_url; ?>';
				
				var lin_text_font = '<?= $lin_text_font; ?>';
				var lin_google_font = '<?= $lin_google_font; ?>';
				if(lin_google_font!="") {lin_text_font = lin_google_font};
				
				var lin_bg_color = '<?= $lin_bg_color; ?>';
				if((lin_bg_color!='')&&(lin_bg_color!='null')&&(lin_bg_color!='tag')){lin_bg_color = '#'+lin_bg_color;};
				if((lin_bg_color=='')||(lin_bg_color=='null')) {lin_bg_color = null;};
				var lin_bg_outline = '<?= $lin_bg_outline; ?>';
				if((lin_bg_outline!='')&&(lin_bg_outline!='null')&&(lin_bg_outline!='tag')){lin_bg_outline = '#'+lin_bg_outline;};
				if((lin_bg_outline=='')||(lin_bg_outline=='null')) {lin_bg_outline = null;};
				var lin_click_to_front = '<?= $lin_click_to_front; ?>';
				var lin_text_color = '#<?= $lin_text_color; ?>';
				if(lin_text_color=='#'){lin_text_color = null;};
				var lin_weight_gradient_1 = '<?= $lin_weight_gradient_1; ?>';
				var lin_weight_gradient_2 = '<?= $lin_weight_gradient_2; ?>';
				var lin_weight_gradient_3 = '<?= $lin_weight_gradient_3; ?>';
				var lin_weight_gradient_4 = '<?= $lin_weight_gradient_4; ?>';
				if((lin_weight_gradient_1 == '')||(lin_weight_gradient_2 == '')||(lin_weight_gradient_3 == '')||(lin_weight_gradient_4 == '')){}
				else {var lin_weight_gradient = {0:'#<?= $lin_weight_gradient_1; ?>', 0.33:'#<?= $lin_weight_gradient_2; ?>', 0.67:'#<?= $lin_weight_gradient_3; ?>', 1:'#<?= $lin_weight_gradient_4; ?>'};
				}

				var all_links_options = {
					bgColour: lin_bg_color,
					bgOutline: lin_bg_outline,
					bgOutlineThickness: <?= $lin_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $lin_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $lin_drag_ctrl; ?>,
					fadeIn: 1500,
					imageAlign: '<?= $lin_image_align; ?>',
					imageMode: '<?= $lin_image_mode; ?>',
					imagePadding: <?= $lin_image_padding; ?>,
					imagePosition: '<?= $lin_image_position; ?>',
					imageScale: <?= $lin_image_scale; ?>,
					imageVAlign: '<?= $lin_image_valign; ?>',
					initial:  [<?= $lin_initial_x; ?>,<?= $lin_initial_y; ?>,<?= $lin_initial_z; ?>],
					lock: '<?= $lin_lock; ?>',
					maxSpeed: <?= $lin_max_speed; ?>,
					minBrightness: <?= $lin_brightness; ?>,
					minSpeed: <?= $lin_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $lin_outline_color; ?>',
					outlineMethod: '<?= $lin_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 5,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $lin_pulsate_to; ?>,
					radiusX: <?= $lin_radius_x; ?>,
					radiusY: <?= $lin_radius_y; ?>,
					radiusZ: <?= $lin_radius_z; ?>,
					shadow: '#<?= $lin_shadow; ?>',
					shadowBlur: <?= $lin_shadowblur; ?>,
					shadowOffset: [<?= $lin_shadowoff_x; ?>,<?= $lin_shadowoff_y; ?>],
					shape: '<?= $lin_shape; ?>',
					splitWidth: <?= $lin_split_width; ?>,
					textAlign: '<?= $lin_text_align; ?>',
					textColour: lin_text_color,
					textFont: lin_text_font,
					textHeight: <?= $lin_fontsize; ?>,
					textVAlign: '<?= $lin_text_valign; ?>',
					tooltip: 'div',
					weight: <?= $lin_weight; ?>,
					weightGradient: lin_weight_gradient,
					weightMode: '<?= $lin_weight_mode; ?>',
					weightSize: <?= $lin_weight_size; ?>,
					weightSizeMax: <?= $lin_weightsizemax; ?>,
					weightSizeMin: <?= $lin_weightsizemin; ?>,
					wheelZoom: zoom
				};
	
//----- Variables for Menu cloud -----
				var men_img_url = '<?= $men_img_url; ?>';
				
				var men_text_font = '<?= $men_text_font; ?>';
				var men_google_font = '<?= $men_google_font; ?>';
				if(men_google_font!="") {men_text_font = men_google_font};
				
				var men_bg_color = '<?= $men_bg_color; ?>';
				if((men_bg_color!='')&&(men_bg_color!='null')&&(men_bg_color!='tag')){men_bg_color = '#'+men_bg_color;};
				if((men_bg_color=='')||(men_bg_color=='null')) {men_bg_color = null;};
				var men_bg_outline = '<?= $men_bg_outline; ?>';
				if((men_bg_outline!='')&&(men_bg_outline!='null')&&(men_bg_outline!='tag')){men_bg_outline = '#'+men_bg_outline;};
				if((men_bg_outline=='')||(men_bg_outline=='null')) {men_bg_outline = null;};
				var men_click_to_front = '<?= $men_click_to_front; ?>';
				var men_text_color = '#<?= $men_text_color; ?>';
				if(men_text_color=='#'){men_text_color = null;};

				var all_menu_options = {
					bgColour: men_bg_color,
					bgOutline: men_bg_outline,
					bgOutlineThickness: <?= $men_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $men_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $men_drag_ctrl; ?>,
					fadeIn: 1500,
					imageAlign: '<?= $men_image_align; ?>',
					imageMode: '<?= $men_image_mode; ?>',
					imagePadding: <?= $men_image_padding; ?>,
					imagePosition: '<?= $men_image_position; ?>',
					imageScale: <?= $men_image_scale; ?>,
					imageVAlign: '<?= $men_image_valign; ?>',
					initial:  [<?= $men_initial_x; ?>,<?= $men_initial_y; ?>,<?= $men_initial_z; ?>],
					lock: '<?= $men_lock; ?>',
					maxSpeed: <?= $men_max_speed; ?>,
					minBrightness: <?= $men_brightness; ?>,
					minSpeed: <?= $men_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $men_outline_color; ?>',
					outlineMethod: '<?= $men_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $men_pulsate_to; ?>,
					radiusX: <?= $men_radius_x; ?>,
					radiusY: <?= $men_radius_y; ?>,
					radiusZ: <?= $men_radius_z; ?>,
					shadow: '#<?= $men_shadow; ?>',
					shadowBlur: <?= $men_shadowblur; ?>,
					shadowOffset: [<?= $men_shadowoff_x; ?>,<?= $men_shadowoff_y; ?>],
					shape: '<?= $men_shape; ?>',
					splitWidth: <?= $men_split_width; ?>,
					textAlign: '<?= $men_text_align; ?>',
					textColour: men_text_color,
					textFont: men_text_font,
					textHeight: <?= $men_fontsize; ?>,
					textVAlign: '<?= $men_text_valign; ?>',
					tooltip: 'div',
					weight: false,
					wheelZoom: zoom
				};
			
//----- Variables for Pages cloud -----
				var pag_img_url = '<?= $pag_img_url; ?>';
				
				var pag_text_font = '<?= $pag_text_font; ?>';
				var pag_google_font = '<?= $pag_google_font; ?>';
				if(pag_google_font!="") {pag_text_font = pag_google_font};
				
				var pag_bg_color = '<?= $pag_bg_color; ?>';
				if((pag_bg_color!='')&&(pag_bg_color!='null')&&(pag_bg_color!='tag')){pag_bg_color = '#'+pag_bg_color;};
				if((pag_bg_color=='')||(pag_bg_color=='null')) {pag_bg_color = null;};
				var pag_bg_outline = '<?= $pag_bg_outline; ?>';
				if((pag_bg_outline!='')&&(pag_bg_outline!='null')&&(pag_bg_outline!='tag')){pag_bg_outline = '#'+pag_bg_outline;};
				if((pag_bg_outline=='')||(pag_bg_outline=='null')) {pag_bg_outline = null;};
				var pag_click_to_front = '<?= $pag_click_to_front; ?>';
				var pag_text_color = '#<?= $pag_text_color; ?>';
				if(pag_text_color=='#'){pag_text_color = null;};

				var all_pages_options = {
					bgColour: pag_bg_color,
					bgOutline: pag_bg_outline,
					bgOutlineThickness: <?= $pag_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $pag_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $pag_drag_ctrl; ?>,
					fadeIn: 1500,
					imageAlign: '<?= $pag_image_align; ?>',
					imageMode: '<?= $pag_image_mode; ?>',
					imagePadding: <?= $pag_image_padding; ?>,
					imagePosition: '<?= $pag_image_position; ?>',
					imageScale: <?= $pag_image_scale; ?>,
					imageVAlign: '<?= $pag_image_valign; ?>',
					initial:  [<?= $pag_initial_x; ?>,<?= $pag_initial_y; ?>,<?= $pag_initial_z; ?>],
					lock: '<?= $pag_lock; ?>',
					maxSpeed: <?= $pag_max_speed; ?>,
					minBrightness: <?= $pag_brightness; ?>,
					minSpeed: <?= $pag_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $pag_outline_color; ?>',
					outlineMethod: '<?= $pag_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $pag_pulsate_to; ?>,
					radiusX: <?= $pag_radius_x; ?>,
					radiusY: <?= $pag_radius_y; ?>,
					radiusZ: <?= $pag_radius_z; ?>,
					shadow: '#<?= $pag_shadow; ?>',
					shadowBlur: <?= $pag_shadowblur; ?>,
					shadowOffset: [<?= $pag_shadowoff_x; ?>,<?= $pag_shadowoff_y; ?>],
					shape: '<?= $pag_shape; ?>',
					splitWidth: <?= $pag_split_width; ?>,
					textAlign: '<?= $pag_text_align; ?>',
					textColour: pag_text_color,
					textFont: pag_text_font,
					textHeight: <?= $pag_fontsize; ?>,
					textVAlign: '<?= $pag_text_valign; ?>',
					tooltip: 'div',
					textHeight: <?= $pag_fontsize; ?>,
					weight: false,
					wheelZoom: zoom
				};
			
//----- Variables for Post Tags cloud -----
				var pos_img_url = '<?= $pos_img_url; ?>';
				
				var pos_text_font = '<?= $pos_text_font; ?>';
				var pos_google_font = '<?= $pos_google_font; ?>';
				if(pos_google_font!="") {pos_text_font = pos_google_font};
				
				var pos_bg_color = '<?= $pos_bg_color; ?>';
				if((pos_bg_color!='')&&(pos_bg_color!='null')&&(pos_bg_color!='tag')){pos_bg_color = '#'+pos_bg_color;};
				if((pos_bg_color=='')||(pos_bg_color=='null')) {pos_bg_color = null;};
				var pos_bg_outline = '<?= $pos_bg_outline; ?>';
				if((pos_bg_outline!='')&&(pos_bg_outline!='null')&&(pos_bg_outline!='tag')){pos_bg_outline = '#'+pos_bg_outline;};
				if((pos_bg_outline=='')||(pos_bg_outline=='null')) {pos_bg_outline = null;};
				var pos_click_to_front = '<?= $pos_click_to_front; ?>';
				var pos_text_color = '#<?= $pos_text_color; ?>';
				if(pos_text_color=='#'){pos_text_color = null;};
				var pos_weight_gradient_1 = '<?= $pos_weight_gradient_1; ?>';
				var pos_weight_gradient_2 = '<?= $pos_weight_gradient_2; ?>';
				var pos_weight_gradient_3 = '<?= $pos_weight_gradient_3; ?>';
				var pos_weight_gradient_4 = '<?= $pos_weight_gradient_4; ?>';
				if((pos_weight_gradient_1 == '')||(pos_weight_gradient_2 == '')||(pos_weight_gradient_3 == '')||(pos_weight_gradient_4 == '')){}
				else {var pos_weight_gradient = {0:'#<?= $pos_weight_gradient_1; ?>', 0.33:'#<?= $pos_weight_gradient_2; ?>', 0.67:'#<?= $pos_weight_gradient_3; ?>', 1:'#<?= $pos_weight_gradient_4; ?>'};
				}

				var all_post_tags_options = {
					bgColour: pos_bg_color,
					bgOutline: pos_bg_outline,
					bgOutlineThickness: <?= $pos_borderwidth; ?>,
					bgRadius: 5,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $pos_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $pos_drag_ctrl; ?>,
					fadeIn: 1500,
					initial:  [<?= $pos_initial_x; ?>,<?= $pos_initial_y; ?>,<?= $pos_initial_z; ?>],
					lock: '<?= $pos_lock; ?>',
					maxSpeed: <?= $pos_max_speed; ?>,
					minBrightness: <?= $pos_brightness; ?>,
					minSpeed: <?= $pos_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $pos_outline_color; ?>',
					outlineMethod: '<?= $pos_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: 5,
					pulsateTime: 1,
					pulsateTo: <?= $pos_pulsate_to; ?>,
					radiusX: <?= $pos_radius_x; ?>,
					radiusY: <?= $pos_radius_y; ?>,
					radiusZ: <?= $pos_radius_z; ?>,
					shadow: '#<?= $pos_shadow; ?>',
					shadowBlur: <?= $pos_shadowblur; ?>,
					shadowOffset: [<?= $pos_shadowoff_x; ?>,<?= $pos_shadowoff_y; ?>],
					shape: '<?= $pos_shape; ?>',
					splitWidth: <?= $pos_split_width; ?>,
					textColour: pos_text_color,
					textFont: pos_text_font,
					textHeight: <?= $pos_fontsize; ?>,
					tooltip: '',
					weight: <?= $pos_weight; ?>,
					weightGradient: pos_weight_gradient,
					weightMode: '<?= $pos_weight_mode; ?>',
					weightSize: <?= $pos_weight_size; ?>,
					weightSizeMax: <?= $pos_weightsizemax; ?>,
					weightSizeMin: <?= $pos_weightsizemin; ?>,
					wheelZoom: zoom
				};
		
//----- Variables for Recent Posts cloud -----
				var rec_img_url = '<?= $rec_img_url; ?>';
				
				var rec_text_font = '<?= $rec_text_font; ?>';
				var rec_google_font = '<?= $rec_google_font; ?>';
				if(rec_google_font!="") {rec_text_font = rec_google_font};
				
				var rec_bg_color = '<?= $rec_bg_color; ?>';
				if((rec_bg_color!='')&&(rec_bg_color!='null')&&(rec_bg_color!='tag')){rec_bg_color = '#'+rec_bg_color;};
				if((rec_bg_color=='')||(rec_bg_color=='null')) {rec_bg_color = null;};
				var rec_bg_outline = '<?= $rec_bg_outline; ?>';
				if((rec_bg_outline!='')&&(rec_bg_outline!='null')&&(rec_bg_outline!='tag')){rec_bg_outline = '#'+rec_bg_outline;};
				if((rec_bg_outline=='')||(rec_bg_outline=='null')) {rec_bg_outline = null;};
				var rec_click_to_front = '<?= $rec_click_to_front; ?>';
				var rec_text_color = '#<?= $rec_text_color; ?>';
				if(rec_text_color=='#'){rec_text_color = null;};
				var rec_weight_gradient_1 = '<?= $rec_weight_gradient_1; ?>';
				var rec_weight_gradient_2 = '<?= $rec_weight_gradient_2; ?>';
				var rec_weight_gradient_3 = '<?= $rec_weight_gradient_3; ?>';
				var rec_weight_gradient_4 = '<?= $rec_weight_gradient_4; ?>';
				if((rec_weight_gradient_1 == '')||(rec_weight_gradient_2 == '')||(rec_weight_gradient_3 == '')||(rec_weight_gradient_4 == '')){}
				else {var rec_weight_gradient = {0:'#<?= $rec_weight_gradient_1; ?>', 0.33:'#<?= $rec_weight_gradient_2; ?>', 0.67:'#<?= $rec_weight_gradient_3; ?>', 1:'#<?= $rec_weight_gradient_4; ?>'};
				}

				var all_recent_posts_options = {
					bgColour: rec_bg_color,
					bgOutline: rec_bg_outline,
					bgOutlineThickness: <?= $rec_borderwidth; ?>,
					bgRadius: 10,
					centreFunc: window[all_cf_name],
					clickToFront: <?= $rec_click_to_front; ?>,
					decel: 0.9,
					depth: 0.1,
					dragControl: <?= $rec_drag_ctrl; ?>,
					fadeIn: 1500,
					imageAlign: '<?= $rec_image_align; ?>',
					imageMode: '<?= $rec_image_mode; ?>',
					imagePadding: <?= $rec_image_padding; ?>,
					imagePosition: '<?= $rec_image_position; ?>',
					imageScale: <?= $rec_image_scale; ?>,
					imageVAlign: '<?= $rec_image_valign; ?>',
					initial:  [<?= $rec_initial_x; ?>,<?= $rec_initial_y; ?>,<?= $rec_initial_z; ?>],
					lock: '<?= $rec_lock; ?>',
					maxSpeed: <?= $rec_max_speed; ?>,
					minBrightness: <?= $rec_brightness; ?>,
					minSpeed: <?= $rec_min_speed; ?>,
					noTagsMessage: true,
					outlineColour: '#<?= $rec_outline_color; ?>',
					outlineMethod: '<?= $rec_outline_method; ?>',
					outlineOffset: 0,
					outlineRadius: 10,
					outlineThickness: 5,
					padding: 10,
					pulsateTime: 1,
					pulsateTo: <?= $rec_pulsate_to; ?>,
					radiusX: <?= $rec_radius_x; ?>,
					radiusY: <?= $rec_radius_y; ?>,
					radiusZ: <?= $rec_radius_z; ?>,
					shadow: '#<?= $rec_shadow; ?>',
					shadowBlur: <?= $rec_shadowblur; ?>,
					shadowOffset: [<?= $rec_shadowoff_x; ?>,<?= $rec_shadowoff_y; ?>],
					shape: '<?= $rec_shape; ?>',
					splitWidth: <?= $rec_split_width; ?>,
					textAlign: '<?= $rec_text_align; ?>',
					textColour: rec_text_color,
					textFont: rec_text_font,
					textHeight: <?= $rec_fontsize; ?>,
					textVAlign: '<?= $rec_text_valign; ?>',
					tooltip: 'div',
					weight: <?= $rec_weight; ?>,
					weightGradient: rec_weight_gradient,
					weightMode: '<?= $rec_weight_mode; ?>',
					weightSize: <?= $rec_weight_size; ?>,
					weightSizeMax: <?= $rec_weightsizemax; ?>,
					weightSizeMin: <?= $rec_weightsizemin; ?>,
					wheelZoom: zoom
				};			
			
//----- Variables for All in One Menu Cloud -----
			if(all_menu_type == 'dynamic'){
				var direction = '<?= $rotation ?>';
				var shadow_o = <?= $all_m_shadowoff ?>;
				if(shadow_o == 0) {var shadow_offset = [0,0]; var shadow_blur = 0; var padding = 4;}
				else {var shadow_offset=[1,1]; var shadow_blur = 3; var padding = 0;};
				if(direction == 'r2l') {var speed = [-0.5, 0.0, 0.0]}
				else {var speed = [0.5, 0.0, 0.0]};
		
				var all_in_one_menu_options = {
					bgColour: 'tag',
					bgOutline: '#<?= $all_m_bordercolor; ?>',
					bgOutlineThickness: <?= $all_m_borderwidth; ?>,
					bgRadius: 5,
					decel: 0.9,
					depth: 0.1,
					dragControl: true,
					fadeIn: 1000,
					frontSelect: true,
					initial: speed,
					lock: 'y',
					maxSpeed: 0.025,
					minBrightness: 1,
					minSpeed: 0.025,
					outlineColour: '#<?= $all_m_outlcolor; ?>',
					outlineOffset: 0,
					outlineRadius: 5,
					outlineThickness: 3,
					padding: padding,
					radiusX: <?= $all_m_radius_x; ?>,
					radiusY: <?= $all_m_radius_x; ?>,
					radiusZ: <?= $all_m_radius_x; ?>,
					shadow: '#<?= $all_m_shadow; ?>',
					shadowBlur: shadow_blur,
					shadowOffset: shadow_offset,
					shape: 'vring',
					textColour: '#<?= $all_m_fontcolor; ?>',
					textFont: '<?= $all_menu_font; ?>',
					textHeight: <?= $all_m_fontsize; ?>,
					tooltip: '<?= $all_m_tooltip; ?>',
					tooltipClass: 'all-menu-tooltip',
					tooltipDelay: 50,
					wheelZoom: false
				};

//----- Starting animation of All in One clouds -----
				var bgimcar = '';
				for (var i = 0; i < content.length; i++) {
					if( content[i]=='<?= $all_taxonomy; ?>'){
						var shor_tax = content[i].substr(0,3); 
						jQuery('#all_in_one_menu_container_<?=$inst_id; ?> #'+shor_tax+'-link').css({'background-color':'#<?= $active_bg_color; ?>'});
						if(shor_tax == 'arc'){bgimcar = arc_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $arch_tooltip; ?>');}
						else{if(shor_tax == 'aut') {bgimcar = aut_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $auth_tooltip; ?>');}
							else{if(shor_tax == 'cat'){bgimcar = cat_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','');}
								else{if(shor_tax == 'lin'){bgimcar = lin_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $lin_tooltip; ?>');}
									else{if(shor_tax == 'men'){bgimcar = men_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $men_tooltip; ?>');}
										else{if(shor_tax == 'pag'){bgimcar = pag_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $pag_tooltip; ?>');}
											else{if(shor_tax == 'pos'){bgimcar = pos_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','');}
												else {bgimcar = rec_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $rec_tooltip; ?>');}
												}
											}
										}
									}
								}
							}
						if(bgimcar != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+bgimcar+'")'}).hide().fadeIn(1000);};
					}
				}
				TagCanvas.Start('all_menu_canvas_<?=$inst_id; ?>','all_in_one_menu_container_<?=$inst_id; ?>', all_in_one_menu_options);
				jQuery('#all_menu_canvas_<?= $inst_id; ?>').css({'display': 'inline'});
			}
			else {
				for (var i = 0; i < content.length; i++) {
					if( content[i]=='<?= $all_taxonomy; ?>'){
						var shor_tax = content[i].substr(0,3); 
						jQuery('#all_in_one_menu_container_<?=$inst_id; ?> #'+shor_tax+'-link').css({'background-color':'#<?= $active_bg_color; ?>'});
						if(shor_tax == 'arc'){bgimcar = arc_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $arch_tooltip; ?>');}
						else{if(shor_tax == 'aut') {bgimcar = aut_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $auth_tooltip; ?>');}
							else{if(shor_tax == 'cat'){bgimcar = cat_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','');}
								else{if(shor_tax == 'lin'){bgimcar = lin_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $lin_tooltip; ?>');}
									else{if(shor_tax == 'men'){bgimcar = men_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $men_tooltip; ?>');}
										else{if(shor_tax == 'pag'){bgimcar = pag_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $pag_tooltip; ?>');}
											else{if(shor_tax == 'pos'){bgimcar = pos_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','');}
												else {bgimcar = rec_img_url; jQuery('#all_tag_canvas_<?= $inst_id; ?>').attr('title','<?= $rec_tooltip; ?>');}
												}
											}
										}
									}
								}
							}
						if(bgimcar != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+bgimcar+'")'}).hide().fadeIn(1000);};
					};
				}
				jQuery('#all_menu_canvas_<?= $inst_id; ?>, #tag_canvas_<?= $inst_id; ?>').css({'display': 'none'});
				jQuery('#all_in_one_menu_container_<?=$inst_id; ?>').css({'display': 'inline-block'}).hide().fadeIn(1000);
				jQuery('#all_in_one_menu_container_<?=$inst_id; ?> a').css({'border': '<?= $all_m_borderwidth; ?>px solid #<?= $all_m_bordercolor ?>'});
			}
			TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>','all_<?= $all_taxonomy ?>_container_<?=$inst_id; ?>', all_<?= $all_taxonomy ?>_options);
		
//----- Changing cloud via clicking on All in One Menu items -----
		jQuery('#all_in_one_menu_container_<?= $inst_id; ?> a').click(function(){
				
			for (var i = 0; i < content.length; i++) {
				jQuery('#all_in_one_menu_container_<?= $inst_id; ?> a').eq(i).css({'background-color':'#<?= $all_m_bgcolor; ?>'})
			}
			jQuery(this).css({'background-color':'#<?= $active_bg_color; ?>'}); 
			con = this.id;
			if(all_menu_type == 'dynamic'){
				TagCanvas.Update('all_menu_canvas_<?=$inst_id; ?>');
			}
			var all_content = 'all_'+jQuery(this).attr('data-id');
			var all_options = all_content.slice(0,all_content.lastIndexOf('_')-9)+'options';
			if(all_options=='all_archives_options'){
				if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+arc_img_url+'")'}).attr('title','<?= $arch_tooltip; ?>').hide().fadeIn(1000);}; 
				TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
				TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_archives_options)}
			else {if(all_options=='all_authors_options'){
				if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+aut_img_url+'")'}).attr('title','<?= $auth_tooltip; ?>').hide().fadeIn(1000);}; 
				TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
				TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_authors_options);
				}
				else {if(all_options=='all_categories_options'){
					if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+cat_img_url+'")'}).attr('title','').hide().fadeIn(1000);}; 
					TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
					TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_categories_options);
					}
					else {if(all_options=='all_links_options'){
						if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+lin_img_url+'")'}).attr('title','<?= $lin_tooltip; ?>').hide().fadeIn(1000);}; 
						TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
						TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_links_options);
						}
						else {if(all_options=='all_menu_options'){
							if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+men_img_url+'")'}).attr('title','<?= $men_tooltip; ?>').hide().fadeIn(1000);}; 
							TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
							TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_menu_options);
							}
							else {if(all_options=='all_pages_options'){
								if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+pag_img_url+'")'}).attr('title','<?= $pag_tooltip; ?>').hide().fadeIn(1000);}; 
								TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
								TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_pages_options);
								}
								else {if(all_options=='all_post_tags_options'){
									if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+pos_img_url+'")'}).attr('title','').hide().fadeIn(1000);}; 
									TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
									TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_post_tags_options)
									}
									else {
										if(shor_tax+'_img_url' != ''){jQuery('#all_tag_canvas_<?= $inst_id; ?>').css({'background-image': 'url("'+rec_img_url+'")'}).attr('title','<?= $rec_tooltip; ?>').hide().fadeIn(1000);}; 
										TagCanvas.Delete('all_tag_canvas_<?=$inst_id; ?>'); 
										TagCanvas.Start('all_tag_canvas_<?=$inst_id; ?>', all_content, all_recent_posts_options);
									};
								}
							}
						}
					}
				}
			}
		});
		
//----- Freezing animation till loading next page -----
		jQuery('#all_archives_container_<?= $inst_id; ?> a, #all_authors_container_<?= $inst_id; ?> a, #all_categories_container_<?= $inst_id; ?> a, #all_links_container_<?= $inst_id; ?> a, #all_menu_container_<?= $inst_id; ?> a, #all_pages_container_<?= $inst_id; ?> a, #all_post_tags_container_<?= $inst_id; ?> a, #all_recent_posts_container_<?= $inst_id; ?> a').click(function(){
			TagCanvas.Pause('all_tag_canvas_<?= $inst_id; ?>');
		});
	}, 0);
});