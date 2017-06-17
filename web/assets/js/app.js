$(document).ready(function() {
   var flashes = $('.flash');
   flashes.each(function(flash) {
       setTimeout(function() {
          flashes.slideUp();
       }, 3000);
   });
   $('input').iCheck({
       checkboxClass: 'icheckbox_flat',
       radioClass: 'iradio_flat'
   });
});