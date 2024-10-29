<div class="wrap">
<h1><?php _e('Aswin Photo Gallery Settings','aswin-photo-gallery'); ?> </h1>
<form method="post" action="">
	<p>
		<?php _e('Please regenerate thumbnails once you chage cover image size.','aswin-photo-gallery'); ?> 
		<br/>
		<strong><?php _e('Use shortcode [apg_gallery] to display gallery on page or post.','aswin-photo-gallery'); ?></strong>
	</p>
	
	<table class="form-table">
		<tbody>
			
		<tr>
		<th scope="row"><label for="apg_cover_image"><?php _e('Cover image size','aswin-photo-gallery'); ?></label></th>
		<td>
			<input name="apg_cover_image" type="text" id="apg_cover_image" class="regular-text" placeholder="450X450" value="<?php echo $cover_image; ?>" required>	
		</td>
		</tr>
			
		<tr>
		<th scope="row"><label for="apg_album_column"><?php _e('Album columns','aswin-photo-gallery'); ?></label></th>
		<td>
			<?php
				$options = [
					'one_column' => __('One column','aswin-photo-gallery'),
					'two_column' => __('Two columns','aswin-photo-gallery'),
					'three_column' => __('Three columns','aswin-photo-gallery'),
					'four_column' => __('Four columns','aswin-photo-gallery'),
					'five_column' => __('Five columns','aswin-photo-gallery'),
				];
			?>
			<select name="apg_album_column" id="apg_album_column">
				<?php
				foreach($options as $key => $value): 
				$selected = '';
				if($album_column == $key){
					$selected = 'selected';
				}
				?>
				<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
				<?php endforeach; ?>
			</select>		
		</td>
		</tr>
			
		</tbody>
	</table>
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
	<?php wp_nonce_field('apg_save_settings'); ?>
</form>
</div>