<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';



$info_login = $_COOKIE['login'];

$info_login = get_accountinfo($info_login);




    foreach ($info_login as $info) {
            
    $info_email =$info['email'] ; 


      
        }
        
      //  echo 'Ваш логин: '.$_SESSION['login'];
      //  echo '<br><br>Ваш email: '.$info_email;
if(isset($_POST['do_email']))
{
    if(!empty($info_email))
    {
      $email = trim($info_email);
      
      $insert_result = insert_subscriber($link,$email);
        
       // $header = 'Location: /?subsribe=';
      
     // $header .= $insert_result;

     // header($header);
    //echo $email;  
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

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="cssforportfoli/reset.css">
	<link rel="stylesheet" href="cssforportfoli/style.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_bug_fix.css"> 
	<link rel="stylesheet" href="cssforportfoli/styleproverka.css">
	<link rel="stylesheet" href="cssforportfoli/responsiveinfo.css">
	<script src="js/modernizr.js"></script> 
  	
	<title>Аккаунт <?=$_COOKIE['login']?></title>
</head>
<body>
	<?php
        include 'menu.php';
    ?>
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">
            <div id="upsign"><p><?=$insert_result?></p></div>
            <form action="/accountinfo_port.php" method="POST">
     
   
    <br><br>
   
    <div id="info"><p><?=$_COOKIE['login']?></p> </div>
    
    <br>
    <div id="info"><p><?=$info_email?></p> </div>
    
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_email">Подписка на расслыку</button>
    </p>
                </form>
			</div>
			

    
			
		</div>  

    
    <?php
    include 'podval_port.php'
    ?>