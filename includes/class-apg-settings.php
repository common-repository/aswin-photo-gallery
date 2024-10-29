<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('APG_Settings')){
  
  
  class APG_Settings {
    
    
    
    function __construct(){
       
      add_action('admin_menu',array($this,'add_settings_submenu_page'));
      
    }
    
    
    
    function add_settings_submenu_page() {
      
      add_submenu_page(
        'edit.php?post_type=apg',
        'Settings',
        'Settings',
        'manage_options',
        'aswin-photo-gallery-settings',
        array($this,'aswin_photo_gallery_plugin_settings_page')
      );
      
    }
    
    
    
    function aswin_photo_gallery_plugin_settings_page() {
   
       if(isset($_POST['apg_album_column'],$_POST['apg_cover_image'])) {
           if(wp_verify_nonce( $_POST['_wpnonce'] , 'apg_save_settings')) {
             
               update_option('apg_cover_image', esc_attr( $_POST['apg_cover_image'] ));
               update_option('apg_album_column', esc_attr( $_POST['apg_album_column'] ));
             
           }
       }

       aswin_photo_gallery()->get_template('admin/settings',[
          'cover_image' => get_option( 'apg_cover_image' ),
          'album_column' => get_option( 'apg_album_column' )
       ]);
      
      
    }
    
    
    
    
  } // end class
  
}
