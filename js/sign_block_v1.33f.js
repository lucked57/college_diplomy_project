//$('#sign_div').hide();
//$('#login_div').hide();
//$('#contact_div').hide();

if ($(window).width() <= 1206){
    $('.account').hide();
}

var position;

function AddBlur(){
    if ($(window).width() <= 1206){
        $('.cd-header, .blur, .cd-fixed-bg').css("transition", "0.6s");
        $(".cd-header").css("filter", "blur(12px)");
            $(".blur, .cd-fixed-bg").css("filter", "blur(15px)");
    }
    else{
        
    
        
            var px = 0;
            var px_h = 0;
        
                var timerId = setInterval(function() {
                      $(".cd-header").css("filter", "blur("+px_h+"px)");
            $(".blur, .cd-fixed-bg").css("filter", "blur("+px+"px)");
                    px++;
                    if (px_h < 12){
                        px_h++;
                    }
                    }, 33);
        
           setTimeout(function() {
                  clearInterval(timerId);
                  //  alert(px);
              // alert(px_h);
                }, 500);
        }
}

function DeleteBlur(){
    if ($(window).width() <= 1206){
        
        if(navigator.userAgent.indexOf ('iPhone') != -1 || navigator.userAgent.indexOf ('iPad') != -1){
            $('.cd-header, .blur, .cd-fixed-bg').css("filter", "");
        
        
        
          setTimeout(function() {
                  $('.cd-header, .blur, .cd-fixed-bg').css("transition", "none");
                }, 615);
        }
        else{
            
            $('.cd-header, .blur, .cd-fixed-bg').css("filter", "");
        
        
        
          setTimeout(function() {
                  $('.cd-header, .blur, .cd-fixed-bg').css("transition", "none");
                }, 475);
            
        }
        
        
    }
    else{
        
    
            var px = 15;
            var px_h = 12;
        
                var timerId = setInterval(function() {
                      $(".cd-header").css("filter", "blur("+px_h+"px)");
            $(".blur, .cd-fixed-bg").css("filter", "blur("+px+"px)");
                    if (px != 0){
                        px--;
                    }
                    
                    if (px_h != 0){
                        px_h--;
                    }
                    }, 30);
        
           setTimeout(function() {
                  clearInterval(timerId);
                  //  alert(px);
              // alert(px_h);
                $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");

                }, 500);
        }
}



   function ShowBlock(block_div){
            
             

        $('.cd-main-nav-mobile').hide(500);
                
        AddBlur();
            
        $(".messenge_href5").fadeOut(300);
         
    
            $('#'+block_div).animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        
        //    $(".cd-header").css("filter", "blur("+px+"px)");
       // $(".blur, .cd-fixed-bg").css("filter", "blur("+px+"px)");
      //  }
  
            
        }


function HideBlock(block_div_h){
            
                DeleteBlur();
        $('#'+block_div_h).animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
            $('#modal_div').animate({opacity: 'toggle'}, 500);
        
  
     $(".messenge").fadeOut(300);
       
       // $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
       // $('.cd-header').removeClass('color');
        setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);
            
        }




   function ShowBlock_m(block_div_m){
            
             $(".messenge_href5").fadeOut(300);

           $('.messenge_box5555, .dws-submit').hide();
          
        $('.cd-main-nav-mobile').hide(500);
        $('.dws-submit').css("transition", "none");
   
            position = $(window).scrollTop();
             setTimeout(function () {
            $('body').css("position", "fixed");
        }, 700);
        
        
        
     
setTimeout(function () {
            
    $("html").append("<style>::-webkit-scrollbar { width: 0; }</style>");
    
        }, 650);
        

        $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
        $('#'+block_div_m).animate({
            width: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 700);
       $('.dws-submit').css("transition", "none");
  
            
        }




   function HideBlock_m(block_div_mh){
            

        $('.dws-submit').hide();
        //$('.dws-submit').css("transition", "0.3s linear");
             $(".messenge").fadeOut(300);
        
       
            $('body').css("position", "static");
             $(window).scrollTop(position);
            
        
       
        
        
        
        
        
        
        if ($(window).width() <= 1206){
            
           $("html").append("<style>::-webkit-scrollbar { width: 1.5%; }</style>");
            
        }
        else{
            $("html").append("<style>::-webkit-scrollbar { width: 0.4%; }</style>");
        }
        
        
        
        
        $('#'+block_div_mh).animate({
            width: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 700);
  
        //$(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
            $('.dws-submit').show();
            $('.dws-submit').css("transition", "0.3s linear");
            
        }, 700);

            
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
        var block_div_h = 'account_div_t';
        
        HideBlock(block_div_h);
        $('.info').fadeOut(120);

    });
});







$(function () {
    $('.messenge_href, #close_mgfgdgd').click(function () {
            
        
          
        $(".messenge_href5").fadeOut(300);
        
        

        $('.messenge_box, .dws-submit').hide();
          
        $('.cd-main-nav-mobile').hide(500);
        $('.dws-submit').css("transition", "none");
   
            position = $(window).scrollTop();
             setTimeout(function () {
            $('body').css("position", "fixed");
        }, 700);
        
        
        
     
setTimeout(function () {
            
    $("html").append("<style>::-webkit-scrollbar { width: 0; }</style>");

    
    
        }, 650);
        

        $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.65)");
        $('#messenge-show').animate({
            width: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 700);

    });

});
$(function () {
    $('#close_messenge_block').click(function () {
         $('.messenge_box').fadeOut(0);
        $('.dws-submit').hide();
        //$('.dws-submit').css("transition", "0.3s linear");
             $(".messenge").fadeOut(300);
        
       
            $('body').css("position", "static");
             $(window).scrollTop(position);
            
        
       
        
        
        
        
        
        
        if ($(window).width() <= 1206){
            
           $("html").append("<style>::-webkit-scrollbar { width: 1.5%; }</style>");
            
        }
        else{
            $("html").append("<style>::-webkit-scrollbar { width: 0.4%; }</style>");
        }
        
        
        
        
        $('#messenge-show').animate({
            width: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 700);
  
        //$(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
            $('.dws-submit').show();
        }, 700);
            $('.messenge-show-in').empty();
    });
});




$(function () {
    $('#pass_href_t, #close_pass_t5').click(function () {

if ($(window).width() <= 1206){

            setTimeout(function() {
                                $(".account").animate({ opacity: 'toggle'}, 450);
                            }, 500);
        
}



        var block_div = 'pass_div_t';
        
     ShowBlock(block_div);
    });

});
$(function () {
    $('#close_pass_t').click(function () {
if ($(window).width() <= 1206){
    $('.account').fadeOut(120);
}
    

    var block_div_h = 'pass_div_t';
        
        HideBlock(block_div_h);

    });
});









$(function () {
    $('#pass_href, #close_pass5').click(function () {

 
        if ($(window).width() <= 1206){
            setTimeout(function() {
                                $(".account").animate({ opacity: 'toggle'}, 450);
                            }, 500);

        }
        
            var block_div = 'pass_div';
        
     ShowBlock(block_div);
    });

});
$(function () {
    $('#close_pass').click(function () {
if ($(window).width() <= 1206){
    $('.account').fadeOut(120);
}
        var block_div_h = 'pass_div';
        
        HideBlock(block_div_h);

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
        

        
        var block_div_h = 'account_div';
        
        HideBlock(block_div_h);
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


        
         var block_div_h = 'change_email_div';
        
        HideBlock(block_div_h);

    });
});

 






    
$(function() {
    $('#login_href, #close_login55').click(function(){
        
        $('.cant_login').hide();
        
              setTimeout(function() {
                                $(".cant_login").animate({ opacity: 'toggle'}, 500);
                            }, 600);
        
        var block_div = 'login_div';
        
     ShowBlock(block_div);
      
        
        
    });
    
});
       $(function() {
    $('#close_login').click(function(){
        $('.cant_login').fadeOut(120);
        
       var block_div_h = 'login_div';
        
        HideBlock(block_div_h);

    });
});
    





    

    $(function() {
    $('#sigh_href, #close_sing55').click(function(){


        
         var block_div = 'sign_div';
        
     ShowBlock(block_div);

    });
});
    
      $(function() {
    $('#close_sing').click(function(){
        setTimeout(function() {
                                 $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
                            }, 500);
    
       $(".messenge").fadeOut(300);
     
       // $('.cd-header').removeClass('color');
        
            var block_div_h = 'sign_div';
        
        HideBlock(block_div_h);

    });
});
    



$(function() {
    $('#contact_href, #close_contact5').click(function(){

        
        var block_div = 'contact_div';
        
     ShowBlock(block_div);

    });
});


   $(function() {
    $('#close_contact').click(function(){


       
        
        
          var block_div_h = 'contact_div';
        
        HideBlock(block_div_h);


    });
});


$(function() {
    $('#messenge_href_study, #close_login55').click(function(){
if($(".messenge_href5 p").text() == 'У вас не заполнена анкета, чтобы ее заполнить перейдите в соотвествующий пункт меню или нажмите на это собщение'){
    
        
        $("#form_anketa_after").hide();
        
        var block_div = 'anketa_div';
        
     ShowBlock(block_div);
      
        
      }  
        
if($(".messenge_href5 p").text() == 'Анкета успешно заполнена, чтобы добавить достижение перейдите в соотвествующий пункт меню или нажмите на это сообщение'){
    
        var block_div_h = 'anketa_div';
        
        HideBlock(block_div_h);
    
    setTimeout(function () {
                $('#form_add_achivka').hide();
        
        
        var block_div_m = 'add_achivka';
        
        ShowBlock_m(block_div_m);
      
                setTimeout(function () {
             $('#form_add_achivka').fadeIn(300);
        }, 700);
      
        }, 10);
      } 
    });

});


$(function() {
    $('#anketa_t_href, #close_login55').click(function(){
        
        $("#form_anketa_t_after").hide();
        
        var block_div = 'anketa_t_div';
        
     ShowBlock(block_div);
      
        
        
    });
    
});
       $(function() {
    $('#close_anketa_t').click(function(){

        
       var block_div_h = 'anketa_t_div';
        
        HideBlock(block_div_h);

    });
});



$(function() {
    $('#anketa_href, #close_login55').click(function(){
        
        $("#form_anketa_after").hide();
        
        var block_div = 'anketa_div';
        
     ShowBlock(block_div);
      
        
        
    });
    
});
       $(function() {
    $('#close_anketa').click(function(){

        
       var block_div_h = 'anketa_div';
        
        HideBlock(block_div_h);

    });
});









$('#form_add_achivka_after').hide();


$(function() {
    $('#achivka_add, #close_login55').click(function(){
        
        $('#form_add_achivka').hide();
        
        
        var block_div_m = 'add_achivka';
        
        ShowBlock_m(block_div_m);
      
                setTimeout(function () {
             $('#form_add_achivka').fadeIn(300);
        }, 700);
        
    });
    
});
       $(function() {
    $('#close_add_achivka').click(function(){

        $('#form_add_achivka').hide();
        
       var block_div_mh = 'add_achivka';
        
       HideBlock_m(block_div_mh);

    });
});




