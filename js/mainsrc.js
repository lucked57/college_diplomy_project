//Скрытие трубки при скролле
        $(window).scroll(function() {
                if ($(this).scrollTop() > 1) {
                    $('#dws-phone').fadeIn(300);
                } else {
              $('#dws-phone').fadeOut(300);
                }
            });


