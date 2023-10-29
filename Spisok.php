<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
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
	<link rel="stylesheet" href="style/styleproverka.css">
  	<link rel="stylesheet" href="cssadmin/style_podborka_v1.15.css">
	<link rel="stylesheet" href="cssadmin/responsive_podborka_v1.15.css"> 
	<script src="js/modernizr.js"></script> 
  <link rel="stylesheet" href="style/preloader.css"> 
    <script src="js/jquery-3.3.1.min.js"></script>	
  	<script src="js/preloader_an.js"></script>
  	
	<title>Список БД</title>
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
		<div class="cd-fixed-bg cd-bg-5">
			<h1>База данных</h1>
           
            
 
    
			
		</div>   
		<div id="razdel">
       
   </div>
  
   <?php
            $matka = get_from_matka();
            $cpu = get_from_cpu();
            $ram = get_from_ram();
            $gpu = get_from_gpu();
            $power = get_from_power();
            
     ?>
<div id="contentposts">

          
           <div id="blockpost5">
           <p id="contentpost">
              Материнские платы:
               </p>
           <?php $i=1;
               ?>
           <?php foreach ($matka as $matks):?>
            <p id="contentpost">
            <?=$i?>
            <?=$matks['Namematka']?>
            </p>
            <?php $i++;?>
            <?php    endforeach;?>
        </div>
        
        
        <div id="blockpost5">
           <p id="contentpost">
               Процессоры:
               </p>
           <?php $i=1;
               ?>
           <?php foreach ($cpu as $cpus):?>
            <p id="contentpost">
            <?=$i?>
            <?=$cpus['Namecpu']?>
            </p>
            <?php $i++;?>
            <?php    endforeach;?>
        </div>
        
        
        <div id="blockpost5">
           <p id="contentpost">
               Оперативная память:
               </p>
           <?php $i=1;
               ?>
           <?php foreach ($ram as $rams):?>
            <p id="contentpost">
            <?=$i?>
            <?=$rams['Nameram']?>
            </p>
            <?php $i++;?>
            <?php    endforeach;?>
        </div>
        
        
          <div id="blockpost5">
           <p id="contentpost">
               Видеокарты:
               </p>
           <?php $i=1;
               ?>
           <?php foreach ($gpu as $gpus):?>
            <p id="contentpost">
            <?=$i?>
            <?=$gpus['namegpu']?>
            </p>
            <?php $i++;?>
            <?php    endforeach;?>
        </div>
        
        
        <div id="blockpost5">
           <p id="contentpost">
               Блоки питания:
               </p>
           <?php $i=1;
               ?>
           <?php foreach ($power as $powers):?>
            <p id="contentpost">
            <?=$i?>
            <?=$powers['namepower']?>
            </p>
            <?php $i++;?>
            <?php    endforeach;?>
        </div>
        

        <div id="postsafter">
            
        </div>
    </div>
    
    <?php
    include 'podval.php'
    ?>
   
    
	