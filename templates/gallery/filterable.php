<div class="apg-gallery-filterable" data-url="<?= admin_url('admin-ajax.php?action=apg_filter_album'); ?>" data-size="<?= $size; ?>">
  <div class="overlay"></div>
  <div class="apg-gallery-filterable-nav">
    <ul>
      <li><a 
             class="apg-gallery-filterable-nav-item active" 
             data-filter="<?= $default; ?>"
             data-nonce="<?= wp_create_nonce('apg_album_filter_'.$default); ?>" 
             href="#"><?= get_the_title( $default ); ?></a></li>
      
      <?php  for($i=0;$i<count($nav);$i++): if( $default  == $nav[$i] ){ continue; } ?>
      
      <li><a 
             class="apg-gallery-filterable-nav-item" 
             data-filter="<?= $nav[$i]; ?>" 
             data-nonce="<?= wp_create_nonce('apg_album_filter_'.$nav[$i]); ?>" 
             href="#"
             ><?= get_the_title( $nav[$i] ); ?></a></li>
      
      <?php endfor; ?>
      
    </ul>
    
  </div>
  <div class="apg-gallery-filterable-content">
    <div class="apg-album-view-container">
    <?php
      aswin_photo_gallery()->get_template('album/grid',[
            'id' => intval($default),
            'size' => $size
          ]);
    ?>
    </div>
  </div>
</div>