//jQuery(document).ready(function($){
	//$('.cd-main-nav').on('click', function(event){
	//	if($(event.target).is('.cd-main-nav')) $(this).children('ul').toggleClass('is-visible');
	//});
//});


$('.cd-main-nav-mobile').hide();



$('.cd-main-nav').on('click', function(){
    //$('.cd-main-nav-mobile').stop(false, true);
    $('.cd-header').toggleClass('color');
    $('.cd-main-nav-mobile').stop(true);
    $('.cd-main-nav-mobile').queue('fx', $('.cd-main-nav-mobile').animate({ height: 'toggle', opacity: 'toggle' }, 600));
    $('.cd-main-nav-mobile').dequeue('fx');
});

 

