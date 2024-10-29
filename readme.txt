=== Photo Album - Albums, Carousel, Portfolio Gallery ===
Contributors: aswingiri
Tags: gallery, wordpress gallery plugin, image gallery, photo gallery, photo albums, image carousel, portfolio Gallery
Requires at least: 4.5
Tested up to: 5.8.2
Stable tag: 3.1
License: GPLv2 or later

Aswin Photo Gallery lets you  easily create beautiful image gallery which required no configuration to work on your wordpress installation.

== Description ==

Easy to set up and easy to use photo gallery that lets you create facebook style Image gallery for your wordpress based Blog or website. Albums can be displayed on pages or post with shortcode [apg_gallery]

= Features of the plugin include: =

* Portfolio Gallery
* Albums Carousel
* Photos Carousel
* Display Albums
* Display Individual Albums
* Exclude Certain Albums from gallery
* Include certain Albums in gallery
* Display Photos as portfolio or filterable with Album
* Ability to display as grid or slider


== Screenshots ==
1. Fancybox image view
2. Add new album
3. Settings
4. Album list



== Installation ==

Upload the aswin-photo-gallery wp-content/plugin in your wordpress installation, Activate it, Plugin is ready to use, it requires no configuration, It comes with predefined configuration for image sizes and number of columns to be displayed per row, you can customize it based on your requirement.

You can use [apg_gallery] shortcode on you page or post to display all albums or you can use [apg_album id=] shortcode to display images in certain album.

If you require more options, you can try other available shortcodes as per your need.


== Shortcodes ==

* Show a Gallery Grid view : [apg_gallery]

* Exclude certain albums in gallery view : [apg_gallery exclude=1,2,3]

* Show certain albums in gallery view : [apg_gallery only=1,2,3]

* Show album carousel : [apg_gallery type=slider] (This shortcode will also accept exclude or only attribute), you can also pass settings attributes [apg_gallery type=slider autoplay=true show_dots=true show_arrows=false slides_to_scroll=4 slides_to_show=4]

Show images in certain album:

* Show images grid view: [apg_album id=1]

* Show a different image size for image thumbnail: [apg_album id=1 img_size=thumbnail]

* Change layout with shortcode (Layout from the album settings will be used by default): 
[apg_album id=1 layout=grid]
[apg_album id=1 layout=slider]
[apg_album id=1 layout=slider_multi]

* You can also overwrite other settings from shortcode attributes:

[apg_album id=1 autoplay=false show_dots=true show_arrows=false slides_to_scroll=1 slides_to_show=3]
  
# Show Filterable / Portfolio Gallery : [apg_filterable]
  * You can exclude certain albums : [apg_filterable exclude=1,2,3]
  
  * You can show images from certain albums : [apg_filterable only=1,2,3]


