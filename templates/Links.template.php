<?php 
/*
3D WP Tag Cloud: Links CP Template
*/
?>
	<div class="section_content">
		<div style="float: left;">
			<span style="padding-bottom: 5px;">GENERAL</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 15px 0 0;" title="The shape of the cloud" for="<?=$this->get_field_id('lin_shape'); ?>">
					Shape
					<br>
					<select id="<?=$this->get_field_id('lin_shape'); ?>" name="<?=$this->get_field_name('lin_shape'); ?>">
						<option value="sphere" <?php if( $lin_shape == "sphere" ){ echo ' selected'; } ?>>sphere</option>
						<option value="hcylinder" <?php if( $lin_shape == "hcylinder" ){ echo ' selected'; } ?>>hcylinder</option>
						<option value="vcylinder" <?php if( $lin_shape == "vcylinder" ){ echo ' selected'; } ?>>vcylinder</option>
						<option value="hring" <?php if( $lin_shape == "hring" ){ echo ' selected'; } ?>>hring</option>
						<option value="vring" <?php if( $lin_shape == "vring" ){ echo ' selected'; } ?>>vring</option>
					</select>
				</label>
				<label style="max-width: 175px; margin: 0 15px 0 0;" title="Links Category to be displayed." for="<?=$this->get_field_id('all_links_category'); ?>">
				Links Category 
				<br>
				<select style="max-width: 175px;" id="<?=$this->get_field_id('all_links_category'); ?>" name="<?=$this->get_field_name('all_links_category'); ?>">
					<option value="" <?php if( $all_links_category == ""){ echo ' selected'; } ?>>all</option>
					<?php
						$terms_link = get_terms("link_category");
						 if ( !empty( $terms_link ) && !is_wp_error( $terms_link ) ){
							 foreach ( $terms_link as $term ) {
								echo "<option value='" . $term->term_id . "'";
								if( $all_links_category == $term->term_id ) { echo " selected" ; };
								echo ">" . $term->name . "</option>";
							 }
						 }
					?>						
				</select>
				</label>
				<label title="Number of links to display" for="<?=$this->get_field_id('all_links_limit'); ?>">
					Number 
					<br> 							
					<select id="<?=$this->get_field_id('all_links_limit'); ?>" name="<?=$this->get_field_name('all_links_limit'); ?>">
						<?php 
							for($i=5; $i<105; $i+=5){
								echo '<option id="all_' . $i . '" value="' . $i . '"'; if($all_links_limit==$i){echo ' selected';}; echo '>' . $i . '</option>'; 
							} 
							echo '<option id="all_105"'; if($all_links_limit=='-1'){echo ' selected';}; echo ' value="-1">all</option>';
						?>
					</select>
				</label>  
				<div class="thick-spacer"></div>
				<div style="float: left; margin: 0 21px 0 0;" title="Switches on/off weighting of tags. Setting <span class='green'>off</span> overrides <span class='green'>Weight Mode</span>.">
					Weight<br>
						<input class="radio" id="<?=$this->get_field_id('lin_weight'); ?>"
						name="<?=$this->get_field_name('lin_weight'); ?>" type="radio" value="true"
						<?php if( $lin_weight == "true" ){ echo ' checked="checked"'; } ?>>on
						
						<input class="radio" id="<?=$this->get_field_id('lin_weight'); ?>"
						name="<?=$this->get_field_name('lin_weight'); ?>" type="radio" value="false"
						<?php if( $lin_weight == "false" ){ echo ' checked="checked"'; } ?>>off 
				</div>
				<label style="float: left; margin: 0 21px 0 0;" title="Method to use for displaying tag weights" for="<?=$this->get_field_id('lin_weight_mode'); ?>">
					Weight Mode
					<br>
					<select id="<?=$this->get_field_id('lin_weight_mode'); ?>" name="<?=$this->get_field_name('lin_weight_mode'); ?>">
						<option value="size" <?php if( $lin_weight_mode == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="color" <?php if( $lin_weight_mode == "color" ){ echo ' selected'; } ?>>color</option>
						<option value="both" <?php if( $lin_weight_mode == "both" ){ echo ' selected'; } ?>>size & color</option>
						<option value="bgcolor" <?php if( $lin_weight_mode == "hring" ){ echo ' selected'; } ?>>bgcolor</option>
						<option value="bgoutline" <?php if( $lin_weight_mode == "bgoutline" ){ echo ' selected'; } ?>>bgoutline</option>
					</select>
				</label>
				<label title="Multiplier for adjusting the size of tags when using a weight mode of <span class='green'>size</span> or <span class='green'>size & color</span>." for="<?=$this->get_field_id('lin_weight_size'); ?>">
					Weight Factor
					<br>
					<select id="<?=$this->get_field_id('lin_weight_size'); ?>" name="<?=$this->get_field_name('lin_weight_size'); ?>">
						<?php for($i=50; $i<505; $i+=5){echo '<option id="liws_' . $i . '" value="' . $i/100 . '"'; if($lin_weight_size==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>	
					</select>
				</label>
				<div class="thick-spacer"></div>
				<label style="margin: 0 12px 0 0;" title="Type of highlight to use" for="<?=$this->get_field_id('lin_outline_method'); ?>">
					Outline<br>Method
					<br>
					<select id="<?=$this->get_field_id('lin_outline_method'); ?>" name="<?=$this->get_field_name('lin_outline_method'); ?>">
						<option value="outline" <?php if( $lin_outline_method == "outline" ){ echo ' selected'; } ?>>outline</option>
						<option value="classic" <?php if( $lin_outline_method == "classic" ){ echo ' selected'; } ?>>classic</option>
						<option value="block" <?php if( $lin_outline_method == "block" ){ echo ' selected'; } ?>>block</option>
						<option value="color" <?php if( $lin_outline_method == "hring" ){ echo ' selected'; } ?>>color</option>
						<option value="size" <?php if( $lin_outline_method == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="none" <?php if( $lin_outline_method == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<div style="float: left; margin: 0 12px 0 0;" title="When enabled, cloud moves when dragged instead of based on mouse position.">
					Drag<br>Control
					<div>
						<input class="radio" id="<?=$this->get_field_id('lin_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('lin_drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $lin_drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('lin_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('lin_drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $lin_drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<label style="margin: 0 12px 0 0;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('lin_brightness'); ?>">
					Min<br>Opacity
					<br>
					<select id="<?=$this->get_field_id('lin_brightness'); ?>" name="<?=$this->get_field_name('lin_brightness'); ?>">
						<?php for($i=0; $i<105; $i+=5){echo '<option id="limb_' . $i . '" value="' . $i/100 . '"'; if($lin_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>					
					</select>
				</label> 
				<label style="margin: 0 12px 0 0;" title="Pulsate outline to this opacity. Choose <span class='green'>1.0</span> for no pulsation." for="<?=$this->get_field_id('lin_pulsate_to'); ?>">
					Pulsate<br>to Opacity
					<br>
					<select id="<?=$this->get_field_id('lin_pulsate_to'); ?>" name="<?=$this->get_field_name('lin_pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="lipus_' . $i . '" value="' . $i/10 . '"'; if($lin_pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
				<label for="<?=$this->get_field_id('lin_lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - prevents the cloud rotating in response to the mouse - the cloud will only move if the <span class='green'>initial</span> option is used to give it a starting speed;<br><span class='green'>none</span> - leaves the cloud unlocked.">
					Lock<br>Rotation
					<br>
					<select id="<?=$this->get_field_id('lin_lock'); ?>" name="<?=$this->get_field_name('lin_lock'); ?>">
						<option value="x" <?php if( $lin_lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
						<option value="y" <?php if( $lin_lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
						<option value="xy" <?php if( $lin_lock == "xy" ){ echo ' selected'; } ?>>both</option>
						<option value="none" <?php if( $lin_lock == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<label style="width: 100%;" for="<?=$this->get_field_id('lin_tooltip'); ?>" title="Sets your canvas tooltip. For instance if the cloud allows <span class='green'>Drag Control</span> you can suggest your site visitors to 'Drag or Click'.">
				Tooltip
				<div>
					<input style="width: 100%;" id="<?=$this->get_field_id('lin_tooltip'); ?>"
					name="<?=$this->get_field_name('lin_tooltip'); ?>" type="text"
					value="<?php echo $lin_tooltip; ?>" />
				</div> 
				</label>
				<label style="float: left; width: 100%; padding: 5px 0 0;" title="URL of an image to be used for Cloud Background. Consider Widget's <span class='green'>Width</span> and <span class='green'>Height</span>." for="<?=$this->get_field_id('lin_img_url'); ?>">
					Background Image
					<input style="width: 100%;"
					id="<?=$this->get_field_id('lin_img_url'); ?>"
					name="<?=$this->get_field_name('lin_img_url'); ?>" type="text"
					value="<?php echo $lin_img_url; ?>" /> 
				</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SIZES</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 33px 0 0;" title="Minimal font size when weighted sizing is enabled." for="<?=$this->get_field_id('lin_weightsizemin'); ?>">
					Weight Size Min
					<br>
					<select id="<?=$this->get_field_id('lin_weightsizemin'); ?>" name="<?=$this->get_field_name('lin_weightsizemin'); ?>">
						<?php for($i=6; $i<17; $i++){echo '<option id="liwsmi_' . $i . '" value="' . $i . '"'; if($lin_weightsizemin==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<label style="margin: 0 33px 0 0;" title="Maximal font size when weighted sizing is enabled." for="<?=$this->get_field_id('lin_weightsizemax'); ?>">
					Weight Size Max
					<br>
					<select id="<?=$this->get_field_id('lin_weightsizemax'); ?>" name="<?=$this->get_field_name('lin_weightsizemax'); ?>">
						<?php for($i=18; $i<33; $i++){echo '<option id="liwsm_' . $i . '" value="' . $i . '"'; if($lin_weightsizemax==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<div class="thick-spacer"></div>
				<label style="width: 86px;" title="Initial size of cloud from centre to sides." for="<?=$this->get_field_id('lin_radius_x'); ?>">
					Radius X 
					<br>
					<select id="<?=$this->get_field_id('lin_radius_x'); ?>" name="<?=$this->get_field_name('lin_radius_x'); ?>">
						<?php for($i=10; $i<1005; $i+=5){echo '<option id="lirx_' . $i . '" value="' . $i/100 . '"'; if($lin_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to top and bottom." for="<?=$this->get_field_id('lin_radius_y'); ?>">
					Radius Y 
					<br>
					<select id="<?=$this->get_field_id('lin_radius_y'); ?>" name="<?=$this->get_field_name('lin_radius_y'); ?>">
						<?php for($i=10; $i<1005; $i+=5){echo '<option id="liry_' . $i . '" value="' . $i/100 . '"'; if($lin_radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to front and back." for="<?=$this->get_field_id('lin_radius_z'); ?>">
					Radius Z 
					<br>
					<select id="<?=$this->get_field_id('lin_radius_z'); ?>" name="<?=$this->get_field_name('lin_radius_z'); ?>">
						<?php for($i=10; $i<1005; $i+=5){echo '<option id="lirz_' . $i . '" value="' . $i/100 . '"'; if($lin_radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label> 
					<label style="width: 70px;" title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are automatically broken at line break tags." for="<?=$this->get_field_id('lin_split_width'); ?>">
						Split Width
						<br>
						<select id="<?=$this->get_field_id('lin_split_width'); ?>" name="<?=$this->get_field_name('lin_split_width'); ?>">						
							<?php for($i=50; $i<155; $i+=5){echo '<option id="lispw_' . $i . '" value="' . $i . '"'; if($lin_split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
						</select>px
					</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">MIXED IMAGE & TEXT</span>
			<br>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 25px 0 0;" title="What to display when tag contains images and text:<br><span class='green'>null</span> - Image if present, otherwise text;<br><span class='green'>image</span> - Image tags only;<br><span class='green'>text</span> - Text tags only;<br><span class='green'>both</span> - Image and text on tag using <span class='green'>Image Position</span>." for="<?=$this->get_field_id('lin_image_mode'); ?>">
					<br>
					Tag Mode
					<br>
					<select id="<?=$this->get_field_id('lin_image_mode'); ?>" name="<?=$this->get_field_name('lin_image_mode'); ?>">
						<option value="" <?php if( $lin_image_mode == "" ){ echo ' selected'; } ?>>null</option>
						<option value="image" <?php if( $lin_image_mode == "image" ){ echo ' selected'; } ?>>image</option>
						<option value="text" <?php if( $lin_image_mode == "text" ){ echo ' selected'; } ?>>text</option>
						<option value="both" <?php if( $lin_image_mode == "both" ){ echo ' selected'; } ?>>both</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Position of image relative to text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('lin_image_position'); ?>">
					Image<br>Position
					<br>
					<select id="<?=$this->get_field_id('lin_image_position'); ?>" name="<?=$this->get_field_name('lin_image_position'); ?>">
						<option value="left" <?php if( $lin_image_position == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="right" <?php if( $lin_image_position == "right" ){ echo ' selected'; } ?>>right</option>
						<option value="top" <?php if( $lin_image_position == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="bottom" <?php if( $lin_image_position == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Distance between image and text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('lin_image_padding'); ?>">
					Image<br>Padding
					<br>
					<select id="<?=$this->get_field_id('lin_image_padding'); ?>" name="<?=$this->get_field_name('lin_image_padding'); ?>">	
						<?php for($i=1; $i<6; $i++){echo '<option id="liimpa_' . $i . '" value="' . $i . '"'; if($lin_image_padding==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
				<label title="Amount to scale images by. The value of <span class='green'>1.0</span> refers to image size 96x96px." for="<?=$this->get_field_id('lin_image_scale'); ?>">
					<br>
					Image Scale
					<br>
					<select id="<?=$this->get_field_id('lin_image_scale'); ?>" name="<?=$this->get_field_name('lin_image_scale'); ?>">
						<?php for($i=25; $i<1525; $i+=25){echo '<option id="liims_' . $i . '" value="' . $i/1000 . '"'; if($lin_image_scale==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>					
					</select>
				</label>
			</div>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 20px 0 0;" title="Horizontal image alignment" for="<?=$this->get_field_id('lin_image_align'); ?>">
					Horizontal<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('lin_image_align'); ?>" name="<?=$this->get_field_name('lin_image_align'); ?>">
						<option value="left" <?php if( $lin_image_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $lin_image_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $lin_image_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Vertical image alignment" for="<?=$this->get_field_id('lin_image_valign'); ?>">
					Vertical<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('lin_image_valign'); ?>" name="<?=$this->get_field_name('lin_image_valign'); ?>">
						<option value="top" <?php if( $lin_image_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $lin_image_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $lin_image_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Horizontal text alignment" for="<?=$this->get_field_id('lin_text_align'); ?>">
					Horizontal<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('lin_text_align'); ?>" name="<?=$this->get_field_name('lin_text_align'); ?>">
						<option value="left" <?php if( $lin_text_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $lin_text_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $lin_text_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label title="Vertical text alignment" for="<?=$this->get_field_id('lin_text_valign'); ?>">
					Vertical<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('lin_text_valign'); ?>" name="<?=$this->get_field_name('lin_text_valign'); ?>">
						<option value="top" <?php if( $lin_text_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $lin_text_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $lin_text_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left; height: 137px;">
			<span style="padding-bottom: 5px;">COLORS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('lin_text_color'); ?>">
					Tag Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the tag text - empty string to use the color of the original link" 
						class="colors" id="<?=$this->get_field_id('lin_text_color'); ?>"
						name="<?=$this->get_field_name('lin_text_color'); ?>" type="text"
						value="<?php echo $lin_text_color; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($lin_text_color != '') {echo '<span class="color" style="color: #' . $lin_text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('lin_bg_color'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of tags - empty option means no background. The string <span class='green'>'tag'</span> means use the original link background color."
						class="colors" id="<?=$this->get_field_id('lin_bg_color'); ?>"
						name="<?=$this->get_field_name('lin_bg_color'); ?>" type="text"
						value="<?php echo $lin_bg_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_bg_color != '' && $lin_bg_color != 'tag') {echo '<span class="color" style="color: #' . $lin_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($lin_bg_color == 'tag'){echo '<span class="color" style="padding: 0 0 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('lin_bg_outline'); ?>">
					Border
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of tag border. Use empty option for the same as the text color, use <span class='green'>'tag'</span> for the original link text color."
						class="colors" id="<?=$this->get_field_id('lin_bg_outline'); ?>"
						name="<?=$this->get_field_name('lin_bg_outline'); ?>" type="text"
						value="<?php echo $lin_bg_outline; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_bg_outline != '') {echo '<span class="color" style="color: #' . $lin_bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('lin_shadow'); ?>">
					Shadow
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the shadow behind each tag"
						class="colors" id="<?=$this->get_field_id('lin_shadow'); ?>"
						name="<?=$this->get_field_name('lin_shadow'); ?>" type="text"
						value="<?php echo $lin_shadow; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_shadow != '') {echo '<span class="color" style="color: #' . $lin_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>								
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('lin_outline_color'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0;">
						<input title="Color of the active tag highlight"
						class="colors" id="<?=$this->get_field_id('lin_outline_color'); ?>"
						name="<?=$this->get_field_name('lin_outline_color'); ?>" type="text"
						value="<?php echo $lin_outline_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_outline_color != '') {echo '<span class="color" style="color: #' . $lin_outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<div class="gradient-div">	
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('lin_weight_gradient_1'); ?>">
						Gradient<br>Color: 0
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('lin_weight_gradient_1'); ?>"
							name="<?=$this->get_field_name('lin_weight_gradient_1'); ?>" type="text"
							value="<?php echo $lin_weight_gradient_1 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_weight_gradient_1 != '') {echo '<span class="color" style="color: #' . $lin_weight_gradient_1 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('lin_weight_gradient_2'); ?>">
						Gradient<br>Color: 0.33
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('lin_weight_gradient_2'); ?>"
							name="<?=$this->get_field_name('lin_weight_gradient_2'); ?>" type="text"
							value="<?php echo $lin_weight_gradient_2 ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($lin_weight_gradient_2 != '') {echo '<span class="color" style="color: #' . $lin_weight_gradient_2 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('lin_weight_gradient_3'); ?>">
						Gradient<br>Color: 0.67
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('lin_weight_gradient_3'); ?>"
							name="<?=$this->get_field_name('lin_weight_gradient_3'); ?>" type="text"
							value="<?php echo $lin_weight_gradient_3 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_weight_gradient_3 != '') {echo '<span class="color" style="color: #' . $lin_weight_gradient_3 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('lin_weight_gradient_4'); ?>">
						Gradient<br>Color: 1
						<br>
						<span class="hash">#</span>
						<div class="siwraper" style="margin: 0;">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('lin_weight_gradient_4'); ?>"
							name="<?=$this->get_field_name('lin_weight_gradient_4'); ?>" type="text"
							value="<?php echo $lin_weight_gradient_4 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($lin_weight_gradient_4 != '') {echo '<span class="color" style="color: #' . $lin_weight_gradient_4 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="padding: 15px 0 0 8px; text-align: center;">
						<a style="color:#1e8cbe; font-weight: bold;" href="http://www.goat1000.com/tagcanvas-weighted.php" target="_blank">Gradient<br>Examples</a>
					</label>
				</div>
			</div>
		</div>		
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">FONTS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 15px 0 0;" title="Height of the tag text font" for="<?=$this->get_field_id('lin_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('lin_fontsize'); ?>" name="<?=$this->get_field_name('lin_fontsize'); ?>">
						<?php for($i=6; $i<31; $i++){echo '<option id="lifs_' . $i . '" value="' . $i . '"'; if($lin_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
				<div style="float: left; margin: 0 15px 0 0;" title="Border of the tags">
					<div>
						Border
					</div>
					<div  style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('lin_borderwidth'); ?>"
						name="<?=$this->get_field_name('lin_borderwidth'); ?>" type="radio" value="1"
						<?php if( $lin_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('lin_borderwidth'); ?>"
						name="<?=$this->get_field_name('lin_borderwidth'); ?>" type="radio" value="0"
						<?php if( $lin_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="float: left; margin: 0 15px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
					Shadow Offset [x, y]
					<br>
					<select id="<?=$this->get_field_id('lin_shadowoff_x'); ?>" name="<?=$this->get_field_name('lin_shadowoff_x'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="lisox_' . $i . '" value="' . $i . '"'; if($lin_shadowoff_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px<select id="<?=$this->get_field_id('lin_shadowoff_y'); ?>" name="<?=$this->get_field_name('lin_shadowoff_y'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="lisoy_' . $i . '" value="' . $i . '"'; if($lin_shadowoff_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px
				</div>
				<label title="Shadow behind each Menu tag" for="<?=$this->get_field_id('lin_shadowblur'); ?>">
					Shadow Blur
					<br>
					<select id="<?=$this->get_field_id('lin_shadowblur'); ?>" name="<?=$this->get_field_name('lin_shadowblur'); ?>">
						<?php for($i=0; $i<6; $i++){echo '<option id="lishb_' . $i . '" value="' . $i . '"'; if($lin_shadowblur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>												
					</select>px
				</label>
				<div class="thin-spacer"></div>
				<label title="48 Web Safe Fonts for the tag text" for="<?=$this->get_field_id('cat_text_font'); ?>">
					Web Safe Font
					<br>
					<select class="special_m" id="<?=$this->get_field_id('lin_text_font'); ?>" name="<?=$this->get_field_name('lin_text_font'); ?>">
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial" <?php if( $lin_text_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Black" <?php if( $lin_text_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Narrow" <?php if( $lin_text_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Avant Garde" <?php if( $lin_text_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Calibri" <?php if( $lin_text_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Candara" <?php if( $lin_text_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Century Gothic" <?php if( $lin_text_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Comic Sans MS" <?php if( $lin_text_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Franklin Gothic Medium" <?php if( $lin_text_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Futura" <?php if( $lin_text_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Geneva" <?php if( $lin_text_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Gill Sans" <?php if( $lin_text_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Helvetica" <?php if( $lin_text_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Impact" <?php if( $lin_text_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Grande" <?php if( $lin_text_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Sans Unicode" <?php if( $lin_text_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>												
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Optima" <?php if( $lin_text_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Segoe UI" <?php if( $lin_text_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Tahoma" <?php if( $lin_text_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Trebuchet MS" <?php if( $lin_text_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
						<option style="background: #f1f1f1;" title="Serif Family" value="Verdana" <?php if( $lin_text_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
						<option title="Serif Family" value="Baskerville" <?php if( $lin_text_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
						<option title="Serif Family" value="Big Caslon" <?php if( $lin_text_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
						<option title="Serif Family" value="Bodoni MT" <?php if( $lin_text_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
						<option title="Serif Family" value="Book Antiqua" <?php if( $lin_text_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
						<option title="Serif Family" value="Calisto MT" <?php if( $lin_text_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
						<option title="Serif Family" value="Cambria" <?php if( $lin_text_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
						<option title="Serif Family" value="Didot" <?php if( $lin_text_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
						<option title="Serif Family" value="Garamond" <?php if( $lin_text_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
						<option title="Serif Family" value="Georgia" <?php if( $lin_text_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
						<option title="Serif Family" value="Goudy Old Style" <?php if( $lin_text_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
						<option title="Serif Family" value="Hoefler Text" <?php if( $lin_text_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
						<option title="Serif Family" value="Lucida Bright" <?php if( $lin_text_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
						<option title="Serif Family" value="Palatino" <?php if( $lin_text_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
						<option title="Serif Family" value="Palatino Linotype" <?php if( $lin_text_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>										
						<option title="Serif Family" value="Perpetua" <?php if( $lin_text_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
						<option title="Serif Family" value="Rockwell" <?php if( $lin_text_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
						<option title="Serif Family" value="Rockwell Extra Bold" <?php if( $lin_text_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
						<option title="Serif Family" title="Monospaced Family" value="Times New Roman" <?php if( $lin_text_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Andale Mono" <?php if( $lin_text_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Consolas" <?php if( $lin_text_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Courier New" <?php if( $lin_text_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Console" <?php if( $lin_text_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Sans Typewriter" <?php if( $lin_text_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Monaco" <?php if( $lin_text_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
						<option title="Fantasy Family" value="Copperplate" <?php if( $lin_text_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
						<option title="Fantasy Family" value="Papyrus" <?php if( $lin_text_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
						<option style="background: #f1f1f1;" title="Script Family" value="Brush Script MT" <?php if( $lin_text_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>		
					</select>
				</label>
				<label style="width: 175px;" title="<?= count($items) ?> Google Fonts for the tag text. Selected one overrides <span class='green'>Web Safe Font</span>." for="<?=$this->get_field_id('lin_google_font'); ?>">
					Google Font
					<br>
					<select id="<?=$this->get_field_id('lin_google_font'); ?>" name="<?=$this->get_field_name('lin_google_font'); ?>">
						<option value="" <?php if($lin_google_font == ''){echo ' selected';} ?>></option>
<?php
						foreach ($items as $font){
							echo '<option value="'.$font->{'family'}.'"';			
								if ($lin_google_font == $font->{'family'}) {echo 'selected'; };
							echo '>'.$font->{'family'}.'</option>';
						}
 ?>
					</select>
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
					<select id="<?=$this->get_field_id('lin_initial_x'); ?>" name="<?=$this->get_field_name('lin_initial_x'); ?>">
						<?php for($i=-100; $i<101; $i+=5){echo '<option id="liinx_' . $i . '" value="' . $i/100 . '"'; if($lin_initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
					</select><select id="<?=$this->get_field_id('lin_initial_y'); ?>" name="<?=$this->get_field_name('lin_initial_y'); ?>">	
						<?php for($i=-100; $i<101; $i+=5){echo '<option id="liiny_' . $i . '" value="' . $i/100 . '"'; if($lin_initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
					</select>
				</div>
				<label style="padding: 5px 40px 0 0;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('lin_min_speed'); ?>">
					Min Speed
					<br>
					<select id="<?=$this->get_field_id('lin_min_speed'); ?>" name="<?=$this->get_field_name('lin_min_speed'); ?>">
						<?php for($i=0; $i<55; $i+=5){echo '<option id="limis_' . $i . '" value="' . $i/1000 . '"'; if($lin_min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>	
				<label style="padding: 5px 1px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed." for="<?=$this->get_field_id('lin_max_speed'); ?>">
					Max Speed
					<br>
					<select id="<?=$this->get_field_id('lin_max_speed'); ?>" name="<?=$this->get_field_name('lin_max_speed'); ?>">
						<?php for($i=5; $i<105; $i+=5){echo '<option id="limas_' . $i . '" value="' . $i/1000 . '"'; if($lin_max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>
				<div class="thin-spacer"></div>
				<label title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('lin_click_to_front'); ?>">
					Click to Front
					<br>
					<select id="<?=$this->get_field_id('lin_click_to_front'); ?>" name="<?=$this->get_field_name('lin_click_to_front'); ?>">
						<option id="lictf_0" value="null" <?php if( $lin_click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
						<?php for($i=500; $i<2500; $i+=500){echo '<option id="lictf_' . $i . '" value="' . $i . '"'; if($lin_click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>msec
				</label>
			</div>
		</div>	
	</div>