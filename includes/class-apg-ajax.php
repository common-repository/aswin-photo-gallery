<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('APG_Ajax')){
  
  
  class APG_Ajax {
    
    
    
    function __construct(){
       
      add_action('wp_ajax_apg_view_album',array($this,'apg_view_album'));
      add_action('wp_ajax_nopriv_apg_view_album',array($this,'apg_view_album'));
      add_action('wp_ajax_apg_filter_album',array($this,'apg_album_filter'));
      add_action('wp_ajax_nopriv_apg_filter_album',array($this,'apg_album_filter'));
      
    }
    
    
    
    function apg_view_album(){
      
      $album_id = intval($_POST['albumid']);
      
      if( ! wp_verify_nonce($_POST['nonce'],'apg_modal_trigger_'.$album_id)){
        echo 'Invalid request';
        die;
      }
      
      aswin_photo_gallery()->get_template('album-content',[
        'id' => $album_id,
        'size' => 'apg_cover_image'
      ]);
      
      die;
      
    }
    
    
    
    
    function apg_album_filter(){
      
      if(! wp_verify_nonce($_POST['_nonce'],'apg_album_filter_'.$_POST['id'])){
        echo 'Invalid request';
        die;
      }
      
      ob_start();
      aswin_photo_gallery()->get_template('album/grid',[
        'id' => intval($_POST['id']),
        'size' => $_POST['size'],
        'hide_title' => 1
      ]);
      echo ob_get_clean();
      die;
    }
    
  } // end class
  
}