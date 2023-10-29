<?php
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
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="cssforportfoli/reset.css">
	<link rel="stylesheet" href="cssforportfoli/style_v1.23f.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_v1.22.css"> 
  <link rel="stylesheet" href="cssforportfoli/preloader_v.1.07.css"> 
  <link rel="stylesheet" href="cssforportfoli/buttons.css"> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	
	<script src="js/modernizr.js"></script> 
  <script src="js/loading_an_v1.01.js"></script>
  	
	<title>Сообщения для <?=$_COOKIE['login']?></title>
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
  if(isset($_COOKIE['login'])){
        
        include 'login_modal.php';
        
    }
    ?>
	    <?php
    
    
     $login = $_COOKIE['login'];
    
 $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_students($login);
    
    $cookie_code = $pr_cookie['code'];
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code'])):?>
	<?php
	$login = $_COOKIE['login'];
        
      $Select = new Select();

      $table_name = 'Messenge_for_users';
    
        $pole_name = 'login';

      $posts = $Select->get_select_where_fetch_all($table_name,$pole_name,$login);
 
    
    
   if(isset($_POST['do_achivka'])){
       
      $delete = new Delete();
       
       $table_name = "Messenge_for_users";
       
       $pole_name = "login";
       
       $alert = $delete->get_delete_where($table_name,$pole_name,$login);
       
   }
    
    
    
?>
	
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-8">
			
           <h1>Сообщения <?=$_COOKIE['login']?></h1>
           
		</div>
          <div class="blur">
		<?php if(!empty($alert)): ?>
<div id="achivka_new"><a href="#0"><p><?=$alert?></p></a></div>
    <?php endif; ?>
		<div class="flex_messenge">
		    <?php foreach ($posts as $post):?>
		    <div class="messenge_box"><p><?=$post['Messenge']?></p></div>
		    <?php    endforeach;?>
<form action="/messenge_port.php" method="POST">
    <button class="dws-submit_messenge" type="submit" name="do_achivka">Отметить как прочитанные и удалить</button>
    </form>
		</div>
		
		
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>