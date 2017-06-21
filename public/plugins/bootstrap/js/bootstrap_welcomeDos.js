$(window).resize(function(){
  if ($(window).width() >= 1000) {  
    $('.link').show();
  } 
});
//show links on click
$('.menu').on('click', function() {
  $('.link').fadeToggle(200);
});
