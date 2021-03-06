=== 3D WP Tag Cloud-M ===
Contributors: hityr5yr, bisko
Tags: tag cloud, 3D, widget, HTML5, canvas, cloud, tags, links, recent posts, menu, images
Requires at least: 3.9
Tested up to: 4.3.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl.html


3D WP Tag Cloud-M is derivative from 3D WP Tag Cloud v. 2.3. It creates multiple 3D tag clouds widget. 


== Description ==

This is the Multiple Clouds variation of 3D WP Tag Cloud. It creates multiple instances widget that draws and animates a HTML5 canvas based tag clouds. Plugin may rotate Pages, Recent 
Posts, Blogroll (External Links), Menus, Blog Archives, List of Authors, Current Page/Post Links, Links from a customer's HTML container, Post Tags, Post Categories, Portfolio 
Categories, Portfolio Items, Portfolio Filters, Slider Categories and Slider Items. It allows showing up to 9 types of content in one widget activated from static or dynamic menu 
(another cloud). Supports following shapes: parabolic ANTENNA, AXES, lighthouse BEAM, BALLS, BLOSSOM, BULB, CANDY, CAPSULE, concentric CIRCLES, CROWN, CUBE, CYLINDER that starts off 
horizontal, CYLINDER that starts off vertical, DNA, DOMES, EGG, Christmas FIR, GLASS, GLOBE of rings, HEART, HEXAGON (bee cell), KNOT, LEMON, LOVE, PEG TOP that starts off horizontal, 
PEG TOP that starts off vertical, PYRAMID (tetrahedron), RING that starts off horizontal, RING that starts off vertical, RINGS knotwork, ROLLER of rings, SANDGLASS, SATURN, SPHERE, 
SPIRAL, SPRING, SQUARE, STAIRECASE, STOOL, TIRE , TOWER of rings and TRIANGLE. Able to rotate clouds around all three axes. Option values are preset and don't have to be typed but 
selected. Multiple fonts, multiple colors and multiple backgrounds can be applied to the cloud content. Full variety of fonts from Google Font Library is available. The plugin allows 
creating clouds of images. In case of Recent posts, Pages, Menu, List of Authors and Blogroll (External Links), Current Page/Post Links and Custom HTML container tags may consist of 
both image and text. It gives an option to put images and/or text in the center of the cloud. It accepts background images as well. The Number of tags in the cloud is adjustable. The 
plugin automatically includes WP Links panel for users who started using WP since v 3.5, when Links Manager and blogroll were made hidden by default. 3D WP Tag Cloud uses Graham 
Breach's Javascript class TagCanvas v. 2.8 and includes most of its 80+ options in the Control Panel settings.


== Installation ==

= Manual = 
1. Make sure you are running WordPress version 3.9 or higher. 
2. Download the zip file and extract the content. 
3. Upload the '3D WP Tag Cloud' folder to your plugins directory (wp-content/plugins/). 
4. Login to your WordPress Admin menu, go to 'Appearance > Widgets' and if required enable accessibility mode in 'Screen Options' (right top corner. 
5. Add a widget instance.
6. If tag clouds created by previous plugin versions do not appear after installation, just open and save their widget instances again without any changes.

= Automatic =
1. Make sure you are running WordPress version 3.9 or higher.
2. Use WordPress' built-in installer and activate the plugin.
3. Go to 'Appearance > Widgets' and if required enable accessibility mode in 'Screen Options' (right top corner). 
4. Add a widget instance.
5. If tag clouds created by previous plugin versions do not appear on your site after installation of a new version, just open and save their widget instances again without any changes.


== Changelog ==

= 2.7.1 =
1. Added automatic reminder to the site administrator after installation of new version to open and save the old Widget Instances for making them compatible if necessary.
2. Added instructions in 'GUIDE & TIPS > Cloud Content Tips' section on how to put Portfolio Categories, Portfolio Items, Portfolio Filters, Slider Categories and/or Slider Items into the 
cloud via Menus content type.

= 2.7 =
1. Added Image Radius option for rounding off image corners.
2. Updated to Graham Breach's Javascript class TagCanvas v. 2.8.

= 2.6.2 =
1. Added a Target option for opening tag links in a new tab/window, parent or top frame. Available to Authors, Blogroll, Pages and Recent Posts.

= 2.6.1 =
1. Prevented Firefox from showing an error when image_cf() is selected without supplying an image URL for it.

= 2.6 =
1. Added new shape: Crown.
2. Extended range of some Number of tags options.

= 2.5 =
1. Added new shape: Saturn.

= 2.4 =
1. Added new shape: Domes.
2. Improved shapes Glass and Sandglass.

= 2.3 =
1. Added a new shape: DNA.
2. Added an option for Minimal Number of Tags in the Cloud.
3. Improved Balls Shape function.
4. Updated to Graham Breach's Javascript class TagCanvas v. 2.7.

= 2.2 =
1. Added new types of content: Current Page/Post Links and Custom HTML container (div, table, ul etc.).
2. Added new shapes: Rings Knotwork and Love.
3. Extended range of Radius X, Radius Y and Radius Z.
4. Fixed small bugs in Control Panel.

= 2.1 =
1. Added new shape: 3D spiral.
2. Fixed bug in Blossom Shape.

= 2.0.1 =
1. Fixed bug in Center Function for text.

= 2.0 =
1. Added new shapes: 3D axes, Balls, Blossom, Bulb, Christmas fir, Candy, Capsule, Concentric circles, Cube, Egg, Glass, Globe of rings, Heart, Knot, Lemon, 
Lighthouse beam, Parabolic antenna, Peg top that starts off horizontal, Peg top that starts off vertical, Roller of rings, Sandglass, Square, Stool, Starecase, 
Tire, Tower of rings, Triangle and Triangle pyramid.
2. Added new tips.
3. Extended range of some size options.
4. Fixed bug in Center Function for images.
5. Fixed small bugs. 

= 1.4 =
1. Added rotation around z-axis and an option for setting its speed.
2. Improved algorithm of hexagon 2D shape.

= 1.3 =
1. Added two new 2D shapes: spiral and hexagon.

= 1.2.2 =
1. Fixed bug in selecting Central Function.
2. Fixed bug in positioning multiple menu under tag canvas when sidebar is wider.

= 1.2.1 =
1. The minimal values of Radius X, Radius Y & Radius Z are shifted to zero so clouds could be one or two dimensional.
2. Reduced step between Radius X,Y,Z values for precise setting size of dynamic Menu.
3. Expanded scope of Canvas Height (90px - 960px): now Tag Cloud could be used as Header/Footer menu or Leaderboard Banner (728x90).
4. Reduced step between Depth values for precise setting of perspective. 
5. Reduced step between Initial values for precise control of speed.
6. Fixed bug in HEX check of entered colors.

= 1.2 =
1. Changed the way Google Fonts are selected: All Google Fonts are included in a drop-down menu. Thus fonts are no more typed but selected.
2. Automatic update of Google Fonts List from Google Font Library.
3. Small code improvements.

= 1.1 =
1. Added a new feature for Recent posts, Pages, Menu Items, List of Authors and External Links (blogroll): Support for mixed image/text tags and choice of image, text or both. 
2. Added text and image alignment options. 
3. Added an option to enable/disable a "No tags" message when there are no tags to display.
4. Added an option for limiting number of Pages that can be rotated in the cloud. 
5. Updated to Graham Breach's Javascript class TagCanvas v. 2.6.1.
6. Added new tips in Help section.
7. Fixed bug in freezing animation till next page loads.
8. Made some code improvements.

= 1.0 =
The First Version.