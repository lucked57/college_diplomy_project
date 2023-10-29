function Showloader(){
    $("#loading_div").fadeIn(0);
    $(".messenge").fadeOut(300);
} 

function Hideloader(){
    $("#loading_div").fadeOut(300);
} 

var location_href = "http://protfoli.loc/";

function insertMessenge(errors){
    $(".messenge p").html(errors);
} 

    function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

var update = "false";

    function funcSuccess_update_anketa(data){
        
        if(data != "empty"){
            if(data.length != 0){
                
             data = JSON.parse(data);   
                
            update = "true";    
            $("#FIO_anketa_t").val(data[1]);
            $("#group_anketa_t").val(data[2]);
            }

        }

        
    }







var login_cookie = getCookie ("login_teacher");

if(login_cookie.length > 0){
    
       $.ajax({
                url: "update_anketa_t.php",
                type: "POST",
                data: ({
                    login: login_cookie,
                }),
                dataType: "html",
                success: funcSuccess_update_anketa
            });
    
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
                

                

           }


function afterButton_t_an(){

    $('#form_anketa_t_after').show();
    $('#form_anketa_t').hide();
}

function beforeButton_t_an(){

    $('#form_anketa_t_after').hide();
    $('#form_anketa_t').show();
}



           
          $(document).ready(function(){
              
          $("#do_anketa_t_ajax, #form_anketa_t").on("submit", function(){
             
              
              
             var FIO = $("#FIO_anketa_t").val();
              
              var group = $("#group_anketa_t").val();
              
              
              var errors = false;
              

               if(FIO.trim().length==0 || group.trim().length==0){
                  errors = "заполните все поля";
                  
              }
               if(FIO.indexOf('<')!= -1 || FIO.indexOf('>')!= -1 || FIO.indexOf('"')!= -1 || FIO.indexOf("'")!= -1 || group.indexOf('<')!= -1 || group.indexOf('>')!= -1 || group.indexOf('"')!= -1 || group.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
              if(errors == false){
                    $.ajax({
                  url: "anketa_teachers_ajax.php",
                  type: "POST",
                  data: ({FIO: FIO, group: group, update: update}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: funcSuccess 
              });
              
              }
              else{
                  afterButton_t_an();
                  $(".messenge").fadeOut(300);
                   setTimeout(function() {
                                $(".messenge p").html(errors);
                            }, 300);
                  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                  setTimeout(beforeButton_t_an, 900);
                  $("#pass_l").val("");
              }
            
          }); 
                    
              
          });