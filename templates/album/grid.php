<?php
      $default_size = 'medium';
      if(isset($size)){
            $default_size = $size;
      }
      $images = [];
      $title = get_the_title($id);
      $description = get_post_meta($id,'apg_description',true);

      if($img = get_post_meta($id,'apg_gallery',true)){
         $images = $img;
      }

      $images[] = get_post_thumbnail_id( $id );
?>
<div style="text-align:center;margin-top:50px;">
      <p class="album_description"><?php echo strip_tags($description); ?></p>
</div>
<div class="clearfix"><br/></div>
<?php if(! $images || ! count($images)){
            aswin_photo_gallery()->get_template('album-empty');
        }else{
            echo '<div class="album-photos">';
            for( $i=0;$i<count( $images );$i++ ){
                  $thumbnail = wp_get_attachment_image_src(intval($images[$i]), $default_size );
                  $large = wp_get_attachment_image_src(intval($images[$i]),'large');

                  aswin_photo_gallery()->get_template('album-photo',[
                        'thumbnail' => $thumbnail[0],
                        'large' => $large[0],
                        'id'  => $id
                  ]);
            }
            echo '<div class="clearfix"></div></div>';
        }
?>
<div class="clearfix"></div>
