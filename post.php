<?php
ini_set('error_reporting', E_ALL);
ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
require_once 'include/database.php';
require_once 'include/functions.php';
$post_id=$_GET['post_id'];

if (!is_numeric($post_id))    exit();

$post = get_posts_by_id($post_id);


?>
<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="новости о пк">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="cssadmin/style_podborka_v1.18.css">
	<link rel="stylesheet" href="cssadmin/responsive_podborka_v1.16.css"> 
	<script src="js/modernizr.js"></script> 
  	  <link rel="stylesheet" href="style/preloader.css"> 
     <script src="js/jquery-3.3.1.min.js"></script>
  	<script src="js/preloader_an.js"></script>
	<title>Онлайн сборка</title>
</head>
<body>
    <div id="p_prldr"><div class="contpre">
  
  <div class="loader">
	<div class="square"></div>
	<div class="square"></div>
	<div class="square last"></div>
	<div class="square clear"></div>
	<div class="square"></div>
	<div class="square last"></div>
	<div class="square clear"></div>
	<div class="square"></div>
	<div class="square last"></div>
</div>
 <br>
  
   <br>Подождите<br><small>идет загрузка...</small></div></div>
		<?php
    
    include_once 'upmenu.php';
    
    ?>
    
	<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-2" style="background-image: url('/<?=$post['image']?>')">
			<h1><?=$post['title']?></h1>
		</div> <!-- cd-fixed-bg -->
		<div id="textposts">
            <div id="posttext"> <?=$post['text']?></div>
    </div>
    <div id="aftertextposts">
        
    </div>

<?php
    include 'podval.php'
    ?>
   
    
