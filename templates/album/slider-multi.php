<?php
$images = [];
$title = get_the_title($id);
if($img = get_post_meta($id,'apg_gallery',true)){ $images = $img; }
$images[] = get_post_thumbnail_id( $id );
?>

<div class="clearfix"><br/></div>
<?php if(! $images || ! count($images)){
            aswin_photo_gallery()->get_template('album-empty');
}
else{ 
$autoplay = 'false';
$show_dots = 'false';
$show_arrows = 'false';
$slides_to_scroll = 1;
$slides_to_show = 3;
    
if(isset($settings['autoslide'])){
   $autoplay = 'true';  
}
   
if(isset($settings['dots'])){
   $show_dots = 'true';   
}
   
if(isset($settings['arrows'])){
   $show_arrows = 'true';  
}
   
if(isset($settings['no_of_items_to_slide'])){
   $slides_to_scroll = $settings['no_of_items_to_slide'];  
}
   
if(isset($settings['no_of_items_to_show'])){
   $slides_to_show = $settings['no_of_items_to_show'];  
}
   
if( $atts && !empty( $atts)){
   extract($atts);
}

$set = '"infinite":true,"autoplay":'.$autoplay.',"dots":'.$show_dots.',"arrows":'.$show_arrows.',"slidesToScroll":'.$slides_to_scroll.',"slidesToShow":'.$slides_to_show;

   
$set .= ',"responsive":[{ "breakpoint": 768, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } }]';
?>
<div class="apg-album-photos-slider <?= $class; ?>"
      data-apgsl='{<?= $set; ?>}'>
   <?php for( $i=0;$i<count( $images );$i++ ){ 
      $image = wp_get_attachment_image_src(intval($images[$i]), 'apg_cover_image' );
      $full = wp_get_attachment_image_src(intval($images[$i]), 'full' );
   ?>
      <div>
         <a style="margin:5px;border:1px solid #ccc;display:block;" data-apgfancybox="images-<?= $class; ?>" href="<?= $full[0]; ?>" class="apg-photo-modal-trigger">
            <img src="<?= $image[0]; ?>" class="img-responsive"/>
         </a>
      </div>
   <?php  } ?>
</div>
<div class="clearfix"></div>
<?php } ?>

