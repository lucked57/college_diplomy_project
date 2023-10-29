//$('#sign_div').hide();
//$('#login_div').hide();
//$('#contact_div').hide();

if ($(window).width() <= 1206){
    $('.account').hide();
}



$(function () {
    $('#account_t_l').click(function () {

        $('#pass_div_t').fadeIn(200);
        setTimeout(function () {
           $('#account_div_t').fadeOut(150);
        }, 200);
        $('.info').fadeOut(200);
    });
});

$(function () {
    $('#account_t_r').click(function () {

        $('#account_div_t').fadeIn(200);
        setTimeout(function () {
           $('#pass_div_t').fadeOut(150);
        }, 200);
        $('.info').fadeIn(200);
    });
});

$(function () {
    $('#close_account_t').click(function () {
        if ($(window).width() <= 1206){
        $('.account').fadeOut(120);
        }
        $('.info').fadeOut(120);
        
            $('#account_div_t').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
    });
});







$(function () {
    $('#pass_href_t, #close_pass_t').click(function () {

if ($(window).width() <= 1206){
 $('.account').fadeOut(120);
            setTimeout(function() {
                                $(".account").animate({ opacity: 'toggle'}, 450);
                            }, 500);
        $('.cd-main-nav-mobile').hide(500);
}


        
        // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);


        /*   if ($(window).width() <= 1650 && $(window).width() > 1550){
               $('#modal_div').animate({opacity: 'toggle'}, 500);
           $('#login_div').animate({opacity: 'toggle'}, 350);
           $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
                       }
           else{*/
        $('#pass_div_t').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $(".blur, .cd-fixed-bg").css("filter", "blur(7px)");
        //  }
    });

});
$(function () {
    $('#close_pass_t').click(function () {

        $(".messenge").fadeOut(300);

        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
        }, 500);

    });
});














$(function () {
    $('#pass_href, #close_pass').click(function () {
if ($(window).width() <= 1206){
 $('.account').fadeOut(120);
            setTimeout(function() {
                                $(".account").animate({ opacity: 'toggle'}, 450);
                            }, 500);
        $('.cd-main-nav-mobile').hide(500);
}
        
        
      /*  $('.info').fadeOut(120);
        setTimeout(function() {
                                $(".info").animate({ opacity: 'toggle'}, 450);
                            }, 500);
        // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);


        /*   if ($(window).width() <= 1650 && $(window).width() > 1550){
               $('#modal_div').animate({opacity: 'toggle'}, 500);
           $('#login_div').animate({opacity: 'toggle'}, 350);
           $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
                       }
           else{*/
        $('#pass_div').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $(".blur, .cd-fixed-bg").css("filter", "blur(7px)");
        //  }
    });

});
$(function () {
    $('#close_pass').click(function () {

        $(".messenge").fadeOut(300);

        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
        }, 500);

    });
});

$(function () {
    $('#account_us_l').click(function () {

        $('#pass_div').fadeIn(200);
        setTimeout(function () {
           $('#account_div').fadeOut(150);
        }, 200);
        $('.info').fadeOut(200);
    });
});

$(function () {
    $('#account_us_r').click(function () {

        $('#account_div').fadeIn(200);
        setTimeout(function () {
           $('#pass_div').fadeOut(150);
        }, 200);
        $('.info').fadeIn(200);
    });
});

$(function () {
    $('#close_account').click(function () {
        if ($(window).width() <= 1206){
        $('.account').fadeOut(120);
        }
        $('.info').fadeOut(120);
        
            $('#account_div').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
    });
});





$(function() {
    $('#cant-login-right').click(function(){
       /* if ($(window).width() <= 1650 && $(window).width() > 1550){
            $('#login_div').animate({ opacity: 'toggle'}, 350);
        
        setTimeout(function() {
                                $('#sign_div').animate({ opacity: 'toggle'}, 350);
                            }, 100);
        }
       else{*/ 
              $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        
        setTimeout(function() {
                                $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
                            }, 350);
     //   }
      
        $(".cant_login").animate({ opacity: 'toggle'}, 120);
        setTimeout(function() {
                                $(".cant_login").show();
                            }, 700);
    });
    
});



$(function() {
  
    $('#new_pass').click(function(){
        
         $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        
        setTimeout(function() {
                                $('#change_email_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
                            }, 350);
        
        $(".cant_login").animate({ opacity: 'toggle'}, 120);
        setTimeout(function() {
                                $(".cant_login").show();
                            }, 700);
        
        });
    
});



       $(function() {
    $('#close_change_email').click(function(){

     $(".messenge").fadeOut(300);
       $('#change_email_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
       // $('.cd-header').removeClass('color');
        $('#modal_div').animate({opacity: 'toggle'}, 500);
        setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);

    });
});





    
    
$(function() {
    $('#login_href, #close_login').click(function(){
        
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        
       // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
        
         $('.cant_login').fadeOut(120);
     /*   if ($(window).width() <= 1650 && $(window).width() > 1550){
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        $('#login_div').animate({opacity: 'toggle'}, 350);
        $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
                    }
        else{*/
            $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
            $('#modal_div').animate({opacity: 'toggle'}, 500);
            $(".cd-header").css("filter", "blur(5px)");
        $(".blur, .cd-fixed-bg").css("filter", "blur(7px)");
      //  }
        setTimeout(function() {
                                $(".cant_login").animate({ opacity: 'toggle'}, 500);
                            }, 600);
    });
    
});
       $(function() {
    $('#close_login').click(function(){

     $(".messenge").fadeOut(300);
       
        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
       // $('.cd-header').removeClass('color');
        setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);

    });
});
    





    

    $(function() {
    $('#sigh_href, #close_sing').click(function(){

        
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
     /*   if ($(window).width() <= 1650 && $(window).width() > 1550){
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        $('#sign_div').animate({opacity: 'toggle'}, 350);
        $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
                    }
        else{*/
            $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
           $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $(".blur, .cd-fixed-bg").css("filter", "blur(7px)");
       // }

    });
});
    
      $(function() {
    $('#close_sing').click(function(){
        setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);
    
       $(".messenge").fadeOut(300);
        $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
    



$(function() {
    $('#contact_href, #close_contact').click(function(){

        
        $('#login_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle'}, 500);
        
       // $('.cd-header').removeClass('color');
/*if ($(window).width() <= 1650 && $(window).width() > 1550){
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        $('#contact_div').animate({opacity: 'toggle'}, 350);
        $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
                    }
        else{*/
            $('#contact_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $(".blur, .cd-fixed-bg").css("filter", "blur(7px)");
       // }
    });
});


   $(function() {
    $('#close_contact').click(function(){

     setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);
       
       $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
