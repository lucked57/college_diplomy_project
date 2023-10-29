 //login

$(".upsign").hide();
$('#do_login_ajax_after').hide();
$('#form_login_after').hide();
$('#do_change_email_ajax_after').hide();
$('#form_pass_after').hide();
$('#form_pass_t_after').hide();

var location_href = "http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php";
/*function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
        
        var login_cookie = getCookie ("login");

if(login_cookie.length > 0){
    
    setInterval(function() {
   $.ajax({
                url: "update_messnge.php",
                type: "POST",
                data: ({
                    login: login_cookie,
                }),
                dataType: "html",
            });
}, 60000);
    
}*/

function Showloader_m(){
    $("#loading_div").fadeIn(0);
    $(".messenge").fadeOut(300);
    $('.modal-div-m').show();
} 

function Hideloader_m(){
$('.modal-div-m').hide();
    $("#loading_div").fadeOut(300);
} 

function insertMessenge(errors){
    $(".messenge p").html(errors);
} 


function Showloader(){
    $("#loading_div").fadeIn(0);
    $(".messenge").fadeOut(300);
} 

function Hideloader(){
    $("#loading_div").fadeOut(300);
} 

$(function() {
    $('#close_messenge').click(function(){

     
        $('.messenge').animate({ opacity: 'toggle',  top: 'toggle' }, 600);

    });
});



var kod_change;



    function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}











function funcBeforeMessengeDelete(){
    $(".messenge").fadeOut(300);
   
           }
           
            function funcSuccessMessengeDelete(data){
                
                    if(data == "delete"){
                        $(".messenge p").html("Сообщения успешно удалены");
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                        $('.messenge_box').fadeOut(400);
                    }
                 
                
             
           }




           
          $(document).ready(function(){
              

              
            
          $("#do_messenge_block_ajax").on("click", function(){
              
              $("#do_messenge_block_ajax").fadeOut(400);
           
              var login_messenge_delete = getCookie ("login"); 
              
              
               $.ajax({
                url: "messengeDelete.php",
                type: "POST",
                data: ({
                    login: login_messenge_delete
                }),
                dataType: "html",
                success: funcSuccessMessengeDelete
            });
              
              
              
              
              

   

            
          }); 
                    
              
          });



























function funcBeforeMessenge(){
    $(".messenge").fadeOut(300);
   
           }
           
            function funcSuccessMessenge(data){
                
                if(data == "empty"){
                   
                     setTimeout(function () {
                           $(".messenge p").html("У вас нету сообщений");
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                         }, 500);
                }
                else{
                    
                if(data.length != 0){
                    
                    
                    
                                          setTimeout(function () {
                                              
                         if(check_messenge_click){
                             
                             data = JSON.parse(data);
                             
                         
                            //$('.messenge-show-in').append($('<div class="messenge_box"><p>'+data+'</p></div>'));

                              for(var id in data){
                            $('.messenge-show-in').append($('<div class="messenge_box"><p>'+data[id]+'</p></div>'));
                        }
                             
                             
                             
                           $('.messenge_box').fadeIn(400);
                     $('.dws-submit').fadeIn(400, function() {
                    $('.dws-submit').css("transition", "0.3s linear");});
                           }         
                        }, 700);
                    
                      }
    
                }

                
                
             
           }



        var check_messenge_click = true;

           
          $(document).ready(function(){
              
              $("#close_messenge_block").on("click", function(){
             
              
                  check_messenge_click = false;
                  
                  setTimeout(function () {
                check_messenge_click = true;
            }, 700);

            
          }); 
              
            
          $(".messenge_href").on("click", function(){
           
              var login_messenge = getCookie ("login"); 
              
              
               $.ajax({
                url: "messengeCheck.php",
                type: "POST",
                data: ({
                    login: login_messenge
                }),
                dataType: "html",
                success: funcSuccessMessenge
            });
              
              
              
              
              
              
              if(check_messenge_click == true){
                  
                   // alert(login_messenge);
              
            
              }
   

            
          }); 
                    
              
          });






$('#do_sign_ajax_after').hide();









              
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  



function funcBeforePT() {
    $(".messenge").fadeOut(300);
    afterButtonPT();
    $(".upsign p").html("ожидание данных...");
    $(".upsign").animate({
        opacity: 'toggle',
        top: 'toggle'
    }, 600);
}

function funcSuccessPT(data) {

    Hideloader();
    $(".upsign").fadeOut(300);

    if (data == "Location") {
        window.location = location_href;
    }
    if (data == "Пароль успешно изменен") {
           $('#pass_div_t').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
            $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
        }, 500);
    }

    $(".messenge p").html(data);
    $(".messenge").animate({
        opacity: 'toggle',
        top: 'toggle'
    }, 600);

    beforeButtonPT();
}


function afterButtonPT() {

    $('#form_pass_t_after').show();
    $('#form_pass_t').hide();
}

function beforeButtonPT() {

    $('#form_pass_t_after').hide();
    $('#form_pass_t').show();
}




$(document).ready(function () {

    $("#do_pass_ajax_t, #form_pass_t").on("submit", function () {



        var pass_now = $("#pass_now").val().trim();

        var pass_change = $("#pass_change").val().trim();
        
        var pass_change_again = $("#pass_change_again").val().trim();

        var errors = false;
        
        
        if (pass_now.indexOf('<') != -1 || pass_now.indexOf('>') != -1 || pass_now.indexOf('"') != -1 || pass_now.indexOf("'") != -1 || pass_change.indexOf('<') != -1 || pass_change.indexOf('>') != -1 || pass_change.indexOf('"') != -1 || pass_change.indexOf("'") != -1) {
            errors = "Содержаться недопустимые символы";
        }
        
        if (pass_change.substring(0, 8) == "12345678") {
            errors = "слишком простой пароль";
        }

        if (pass_change.length < 8) {
            errors = "слишком короткий пароль";

        }
        
         if (pass_change.length > 40) {
            errors = "слишком большой пароль";

        }
        
         if (pass_change == pass_now) {
            errors = "текущий пароль не должен совпадать с новым";

        }
        
        if (pass_change != pass_change_again) {
            errors = "повторный пароль не совпадает";
        }



        if (pass_now.length == 0 || pass_change.length == 0 || pass_change_again.length == 0) {
            errors = "заполните все поля";

        }
     

        if (errors == false) {
            $.ajax({
                url: "pass_t_ajax_port.php",
                type: "POST",
                data: ({
                    pass_now: pass_now,
                    pass_change: pass_change,
                    pass_change_again: pass_change_again
                }),
                dataType: "html",
                beforeSend: Showloader,
                success: funcSuccessPT
            });

        } else {
            afterButtonPT();
            $(".messenge").fadeOut(300);
            setTimeout(function () {
                $(".messenge p").html(errors);
            }, 300);
            $(".messenge").animate({
                opacity: 'toggle',
                top: 'toggle'
            }, 600);
            setTimeout(beforeButtonPT, 900);
        }

    });


});

















function funcBeforeP() {
    $(".messenge").fadeOut(300);
    afterButtonP();
    $(".upsign p").html("ожидание данных...");
    $(".upsign").animate({
        opacity: 'toggle',
        top: 'toggle'
    }, 600);
}

function funcSuccessP(data) {
    
    Hideloader();
    $(".upsign").fadeOut(300);

    if (data == "Location") {
        window.location = location_href;
    }
    if (data == "Пароль успешно изменен") {
           $('#pass_div').animate({
            height: 'toggle',
            opacity: 'toggle',
            width: 'toggle',
            top: 'toggle'
        }, 700);
        $('#modal_div').animate({
            opacity: 'toggle'
        }, 500);
            $(".cd-header, .blur, .cd-fixed-bg").css("filter", "");
        // $('.cd-header').removeClass('color');
        setTimeout(function () {
            $('#modal_div').css("background-color", "rgba(0, 0, 0, 0.05)");
        }, 500);
    }

    $(".messenge p").html(data);
    $(".messenge").animate({
        opacity: 'toggle',
        top: 'toggle'
    }, 600);

    beforeButtonP();
}


function afterButtonP() {

    $('#form_pass_after').show();
    $('#form_pass').hide();
}

function beforeButtonP() {

    $('#form_pass_after').hide();
    $('#form_pass').show();
}




$(document).ready(function () {

    $("#do_pass_ajax, #form_pass").on("submit", function () {



        var pass_now = $("#pass_now").val().trim();

        var pass_change = $("#pass_change").val().trim();
        
        var pass_change_again = $("#pass_change_again").val().trim();

        var errors = false;
        
        
        if (pass_now.indexOf('<') != -1 || pass_now.indexOf('>') != -1 || pass_now.indexOf('"') != -1 || pass_now.indexOf("'") != -1 || pass_change.indexOf('<') != -1 || pass_change.indexOf('>') != -1 || pass_change.indexOf('"') != -1 || pass_change.indexOf("'") != -1) {
            errors = "Содержаться недопустимые символы";
        }
        
        if (pass_change.substring(0, 8) == "12345678") {
            errors = "слишком простой пароль";
        }

        if (pass_change.length < 8) {
            errors = "слишком короткий пароль";

        }
        
         if (pass_change.length > 40) {
            errors = "слишком большой пароль";

        }
        
         if (pass_change == pass_now) {
            errors = "текущий пароль не должен совпадать с новым";

        }
        
        if (pass_change != pass_change_again) {
            errors = "повторный пароль не совпадает";
        }



        if (pass_now.length == 0 || pass_change.length == 0 || pass_change_again.length == 0) {
            errors = "заполните все поля";

        }
     

        if (errors == false) {
            $.ajax({
                url: "pass_ajax_port.php",
                type: "POST",
                data: ({
                    pass_now: pass_now,
                    pass_change: pass_change,
                    pass_change_again: pass_change_again
                }),
                dataType: "html",
                beforeSend: Showloader,
                success: funcSuccessP
            });

        } else {
            afterButtonP();
            $(".messenge").fadeOut(300);
            setTimeout(function () {
                $(".messenge p").html(errors);
            }, 300);
            $(".messenge").animate({
                opacity: 'toggle',
                top: 'toggle'
            }, 600);
            setTimeout(beforeButtonP, 900);
        }

    });


});









function funcBeforeC(){
    $(".messenge").fadeOut(300);
              afterButtonC();
               $(".upsign p").html("ожидание данных...");
       $(".upsign").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           }
           
            function funcSuccessC(data){
                
                Hideloader();
                $(".upsign").fadeOut(300);
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                
                  if(data == "visibale"){
                    $("#inputkod_change_email").animate({ opacity: 'toggle', height: 'toggle'}, 600);
                    $("#again_change_email_code").show();
                    data = "Код подтверждения выслан на ваш email"
                }
              
                    
                    if(data == "again kod"){
                        kod = null;
                        data = "Код выслан повторно на ваш email";
                    }
                
                
                
               $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                
                beforeButtonC();
           }


function afterButtonC(){
    $('#do_change_email_ajax_after').show();
    $('#do_change_email_ajax').hide();
}

function beforeButtonC(){
    $('#do_change_email_ajax_after').hide();
    $('#do_change_email_ajax').show();
}




   $('#again_change_email_code').click(function(){

            kod = "send_again";

    });
           
          $(document).ready(function(){
              
          $("#do_change_email_ajax, #again_change_email_code").on("click", function(){
             
                $("#do_change_email_ajax").on("click", function(){

                        kod = null;

                });
              
             var email = $("#email_C").val();
              
              
              var errors = false;
              
           
               if(email.indexOf('<')!= -1 || email.indexOf('>')!= -1 || email.indexOf('"')!= -1 || email.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
              if(!pattern.test(email)){
                  errors = email + " не является email";
              }
              
                  if(email.length==0){
                  errors = "заполните все поля";
                  
              }
              
               if ($("#inputkod_change_email").is(':visible')) {
                  
                    if(kod!="send_again"){
                        
                        
                        kod = $("#inputkod_change_email").val();
                    
                     
                  if(kod.trim().length!=5){
                      errors = "код состоит из 5 символов";
                  }
                        }
                }
              else{
                kod = "not visibale";
              }
              
              if(errors == false){
                    $.ajax({
                  url: "change_email_ajax_port.php",
                  type: "POST",
                  data: ({email: email, kod: kod}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: funcSuccessC 
              });
              
              }
              else{
                  afterButtonC();
                  $(".messenge").fadeOut(300);
                   setTimeout(function() {
                                $(".messenge p").html(errors);
                            }, 300);
                  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                  setTimeout(beforeButtonC, 900);
              }
              
          
            
          }); 
                    
              
          });
















function funcBefore(){
    $(".messenge").fadeOut(300);
              afterButton();
               $(".upsign p").html("ожидание данных...");
       $(".upsign").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           }
           
            function funcSuccess(data){
                Hideloader();
                $(".upsign").fadeOut(300);
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                else{
                                   $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                    $("#pass_l").val("");
                }
                

                
                beforeButton();
           }


function afterButton(){
    $('#do_login_ajax_after').show();
                $('#do_login_ajax').hide();
    $('#form_login_after').show();
    $('#form_login').hide();
}

function beforeButton(){
    $('#do_login_ajax_after').hide();
                $('#do_login_ajax').show();
    $('#form_login_after').hide();
    $('#form_login').show();
}



           
          $(document).ready(function(){
              
          $("#do_login_ajax, #form_login").on("submit", function(){
             
              
              
             var login = $("#login_l").val();
              
              var pass  = $("#pass_l").val();
              
              var errors = false;
              
              if(login.length<4){
                  errors = "слишком короткий логин";
                  
              }
              if(pass.length<8){
                  errors = "слишком короткий пароль";
              }
               if(login.length==0 || pass.length==0){
                  errors = "заполните все поля";
                  
              }
               if(login.indexOf('<')!= -1 || login.indexOf('>')!= -1 || login.indexOf('"')!= -1 || login.indexOf("'")!= -1 || pass.indexOf('<')!= -1 || pass.indexOf('>')!= -1 || pass.indexOf('"')!= -1 || pass.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
              if(errors == false){
                    $.ajax({
                  url: "login_ajax_port.php",
                  type: "POST",
                  data: ({login: login, pass: pass}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: funcSuccess 
              });
              
              }
              else{
                  afterButton();
                  $(".messenge").fadeOut(300);
                   setTimeout(function() {
                                $(".messenge p").html(errors);
                            }, 300);
                  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                  setTimeout(beforeButton, 900);
                  $("#pass_l").val("");
              }
            
          }); 
                    
              
          });






$('#do_sign_ajax_after').hide();

var kod;

function funcBeforeS(){
    $(".messenge").fadeOut(300);
              afterButtonS();
               $(".upsign p").html("ожидание данных...");
       $(".upsign").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           }
           
            function funcSuccessS(data){
                
                Hideloader();
                $(".upsign").fadeOut(300);
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                
                if(data == "visibale"){
                    $(".inputkod").animate({ opacity: 'toggle', height: 'toggle'}, 600);
                    $(".again-code").show();
                    data = "Код подтверждения выслан на ваш email"
                }
                
                
              
                    
                    if(data == "again kod"){
                        kod = null;
                        data = "Код выслан повторно на ваш email";
                    }
                
                    if(data == "Вы успешно зарегистировались"){
                        
                         $("body").css("position", "static");
                    $('#sign_div').animate({ height: 'toggle', opacity: 'toggle', width: 'toggle', top: 'toggle' }, 700);
                    $('#login_div').hide(500);
                    $('#contact_div').hide(500);
                    $('.cd-main-nav-mobile').hide(500);
                   // $('.cd-main-nav').show(500);
                    //$('#modal_div').animate({opacity: 'toggle'}, 500);
                    $("div:not(.signup-div, .close, #upsign, .messenge, .close-messenge, .again-code, .again-code p)").css("filter", "");
                    $(".cd-header").css("filter", "");
                        
                    $("#login_s, #pass_s, #email_s, #pass_again_s").val("");
                    $(".inputkod").animate({ opacity: 'toggle', height: 'toggle'}, 600);
                    $(".again-code").hide();    
                    $('#modal_div').animate({opacity: 'toggle'}, 500);
                        
                        data = "Аккаунт успешно создан";
                   // $(".messenge").fadeOut(300);
                        
                    }
                    
                    $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
              
                
               
                
                beforeButtonS();
           }



function afterButtonS(){
    $('#do_sign_ajax_after').show();
                $('#do_sign_ajax').hide();
}

function beforeButtonS(){
    $('#do_sign_ajax_after').hide();
                $('#do_sign_ajax').show();
}





        $(document).ready(function(){
            
            
            
             
    $('#again_sign_code').click(function(){

            kod = "send_again";
        $("#again_sign_code").hide();
         setTimeout(function() {
                                $("#again_sign_code").show();
                            }, 30000);

    });

              
          $("#do_sign_ajax,#again_sign_code").on("click", function(){
              
              
                            
                $('#do_sign_ajax').click(function(){

                        kod = null;

                });
          
              
            
             
             var login = $("#login_s").val();
              
              var pass  = $("#pass_s").val();
              
              var pass_again = $("#pass_again_s").val();
              
              var email = $("#email_s").val();
              
              var errors = false;
              
              if(login.trim().length<6){
                  errors = "слишком короткий логин";
                  
              }
              if(login.trim().length>15){
                  errors = "слишком длинный логин";
                  
              }
              
              if(pass.trim().length<8){
                  errors = "слишком короткий пароль";
              }
              
              if(login.trim().toLowerCase()=="admin"){
                  errors = "Админ у нас уже есть:)";
              }
              
              if(pass !=pass_again){
                  errors = "повторный пароль не совпадает";
              }
              
              if(pass.substring(0,8)=="12345678"){
                  errors = "слишком простой пароль";
              }
              
              var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
              if(!pattern.test(email)){
                  errors = email + " не является email";
              }
              
               if(login.indexOf('<')!= -1 || login.indexOf('>')!= -1 || login.indexOf('"')!= -1 || login.indexOf("'")!= -1 || email.indexOf('<')!= -1 || email.indexOf('>')!= -1 || email.indexOf('"')!= -1 || email.indexOf("'")!= -1 || pass.indexOf('<')!= -1 || pass.indexOf('>')!= -1 || pass.indexOf('"')!= -1 || pass.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
              
               if(login.trim().length==0 || pass.trim().length==0 || email.trim().length==0 || pass_again.trim().length==0){
                  errors = "заполните все поля";
                  
              }
              
            
              
              if ($("#inputkod_sign").is(':visible')) {
                  
                    if(kod!="send_again"){
                        
                        
                        kod = $("#inputkod_sign").val();
                    
                     
                  if(kod.trim().length!=5){
                      errors = "код состоит из 5 символов";
                  }
                        }
                }
              else{
                kod = "not visibale";
              }

              if(errors == false){
                    $.ajax({
                  url: "sign_ajax_port.php",
                  type: "POST",
                  data: ({login: login, pass: pass, email: email, kod: kod}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: funcSuccessS 
              });
              
              }
              else{
                  afterButtonS();
                  $(".messenge").fadeOut(300);
                  //$(".messenge p").html(errors);
                  setTimeout(function() {
                                $(".messenge p").html(errors);
                            }, 300);
                  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                  setTimeout(beforeButtonS, 900);
                  $("#pass_s, #pass_again_s").val("");
              }
            
          }); 
                    
              
          });






var limit_0 = 0;
var limit_1 = 12;


LimitPosts(limit_0);

function LimitPosts(limit_0){
    if (limit_0 == 0){
    $("#minus").hide();
    $("#plus").css('margin-left','48%');
        $("#plus").show();
}
else{
    $("#minus").show();
    if ($(window).width() <= 1206){
        $("#plus").css('margin-left','20%');
    }
    else{
        $("#plus").css('margin-left','2%');
    }
    
}
}





var shitchik;

function funcBeforeClick(){
    $(".messenge").fadeOut(300);
   
           }
           
            function funcSuccessClick(data){
                $(document).ready(function(){
                Hideloader_m();
             
                    if(data == "empty"){
                        
                            $("#plus").hide();
                    }
                else if(data.length != 0){
                    $('#contentposts').empty();
                     data = JSON.parse(data);
                             
                    shitchik = 0;
                        
                              for(var id in data){
                          //  $('#contentposts').append($('<div class="messenge_box"><p>'+data[id]+'</p></div>'));
                                  
                                  $('#contentposts').append($(data[id]));
                                    shitchik++;
                }
                    if (shitchik<12){
                        $("#plus").hide();
                    }
                 
                
             
           }
                        }); 
            }


           
          $(document).ready(function(){
              
              
     $("#plus").on("click", function(){
                      
                      limit_0 += 12;
                      
                      LimitPosts(limit_0);

          }); 
              
                    $("#minus").on("click", function(){
                      
                      limit_0 -= 12;
                      
                      LimitPosts(limit_0);
                        
                        $("#plus").show();
                        
   

          }); 
              
   
          $("#plus, #minus").on("click", function(){
              
              //$('#contentposts').empty();
              
               $.ajax({
                url: "step_posts.php",
                type: "POST",
                data: ({
                    limit_0: limit_0, limit_1: limit_1,
                }),
                dataType: "html",
                beforeSend: Showloader_m,
                success: funcSuccessClick
                   
            });
              
              
              
              
              

   

            
          }); 
                    
              
          });
      /*  if(window.location == location_href || window.location == 'http://protfoli.loc/index.php'){
              $.ajax({
                url: "step_posts.php",
                type: "POST",
                data: ({
                    limit_0: limit_0, limit_1: limit_1,
                }),
                dataType: "html",
                success: funcSuccessClick
            });
        }*/
      

