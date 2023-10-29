
$('#sign_div').hide();
$('#login_div').hide();
$('#contact_div').hide();


$(function() {
    $('#login_href, #close_login').click(function(){

        $('#login_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#contact_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        $('.cd-header').removeClass('color');
        //setTimeout(function(){ $("#p_prldr").show(); }, 500);
    });
});

$(function() {
    $('#sigh_href, #close_sing').click(function(){

        $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#contact_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        $('.cd-header').removeClass('color');

    });
});


$(function() {
    $('#contact_href, #close_contact').click(function(){

        $('#contact_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
        $('#login_div').hide(500);
        $('#sign_div').hide(500);
        $('.cd-main-nav-mobile').hide(500);
        $('.cd-header').removeClass('color');

    });
});
