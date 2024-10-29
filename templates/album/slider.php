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
   
if(isset($settings['autoslide'])){
   $autoplay = 'true';  
}
   
if(isset($settings['dots'])){
   $show_dots = 'true';   
}
   
if(isset($settings['arrows'])){
   $show_arrows = 'true';  
}
   
if( $atts && ! empty( $atts)){
   extract($atts);
}

$set = '"infinite":true,"autoplay":'.$autoplay.',"dots":'.$show_dots.',"arrows":'.$show_arrows;
?>
<div class="apg-album-photos-slider <?= $class; ?>"
      data-apgsl='{<?= $set; ?>}'>
   <?php for( $i=0;$i<count( $images );$i++ ){ 
      $full = wp_get_attachment_image_src(intval($images[$i]), 'full' );
   ?>
      
      <div>
            <img src="<?= $full[0]; ?>" class="img-responsive"/>
      </div>
   <?php  } ?>
</div>
<div class="clearfix"></div>
<?php } ?>

