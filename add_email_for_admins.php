<?php
    //require_once 'include/database.php';
   // require_once 'include/functions.php';
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>

<?php
                                    global $mysqli;
									if(isset($_POST['do_search']) ){
                                        $text_area = $_POST['email_area'];
                                        $pieces_area = explode(",", $text_area);
                                    // $pieces_area[0];
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {
                                            //$pieces_area[$i];
                                             if (filter_var(trim($pieces_area[$i]), FILTER_VALIDATE_EMAIL)) {
                                                  // $alert .=  trim($pieces_area[$i]).' is email, '; 
                                               //  global $link;
                                        //$pieces_area[$i] = mysqli_real_escape_string($link,trim($pieces_area[$i]));
                                        
                                       // insert_students_emals(trim($pieces_area[$i]));
                                                 
                                                 
                                        $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
                                        
                                        $Insert = new Insert();
                                        
                                        $table_name = "Students_email";
                                        
                                        $pole_name = "email";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                 
                                                }
                                             else{
                                                 $alert .= $pieces_area[$i].' не email, ';
                                             }
                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        
                                            
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
                                        }
                                    }
  




                                        if(isset($_POST['do_prepod']) ){
                                        $text_area = $_POST['email_area'];
                                        $pieces_area = explode(",", $text_area);
                                    // $pieces_area[0];
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {
                                            //$pieces_area[$i];
                                             if (filter_var(trim($pieces_area[$i]), FILTER_VALIDATE_EMAIL)) {
                                                  // $alert .=  trim($pieces_area[$i]).' is email, '; 
                                               //  global $link;
                                        //$pieces_area[$i] = mysqli_real_escape_string($link,trim($pieces_area[$i]));
                                        
                                       // insert_students_emals(trim($pieces_area[$i]));
                                                 
                                                 
                                        $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
                                        
                                        $Insert = new Insert();
                                        
                                        $table_name = "teatchers_emails";
                                        
                                        $pole_name = "teacher_email";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                 
                                                }
                                             else{
                                                 $alert .= $pieces_area[$i].' не email, ';
                                             }
                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        
                                            
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
                                        }
                                    }
  




                                if(isset($_POST['do_groupe']) ){
                                        $text_area = $_POST['email_area'];
                                        $pieces_area = explode(",", $text_area);
                                    // $pieces_area[0];
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {
                                          global $mysqli;       
                                                 
                                        $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
                                        
                                        $Insert = new Insert();
                                        
                                        $table_name = "Group_name";
                                        
                                        $pole_name = "name";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                 

                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        
                                            
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
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
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
	<title>Email add</title>
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
    ?>
<?php

    $login = $_COOKIE['login_admin'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_admin($login);
    

        

            $cookie_code = $pr_cookie['code'];
    
        
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_admin'])):?>
<div id="admins">
    




<div id="adminsafter">
<div id="allusers_for_admins_search">
                                      
                                            <div id="upsight_admins"><p><?=$alert?></p></div>
                                          
									<form action="/add_email_for_admins.php" method="POST">
									
									 <p><textarea id="textarea"rows="12" cols="70" name="email_area" wrap="soft" placeholder="Добавить email" required="required"></textarea></p>
									
									<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_search">Добавить студента</button>
    </p>
    		<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_prepod">Добавить преподавателя</button>
    </p>
                                      		<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_groupe">Добавить группу</button>
    </p>
    </form>
</div>



<?php
    
    
    
    include 'admins_menu.php';

    
    
        ?>
    <?php else: ?>
				<p id="Admins_block">Войдите под админом!</p>
				<?php endif;?>
				
				
   <?php
    include 'podval_port.php';
    ?>
    
	