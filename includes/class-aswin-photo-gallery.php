<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('Aswin_Photo_Gallery')){
  
  
  class Aswin_Photo_Gallery {
    
    
    protected static $_instance = null;
    
    
    function __construct(){
       
      $this->includes();
      $this->init();
      
    }
    
    
    
    
    
    public static function instance() {
                if ( is_null( self::$_instance ) ) {
                    self::$_instance = new self();
                }
                return self::$_instance;
    }
    
    
    
    private function includes(){
      
      require APG_DIR.'includes/class-apg-admin-columns.php';
      require APG_DIR.'includes/class-apg-enqueue.php';
      require APG_DIR.'includes/class-apg-post-type.php';
      require APG_DIR.'includes/class-apg-shortcodes.php';
      require APG_DIR.'includes/class-apg-settings.php';
      require APG_DIR.'includes/class-apg-metaboxes.php';
      require APG_DIR.'includes/class-apg-ajax.php';
      require APG_DIR.'includes/functions.php';
      
      
    }
    
    
    private function init() {
      
      $admin_columns = new APG_Admin_Columns();
      $enqueue = new APG_Enqueue();
      $post_type = new APG_Post_type();
      $shortcode = new APG_Shortcodes();
      $ajax = new APG_Ajax();
      
      //if(is_admin()){
        $settings = new APG_Settings();
        $metaboxes = new APG_Metaboxes();
      //}
      
    }
    
    
    
    function get_template($file,$atts = []){
      
      
      if(! empty( $atts ) ) {
        extract( $atts );
      }
      
      $plugin_file = APG_DIR.'templates/'.$file.'.php';
      $theme_file = get_stylesheet_directory().'/aswin-photo-gallery/'.$file.'.php';
      
      if( file_exists( $theme_file ) ){
        $plugin_file = $theme_file;
      }
      
      include $plugin_file;
      
    }
    
    
  } // end class declaration
  
}



function aswin_photo_gallery(){
  return Aswin_Photo_Gallery::instance();
}