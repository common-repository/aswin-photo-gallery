<?php
/*
Plugin Name:  Aswin Photo Gallery
Plugin URI:   http://resume.aswin.com.np
Description:  Photo Gallery plugin that lets you create beautiful photo gallery and image Carousel. 
Version:      3.1
Author:       Aswin Giri
Author URI:   http://resume.aswin.com.np
Text Domain:  aswin-photo-gallery

**************************************************************************
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if(! defined('APG_DIR')){
   define('APG_DIR',plugin_dir_path(__FILE__));
}

if(! defined('APG_URL')){
   define('APG_URL',plugin_dir_url(__FILE__));
}


function aswin_photo_gallery_i18n() {
    load_plugin_textdomain( 'aswin-photo-gallery', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'aswin_photo_gallery_i18n' );



include_once(APG_DIR.'includes/class-aswin-photo-gallery.php');

aswin_photo_gallery();


// tests

