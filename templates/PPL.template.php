<?php 
/*
3D WP Tag Cloud: Page/Post Links CP Template
*/
?>
	<div class="section_content">
		<div style="float: left;">
			<span style="padding-bottom: 5px;">GENERAL</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 12px 0 0;" title="Cloud shapes Legend:<br><span class='color' style='padding: 0; border: 1px solid #444; 
					font-size: 10px; color: #fff;'>██</span> 3D Shape, <span class='color' style='padding: 0; border: 1px solid #444; font-size: 10px; 
					color: #ccc;'>██</span> 2D Shape, <span class='color' style='padding: 0; border: 1px solid #444; font-size: 10px; color: #aaa;'>██</span> 
					1D Shape, <b style='font-size: 26px; line-height: 5px; position: relative; top: 10px;'>*</b> Specific set of tag numbers required.
					<br>See <span style='font-weight: bold; color: #dc143c;'>GUIDE & TIPS</span> > 
					<span style='font-weight: bold; color: #444;'>Shape Tips</span> for advices on selection." 
					for="<?=$this->get_field_id('ppl_shape'); ?>">
					Shape
					<br>
					<select id="<?=$this->get_field_id('ppl_shape'); ?>" name="<?=$this->get_field_name('ppl_shape'); ?>" onchange="check43d(this.id, this.value, '<?= $this->get_field_id('ppl_radius_z'); ?>', '', 'ppl')";>
						<option value="axes" <?php if( $ppl_shape == "axes" ){ echo ' selected'; } ?>>Axes</option>
						<option value="balls" <?php if( $ppl_shape == "balls" ){ echo ' selected'; } ?>>Balls</option>
						<option value="blossom" <?php if( $ppl_shape == "blossom" ){ echo ' selected'; } ?>>Blossom</option>
						<option value="bulb" <?php if( $ppl_shape == "bulb" ){ echo ' selected'; } ?>>Bulb</option>
						<option value="candy" <?php if( $ppl_shape == "candy" ){ echo ' selected'; } ?>>Candy</option>
						<option value="capsule" <?php if( $ppl_shape == "capsule" ){ echo ' selected'; } ?>>Capsule</option>
						<option value="crown" <?php if( $ppl_shape == "crown" ){ echo ' selected'; } ?>>Crown</option>
						<option value="domes" <?php if( $ppl_shape == "domes" ){ echo ' selected'; } ?>>Domes</option>
						<option value="egg" <?php if( $ppl_shape == "egg" ){ echo ' selected'; } ?>>Egg</option>
						<option value="fir" <?php if( $ppl_shape == "fir" ){ echo ' selected'; } ?>>Chrismas Fir*</option>
						<option value="cube" <?php if( $ppl_shape == "cube" ){ echo ' selected'; } ?>>Cube*</option>
						<option value="glass" <?php if( $ppl_shape == "glass" ){ echo ' selected'; } ?>>Glass</option>
						<option value="globe" <?php if( $ppl_shape == "globe" ){ echo ' selected'; } ?>>Globe of Rings</option>
						<option value="hcylinder" <?php if( $ppl_shape == "hcylinder" ){ echo ' selected'; } ?>>Horisontal Cylinder</option>
						<option value="knot" <?php if( $ppl_shape == "knot" ){ echo ' selected'; } ?>>Knot</option>
						<option value="lemon" <?php if( $ppl_shape == "lemon" ){ echo ' selected'; } ?>>Lemon</option>
						<option value="love" <?php if( $ppl_shape == "love" ){ echo ' selected'; } ?>>Love</option>
						<option value="antenna" <?php if( $ppl_shape == "antenna" ){ echo ' selected'; } ?>>Parabolic Antenna*</option>
						<option value="hcones" <?php if( $ppl_shape == "hcones" ){ echo ' selected'; } ?>>Peg top around X-axis*</option>
						<option value="vcones" <?php if( $ppl_shape == "vcones" ){ echo ' selected'; } ?>>Peg top around Y-axis*</option>
						<option value="hring" <?php if( $ppl_shape == "hring" ){ echo ' selected'; } ?>>Ring around X-axis</option>
						<option value="vring" <?php if( $ppl_shape == "vring" ){ echo ' selected'; } ?>>Ring around Y-axis</option>
						<option value="rings" <?php if( $ppl_shape == "rings" ){ echo ' selected'; } ?>>Rings Knotwork</option>
						<option value="roller" <?php if( $ppl_shape == "roller" ){ echo ' selected'; } ?>>Roller of rings</option>
						<option value="sandglass" <?php if( $ppl_shape == "sandglass" ){ echo ' selected'; } ?>>Sandglass</option>
						<option value="saturn" <?php if( $ppl_shape == "saturn" ){ echo ' selected'; } ?>>Saturn</option>
						<option value="sphere" <?php if( $ppl_shape == "sphere" ){ echo ' selected'; } ?>>Sphere</option>
						<option value="spiral3" <?php if( $ppl_shape == "spiral3" ){ echo ' selected'; } ?>>Spring</option>
						<option value="stairs" <?php if( $ppl_shape == "stairs" ){ echo ' selected'; } ?>>Staircase</option>
						<option value="stool" <?php if( $ppl_shape == "stool" ){ echo ' selected'; } ?>>Stool</option>
						<option value="pyramid" <?php if( $ppl_shape == "pyramid" ){ echo ' selected'; } ?>>Tetrahedron (Triangle Pyramid)*</option>
						<option value="tire" <?php if( $ppl_shape == "tire" ){ echo ' selected'; } ?>>Tire</option>
						<option value="tower" <?php if( $ppl_shape == "tower" ){ echo ' selected'; } ?>>Tower of rings</option>
						<option value="vcylinder" <?php if( $ppl_shape == "vcylinder" ){ echo ' selected'; } ?>>Vertical Cylinder</option>
						<option style="background: #ccc;" value="circles" <?php if( $ppl_shape == "circles" ){ echo ' selected'; } ?>>Concentric Circles*</option>
						<option style="background: #ccc;" value="heart" <?php if( $ppl_shape == "heart" ){ echo ' selected'; } ?>>Heart</option>
						<option style="background: #ccc;" value="hexagon" <?php if( $ppl_shape == "hexagon" ){ echo ' selected'; } ?>>Hexagon (Bee Cell)*</option>
						<option style="background: #ccc;" value="spiral" <?php if( $ppl_shape == "spiral" ){ echo ' selected'; } ?>>Spiral*</option>
						<option style="background: #ccc;" value="square" <?php if( $ppl_shape == "square" ){ echo ' selected'; } ?>>Square*</option>
						<option style="background: #ccc;" value="triangle" <?php if( $ppl_shape == "triangle" ){ echo ' selected'; } ?>>Triangle*</option>
						<option style="background: #aaa;" value="beam" <?php if( $ppl_shape == "beam" ){ echo ' selected'; } ?>>Lighthouse Beam</option>
					</select>
				</label>
				<label style="max-width: 175px;" title="The ID of a custom HTML links container. Leaving empty will load ALL current page/post links, which may include navigation links, meta tags, comments etc." for="<?=$this->get_field_id('all_ppl_id'); ?>">
					Custom Container ID 
					<br>
					<input style="width: 115px; height: 18px; font-size: 12px; line-height: 12px; padding: 2px" id="<?=$this->get_field_id('all_ppl_id'); ?>"
					name="<?=$this->get_field_name('all_ppl_id'); ?>" type="text"
					value="<?php echo $all_ppl_id; ?>" />					
					</select>
				</label>
				<div class="thick-spacer"></div>
				<div style="float: left; margin: 0;" title="The minimum number of tags to show in the cloud. If the number of links available is lower than this value, the list will be repeated. Shapes marked with an asterisk (*) may use the nearest downward value.">
					Min Tags
					<br>
					<select id="<?=$this->get_field_id('ppl_min_tags'); ?>" name="<?=$this->get_field_name('ppl_min_tags'); ?>">
						<?php for($i=0; $i<201; $i++){echo '<option id="ppmint_' . $i . '" value="' . $i . '"'; if($ppl_min_tags==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>
				</div>
				<div class="thick-spacer"></div>
				<label style="margin: 0 12px 0 0;" title="Type of highlight to use" for="<?=$this->get_field_id('ppl_outline_method'); ?>">
					Outline<br>Method
					<br>
					<select id="<?=$this->get_field_id('ppl_outline_method'); ?>" name="<?=$this->get_field_name('ppl_outline_method'); ?>">
						<option value="outline" <?php if( $ppl_outline_method == "outline" ){ echo ' selected'; } ?>>outline</option>
						<option value="classic" <?php if( $ppl_outline_method == "classic" ){ echo ' selected'; } ?>>classic</option>
						<option value="block" <?php if( $ppl_outline_method == "block" ){ echo ' selected'; } ?>>block</option>
						<option value="color" <?php if( $ppl_outline_method == "hring" ){ echo ' selected'; } ?>>color</option>
						<option value="size" <?php if( $ppl_outline_method == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="none" <?php if( $ppl_outline_method == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<div style="float: left; margin: 0 12px 0 0;" title="When enabled, cloud moves when dragged instead of based on mouse position.">
					Drag<br>Control
					<div>
						<input class="radio" id="<?=$this->get_field_id('ppl_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('ppl_drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $ppl_drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('ppl_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('ppl_drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $ppl_drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<label style="margin: 0 12px 0 0;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('ppl_brightness'); ?>">
					Min<br>Opacity
					<br>
					<select id="<?=$this->get_field_id('ppl_brightness'); ?>" name="<?=$this->get_field_name('ppl_brightness'); ?>">
						<?php for($i=0; $i<105; $i+=5){echo '<option id="memb_' . $i . '" value="' . $i/100 . '"'; if($ppl_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>					
					</select>
				</label> 
				<label style="margin: 0 12px 0 0;" title="Pulsate outline to this opacity. Choose <span class='green'>1.0</span> for no pulsation." for="<?=$this->get_field_id('ppl_pulsate_to'); ?>">
					Pulsate<br>to Opacity
					<br>
					<select id="<?=$this->get_field_id('ppl_pulsate_to'); ?>" name="<?=$this->get_field_name('ppl_pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="mepus_' . $i . '" value="' . $i/10 . '"'; if($ppl_pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
				<label for="<?=$this->get_field_id('ppl_lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - locks the cloud in response to the mouse. It will only move if the <span class='green'>initial</span> option gives it a starting speed.<b><br>N.B.</b> Since Z rotation can't be controlled by mouse it will be locked anyway.<br><span class='green'>none</span> - leaves the cloud unlocked.">
					Lock<br>Rotation
					<br>
					<select id="<?=$this->get_field_id('ppl_lock'); ?>" name="<?=$this->get_field_name('ppl_lock'); ?>">
						<option value="x" <?php if( $ppl_lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
						<option value="y" <?php if( $ppl_lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
						<option value="xy" <?php if( $ppl_lock == "xy" ){ echo ' selected'; } ?>>both</option>
						<option value="none" <?php if( $ppl_lock == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<label style="width: 100%;" for="<?=$this->get_field_id('ppl_tooltip'); ?>" title="Sets your canvas tooltip. For instance if the cloud allows <span class='green'>Drag Control</span> you can suggest your site visitors to 'Drag or Click'.">
				Tooltip
				<div>
					<input style="width: 100%;" id="<?=$this->get_field_id('ppl_tooltip'); ?>"
					name="<?=$this->get_field_name('ppl_tooltip'); ?>" type="text"
					value="<?php echo $ppl_tooltip; ?>" />
				</div> 
				</label>
				<label style="float: left; width: 100%; padding: 5px 0 0;" title="URL of an image to be used for Cloud Background. Consider Widget's <span class='green'>Width</span> and <span class='green'>Height</span>." for="<?=$this->get_field_id('ppl_img_url'); ?>">
					Background Image
					<input style="width: 100%;"
					id="<?=$this->get_field_id('ppl_img_url'); ?>"
					name="<?=$this->get_field_name('ppl_img_url'); ?>" type="text"
					value="<?php echo $ppl_img_url; ?>" /> 
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SIZES</span>
			<div style="padding-top: 5px;">
				<label style="width: 86px;" title="Initial size of cloud from centre to sides." for="<?=$this->get_field_id('ppl_radius_x'); ?>">
					Radius X 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_x'); ?>" name="<?=$this->get_field_name('ppl_radius_x'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="merx_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to top and bottom." for="<?=$this->get_field_id('ppl_radius_y'); ?>" >
					Radius Y 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_y'); ?>" name="<?=$this->get_field_name('ppl_radius_y'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="mery_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<div style="width: 86px; float: left;<?php if($ppl_shape == 'spiral'||$ppl_shape == 'hexagon'||$ppl_shape == 'circles'||$ppl_shape == 'beam') {echo ' visibility: hidden;';}; ?>" title="Initial size of cloud from centre to front and back." id="cont_<?=$this->get_field_id('ppl_radius_z'); ?>">
					Radius Z 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_z'); ?>" name="<?=$this->get_field_name('ppl_radius_z'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="merz_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</div> 
				<label style="width: 70px;" title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are automatically broken at line break tags." for="<?=$this->get_field_id('ppl_split_width'); ?>">
					Split Width
					<br>
					<select id="<?=$this->get_field_id('ppl_split_width'); ?>" name="<?=$this->get_field_name('ppl_split_width'); ?>">						
						<?php for($i=50; $i<155; $i+=5){echo '<option id="mespw_' . $i . '" value="' . $i . '"'; if($ppl_split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<div class="thick-spacer"></div>
				<label style="width: 86px;" title="Amount to scale images by. The value of <span class='green'>1.0</span> uses the size of avatars (96x96px)." for="<?=$this->get_field_id('ppl_image_scale'); ?>">
					Image Scale
					<br>
					<select id="<?=$this->get_field_id('ppl_image_scale'); ?>" name="<?=$this->get_field_name('ppl_image_scale'); ?>">
						<?php for($i=25; $i<1525; $i+=25){echo '<option id="autims_' . $i . '" value="' . $i/1000 . '"'; if($ppl_image_scale==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>					
					</select>
				</label>
				<label style="width: 86px;" title="Radius for image corners" for="<?=$this->get_field_id('ppl_image_radius'); ?>">
					Image Radius
					<br>
					<select id="<?=$this->get_field_id('ppl_image_radius'); ?>" name="<?=$this->get_field_name('ppl_image_radius'); ?>">
						<?php for($i=0; $i<62; $i++){echo '<option id="autimr_' . $i . '" value="' . $i . '"'; if($ppl_image_radius==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<div class="thin-spacer"></div>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">MIXED IMAGE & TEXT</span>
			<br>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 25px 0 0;" title="What to display when tag contains images and text:<br><span class='green'>null</span> - Image if present, otherwise text;<br><span class='green'>image</span> - Image tags only;<br><span class='green'>text</span> - Text tags only;<br><span class='green'>both</span> - Image and text on tag using <span class='green'>Image Position</span>." for="<?=$this->get_field_id('ppl_image_mode'); ?>">
					<br>
					Tag Mode
					<br>
					<select id="<?=$this->get_field_id('ppl_image_mode'); ?>" name="<?=$this->get_field_name('ppl_image_mode'); ?>">
						<option value="" <?php if( $ppl_image_mode == "" ){ echo ' selected'; } ?>>null</option>
						<option value="image" <?php if( $ppl_image_mode == "image" ){ echo ' selected'; } ?>>image</option>
						<option value="text" <?php if( $ppl_image_mode == "text" ){ echo ' selected'; } ?>>text</option>
						<option value="both" <?php if( $ppl_image_mode == "both" ){ echo ' selected'; } ?>>both</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Position of image relative to text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('ppl_image_position'); ?>">
					Image<br>Position
					<br>
					<select id="<?=$this->get_field_id('ppl_image_position'); ?>" name="<?=$this->get_field_name('ppl_image_position'); ?>">
						<option value="left" <?php if( $ppl_image_position == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="right" <?php if( $ppl_image_position == "right" ){ echo ' selected'; } ?>>right</option>
						<option value="top" <?php if( $ppl_image_position == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="bottom" <?php if( $ppl_image_position == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Distance between image and text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('ppl_image_padding'); ?>">
					Image<br>Padding
					<br>
					<select id="<?=$this->get_field_id('ppl_image_padding'); ?>" name="<?=$this->get_field_name('ppl_image_padding'); ?>">	
						<?php for($i=1; $i<6; $i++){echo '<option id="ppimpa_' . $i . '" value="' . $i . '"'; if($ppl_image_padding==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
			</div>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 20px 0 0;" title="Horizontal image alignment" for="<?=$this->get_field_id('ppl_image_align'); ?>">
					Horizontal<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('ppl_image_align'); ?>" name="<?=$this->get_field_name('ppl_image_align'); ?>">
						<option value="left" <?php if( $ppl_image_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $ppl_image_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $ppl_image_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Vertical image alignment" for="<?=$this->get_field_id('ppl_image_valign'); ?>">
					Vertical<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('ppl_image_valign'); ?>" name="<?=$this->get_field_name('ppl_image_valign'); ?>">
						<option value="top" <?php if( $ppl_image_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $ppl_image_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $ppl_image_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Horizontal text alignment" for="<?=$this->get_field_id('ppl_text_align'); ?>">
					Horizontal<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('ppl_text_align'); ?>" name="<?=$this->get_field_name('ppl_text_align'); ?>">
						<option value="left" <?php if( $ppl_text_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $ppl_text_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $ppl_text_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label title="Vertical text alignment" for="<?=$this->get_field_id('ppl_text_valign'); ?>">
					Vertical<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('ppl_text_valign'); ?>" name="<?=$this->get_field_name('ppl_text_valign'); ?>">
						<option value="top" <?php if( $ppl_text_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $ppl_text_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $ppl_text_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left; height: 67px;">
			<span style="padding-bottom: 5px;">COLORS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 3px 0 0; height: 30px;" for="<?=$this->get_field_id('ppl_text_color'); ?>">
					Tag Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the tag text - empty string to use the color of the original link" 
						class="colors" id="<?=$this->get_field_id('ppl_text_color'); ?>"
						name="<?=$this->get_field_name('ppl_text_color'); ?>" type="text"
						value="<?php echo $ppl_text_color; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($ppl_text_color != '') {echo '<span class="color" style="color: #' . $ppl_text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_bg_color'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of tags - empty option means no background. The string <span class='green'>'tag'</span> means use the original link background color."
						class="colors" id="<?=$this->get_field_id('ppl_bg_color'); ?>"
						name="<?=$this->get_field_name('ppl_bg_color'); ?>" type="text"
						value="<?php echo $ppl_bg_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_bg_color != '' && $ppl_bg_color != 'tag') {echo '<span class="color" style="color: #' . $ppl_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($ppl_bg_color == 'tag'){echo '<span class="color" style="padding: 0 0 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_bg_outline'); ?>">
					Border
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of tag border. Use empty option for the same as the text color, use <span class='green'>'tag'</span> for the original link text color."
						class="colors" id="<?=$this->get_field_id('ppl_bg_outline'); ?>"
						name="<?=$this->get_field_name('ppl_bg_outline'); ?>" type="text"
						value="<?php echo $ppl_bg_outline; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_bg_outline != '') {echo '<span class="color" style="color: #' . $ppl_bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_shadow'); ?>">
					Shadow
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the shadow behind each tag"
						class="colors" id="<?=$this->get_field_id('ppl_shadow'); ?>"
						name="<?=$this->get_field_name('ppl_shadow'); ?>" type="text"
						value="<?php echo $ppl_shadow; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_shadow != '') {echo '<span class="color" style="color: #' . $ppl_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>								
				<label for="<?=$this->get_field_id('ppl_outline_color'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0;">
						<input title="Color of the active tag highlight"
						class="colors" id="<?=$this->get_field_id('ppl_outline_color'); ?>"
						name="<?=$this->get_field_name('ppl_outline_color'); ?>" type="text"
						value="<?php echo $ppl_outline_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_outline_color != '') {echo '<span class="color" style="color: #' . $ppl_outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
			</div>
		</div>		
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">FONTS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 15px 0 0;" title="Height of the tag text font" for="<?=$this->get_field_id('ppl_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('ppl_fontsize'); ?>" name="<?=$this->get_field_name('ppl_fontsize'); ?>">
						<?php for($i=6; $i<31; $i++){echo '<option id="ppfs_' . $i . '" value="' . $i . '"'; if($ppl_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
				<div style="float: left; margin: 0 15px 0 0;" title="Border of the tags">
					<div>
						Border
					</div>
					<div  style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('ppl_borderwidth'); ?>"
						name="<?=$this->get_field_name('ppl_borderwidth'); ?>" type="radio" value="1"
						<?php if( $ppl_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('ppl_borderwidth'); ?>"
						name="<?=$this->get_field_name('ppl_borderwidth'); ?>" type="radio" value="0"
						<?php if( $ppl_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="float: left; margin: 0 15px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
					Shadow Offset [x, y]
					<br>
					<select id="<?=$this->get_field_id('ppl_shadowoff_x'); ?>" name="<?=$this->get_field_name('ppl_shadowoff_x'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="ppsox_' . $i . '" value="' . $i . '"'; if($ppl_shadowoff_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select><select id="<?=$this->get_field_id('ppl_shadowoff_y'); ?>" name="<?=$this->get_field_name('ppl_shadowoff_y'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="ppsoy_' . $i . '" value="' . $i . '"'; if($ppl_shadowoff_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px
				</div>
				<label style="margin: 0 0 5px;" title="Shadow behind each Menu tag" for="<?=$this->get_field_id('ppl_shadowblur'); ?>">
					Shadow Blur
					<br>
					<select id="<?=$this->get_field_id('ppl_shadowblur'); ?>" name="<?=$this->get_field_name('ppl_shadowblur'); ?>">
						<?php for($i=0; $i<6; $i++){echo '<option id="ppshb_' . $i . '" value="' . $i . '"'; if($ppl_shadowblur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>												
					</select>px
				</label>
				<div class="thin-spacer"></div>
				<label title="48 Web Safe Fonts for the tag text" for="<?=$this->get_field_id('ppl_text_font'); ?>">
					Web Safe Font
					<br>
					<select class="special_m" id="<?=$this->get_field_id('man_text_font'); ?>" name="<?=$this->get_field_name('man_text_font'); ?>">
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial" <?php if( $man_text_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Arial Black" <?php if( $man_text_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Arial Narrow" <?php if( $man_text_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Avant Garde" <?php if( $man_text_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Calibri" <?php if( $man_text_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Candara" <?php if( $man_text_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Century Gothic" <?php if( $man_text_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Comic Sans MS" <?php if( $man_text_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Franklin Gothic Medium" <?php if( $man_text_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Futura" <?php if( $man_text_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Geneva" <?php if( $man_text_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family"	value="Gill Sans" <?php if( $man_text_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Helvetica" <?php if( $man_text_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Impact" <?php if( $man_text_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Grande" <?php if( $man_text_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Sans Unicode" <?php if( $man_text_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>												
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Optima" <?php if( $man_text_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Segoe UI" <?php if( $man_text_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Tahoma" <?php if( $man_text_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Trebuchet MS" <?php if( $man_text_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
						<option style="background: #f1f1f1;" title="Serif Family" value="Verdana" <?php if( $man_text_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
						<option title="Serif Family" value="Baskerville" <?php if( $man_text_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
						<option title="Serif Family" value="Big Caslon" <?php if( $man_text_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
						<option title="Serif Family" value="Bodoni MT" <?php if( $man_text_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
						<option title="Serif Family" value="Book Antiqua" <?php if( $man_text_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
						<option title="Serif Family" value="Calisto MT" <?php if( $man_text_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
						<option title="Serif Family" value="Cambria" <?php if( $man_text_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
						<option title="Serif Family" value="Didot" <?php if( $man_text_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
						<option title="Serif Family" value="Garamond" <?php if( $man_text_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
						<option title="Serif Family" value="Georgia" <?php if( $man_text_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
						<option title="Serif Family" value="Goudy Old Style" <?php if( $man_text_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
						<option title="Serif Family" value="Hoefler Text" <?php if( $man_text_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
						<option title="Serif Family" value="Lucida Bright" <?php if( $man_text_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
						<option title="Serif Family" value="Palatino" <?php if( $man_text_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
						<option title="Serif Family" value="Palatino Linotype" <?php if( $man_text_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>										
						<option title="Serif Family" value="Perpetua" <?php if( $man_text_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
						<option title="Serif Family" value="Rockwell" <?php if( $man_text_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
						<option title="Serif Family" value="Rockwell Extra Bold" <?php if( $man_text_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
						<option title="Serif Family" title="Monospaced Family" value="Times New Roman" <?php if( $man_text_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Andale Mono" <?php if( $man_text_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Consolas" <?php if( $man_text_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Courier New" <?php if( $man_text_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Console" <?php if( $man_text_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Sans Typewriter" <?php if( $man_text_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Monaco" <?php if( $man_text_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
						<option title="Fantasy Family"value="Copperplate" <?php if( $man_text_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
						<option title="Fantasy Family" value="Papyrus" <?php if( $man_text_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
						<option style="background: #f1f1f1;" title="Script Family" value="Brush Script MT" <?php if( $man_text_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>		
					</select>
				</label>
				<label style="width: 175px;" title="<?= count($items) ?> Google Fonts for the tag text. Selected one overrides <span class='green'>Web Safe Font</span>." for="<?=$this->get_field_id('ppl_google_font'); ?>">
					Google Font
					<br>
					<select id="<?=$this->get_field_id('ppl_google_font'); ?>" name="<?=$this->get_field_name('ppl_google_font'); ?>">
						<option value="" <?php if($ppl_google_font == ''){echo ' selected';} ?>></option>
<?php
						foreach ($items as $font){
							echo '<option value="'.$font->{'family'}.'"';			
								if ($ppl_google_font == $font->{'family'}) {echo 'selected'; };
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
				<div style="margin: 4px 7px 0 0; float: left; padding: 0 1px 1px 1px; border: 1px dotted #aaa; border-radius: 5px;" title="Starting rotation speed around axes with values for each one, e.g. <span class='green'>[0.5,-0.3, 0.1]</span>. Values are multiplied by <span class='green'>maxSpeed</span>.">
					Initial Speed [x, y, z]
					<br>
					<select id="<?=$this->get_field_id('ppl_initial_x'); ?>" name="<?=$this->get_field_name('ppl_initial_x'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="mainx_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>	
					</select><select id="<?=$this->get_field_id('ppl_initial_y'); ?>" name="<?=$this->get_field_name('ppl_initial_y'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="mainy_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select><select id="<?=$this->get_field_id('ppl_initial_z'); ?>" name="<?=$this->get_field_name('ppl_initial_z'); ?>">	
					<?php for($i=-100; $i<101; $i++){echo '<option id="mainz_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
				</select>
				</div>
				<label style="padding: 5px 9px 0 0;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('ppl_min_speed'); ?>">
					Min Speed
					<br>
					<select id="<?=$this->get_field_id('ppl_min_speed'); ?>" name="<?=$this->get_field_name('ppl_min_speed'); ?>">
						<?php for($i=0; $i<55; $i+=5){echo '<option id="ppmis_' . $i . '" value="' . $i/1000 . '"'; if($ppl_min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>	
				<label style="padding: 5px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed." for="<?=$this->get_field_id('ppl_max_speed'); ?>">
					Max Speed
					<br>
					<select id="<?=$this->get_field_id('ppl_max_speed'); ?>" name="<?=$this->get_field_name('ppl_max_speed'); ?>">
						<?php for($i=5; $i<105; $i+=5){echo '<option id="ppmas_' . $i . '" value="' . $i/1000 . '"'; if($ppl_max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>
				<div class="thin-spacer"></div>
				<label title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('ppl_click_to_front'); ?>">
					Click to Front
					<br>
					<select id="<?=$this->get_field_id('ppl_click_to_front'); ?>" name="<?=$this->get_field_name('ppl_click_to_front'); ?>">
						<option id="ppctf_0" value="null" <?php if( $ppl_click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
						<?php for($i=500; $i<2500; $i+=500){echo '<option id="ppctf_' . $i . '" value="' . $i . '"'; if($ppl_click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>msec
				</label>
			</div>
		</div>	
	</div>