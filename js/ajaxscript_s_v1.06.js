function Showloader(){
    $("#loading_div").fadeIn(0);
    $(".messenge").fadeOut(300);
} 

function Hideloader(){
    $("#loading_div").fadeOut(300);
} 

function Showloader_m(){
    $("#loading_div").fadeIn(0);
    $(".messenge").fadeOut(300);
    $('.modal-div-m').show();
} 

function Hideloader_m(){
$('.modal-div-m').hide();
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
            $("#FIO_anketa").val(data[1]);
            $("#group_anketa").val(data[2]);
            $("#data_anketa").val(data[3]);
            $("#adress_anketa").val(data[4]);
            }

        }

        
    }







var login_cookie = getCookie ("login");



if(login_cookie.length > 0){
    
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


//var divice_cookie = getCookie ("ios");




var files;

$('#img_anketa').on('change', function(){
	files = this.files;
    
});

$('#img_achivka_add').on('change', function(){
	files_add = this.files;
    
});




            function funcSuccess_s(data){
                
                $(".upsign").fadeOut(300);
                
                if(data == "Данной группы нету в бд"){
                    Hideloader();
                         $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                      }
                
                else if(data == "Анкета была только что заполнена, чтобы обновить перезагрузите страницу"){
                    Hideloader();
                         $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                      }

                else{
                    
                
                
                                var data_img = new FormData();
                $.each( files, function( key, value ){
                    data_img.append( key, value );
                });

                data_img.append( 'image', 1 );
                    

                    
                    
                    
                    
                    
                    
                                  
                                $.ajax({
                    url         : './submit.php',
                    type        : 'POST',
                    data        : data_img,
                    cache       : false,
                    dataType    : 'json',
                    processData : false,
                    contentType : false,
                    success     : function( respond, status, jqXHR ){


			if( typeof respond.error === 'undefined' ){

                Hideloader();
				/*var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){
					 html = val;
				} )
                */
				$('.messenge p').html("Анкета успешно заполнена");
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
			}

			else {
				$('.messenge p').html('ОШИБКА: ' + respond.error );
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                Hideloader();
			}
		},

		error: function( jqXHR, status, errorThrown ){
			$('.messenge p').html( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
            Hideloader();
		}

                                    

                });  

                }
                
           }




function afterButton_s_an(){

    $('#form_anketa_after').show();
    $('#form_anketa').hide();
}

function beforeButton_s_an(){

    $('#form_anketa_after').hide();
    $('#form_anketa').show();
}



           
          $(document).ready(function(){
              
          $("#do_anketa_ajax, #form_anketa").on("submit", function(){
             
              
              
             var FIO = $("#FIO_anketa").val();
              
              var group = $("#group_anketa").val();
              
              var adress = $("#adress_anketa").val();
              
              var year = $("#data_anketa").val();
              
              
              var errors = false;
              

              if( typeof files == 'undefined' ) {
                  errors = "файл не выбран";
              }
              else if(files[0].size>9000000){
                  
                        errors = "слишком большой размер изображения";

                  
              }
                  
              if(year.trim().length!=4){
                  errors = "дата рождения должна состоять из 4 цифр";
              }
               if(FIO.trim().length==0 || group.trim().length==0 || adress.trim().length==0 || year.trim().length==0){
                  errors = "заполните все поля";
                  
              }
               if(FIO.indexOf('<')!= -1 || FIO.indexOf('>')!= -1 || FIO.indexOf('"')!= -1 || FIO.indexOf("'")!= -1 || group.indexOf('<')!= -1 || group.indexOf('>')!= -1 || group.indexOf('"')!= -1 || group.indexOf("'")!= -1 || adress.indexOf('<')!= -1 || adress.indexOf('>')!= -1 || adress.indexOf('"')!= -1 || adress.indexOf("'")!= -1 || year.indexOf('<')!= -1 || year.indexOf('>')!= -1 || year.indexOf('"')!= -1 || year.indexOf("'")!= -1){
                  errors = "Содержаться недопустимые символы";
              }
              
              
              
                
              

                  
              

              
              if(errors == false){
                  

                  
                    $.ajax({
                  url: "anketa_ajax.php",
                  type: "POST",
                  data: ({FIO: FIO, group: group, update: update, adress: adress, year: year}),
                  dataType: "html",
                  beforeSend: Showloader, 
                  success: funcSuccess_s 
              });
                  
                  
                  
                  

                  
                  
                  
                  
                  
                  
                  
              
              }
              else{
                  afterButton_s_an();
                  $(".messenge").fadeOut(300);
                   setTimeout(function() {
                                $(".messenge p").html(errors);
                            }, 300);
                  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                  setTimeout(beforeButton_s_an, 900);
                  $("#pass_l").val("");
              }
            
          }); 
                    
              
          });













           function funcSuccess_add(data){
               
               Hideloader_m();
                
                $(".messenge").fadeOut(300);
                    
                         $(".messenge p").html(data);
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);



                
           }




function afterButton_s_add(){

    $('#form_add_achivka_after').show();
    $('#form_add_achivka').hide();
}

function beforeButton_s_add(){

    $('#form_add_achivka_after').hide();
    $('#form_add_achivka').show();
}

var check_img_add = 'No';
var check_main_add = 'No';

$(function () {

    $('#checkbox_img_add').on('change', function () {

        if ($('#checkbox_img_add').prop('checked')) {

            check_img_add = 'Yes';
            


        } else {

            check_img_add = 'No';

        }

    });

});

$(function () {

    $('#checkbox_main_add').on('change', function () {

        if ($('#checkbox_main_add').prop('checked')) {

            check_main_add = 'Yes';
           // alert(check_img_add);

        } else {

            check_main_add = 'No';
               // alert(check_img_add);
        }

    });

});
           
          $(document).ready(function(){
              
          $("#do_achivka_add, #form_add_achivka").on("submit", function(){
             
              
             var title_add = $("#title_achivka").val();
              
              var textarea_add = $("#textarea_achivka").val();
              
              
              var errors = false;
              
              if(check_img_add == 'No'){
                  
                   if( typeof files_add == 'undefined' ) {
                  errors = "файл не выбран";
              }
              else if(files_add[0].size>9000000){
                  
                        errors = "слишком большой размер изображения";

                  
              }
                  
              }

             
                  
              if(textarea_add.trim().length>5000){
                  errors = "Слишком большое описание достижения";
              }
               if(title_add.trim().length==0 || textarea_add.trim().length==0){
                  errors = "заполните все поля";
                  
              }
               if(title_add.indexOf('<')!= -1 || title_add.indexOf('>')!= -1 || title_add.indexOf("'")!= -1 || textarea_add.indexOf('<')!= -1 || textarea_add.indexOf('>')!= -1 || textarea_add.indexOf("'")!= -1 ){
                  errors = "Содержаться недопустимые символы";
              }
              
              
              
                
              if(check_img_add == 'Yes' && check_main_add == 'Yes'){
                  errors = "Чтобы достижение отображалось на главной странице, оно должно быть с картинкой";
              }

                  
              
                $.ajax({
                  url: "acvhivka_limit_ajax.php",
                  type: "POST",
                  data: ({login: login_cookie}),
                  dataType: "html",
                  beforeSend: Showloader_m,
                  success: funcSuccess_checklimit 
              });
              function funcSuccess_checklimit(data){
                  
                
                if(data != "Okay"){
                    
                  //  $(".messenge").fadeOut(300);
                    
                     //    $(".messenge p").html(data);
              //  $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                    Hideloader_m();
                    errors = data;
                    
                }
                
                  
                  
                  
              if(errors == false){
                  

                  
                    if(check_img_add == 'No'){
                        
                    
                  
                  
                var data_img_add = new FormData();
                $.each( files_add, function( key, value ){
                    data_img_add.append( key, value );
                });

                data_img_add.append( 'image', 1 );
                                  
                                $.ajax({
                    url         : './submit_add.php',
                    type        : 'POST',
                    data        : data_img_add,
                    cache       : false,
                    dataType    : 'json',
                    processData : false,
                    contentType : false,
                    beforeSend: Showloader_m,
                    success     : function( respond, status, jqXHR ){


			if( typeof respond.error === 'undefined' ){

                //Hideloader_m();
                var id_add = respond.files;
               // alert(id);
				/*var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){
					 html = val;
				} )
                */
                Number(id_add);
                                    $.ajax({
                  url: "acvhivka_add_ajax.php",
                  type: "POST",
                  data: ({title: title_add, text: textarea_add, checked_img: check_img_add, checked_main: check_main_add, id_add: id_add}),
                  dataType: "html",
                  success: funcSuccess_add 
              });
			}

			else {
                $(".messenge").fadeOut(300);
				$('.messenge p').html('ОШИБКА: ' + respond.error );
                $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                Hideloader_m();
			}
		},

		error: function( jqXHR, status, errorThrown ){
            $(".messenge").fadeOut(300);
			$('.messenge p').html( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
           Hideloader_m();
		}

                                    

                });  
                  

                  }
                  else{
                      var id_add = "nope";
                $.ajax({
                  url: "acvhivka_add_ajax.php",
                  type: "POST",
                  data: ({title: title_add, text: textarea_add, checked_img: check_img_add, checked_main: check_main_add, id_add: id_add}),
                  dataType: "html",
                  success: funcSuccess_add 
              });
                  }
                  
                  
                  
                  
                  
              
              }
              else{
                Hideloader_m();
                 // afterButton_s_add();
                  $(".messenge").fadeOut(300);
                   setTimeout(function() {
                                $(".messenge p").html(errors);
                       $(".messenge").animate({ opacity: 'toggle',  top: 'toggle' }, 600);
                            }, 300);
                  
                 // setTimeout(beforeButton_s_add, 900);
              }
                  }
            
          }); 
                    
              
          });








           
           