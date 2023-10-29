var location_href = "http://onlinesborka.mcdir.ru";

  function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}




function Showloader(){
    $('.modal-body button, .modal-body input').attr('disabled',' ');
}

function funcSuccess(){
    $('.modal-body button, .modal-body input').removeAttr('disabled');
}

function funcSuccess_l(data){
    
                funcSuccess();
    
                
                if(data == "Location"){
                          window.location=location_href;
                      }
                else{
                  $("#login-feedback p").html(data);
                  $("#login-feedback").fadeIn(300);
                  $("#pass_l").val("");
                }
    
}




$(document).ready(function(){ //при полной загрузке страницы
              
          $("#do_login_ajax, #form_login").on("submit", function(){ // при событии отправки формы с id form_login
             
              
              
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
               if(login.indexOf('<')!= -1 || login.indexOf('>')!= -1 || login.indexOf('"')!= -1 || login.indexOf("'")!= -1 || pass.indexOf('<')!= -1 || pass.indexOf('>')!= -1 || pass.indexOf('"')!= -1 || pass.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
              if(errors == false){ // если данные введены пользователем корректно, то отправляем запрос к серверу с помощью метода ajax
                    $.ajax({
                  url: "login_p.php", // адрес, на который отправляется запрос
                  type: "POST", // тип выполняемого запроса
                  data: ({login: login, pass: pass}), // данные, которые отправляются на сервер
                  dataType: "html", // тип данных, которые отправляются на сервер
                  beforeSend: Showloader, // функция, которая будет вызвана  перед отправкой запроса на сервер
                  success: funcSuccess_l // Функция, которая будет вызвана после завершения запроса к серверу.
              });
              
              }
              else{ // если есть ошибки, то показываем их пользователю
                  $("#login-feedback p").html(errors);
                  $("#login-feedback").fadeIn(300);
                  $("#pass_l").val("");
              }
            
          }); 
                    
              
          });