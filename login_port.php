<?php
require_once 'include/database.php';
require_once 'include/functions.php';
$data=$_POST;
if(isset($data['do_login']))
{
    $errors = array();
    $login = $data['login'];
   // $login = 'admin';
     global $link;
        $login = mysqli_real_escape_string($link,$login);
     
    
    $password = $data['password'];
  //  $password = 'adminstest5579';
    $password  = mysqli_real_escape_string($link,$password);
     
    
      if($login=='admin' and !empty($password))
    {
        $admin_pass = find_adminpass($login);
        
        foreach ($admin_pass as $pass)
        {
           $pass_admin = $pass['password_admins']; 
            $cookie_code = $pass['code'];
            
        }
        if(password_verify($password, $pass_admin))
        {
            
            $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);
            //$_SESSION['login_admin'] = $login;
           // $_SESSION['pass_admin'] = $pass_admin;
            
            SetCookie("login_admin", $login,time()+60*60*24*365*10);
            SetCookie("code_admin", $cookie_code,time()+60*60*24*365*10);
            
            //$_COOKIE
                
            
          //  SetCookie('login_admin',$login);
          //  SetCookie('pass_admin',$pass_admin);
            //if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
                
                
           // }
            $alert = 'Здравствуйте, админ!';
            header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php');
        }
        else{
            $errors[]='Неверные данные';
        }
    }
    else{
    
        $teatchers_login = find_login_teachers($link,$login);
        
        if(empty($teatchers_login)){
            
        
    
    if(!empty($login) and !empty($password))
    {
        //echo'login<br><br>';
        $userlogin = find_login($link,$login);
        foreach ($userlogin as $post)
        {
            $pass=$post['password'];
            $email = $post['email'];
            $id=$post['id'];
           // $status=$post['email_status'];
            $cookie_code = $post['code'];
           // echo $pass;
        }
       // $password = $data['password'];
    
    //$pass= find_password($link,$password);
        
        
        //if ($pass==$password)
            if(password_verify($password, $pass))
        {
            
                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);
                
                
                SetCookie("login", $login,time()+60*60*24*365*10);
                SetCookie("code", $cookie_code,time()+60*60*24*365*10);
    
                $alert = 'Вы авторизованы!';
                header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php');
        }
        else{
            $errors[]='Неверные данные';
        }
    }
    else{
        $errors[]='Неверные данные';
    }
    
    
    
}
        else{
            
            
           if(!empty($login) and !empty($password))
    {
        //echo'login<br><br>';
        //$userlogin = find_login($link,$login);
        foreach ($teatchers_login as $post)
        {
            $pass=$post['password'];
            $email = $post['email'];
            $id=$post['id'];
           // $status=$post['email_status'];
            $cookie_code = $post['code'];
           // echo $pass;
        }
       // $password = $data['password'];
    
    //$pass= find_password($link,$password);
        
        
        //if ($pass==$password)
            if(password_verify($password, $pass))
        {
            
                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);
                
                
                SetCookie("login_teacher", $login,time()+60*60*24*365*10);
                SetCookie("code_teacher", $cookie_code,time()+60*60*24*365*10);
    
                $alert = 'Вы авторизованы!';
                header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php');
        }
        else{
            $errors[]='Неверные данные';
        }
    }
    else{
        $errors[]='Неверные данные';
    } 
            
            
            
        }
        
        }
}

?>

<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ авторизация">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="cssforportfoli/reset.css">
	<link rel="stylesheet" href="cssforportfoli/style_v1.19.11.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_v1.19_01.css"> 
    <link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/modernizr.js"></script> 
  	<script src="js/loading_an.js"></script>
  
	<title>Авторизация</title>
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
        include 'menu_sign.php';
    ?>

	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">

    <?php
               // var_dump($teatchers_login);
                if(!empty($alert)){
                   echo '<div id="upsign"><p>'.$alert.'</p></div>'; 
                }
                
                
                
                if(!empty($errors))
       
    {
        echo '<div id="upsign"><p>'. array_shift($errors).'</p></div>';
    }
                ?>
			    
			    
			    
			    <form action="/login_port.php" method="POST">
     
   
    
        <input placeholder="Введите логин" class="input" type="text" name="login" required="required" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите пароль" class="input" type="password" required="required" name="password"value="">
    <br><br>
<div class="cant_login">
   <a href="cant_login.php"><p>Не могу войти</p></a>
</div>
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login">Авторизироваться</button>
    </p>
                </form>
			</div>
			

    
			
		</div>   

    
    <?php
    include 'podval_port.php'
    ?>