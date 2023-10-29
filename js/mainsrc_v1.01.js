//Скрытие трубки при скролле
        $(window).scroll(function() {
                if ($(this).scrollTop() > 1) {
                    $('#dws-phone').fadeIn(300);
                } else {
              $('#dws-phone').fadeOut(300);
                }
            });


  $(document).ready(function(){
	$("#footer-href, #navbar-brand, #review").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		
		$('body,html').animate({scrollTop: top}, 1500, "swing");
	});
});
if(window.location != 'http://onlinesborka.mcdir.ru.mcpre.ru/index_dress.php' && window.location != 'http://onlinesborka.mcdir.ru.mcpre.ru/index_dress.php' && window.location != 'http://onlinesborka.mcdir.ru.mcpre.ru/index_dress.php#reviews'){
    $('#review').hide();
    $('#review_notmain').show();
}