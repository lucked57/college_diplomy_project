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
	<link rel="stylesheet" href="cssadmin/style_podborka_v1.15.css">
	<link rel="stylesheet" href="cssadmin/responsive_podborka_v1.15.css"> 
	<script src="js/modernizr.js"></script> 
  	  <link rel="stylesheet" href="style/preloader.css"> 
     <script src="js/jquery-3.3.1.min.js"></script>	
  	<script src="js/preloader_an.js"></script>
	<title>Регистрация</title>
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
			
           
            <div id="signup">
<?php
$data=$_POST;
if(isset($data['do_signup']))
{
    $errors=array();
    $prov_login = iconv_strlen($data['login']);
    $prov_pass = iconv_strlen($data['password']);
    //echo $prov;
    
        
        
    if(trim($data['login'])=='')
    {
        $errors[]= 'Введите логин!';
    }
    if(trim($data['email'])=='')
    {
        $errors[]= 'Введите email!';
    }
    if($data['password']=='')
    {
        $errors[]= 'Введите пароль!';
    }
    if($data['password_1']!=$data['password'])
    {
        $errors[]= 'Повторный пароль введен не верно!';
    }
     if(mb_strtolower(trim($data['login']))=='admin')
    {
        $errors[]= 'Admin у нас уже есть:)';
    }
    
    if($prov_login>15)
        {
            $errors[]= 'Логин должен не превышать 16 символов! У вас '.$prov_login.'';
        }
        
        if($prov_pass<8)
        {
            $errors[]= 'Пароль должен быть не менее 8 символов! У вас '.$prov_pass.'';
        }
   if(empty($errors))
    {
        $email = $data['email'];
        $login = $data['login'];
        $password = $data['password'];
        
         global $link;
        $email = mysqli_real_escape_string($link,$email);
        $login = mysqli_real_escape_string($link,$login);
        $password = mysqli_real_escape_string($link,$password);
        
        $user_table = proverka_users ($link, $email,$login);
        
        $user_studensts = proverka_email_students ($link,$email);
        
        
        if($user_table=='Пользователей с таким логином или email уже существует')
        {
            echo '<div id="upsign"><p>Пользователей с таким логином или email уже существует!</p></div>';
        }
        else if($user_studensts == 'Такого email нету5'){
            echo '<div id="upsign"><p>Вашего email нету в БД, обратитесь к админу!</p></div>';
        }
        else
        {
            
            
            if( !empty($data['kod'])){
                    
                if (password_verify($data['kod'], $_SESSION['kod'])){
                    $password = password_hash($password, PASSWORD_DEFAULT);
        
        $user_table = insert_users($link, $email,$login,$password);
                    
                   $Students_anketa =  insert_Students_anketa_login ($login);
                    
                echo '<div id="upsign"><p>Вы успешно зарегистировались</p></div>';
                    unset($_SESSION['kod']);
                }
                else{
                    echo '<div id="upsign"><p>Ваш код не совпадает</p></div>';
                }
                
            }
            else{
                $kod = generate_code_signup($lenght = 5);
                
                 
                    
                $i_kod=5;
                 $to  = "<".$email.">" ;

           $subject = "PHP TEST"; 

            $message = ' Ваш код: '.$kod.'';

            $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod, PASSWORD_DEFAULT);
                
                $_SESSION['kod'] = $kod_sesi;
                
                echo '<div id="upsign"><p>Ваш код</p></div>';
            }
            
            
            
            
           // $i_kod=1;
             // $to  = "<ip557799@gmail.com>" ; 

          // $subject = "PHP TEST"; 

           // $message = ' Ваш код: '.$kod.'';

          //  $headers = 'From: webmaster@example.com' . "\r\n" .
          //  'Reply-To: webmaster@example.com' . "\r\n" .
          //  'X-Mailer: PHP/' . phpversion();

          // mail($to, $subject, $message, $headers); 
            
            
            
            
            
        }
    }
    else
    {
        echo '<div id="upsign"><p>'. array_shift($errors).'</p></div>';
    }
}
    ?>
    
			    
			    
			    
			    <form action="/signup.php" method="POST">
    <?php 
   //var_dump($user_table);
    ?>
        <input placeholder="Введите логин" class="input" type="text" name="login" required="required" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите email" class="input" type="email" name="email" required="required" value="<?php echo @$data['email'];?>">
    
    
    <br>
    
    <?php if ($i_kod>0): ?>
    <input placeholder="Введите пароль" class="input" type="password" name="password" required="required" value="<?php echo @$data['password'];?>">
    <br>
    <?php else: ?>
    <input placeholder="Введите пароль" class="input" type="password" name="password" required="required" value="">
    <br>
    <? endif; ?>
    
    
    
    
    
    <?php if ($i_kod>0): ?>
   <input placeholder="Повторно введите пароль" class="input" type="password" name="password_1" required="required" value="<?php echo @$data['password_1'];?>">
   <br>
   <?php else: ?>
    <input placeholder="Повторно введите пароль" class="input" type="password" name="password_1" required="required" value="">
    <br>
   <? endif; ?>
    
    <p>
      <?php if ($i_kod>0): ?>
       <input placeholder="Введите код" class="inputkod" type="text" name="kod" required="required" value="<?php echo @$data['kod'];?>">
      
       <br>
     <? endif; ?>
    
    
    
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
                </form>
			</div>
			

    
			
		</div>   

    
    <?php
    include 'podval.php'
    ?>
   
    
	