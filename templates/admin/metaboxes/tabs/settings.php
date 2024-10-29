<!--<p class="description">
  These settings will be used only if you have used album shortcode [apg_album id=""] and will be ignored while you use [apg_gallery] shortcode. Data saved on these fields can be overwritten from shortcode attributes.
</p>-->
<?php
/*echo '<pre>';
print_r($settings);
echo '</pre>';*/

if( ! $settings ){
  $autoslide = 1;
  $arrows = 1;
  $dots = 1;
  $no_of_items_to_slide = 1;
  $no_of_items_to_show = 3;
}elseif($settings && is_array($settings)){
  extract($settings);
}
?>

<table class="form-table">
  
  <tr>
      <th><label>Auto slide</label></th>
      <td>
        <input 
               type="checkbox" 
               name="apg_album_setting[autoslide]" 
               value="1"
               <?php if( $autoslide == 1 ){ echo 'checked'; } ?>
               /> Automatically slide the album slider view
      </td>
  </tr>
  
  <tr>
      <th><label>Arrow navigation</label></th>
      <td>
        <input 
               type="checkbox" 
               name="apg_album_setting[arrows]" 
               value="1"
               <?php if( $arrows ){ echo 'checked'; } ?>
               /> Show arrow navigation
      </td>
  </tr>



  <tr>
      <th><label>Show dot navigation</label></th>
      <td>
        <input 
               type="checkbox" 
               name="apg_album_setting[dots]" 
               value="1"
               <?php if( $dots == 1 ){ echo 'checked'; } ?>
               /> Show dots
      </td>
  </tr>
  
  <tr>
      <td colspan="2">
        <p class="description">Only for multi slide view</p>
        <hr/>
      </td>
  </tr>

  <tr>
      <th><label>No. of items to slide</label></th>
      <td>
        <input 
               type="number" 
               name="apg_album_setting[no_of_items_to_slide]" 
               class="widefat" value="<?php echo $no_of_items_to_slide; ?>"
               /> 
      </td>
  </tr>

  <tr>
      <th><label>No. of items to show</label></th>
      <td>
        <input 
               type="number" 
               name="apg_album_setting[no_of_items_to_show]" 
               class="widefat" 
               value="<?php echo $no_of_items_to_show; ?>"
               /> 
      </td>
  </tr>
  
</table>
