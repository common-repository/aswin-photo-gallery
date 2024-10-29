<div class="apg-postbox-container">
<div class="apg-album-tab">

  <div class="apg-album-tab-nav">
      <ul>
          <li class="active"><a class="apg-album-tab-nav-item" href="#album-cover">Album cover</a></li>
          <li class=""><a class="apg-album-tab-nav-item" href="#album-images">Images</a></li>
          <li class=""><a class="apg-album-tab-nav-item" href="#album-description">Description</a></li>
          <li><a class="apg-album-tab-nav-item" href="#album-layout">Layout</a></li>
          <li><a class="apg-album-tab-nav-item" href="#album-settings">Settings</a></li>
      </ul>
      <div class="clear"></div>
  </div>

  <div class="apg-album-tab-content">

      <div class="tab-content active" id="album-cover">
        <?php
        $thumbnail_id = null;
        $image_url = null;
        $btn_text = 'Add album cover';
        if(has_post_thumbnail($post->ID)):
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $image = wp_get_attachment_image_src($thumbnail_id,'large');
          $image_url = $image[0];
          $btn_text = 'Change album cover';
        endif;
          aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs/cover',[
            'thumbnail_id' => $thumbnail_id,
            'image_url' => $image_url,
            'btn_text'  => $btn_text
          ]);
         ?>
      </div>

      <div class="tab-content" id="album-images">
          <?php
            $ids = get_post_meta($post->ID, 'apg_gallery', true);
            aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs/photos', [
                'ids' => $ids
              ]);
           ?>
      </div>

      <div class="tab-content" id="album-description">
          <?php
          aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs/description',[
            'description' => get_post_meta($post->ID, 'apg_description', true)
          ]);
           ?>
      </div>

      <div class="tab-content" id="album-layout">
        <?php
          $layout = 'grid';
          if( $saved_layout = get_post_meta( $post->ID, 'apg_layout',true ) ){
            $layout = $saved_layout;
          }
          aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs/layout',[
            'layout' => $layout
          ]);
         ?>
      </div>

      <div class="tab-content" id="album-settings">
        <?php
          $settings = get_post_meta( $post->ID, 'apg_album_setting',true);
          aswin_photo_gallery()->get_template( 'admin/metaboxes/tabs/settings',[
            'settings' => $settings
          ]);
         ?>
      </div>

  </div>
<div>
</div>

<script src="<?php echo APG_URL.'/assets/js/gallery-metabox.js'; ?>"></script>
