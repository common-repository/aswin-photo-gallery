<div id="apg-album-block-<?php echo $id; ?>" class="apg-album-block <?php echo apg_get_album_column(); ?>">
  
  <div class="holder">
    <a 
       title="<?php echo get_the_title($id); ?>"
       class="apg-modal-trigger" 
       data-nonce="<?php echo wp_create_nonce('apg_modal_trigger_'.$id); ?>" 
       href="<?php echo admin_url('admin-ajax.php?action=apg_view_album'); ?>" 
       data-album="<?php echo $id; ?>">
      
      <img 
           class="album-cover" 
           src="<?php echo $cover_image; ?>"
           alt="<?php echo get_the_title($id); ?>"
           title="<?php echo get_the_title($id); ?>"
           />
      
    <p class="album-details">
      <strong><?php echo $title; ?></strong>
      <small> - <?php echo $count; ?> <?php _e('Photos','aswin-photo-gallery'); ?></small>
    </p>
      
    </a>
  </div>
  
</div>