 $(window).scroll(function() {
                if ($(this).scrollTop() > 1) {
                    $('.back-to-top').fadeIn(300);
                } else {
              $('.back-to-top').fadeOut(300);
                }
            });

 $(document).ready(function(){
	$(".swin_href").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		
		$('body,html').animate({scrollTop: top}, 1500, "swing");
	});
});