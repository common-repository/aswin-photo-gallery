<?php
function apg_get_photo_count( $album_id ){
   
   $count = 1;
   
   $photos = get_post_meta( $album_id ,'apg_gallery', true);
   
   if($photos && is_array($photos)){
      $count = $count + count($photos);
   }
   
   return $count;
   
}


$image_settings = get_option('apg_image');
add_image_size('apg_album_thumb',$image_settings['album_cover_thumbnail_width'],$image_settings['album_cover_thumbnail_height'],true);


add_action( 'plugins_loaded', function(){
   
   $default_cover_size = '450X450';
   $cover_size_setting = get_option( 'apg_cover_image' );
   
   if( $cover_size_setting ) {
      
      $default_cover_size = $cover_size_setting;
      
   }
   
   $cover_size = strtolower($default_cover_size);
   $cover_size = explode('x',$cover_size);
   
   if(count($cover_size) == 2) {
      
      add_image_size( 'apg_cover_image'  ,intval( $cover_size[0] ), intval( $cover_size[1] ),true );
      
   }
   
   
});


function apg_get_album_column() {
   
   $column = 'three_column';
   $column_setting = get_option('apg_album_column');
   if($column_setting){
      $column = $column_setting;
   }
   
   return $column;
}

function apg_album_cover_id( $album_id ){
   if(has_post_thumbnail( $album_id)){
      return get_post_thumbnail_id($album_id);
   }else{
      $photos = get_post_meta($album_id,'apg_gallery',true);
      if($photos){
         return $photos[0];
      }
   }
   
   return false;
}


function apg_generate_cover_image(){
   $img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcIAAAHCAQMAAABG1lsGAAAABlBMVEXu7u7u7u4MXmA/AAAACXBIWXMAAA7EAAAOxAGVKw4bAAACFElEQVR4nO3VT2rbQBSA8TcZI3nhxunOpQur9AKGbroIVKUXUW+QZRalmZB79CwDvYiO4GULoeq8N8KRE6LRAb5fSAxGnzPW/JEIAAAAAAAAAAAAAAAAAAAAAAB4bh+ev7ONhaQWGYYgf4+nd3yQuyHKjz/lMv07F3bTsk0vcVMot6lKV8vTdXWQqJ9VFcr3VlbydN0bK336mffJys3kundWVvb+nI8vyrcLy292xW5y3Qcr0/eO8+XvF+X3heWDNVc2N9lXK9dic/M658Wll8OkvA9ioyiU/lRGnZj06k5lN1tWk9Lbxd4tK1eT0tkXvFhYrlNZ97mUqDdrlf48HMvlLpXXj9JY2ely2KTy10+92/PlIZWxGsuDLt5dKntfLptUBq9lmyLdMFf6dV1IZTNbtjpAF3K50U3a2GqKxTLaSg95tFW6UdJZ2RZHG6yMufS9NlZ2pdLJtHRRP2tZOe789nAqXS6b0nxWZ6Xv9LOWlauzUu/QxcLyUk/NXIY8K7Wemrls58rtMDxKnoOQV0I9DP+0LO7scbT5NLHVN462fJrkWcmlrfhcdkvLte1S22VjuZqcL6+XLth5m3d2LmP5vM2lPR3yaTKW5aeDl7ySNjKeYFbqSio9kbS6PHsKalUveAqm1dbfivQ3k1KO1yI3n8uj/dKn3zgt9+kJvu8LJQAAAAAAAAAAAAAAAAAAAAAAo/8Tr35ljz7M9QAAAABJRU5ErkJggg==';
   return $img;
}



add_filter('the_content',function($content){
   
   if(is_singular('apg')){
         global $post;
         ob_start();
          aswin_photo_gallery()->get_template('album-content',[
            'id' => $post->ID,
            'hide_title' => 1
          ]);
        
          $content = ob_get_contents();
          ob_end_clean();
      
   }
   
   return $content;
   
});



function apg_get_ajax_loader(){
   return APG_URL.'/assets/images/ajax-loader.gif';
}