=== 3D WP Tag Cloud-M ===
Contributors: hityr5yr, bisko
Tags: tag cloud, 3D, widget, HTML5, canvas, cloud, tags, links, recent posts, menu, images
Requires at least: 3.9
Tested up to: 4.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl.html


3D WP Tag Cloud-M is derivative from 3D WP Tag Cloud v. 2.3. It creates multiple 3D tag clouds widget. 


== Description ==

This is the Multiple Clouds variation of 3D WP Tag Cloud. It creates multiple instances widget that draws and animates a HTML5 canvas based tag clouds. Plugin may rotate Pages, Recent Posts, External Links (blogroll), Menus, Blog Archives, List of Authors and of course Post Tags and Post Categories. It allows showing up to 8 types of content in one widget activated from static or dynamic menu (another cloud). Option values are preset and don't have to be typed but selected. Multiple fonts, multiple colors and multiple backgrounds can be applied to the cloud content. Full variety of fonts from Google Font Library is available. The plugin allows creating clouds of images. In case of Recent posts, Pages, Menu, List of Authors and External Links (blogroll) tags may consist of both image and text. It gives an option to put images and/or text in the center of the cloud. It accepts background images as well. The Number of tags in the cloud is adjustable. The plugin automatically includes WP Links panel for users who started using WP since v 3.5, when Links Manager and blogroll were made hidden by default. 3D WP Tag Cloud uses Graham Breach's Javascript class TagCanvas v. 2.6.1 and includes most of its 80+ options in the Control Panel settings. Supports following shapes: sphere, hcylinder for a cylinder that starts off horizontal, vcylinder for a cylinder that starts off vertical, hring for a horizontal circle and vring for a vertical circle.

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