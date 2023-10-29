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

	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">

	<link rel="stylesheet" href="cssforportfoli/styleproverka.css">
	<link rel="stylesheet" href="cssforportfoli/responsiveinfo.css">
      <?php
        include 'style.php';
    ?>
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	 <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
	<title>Аккаунт <?=$_COOKIE['login']?></title>
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
    
               <?php if(isset($_COOKIE['login'])):?>
    <script src="js/ajaxscript_s_v1.07.js"></script>
    <?php endif;?>
  

	    <?php
     $login = $_COOKIE['login'];
    
    
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_students($login);
    
    $cookie_code = $pr_cookie['code'];
    
    
    
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code'])):?>

        
        <?php
    $Select = new Select();

    
    $table_name = "Students_achivka";
    
    $pole_name = "students_login";

    $posts = $Select->get_select_where_fetch_all_order_by_id($table_name,$pole_name,$name);
    
    ?>
	
	
		<main class="cd-main-content">

	<div class="blur">

       <div class="achivka_new"><p>Нажмите на достижение, которое вы хотите изменить</p></div>

	<div id="contentposts">	
	
		<?php foreach ($posts as $post):?>
          <a href="update_achivka_port.php?post_id=<?=$post['id']?>">
           <div class="blockpost">
           <img  src="<?=$post['img']?>">
            <p> <?=mb_substr($post['text_achivka'],0,250)?>...</p>
            <p><?=$post['FIO']?></p>
        </div>
        </a>
        <?php    endforeach;?>
        <div id="postsafter">
            
        </div>
			
					
		</div>
		
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>