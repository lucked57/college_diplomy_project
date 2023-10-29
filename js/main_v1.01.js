//jQuery(document).ready(function($){
	//open-close submenu on mobile
	//$('.cd-main-nav').on('click', function(event){
	//	if($(event.target).is('.cd-main-nav')) $(this).children('ul').toggleClass('is-visible');
	//});
//});


$('.cd-main-nav-mobile').hide();

$('.cd-main-nav').on('click', function(){
    $('.cd-main-nav-mobile').slideToggle(1000);
})
