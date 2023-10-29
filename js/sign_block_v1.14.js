
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


if ($(window).width() <= 1026){
$(function() {
    $('#login_href, #close_').click(function(){
        $("body").css("position", "fixed");
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').hide(500);
        //$('#modal_div').animate({opacity: 'toggle'}, 500);
        
        $('.cant_login').hide();
        setTimeout(function() {
                                $(".cant_login").animate({ opacity: 'toggle'}, 500);
                            }, 600);
        $(".large-header").css("transition", "0.6s");
        $(".cd-header").css("filter", "blur(5px)");
        $("div:not(.signup-div, .close, .cant_login, #upsign, .messenge, .close-messenge)").css("filter", "blur(5px)");
        $('#modal_div').animate({opacity: 'toggle'}, 500);
       // $('.cd-header').removeClass('color');
        //$('.large-header').animate({'filter': 'blur(5px)' }, 500);
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
    });
    
});

    
$(function() {
    $('#close_login').click(function(){
        $("body").css("position", "static");
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').show(500);
        $("div:not(.signup-div, .close, .cant_login)").css("filter", "");
        $(".cd-header").css("filter", "");
      $(".cant_login").animate({ opacity: 'toggle'}, 120);
        setTimeout(function() {
                                $(".cant_login").show();
                            }, 700);
        $('#modal_div').animate({opacity: 'toggle'}, 500);
       // $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".messenge").fadeOut(300);
    });
    
});
}
else{
    
    
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
        $("div:not(.signup-div, .close, .cant_login, #upsign, .messenge, .close-messenge)").css("filter", "blur(5px)");
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
    
}



if ($(window).width() <= 1026){

    $(function() {
    $('#sigh_href, #close_').click(function(){
        $("body").css("position", "fixed");
        $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').hide(500);
        //$('#modal_div').animate({opacity: 'toggle'}, 500);
       // $('.cd-header').removeClass('color');
        
        $(".cd-header").css("filter", "blur(5px)");
        $("div:not(.signup-div, .close, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "blur(5px)");
        $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".large-header").css("transition", "0.6s");

    });
});
    
       $(function() {
    $('#close_sing').click(function(){
        $("body").css("position", "static");
        $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
       // $('.cd-main-nav').show(500);
        //$('#modal_div').animate({opacity: 'toggle'}, 500);
        $("div:not(.signup-div, .close, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "");
        $(".cd-header").css("filter", "");
        
        $('#modal_div').animate({opacity: 'toggle'}, 500);
        $(".messenge").fadeOut(300);
       // $('.cd-header').removeClass('color');

    });
});
    
    
}
else{
    

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
    
}


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
