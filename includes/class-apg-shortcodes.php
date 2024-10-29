<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('APG_Shortcodes')){
  
  
  class APG_Shortcodes {
    
    
    
    function __construct(){
       
      add_shortcode('apg_gallery',array($this,'apg_gallery_shortcode'));
      add_shortcode('apg_album',array($this,'apg_gallery_album'));
      add_shortcode('apg_filterable',array($this,'apg_filterable_gallery_callback'));
      add_action('wp_footer',array($this,'modal_html'));
      
    }
    
    
    
    
    function apg_gallery_shortcode( $atts=[]) {
      
        $settings = [];
      
        $args = [
          'post_type' => 'apg',
          'posts_per_page' => -1
        ];
      
        if(isset($atts['exclude'])){
          $exclude_posts = explode(',',$atts['exclude']);
          $args['post__not_in'] = $exclude_posts;
        }
      
        if(isset($atts['only'])){
          $include_posts = explode(',',$atts['only']);
          $args['post__in'] = $include_posts;
        }
      
        $query = new WP_Query($args);
      
          ob_start();
          if(isset($atts['type']) && $atts['type'] == 'slider'):
      
            $autoplay = 'true';
            $show_dots = 'true';
            $show_arrows = 'true';
      
            $slides_to_scroll = '1';
            $slides_to_show = '3';
      
            if( $atts && !empty( $atts)){
               extract($atts);
            }
            
            $set = '"infinite":true,"autoplay":'.$autoplay.',"dots":'.$show_dots.',"arrows":'.$show_arrows.',"slidesToScroll":'.$slides_to_scroll.',"slidesToShow":'.$slides_to_show;
   
            $set .= ',"responsive":[{ "breakpoint": 768, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } }]';
          ?>
            <div id="apg-album-view-container" class="clearfix apg-album-photos-slider" data-apgsl='{<?= $set; ?>}'>
          <?php
          else:
            echo '<div id="apg-album-view-container" class="clearfix">';
          endif;
          if($query->have_posts()):
      
            while($query->have_posts()):$query->the_post();
              $cover_id = apg_album_cover_id(get_the_id());
              $cover_photo = wp_get_attachment_image_src($cover_id,'apg_cover_image');
              if($cover_photo){
                $cover_image = $cover_photo[0];
              }else{
                $cover_image = apg_generate_cover_image();
              }
      
              $title = get_the_title();
      
              aswin_photo_gallery()->get_template( 'album', [
                'title'           => $title,
                'cover_image'     => $cover_image,
                'count'           => apg_get_photo_count( get_the_id() ),
                'id'              => get_the_id()
              ] ); 
      
            endwhile;
            
          else:
      
            aswin_photo_gallery()->get_template( 'no-albums');
      
          endif;
      
          echo '</div>';
      
          $content = ob_get_contents();
      
          ob_end_clean();
      
          return $content;
      
      }
    
    
    
    
      function apg_gallery_album( $atts = []) {
          $size = 'apg_cover_image';
        
          if( ! isset($atts['id'])){
            return 'Please pass ID';
          }
          if(isset($atts['img_size'])){
            $size = $atts['img_size'];
          }
        
          $photos = get_post_meta( intval($atts['id']) , 'apg_gallery' , true );
        
          if( ! $photos || ! is_array($photos)){
            return 'No photos has been added.';
          }
        
          $id = intval( $atts['id'] );
          $layout = get_post_meta($id,'apg_layout',true);
          
          if(isset($atts['layout'])){
            $layout = $atts['layout'];
          }
        
          return $this->get_single_album_view( $id , $layout , $size ,$atts );
       
      }
    
    
    function modal_html() {
      aswin_photo_gallery()->get_template( 'modal');
    }
    
    
    function get_single_album_view( $id , $layout , $size , $atts=[]){
      ob_start();
      
      if($layout == 'slider'):
      
      $settings = get_post_meta( $id, 'apg_album_setting',true );
      aswin_photo_gallery()->get_template('album/slider',[
            'id' => $id,
            'settings' => $settings,
            'class' => $layout.'-'.$id,
            'atts'  => $atts
          ]);
      
      elseif($layout == 'slider_multi'):
      
        $settings = get_post_meta( $id, 'apg_album_setting',true );
        aswin_photo_gallery()->get_template('album/slider-multi',[
            'id' => $id,
            'settings' => $settings,
            'class' => $layout.'-'.$id,
            'atts'  => $atts
          ]);
      
      elseif($layout == 'grid'):
        echo '<div class="apg-album-view-container '.$layout.'-'.$id.'">';
          aswin_photo_gallery()->get_template('album/grid',[
            'id' => $id,
            'size' => $size,
            'atts'  => $atts
          ]);
          echo '</div>';
      else:
      
        echo 'Invalid settings';
      
      endif;
      
      $content = ob_get_contents();
      ob_end_clean();
      return $content;
    }
    
    
    
    
    function apg_filterable_gallery_callback( $atts= [] ){
      
      $exclude = [];
      $only = [];
      
      if(isset($atts['exclude'])){
          $exclude = explode(',',$atts['exclude']);
      }
      
      if(isset($atts['only'])){
          $only = explode(',',$atts['only']);
      }
      
      
        $args = [
          'post_type' => 'apg',
          'posts_per_page' => -1
        ];
      
        if( ! empty( $exclude ) ){
          $args['post__not_in'] = $exclude;
        }
      
        if(! empty( $only ) ){
          $args['post__in'] = $only;
        }
      
        $query = new WP_Query( $args );
        if($query->have_posts()):
          $size = 'apg_cover_image';
          $default_album = false;
      
          if(isset($atts['default'])){
              $default_album = $atts['default'];
          }
      
          if(isset($atts['img_size'])){
              $size = $atts['img_size'];
          }
      
          $nav = [];
          while( $query->have_posts() ) : $query->the_post();
      
            if(! $default_album ){
              $default_album = get_the_id();
            }
      
            $nav[] = get_the_id();
      
          endwhile;
          wp_reset_postdata();
        endif;
        ob_start();
        aswin_photo_gallery()->get_template( 'gallery/filterable', [
                'nav'   => $nav,
                'default' => intval($default_album),
                'size' => $size
              ] );
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
       
    }
    
    
    
    
    
  } // end class
  
}