
//tabs
jQuery(function( $ ){
  $(document).on('click','.apg-album-tab-nav-item',function(e){
    e.preventDefault();
    var btn  = $(this);
    var content = btn.attr('href');
    if(! $(content).hasClass('active')){
      $('.apg-album-tab').find('.apg-album-tab-content').find('.active').removeClass('active');
      $(content).addClass('active');
      $('.apg-album-tab-nav').find('.active').removeClass('active');
      btn.parent('li').addClass('active');

    }
  });
});






/// images
jQuery(function($) {

  var file_frame;

  $(document).on('click', 'a.gallery-add', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: true
    });

    file_frame.on('select', function() {
      var listIndex = $('#gallery-metabox-list li').index($('#gallery-metabox-list li:last')),
          selection = file_frame.state().get('selection');

      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        index      = listIndex + (i + 1);



        $('#gallery-metabox-list').append('<li><input type="hidden" name="apg_gallery[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><span class="controls"><a class="remove-image" href="#">&times;</a></span></li>');

      });
    });

    makeSortable();

    file_frame.open();

  });

  function resetIndex() {
    $('#gallery-metabox-list li').each(function(i) {
      $(this).find('input:hidden').attr('name', 'apg_gallery[' + i + ']');
    });
  }

  function makeSortable() {
    $('#gallery-metabox-list').sortable({
      opacity: 0.6,
      stop: function() {
        resetIndex();
      }
    });
  }

  $(document).on('click', 'a.remove-image', function(e) {
    e.preventDefault();

    $(this).parents('li').animate({ opacity: 0 }, 200, function() {
      $(this).remove();
      resetIndex();
    });
  });

  makeSortable();

});




//change cover image
jQuery(function($){
  var file_frame;
  $(document).on('click','.apg-change-cover',function(e){
    e.preventDefault();
    var that = $(this);
    if (file_frame) file_frame.close();
    file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select cover image',
      button: {
        text: 'Use as cover image',
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      attachment = file_frame.state().get('selection').first().toJSON();
      $('body').find('input:hidden[name="_thumbnail_id"]').attr('value', attachment.id);
      $('body').find('.cover-image-content').find('.img-preview').html('<img src="'+attachment.sizes.full.url+'" style="max-width:100%"/>');
    });

    file_frame.open();

  });
});
