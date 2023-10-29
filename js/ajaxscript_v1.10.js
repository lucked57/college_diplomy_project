 //login

$(".upsign").hide();
$('#do_login_ajax_after').hide();
$('#form_login_after').hide();

function insertMessenge(errors){
    $(".messenge p").html(errors);
} 

function funcBefore(){
    $(".messenge").fadeOut(300);
              afterButton();
               $(".upsign p").html("ожидание данных...");
       $(".upsign").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           }
           
            function funcSuccess(data){
                
                $(".upsign").fadeOut(300);
                
                if(data == "Location"){
                          window.location="http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php";
                      }
                
               $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                
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


$(function() {
    $('#close_messenge').click(function(){

     
        $('.messenge').animate({ opacity: 'toggle',  top: 'toggle' }, 600);

    });
});
           
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
                  errors = "заполните поля";
                  
              }
              
              if(errors == false){
                    $.ajax({
                  url: "login_ajax_port.php",
                  type: "POST",
                  data: ({login: login, pass: pass}),
                  dataType: "html",
                  beforeSend: funcBefore, 
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
              }
            
          }); 
                    
              
          });




//sign

$('#do_sign_ajax_after').hide();
//$(".inputkod").hide();
var kod;

function funcBeforeS(){
    $(".messenge").fadeOut(300);
              afterButtonS();
               $(".upsign p").html("ожидание данных...");
       $(".upsign").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           }
           
            function funcSuccessS(data){
                
                $(".upsign").fadeOut(300);
                
                if(data == "Location"){
                          window.location="http://cookie.loc/index.php";
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
                  beforeSend: funcBeforeS, 
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
              }
            
          }); 
                    
              
          });

