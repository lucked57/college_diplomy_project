
$('#sign_div').hide();
$('#login_div').hide();
$('#contact_div').hide();




if ($(window).width() <= 800){
$(function() {
    $('#login_href, #close_').click(function(){
        $("body").css("position", "fixed");
        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
       // $('.cd-header').removeClass('color');
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
       // $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
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
       // $('.cd-header').removeClass('color');

    });
});
    
       $(function() {
    $('#close_sing').click(function(){
        $("body").css("position", "static");
        $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
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
       // $('.cd-header').removeClass('color');

    });
});
