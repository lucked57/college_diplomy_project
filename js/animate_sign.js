
//$('#sign_div').hide();
//$('#login_div').hide();
//$('#contact_div').hide();

$(function() {
    $('#cant-login-right').click(function(){
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        
        setTimeout(function() {
                                $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
                            }, 100);
        $(".cant_login").animate({ opacity: 'toggle'}, 120);
        setTimeout(function() {
                                $(".cant_login").show();
                            }, 700);
    });
    
});




    
    
$(function() {
    $('#login_href, #close_login').click(function(){
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        $('#modal_div').animate({opacity: 'toggle'}, 500);
       // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $("div:not(.signup-div, .close, .cant_login, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "blur(5px)");
         $('.cant_login').fadeOut(120);
        setTimeout(function() {
                                $(".cant_login").animate({ opacity: 'toggle'}, 500);
                            }, 600);
    });
    
});
       $(function() {
    $('#close_login').click(function(){

     $(".messenge").fadeOut(300);
       
        $(".cd-header").css("filter", "");
        $("div:not(.signup-div, .close)").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
    





    

    $(function() {
    $('#sigh_href, #close_sing').click(function(){

        $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $("div:not(.signup-div, .close, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "blur(5px)");
        
       // $('.cd-header').removeClass('color');

    });
});
    
      $(function() {
    $('#close_sing').click(function(){

     
       $(".messenge").fadeOut(300);
        $(".cd-header").css("filter", "");
        $("div:not(.signup-div, .close, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
    



$(function() {
    $('#contact_href, #close_contact').click(function(){

        $('#contact_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle'}, 500);
        $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".cd-header").css("filter", "blur(5px)");
        $("div:not(.contact-div, .close)").css("filter", "blur(5px)");
       // $('.cd-header').removeClass('color');

    });
});


   $(function() {
    $('#close_contact').click(function(){

     
       
        $(".cd-header").css("filter", "");
        $("div:not(.contact-div, .close)").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
