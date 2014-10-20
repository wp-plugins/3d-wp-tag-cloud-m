// 3D WP Tag Cloud-M(S): Center Functions
// For creating your Center Function you have to be familiar with HTML tag <canvas>
// Detailed tutorial: http://diveintohtml5.info/canvas.html
//
// Each function below is passed in following parameters in order: 
// c = canvas 2D context; 
// w = canvas width; 
// h = canvas height; 
// cx = centre X; 
// cy = centre Y.
//

function image_cf<?= $inst_id; ?>(c, w, h, cx, cy){
	c.setTransform(1, 0, 0, 1, 0, 0);
	c.globalAlpha = <?= $all_cf_opacity; ?>;
	var step = 	<?= $all_img_reduction; ?>; // Image reduction	;				
	var f1 = 0.5 + step;
	var f2= 0.5 - step;
	var cfimg = new Image();
	cfimg.src = '<?= $all_cf_image_loc; ?>';  // Image location ''
	c.drawImage(cfimg, w*f2/2, h*f2/2, w*f1, h*f1);
}

function text_cf<?= $inst_id; ?>(c, w, h, cx, cy){
	var d = <?= $all_cf_rotation; ?>*((new Date).getTime()%10000)*Math.PI/2500;	// Direction of rotation
	c.setTransform(1, 0, 0, 1, 0, 0);
	c.translate(cx, cy);
	c.globalAlpha = <?= $all_cf_opacity; ?>;
	var f = <?= $all_text_zoom; ?>;	// Text block zooming
	var land = 1;	// Landscape coefficient
	var port = 1;	// Portrait coefficient
	var text_cont = '<?= $all_text_cont; ?>';
	if(text_cont=='landscape'){land = 1.5;}
	else{ if(text_cont=='portrait'){port=1.5;}
	}
	var border_cf = '<?= $all_border_cf; ?>';	// Border color
	var cont_border = <?= $all_cont_border; ?>;
	var bg_colour_cf = '<?= $all_bg_colour_cf; ?>';	// Background color
	var rx = -w*land*f/8;
	var rw = w*land*f/4;
	var ry = -w*port*f/8;
	var rh = w*port*f/4;	
	c.rotate(d);
	if(bg_colour_cf==''){c.fillStyle='transparent';}
	else{c.fillStyle = '#<?= $all_bg_colour_cf; ?>';};
	c.fillRect(rx, ry, rw, rh);
	c.strokeStyle = '#<?= $all_border_cf; ?>';
	c.lineWidth = <?= $all_cont_border; ?>;	// Border width in pixels
	if(border_cf!='' && cont_border!=0){c.strokeRect(rx, ry, rw, rh);}
	c.fillStyle = '#<?= $all_text_color_cf; ?>';	// Text color
	var tsize = <?= $all_font_h; ?>; // Font size in pixels
	c.textAlign = 'center';	
	c.textBaseline = 'bottom';	
	c.font = '<?= $all_font_w; ?>' + ' ' + tsize + 'px ' + '<?= $all_font_cf; ?>';	// Font weight & font family
	c.fillText('<?= $all_text_line_1; ?>', 0, -1.5*tsize*port, rw-10);	// Text
	c.fillText('<?= $all_text_line_2; ?>', 0, -0.5*tsize*port, rw-10);	// Text
	c.textBaseline = 'middle';		
	c.fillText('<?= $all_text_line_3; ?>', 0, 0, rw-10);	// Text; 
	c.textBaseline = 'top';	
	c.fillText('<?= $all_text_line_4; ?>', 0, 0.5*tsize*port, rw-10);	// Text 
	c.fillText('<?= $all_text_line_5; ?>', 0, 1.5*tsize*port, rw-10);		// Text
}