(function ($) {
  $(document).ready(function() {
    $('#submit').click(function() {
      $.ajax({
        url: '/home',
        type: 'POST',
        data: {
          'title': $('#title').val(),
          'content': $('#content').val()
        },
        success: function(r) {
          console.log(r);
        }
      });

      return false;
    });
  })
})(window.jQuery);
