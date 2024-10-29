<?php if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('APG_Metaboxes')){


  class APG_Metaboxes {



    function __construct(){

      add_action('add_meta_boxes', array($this,'apg_add_gallery_metabox'));
      add_action('do_meta_boxes', array($this, 'remove_thumbnail_box'));
      add_action('save_post', array( $this , 'apg_gallery_meta_save'));

    }

          function apg_album_tabs_meta_html( $post ){

            aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs',['post' => $post]);

          }
    
    
          function remove_thumbnail_box(){
            remove_meta_box( 'postimagediv','apg','side' );
          }


          function apg_add_gallery_metabox( $atts=[]) {

                  add_meta_box(
                    'apg-single-album-tabs',
                    'Album details',
                    array($this,'apg_album_tabs_meta_html'),
                    'apg',
                    'normal',
                    'high'
                  );
          }


          function apg_gallery_meta_save( $post_id ) {

            // save images
            if( isset( $_POST['apg_gallery'] ) ){

              $post_apg_gallery = $_POST['apg_gallery'];

              if(! is_array($post_apg_gallery)) return;

              foreach($post_apg_gallery as $key => $image_id):

                if(! is_numeric($image_id)) return;

                endforeach;

              update_post_meta($post_id, 'apg_gallery',$post_apg_gallery);

            }
            else
            {
              delete_post_meta($post_id, 'apg_gallery');
            }

            // save description
            if(isset($_POST['apg_description']))
            {
              $post_description = esc_attr( $_POST['apg_description'] );
              update_post_meta($post_id, 'apg_description',$post_description);
            } else {
              delete_post_meta($post_id, 'apg_description');
            }



            // save layout
            if(isset($_POST['apg_layout']))
            {
              $post_layout = esc_attr( $_POST['apg_layout'] );
              update_post_meta( $post_id, 'apg_layout', $post_layout);
            }


            // save settings
            if(isset($_POST['apg_album_setting']))
            {
              $apg_album_setting = $_POST['apg_album_setting'];
              update_post_meta( $post_id, 'apg_album_setting', $apg_album_setting );
            }


          }


      }
}