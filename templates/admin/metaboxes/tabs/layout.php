<div class="layout-types">
<input type="radio" class="apg_layout" name="apg_layout" id="apg-layout-grid" value="grid" <?php if($layout == 'grid'){ echo 'checked="checked"'; } ?>/>
<label for="apg-layout-grid" class="apg_layout_label">
<img src="<?= APG_URL.'/assets/images/view-grid.png'; ?>"/>
</label>

<input type="radio" class="apg_layout" name="apg_layout" id="apg-layout-slider" value="slider" <?php if($layout == 'slider'){ echo 'checked="checked"'; } ?>/>
<label for="apg-layout-slider" class="apg_layout_label">
<img src="<?= APG_URL.'/assets/images/view-slider.png'; ?>"/>
</label>

<input type="radio" class="apg_layout" name="apg_layout" id="apg-layout-slider-multi" value="slider_multi" <?php if($layout == 'slider_multi'){ echo 'checked="checked"'; } ?>/>
<label for="apg-layout-slider-multi" class="apg_layout_label">
<img src="<?= APG_URL.'/assets/images/view-slider-multi.png'; ?>"/>
</label>


<div class="clear"></div>
</div>
