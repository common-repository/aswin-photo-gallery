<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('APG_Admin_Columns')){

  class APG_Admin_Columns {



    function __construct(){

		add_filter( 'manage_apg_posts_columns',array( $this,'add_custom_columns' ));
		add_action("manage_apg_posts_custom_column", array( $this , 'custom_column_data' ));
    add_filter( 'enter_title_here', array( $this , 'apg_change_title_placeholder') );

    }



	function custom_column_data( $column ) {

			global $post;

			switch($column){
				case 'apg_cover':
				echo '<img src="'.get_the_post_thumbnail_url($post->ID,'thumbnail').'" width="80" height="auto"/>';
				break;

				case 'apg_image_count':
					$count = apg_get_photo_count($post->ID);
          echo $count;
				  break;
        case 'apg_album_shortcode':
          echo '[apg_album id="'.get_the_id().'"]';
          break;

			}
	}


	function add_custom_columns($columns) {

    $columns = array(
      'date' => 'Created on',
      'apg_cover' => 'Cover image',
      'title' => 'Album title',
      'apg_image_count' => 'Images',
      'apg_album_shortcode' => 'Shortcode',
    );

		return $columns;

	}


  function apg_change_title_placeholder( $title ){

    $screen = get_current_screen();
    
    if  ( 'apg' == $screen->post_type ) {
          $title = 'Album title';
     }

     return $title;
  }


  } // end class

}
