
//$('#sign_div').hide();
//$('#login_div').hide();
//$('#contact_div').hide();




if ($(window).width() <= 800){
$(function() {
    $('#login_href, #close_').click(function(){
        $("body").css("position", "fixed");
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        //$('.cd-main-nav').hide(500);
        //$('#modal_div').animate({opacity: 'toggle'}, 500);
        
        $(".large-header").css("filter", "blur(7px)");
        $(".cd-header").css("filter", "blur(7px)");
        $(".cd-fixed-bg").css("filter", "blur(7px)");
        $('#modal_div').animate({opacity: 'toggle'}, 0);
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
        $(".large-header").css("filter", "");
        $(".cd-header").css("filter", "");
        $(".cd-fixed-bg").css("filter", "");
        $('#modal_div').animate({opacity: 'toggle'}, 0);
       // $('#modal_div').animate({opacity: 'toggle'}, 500);
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
        $('#modal_div').animate({opacity: 'toggle'}, 0);
       // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
        $(".cd-header").css("filter", "blur(7px)");
        $("div:not(.signup-div, .close)").css("filter", "blur(7px)");
    });
    
});
       $(function() {
    $('#close_login').click(function(){

     
       
        $(".cd-header").css("filter", "");
        $("div:not(.signup-div, .close)").css("filter", "");
       // $('.cd-header').removeClass('color');

    });
});
    
}



if ($(window).width() <= 800){

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
        $(".large-header").css("filter", "blur(7px)");
        $(".cd-header").css("filter", "blur(7px)");
        $(".cd-fixed-bg").css("filter", "blur(7px)");
        $('#modal_div').animate({opacity: 'toggle'}, 0);

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
        $(".large-header").css("filter", "");
        $(".cd-header").css("filter", "");
        $(".cd-fixed-bg").css("filter", "");
        $('#modal_div').animate({opacity: 'toggle'}, 0);
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
        $('#modal_div').animate({opacity: 'toggle'}, 0);
        $(".cd-header").css("filter", "blur(7px)");
        $("div:not(.signup-div, .close)").css("filter", "blur(7px)");
        
       // $('.cd-header').removeClass('color');

    });
});
    
      $(function() {
    $('#close_sing').click(function(){

     
       
        $(".cd-header").css("filter", "");
        $("div:not(.signup-div, .close)").css("filter", "");
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
        $('#modal_div').animate({opacity: 'toggle'}, 0);
        $(".cd-header").css("filter", "blur(7px)");
        $("div:not(.contact-div, .close)").css("filter", "blur(7px)");
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