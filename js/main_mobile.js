//jQuery(document).ready(function($){
	//$('.cd-main-nav').on('click', function(event){
	//	if($(event.target).is('.cd-main-nav')) $(this).children('ul').toggleClass('is-visible');
	//});
//});


$('.cd-main-nav-mobile').hide();

  $.fn.slideFadeToggle = function(speed, easing, callback){
      return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
    };


$('.cd-main-nav').on('click', function(){
    //$('.cd-main-nav-mobile').stop(false, true);
    $('.cd-main-nav-mobile').stop(true);
    $('.cd-main-nav-mobile').queue('fx', $('.cd-main-nav-mobile').slideFadeToggle(600));
    $('.cd-main-nav-mobile').dequeue('fx');
});

 

