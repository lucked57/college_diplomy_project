<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';



$info_login = $_COOKIE['login'];
$data=$_POST;
$errors=array();
    
if(iconv_strlen(trim($data['password_now']))<8)
    {
        $errors[]= 'Введите текущий пароль';
    }
if(iconv_strlen(trim($data['password_change']))<8)
    {
        $errors[]= 'Пароль должен содержать не менее 8 символов';
    }
if(iconv_strlen(trim($data['password_change_again']))<8)
    {
        $errors[]= 'Пароль должен содержать не менее 8 символов';
    }
if(trim($data['password_change_again'])!==trim($data['password_change']))
    {
        $errors[]= 'Пароли не совпадают';
    }
if(trim($data['password_now'])==trim($data['password_change']))
    {
        $errors[]= 'Текущий пароль совпадает с новым';
    }


if(empty($errors))
    {
        $pass_now = $data['password_now'];
        $pass_change = $data['password_change'];
       // $pass_change_again = $data['password_change_again'];
        
         global $link;
        $pass_now = mysqli_real_escape_string($link,$pass_now);
        $pass_change = mysqli_real_escape_string($link,$pass_change);
        //$pass_change_again = mysqli_real_escape_string($link,$pass_change_again);
    
        //$user_pass_now = proverka_users_pass_now ($pass_now);
    $login = $info_login;
    
    $user_pass_now = find_login($link,$login);
        foreach ($user_pass_now as $post)
        {
            $pass=$post['password'];
        }
  
            if(password_verify($pass_now, $pass))
            {
                
                $pass_change = password_hash($pass_change, PASSWORD_DEFAULT);
                
                $change_pass_func = user_pass_change($pass_change,$login);
                
                $alert = $change_pass_func;
            }
    else
    {
        $alert = 'Текущий пароль неверный';
    }
    
    }
    
    
    
    

   
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
	<link rel="stylesheet" href="cssforportfoli/style_v1.19.17.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_v1.19_07.css">  
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
            
            <?php if(!empty($errors)):?>
            <div id="upsign"><p><?=array_shift($errors)?></p></div>
            
            <?php else: ?>
				<div id="upsign"><p><?=$alert?></p></div>
				<?php endif;?>
            
            
            
            
            <div id="upsign_info">
                <a href="accountinfo_port.php"><p>Подписка</p></a>
               <a href=""><p>Смена пароля</p></a>
                
            </div>
            
            
           
            <form action="/accountinfo_port_pass.php" method="POST">
     
   
    <br><br><br>
   
   <input placeholder="Введите текущий пароль" class="input" type="password" name="password_now"value="">
    
    <br>
    
    
    <input placeholder="Введите новый пароль" class="input" type="password" name="password_change"value="">
    
    <br>
    
    <input placeholder="Введите еще раз новый пароль" class="input" type="password" name="password_change_again"value="">
    
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass">Сменить пароль</button>
    </p>
                </form>
			</div>
			

    
			
		</div>  
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>