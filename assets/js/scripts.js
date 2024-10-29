jQuery(function($){
  
  $('.album-photos').masonry();
  
  $('.apg-album-photos-slider').apgsl();
  
  $(document).on('click','a.apg-modal-trigger',function(e){
    e.preventDefault();
    var btn = $(this);
    
    var url = btn.attr('href');
    
    var title = btn.attr('title');
    
    var album_id = btn.attr('data-album');
    
    var wp_nonce = btn.attr('data-nonce');
    
    var modal_container = $('#apg-modal-container');
    
    $('#apg-overlay').find('.album-title').text(title);
    
    modal_container.find('.apg-modal-content').html('<p style="text-align:center;margin-top:100px;">Loading..</p>');
    
    jQuery('body').toggleClass('apg_overlay');
    
    modal_container.toggleClass('active');
    
    $.post( url,{
      
      albumid : album_id,
      nonce : wp_nonce
      
    },function(response){
      
      var data = $.parseJSON(JSON.stringify(response));
      modal_container.find('.apg-modal-content').html(data);
    } );
  
  });
  
  
  
  $(document).on('click','#apg-modal-close',function(e){
    
    e.preventDefault();
    
    var modal_container = $('#apg-modal-container');
    
    modal_container.find('.apg-modal-content').html('');
    
    $('body').removeClass('apg_overlay');
    
    $('#apg-modal-container').removeClass('active');
    
  });
  
  
  $(document).on('click','#apg-overlay:not(".apg-photo-modal-trigger")',function(e){
    
    e.preventDefault();
    var modal_container = $('#apg-modal-container');
    modal_container.find('.apg-modal-content').html('');
    $('body').removeClass('apg_overlay');
    $('#apg-modal-container').removeClass('active');
    
  });
  
  
  $(document).on('click','a.apg-gallery-filterable-nav-item',function(e){
    e.preventDefault();
    var btn = $(this);
    
    if( btn.hasClass('active') ){
      return;
    }
    
    var nonce = btn.attr('data-nonce');
    var album_id = btn.attr('data-filter');
    var parent_ul = btn.parents('ul');
    var parent = btn.parents('.apg-gallery-filterable');
    
    if( btn.hasClass('busy') ){
      return;
    }
    
    var url = parent.attr('data-url');
    var img_size = parent.attr('data-size');
    var holder = parent.find('.apg-gallery-filterable-content').find('.apg-album-view-container');
    
    parent_ul.find('.active').removeClass('active');
    btn.addClass('active');
    holder.css('opacity','0.5');
    parent.addClass('busy');
    
    $.post(url,{
      id:album_id,
      _nonce:nonce,
      size:img_size
    },function(response){
      holder.html(response);
      holder.css('opacity','1');
      parent.removeClass('busy');
    });
    
  });
  
  
});