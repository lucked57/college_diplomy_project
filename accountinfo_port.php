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
	<link rel="stylesheet" href="cssforportfoli/style_v1.20.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_v1.20.css">  
	<link rel="stylesheet" href="cssforportfoli/styleproverka_v1.01.css">
	<link rel="stylesheet" href="cssforportfoli/responsiveinfo_v1.01.css">
  <link rel="stylesheet" href="cssforportfoli/buttons.css"> 
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="js/loading_an.js"></script>
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
    ?>
	 <?php
     $login = $_COOKIE['login'];
    
    $posts = find_cookie($login);
        
        foreach ($posts as $pass)
        {
            $cookie_code = $pass['code'];
        }
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code'])):?>
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">
            <div id="upsign"><p><?=$insert_result?></p></div>
            <div id="upsign_info">
                <a href="accountinfo_port.php"><p>Подписка</p></a>
               <a href="accountinfo_port_pass.php"><p>Смена пароля</p></a>
                
            </div>
            
            
           
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
		<div class="blur">
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>