$(function($) {
  $('.short_cuts').on('click', function(event) {        
    $('.dropdown-menu').toggle('show');
  });

  $('#more').on('click', function(event) {        
    $('span.more').remove();
  });

});


