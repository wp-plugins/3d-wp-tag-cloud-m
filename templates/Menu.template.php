<?php 
/*
3D WP Tag Cloud: Menu CP Template
*/
?>
	<div class="section_content">
		<div style="float: left;">
			<span style="padding-bottom: 5px;">GENERAL</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 20px 0 0;" title="The shape of the cloud" for="<?=$this->get_field_id('men_shape'); ?>">
					Shape
					<br>
					<select id="<?=$this->get_field_id('men_shape'); ?>" name="<?=$this->get_field_name('men_shape'); ?>">
						<option value="sphere" <?php if( $men_shape == "sphere" ){ echo ' selected'; } ?>>sphere</option>
						<option value="hcylinder" <?php if( $men_shape == "hcylinder" ){ echo ' selected'; } ?>>hcylinder</option>
						<option value="vcylinder" <?php if( $men_shape == "vcylinder" ){ echo ' selected'; } ?>>vcylinder</option>
						<option value="hring" <?php if( $men_shape == "hring" ){ echo ' selected'; } ?>>hring</option>
						<option value="vring" <?php if( $men_shape == "vring" ){ echo ' selected'; } ?>>vring</option>
					</select>
				</label>
				<label style="max-width: 175px;" title="The menu to be displayed" for="<?=$this->get_field_id('all_menu_name'); ?>">
					Menu 
					<br>
					<select style="max-width: 175px;" id="<?=$this->get_field_id('all_menu_name'); ?>" name="<?=$this->get_field_name('all_menu_name'); ?>">
					<?php
						$terms_menu = get_terms("nav_menu");
						 if ( !empty( $terms_menu ) && !is_wp_error( $terms_menu ) ){
							 foreach ( $terms_menu as $term ) {
								echo "<option value='" . $term->term_id . "'";
								if( $all_menu_name == $term->term_id ) { echo " selected" ; };
								echo ">" . $term->name . "</option>";
							 }
						 }
					?>						
					</select>
				</label> 
				<div class="thick-spacer"></div>
				<label style="margin: 0 10px 0 0;" title="Type of highlight to use" for="<?=$this->get_field_id('men_outline_method'); ?>">
					Outline<br>Method
					<br>
					<select id="<?=$this->get_field_id('men_outline_method'); ?>" name="<?=$this->get_field_name('men_outline_method'); ?>">
						<option value="outline" <?php if( $men_outline_method == "outline" ){ echo ' selected'; } ?>>outline</option>
						<option value="classic" <?php if( $men_outline_method == "classic" ){ echo ' selected'; } ?>>classic</option>
						<option value="block" <?php if( $men_outline_method == "block" ){ echo ' selected'; } ?>>block</option>
						<option value="color" <?php if( $men_outline_method == "hring" ){ echo ' selected'; } ?>>color</option>
						<option value="size" <?php if( $men_outline_method == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="none" <?php if( $men_outline_method == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<div style="float: left; margin: 0 10px 0 0;" title="When enabled, cloud moves when dragged instead of based on mouse position.">
					Drag<br>Control
					<div>
						<input class="radio" id="<?=$this->get_field_id('men_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('men_drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $men_drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('men_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('men_drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $men_drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<label style="margin: 0 10px 0 0;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('men_brightness'); ?>">
					Min<br>Opacity
					<br>
					<select id="<?=$this->get_field_id('men_brightness'); ?>" name="<?=$this->get_field_name('men_brightness'); ?>">
						<?php for($i=0; $i<105; $i+=5){echo '<option id="memb_' . $i . '" value="' . $i/100 . '"'; if($men_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>					
					</select>
				</label> 
				<label style="margin: 0 10px 0 0;" title="Pulsate outline to this opacity. Choose <span class='green'>1.0</span> for no pulsation." for="<?=$this->get_field_id('men_pulsate_to'); ?>">
					Pulsate<br>to Opacity
					<br>
					<select id="<?=$this->get_field_id('men_pulsate_to'); ?>" name="<?=$this->get_field_name('men_pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="mepus_' . $i . '" value="' . $i/10 . '"'; if($men_pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
				<label for="<?=$this->get_field_id('men_lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - prevents the cloud rotating in response to the mouse - the cloud will only move if the <span class='green'>initial</span> option is used to give it a starting speed;<br><span class='green'>none</span> - leaves the cloud unlocked.">
					Lock<br>Rotation
					<br>
					<select id="<?=$this->get_field_id('men_lock'); ?>" name="<?=$this->get_field_name('men_lock'); ?>">
						<option value="x" <?php if( $men_lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
						<option value="y" <?php if( $men_lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
						<option value="xy" <?php if( $men_lock == "xy" ){ echo ' selected'; } ?>>both</option>
						<option value="none" <?php if( $men_lock == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<label style="width: 100%;" for="<?=$this->get_field_id('men_tooltip'); ?>" title="Sets text for operating system tooltip of your cloud. For instance if the cloud allows <span class='green'>Drag Control</span> then you can suggest your site visitors to 'Drag & Click'.">
				Tooltip
				<div>
					<input style="width: 100%;" id="<?=$this->get_field_id('men_tooltip'); ?>"
					name="<?=$this->get_field_name('men_tooltip'); ?>" type="text"
					value="<?php echo $men_tooltip; ?>" />
				</div> 
				</label>
				<label style="float: left; width: 100%; padding: 5px 0 0;" title="URL of an image to be used for Cloud Background. Consider Widget's <span class='green'>Width</span> and <span class='green'>Height</span>." for="<?=$this->get_field_id('men_img_url'); ?>">
					Background Image
					<input style="width: 100%;"
					id="<?=$this->get_field_id('men_img_url'); ?>"
					name="<?=$this->get_field_name('men_img_url'); ?>" type="text"
					value="<?php echo $men_img_url; ?>" /> 
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SIZES</span>
			<div style="padding-top: 5px;">
				<label style="width: 86px;" title="Initial size of cloud from centre to sides." for="<?=$this->get_field_id('men_radius_x'); ?>">
					Radius X 
					<br>
					<select id="<?=$this->get_field_id('men_radius_x'); ?>" name="<?=$this->get_field_name('men_radius_x'); ?>">
						<?php for($i=10; $i<755; $i+=5){echo '<option id="merx_' . $i . '" value="' . $i/100 . '"'; if($men_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to top and bottom." for="<?=$this->get_field_id('men_radius_y'); ?>" >
					Radius Y 
					<br>
					<select id="<?=$this->get_field_id('men_radius_y'); ?>" name="<?=$this->get_field_name('men_radius_y'); ?>">
						<?php for($i=10; $i<755; $i+=5){echo '<option id="mery_' . $i . '" value="' . $i/100 . '"'; if($men_radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to front and back." for="<?=$this->get_field_id('men_radius_z'); ?>">
					Radius Z 
					<br>
					<select id="<?=$this->get_field_id('men_radius_z'); ?>" name="<?=$this->get_field_name('men_radius_z'); ?>">
						<?php for($i=10; $i<755; $i+=5){echo '<option id="merz_' . $i . '" value="' . $i/100 . '"'; if($men_radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label> 
					<label style="width: 70px;" title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are automatically broken at line break tags." for="<?=$this->get_field_id('men_split_width'); ?>">
						Split Width
						<br>
						<select id="<?=$this->get_field_id('men_split_width'); ?>" name="<?=$this->get_field_name('men_split_width'); ?>">						
							<?php for($i=50; $i<155; $i+=5){echo '<option id="mespw_' . $i . '" value="' . $i . '"'; if($men_split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
						</select>px
					</label>

			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left; height: 67px;">
			<span style="padding-bottom: 5px;">COLORS</span>
			<div style="padding-top: 5px;">
				<label style="height: 30px;" for="<?=$this->get_field_id('men_text_color'); ?>">
					Tag Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the tag text - empty string to use the color of the original link" 
						class="colors" id="<?=$this->get_field_id('men_text_color'); ?>"
						name="<?=$this->get_field_name('men_text_color'); ?>" type="text"
						value="<?php echo $men_text_color; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($men_text_color != '') {echo '<span class="color" style="color: #' . $men_text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('men_bg_color'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of tags - empty option means no background. The string <span class='green'>'tag'</span> means use the original link background color."
						class="colors" id="<?=$this->get_field_id('men_bg_color'); ?>"
						name="<?=$this->get_field_name('men_bg_color'); ?>" type="text"
						value="<?php echo $men_bg_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($men_bg_color != '' && $men_bg_color != 'tag') {echo '<span class="color" style="color: #' . $men_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($men_bg_color == 'tag'){echo '<span class="color" style="padding: 0 0 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('men_bg_outline'); ?>">
					Border
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of tag border. Use empty option for the same as the text color, use <span class='green'>'tag'</span> for the original link text color."
						class="colors" id="<?=$this->get_field_id('men_bg_outline'); ?>"
						name="<?=$this->get_field_name('men_bg_outline'); ?>" type="text"
						value="<?php echo $men_bg_outline; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($men_bg_outline != '') {echo '<span class="color" style="color: #' . $men_bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('men_shadow'); ?>">
					Shadow
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the shadow behind each tag"
						class="colors" id="<?=$this->get_field_id('men_shadow'); ?>"
						name="<?=$this->get_field_name('men_shadow'); ?>" type="text"
						value="<?php echo $men_shadow; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($men_shadow != '') {echo '<span class="color" style="color: #' . $men_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>								
				<label for="<?=$this->get_field_id('men_outline_color'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0;">
						<input title="Color of the active tag highlight"
						class="colors" id="<?=$this->get_field_id('men_outline_color'); ?>"
						name="<?=$this->get_field_name('men_outline_color'); ?>" type="text"
						value="<?php echo $men_outline_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($men_outline_color != '') {echo '<span class="color" style="color: #' . $men_outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
			</div>
		</div>		
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">FONTS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 15px 0 0;" title="Height of the tag text font" for="<?=$this->get_field_id('men_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('men_fontsize'); ?>" name="<?=$this->get_field_name('men_fontsize'); ?>">
						<?php for($i=6; $i<31; $i++){echo '<option id="mefs_' . $i . '" value="' . $i . '"'; if($men_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
				<div style="float: left; margin: 0 12px 0 0;" title="Border of the tags">
					<div>
						Border
					</div>
					<div  style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('men_borderwidth'); ?>"
						name="<?=$this->get_field_name('men_borderwidth'); ?>" type="radio" value="1"
						<?php if( $men_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('men_borderwidth'); ?>"
						name="<?=$this->get_field_name('men_borderwidth'); ?>" type="radio" value="0"
						<?php if( $men_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="float: left; margin: 0 14px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
					Shadow Offset [x, y]
					<br>
					<select id="<?=$this->get_field_id('men_shadowoff_x'); ?>" name="<?=$this->get_field_name('men_shadowoff_x'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="mesox_' . $i . '" value="' . $i . '"'; if($men_shadowoff_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select><select id="<?=$this->get_field_id('men_shadowoff_y'); ?>" name="<?=$this->get_field_name('men_shadowoff_y'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="mesoy_' . $i . '" value="' . $i . '"'; if($men_shadowoff_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px
				</div>
				<label style="margin: 0 0 5px 0;" title="Shadow behind each Menu tag" for="<?=$this->get_field_id('men_shadowblur'); ?>">
					Shadow Blur
					<br>
					<select id="<?=$this->get_field_id('men_shadowblur'); ?>" name="<?=$this->get_field_name('men_shadowblur'); ?>">
						<?php for($i=0; $i<6; $i++){echo '<option id="meshb_' . $i . '" value="' . $i . '"'; if($men_shadowblur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>												
					</select>px
				</label>
				<div class="thin-spacer"></div>
				<label title="Web Safe Font family for the tag text" style="float: left; width: 170px; margin-right: 5px;" for="<?=$this->get_field_id('men_text_font'); ?>">
					Web Safe Font
					<select id="<?=$this->get_field_id('men_text_font'); ?>" name="<?=$this->get_field_name('men_text_font'); ?>">
						<option value="" <?php if( $men_text_font == "" ){ echo ' selected'; } ?>>Font of the original link</option>
						<option style="background-color: #ddd;" title="Generic Font Family" value="Sans Serif" <?php if( $men_text_font == "Sans Serif" ){ echo ' selected'; } ?>>SANS SERIF</option>
						<option value="Arial" <?php if( $men_text_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
						<option	value="Arial Black" <?php if( $men_text_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
						<option	value="Arial Narrow" <?php if( $men_text_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
						<option	value="Avant Garde" <?php if( $men_text_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>										
						<option	value="Calibri" <?php if( $men_text_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>										
						<option	value="Candara" <?php if( $men_text_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>										
						<option	value="Century Gothic" <?php if( $men_text_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
						<option	value="Comic Sans MS" <?php if( $men_text_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>										
						<option	value="Franklin Gothic Medium" <?php if( $men_text_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
						<option	value="Futura" <?php if( $men_text_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
						<option	value="Geneva" <?php if( $men_text_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
						<option	value="Gill Sans" <?php if( $men_text_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
						<option value="Helvetica" <?php if( $men_text_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
						<option value="Impact" <?php if( $men_text_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
						<option value="Lucida Grande" <?php if( $men_text_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
						<option value="Lucida Sans Unicode" <?php if( $men_text_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>												
						<option value="Optima" <?php if( $men_text_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
						<option value="Segoe UI" <?php if( $men_text_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
						<option value="Tahoma" <?php if( $men_text_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
						<option value="Trebuchet MS" <?php if( $men_text_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
						<option value="Verdana" <?php if( $men_text_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
						<option style="background-color: #ddd;" title="Generic Font Family" value="Serif" <?php if( $men_text_font == "Serif" ){ echo ' selected'; } ?>>SERIF</option>										
						<option	value="Baskerville" <?php if( $men_text_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
						<option	value="Big Caslon" <?php if( $men_text_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
						<option	value="Bodoni MT" <?php if( $men_text_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
						<option	value="Book Antiqua" <?php if( $men_text_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
						<option	value="Calisto MT" <?php if( $men_text_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
						<option	value="Cambria" <?php if( $men_text_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
						<option	value="Didot" <?php if( $men_text_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
						<option	value="Garamond" <?php if( $men_text_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
						<option	value="Georgia" <?php if( $men_text_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
						<option	value="Goudy Old Style" <?php if( $men_text_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
						<option	value="Hoefler Text" <?php if( $men_text_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
						<option	value="Lucida Bright" <?php if( $men_text_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
						<option	value="Palatino" <?php if( $men_text_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
						<option	value="Palatino Linotype" <?php if( $men_text_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>										
						<option	value="Perpetua" <?php if( $men_text_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
						<option	value="Rockwell" <?php if( $men_text_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
						<option	value="Rockwell Extra Bold" <?php if( $men_text_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
						<option	value="Times New Roman" <?php if( $men_text_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
						<option style="background-color: #ddd;" title="Generic Font Family" value="Monospaced" <?php if( $men_text_font == "Monospaced" ){ echo ' selected'; } ?>>MONOSPACED</option>
						<option value="Andale Mono" <?php if( $men_text_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
						<option value="Consolas" <?php if( $men_text_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
						<option value="Courier New" <?php if( $men_text_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
						<option	value="Lucida Console" <?php if( $men_text_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
						<option	value="Lucida Sans Typewriter" <?php if( $men_text_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
						<option	value="Monaco" <?php if( $men_text_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
						<option style="background-color: #ddd;" title="Generic Font Family" value="Fantasy" <?php if( $men_text_font == "Fantasy" ){ echo ' selected'; } ?>>FANTASY</option>
						<option value="Copperplate" <?php if( $men_text_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
						<option value="Papyrus" <?php if( $men_text_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
						<option style="background-color: #ddd;" title="Generic Font Family" value="Script" <?php if( $men_text_font == "Script" ){ echo ' selected'; } ?>>SCRIPT</option>
						<option value="Brush Script MT" <?php if( $men_text_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>		
					</select>
				</label>
				<label title="Uses a Google Font for Cloud Tags. If filled up this option overrides <span class='green'>Web Safe Font</span>." for="<?=$this->get_field_id('men_google_font'); ?>" style="width: 161px;">
					Google Font
					<input style="width: 161px;"
					id="<?=$this->get_field_id('men_google_font'); ?>"
					name="<?=$this->get_field_name('men_google_font'); ?>" type="text"
					value="<?php echo $men_google_font; ?>" /> 
				</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SPEED & TIME</span>
			<div>
				<div style="margin: 4px 37px 0 0; float: left; padding: 0 1px 1px 1px; border: 1px dotted #aaa; border-radius: 5px;" title="Starting rotation speed, with horizontal and vertical values as an array, e.g. <span class='green'>[0.5,-0.3]</span>. Values are multiplied by <span class='green'>maxSpeed</span>.">
					Initial Speed [x, y]
					<br>
					<select id="<?=$this->get_field_id('men_initial_x'); ?>" name="<?=$this->get_field_name('men_initial_x'); ?>">		
						<?php for($i=-100; $i<101; $i+=5){echo '<option id="meinx_' . $i . '" value="' . $i/100 . '"'; if($men_initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
					</select><select id="<?=$this->get_field_id('men_initial_y'); ?>" name="<?=$this->get_field_name('men_initial_y'); ?>">	
						<?php for($i=-100; $i<101; $i+=5){echo '<option id="meiny_' . $i . '" value="' . $i/100 . '"'; if($men_initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
					</select>
				</div>
				<label style="padding: 5px 40px 0 0;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('men_min_speed'); ?>">
					Min Speed
					<br>
					<select id="<?=$this->get_field_id('men_min_speed'); ?>" name="<?=$this->get_field_name('men_min_speed'); ?>">
						<?php for($i=0; $i<55; $i+=5){echo '<option id="memis_' . $i . '" value="' . $i/1000 . '"'; if($men_min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>	
				<label style="padding: 5px 1px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed." for="<?=$this->get_field_id('men_max_speed'); ?>">
					Max Speed
					<br>
					<select id="<?=$this->get_field_id('men_max_speed'); ?>" name="<?=$this->get_field_name('men_max_speed'); ?>">
						<?php for($i=5; $i<105; $i+=5){echo '<option id="memas_' . $i . '" value="' . $i/1000 . '"'; if($men_max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>
				<div class="thin-spacer"></div>
				<label title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('men_click_to_front'); ?>">
					Click to Front
					<br>
					<select id="<?=$this->get_field_id('men_click_to_front'); ?>" name="<?=$this->get_field_name('men_click_to_front'); ?>">
						<option id="mectf_0" value="null" <?php if( $men_click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
						<?php for($i=500; $i<2500; $i+=500){echo '<option id="mectf_' . $i . '" value="' . $i . '"'; if($men_click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>msec
				</label>
			</div>
		</div>	
	</div>