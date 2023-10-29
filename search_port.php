<?php
   // require_once 'include/database.php';
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

<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css"> 
      <?php
        include 'style.php';
    ?>
	<!-- <script src="js/modernizr.js"></script>-->
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
	<title>поиск по сайту...</title>
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
   if(isset($_COOKIE['login_teacher'])){
        
        include 'pass_change_t.php';
        
    }
    ?>
      <main class="cd-main-content">
    <div class="blur">
    

	<?php 
        if(!empty($_POST['query']) ){
    $query = $_POST['query'];
            ?>
		<div id="poisk">
       <?php
            global $mysqli;
        //$query = mysqli_real_escape_string($link,$query);
            $query = $mysqli->real_escape_string($query);
            
            
            ?>
		  <p>По запросу <?= $query?> найденно:</p>
		</div>
		<div id="razdelpoisk"></div>

  <?php
                $Select = new Users_info();
                
                $posts = $Select->get_search_adout_students($query);
            ?>
     
		 <div id="contentposts">
        <?php foreach ($posts as $post):?>
          <a href="post_port.php?post_id=<?=$post['id']?>">
           <div class="blockpost">
           <img  src="<?=$post['img']?>">
            <p> <?=mb_substr($post['text_achivka'],0,250)?>...</p>
            <p></p>
        </div>
        </a>
        <?php    endforeach;?>
        <div id="postsafter">
            
        </div>
    </div>
  
  
  
   <?php 
        }
        else{
        ?>
   <div id="poisk">
		    <p>Заполните поле поиска!</p>
		</div>
    

    
    
    <?php
            }
    include 'podval_port.php'
    ?>
   
    
	