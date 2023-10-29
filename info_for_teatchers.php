<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/functions.php';
    require_once 'include/classes.php';
?>
<?php


global $mysqli;

  $table_name = "teatchers_anketa";
        $pole_name = "login";  
    
    $login = $_COOKIE['login_teacher'];

    $select = new Select();
        $select = $select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
    

    $gropupe_name = $select["Group_name"];
    
    //var_dump($gropupe_name);
    
    $all_students = new Select();
    
    $table_name = "Students_anketa";
        $pole_name = "Group_name"; 
    
    $all_students = $all_students->get_select_where_fetch_all($table_name,$pole_name,$gropupe_name);


    









     if(isset($_POST['do_teacher_all']) ){
        
     
         $text_area = $_POST['teacher_area'];
         
         $text_area = $mysqli->real_escape_string($text_area);
         
         if(!empty($text_area)){
             
             $Messenge = new Teachers_messange();
             
             
             foreach ($all_students as $info){
                 
                
                 
                $login =  $info['students_login'];
                 
                 $alert = $Messenge->send_messenge($login,$text_area,$gropupe_name);
                 
             }
             
         }
         else {
             
             $alert= "Заполните поле";
             
         }
         
         
          
        
    }



    if(isset($_POST['do_teacher']) ){
        
        $aDoor = $_POST['formDoor'];
        
        $text_area = $_POST['teacher_area'];
        
        if(empty($aDoor)) 
                {
               $alert = "Вы не выбрали ни одного значения";
              } 
              else
              {
                $N = count($aDoor);
$Messenge = new Teachers_messange();
                
                for($i=0; $i < $N; $i++)
                {
                    
                    $login = $aDoor[$i];
                    
                    $alert = $Messenge->send_messenge($login,$text_area,$gropupe_name);
                 //$alert = $aDoor[$i];
                }
              }
        
     
    }
?>


<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="новости о пк">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">
      <?php
        include 'style.php';
    ?>
  <!--<link rel="stylesheet/less" type="text/css" href="cssforportfoli/styles_v1.05.less">
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>  -->
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
	<title>Портфолио студентов</title>
</head>
<body>
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
   if(isset($_COOKIE['login_teacher'])){
        
        include 'pass_change_t.php';
        
    }
    ?>
        <?php if(isset($_COOKIE['login_teacher'])):?>
    <script src="js/ajaxscript_t_v1.07.js"></script>
    <?php endif;?>
  <div class="blur">
 <?php

    $login = $_COOKIE['login_teacher'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_teatchers($login);
    
$i = 1;
        

            $cookie_code = $pr_cookie['code'];
        
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_teacher'])):?>
<div id="admins">
    




<div class="adminsafter">
<div id="allusers_for_admins_search">
                                       
									<div id="upsight_admins"><p><?=$alert?></p></div>
                                         
									<form action="/info_for_teatchers.php" method="POST">
									
									 <p><textarea id="textarea"rows="12" cols="70"  name="teacher_area" required="required" wrap="soft" placeholder="Текст сообщения..."><?=$_POST['teacher_area']?></textarea></p>
									
									<div class="checkbox_teatchers">
									
    <?php foreach ($all_students as $info):?>
<label class="checkbox">
 
    <input type="checkbox" name="formDoor[]" value="<?=$info['students_login']?>"/><span class="box"><div class="text"></div></span><p><?=$i?>.<?=$info['FIO']?></p>
    </label><br><br>
  <?php
    $i++;
    ?>
   <?php    endforeach;?>
   </div>
									
									<p>
									

        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_teacher">Отправить</button>
    </p>
    <p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_teacher_all" >Отправить всем</button>
    </p>
                                        
    
    </form>
</div>










<?php
								
                                        
                                        
                            
    


    
//$info_login = get_accountinfo_for_admins();

        ?>
        <div id="contentposts">
        
        <?php foreach ($all_students as $info):?>
         <a href="info_adout_users.php?post_login=<?=$info['students_login']?>">
           <div class="blockpost">
           <img  src="<?=$info['img_anketa']?>">
       
            <p id="contentpost">
            ID: <?=$info['id_anketa']?><br><br>
            ФИО: <?=$info['FIO']?><br><br>
            Логин: <?=$info['students_login']?><br><br>
            
            <?php
                                       // var_dump ($info_login);
                                        ?>
            </p>
            <p></p>
        </div>
       
       </a>
        <?php    endforeach;?>
        <div id="postsafter">
            
        </div>
    </div>
    </div>
        

    
    
    

<?php
    
    
    
    

    
    
        ?>
    <?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
				
				
   <?php
    include 'podval_port.php';
    ?>
    
	