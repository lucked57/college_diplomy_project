<?php
ini_set('error_reporting', E_ALL);
ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
//require_once 'include/database.php';
//require_once 'include/functions.php';
 require_once 'include/database_for_podborka.php';
 require_once 'include/classes.php';
global $mysqli;
$post_id=$_GET['post_id'];


if (!is_numeric($post_id))    exit();

$post_id  = $mysqli->real_escape_string($post_id);

//$post = get_Students_achivka_posts_by_id($post_id);
$Select = new Users_info();

$post = $Select->get_Students_achivka_posts_by_id($post_id);
?>
<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" >
	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">
      <?php
        include 'style.php';
    ?>
	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 

  		<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/loading_an_v1.05.js"></script>
 <!-- <script src="js/modernizr.js"></script> 
  <script type="text/javascript" src="js/after_pages.js"></script>-->
	<title><?=$post['title']?></title>
</head>
<body>
    <div id="p_prldr"><div class="contpre">
 <div class="cssload-container">
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading"></span>
		</li>
   </ul>
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

    $login = $_COOKIE['login_admin'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_admin($login);
    

        

            $cookie_code = $pr_cookie['code'];
    if(password_verify($cookie_code, $_COOKIE['code_admin'])){
                        
                         include 'menu_admin.php';
                        
                    }
    ?>
      <?php if(isset($_COOKIE['login_teacher'])):?>
    <script src="js/ajaxscript_t_v1.07.js"></script>
    <?php endif;?>
  
  
           <?php if(isset($_COOKIE['login'])):?>
    <script src="js/ajaxscript_s_v1.07f.js"></script>
    <?php endif;?>
  

    
	
		<div class="cd-fixed-bg cd-bg-2" style="background-image: url('/<?=$post['img']?>')">
			<h1><?=$post['title']?></h1>
		</div> <!-- cd-fixed-bg -->
		<div class="blur">
		<div class="textposts">
            <div class="posttext"> <?=$post['text_achivka']?></div>
    </div>

<?php
    include 'podval_port.php'
    ?>
   
    
