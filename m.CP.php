<?php 
/*
3D WP Tag Cloud-M: HTML Control Panel Template
*/
// Important variables for redirecting to WP Admin panel > Appearance > Widgets page
	$admin_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$look_4_string_1 = "editwidget";
	$look_4_string_2 = "customize";
	$check_widget_1 = strpos($admin_url, $look_4_string_1);
	$check_widget_2 = strpos($admin_url, $look_4_string_2);
// Registering scripts and CSS file	
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tooltip');
    wp_register_style('tag-cloud-css', plugin_dir_url( __FILE__ ) . 'css/3D.WP.Tag.Cloud.M.css');
    wp_enqueue_style('tag-cloud-css');
// ===
?>
<style>.widget-inside {padding:0!important; border-radius: 5px; background: #f1f1f1;};</style>
<script type="text/javascript">
//------- Initialisation of jQuery widgets for CP page -------
	jQuery(window).load(function() {
		var check = '<?= $check_widget_1; ?>';
		if(check != ''){
			jQuery('#accordion-2, #wihead').tooltip({content: function() {var element = jQuery( this ); var html_text=element.attr('title'); return html_text;}, position: {  my: 'left top+20',  at: 'left bottom'}}); 
			jQuery(function() {jQuery( "#accordion-2, #accordion-4, #accordion-5" ).accordion({heightStyle: "content", collapsible: true, active: false});});
		};					
	});
// Center Function Text check
	function qutes_check(e,s){
		if(/"/g.test(s) == true){
			jQuery(e).tooltip({ content: 'Use <span style="font-weight: bold; color: red;">single quotes</span> (<span style="font-weight: bold; color: red;">&#39;</span>) please!', tooltipClass: 'custom-tooltip-styling', position: { my: 'center top', at: 'center bottom+15' } }); 
			jQuery(e).focus(); 
			jQuery(e).tooltip({content: function(){
				var element = jQuery( this ); 
				var html_text=element.attr('title'); return html_text;}
			});
		}
	};
// Check for 2d shape selection and hiding Radius Z
	function check43d(thisid, shape, obid, lim, str){
		if(shape=='circles'||shape=='spiral'||shape=='beam'||shape=='square'||shape=='hexagon'||shape=='triangle'||shape=='heart'){var vis = "hidden"} else {var vis = "visible"};
		var razet;
		if(vis == 'hidden'){razet = 0} else{razet = 1};
		jQuery('#'+obid).val(razet);
		jQuery('#cont_'+obid).css('visibility', vis);
		change_limits(thisid, lim, shape, str);
	}
// Change of tag limits for spiral, hexagon, cube, pyramid, beam, circles & antenna, axes, vcones, hcones, square, fir, triangle, heart and love
	function change_limits(thisid, lim, shape, str){
		jQuery('#'+lim).empty();
		if(shape!="spiral"&&shape!="hexagon"&&shape!="cube"&&shape!="pyramid"&&shape!="beam"&&shape!="circles"&&shape!="antena"&&shape!="axes"&&shape!="vcones"&&shape!="hcones"&&shape!="square"&&shape!="fir"&&shape!="triangle"&&shape!="heart"&&shape!="love"){
			switch(str){
				case "rec": build_default_options(5,25,5,lim,"allrpli_");
					break;
				case "pos":
					build_default_options(5,120,5,lim,"allpoli");
					jQuery('#'+lim).append('<option id="allpoli_125" value="0" selected>all</option>');		
					break;
				case "pag":
					build_default_options(5,50,5,lim,"allpali_");
					jQuery('#'+lim).append('<option id="allpali" value="" selected>all</option>');
					break;
				case "men":
					// ...
					break;
				case "ppl":
					// ...
					break;
				case "lin":
					build_default_options(5,100,5,lim,"alllili_");
					jQuery('#'+lim).append('<option id="alllili_105" value="-1" selected>all</option>');
					break;
				case "arc":
					build_default_options(6,60,6,lim,"allarli_");
					jQuery('#'+lim).append('<option id="allarli_66" value="" selected>all</option>');
					break;
				case "aut":
					build_default_options(5,50,5,lim,"allauli_");
					jQuery('#'+lim).append('<option id="allauli_55" value="" selected>all</option>');
					break;
				case "cat":
					build_default_options(5,60,5,lim,"allcali_");
					jQuery('#'+lim).append('<option id="allcali_55" value="0" selected>all</option>');
					break;
			}
		}
		else{
			var a=0, b=0, c=0;
			switch(shape){
				case "spiral": {ii=8; lirp=29; lili=99; lita=120; liar=64; lipa=50; liau=50; lica=57; istep=7;};
					break;
				case "hexagon": {ii=1; lirp=2; lili=5; lita=6; liar=4; lipa=3; liau=3; lica=4; istep=1; a=3; b=3; c=1;};
					break;
				case "cube": {ii=0; lirp=1; lili=3; lita=4; liar=2; lipa=1; liau=1; lica=2; istep=1; a=6; b=12; c=8;};
					break;
				case "pyramid": {ii=1; lirp=3; lili=7; lita=8; liar=6; lipa=5; liau=5; lica=6; istep=1; a=2; b=0; c=2;}; 
					break;
				case "beam": {ii=5; lirp=10; lili=10; lita=10; liar=10; lipa=10; liau=10; lica=10; istep=5;};
					break;
				case "axes": {ii=6; lirp=24; lili=102; lita=120; liar=60; lipa=48; liau=48; lica=60; istep=6;};
					break;
				case "vcones": {ii=2; lirp=3; lili=5; lita=6; liar=4; lipa=4; liau=4; lica=4; istep=1; a=2; b=0; c=1;};
					break;
				case "hcones": {ii=2; lirp=3; lili=5; lita=6; liar=4; lipa=4; liau=4; lica=4; istep=1; a=2; b=0; c=1;};
					break;
				case "circles": {ii=2; lirp=4; lili=6; lita=7; liar=5; lipa=4; liau=4; lica=5; istep=1;};
					break;
				case "antenna": {ii=2; lirp=4; lili=6; lita=7; liar=5; lipa=4; liau=4; lica=5; istep=1;};
					break;
				case "square": {ii=2; lirp=5; lili=10; lita=11; liar=8; lipa=7; liau=7; lica=8; istep=1;};
					break;
				case "fir": {ii=1; lirp=3; lili=7; lita=8; liar=5; lipa=4; liau=4; lica=5; istep=1;};
					break;
				case "triangle": {ii=3; lirp=6; lili=14; lita=15; liar=11; lipa=10; liau=10; lica=11; istep=1;};
					break;
				case "heart": {ii=12; lirp=24; lili=48; lita=48; liar=48; lipa=36; liau=36; lica=48; istep=12;};
					break;
				case "love": {ii=24; lirp=36; lili=60; lita=60; liar=60; lipa=48; liau=48; lica=60; istep=12;};
					break;
				default: {ii=5; lirp=25; lili=100; lita=125; liar=60; lipa=50; liau=50; lica=60; istep=5;};
			}
			switch(str){
				case "rec": build_special_options(ii,lirp,istep,lim,"allrp_",shape,a,b,c);
					break;
				case "lin": build_special_options(ii,lili,istep,lim,"allli_",shape,a,b,c);
					break;
				case "pos": build_special_options(ii,lita,istep,lim,"allpo_",shape,a,b,c);
					break;
				case "cat": build_special_options(ii,lica,istep,lim,"allca_",shape,a,b,c);
					break;
				case "arc": build_special_options(ii,liar,istep,lim,"allar_",shape,a,b,c);
					break;
				case "pag": build_special_options(ii,lipa,istep,lim,"allpa_",shape,a,b,c);
					break;
				case "aut":	build_special_options(ii,liau,istep,lim,"allau_",shape,a,b,c);
					break;
			}
		}
	}
// Build default select options
	function build_default_options(i,max,step,lim,idpref){
		var j;
		for(j=i; j<=max; j+=step){	
			jQuery('#'+lim).append('<option id="'+idpref+j+'" value="'+j+'" '+(idpref=="allrpli_"&&j==max?"selected":"")+'>'+j+'</option>');
		}
	}
// Build special select options
	function build_special_options(ii,imax,istep,lim,idpref,shape,a,b,c){
		var i;
		for(i=ii; i<=imax; i+=istep){	
			jQuery('#'+lim).append('<option id="'+idpref+(shape=='spiral'||shape=='beam'||shape=='axes'||shape=='heart'?i:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='circles'||shape=='antenna'?(2*i*i*i+3*i*i+i)/6:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):a*i*i+b*i+c)+
								   '" value="'+(shape=='spiral'||shape=='beam'||shape=='axes'||shape=='heart'?i:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='circles'||shape=='antenna'?(2*i*i*i+3*i*i+i)/6:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):a*i*i+b*i+c)+'" '+
								   (i==imax?"selected":"")+'>'+(shape=='spiral'||shape=='beam'||shape=='axes'?i:shape=='heart'?i-i/6:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='circles'||shape=='antenna'?(2*i*i*i+3*i*i+i)/6:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):a*i*i+b*i+c)+
								   '</option>');
		}
	}
// HEX check for entered colors	
	function hex_val_check(e,s){
		if(s == 'tag' && (e.id.search('bg_color') > -1 || e.id.search('bg_outline') > -1 )){
			jQuery(e).parent().find('.color').remove(); 
			jQuery(e).parent().append('<span class="color" style="background: #fff; padding: 0 0 0 1px; letter-spacing: 0;">original color</span>');
			}
		else{
			hex_check = /(^[0-9A-F]{6}$)|(^[0-9A-F]{3}$)/i.test(s);
			if (hex_check == true){
				jQuery(e).parent().find('.color').remove();
				jQuery(e).parent().append('<span class="color" style="color: #'+s+';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>');
			}
			else { 
				if(s!=''){
					jQuery(e).tooltip({ content: 'Wrong Color Value: <span style="font-weight: bold; color: red;">'+s+'</span><br>Please enter a valid one!', tooltipClass: 'custom-tooltip-styling', position: { my: 'center top', at: 'center bottom+15' } }); 
					jQuery(e).parent().find('.color').remove();
					jQuery(e).parent().append('<span class="color" style="background: #fff; position: relative; top: 0; margin: 0 0 0 8px; letter-spacing: 0; font-size: 11px;">Oops!</span>');
					jQuery(e).focus(); 
					jQuery(e).tooltip({content: function(){
						var element = jQuery( this ); 
						var html_text=element.attr('title'); return html_text;}
					});
				}
				else{jQuery(e).parent().find('.color').remove();};
			}
		}
	}
	
// "Not less that two menu items" check and "Unchecked starting item" control
	function procedure_1(e){
		for (var i = 0; i < jQuery('.checkbox').length; i++) {
		var on = jQuery('input.checkbox[value="on"]').length;
		};
		if(on==2&&e.checked==false){
			jQuery(e).tooltip({ content: 'Be aware: <span style="font-weight: bold; color: red;">The Menu must offer at least 2 items.</span>', tooltipClass: 'custom-tooltip-styling' }); 
			jQuery(e).prop('value','on');
			jQuery(e).prop('checked',true);
			jQuery(e).focus(); 
			jQuery(e).tooltip({content: function(){
				var html_text=jQuery(e).attr('title'); 
				return html_text;
				}
			});	
		} 
		else {
			if(e.checked==false){ 
				if(jQuery(e).parent().find('.radio-check').first().is(':checked')==true){
					jQuery(e).tooltip({ content: 'Be aware: <span style="font-weight: bold; color: red;">You can&#39;t uncheck a Menu item which is appointed Starting.</span>', tooltipClass: 'custom-tooltip-styling' }); 
					jQuery(e).prop('value','on');
					jQuery(e).prop('checked',true);
					jQuery(e).focus(); 
					jQuery(e).tooltip({content: function(){
						var html_text=jQuery(e).attr('title'); 
						return html_text;
						}
					});
				}
				else {jQuery(e).prop('value','off');};
			}
			else {jQuery(e).prop('value','on');};
		}	
	}
	function procedure_2(e){
		jQuery(e).parent().find('.check-box').first().prop('checked',true);
		jQuery(e).parent().find('.check-box').first().prop('value','on');
	}
	</script>
<!-- Check for proper entrance to widget's Control Panel -->
<?php if( $check_widget_1 == "" && $check_widget_2!= "" ){
			echo '<p id="warning" style="margin: 10px 5px 5px; font-size: 14px; text-align: justify;">This widget can be customized only through <span style="font-weight: bold;">WP Admin panel > Appearance > Widgets</span> page, where Accessibility mode in <span style="font-weight: bold;">Screen Options</span> (top right corner of the page) has to be enabled.</p>'; 
		} 
		else {if( $check_widget_1 == ""){
				echo '<p id="warning" style="margin: 10px 5px 5px; font-size: 14px; text-align: justify;">Since this plugin uses jQuery Accordion and Tooltip you need to enable accessibility mode in <span style="font-weight: bold;">Screen Options</span> (right top corner of this page) for creating/editing cloud instances.</p>'; 
			}
		}
?>
<!-- CP Template -->
<div id="wihead" style="visibility: hidden;">
	<div style="float: left;">
		<span>WIDGET OPTIONS</span>
	</div>
	<div id="toti" onmouseout="jQuery(this).css({'color':'#dc143c'});" onmouseover="jQuery(this).css({'color':'#b01030'});">
		Tooltips
		<br>
		<input style="margin: 0;" title="Turn on Option Tooltips." class="radio" id="<?=$this->get_field_id('tooltip_status'); ?>"
		name="<?=$this->get_field_name('tooltip_status'); ?>" type="radio" value="on" 
		<?php if( $tooltip_status == "on" ){ echo ' checked="checked"'; } ?> onclick="jQuery('#accordion-2, #wihead').tooltip({content: function() {var element = $( this ); var html_text=element.attr('title'); return html_text;}, position: {  my: 'left top+20',  at: 'left bottom'}}); ">on
		
		<input style="margin: 0;" title="Turn off Option tooltips." class="radio" id="<?=$this->get_field_id('tooltip_status'); ?>"
		name="<?=$this->get_field_name('tooltip_status'); ?>" type="radio" value="off"
		<?php if( $tooltip_status == "off" ){ echo ' checked="checked"'; } ?> onclick="jQuery('#accordion-2, #wihead').tooltip({position: { my: 'left-300 top', at: 'left bottom',  of: 'body'}});">off
	</div>
	<div class="thin-spacer"></div>
	<label style="display: inline-block; float: left;" title="Title of the widget instance" for="<?=$this->get_field_id('title'); ?>">
		<span style="font-weight: normal;">Title
		<br> 
		<input style="width: 180px; margin: 0 4px 0 0;"
		id="<?=$this->get_field_id('title'); ?>"
		name="<?=$this->get_field_name('title'); ?>" type="text"
		value="<?php echo $title; ?>" />
	</label>
	<label style="display: inline-block; float: right;" title="Widget's height" for="<?=$this->get_field_id('height'); ?>">
		<span style="font-weight: normal;">
		Height
		<br>
		<select id="<?=$this->get_field_id('height'); ?>" name="<?=$this->get_field_name('height'); ?>">
			<?php for($i=90; $i<1025; $i++){echo '<option id="ho_' . $i . '" value="' . $i . '"'; if($height==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
		</select>px
	</label>
	<label style="display: inline-block; float: right; margin: 0 4px 0 0" title="Widget's width" for="<?=$this->get_field_id('width'); ?>">
		<span style="font-weight: normal;">
		Width
		<br>
		<select id="<?=$this->get_field_id('width'); ?>" name="<?=$this->get_field_name('width'); ?>">
			<?php for($i=90; $i<1025; $i++){echo '<option id="wo_' . $i . '" value="' . $i . '"'; if($width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
		</select>px
	</label>
</div>
<div id="accordion-2" style="background: #fff; padding: 2px 0 1px; visibility: hidden; " <?php if( $check_widget_1 == "" ){ echo ' hidden'; } ?>>
	<h3>MENU & WIDGET ATTRIBUTES</h3>
	<div class="section_content">
		<span style="padding: 0 0 5px 0;">MENU</span>
		<br>
		<div class="thin-spacer"></div>
		<div style="width: 60px; float: left; display: inline-block; margin: 0 2px 0 0;">
			<div>
				<div>
					Type
				</div>
				<div style="float: left; margin: 0 0 10px 0;">
					<input title="Motionless links" class="radio" id="<?=$this->get_field_id('all_menu_type'); ?>"
					name="<?=$this->get_field_name('all_menu_type'); ?>" type="radio" value="static"
					<?php if( $all_menu_type == "static" ){ echo ' checked="checked"'; } ?>>static
					<br>
					<input title="Rotating cloud" class="radio" id="<?=$this->get_field_id('all_menu_type'); ?>"
					name="<?=$this->get_field_name('all_menu_type'); ?>" type="radio" value="dynamic"
					<?php if( $all_menu_type == "dynamic" ){ echo ' checked="checked"'; } ?>>dynamic 
				</div>
			</div>			
			<label title="Height of Menu" style="margin: 0 0 10px 0;" for="<?=$this->get_field_id('all_menu-height'); ?>">
				Height
				<br>
				<select id="<?=$this->get_field_id('all_menu_height'); ?>" name="<?=$this->get_field_name('all_menu_height'); ?>">
					<?php for($i=40; $i<52; $i+=2){echo '<option id="allmh_' . $i . '" value="' . $i . '"'; if($all_menu_height==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<div>
				<div>
					Rotation
				</div>
				<div style="margin: 0 0 10px 0; float: left;" title="When <span class='green'>Menu Type</span> is set to <span class='green'>dynamic</span>: Initial direction of Menu Rotation: Left to Right.">
					<input class="radio" id="<?=$this->get_field_id('rotation'); ?>"
					name="<?=$this->get_field_name('rotation'); ?>" type="radio" value="l2r"
					<?php if( $rotation == "l2r" ){ echo ' checked="checked"'; } ?>>L<span style="font-size: 14px; line-height: 12px;">&#8594;</span>R
					<br>
					<input title="When <span class='green'>Menu Type</span> is set to <span class='green'>dynamic</span>: Initial direction of Menu Rotation: Right to Left." class="radio" id="<?=$this->get_field_id('rotation'); ?>"
					name="<?=$this->get_field_name('rotation'); ?>" type="radio" value="r2l"
					<?php if( $rotation == "r2l" ){ echo ' checked="checked"'; } ?>>L<span style="font-size: 14px; line-height: 12px;">&#8592;</span>R 
				</div>
			</div>
			<div>
				<div>
					Tooltip
				</div>
				<div style="float: left;" title="Turns on menu's tooltip 'Drag or Click'.">
					<input class="radio" id="<?=$this->get_field_id('all_m_tooltip'); ?>"
					name="<?=$this->get_field_name('all_m_tooltip'); ?>" type="radio" value="on"
					<?php if( $all_m_tooltip == "on" ){ echo ' checked="checked"'; } ?>>on
					<br>
					<input title="Turns off menu's tooltip 'Drag or Click'." class="radio" id="<?=$this->get_field_id('all_m_tooltip'); ?>"
					name="<?=$this->get_field_name('all_m_tooltip'); ?>" type="radio" value="off"
					<?php if( $all_m_tooltip == "off" ){ echo ' checked="checked"'; } ?>>off
				</div>
			</div>
		</div>		
		<div style="float: left; display: inline-block; margin: 0 2px 0 0;">
			<div>
				Include & Start with
			</div>
			<div style="padding: 2px; float: left; display: inline-block; border: 1px dotted #aaa; border-radius: 10px;">
				<div class="rache" style="margin-top: 0;">
					<div class="type_of_cont">archives</div>
					<input class="check-box" id="<?=$this->get_field_id('arch_menu_item'); ?>" title="Displays a list of archives."
					name="<?=$this->get_field_name('arch_menu_item'); ?>" type="checkbox" 
					<?php if( $arch_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a list of archives."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="archives"
					<?php if( $all_taxonomy == "archives" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">authors</div>
					<input class="check-box" id="<?=$this->get_field_id('auth_menu_item'); ?>" title="Displays a list of authors."
					name="<?=$this->get_field_name('auth_menu_item'); ?>" type="checkbox" 
					<?php if( $auth_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a list of authors."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="authors"
					<?php if( $all_taxonomy == "authors" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">blogroll</div>
					<input class="check-box" id="<?=$this->get_field_id('lin_menu_item'); ?>" title="Displays bookmarks found in the WP Admin Panel: <span class='green'>Links</span>."
					name="<?=$this->get_field_name('lin_menu_item'); ?>" type="checkbox"
					<?php if( $lin_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with bookmarks, found in the WP Admin Panel: <span class='green'>Links</span>."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="links"
					<?php if( $all_taxonomy == "links" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">categories</div>
					<input class="check-box" id="<?=$this->get_field_id('cat_menu_item'); ?>" title="Displays a list of categories created in the WP Admin Panel."
					name="<?=$this->get_field_name('cat_menu_item'); ?>" type="checkbox" 
					<?php if( $cat_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a list of categories created in the WP Admin Panel."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="categories"
					<?php if( $all_taxonomy == "categories" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">menu</div>
					<input class="check-box" id="<?=$this->get_field_id('men_menu_item'); ?>" title="Displays a navigation menu created via WP Admin Panel."
					name="<?=$this->get_field_name('men_menu_item'); ?>" type="checkbox" 
					<?php if( $men_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a navigation menu created via WP Admin Panel."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="menu"
					<?php if( $all_taxonomy == "menu" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">pages</div>
					<input class="check-box" id="<?=$this->get_field_id('pag_menu_item'); ?>" title="Displays a list of pages."
					name="<?=$this->get_field_name('pag_menu_item'); ?>" type="checkbox" 
					<?php if( $pag_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a list of pages."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="pages"
					<?php if( $all_taxonomy == "pages" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache">
					<div class="type_of_cont">post tags</div>
					<input class="check-box" id="<?=$this->get_field_id('pos_menu_item'); ?>" title="Displays a list of post tags."
					name="<?=$this->get_field_name('pos_menu_item'); ?>" type="checkbox" 
					<?php if( $pos_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with a list of post tags."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="post_tags"
					<?php if( $all_taxonomy == "post_tags" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache" style="margin-bottom: 0;">
					<div class="type_of_cont">recent posts</div>
					<input  class="check-box" id="<?=$this->get_field_id('rec_menu_item'); ?>" title="Displays most recent posts."
					name="<?=$this->get_field_name('rec_menu_item'); ?>" type="checkbox" 
					<?php if( $rec_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with most recent posts."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="recent_posts"
					<?php if( $all_taxonomy == "recent_posts" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
				<div class="rache" style="margin-bottom: 0;">
					<div class="type_of_cont">page/post links</div>
					<input  class="check-box" id="<?=$this->get_field_id('ppl_menu_item'); ?>" title="Displays current page/post links."
					name="<?=$this->get_field_name('ppl_menu_item'); ?>" type="checkbox" 
					<?php if( $ppl_menu_item == "on" ){ echo ' checked="checked"'; } ?> onclick="procedure_1(this)">
					<input class="radio-check" id="<?=$this->get_field_id('all_taxonomy'); ?>" title="Start with current page/post links."
					name="<?=$this->get_field_name('all_taxonomy'); ?>" type="radio" value="ppl"
					<?php if( $all_taxonomy == "ppl" ){ echo ' checked="checked"'; } ?> onclick="procedure_2(this)">
				</div>
			</div>
		</div>
		<div style="">
			<label title="48 Web Safe Fonts for the tag text" style="float: left; width: 157px; margin: 0 0 10px 0;" for="<?=$this->get_field_id('all_menu_font'); ?>">
				Web Safe Font
				<select id="<?=$this->get_field_id('all_menu_font'); ?>" name="<?=$this->get_field_name('all_menu_font'); ?>">
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial" <?php if( $all_menu_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Black" <?php if( $all_menu_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Narrow" <?php if( $all_menu_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Avant Garde" <?php if( $all_menu_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Calibri" <?php if( $all_menu_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Candara" <?php if( $all_menu_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Century Gothic" <?php if( $all_menu_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Comic Sans MS" <?php if( $all_menu_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Franklin Gothic Medium" <?php if( $all_menu_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Futura" <?php if( $all_menu_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Geneva" <?php if( $all_menu_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Gill Sans" <?php if( $all_menu_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Helvetica" <?php if( $all_menu_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Impact" <?php if( $all_menu_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Grande" <?php if( $all_menu_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Sans Unicode" <?php if( $all_menu_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Optima" <?php if( $all_menu_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Segoe UI" <?php if( $all_menu_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Tahoma" <?php if( $all_menu_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
					<option style="background: #f1f1f1;" title="Sans Serif Family" value="Trebuchet MS" <?php if( $all_menu_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
					<option style="background: #f1f1f1;" title="Serif Family" value="Verdana" <?php if( $all_menu_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
					<option title="Serif Family" value="Baskerville" <?php if( $all_menu_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
					<option title="Serif Family" value="Big Caslon" <?php if( $all_menu_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
					<option title="Serif Family" value="Bodoni MT" <?php if( $all_menu_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
					<option title="Serif Family" value="Book Antiqua" <?php if( $all_menu_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
					<option title="Serif Family" value="Calisto MT" <?php if( $all_menu_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
					<option title="Serif Family" value="Cambria" <?php if( $all_menu_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
					<option title="Serif Family" value="Didot" <?php if( $all_menu_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
					<option title="Serif Family" value="Garamond" <?php if( $all_menu_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
					<option title="Serif Family" value="Georgia" <?php if( $all_menu_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
					<option title="Serif Family" value="Goudy Old Style" <?php if( $all_menu_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
					<option title="Serif Family" value="Hoefler Text" <?php if( $all_menu_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
					<option title="Serif Family" value="Lucida Bright" <?php if( $all_menu_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
					<option title="Serif Family" value="Palatino" <?php if( $all_menu_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
					<option title="Serif Family" value="Palatino Linotype" <?php if( $all_menu_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>
					<option title="Serif Family" value="Perpetua" <?php if( $all_menu_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
					<option title="Serif Family" value="Rockwell" <?php if( $all_menu_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
					<option title="Serif Family" value="Rockwell Extra Bold" <?php if( $all_menu_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
					<option title="Serif Family" title="Monospaced Family" value="Times New Roman" <?php if( $all_menu_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Andale Mono" <?php if( $all_menu_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Consolas" <?php if( $all_menu_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Courier New" <?php if( $all_menu_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Console" <?php if( $all_menu_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Sans Typewriter" <?php if( $all_menu_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
					<option style="background: #f1f1f1;" title="Monospaced Family" value="Monaco" <?php if( $all_menu_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
					<option title="Fantasy Family" value="Copperplate" <?php if( $all_menu_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
					<option title="Fantasy Family" value="Papyrus" <?php if( $all_menu_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
					<option style="background: #f1f1f1;" title="Script Family" value="Brush Script MT" <?php if( $all_menu_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>
				</select>
			</label>
		</div>
		<div style="">
			<div style="display: inline-block;">
				<label style="width: 76px; margin: 0 0 10px 0;" title="Height of the tag text font" for="<?=$this->get_field_id('all_m_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('all_m_fontsize'); ?>" name="<?=$this->get_field_name('all_m_fontsize'); ?>">
						<?php for($i=8; $i<15; $i++){echo '<option id="allmfs_' . $i . '" value="' . $i . '"'; if($all_m_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<label style="height: 46px; float: right; margin: 0 16px 5px 0;" title="Color of the tag text - empty string to use the default color." for="<?=$this->get_field_id('all_m_fontcolor'); ?>">
					Font Color
					<br>
					<span style="margin: 1px 0 0 0;" class="hash">#</span>
					<div class="siwraper" style="margin: 1px 0 0 0;">
						<input
						class="colors" id="<?=$this->get_field_id('all_m_fontcolor'); ?>"
						name="<?=$this->get_field_name('all_m_fontcolor'); ?>" type="text"
						value="<?php echo $all_m_fontcolor; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($all_m_fontcolor != '') {echo '<span class="color" style="color: #' . $all_m_fontcolor . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>
			</div>
			<div style="display: inline-block;">
				<div style="float: left; margin: 0 0 10px 0; width: 76px;" title="Border of the Menu tags">
					<div>
						Border
					</div>
					<div style="float: left;">
						<input style="margin: 0" class="radio" id="<?=$this->get_field_id('all_m_borderwidth'); ?>"
						name="<?=$this->get_field_name('all_m_borderwidth'); ?>" type="radio" value="1"
						<?php if( $all_m_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						
						<input style="margin: 0;" class="radio" id="<?=$this->get_field_id('all_m_borderwidth'); ?>"
						name="<?=$this->get_field_name('all_m_borderwidth'); ?>" type="radio" value="0"
						<?php if( $all_m_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>		
				<label style="height: 46px; float: right; margin: 0 0 5px;" title="Color of Menu tags' border: Use empty option for the same as the text color." for="<?=$this->get_field_id('all_m_bordercolor'); ?>">
					Border Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input
						class="colors" id="<?=$this->get_field_id('all_m_bordercolor'); ?>"
						name="<?=$this->get_field_name('all_m_bordercolor'); ?>" type="text"
						value="<?php echo $all_m_bordercolor; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($all_m_bordercolor != '') {echo '<span class="color" style="color: #' . $all_m_bordercolor . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>
			</div>
			<div style="display: inline-block;">
				<div style="width: 76px; float: left;" title="Shadow behind each Menu tag">
					<div>
						Shadow
					</div>
					<div  style="float: left;">
						<input style="margin: 0" class="radio" id="<?=$this->get_field_id('all_m_shadowoff'); ?>"
						name="<?=$this->get_field_name('all_m_shadowoff'); ?>" type="radio" value="1"
						<?php if( $all_m_shadowoff == "1" ){ echo ' checked="checked"';} ?>>on
						
						<input style="margin: 0;" class="radio" id="<?=$this->get_field_id('all_m_shadowoff'); ?>"
						name="<?=$this->get_field_name('all_m_shadowoff'); ?>" type="radio" value="0"
						<?php if( $all_m_shadowoff == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<label style="height: 46px; float: right; margin: 0 0 5px;" title="Colour of the shadow behind each tag" for="<?=$this->get_field_id('all_m_shadow'); ?>">
					Shadow Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input
						class="colors" id="<?=$this->get_field_id('all_m_shadow'); ?>"
						name="<?=$this->get_field_name('all_m_shadow'); ?>" type="text"
						value="<?php echo $all_m_shadow; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($all_m_shadow != '') {echo '<span class="color" style="color: #' . $all_m_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>
			</div>	
			<label style="width: 83px;" title="When <span class='green'>Menu Type</span> is set to <span class='green'>dynamic</span>: Initial size of cloud from center to sides." for="<?=$this->get_field_id('all_m_radius_x'); ?>">
				Radius X,Y,Z 
				<br>
				<select id="<?=$this->get_field_id('all_m_radius_x'); ?>" name="<?=$this->get_field_name('all_m_radius_x'); ?>">
						<?php for($i=0; $i<1205; $i+=5){echo '<option id="allmrx_' . $i . '" value="' . $i/100 . '"'; if($all_m_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select>
			</label>	
			<div style="display: inline-block;">
				<label style="width: 83px; height: 46px;" title="Background color of tags - empty option means no background." for="<?=$this->get_field_id('all_m_bgcolor'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input
						class="colors" id="<?=$this->get_field_id('all_m_bgcolor'); ?>"
						name="<?=$this->get_field_name('all_m_bgcolor'); ?>" type="text"
						value="<?php echo $all_m_bgcolor; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($all_m_bgcolor != '') {echo '<span class="color" style="color: #' . $all_m_bgcolor . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>		
				<label style="width: 83px; height: 46px; float: left;" title="Background color of the Active Menu tag" for="<?=$this->get_field_id('active_bg_color'); ?>">
					Active BG
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input
						class="colors" id="<?=$this->get_field_id('active_bg_color'); ?>"
						name="<?=$this->get_field_name('active_bg_color'); ?>" type="text"
						value="<?php echo $active_bg_color; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($active_bg_color != '') {echo '<span class="color" style="color: #' . $active_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>
				<label style="height: 46px; float: left;" title="Color of the active tag highlight" for="<?=$this->get_field_id('all_m_outlcolor'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input
						class="colors" id="<?=$this->get_field_id('all_m_outlcolor'); ?>"
						name="<?=$this->get_field_name('all_m_outlcolor'); ?>" type="text"
						value="<?php echo $all_m_outlcolor; ?>" onblur="hex_val_check(this, this.value)" />
								<?php 
									if($all_m_outlcolor != '') {echo '<span class="color" style="color: #' . $all_m_outlcolor . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
								?>
					</div>
				</label>					
			</div>
		</div>			
		<div class="divider"></div>
		<span style="float: left; margin: 5px 0 0 0;">WIDGET ATTRIBUTES</span>
		<br>
		<div style="width: 100%; float: left; padding: 5px 0;" title="Function for drawing in the center of the cloud. You can use two ready made functions or create yours.">
			<span style="font-weight: bold;">Center Function</span>
		</div>
		<u style="display: inline-block;" title="Put an image in the center of your cloud.">General Settings</u>
		<br>
		<label style="margin: 0 10px 0 0;" for="<?=$this->get_field_id('all_cf_name'); ?>" title="<span class='green'>none</span> - no Center Function;<br><span class='green'>image_cf()</span> - for an image in cloud's center;<br><span class='green'>text_cf()</span> - for text in cloud's center and<br><span class='green'>my_cf()</span> - for your own code.">
			Function
			<br>
			<select id="<?=$this->get_field_id('all_cf_name'); ?>" name="<?=$this->get_field_name('all_cf_name'); ?>">
				<option value="" <?php if( $all_cf_name == "" ){ echo ' selected'; } ?>>none</option>
				<option value="image_cf" <?php if( $all_cf_name == "image_cf" ){ echo ' selected'; } ?>>image_cf()</option>
				<option value="text_cf" <?php if( $all_cf_name == "text_cf" ){ echo ' selected'; } ?>>text_cf()</option>
				<option value="my_cf" <?php if( $all_cf_name == "my_cf" ){ echo ' selected'; } ?>>my_cf()</option>
			</select>
		</label>
		<div style="float: left;" title="Rotation of Center <span class='green'>Function</span> image/text. Suitable for <span class='green'>square</span> sized image/text.<br><span class='green'>off</span> - no rotation;<br><span class='green'>&#8635;</span> - clockwise rotation (<span class='green'>image_cf()</span> & <span class='green'>text_cf()</span>);<br><span class='green'>&#8634;</span> - counterclockwise rotation (<span class='green'>image_cf()</span> & <span class='green'>text_cf()</span>).">
		Rotation
		<br>
		<input class="radio" id="<?=$this->get_field_id('all_cf_rotation'); ?>"
			name="<?=$this->get_field_name('all_cf_rotation'); ?>" type="radio" value="0"
			<?php if( $all_cf_rotation == "0" ){ echo ' checked="checked"'; } ?>>off
			
			<span style="position:relative; top: 6px; left: 7px; font-size: 30px; line-height: 4px; font-weight: normal;">&#8635;</span>
			<input style="margin: 0 0 0 7px; position: relative; left: -24px; top: 0px;" class="radio" id="<?=$this->get_field_id('all_cf_rotation'); ?>"
			name="<?=$this->get_field_name('all_cf_rotation'); ?>" type="radio" value="1"
			<?php if( $all_cf_rotation == "1" ){ echo ' checked="checked"'; } ?>>
			
			<span style="position:relative; top: 6px; left: -14px; font-size: 30px; line-height: 4px; font-weight: normal;">&#8634;</span>
			<input style="margin: 0 0 0 10px; position: relative; left: -48px; top: 0px;" class="radio" id="<?=$this->get_field_id('all_cf_rotation'); ?>"
			name="<?=$this->get_field_name('all_all_cf_rotation'); ?>" type="radio" value="-1"
			<?php if( $all_cf_rotation == "-1" ){ echo ' checked="checked"'; } ?>>
		</div>
		<label style="margin-left: -30px;" title="Opacity of Center <span class='green'>Function</span> image/text" for="<?=$this->get_field_id('all_cf_opacity'); ?>">
			Opacity
			<br>
			<select id="<?=$this->get_field_id('all_cf_opacity'); ?>" name="<?=$this->get_field_name('all_cf_opacity'); ?>">
				<?php for($i=5; $i<105; $i+=5){echo '<option id="acfo_' . $i . '" value="' . $i/100 . '"'; if($all_cf_opacity==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label> 
		<label style="padding: 15px 0 0 8px; text-align: center;">
			<a style="color:#1e8cbe; font-weight: bold;" title="...of Center Function" href="http://peter.bg/archives/7840" target="_blank">Examples</a>
		</label>	
		<div class="divider" style="display: inline-block; float: none; border-bottom: 1px dotted #bbb;"></div>
		<u title="Put an image in the center of your cloud.">Image Center Function</u>
		<br>
		<label style="clear: both; width: 200px; margin: 0 25px 0 0;" title="Enter location of your image:<br><span class='green'>http://your-site/your-folder/your-image.png</span><br>Image size (width & height) is good to be bigger or equal to widget's one. Plugin will resize it to a proper value. Preferably use png format due to advantage of transparency." for="<?=$this->get_field_id('all_cf_image_loc'); ?>">
			URL
			<input style="width: 100%;"
			id="<?=$this->get_field_id('all_cf_image_loc'); ?>"
			name="<?=$this->get_field_name('all_cf_image_loc'); ?>" type="text"
			value="<?php echo $all_cf_image_loc; ?>" /> 
		</label>
		<div style="float: left;" title="Turn <span class='green'>on</span> if Center Function creates too big image.">
		Image Reduction
		<br>
		<input class="radio" id="<?=$this->get_field_id('all_img_reduction'); ?>"
			name="<?=$this->get_field_name('all_img_reduction'); ?>" type="radio" value="0"
			<?php if( $all_img_reduction == "0" ){ echo ' checked="checked"'; } ?>>on
			
			<input style="margin: 0 0 0 8px;" class="radio" id="<?=$this->get_field_id('all_img_reduction'); ?>"
			name="<?=$this->get_field_name('all_img_reduction'); ?>" type="radio" value="0.25"
			<?php if( $all_img_reduction == "0.25" ){ echo ' checked="checked"'; } ?>>off
		</div>
		<div class="divider" style="border-bottom: 1px dotted #bbb;"></div>
		<div style="clear: both;">
			<u title="Put a text object in the center of your cloud.">Text Center Function</u>
			<br>
			<label style="width: 93px;" for="<?=$this->get_field_id('all_text_cont'); ?>" title="Choose shape of container for your text: <span class='green'>square</span> (suitable for all types of cloud <span class='green'>shape</span>), <span class='green'>landscape</span> rectangle (suitable for shape <span class='green'>hring</span> and <span class='green'>hcylinder</span> when <span class='green'>x-axis</span> rotation is locked) or <span class='green'>portrait</span> rectangle (suitable for <span class='green'>vring</span> and <span class='green'>vcylinder</span> when <span class='green'>y-axis</span> rotation is locked).">
				Text Container
				<br>
				<select id="<?=$this->get_field_id('all_text_cont'); ?>" name="<?=$this->get_field_name('all_text_cont'); ?>">
					<option value="square" <?php if( $all_text_cont == "square" ){ echo ' selected'; } ?>>square</option>
					<option value="landscape" <?php if( $all_text_cont == "landscape" ){ echo ' selected'; } ?>>landscape</option>
					<option value="portrait" <?php if( $all_text_cont == "portrait" ){ echo ' selected'; } ?>>portrait</option>
				</select>
			</label>
			<label style="width: 53px;;" for="<?=$this->get_field_id('all_text_zoom'); ?>" title="Zooms your text object">
				Zoom
				<br>
				<select id="<?=$this->get_field_id('all_text_zoom'); ?>" name="<?=$this->get_field_name('all_text_zoom'); ?>">
					<?php for($i=2; $i<21; $i++){echo '<option id="atxtzoom_' . $i . '" value="' . $i/10 . '"'; if($all_text_zoom==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
				</select>
			</label>
			<label style="width: 56px;;" title="Border width of text object: 0 for no border." for="<?=$this->get_field_id('all_cont_border'); ?>">
				Border
				<br>
				<select id="<?=$this->get_field_id('all_cont_border'); ?>" name="<?=$this->get_field_name('all_cont_border'); ?>">	
					<?php for($i=0; $i<4; $i++){echo '<option id="cntb_' . $i . '" value="' . $i . '"'; if($all_cont_border==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="width: 63px;" title="Height of the font" for="<?=$this->get_field_id('all_font_h'); ?>">
				Font Size
				<br>
				<select id="<?=$this->get_field_id('all_font_h'); ?>" name="<?=$this->get_field_name('all_font_h'); ?>">	
					<?php for($i=10; $i<25; $i++){echo '<option id="fnth_' . $i . '" value="' . $i . '"'; if($all_font_h==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<div style="float: left;" title="Choose weight of text.">
			Font Weight
			<br>
				<input class="radio" id="<?=$this->get_field_id('all_font_w'); ?>"
				name="<?=$this->get_field_name('all_font_w'); ?>" type="radio" value="normal"
				<?php if( $all_font_w == "normal" ){ echo ' checked="checked"'; } ?>>normal
				<br>
				<input class="radio" id="<?=$this->get_field_id('all_font_w'); ?>"
				name="<?=$this->get_field_name('all_font_w'); ?>" type="radio" value="bold"
				<?php if( $all_font_w == "bold" ){ echo ' checked="checked"'; } ?>>bold
			</div>
			<div class="thin-spacer"></div>		
			<div style="display: inline-block; width: 127px; float: left;">
				<span style="font-weight: normal; padding: 0 0 0 40px;">Text</span>
				<br>
				<label style="clear: both; padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('all_text_line_1'); ?>">
					<div style="display: inline-block;">Line 1</div>
					<input style="width: 84px;" id="<?=$this->get_field_id('all_text_line_1'); ?>"
					name="<?=$this->get_field_name('all_text_line_1'); ?>" type="text"
					value="<?php echo $all_text_line_1; ?>" onblur="qutes_check(this, this.value)" />
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('all_text_line_2'); ?>">
					<div style="display: inline-block;">Line 2</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('all_text_line_2'); ?>"
					name="<?=$this->get_field_name('all_text_line_2'); ?>" type="text"
					value="<?php echo $all_text_line_2; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('all_text_line_3'); ?>">
					<div style="display: inline-block;">Line 3</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('all_text_line_3'); ?>"
					name="<?=$this->get_field_name('all_text_line_3'); ?>" type="text"
					value="<?php echo $all_text_line_3; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('all_text_line_4'); ?>">
					<div style="display: inline-block;">Line 4</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('all_text_line_4'); ?>"
					name="<?=$this->get_field_name('all_text_line_4'); ?>" type="text"
					value="<?php echo $all_text_line_4; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('all_text_line_5'); ?>">
					<div style="display: inline-block;">Line 5</div>
					<input style="width: 84px;" id="<?=$this->get_field_id('all_text_line_5'); ?>"
					name="<?=$this->get_field_name('all_text_line_5'); ?>" type="text"
					value="<?php echo $all_text_line_5; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
			</div>
			<div style="display: inline-block;">
				<label style="width: 69px; height: 55px;" for="<?=$this->get_field_id('all_text_color_cf'); ?>">
					Text Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the text"
						class="colors" id="<?=$this->get_field_id('all_text_color_cf'); ?>"
						name="<?=$this->get_field_name('all_text_color_cf'); ?>" type="text"
						value="<?php echo $all_text_color_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($all_text_color_cf != '') {echo '<span class="color" style="color: #' . $all_text_color_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="width: 69px; height: 55px;" for="<?=$this->get_field_id('all_bg_colour_cf'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of the text - empty option means no background."
						class="colors" id="<?=$this->get_field_id('all_bg_colour_cf'); ?>"
						name="<?=$this->get_field_name('all_bg_colour_cf'); ?>" type="text"
						value="<?php echo $all_bg_colour_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($all_bg_colour_cf != '') {echo '<span class="color" style="color: #' . $all_bg_colour_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
						?>
					</div>
				</label>
				<label style="height: 55px;" for="<?=$this->get_field_id('all_border_cf'); ?>">
					Border Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Border color of text container. Empty for no border."
						class="colors" id="<?=$this->get_field_id('all_border_cf'); ?>"
						name="<?=$this->get_field_name('all_border_cf'); ?>" type="text"
						value="<?php echo $all_border_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($all_border_cf != '') {echo '<span class="color" style="color: #' . $all_border_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<br>
				<label title="36 Google Fonts for your text" style="float: left; margin-right: 5px;" for="<?=$this->get_field_id('all_font_cf'); ?>">
					Font
					<br>
					<select id="<?=$this->get_field_id('all_font_cf'); ?>" name="<?=$this->get_field_name('all_font_cf'); ?>">
						<option value="Allan" <?php if( $all_font_cf == "Allan" ){ echo ' selected'; } ?>>Allan</option>
						<option value="Alex Brush" <?php if( $all_font_cf == "Alex Brush" ){ echo ' selected'; } ?>>Alex Brush</option> 
						<option value="Audiowide" <?php if( $all_font_cf == "Audiowide" ){ echo ' selected'; } ?>>Audiowide</option>
						<option value="Autour One" <?php if( $all_font_cf == "Autour One" ){ echo ' selected'; } ?>>Autour One</option>
						<option value="Bad Script" <?php if( $all_font_cf == "Bad Script" ){ echo ' selected'; } ?>>Bad Script</option>
						<option value="Black Ops One" <?php if( $all_font_cf == "Black Ops One" ){ echo ' selected'; } ?>>Black Ops One</option>
						<option value="Bonbon" <?php if( $all_font_cf == "Bonbon" ){ echo ' selected'; } ?>>Bonbon</option>
						<option value="Caesar Dressing" <?php if( $all_font_cf == "Caesar Dressing" ){ echo ' selected'; } ?>>Caesar Dressing</option>
						<option value="Courgette" <?php if( $all_font_cf == "Courgette" ){ echo ' selected'; } ?>>Courgette</option>
						<option value="Dancing Script" <?php if( $all_font_cf == "Dancing Script" ){ echo ' selected'; } ?>>Dancing Script</option>
						<option value="Fira Mono" <?php if( $all_font_cf == "Fira Mono" ){ echo ' selected'; } ?>>Fira Mono</option>
						<option value="Inconsolata" <?php if( $all_font_cf == "Inconsolata" ){ echo ' selected'; } ?>>Inconsolata</option>
						<option value="Indie Flower" <?php if( $all_font_cf == "Indie Flower" ){ echo ' selected'; } ?>>Indie Flower</option>
						<option value="Lobster" <?php if( $all_font_cf == "Lobster" ){ echo ' selected'; } ?>>Lobster</option>
						<option value="Monoton" <?php if( $all_font_cf == "Monoton" ){ echo ' selected'; } ?>>Monoton</option>
						<option value="Nova Cut" <?php if( $all_font_cf == "Nova Cut" ){ echo ' selected'; } ?>>Nova Cut</option>
						<option value="Offside" <?php if( $all_font_cf == "Offside" ){ echo ' selected'; } ?>>Offside</option>
						<option value="Orbitron" <?php if( $all_font_cf == "Orbitron" ){ echo ' selected'; } ?>>Orbitron</option>
						<option value="Oxygen Mono" <?php if( $all_font_cf == "Oxygen Mono" ){ echo ' selected'; } ?>>Oxygen Mono</option>
						<option value="Permanent Marker" <?php if( $all_font_cf == "Permanent Marker" ){ echo ' selected'; } ?>>Permanent Marker</option>
						<option value="Pinyon Script" <?php if( $all_font_cf == "Pinyon Script" ){ echo ' selected'; } ?>>Pinyon Script</option>
						<option value="Pirata One" <?php if( $all_font_cf == "Pirata One" ){ echo ' selected'; } ?>>Pirata One</option>
						<option value="Poiret One" <?php if( $all_font_cf == "Poiret One" ){ echo ' selected'; } ?>>Poiret One</option>
						<option value="Rock Salt" <?php if( $all_font_cf == "Rock Salt" ){ echo ' selected'; } ?>>Rock Salt</option>
						<option value="Sancreek" <?php if( $all_font_cf == "Sancreek" ){ echo ' selected'; } ?>>Sancreek</option>
						<option value="Shadows Into Light" <?php if( $all_font_cf == "Shadows Into Light" ){ echo ' selected'; } ?>>Shadows Into Light</option>
						<option value="Share Tech Mono" <?php if( $all_font_cf == "Share Tech Mono" ){ echo ' selected'; } ?>>Share Tech Mono</option>
						<option value="Smokum" <?php if( $all_font_cf == "Smokum" ){ echo ' selected'; } ?>>Smokum</option>
						<option value="Snowburst One" <?php if( $all_font_cf == "Snowburst One" ){ echo ' selected'; } ?>>Snowburst One</option>
						<option value="Special Elite" <?php if( $all_font_cf == "Special Elite" ){ echo ' selected'; } ?>>Special Elite</option>
						<option value="Syncopate" <?php if( $all_font_cf == "Syncopate" ){ echo ' selected'; } ?>>Syncopate</option>
						<option value="Tangerine" <?php if( $all_font_cf == "Tangerine" ){ echo ' selected'; } ?>>Tangerine</option>
						<option value="Unkempt" <?php if( $all_font_cf == "Unkempt" ){ echo ' selected'; } ?>>Unkempt</option>
						<option value="Warnes" <?php if( $all_font_cf == "Warnes" ){ echo ' selected'; } ?>>Warnes</option>
						<option value="Wire One" <?php if( $all_font_cf == "Wire One" ){ echo ' selected'; } ?>>Wire One</option>
						<option value="Yellowtail" <?php if( $all_font_cf == "Yellowtail" ){ echo ' selected'; } ?>>Yellowtail</option>
					</select>
				</label>
			</div>
		</div>
		<div class="divider" style="border-bottom: 1px dotted #bbb;"></div>
		<div style="clear: both;">
			<u>My Center Function</u>
			<br>
			Create a js file and put in it your function named <span>my_cf</span>:
			<div style="float: left; border-radius: 11px; border: 1px dotted #bbb;" for="<?=$this->get_field_id('all_cf_name'); ?>">
				<div style="font-family: monospace, serif; width: 115px; display: inline-block; margin: 5px 5px 0;">
					function my_cf(){<br>
					&nbsp; &nbsp;...<br>
					}<br>
				</div>
			</div>
			<label style="margin: 5px 0 0 20px; width: 190px;" title="URL of a js file containing your <span class='green'>my_cf()</span> function. For example:<br><span>http://your-domain.com/your-js-folder/your-file.js</span>. <span>IMPORTANT</span>: You can include it in as many widget instances as you want, but you can have ONLY ONE <span class='green'>my_cf()</span> function." for="<?=$this->get_field_id('all_cf_url'); ?>" style="float: left; width: 255px;">
				URL 
				<input style="width: 100%;"
				id="<?=$this->get_field_id('all_cf_url'); ?>"
				name="<?=$this->get_field_name('all_cf_url'); ?>" type="text"
				value="<?php echo $all_cf_url; ?>" /> 
			</label>
		</div>
		</div>
<?php
	$fontsSeraliazed = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBlBRwG98Uy3ci9ygxRDxW1CxCDD-2MOPc');
	$obj = json_decode($fontsSeraliazed);
	$items = $obj->{'items'};
?>
	<h3>ARCHIVES CLOUD</h3>
	<?php include 'templates/Archives.template.php'; ?>
	<h3>AUTHORS CLOUD</h3>
	<?php include 'templates/Authors.template.php'; ?>
	<h3>BLOGROLL CLOUD</h3>
	<?php include 'templates/Links.template.php'; ?>
	<h3>CATEGORIES CLOUD</h3>
	<?php include 'templates/Categories.template.php'; ?>
	<h3>MENU CLOUD</h3>
	<?php include 'templates/Menu.template.php'; ?>
	<h3>PAGE/POST LINKS CLOUD</h3>
	<?php include 'templates/PPL.template.php'; ?>
	<h3>PAGES CLOUD</h3>
	<?php include 'templates/Pages.template.php'; ?>
	<h3>POST TAGS CLOUD</h3>
	<?php include 'templates/Post.Tags.template.php'; ?>
	<h3>RECENT POSTS CLOUD</h3>
	<?php include 'templates/Recent.Posts.template.php'; ?>
	<h3 class="help">GUIDE & TIPS</h3>
	<div class="section_content">
		<h3 id="guide" class="ui-guide-icons" style="margin-left: 5px; margin-right: 5px;" onclick="window.open('<?php echo plugins_url( 'help/m.user.guide.htm' , __FILE__ ) ?>')">
			<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Guide (opens in a new tab)
		</h3>
		<div id="accordion-4">
			<?php include 'help/m.tips.php'; ?>
		</div>
	</div>
</div>
<div style="line-height: 12px; font-size: 10px; text-align: center; padding: 0 0 3px 0; background: #fff; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
	Check Single Cloud plugin variation: <a href="https://wordpress.org/plugins/my-wp-tagcanvas/" target="_blank" style="text-decoration: none; color: #1e8cbe; font-weight: bold;">3D WP Tag Cloud-S</a>
</div>
<style> body {overflow-y: scroll};</style>
