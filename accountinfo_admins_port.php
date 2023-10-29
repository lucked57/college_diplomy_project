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
    ?>
  <?php

    $login = $_COOKIE['login_admin'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_admin($login);
    

        

            $cookie_code = $pr_cookie['code'];
    if(password_verify($cookie_code, $_COOKIE['code_admin'])){
                        
                         include 'menu_admin.php';
                        
                    }
        
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_admin'])):?>
<div id="admins">
    
<div class="admins-after">
    <div class="adminsstats">
       <?php 
        global $mysqli;
        $Select = new Select();
        $stats = "users";
        $stats_users = $Select->get_num_rows($stats);
        //$stats_users = stats_users();
        ?>
    <p class="adminstop_p">Students: <?=$stats_users?></p>
    
        <?php 
    $stats = "Students_email";
    $stats_students_emails = $Select->get_num_rows($stats);  
    //$stats_students_emails = stats_emails_students();
        ?>
    <p class="admins_st_emails_p color-1">Students_emails: <?=$stats_students_emails?></p>
    
     <?php 
    $stats = "subscribes";
    $stats_subscribes = $Select->get_num_rows($stats);
    
    //$stats_subscribes = stats_subscribes();
        ?>
    <p class="admins_st_emails_p color-2">Subscribes: <?=$stats_subscribes?></p>
    
    <?php 
    $stats = "teachers";
    $stats_teachers = $Select->get_num_rows($stats);
    //$stats_gpu = stats_gpu()
        ?>
    <p class="admins_st_emails_p color-3">Teachers: <?=$stats_teachers?></p>
    
    <?php 
    $stats = "teatchers_emails";
    $stats_teachers_emails = $Select->get_num_rows($stats);
   // $stats_Students_anketa = stats_Students_anketa();
        ?>
    <p class="admins_st_emails_p color-4">Teatchers_emails: <?=$stats_teachers_emails?></p>
    
    <?php 
    $stats = "Students_anketa";
    $stats_students_anketa = $Select->get_num_rows($stats);
   // $stats_Students_anketa = stats_Students_anketa();
        ?>
    <p class="admins_st_emails_p color-5">Studets_anketa: <?=$stats_students_anketa?></p>
    
    <?php 
    $stats = "teatchers_anketa";
    $stats_teachers_anketa = $Select->get_num_rows($stats);
   // $stats_Students_anketa = stats_Students_anketa();
        ?>
    <p class="admins_st_emails_p color-6">Teachers_anketa: <?=$stats_teachers_anketa?></p>
    
    </div>
    
    <div class="adminsstatscenter">
        <div title="Для поиска" class="insert_email" >
									<form action="/accountinfo_admins_port.php" method="POST">
									  <input type="email" name="query_email" placeholder="Добавить email" required="required">
									
									</form>
									</div>
									<?php
									if(!empty($_POST['query_email']) ){
                                    $query = $_POST['query_email'];
                                        
                                        $email = $mysqli->real_escape_string(trim($query));
                                        
                                        
                                        $Insert = new Insert();
                                        
                                        $table_name = "Students_email";
                                        
                                        $pole_name = "email";
                                        
                                        $email = $Insert->insert_values($table_name,$pole_name,$email);
                                        
                                        //global $link;
                                        //$email = mysqli_real_escape_string($link,$query);
                                        
                                        //$email = insert_students_emals ($email);
                                        
                                        
                                        
                                        echo '<p class="insert_email_query">'.$email.'</p>';
                                    }
                                        ?>
    
    </div>
    <div class="adminsstatsright">
       <?php
            $stats_users_emails = ($stats_users/$stats_students_emails)*100;
            $stats_users_anketa_pr = ($stats_students_anketa/$stats_users)*100;
            $stats_users_subscribes = ($stats_subscribes/$stats_users)*100;
            $stats_teachers_emails_pr = ($stats_teachers/$stats_teachers_emails)*100;
            $stats_teachers_anketa_pr = ($stats_teachers_anketa/$stats_teachers)*100;
        ?>
        <p class="admins_stats_in_right">Статистика</p>
        <p class="admins_stats_content_in_right">Students/emails: <?php echo round($stats_users_emails,1)?>%<br><br>
        
        Subscribes/users: <?php echo round($stats_users_subscribes, 1)?>%<br><br>
        
        Teachers/emails: <?php echo round($stats_teachers_emails_pr, 1)?>%<br><br>
        
        Students/anketa: <?php echo round($stats_users_anketa_pr, 1)?>%<br><br>
        
        Teachers/anketa: <?php echo round($stats_teachers_anketa_pr, 1)?>%<br><br>
        
        </p>
    </div>
    
                        
                        <div class="block_for_admins color-1">
                        <p class="in_block_for_admin_st"><?=$stats_students_emails?></p>
                        <p class="in_block_for_admin_st_after">Кол-во email студентов</p>
                    </div>
                  

                 
                    <div class="block_for_admins color-2">
                        <p class="in_block_for_admin_st"><?=$stats_subscribes?></p>
                        <p class="in_block_for_admin_st_after">Подписчики на рассылку</p>
                    </div>
                   
                    
                   
                    <div class="block_for_admins color-3">
                        <p class="in_block_for_admin_st"><?=$stats_teachers?></p>
                        <p class="in_block_for_admin_st_after">Кол-во преподавателей</p>
                    </div>
                    

                   
                    <div class="block_for_admins color-4">
                        <p class="in_block_for_admin_st"><?=$stats_teachers_emails?></p>
                        <p class="in_block_for_admin_st_after">Кол-во email преподавателей</p>
                    </div>
                    
                    
                  
                    <div class="block_for_admins color-5">
                        <p class="in_block_for_admin_st"><?=$stats_students_anketa?></p>
                        <p class="in_block_for_admin_st_after">Кол-во заполненных анкет студентов</p>
                    </div>
                   
                    
                 
                    <div class="block_for_admins color-6">
                        <p class="in_block_for_admin_st"><?=$stats_teachers_anketa?></p>
                        <p class="in_block_for_admin_st_after">Кол-во заполненных анкет преподавателей</p>
                    </div>
                   


</div>

<?php
    
    include 'admins_menu.php';
    ?>

<?php else: ?>
				<p id="Admins_block">Войдите под админом!</p>
				<?php endif;?>

<?php

    
    
    
/*$info_login = get_accountinfo_for_admins();

echo $_SESSION['login_admin'];
echo'<br><br><font face="Arial" color="red" size="6"><b>Список пользователей</b></font><hr>';

    foreach ($info_login as $info) {
            
    $info_email =$info['email'] ; 
    $info_login = $info['login'];
    //$info_pass = $info['password'];
    $info_id = $info['id'];
echo'<font face="Arial" color="black" size="5">';
        echo '<br><br>id: '.$info_id;
        echo '<br><br>login: '.$info_login;
        echo '<br><br>Password: '.$info_pass;
        echo '<br><br>email: '.$info_email.'<hr></font>';
      
        }
        
        echo'<br><br><font face="Arial" color="red" size="6"><b>Список подписчиков на рассылку</b></font>';
        
        $info_subscribe = get_ubscribeinfo_for_admins();
        
        
        foreach ($info_subscribe as $info)
        {
            $info_id = $info['id'];
            $info_email =$info['email'] ;
            $info_status= $info['status'];
            $info_code = $info['code'];
            
            echo'<font face="Arial" color="black" size="5">';
        echo '<br><br>id: '.$info_id;
        echo '<br><br>email: '.$info_email;
        echo '<br><br>Status: '.$info_status;
        echo '<br><br>Code: '.$info_code.'<hr></font>';
        }
    */
    
    
?>
</div>
   <?php
    include 'podval_port.php'
    ?>
    
    
	