<?php
//require_once 'include/database.php';
// require_once 'include/functions.php';
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>

<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" >
  <!--<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />-->
<script type="text/javascript" src="js/cssrefresh.js"></script>
	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">
      <?php
        include 'style.php';
    ?>
  
	
	<link rel="stylesheet" type="text/css" href="cssforportfoli/demo.css" />
    <link rel="stylesheet" type="text/css" href="cssforportfoli/component_v1.01.css" />
  <link rel="stylesheet" type="text/css" href="cssforportfoli/search.css" />
  

  <link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  
  	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>
 <script src="js/loading_an_v1.05.js"></script>
   <!--<script src="js/modernizr.js"></script> 
  <script type="text/javascript" src="js/after_pages.js"></script>-->
  
   <!--<script>
        
       function delete_cookie ( cookie_name )
{
  var cookie_date = new Date ( );  
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
       
       
if(navigator.userAgent.indexOf ('iPhone') != -1 || navigator.userAgent.indexOf ('iPad') != -1){
    
    document.cookie = "ios=phone";
    
}
       else{
           delete_cookie ( "ios" );
       }
            
    </script>-->

	<title>Портфолио студентов</title>
</head>
<body>
   <script>
          
                $("body").css("background-color", "black");
            $(window).scroll(function() {
                if ($(this).scrollTop() > 1) {
                    $("body").css("background-color", "white");
                    $("#contentmenu_afterheafer").css("border-top", "80px solid #FFF");
                } else {
                    $("body").css("background-color", "black");
                    if ($(window).width() > 1206){
                    $("#contentmenu_afterheafer").css("border-top", "80px solid #000");
                    }
                }
            });

        </script>
 <div id="p_prldr"><div class="contpre">
 <div class="cssload-container">
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading"></span>
		</li>
</div>	
   Подождите<br><small>идет загрузка...</small></div></div>
   
	<?php
        include 'menu.php';

  if(isset($_COOKIE['login'])){
        
        include 'login_modal.php';
        
    }
   if(isset($_COOKIE['login_teacher'])){
        
        include 'pass_change_t.php';
        
    }
          if(isset($_COOKIE['login_admin'])){
              

                    $Select = new Select();
                    
                    $table_name = "admins";
                    
                    $pole_name = "login_admins";
                    
  $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$_COOKIE['login_admin']);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_admin'])){
                        
                         include 'menu_admin.php';
                        
                    }
        
       
        
    }

    ?>
      <?php if(isset($_COOKIE['login_teacher'])):?>
    <script src="js/ajaxscript_t_v1.07.js"></script>
    <?php endif;?>
   
         <?php if(isset($_COOKIE['login'])):?>
    <script src="js/ajaxscript_s_v1.07f.js"></script>
    <?php endif;?>

	<main class="cd-main-content">
      <div class="blur">
		<div class="container demo-1">
			
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<h1 class="main-title line-height">Технологический универститет<br>
                            Колледж космического машиностроения и технологий
                            </h1>
				</div>
				
			
		</div>
        
        
        <!-- <div class="large-header-mobile">
                        <h1 class="main-title line-height">Технологический универститет<br>
                            Колледж космического машиностроения и технологий
                            </h1>
                    </div>-->

		<div id="contentmenu_afterheafer">
      <div id="contentmenu_afterheafer_title"><p>Портфолио студентов ККМТ</p></div>
      <div class="text"><p>Данный сайт создан для того, чтобы... совокупность логически связанных между собой веб-страниц; также место расположения контента сервера. Обычно сайт в Интернете представляет собой массив связанных данных, имеющий уникальный адрес и воспринимаемый пользователем как единое целое. Веб-сайты называются так, потому что доступ к ним происходит по протоколу HTTP.</p></div>

     

   </div>
   
  
   
    
   
    
	