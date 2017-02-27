(function (window, $) {
  'use strict';

  var stellarVert = $('body').hasClass('admin-bar') ? 132 : 100;

  $.stellar({
    horizontalScrolling: false,
    verticalOffset: stellarVert
  });

  $(window.document).on('gform_post_render',function(){
    $('.gfield').each(function(){
      $(this).find('input, textarea, select').not('input[type="checkbox"], input[type="radio"]').addClass('form-control');
    });
    $('.gfield_checkbox, .gfield_radio').find('input[type="checkbox"], input[type="radio"]').each(function(){
      var sib = $(this).siblings('label');
      $(this).prependTo(sib);
    }).end().each(function(){
      $(this).after('<span class="help-block"></span>');
      if($(this).is('.gfield_checkbox')){
        $(this).addClass('checkbox');
      } else {
        $(this).addClass('radio');
      }
    });
  });
})(this, jQuery);

jQuery(document).ready(function($){
  var index = 2;
  var totalNumberOfImages = 2;
  function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
      $('<img/>')[0].src = this;
    });
  }
  // image swapping script for the Call for Presentations page
  function swapImageSource() {
    $('#horizons-presenter').fadeOut(500,function(){
      $(this).fadeIn(500)[0].src = '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-' + index + '.jpg';
      index == totalNumberOfImages ? index = 1 : index += 1;
      setTimeout(swapImageSource, 5000);
    });
  }
  if ( $('#horizons-presenter').length && $('#horizons-presenter').is(':visible') ) { //if exists and is visible (i.e. not the mobile view)
    totalNumberOfImages = 6;
    preload([
      '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-2.jpg',
      '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-3.jpg',
      '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-4.jpg',
      '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-5.jpg',
      '/wp-content/themes/horizons-2015/img/planview-horizons-presenter-6.jpg'
    ]);
    setTimeout(swapImageSource, 5000);
  }
  // image swapping script for the Hotel & Travel page
  function swapImageSourceVenue() {
    $('#horizons-venue').fadeOut(500,function(){
      $(this).fadeIn(500)[0].src = '/wp-content/uploads/sites/7/2017/02/fairmont-austin-hotel-' + index + '.jpg';
      index == totalNumberOfImages ? index = 1 : index += 1;
      setTimeout(swapImageSourceVenue, 5000);
    });
  }
  if ( $('#horizons-venue').length ) { //if exists
    preload([
      '/wp-content/uploads/sites/7/2017/02/fairmont-austin-hotel-2.jpg'
    ]);
    setTimeout(swapImageSourceVenue, 5000);
  }
});
