/**
 * Opens and closes the menu.
 */
(function($) {
  $(document).ready(function() {
    $('.menu-button > button').click(function() {
      $(this).parent().next().toggle();
    });
  })
})(window.jQuery);
