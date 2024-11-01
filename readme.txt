=== 3D Banner Rotator ===

Contributors: wpslideshow.com
Author URI: http://wpslideshow.com/3d-banner-rotator/
Tags: 3d banner rotator, banner rotator, slideshow, 3d slider, wp slider
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: trunk

3D Banner Rotator is a 3d slider plugin. Just use [rotator] to display this slider on your site. You can create categories, bulk upload images under those categories and you can also display specific categories and specific images using their ID's.

== Description ==

3D Banner Rotator is a 3d slider plugin. Just use [rotator] to display this slider on your site. You can create categories, bulk upload images under those categories and you can also display specific categories and specific images using their ID's.

**Features**

* Customizable gallery width and height
* Customizable size,color,font style of Title,description etc..
* Customizable auto play option
* Customizable navigation bar options
* Customizable progressbar options
* Customizable slideshow corner radious option
* Play/Pause, next,previous options
* Slideshow Transition time option
Many more options available...

Requirements/Restrictions:
-------------------------
 * Works with Wordpress 3.0, WPMU (Wordpress 3.0+ is highly recommended)
 * PHP5 
 
For working demo : http://wpslideshow.com/3d-banner-rotator/

Installation Video : http://www.youtube.com/watch?v=mQw0SWNA-yo&list=UU4bTFFL_yWSKFnoaR6PSEYg&index=22&feature=plcp

== Installation ==

1. Install automatically through the 'Plugins', 'Add New' menu in WordPress, or upload the 'wp-3dbanner-rotator' folder to the '/wp-content/plugins/' directory. 

2. Activate the plugin through the 'Plugins' menu in WordPress. you can find "rotator" link  on left side navigation, clilck on to configure plugin Options. 


= short codes =
* <code>[rotator]</code> - Use this short code in the content / post to display all images under all categories which are not disabled.

* <code>[rotator cats=2,3]</code> - Use this short code in the content / post to display all images under the categories with ID's 2,3.

* <code>[rotator imgs=1,2,3]</code> - Use this short code in the content / post to display images which has ID's 1,2,3.


* <code><?php echo do_shortcode('[rotator]');?></code> - Use this short code in the template (php file) to display all images under all categories which are not disabled.

* <code><?php echo do_shortcode('[rotator cats=2,3]');?></code> - Use this short code in the template (php file) to display all images under the categories with ID's 2,3.

* <code><?php echo do_shortcode('[rotator imgs=1,2,3]');?></code> - Use this short code in the template (php file) to display images which has ID's 1,2,3.


* If you have any problems in using this plugin please contact at addons@wpslideshow.com

Working demo: http://wpslideshow.com/3d-banner-rotator/

Installation Video : http://www.youtube.com/watch?v=mQw0SWNA-yo&list=UU4bTFFL_yWSKFnoaR6PSEYg&index=22&feature=plcp



== Screenshots ==

1. screenshot-1.png - Slideshow front end. 

2. screenshot-2.gif - Add new album / category.

3. screenshot-3.gif - Edit image.

4. screenshot-4.png - bulk upload.

5. screenshot-5.gif - edit album / category.

6. screenshot-6.gif - short code to be placed in the content.

Working demo: http://wpslideshow.com/3d-banner-rotator/


Installation Video : http://www.youtube.com/watch?v=mQw0SWNA-yo&list=UU4bTFFL_yWSKFnoaR6PSEYg&index=22&feature=plcp

== changelog ==
1.0 
released version

1.1
added customization option on slideshow frgments(Slideshow Fragments(2D/3D))

1.2
Fixed : image scaling issue.

2.0
It is completely new built. Supports categories and bulk upload of images. It is not possible to upgrade from your old version to new version. You need to uninstall your old version then install the new version. Plesae do remember to take backup of your old slideshow before you proceed.

2.1
Where ever you place the short code, there only the slider shows. Previously it use to show on top of content.

2.2
Fixed security bugs