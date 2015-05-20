<?php 
/*
3D WP Tag Cloud: Archives CP Template
*/
?>
	<div class="section_content">
		<div style="float: left;">
			<span>GENERAL</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 12px 0 0;" title="Cloud shapes Legend:<br><span class='color' style='padding: 0; border: 1px solid #444; 
					font-size: 10px; color: #fff;'>██</span> 3D Shape, <span class='color' style='padding: 0; border: 1px solid #444; font-size: 10px; 
					color: #ccc;'>██</span> 2D Shape, <span class='color' style='padding: 0; border: 1px solid #444; font-size: 10px; color: #aaa;'>██</span> 
					1D Shape, <b style='font-size: 26px; line-height: 5px; position: relative; top: 10px;'>*</b> Specific set of tag numbers in 
					<span class='green'>Number</span> field.<br>See <span style='font-weight: bold; color: #dc143c;'>GUIDE & TIPS</span> > 
					<span style='font-weight: bold; color: #444;'>Shape Tips</span> for advices on selection." 
					for="<?=$this->get_field_id('arch_shape'); ?>">
					Shape
					<br>
					<select id="<?=$this->get_field_id('arch_shape'); ?>" name="<?=$this->get_field_name('arch_shape'); ?>" onchange="check43d(this.id, this.value, '<?= $this->get_field_id('arch_radius_z'); ?>', '<?=$this->get_field_id('all_archives_limit'); ?>', 'arc')";>
						<option value="axes" <?php if( $arch_shape == "axes" ){ echo ' selected'; } ?>>3D Axes*</option>
						<option value="spiral3" <?php if( $arch_shape == "spiral3" ){ echo ' selected'; } ?>>3D Spiral</option>
						<option value="balls" <?php if( $arch_shape == "balls" ){ echo ' selected'; } ?>>Balls</option>
						<option value="blossom" <?php if( $arch_shape == "blossom" ){ echo ' selected'; } ?>>Blossom</option>
						<option value="bulb" <?php if( $arch_shape == "bulb" ){ echo ' selected'; } ?>>Bulb</option>
						<option value="candy" <?php if( $arch_shape == "candy" ){ echo ' selected'; } ?>>Candy</option>
						<option value="capsule" <?php if( $arch_shape == "capsule" ){ echo ' selected'; } ?>>Capsule</option>
						<option value="egg" <?php if( $arch_shape == "egg" ){ echo ' selected'; } ?>>Egg</option>
						<option value="fir" <?php if( $arch_shape == "fir" ){ echo ' selected'; } ?>>Chrismas Fir*</option>
						<option value="cube" <?php if( $arch_shape == "cube" ){ echo ' selected'; } ?>>Cube*</option>
						<option value="glass" <?php if( $arch_shape == "glass" ){ echo ' selected'; } ?>>Glass</option>
						<option value="globe" <?php if( $arch_shape == "globe" ){ echo ' selected'; } ?>>Globe of Rings</option>
						<option value="hcylinder" <?php if( $arch_shape == "hcylinder" ){ echo ' selected'; } ?>>Horisontal Cylinder</option>
						<option value="knot" <?php if( $arch_shape == "knot" ){ echo ' selected'; } ?>>Knot</option>
						<option value="lemon" <?php if( $arch_shape == "lemon" ){ echo ' selected'; } ?>>Lemon</option>
						<option value="love" <?php if( $arch_shape == "love" ){ echo ' selected'; } ?>>Love</option>
						<option value="antenna" <?php if( $arch_shape == "antenna" ){ echo ' selected'; } ?>>Parabolic Antenna*</option>
						<option value="hcones" <?php if( $arch_shape == "hcones" ){ echo ' selected'; } ?>>Peg top around X-axis*</option>
						<option value="vcones" <?php if( $arch_shape == "vcones" ){ echo ' selected'; } ?>>Peg top around Y-axis*</option>
						<option value="hring" <?php if( $arch_shape == "hring" ){ echo ' selected'; } ?>>Ring around X-axis</option>
						<option value="vring" <?php if( $arch_shape == "vring" ){ echo ' selected'; } ?>>Ring around Y-axis</option>
						<option value="rings" <?php if( $arch_shape == "rings" ){ echo ' selected'; } ?>>Rings Knotwork</option>
						<option value="roller" <?php if( $arch_shape == "roller" ){ echo ' selected'; } ?>>Roller of rings</option>
						<option value="sandglass" <?php if( $arch_shape == "sandglass" ){ echo ' selected'; } ?>>Sandglass*</option>
						<option value="sphere" <?php if( $arch_shape == "sphere" ){ echo ' selected'; } ?>>Sphere</option>
						<option value="stairs" <?php if( $arch_shape == "stairs" ){ echo ' selected'; } ?>>Staircase</option>
						<option value="stool" <?php if( $arch_shape == "stool" ){ echo ' selected'; } ?>>Stool</option>
						<option value="pyramid" <?php if( $arch_shape == "pyramid" ){ echo ' selected'; } ?>>Tetrahedron (Triangle Pyramid)*</option>
						<option value="tire" <?php if( $arch_shape == "tire" ){ echo ' selected'; } ?>>Tire</option>
						<option value="tower" <?php if( $arch_shape == "tower" ){ echo ' selected'; } ?>>Tower of rings</option>
						<option value="vcylinder" <?php if( $arch_shape == "vcylinder" ){ echo ' selected'; } ?>>Vertical Cylinder</option>
						<option style="background: #ccc;" value="spiral" <?php if( $arch_shape == "spiral" ){ echo ' selected'; } ?>>2D Spiral*</option>
						<option style="background: #ccc;" value="circles" <?php if( $arch_shape == "circles" ){ echo ' selected'; } ?>>Concentric Circles*</option>
						<option style="background: #ccc;" value="heart" <?php if( $arch_shape == "heart" ){ echo ' selected'; } ?>>Heart</option>
						<option style="background: #ccc;" value="hexagon" <?php if( $arch_shape == "hexagon" ){ echo ' selected'; } ?>>Hexagon (Bee Cell)*</option>
						<option style="background: #ccc;" value="square" <?php if( $arch_shape == "square" ){ echo ' selected'; } ?>>Square*</option>
						<option style="background: #ccc;" value="triangle" <?php if( $arch_shape == "triangle" ){ echo ' selected'; } ?>>Triangle*</option>
						<option style="background: #aaa;" value="beam" <?php if( $arch_shape == "beam" ){ echo ' selected'; } ?>>Lighthouse Beam*</option>
					</select>
				</label>
				<label title="Number of archives to display" for="<?=$this->get_field_id('all_archives_limit'); ?>">
					Number 
					<br>
					<select id="<?=$this->get_field_id('all_archives_limit'); ?>" name="<?=$this->get_field_name('all_archives_limit'); ?>">
						<?php 
							switch($arch_shape){
								case "spiral":
									$spiral_arc = 0;
									for($i=8; $i<71; $i+=7){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $spiral_arc = 1;} else{if($i==64&&$spiral_arc==0){echo ' selected'; $spiral_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "hexagon":
									$hexagon_arc = 0;
									for($i=1; $i<5; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="allarli_' . $calc . '" value="' . $calc  . '"'; if($all_archives_limit==$calc ){echo ' selected'; $hexagon_arc = 1;} else{if($i==4&&$hexagon_arc==0){echo ' selected'; $hexagon_arc = 1;}}; echo '>' . $calc. '</option>'; };
									break;
								case "cube":
									$cube_arc = 0;
									for($i=0; $i<3; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="allarli_' . $calc . '" value="' . $calc  . '"'; if($all_archives_limit==$calc ){echo ' selected'; $cube_arc = 1;} else{if($i==2&&$cube_arc==0){echo ' selected'; $cube_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "pyramid":
									$pyramid_arc = 0;
									for($i=1; $i<7; $i++){$calc = 2*$i*$i+2; echo '<option id="allarli_' . $calc . '" value="' . $calc  . '"'; if($all_archives_limit==$calc ){echo ' selected'; $pyramid_arc = 1;} else{if($i==6&&$pyramid_arc==0){echo ' selected'; $pyramid_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "circles":
									$circles_arc = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $circles_arc = 1;} else{if($i==5&&$circles_arc==0){echo ' selected'; $circles_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "antenna":
									$antenna_arc = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $antenna_arc = 1;} else{if($i==5&&$antenna_arc==0){echo ' selected'; $antenna_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "beam":
									$beam_arc = 0;
									for($i=5; $i<15; $i+=5){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $beam_arc = 1;} else{if($i==10&&$beam_arc==0){echo ' selected'; $beam_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "axes":
									$axes_arc = 0;
									for($i=6; $i<66; $i+=6){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $axes_arc = 1;} else{if($i==60&&$axes_arc==0){echo ' selected'; $axes_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "vcones":
									$vcones_arc = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $vcones_arc = 1;} else{if($i==4&&$vcones_arc==0){echo ' selected'; $vcones_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "hcones":
									$hcones_arc = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $hcones_arc = 1;} else{if($i==4&&$hcones_arc==0){echo ' selected'; $hcones_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "sandglass":
									$sandglass_arc = 0;
									for($i=2; $i<5; $i++){$calc = (4*$i*$i*$i+2*$i)/3-1; echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $sandglass_arc = 1;} else{if($i==4&&$sandglass_arc==0){echo ' selected'; $sandglass_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "square":
									$square_arc = 0;
									for($i=2; $i<9; $i++){echo '<option id="allarli_' . $i*$i . '" value="' . $i*$i . '"'; if($all_archives_limit==$i*$i){echo ' selected'; $square_arc = 1;} else{if($i==8&&$square_arc==0){echo ' selected'; $square_arc = 1;}}; echo '>' . $i*$i . '</option>'; };
									break;
								case "fir":
									$fir_arc = 0;
									for($i=1; $i<6; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $fir_arc = 1;} else{if($i==5&&$fir_arc==0){echo ' selected'; $fir_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "triangle":
									$triangle_arc = 0;
									for($i=3; $i<12; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="allarli_' . $calc . '" value="' . $calc . '"'; if($all_archives_limit==$calc){echo ' selected'; $triangle_arc = 1;} else{if($i==11&&$triangle_arc==0){echo ' selected'; $triangle_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "heart":
									$heart_arc = 0;
									for($i=12; $i<60; $i+=12){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $heart_arc = 1;} else{if($i==48&&$heart_arc==0){echo ' selected'; $heart_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "love":
									$love_arc = 0;
									for($i=24; $i<72; $i+=12){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $love_arc = 1;} else{if($i==60&&$love_arc==0){echo ' selected'; $love_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								default:
									$default_arc = 0;
									for($i=6; $i<66; $i+=6){echo '<option id="allarli_' . $i . '" value="' . $i . '"'; if($all_archives_limit==$i){echo ' selected'; $default_arc = 1;} else{if($i==60&&$default_arc==0){echo ' selected'; $default_arc = 1;}}; echo '>' . $i . '</option>'; };
									echo '<option id="allarli_66"'; if($all_archives_limit==''){echo ' selected';}; echo ' value="">all</option>';
							}
						?>
					</select>
				</label>
				<div class="thick-spacer"></div>
				<div style="float: left; margin: 0 12px 0 0;" title="Switches on/off weighting of tags. Setting <span class='green'>off</span> overrides <span class='green'>Weight Mode</span>.">
					Weight
					<br>
					<input class="radio" id="<?=$this->get_field_id('arch_weight'); ?>"
					name="<?=$this->get_field_name('arch_weight'); ?>" type="radio" value="true"
					<?php if( $arch_weight == "true" ){ echo ' checked="checked"'; } ?>>on
					
					<input class="radio" id="<?=$this->get_field_id('arch_weight'); ?>"
					name="<?=$this->get_field_name('arch_weight'); ?>" type="radio" value="false"
					<?php if( $arch_weight == "false" ){ echo ' checked="checked"'; } ?>>off 
				</div>
				<label style="float: left; margin: 0 12px 0 0;" title="Method to use for displaying tag weights" for="<?=$this->get_field_id('arch_weight_mode'); ?>">
					Weight Mode
					<br>
					<select id="<?=$this->get_field_id('arch_weight_mode'); ?>" name="<?=$this->get_field_name('arch_weight_mode'); ?>" style="margin: 5px 0 1px 0;">
						<option value="size" <?php if( $arch_weight_mode == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="color" <?php if( $arch_weight_mode == "color" ){ echo ' selected'; } ?>>color</option>
						<option value="both" <?php if( $arch_weight_mode == "both" ){ echo ' selected'; } ?>>size&color</option>
						<option value="bgcolor" <?php if( $arch_weight_mode == "hring" ){ echo ' selected'; } ?>>bgcolor</option>
						<option value="bgoutline" <?php if( $arch_weight_mode == "bgoutline" ){ echo ' selected'; } ?>>bgoutline</option>
					</select>
				</label>
				<label title="Multiplier for adjusting the size of tags when using a weight mode of <span class='green'>size</span> or <span class='green'>size & color</span>." for="<?=$this->get_field_id('arch_weight_size'); ?>">
					Weight Factor
					<br>
					<select id="<?=$this->get_field_id('arch_weight_size'); ?>" name="<?=$this->get_field_name('arch_weight_size'); ?>">		
						<?php for($i=50; $i<505; $i+=5){echo '<option id="aws_' . $i . '" value="' . $i/100 . '"'; if($arch_weight_size==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>
				<div class="thick-spacer"></div>
				<label style="margin: 0 12px 0 0;" title="Type of highlight to use" for="<?=$this->get_field_id('arch_outline_method'); ?>">
					Outline<br>Method
					<br>
					<select id="<?=$this->get_field_id('arch_outline_method'); ?>" name="<?=$this->get_field_name('arch_outline_method'); ?>">
						<option value="outline" <?php if( $arch_outline_method == "outline" ){ echo ' selected'; } ?>>outline</option>
						<option value="classic" <?php if( $arch_outline_method == "classic" ){ echo ' selected'; } ?>>classic</option>
						<option value="block" <?php if( $arch_outline_method == "block" ){ echo ' selected'; } ?>>block</option>
						<option value="color" <?php if( $arch_outline_method == "hring" ){ echo ' selected'; } ?>>color</option>
						<option value="size" <?php if( $arch_outline_method == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="none" <?php if( $arch_outline_method == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<div style="float: left; margin: 0 12px 0 0;" title="When enabled, cloud moves when dragged instead of based on mouse position.">
					Drag<br>Control
					<div>
						<input class="radio" id="<?=$this->get_field_id('arch_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('arch_drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $arch_drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('arch_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('arch_drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $arch_drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<label style="margin: 0 12px 0 0;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('arch_brightness'); ?>">
					Min<br>Opacity
					<br>
					<select id="<?=$this->get_field_id('arch_brightness'); ?>" name="<?=$this->get_field_name('arch_brightness'); ?>">
						<?php for($i=0; $i<105; $i+=5){echo '<option id="armb_' . $i . '" value="' . $i/100 . '"'; if($arch_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label> 
				<label style="margin: 0 12px 0 0;"  title="Pulsate outline to this opacity. Choose <span class='green'>1.0</span> for no pulsation."for="<?=$this->get_field_id('arch_pulsate_to'); ?>">
					Pulsate<br>to Opacity
					<br>
					<select id="<?=$this->get_field_id('arch_pulsate_to'); ?>" name="<?=$this->get_field_name('arch_pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="apus_' . $i . '" value="' . $i/10 . '"'; if($arch_pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
				<label for="<?=$this->get_field_id('arch_lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - locks the cloud in response to the mouse. It will only move if the <span class='green'>initial</span> option gives it a starting speed.<b><br>N.B.</b> Since Z rotation can't be controlled by mouse it will be locked anyway.<br><span class='green'>none</span> - leaves the cloud unlocked.">
					Lock<br>Rotation
					<br>
					<select id="<?=$this->get_field_id('arch_lock'); ?>" name="<?=$this->get_field_name('arch_lock'); ?>">
						<option value="x" <?php if( $arch_lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
						<option value="y" <?php if( $arch_lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
						<option value="xy" <?php if( $arch_lock == "xy" ){ echo ' selected'; } ?>>both</option>
						<option value="none" <?php if( $arch_lock == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<label style="width: 100%;" for="<?=$this->get_field_id('arch_tooltip'); ?>" title="Sets your canvas tooltip. For instance if the cloud allows <span class='green'>Drag Control</span> you can suggest your site visitors to 'Drag or Click'.">
				Tooltip
				<div>
					<input style="width: 100%;" id="<?=$this->get_field_id('arch_tooltip'); ?>"
					name="<?=$this->get_field_name('arch_tooltip'); ?>" type="text"
					value="<?php echo $arch_tooltip; ?>" />
				</div> 
				</label>
				<label style="float: left; width: 100%; padding: 5px 0 0;" title="URL of an image to be used for Cloud Background. Consider Widget's <span class='green'>Width</span> and <span class='green'>Height</span>." for="<?=$this->get_field_id('arc_img_url'); ?>">
					Background Image
					<input style="width: 100%;"
					id="<?=$this->get_field_id('arc_img_url'); ?>"
					name="<?=$this->get_field_name('arc_img_url'); ?>" type="text"
					value="<?php echo $arc_img_url; ?>" /> 
				</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SIZES</span>
			<div style="padding-top: 5px;">
				<label style="width: 95px;" title="Minimal font size when weighted sizing is enabled." for="<?=$this->get_field_id('arch_weightsizemin'); ?>">
					Weight Size Min
					<br>
					<select id="<?=$this->get_field_id('arch_weightsizemin'); ?>" name="<?=$this->get_field_name('arch_weightsizemin'); ?>">
						<?php for($i=6; $i<17; $i++){echo '<option id="awsmi_' . $i . '" value="' . $i . '"'; if($arch_weightsizemin==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<label title="Maximal font size when weighted sizing is enabled." for="<?=$this->get_field_id('arch_weightsizemax'); ?>">
					Weight Size Max
					<br>
					<select id="<?=$this->get_field_id('arch_weightsizemax'); ?>" name="<?=$this->get_field_name('arch_weightsizemax'); ?>">
						<?php for($i=18; $i<33; $i++){echo '<option id="awsm_' . $i . '" value="' . $i . '"'; if($arch_weightsizemax==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<div class="thick-spacer"></div>
				<label style="width: 86px;" title="Initial size of cloud from centre to sides." for="<?=$this->get_field_id('arch_radius_x'); ?>">
					Radius X
					<br>
					<select id="<?=$this->get_field_id('arch_radius_x'); ?>" name="<?=$this->get_field_name('arch_radius_x'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="arx_' . $i . '" value="' . $i/100 . '"'; if($arch_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to top and bottom." for="<?=$this->get_field_id('arch_radius_y'); ?>">
					Radius Y
					<br>
					<select id="<?=$this->get_field_id('arch_radius_y'); ?>" name="<?=$this->get_field_name('arch_radius_y'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="ary_' . $i . '" value="' . $i/100 . '"'; if($arch_radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<div style="width: 86px; float: left;<?php if($arch_shape == 'spiral'||$arch_shape == 'hexagon'||$arch_shape == 'circles'||$arch_shape == 'beam') {echo ' visibility: hidden;';}; ?>" title="Initial size of cloud from centre to front and back." id="cont_<?=$this->get_field_id('arch_radius_z'); ?>">
					Radius Z
					<br>
					<select id="<?=$this->get_field_id('arch_radius_z'); ?>" name="<?=$this->get_field_name('arch_radius_z'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="arz_' . $i . '" value="' . $i/100 . '"'; if($arch_radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</div> 
				<label style="width: 70px;" title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are automatically broken at line break tags." for="<?=$this->get_field_id('arch_split_width'); ?>">
					Split Width
					<br>
					<select id="<?=$this->get_field_id('arch_split_width'); ?>" name="<?=$this->get_field_name('arch_split_width'); ?>">
						<?php for($i=50; $i<155; $i+=5){echo '<option id="aspw_' . $i . '" value="' . $i . '"'; if($arch_split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left; height: 137px;">
			<span style="padding-bottom: 5px;">COLORS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('arch_text_color'); ?>">
					Tag Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the tag text - empty string to use the color of the original link" 
						class="colors" id="<?=$this->get_field_id('arch_text_color'); ?>"
						name="<?=$this->get_field_name('arch_text_color'); ?>" type="text"
						value="<?php echo $arch_text_color; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($arch_text_color != '') {echo '<span class="color" style="color: #' . $arch_text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('arch_bg_color'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of tags - empty option means no background. The string <span class='green'>'tag'</span> means use the original link background color."
						class="colors" id="<?=$this->get_field_id('arch_bg_color'); ?>"
						name="<?=$this->get_field_name('arch_bg_color'); ?>" type="text"
						value="<?php echo $arch_bg_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_bg_color != '' && $arch_bg_color != 'tag') {echo '<span class="color" style="color: #' . $arch_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($arch_bg_color == 'tag'){echo '<span class="color" style="padding: 0 0 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('arch_bg_outline'); ?>">
					Border
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of tag border. Use empty option for the same as the text color, use <span class='green'>'tag'</span> for the original link text color."
						class="colors" id="<?=$this->get_field_id('arch_bg_outline'); ?>"
						name="<?=$this->get_field_name('arch_bg_outline'); ?>" type="text"
						value="<?php echo $arch_bg_outline; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_bg_outline != '') {echo '<span class="color" style="color: #' . $arch_bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('arch_shadow'); ?>">
					Shadow
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the shadow behind each tag"
						class="colors" id="<?=$this->get_field_id('arch_shadow'); ?>"
						name="<?=$this->get_field_name('arch_shadow'); ?>" type="text"
						value="<?php echo $arch_shadow; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_shadow != '') {echo '<span class="color" style="color: #' . $arch_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>								
				<label style="margin: 0 3px 0 0; height: 55px;" for="<?=$this->get_field_id('arch_outline_color'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0;">
						<input title="Color of the active tag highlight"
						class="colors" id="<?=$this->get_field_id('arch_outline_color'); ?>"
						name="<?=$this->get_field_name('arch_outline_color'); ?>" type="text"
						value="<?php echo $arch_outline_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_outline_color != '') {echo '<span class="color" style="color: #' . $arch_outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<div class="gradient-div">	
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('arch_weight_gradient_1'); ?>">
						Gradient<br>Color: 0
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('arch_weight_gradient_1'); ?>"
							name="<?=$this->get_field_name('arch_weight_gradient_1'); ?>" type="text"
							value="<?php echo $arch_weight_gradient_1 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_weight_gradient_1 != '') {echo '<span class="color" style="color: #' . $arch_weight_gradient_1 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('arch_weight_gradient_2'); ?>">
						Gradient<br>Color: 0.33
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('arch_weight_gradient_2'); ?>"
							name="<?=$this->get_field_name('arch_weight_gradient_2'); ?>" type="text"
							value="<?php echo $arch_weight_gradient_2 ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($arch_weight_gradient_2 != '') {echo '<span class="color" style="color: #' . $arch_weight_gradient_2 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('arch_weight_gradient_3'); ?>">
						Gradient<br>Color: 0.67
						<br>
					<span class="hash">#</span>
						<div class="siwraper">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('arch_weight_gradient_3'); ?>"
							name="<?=$this->get_field_name('arch_weight_gradient_3'); ?>" type="text"
							value="<?php echo $arch_weight_gradient_3 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_weight_gradient_3 != '') {echo '<span class="color" style="color: #' . $arch_weight_gradient_3 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
						</div>
					</label>
					<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('arch_weight_gradient_4'); ?>">
						Gradient<br>Color: 1
						<br>
						<span class="hash">#</span>
						<div class="siwraper" style="margin: 0;">
							<input title="The color gradient applied for colouring tags when using a <span class='green'>Weight Mode</span> of <span class='green'>color</span> or <span class='green'>size & color</span>. Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. All 4 Gradient values must be entered to take effect." 
							class="colors" id="<?=$this->get_field_id('arch_weight_gradient_4'); ?>"
							name="<?=$this->get_field_name('arch_weight_gradient_4'); ?>" type="text"
							value="<?php echo $arch_weight_gradient_4 ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($arch_weight_gradient_4 != '') {echo '<span class="color" style="color: #' . $arch_weight_gradient_4 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
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
				<label style="margin: 0 15px 0 0;" title="Height of the tag text font" for="<?=$this->get_field_id('arch_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('arch_fontsize'); ?>" name="<?=$this->get_field_name('arch_fontsize'); ?>">
						<?php for($i=6; $i<31; $i++){echo '<option id="afs_' . $i . '" value="' . $i . '"'; if($arch_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<div style="float: left; margin: 0 15px 0 0;" title="Border of the tags">
					<div>
						Border
					</div>
					<div style="float: left; margin: 0;">
						<input class="radio" id="<?=$this->get_field_id('arch_borderwidth'); ?>"
						name="<?=$this->get_field_name('arch_borderwidth'); ?>" type="radio" value="1"
						<?php if( $arch_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('arch_borderwidth'); ?>"
						name="<?=$this->get_field_name('arch_borderwidth'); ?>" type="radio" value="0"
						<?php if( $arch_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="float: left; margin: 0 15px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
					Shadow Offset [x, y]
					<br>
					<select id="<?=$this->get_field_id('arch_shadowoff_x'); ?>" name="<?=$this->get_field_name('arch_shadowoff_x'); ?>">
						<?php for($i=-5; $i<6; $i++){echo '<option id="asox_' . $i . '" value="' . $i . '"'; if($arch_shadowoff_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>		
					</select>px<select id="<?=$this->get_field_id('arch_shadowoff_y'); ?>" name="<?=$this->get_field_name('arch_shadowoff_y'); ?>">
						<?php for($i=-5; $i<6; $i++){echo '<option id="asoy_' . $i . '" value="' . $i . '"'; if($arch_shadowoff_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px
				</div>
				<label style="margin: 0 0 5px 0;" title="Shadow behind each Menu tag" for="<?=$this->get_field_id('arch_shadowblur'); ?>">
					Shadow Blur
					<br>
					<select id="<?=$this->get_field_id('arch_shadowblur'); ?>" name="<?=$this->get_field_name('arch_shadowblur'); ?>">
						<?php for($i=0; $i<6; $i++){echo '<option id="ashb_' . $i . '" value="' . $i . '"'; if($arch_shadowblur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>												
					</select>px
				</label>
				<div class="thick-spacer"></div>
				<label title="48 Web Safe Fonts for the tag text" for="<?=$this->get_field_id('arch_text_font'); ?>">
					Web Safe Font
					<br>
					<select class="special_m" id="<?=$this->get_field_id('arch_text_font'); ?>" name="<?=$this->get_field_name('arch_text_font'); ?>">
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial" <?php if( $arch_text_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Black" <?php if( $arch_text_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Arial Narrow" <?php if( $arch_text_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Avant Garde" <?php if( $arch_text_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Calibri" <?php if( $arch_text_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Candara" <?php if( $arch_text_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Century Gothic" <?php if( $arch_text_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Comic Sans MS" <?php if( $arch_text_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>										
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Franklin Gothic Medium" <?php if( $arch_text_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Futura" <?php if( $arch_text_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Geneva" <?php if( $arch_text_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Gill Sans" <?php if( $arch_text_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Helvetica" <?php if( $arch_text_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Impact" <?php if( $arch_text_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Grande" <?php if( $arch_text_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Lucida Sans Unicode" <?php if( $arch_text_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>												
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Optima" <?php if( $arch_text_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Segoe UI" <?php if( $arch_text_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Tahoma" <?php if( $arch_text_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
						<option style="background: #f1f1f1;" title="Sans Serif Family" value="Trebuchet MS" <?php if( $arch_text_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
						<option style="background: #f1f1f1;" title="Serif Family" value="Verdana" <?php if( $arch_text_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
						<option title="Serif Family" value="Baskerville" <?php if( $arch_text_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
						<option title="Serif Family" value="Big Caslon" <?php if( $arch_text_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
						<option title="Serif Family" value="Bodoni MT" <?php if( $arch_text_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
						<option title="Serif Family" value="Book Antiqua" <?php if( $arch_text_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
						<option title="Serif Family" value="Calisto MT" <?php if( $arch_text_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
						<option title="Serif Family" value="Cambria" <?php if( $arch_text_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
						<option title="Serif Family" value="Didot" <?php if( $arch_text_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
						<option title="Serif Family" value="Garamond" <?php if( $arch_text_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
						<option title="Serif Family" value="Georgia" <?php if( $arch_text_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
						<option title="Serif Family" value="Goudy Old Style" <?php if( $arch_text_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
						<option title="Serif Family" value="Hoefler Text" <?php if( $arch_text_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
						<option title="Serif Family" value="Lucida Bright" <?php if( $arch_text_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
						<option title="Serif Family" value="Palatino" <?php if( $arch_text_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
						<option title="Serif Family" value="Palatino Linotype" <?php if( $arch_text_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>										
						<option title="Serif Family" value="Perpetua" <?php if( $arch_text_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
						<option title="Serif Family" value="Rockwell" <?php if( $arch_text_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
						<option title="Serif Family" value="Rockwell Extra Bold" <?php if( $arch_text_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
						<option title="Serif Family" title="Monospaced Family" value="Times New Roman" <?php if( $arch_text_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Andale Mono" <?php if( $arch_text_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Consolas" <?php if( $arch_text_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Courier New" <?php if( $arch_text_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Console" <?php if( $arch_text_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Lucida Sans Typewriter" <?php if( $arch_text_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
						<option style="background: #f1f1f1;" title="Monospaced Family" value="Monaco" <?php if( $arch_text_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
						<option title="Fantasy Family" value="Copperplate" <?php if( $arch_text_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
						<option title="Fantasy Family" value="Papyrus" <?php if( $arch_text_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
						<option style="background: #f1f1f1;" title="Script Family" value="Brush Script MT" <?php if( $arch_text_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>		
					</select>
				</label>
				<label style="width: 175px;" title="<?= count($items) ?> Google Fonts for the tag text. Selected one overrides <span class='green'>Web Safe Font</span>." for="<?=$this->get_field_id('arch_google_font'); ?>">
					Google Font
					<br>
					<select id="<?=$this->get_field_id('arch_google_font'); ?>" name="<?=$this->get_field_name('arch_google_font'); ?>">
						<option value="" <?php if($arch_google_font == ''){echo ' selected';} ?>></option>
<?php
						foreach ($items as $font){
							echo '<option value="'.$font->{'family'}.'"';			
								if ($arch_google_font == $font->{'family'}) {echo 'selected'; };
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
					<select id="<?=$this->get_field_id('arch_initial_x'); ?>" name="<?=$this->get_field_name('arch_initial_x'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="arinx_' . $i . '" value="' . $i/100 . '"'; if($arch_initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>	
					</select><select id="<?=$this->get_field_id('arch_initial_y'); ?>" name="<?=$this->get_field_name('arch_initial_y'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="ariny_' . $i . '" value="' . $i/100 . '"'; if($arch_initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select><select id="<?=$this->get_field_id('arch_initial_z'); ?>" name="<?=$this->get_field_name('arch_initial_z'); ?>">	
					<?php for($i=-100; $i<101; $i++){echo '<option id="arinz_' . $i . '" value="' . $i/100 . '"'; if($arch_initial_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
				</select>
				</div>
				<label style="padding: 5px 9px 0 0;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('arch_min_speed'); ?>">
					Min Speed
					<br>
					<select id="<?=$this->get_field_id('arch_min_speed'); ?>" name="<?=$this->get_field_name('arch_min_speed'); ?>">
						<?php for($i=0; $i<55; $i+=5){echo '<option id="amis_' . $i . '" value="' . $i/1000 . '"'; if($arch_min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>	
				<label style="padding: 5px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed." for="<?=$this->get_field_id('arch_max_speed'); ?>">
					Max Speed
					<br>
					<select id="<?=$this->get_field_id('arch_max_speed'); ?>" name="<?=$this->get_field_name('arch_max_speed'); ?>">
						<?php for($i=5; $i<105; $i+=5){echo '<option id="amas_' . $i . '" value="' . $i/1000 . '"'; if($arch_max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>					
					</select>
				</label>
				<div class="thin-spacer"></div>
				<label title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('arch_click_to_front'); ?>">
					Click to Front
					<br>
					<select id="<?=$this->get_field_id('arch_click_to_front'); ?>" name="<?=$this->get_field_name('arch_click_to_front'); ?>">
						<option id="actf_0" value="null" <?php if( $arch_click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
						<?php for($i=500; $i<2500; $i+=500){echo '<option id="actf_' . $i . '" value="' . $i . '"'; if($arch_click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>msec
				</label>
			</div>
		</div>
	</div>