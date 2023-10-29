<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
?>

<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ регистрация">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="cssforportfoli/reset.css"> 
	<link rel="stylesheet" href="cssforportfoli/style_v1.19.08.css">
	<link rel="stylesheet" href="cssforportfoli/responsive_v1.19_01.css"> 
  <link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/modernizr.js"></script> 
  	<script src="js/loading_an.js"></script>
  
	<title>Регистрация</title>
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
    
    $split = substr($data['password'], 0, 8); 
    
    if(($split=="12345678") or ($split=="87654321") or($split=="01234567") or ($split=="76543210"))
    {
        $errors[]= 'Слишком простой пароль';
    }
    
    if($prov_login>15)
        {
            $errors[]= 'Логин должен не превышать 16 символов! У вас '.$prov_login.'';
        }
    
    if($prov_login<7)
        {
            $errors[]= 'Слишком короткий логин! У вас всего '.$prov_login.'';
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
        
        $teatcher_table = proverka_teachers ($link, $email,$login);
        
        $teacher_email = proverka_email_teachers($link,$email);
        
        if(($user_table=='Пользователей с таким логином или email уже существует') or ($teatcher_table == 'Пользователей с таким логином или email уже существует'))
        {
            $alert = 'Пользователей с таким логином или email уже существует!';
        }
        elseif(($user_studensts == 'Такого email нету') and ($teacher_email == 'Такого email нету')){
            $alert = 'Вашего email нету в БД, обратитесь к админу!';
        }
        elseif ($teacher_email!='Препод email есть')
        {
            
            
            if( !empty($data['kod'])){
                    
                if (password_verify($data['kod'], $_SESSION['kod'])){
                    $password = password_hash($password, PASSWORD_DEFAULT);
        
                    $len=8;
                    
                  $code_for_cookie =   generate_code_for_cokie($len);
                    
                    
        $user_table = insert_users($link, $email,$login,$password,$code_for_cookie);
                    
                //   $Students_anketa =  insert_Students_anketa_login ($login);
                    
               $alert = 'Вы успешно зарегистировались';
                    unset($_SESSION['kod']);
                    
                }
                else{
                    $alert = 'Ваш код не совпадает';
                }
                
            }
            else{
                $kod = generate_code_signup($lenght = 5);
                
                 
                    
                $i_kod=5;
                 $to  = "<".$email.">" ;

           $subject = "Подтверждение email для регистрации"; 

            $message = ' Ваш код для регистрации: '.$kod.'';

            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod, PASSWORD_DEFAULT);
                
                $_SESSION['kod'] = $kod_sesi;
                
                $alert = 'Ваш код';
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
        $alert = array_shift($errors);
    }
    
    
       if($teatcher_table=='Пользователей с таким логином или email уже существует')
        {
            $alert = 'Учетная запись преподавателя с таким логином или email уже существует!';
        }
    elseif($teacher_email=='Препод email есть')
        {
           //$alert = 'Кулл!';
        
         if( !empty($data['kod'])){
                    
                if (password_verify($data['kod'], $_SESSION['kod'])){
                    $password = password_hash($password, PASSWORD_DEFAULT);
        
                    $len=8;
                    
                  $code_for_cookie =   generate_code_for_cokie($len);
                    
                    
        $user_table = insert_teatchers($link, $email,$login,$password,$code_for_cookie);
                    
                //   $Students_anketa =  insert_Students_anketa_login ($login);
                    
               $alert = 'Вы успешно зарегистировались';
                    unset($_SESSION['kod']);
                    
                }
                else{
                    $alert = 'Ваш код не совпадает';
                }
                
            }
            else{
                $kod = generate_code_signup($lenght = 5);
                
                 
                    
                $i_kod=5;
                 $to  = "<".$email.">" ;

           $subject = "Подтверждение email для регистрации"; 

            $message = ' Ваш код для регистрации: '.$kod.'';

            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod, PASSWORD_DEFAULT);
                
                $_SESSION['kod'] = $kod_sesi;
                
                $alert = 'Ваш код';
            }
            
        
        
        }
    
}
    ?>
    
              <?php if(!empty($alert)): ?>
			 <div id="upsign"><p><?=$alert?></p></div>
			    <?php endif;?>
			    <form action="/signup_port.php" method="POST">
    <?php 
   //var_dump($teatcher_table);
    ?>
       <?php if($alert !== 'Вы успешно зарегистировались'):?>
        <input placeholder="Введите логин" class="input" type="text" maxlength="40" required="required"  name="login" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите email" class="input" type="email" maxlength="40" required="required" name="email"value="<?php echo @$data['email'];?>">
    
    
    <br>
    
    
    <?php if ($i_kod>0): ?>
    <input placeholder="Введите пароль" class="input" maxlength="40" type="password" required="required" name="password"value="<?php echo @$data['password'];?>">
    <br>
    <?php else: ?>
    <input placeholder="Введите пароль" class="input" maxlength="40" type="password" required="required" name="password"value="">
    <br>
    <? endif; ?>
    
    
    
    
    
    <?php if ($i_kod>0): ?>
   <input placeholder="Повторно введите пароль" class="input" maxlength="40" type="password" required="required" name="password_1"value="<?php echo @$data['password_1'];?>">
   <br>
   <?php else: ?>
    <input placeholder="Повторно введите пароль" class="input" maxlength="40" type="password" required="required" name="password_1"value="">
    <br>
   <? endif; ?>
    
    <p>
      <?php if ($i_kod>0): ?>
       <input placeholder="Введите код" class="inputkod" type="text" maxlength="5" name="kod" required="required" value="<?php echo @$data['kod'];?>">
      
       <br>
       
       
     <? endif; ?>
       
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
               <?php
                  //  echo $_SESSION['kod'].'<br>';
                   
                 //  echo $kod;
                    ?>
                    <?php elseif($alert == 'Вы успешно зарегистировались'):?>
                    <?php endif;?>
                </form>
			</div>
			

    
			
		</div>   

    
    <?php
    include 'podval_port.php'
    ?>
    
	