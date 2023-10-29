<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';




$data=$_POST;

    




if(!empty($data['email_login']))
    {
        $email = $data['email_login'];
        
         global $link;
        $email = mysqli_real_escape_string($link,$email);
    
         $user_email= find_email($email);
    
        //$teacher_email = find_email_teachers($email);
    
        
            
        
    
        if($user_email=="данного email нету в базе данных"){
            $alert = "данного email нету в базе данных";
        }
        else{
             foreach ($user_email as $post)
        {
            $email_users=$post['email'];
            $login_users=$post['login'];
        }
            if( !empty($data['kod'])){
                    
                if (password_verify($data['kod'], $_COOKIE['kod'])){
                 
               // $alert='Новый пароль выслан вам на email';
                    
                   
                    $pass_users = generate_code_pass($lenght = 8);
                    
                    $to  = "<".$email.">" ;

           $subject = "Новый пароль"; 

            $message = ' Ваш новый пароль: '.$pass_users.' от аккаунта '.$login_users.'';

            $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $pass_users = password_hash($pass_users, PASSWORD_DEFAULT);
                    
                   $alert = users_email_pass_change($pass_users,$email);
                    
                    
                    unset($_SESSION['kod']);
                    
                    SetCookie("kod","");
                }
                else{
                   $alert = 'Ваш код не совпадает';
                }
                
            }
            else{
            
            $kod = generate_code_signup($lenght = 5);
                
                 
                    
                $i_kod=5;
            
                 $to  = "<".$email_users.">" ;

           $subject = "PHP TEST"; 

            $message = ' Ваш код: '.$kod.'';

            $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod, PASSWORD_DEFAULT);
                
                $_SESSION['kod'] = $kod_sesi;
                
                SetCookie("kod", $kod_sesi);
                
                $alert = 'Ваш код';
                }
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

	<link rel="stylesheet" href="cssadmin/reset.css">
    <link rel="stylesheet" href="cssadmin/style_podborka_v1.15.css">
	<link rel="stylesheet" href="cssadmin/responsive_podborka_v1.15.css"> 
	<script src="js/modernizr.js"></script> 
  	  <link rel="stylesheet" href="style/preloader.css"> 
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  	<script src="js/preloader_an.js"></script>
	<title>Восстановление пароля</title>
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
        include 'upmenu.php';
    ?>

		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">
            
            
				<div id="upsign"><p><?=$alert?></p></div>
            
            
            
          
            
            
           
            <form action="/cant_login5.php" method="POST">
     
   
    <br><br><br>
   
   <input placeholder="Введите email" class="input" type="email" name="email_login"value="<?php echo @$data['email_login'];?>">
    
    <br>
     <?php if ($i_kod>0): ?>
       <input placeholder="Введите код" class="inputkod" type="text" name="kod" value="<?php echo @$data['kod'];?>">
      
       <br>
     <? endif; ?>
    <br>
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass">Подтвердить</button>
    </p>
               
                </form>
			</div>
			

    
			
		</div>  
		

    
    <?php
    include 'podval.php'
    ?>