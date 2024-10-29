<div id="cover-image-holder" style="background:url(<?= $image_url; ?>);">
    <div class="cover-image-content">
    <div class="img-preview"></div>
    <p><a class="button button-primary apg-change-cover" href="#" data-text="Change album cover"><?= $btn_text; ?></a></p>
    </div>
</div>
<input type="hidden" id="_thumbnail_id" value="<?php if($thumbnail_id){ echo $thumbnail_id; } ?>" name="_thumbnail_id"/>
