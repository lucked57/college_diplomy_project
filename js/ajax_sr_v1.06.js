var location_href = "/";

  function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

var token_url = false;


function Showloader(){
    $('.modal-body button, .modal-body input').attr('disabled',' ');
}

function funcSuccess(){
    $('.modal-body button, .modal-body input').removeAttr('disabled');
}

function funcSuccess_l(data){
    
                funcSuccess();
    
                //if(token_url){
                    
                
    
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                    else if(data == 'capcha'){       
                 $('#login-feedback p').html('Превышено кол-во неправильных попыток входа, на вашу почту отправлен код подтверждения');
                 $('#login-feedback').fadeIn(300);
                    $('#kod').fadeIn(300);
                 $("#pass_l").val("");
                    }
                else{
                  $("#login-feedback p").html(data);
                  $("#login-feedback").fadeIn(300);
                  $("#pass_l").val("");
                }
                    
                    
                 /*   }
    
                else{
                    token_url = true;
                }*/
    
}



/*function funcSuccess_l(data){
    
                funcSuccess();
    

                    
                
    
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                else{
                  $("#login-feedback p").html(data);
                  $("#login-feedback").fadeIn(300);
                  $("#pass_l").val("");
                }
                    
                    

    
}*/



/*grecaptcha.ready(function() {
grecaptcha.execute('6LfvFHoUAAAAADxb9ihiA7vfOkVV_Q7oxL5s6uqh', {action: 'homepage'})
.then(function(token) {
    $('#captcha_token').val(token);
});
});

function Send_Google(){
    

    $.ajax({
                  url: "login_p.php",
                  type: "POST",
                  data: ($('#form_login').serialize()),
                  beforeSend: Showloader, 
                  success: funcSuccess_l 
              });
    
    }*/
//Send_Google();



$(document).ready(function(){ //при полной загрузке страницы
              
          $("#do_login_ajax, #form_login").on("submit", function(){ // при событии отправки формы с id form_login
             
              
               /* grecaptcha.ready(function() {
                grecaptcha.execute('6LfvFHoUAAAAADxb9ihiA7vfOkVV_Q7oxL5s6uqh', {action: 'homepage'})
                .then(function(token) {
                    $('#captcha_token').val(token);
                    //alert(token);
                });
                });*/
              
              var kod = $('#kod_l').val();
              
              
             var login = $("#login_l").val(); // получение содержимого элементов формы
              
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
              /* if(login.indexOf('<')!= -1 || login.indexOf('>')!= -1 || login.indexOf('"')!= -1 || login.indexOf("'")!= -1 || pass.indexOf('<')!= -1 || pass.indexOf('>')!= -1 || pass.indexOf('"')!= -1 || pass.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }*/
              
              if(errors == false){
                //  alert($('#form_login').serialize());
                    $.ajax({
                  url: "login_p.php",
                  type: "POST",
                  data: ($('#form_login').serialize()),
                  beforeSend: Showloader, 
                  success: funcSuccess_l 
              });
              
              }
              else{ // если есть ошибки, то показываем их пользователю
                  $("#login-feedback p").html(errors);
                  $("#login-feedback").fadeIn(300);
                  $("#pass_l").val("");
              }
            
          }); 
                    
              
          });








var kod;

$('#kod_form').hide();

function funcSuccess_s(data){
    
                funcSuccess();
    
                
                if(data == "Вы успешно зарегистировались"){
                          $("#sign-feedback p").html('Вы успешно зарегестировались');
                            $("#sign-feedback").fadeIn(300);
                            $('#kod_form').hide();
                    $('#modal-sing-in').modal('hide');
                      }
    
                else if(data == "visibale"){
                    $("#sign-feedback p").html('Код подтверждения выслан на вашу почту');
                    $("#sign-feedback").fadeIn(300);
                    $('#kod_form').fadeIn(300);
                }
                else if(data == "again kod"){
                    $("#sign-feedback p").html('Код подтверждения повторно выслан на вашу почту');
                    $("#sign-feedback").fadeIn(300);
                }
                else if(data == "На ваш email уже был отправлен код подтверждения, проверьте спам или нажмите отправить повторно"){
                    $("#sign-feedback p").html(data);
                    $("#sign-feedback").fadeIn(300);
                    $('#kod_form').fadeIn(300);
                }
                else{
                  $("#sign-feedback p").html(data);
                  $("#sign-feedback").fadeIn(300);
                  $("#pass_s").val("");
                  $("#pass_again_s").val("");
                }
    
}































var connect = true;





function BeforeConnect(){
    
    connect = false;
    
}


function funcSuccess_connetc(data){
    
    connect = true;
    
    alert(data);
    
    
}





$(document).ready(function(){
    
    $('.conntect_a').on("click", function(){
        
        var user_connect = "user";
        
        var errors = false;
        
        var id_connetc = parseInt($(this).attr('id').trim());
        
        //errors = "Данная функция еще не готова";
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){

        $.ajax({
                  url: "conntect_post_ajax.php",
                  type: "POST",
                  data: ({user_connect: user_connect, id: id_connetc}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      alert(data);
                  }
        
        })
        }
        else{
           // alert($(this).attr('id'));
            alert(errors);
        }
    
})
})




$(document).ready(function(){
    
    $('#messenge_delete').on("click", function(){
        
        var errors = false;
        
        var confirm_m = confirm("Вы уверены?");
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(!confirm_m){
            errors = 'Отмена';
        }
        
        if(errors == false){

        $.ajax({
                  url: "del_messenge_ajax.php",
                  type: "POST",
                  data: ({id: 'id'}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      alert(data);
                  }
        
        })
        }
        else{
           // alert($(this).attr('id'));
            alert(errors);
        }
    
})
})




$(document).ready(function(){
    
    $('.delete-img-admin').on("click", function(){
        
        var errors = false;
        
        var id = parseInt($(this).attr('value').trim());
        
        var confirm_m = confirm("Вы уверены?");
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(!confirm_m){
            errors = 'Отмена';
        }
        
        if(errors == false){

        $.ajax({
                  url: "del_img_ajax.php",
                  type: "POST",
                  data: ({id: id}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      alert(data);
                  }
        
        })
        }
        else{
           // alert($(this).attr('id'));
            alert(errors);
        }
    
})
})














var id_connetc;


$(document).ready(function(){
    
    
    
    $('.end-posts').on("click", function(){
        
        id_connetc = parseInt($(this).attr('id').trim());
        
        })
    
    
    function getCheckedCheckBoxes() {
      var checkboxes = $('.check_user_score');
      var checkboxesChecked = []; 
      for (var index = 0; index < checkboxes.length; index++) {
         if (checkboxes[index].checked) {
            checkboxesChecked.push(checkboxes[index].value); 
           // alert(checkboxes[index].value); 
         }
      }
      return checkboxesChecked; 
    }
    
    function Update_scorefunct(){
        $.ajax({
                  url: "users_score.php",
                  type: "POST",
                  data: ({id: id_connetc, meta: 'select'}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      $('#score-form').html(data);
                  }
        
        })
    }
    
    
   $('.score-button').on("click", function(){
        
        setTimeout(Update_scorefunct, 100);
        
        })
    
    $('#verify_score_admin').on("click", function(){
        
            var errors = false;
        
            var id_score = 5;
        
            if(errors == false){
            
        
        
        
             $.ajax({
                      url: "users_score.php",
                      type: "POST",
                      data: ({id: id_score, meta: 'select_verify'}),
                      dataType: "html",
                      beforeSend: BeforeConnect, 
                      success: function(data){
                          connect = true;
                          $('#verify-score-form').html(data);
                      }

            })

            }
            else{
                alert(errors);
            }
        
        })
    
    
    
    $('#verify_score_achivka').on("click", function(){
        
            var errors = false;
        
            var id_score = 5;
        
            var post_verif = [];
        
            post_verif = getCheckedCheckBoxes();
        
            if(post_verif.length == 0){
                errors = 'Выберите хотя бы одно значение';
            }
            else{
                post_verif = JSON.stringify(post_verif);
            }
        
            
        
            if(errors == false){
            
        
        
        
             $.ajax({
                      url: "users_score.php",
                      type: "POST",
                      data: ({id: id_score, meta: 'verify', post_verify: post_verif}),
                      dataType: "html",
                      beforeSend: BeforeConnect, 
                      success: function(data){
                          connect = true;
                          $('#verify-score-form').html(data);
                      }

            })

            }
            else{
                alert(errors);
            }
        
        })
    
    $('#delete_score_achivka').on("click", function(){
        
            var errors = false;
        
            var id_score = 5;
        
            var post_verif = [];
        
            post_verif = getCheckedCheckBoxes();
        
            if(post_verif.length == 0){
                errors = 'Выберите хотя бы одно значение';
            }
            else{
                post_verif = JSON.stringify(post_verif);
            }
        
            
        
            if(errors == false){
            
        
        
        
             $.ajax({
                      url: "users_score.php",
                      type: "POST",
                      data: ({id: id_score, meta: 'delete', post_verify: post_verif}),
                      dataType: "html",
                      beforeSend: BeforeConnect, 
                      success: function(data){
                          connect = true;
                          $('#verify-score-form').html(data);
                      }

            })

            }
            else{
                alert(errors);
            }
        
        })
    
    $('#score_achivka').on("click", function(){
        
        var inputs = $('.input-score');
        var arr_ipnuts = [];
        var login;
        var errors = false;
        
        
        //var leaderStr = JSON.stringify(leader);
        //leader = JSON.parse(leaderStr);
        //php json_encode;
        
        for (var index = 0; index < inputs.length; index++) {
          if(inputs[index].value.trim().length > 0){
                login = $('.input-score' + index).attr('login');
                arr_ipnuts.push(inputs[index].value + '!-----!' + login); 
                //alert(inputs[index].value); 
                //alert(login);
         }
         
      }
        
        if(arr_ipnuts.length == 0 || login.length == 0){
            errors = 'empty';
        }
        
        arr_ipnuts = JSON.stringify(arr_ipnuts);
        
        //errors = arr_ipnuts;
        
        if(errors == false){
            
        
        
        
         $.ajax({
                  url: "users_score.php",
                  type: "POST",
                  data: ({id: id_connetc, meta: 'score', array: arr_ipnuts}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      $('#score-form').html(data);
                  }
        
        })
            
        }
        else{
            alert(errors);
        }
    
    })
    
    
    
    $('.update_post').on("click", function(){
        
    setTimeout(Update_postfunct, 100);
    
})
    
    
    
    
    
    function Update_postfunct(){
            var errors = false;
        
        
        
        //errors = id_connetc;
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){
                //alert(id_connetc);
        $.ajax({
                  url: "update_post.php",
                  type: "POST",
                  data: ({id: id_connetc, meta: 'select'}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                     // alert(data);
                      var res = data.split("<>");
                      $('#title_post').val(res[0].trim());
                      $('#text_post').val(res[1].trim());
                      $('#data_post').val(res[2].trim());
                      $('#tags_post').val(res[3].trim());
                  }
        
        })
        }
        else{
            alert(errors);
        }
    }
    
    
    
    
    
    
        $('#do_updatepost_ajax').on("click", function(){
        
        var errors = false;
        
        var title = $('#title_post').val();
        var text = $('#text_post').val();
            
        var data = $('#data_post').val();
        var tags = $('#tags_post').val();
            
        if(title.length == 0 || text.length == 0 || data.length == 0 || tags.length == 0){
            errors = 'пустые значения';
        }
        
        //errors = id_connetc;
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){
                //alert(id_connetc);
        $.ajax({
                  url: "update_post.php",
                  type: "POST",
                  data: ({id: id_connetc, meta: 'update', title: title, text: text, data: data, tags: tags}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                    alert(data);
                  }
        
        })
        }
        else{
            alert(errors);
        }
    
})
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $('#end_achivka').on("click", function(){
        
        var user_connect = "user";
        
        var errors = false;
        
        
        
        //errors = id_connetc;
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){
                //alert(id_connetc);
        $.ajax({
                  url: "end_post_ajax.php",
                  type: "POST",
                  data: ({id: id_connetc}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                     // alert(data);
                      $('#close_achivka_modal').modal('hide');
                      window.location=location_href;
                  }
        
        })
        }
        else{
            alert(errors);
        }
    
})
    
    
    
    
    
    function funct_before_edit(){
        var user_connect = "user";
        
        var errors = false;
        
        
        
        //errors = id_connetc;
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){
                //alert(id_connetc);
        $.ajax({
                  url: "edit_user_ajax.php",
                  type: "POST",
                  data: ({id: id_connetc, meta: 'select'}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      //$('#edit_user_modal').modal('hide');
                      arr = data.split(' ');
                      arr.forEach(function(item, i, arr) {
                          //alert(item);
                          $('#teacherts_edit_err').append(item);
                        });
                  }
        
        })
        }
        else{
            alert(errors);
        }
    
    }
    
    
    $('.select_edit_user').on("click", function(){
        
        setTimeout(funct_before_edit, 50);
})
    
    
    
    
    
    
    
    
    
    $('#del_achivka').on("click", function(){
        
        var user_connect = "user";
        
        var errors = false;
        
        
        
        //errors = id_connetc;
        
        if(!connect){
            errors = 'Запрос обрабатывается';
        }
        
        if(errors == false){

        $.ajax({
                  url: "del_post_ajax.php",
                  type: "POST",
                  data: ({id: id_connetc}),
                  dataType: "html",
                  beforeSend: BeforeConnect, 
                  success: function(data){
                      connect = true;
                      $('#delete_modal').modal('hide');
                      window.location=location_href;
                      //alert(data);
                  }
        
        })
        }
        else{
            alert(errors);
        }
    
})
    
    
    
    
})












var kod;

        $(document).ready(function(){
            
            
            
             
    $('#again_sign_code').click(function(){

            kod = "send_again";
        $('#inputkod_sign, #again_sign_code').attr('disabled',' ');
         setTimeout(function() {
                                $('#inputkod_sign, #again_sign_code').removeAttr('disabled');
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
              
           /*    if(login.indexOf('<')!= -1 || login.indexOf('>')!= -1 || login.indexOf('"')!= -1 || login.indexOf("'")!= -1 || email.indexOf('<')!= -1 || email.indexOf('>')!= -1 || email.indexOf('"')!= -1 || email.indexOf("'")!= -1 || pass.indexOf('<')!= -1 || pass.indexOf('>')!= -1 || pass.indexOf('"')!= -1 || pass.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }*/
              
              
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
                  success: funcSuccess_s 
              });
              
              }
              else{
                  $("#sign-feedback p").html(errors);
                  $("#sign-feedback").fadeIn(300);
                  $("#pass_s").val("");
                  $("#pass_again_s").val("");
              }
            
          }); 
                    
              
          });

















































var kod;
var kod_again;

        $(document).ready(function(){
            
            
            
             
    $('#again_sign_newv_code').click(function(){

            kod = "send_again";
        

    });
            
             $('#do_sign_newv_ajax_again').click(function(){

                        kod_again = "send_account_again";

                });

              
          $("#do_sign_newv_ajax,#again_sign_newv_code,#do_sign_newv_ajax_again").on("click", function(){
              
              
                            
                $('#do_sign_newv_ajax').click(function(){

                        kod = null;

                });
              
             
          
              
            
             
              
              var email = $("#email_newv").val();
              
              var errors = false;
              
    
       
          
    
              
              var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
              if(!pattern.test(email)){
                  errors = email + " не является email";
              }
              
    
              
              
               if(email.trim().length==0){
                  errors = "заполните поле";
                  
              }
              
            
              
              if ($("#kod_newv").is(':visible')) {
                  
                    if(kod!="send_again"){
                        
                        
                        kod = $("#kod_newv").val();
                    
                     
                  if(kod.trim().length!=5){
                      errors = "код состоит из 5 символов";
                  }
                        }
                }
              else{
                  
                  if(kod != "send_account_again"){
                      kod = "not visibale";
                  }
                
              }

              var kod_groupe = $('#kod_groupe_newv').val();
              
              if(errors == false){
                    $.ajax({
                  url: "sign_portfolio.php",
                  type: "POST",
                  data: ({email: email, kod: kod, kod_again: kod_again, kod_groupe: kod_groupe}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      kod = null;
                      $('#again_sign_newv_code').attr('disabled',' ');
         setTimeout(function() {
                                $('#again_sign_newv_code').removeAttr('disabled');
                            }, 30000);
                      
                        if(data=='На ваш email уже был отправлен код подтверждения, проверьте спам или нажмите отправить повторно' || data == 'На ваш email выслан код подтверждения' || data == "Введенный вами код не совпадает"){
                            $('#kod_form_newv').fadeIn(300);
                        }
                      if(data == 'Готово! На ваш email высланы данные для входа' || data == 'Данные повторно аккаунта отравлены на вашу почту'){
                          $('#modal-sign-in_newv').modal('hide');
                          $('#modal-login').modal('show');
                      }
                      $("#sign-feedback_newv p").html(data);
                      $("#sign-feedback_newv").fadeIn(300);
                  } 
              });
              
              }
              else{
                  $("#sign-feedback_newv p").html(errors);
                  $("#sign-feedback_newv").fadeIn(300);
              }
            
          }); 
                    
              
          });




















$(document).ready(function(){

              
          $("#do_add_email").on("click", function(){
              
              
             
          
              
            
             
              
              var email = $("#email_add").val();
              
              var select = $("#inlineFormCustomSelect option:selected").val();
              
              var errors = false;
              
    
       
          
    
              
             /* var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
              if(!pattern.test(email)){
                  errors = email + " не является email";
              }*/
              
    
              
              
               if(email.trim().length==0){
                  errors = "заполните поле";
                  
              }
              
              if( select != 'users' && select != 'teachers' && select != 'groupe'){
                  errors = "Выберите значение";
              }
                

              if(errors == false){
                    $.ajax({
                  url: "add_email_ajax.php",
                  type: "POST",
                  data: ({email: email, select: select}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      $("#add_email-feedback p").html(data);
                      $("#add_email-feedback").fadeIn(300);
                  } 
              });
              
              }
              else{
                  $("#add_email-feedback p").html(errors);
                  $("#add_email-feedback").fadeIn(300);
              }
            
          }); 
                    
              
          });










var update = "false";







 function funcSuccess_update_anketa(data){
        
        if(data != "empty"){
            if(data.length != 0){
                
             data = JSON.parse(data);   
                
            update = "true";    
            $("#FIO_anketa").val(data[1]);
            $("#group_anketa").val(data[2]);
            $("#data_anketa").val(data[3]);
            $("#adress_anketa").val(data[4]);
            }

        }
        else{
            $('#modal-anketa-s').modal({
                  backdrop: 'static',
                  keyboard: false
                })
        }

        
    }







var login_cookie = getCookie ("login");



if(login_cookie != undefined){
    
       $.ajax({
                url: "update_anketa_s.php",
                type: "POST",
                data: ({
                    login: login_cookie,
                }),
                dataType: "html",
                success: funcSuccess_update_anketa
            });
    
}



























































        function funcSuccess_update_anketa_t(data){
        
        if(data != "empty"){
            if(data.length != 0){
                
             data = JSON.parse(data);   
                
            update = "true";    
            $("#FIO_anketa_t").val(data[1]);
            $("#group_anketa_t").val(data[2]);
            $("#phone_anketa_t").val(data[3]);
            }

        }
        else{
                     $('#modal-anketa-t').modal({
                      backdrop: 'static',
                      keyboard: false
                    })
        }

        
    }







var login_cookie = getCookie ("login_teacher");

if(login_cookie != undefined){
    
       $.ajax({
                url: "update_anketa_t.php",
                type: "POST",
                data: ({
                    login: login_cookie,
                }),
                dataType: "html",
                success: funcSuccess_update_anketa_t
            });
    
}















$("#dont_remember_pass").on("click", function(){
    $('#modal-login').modal('hide');
    $("#sign-feedback_newv p").html('Введите ваш email и нажмите отправить повторно для восстановления пароля');
    $("#sign-feedback_newv").fadeIn(300);
});











$(document).ready(function(){

              
          $("#do_anketa_t_ajax").on("click", function(){
              
              
             
          
              
            
             
              
              var FIO = $("#FIO_anketa_t").val();
              
              var group = $("#group_anketa_t").val();
              
              var phone = $("#phone_anketa_t").val();
              
              var errors = false;
              
    
       
          
    

              
    
              
              
               if(FIO.trim().length==0 || group.trim().length==0 || phone.trim().length==0){
                  errors = "заполните все поля";
                  
              }

              if(errors == false){
                    $.ajax({
                  url: "anketa_teachers_ajax.php",
                  type: "POST",
                  data: ({FIO: FIO, group: group, phone: phone, update: update}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      $("#anketa-t-feedback p").html(data);
                      $("#anketa-t-feedback").fadeIn(300);
                      if(data == 'анкета успешно заполнена'){
                          $('#modal-anketa-t').modal('hide');
                      }
                  } 
              });
              
              }
              else{
                  $("#anketa-t-feedback p").html(errors);
                  $("#anketa-t-feedback").fadeIn(300);
              }
            
          }); 
                    
              
          });










$(document).ready(function(){

              
          $("#do_anketa_ajax").on("click", function(){
              
              
             
          
              
            
             
              
              var FIO = $("#FIO_anketa").val();
              
              var group = $("#group_anketa").val();
              
              var adress = $("#adress_anketa").val();
              
              var year = $("#data_anketa").val();
              
              var errors = false;
              
              if(year.trim().length!=4){
                  errors = "дата рождения должна состоять из 4 цифр";
              }
               if(FIO.trim().length==0 || group.trim().length==0 || adress.trim().length==0 || year.trim().length==0){
                  errors = "заполните все поля";
                  
              }
              

              if(errors == false){
                    $.ajax({
                  url: "anketa_ajax.php",
                  type: "POST",
                  data: ({FIO: FIO, group: group, update: update, adress: adress, year: year}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      $("#anketa-feedback p").html(data);
                      $("#anketa-feedback").fadeIn(300);
                      if(data == 'анкета успешно заполнена'){
                          $('#modal-anketa-s').modal('hide');
                      }
                  } 
              });
              
              }
              else{
                  $("#anketa-feedback p").html(errors);
                  $("#anketa-feedback").fadeIn(300);
              }
            
          }); 
                    
              
          });






















$(document).ready(function(){

              
          $("#do_pass_change_ajax").on("click", function(){
              
              
             
          
              
            
             
              
              var pass = $("#pass_change").val();
              
              var pass_new = $("#pass_change_new").val();
              
              var pass_new_again = $("#pass_change_new_again").val();
              
              var errors = false;
              
               if(pass.trim().length==0 || pass_new.trim().length==0 || pass_new_again.trim().length==0){
                  errors = "заполните все поля";
                  
              }
              
              if(pass_new.trim().length < 8){
                  errors = 'пароль должен содержать хотя бы 8 символов';
              }
              
              if(pass_new != pass_new_again){
                  errors = 'повторный пароль не совпадает';
              }
              

              if(errors == false){
                    $.ajax({
                  url: "pass_change_ajax.php",
                  type: "POST",
                  data: ({pass: pass, pass_new: pass_new}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      if(data == "Пароль успешно был изменен"){
                          window.location=location_href;
                      }
                      $("#pass-change-feedback p").html(data);
                      $("#pass-change-feedback").fadeIn(300);
                  } 
              });
              
              }
              else{
                  $("#pass-change-feedback p").html(errors);
                  $("#pass-change-feedback").fadeIn(300);
              }
            
          }); 
                    
              
          });






















var files;

$('#img_anketa').on('change', function(){
	files = this.files;
    
});


$(document).ready(function(){

              
          $("#do_img_change_ajax, #form_anketa").on("submit", function(){
              
              
             var errors = false;
              

            if( typeof files == 'undefined' ) {
                  errors = "файл не выбран";
              }
              else if(files[0].size>9000000){
                  
                        errors = "слишком большой размер изображения";

                  
              }


              var data_img = new FormData();
                $.each( files, function( key, value ){
                    data_img.append( key, value );
                });

                data_img.append( 'image', 1 );
            
            
      
              

              if(errors == false){
                   $.ajax({
                    url         : 'changeimg_ajax.php',
                    type        : 'POST',
                    data        : data_img,
                    cache       : false,
                    dataType    : 'json',
                    processData : false,
                    contentType : false, 
                    beforeSend: Showloader,
                    success     : function( respond, status, jqXHR ){

                            funcSuccess();
			if( typeof respond.error === 'undefined' ){

               
                $("#img-avatar").attr("src",respond.files);
                $("#img-change-feedback p").html('Аватарка успешно изменена');
                $("#img-change-feedback").fadeIn(300);
				
			}

			else {
                $("#img-change-feedback p").html('ОШИБКА: ' + respond.error);
                $("#img-change-feedback").fadeIn(300);
			}
		},

		error: function( jqXHR, status, errorThrown ){
            funcSuccess();
             $("#img-change-feedback p").html('ОШИБКА AJAX запроса: ' + status, jqXHR);
             $("#img-change-feedback").fadeIn(300);
            
		}

              });
              
              }
              else{
                  $("#img-change-feedback p").html(errors);
                  $("#img-change-feedback").fadeIn(300);
              }
            
          }); 
                    
              
          });























$(document).ready(function(){
    
    var meta;
    
    
        $("#stats, #user_stats").on("click", function(){
            meta = 'stats';
        });
        $("#for_year").on("click", function(){
            meta = 'for_year';
        });
        $("#for_sim").on("click", function(){
            meta = 'for_sim';
        });

              
          $("#user_stats, #stats, #for_year, #for_sim").on("click", function(){
              
              
              var errors = false;
              

              if(errors == false){
                    $.ajax({
                  url: "stats_user.php",
                  type: "POST",
                  dataType: "html",
                  data: ({meta: meta}),
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      if(data == "Пароль успешно был изменен"){
                          window.location = location_href;
                      }
                      $("#user_stats_table").empty();
                      $("#user_stats_table").append(data);
                     // $('body').css('overflow','hidden');
                  } 
              });
              
              }
              else{
                  $("#user_stats_table").empty();
                  $("#user_stats_table").append(errors);
              }
            
          }); 
                    
              
          });

























































var login_student_for_teachers;








function stclInit(){
              
  $(".student-group").on("click", function(){     
      var errors = false;

      login_student_for_teachers = $(this).attr('value');

      //alert(login_student_for_teachers);
      
      

      if(errors == false){
            $.ajax({
          url: "stats_user.php",
          type: "POST",
          dataType: "html",
          data: ({meta: 'all', login_select: login_student_for_teachers}),
          beforeSend: Showloader, 
          success: function(data){
              funcSuccess();
              $("#stats-teachers").empty();
              $("#stats-teachers").append(data);
             // $('body').css('overflow','hidden');
              StatsBack();
          } 
      });

      }
      else{
          $("#stats-teachers").empty();
          $("#stats-teachers").append(errors);
      }

  }); 
       
    


}




function StatsBack(){
      $("#stats_back").on("click", function(){
              
              
              var errors = false;
              
              
              if(errors == false){
                    $.ajax({
                  url: "group_name.php",
                  type: "POST",
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      $("#stats-teachers").empty();
                      $("#stats-teachers").append(data);
                     // $('body').css('overflow','hidden');
                      stclInit();
                  } 
              });
              
              }
              else{
                  $("#stats-teachers").empty();
                  $("#stats-teachers").append(errors);
              }
            
          }); 
}













$(document).ready(function(){
    


              
          $("#teachers_stats_click").on("click", function(){
              
              
              var errors = false;
              
              
              if(errors == false){
                    $.ajax({
                  url: "group_name.php",
                  type: "POST",
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: function(data){
                      funcSuccess();
                      $("#stats-teachers").empty();
                      $("#stats-teachers").append(data);
                     // $('body').css('overflow','hidden');
                      stclInit();
                  } 
              });
              
              }
              else{
                  $("#stats-teachers").empty();
                  $("#stats-teachers").append(errors);
              }
            
          }); 
                    
              
          });



















































var id_post;

var comment_i = 0;


$(document).ready(function(){
    


              
          $("#add_comment").on("click", function(){
              
              
              id_post = $('.gdhwgdgtrg').attr('value');
              
              
              var errors = false;
              
              
              var text_comment = $('#text_comment').val();
              

              
              
              
              if(errors == false){
                    $.ajax({
                  url: "comments_controller.php",
                  type: "POST",
                  dataType: "html",
                  beforeSend: Showloader, 
                  data: ({text: text_comment, id: id_post}),
                  success: function(data){
                      funcSuccess();
                      
                                $('#text_comment').val("");
                          
                                function Comment_lock(){
                                        $('#text_comment, #add_comment').removeAttr('disabled');
                                        comment_i = 0;
                                }

                                function Comment_lock_i(){
                                        comment_i = 0;
                                }


                                comment_i++;

                                if(comment_i > 2){
                                    $('#text_comment, #add_comment').attr('disabled',' ');
                                    setTimeout(Comment_lock, 15000);
                                    alert('В избежании спама, вы сможете добавить комментарий только через 15 секунд');
                                }
                                else{
                                    setTimeout(Comment_lock_i, 5000);
                                }

                      
                                                $.ajax({
                                      url: "comments_update.php",
                                      type: "POST",
                                      dataType: "html",
                                      data: ({id: id_post, meta: 'select'}),
                                      success: function(data){
                                            $('.comments-div').html(data);
                                          Comments_controller();
                                      } 
                                  });
                  } 
              });
              
              }
              else{
                 alert(errors);
              }
            
          }); 
                    
              
          });










































$(document).ready(function(){
    
        var meta;
        var group;
        var group_s;
    
    
        function student_one_stats(){
            
            $(".student-group").on("click", function(){
                    meta = 'stats';
                    group_s = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_all_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group_s}),      
                          success: function(data){
                              funcSuccess();
                              $("#stats-all").empty();
                              $("#stats-all").append(data);
                              students_in_group();
                              student_one_stats();
                          } 
                      });
                          
                      }
                });
            
                 $("#stats_back_students").on("click", function(){
                    meta = 'students';
                    //group = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_all_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group}),      
                          success: function(data){
                              funcSuccess();
                              $("#stats-all").empty();
                              $("#stats-all").append(data);
                              students_in_group();
                              student_one_stats();
                          } 
                      });
                          
                      }
                });
        }
    
    
    
    
    
        function students_in_group(){
            $(".group-all").on("click", function(){
                    meta = 'students';
                    group = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_all_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group}),      
                          success: function(data){
                              funcSuccess();
                              $("#stats-all").empty();
                              $("#stats-all").append(data);
                              students_in_group();
                              student_one_stats();
                          } 
                      });
                          
                      }
                });
                
                $("#stats_back_group").on("click", function(){
                    meta = 'group';
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                              url: "stats_all_controller.php",
                              type: "POST",
                              dataType: "html",
                              beforeSend: Showloader, 
                              data: ({meta: meta}),      
                              success: function(data){
                                  funcSuccess();
                                  $("#stats-all").empty();
                                  $("#stats-all").append(data);
                                  students_in_group();
                              } 
                          });
                          
                      }
                });
        }
     

              
          $("#stats_click_all").on("click", function(){
              
              
              meta = "group";
              
              var errors = false;

              if(errors == false){
                    $.ajax({
                  url: "stats_all_controller.php",
                  type: "POST",
                  dataType: "html",
                  beforeSend: Showloader, 
                  data: ({meta: meta}),      
                  success: function(data){
                      funcSuccess();
                      $("#stats-all").empty();
                      $("#stats-all").append(data);
                      students_in_group();
                     // $('body').css('overflow','hidden');
                     // stclInit(); вызов функции
                  } 
              });
              
              }
              else{
                  $("#stats-all").empty();
                  $("#stats-all").append(errors);
              }
            
          }); 
                    
              
          });




























function student_one_stats_admin(){
            
            $(".student-group-admin").on("click", function(){
                    meta = 'stats';
                    group_s = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_admin_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group_s}),      
                          success: function(data){
                              funcSuccess();
                              $("#users_admin_d").empty();
                              $("#users_admin_d").append(data);
                              students_in_group_admin();
                              student_one_stats_admin();
                          } 
                      });
                          
                      }
                });
    
    
    
    
                $(".student-delete-admin").on("click", function(){
                    meta = 'delete';
                    group_s = $(this).attr('value');
                    //alert(group);
                    var errors = false;
                    
                    var confirm_m = confirm("Вы уверены?");
        
        
                    if(!confirm_m){
                        errors = 'Отмена';
                    }

                      if(errors == false){
                            $.ajax({
                          url: "stats_admin_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group_s}),      
                          success: function(data){
                              funcSuccess();
                              alert(data);
                              students_in_group_admin();
                              student_one_stats_admin();
                          } 
                      });
                          
                      }
                });
    
            
                 $("#stats_back_students").on("click", function(){
                    meta = 'students';
                    //group = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_admin_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group}),      
                          success: function(data){
                              funcSuccess();
                              $("#users_admin_d").empty();
                              $("#users_admin_d").append(data);
                              students_in_group_admin();
                              student_one_stats_admin();
                          } 
                      });
                          
                      }
                });
        }
    
    
    
    
    
        function students_in_group_admin(){
            $(".group-all-admin").on("click", function(){
                    meta = 'students';
                    group = $(this).attr('value');
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                          url: "stats_admin_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, select: group}),      
                          success: function(data){
                              funcSuccess();
                              $("#users_admin_d").empty();
                              $("#users_admin_d").append(data);
                              students_in_group_admin();
                              student_one_stats_admin();
                          } 
                      });
                          
                      }
                });
                
                $("#stats_back_group").on("click", function(){
                    meta = 'group';
                    //alert(group);
                    var errors = false;

                      if(errors == false){
                            $.ajax({
                              url: "stats_admin_controller.php",
                              type: "POST",
                              dataType: "html",
                              beforeSend: Showloader, 
                              data: ({meta: meta}),      
                              success: function(data){
                                  funcSuccess();
                                  $("#users_admin_d").empty();
                                  $("#users_admin_d").append(data);
                                  students_in_group_admin();
                              } 
                          });
                          
                      }
                });
        }

        students_in_group_admin();
        student_one_stats_admin();






        $("#delete_curs_do").on("click", function(){
                    var errors = false;
            
                    var year = $('#year_delete').val();
            
                    var select = $("#curs_delete").val();
            
                    if(year.trim().length != 2){
                        errors = 'Год должен состоять из 2 символов';
                    }
                    if(select != '4' && select != '5'){
                        errors = 'Выберите курс';
                    }

                      if(errors == false){
                            $.ajax({
                          url: "stats_admin_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: 'delete_curs', year: year, select: select}),      
                          success: function(data){
                              funcSuccess();
                              alert(data);
                          } 
                      });
                          
                      }
                        else{
                            alert(errors);
                        }
                });




$(".delete_cat").on("click", function(){
                    meta = 'delete';
                    group_s = $(this).attr('value');
                    //alert(group);
                    var errors = false;
                    
                    var confirm_d = confirm("Вы уверены?");
        
        
                    if(!confirm_d){
                        errors = 'Отмена';
                    }

                      if(errors == false){
                            $.ajax({
                          url: "category_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, id: group_s}),      
                          success: function(data){
                              funcSuccess();
                              alert(data);
                          } 
                      });
                          
                      }
                });










$("#do_category").on("click", function(){
                    meta = 'add';
                    group_s = $('#category_in_add').val();
                    //alert(group);
                    var errors = false;
                    
                    if(group_s.trim().length == 0){
                        errors = 'Пустая категория';
                    }

                      if(errors == false){
                            $.ajax({
                          url: "category_controller.php",
                          type: "POST",
                          dataType: "html",
                          beforeSend: Showloader, 
                          data: ({meta: meta, id: group_s}),      
                          success: function(data){
                              funcSuccess();
                              alert(data);
                          } 
                      });
                          
                      }
                        else{
                            alert(errors);
                        }
                });
