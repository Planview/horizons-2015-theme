(function (window, $) {
  'use strict';

  var stellarVert = $('body').hasClass('admin-bar') ? 132 : 100;

  $.stellar({
    horizontalScrolling: false,
    verticalOffset: stellarVert
  });
})(this, jQuery);
