<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
    ?>

	
<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">

	<link rel="stylesheet" href="cssforportfoli/styleproverka.css">
	<link rel="stylesheet" href="cssforportfoli/responsiveinfo.css">
        <?php
        include 'style.php';
    ?>
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
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
  if(isset($_COOKIE['login'])){
        
        include 'login_modal.php';
        
    }
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
	<?php
	$login = $_COOKIE['login'];
        
        $proverka_st = proverka_Students_anketa_login ($login);
    
     if($proverka_st=="update"){
         
         $account_info = get_img_uploadfile($login);
         foreach($account_info as $info){
              $FIO_db =  $info['FIO'];
             $year_db =  $info['year'];
             $Adress_db =  $info['Adress'];
             $Groupe_name = $info['Group_name'];
            }
     }
	?>
	<?php
    if(isset($_FILES['image'])){
        
        
        
        if($proverka_st=="update"){
            
        
            
        
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        
        
      //  $expentions = array("jpeg","jpg","png");
       


        $imageinfo = getimagesize($_FILES['image']['tmp_name']);
 if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
  $errors[] = 'Не поддерживаемый тип файла';
 }
       //измениение имени файла
        

        
        
        if(empty($errors)){
             clearstatcache();//очистим кеш для избежания ошибки 
        
        $login = $_COOKIE['login'];
            
           $img_up = get_img_uploadfile($login);
            
            foreach($img_up as $post){
              $uploadfileee =  $post['img_uploads_dir'];
            }
            
            if(is_file($uploadfileee)){
            
            unlink($uploadfileee);
            
            }
            
            $name_img = generate_name_for_img($lenght = 199);
            
            $_FILES['image']['name']=$name_img.".jpeg";
        
            
        $uploads_dir = '/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/';
        $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
            
            
            move_uploaded_file($file_tmp,$uploadfile);
            
           // chmod($uploadfile,0777);
            
            $file_put = 'images/'.$_FILES['image']['name'];
            
            $alert = users_img_change($file_put,$login);
            
            $alert .= users_img_uploadfile($uploadfile,$login);
            //$alert = users_img_change($uploadfile,$login);
            //$alert='Успешно загружено';
        }
        else{
            print $errors;
        }
    }
   
    else{
        $alert = 'Вначале заполните анкету!';
    }
    }
    
    
    
    
    
    
    
    if(isset($_POST['do_anketa']))
    {
        
             $errors_anketa=array();
                     if(trim($_POST['FIO'])=='')
                {
                    $errors_anketa[]= 'Введите FIO!';
                }
                     if(trim($_POST['year'])=='')
                {
                    $errors_anketa[]= 'Введите year!';
                }
                     if(trim($_POST['Adress'])=='')
                {
                    $errors_anketa[]= 'Введите Adress!';
                         
                }
              if(trim($_POST['Group_name'])=='')
                {
                    $errors_anketa[]= 'Введите название группы!';
                         
                }
             if(strlen(trim($_POST['year']))!=4)
                {
                    $errors_anketa[]= 'Год рождения должен состоять из 4 цифр!';
                }
        
        if($proverka_st=="update"){
            if(empty($errors_anketa))
                            {
                                    $FIO =  trim($_POST['FIO']);
                                    $year = trim($_POST['year']);
                                    $Adress = trim($_POST['Adress']);
                                    $Groupe_name = trim($_POST['Group_name']);
                                    
                                    global $link;

                                    $FIO = mysqli_real_escape_string($link,$FIO);
                                    $year = mysqli_real_escape_string($link,$year);
                                    $Adress = mysqli_real_escape_string($link,$Adress);
                                    $Groupe_name = mysqli_real_escape_string($link,$Groupe_name);
                
                
                                    $Groupe_name = mb_strtoupper($Groupe_name, 'UTF-8');
                                    $gpoupe_pr = proverka_gpoupe ($Groupe_name);
                
                
                                    if($gpoupe_pr != 'Такой группы нету в бд'){
                                        
                                        $alert_anketa = update_Students_anketa ($login, $FIO, $year, $Adress,$Groupe_name);
                                        
                                    }
                                    else
                                    {
                                         $alert_anketa = 'Такой группы нету в бд';
                                    }
                                
                                    
                            }
            
        }
        else{
            
        
        
               
        
        
        
                        if(empty($errors_anketa))
                            {
                                    $FIO =  trim($_POST['FIO']);
                                    $year = trim($_POST['year']);
                                    $Adress = trim($_POST['Adress']);
                                    $Groupe_name = trim($_POST['Group_name']);
                                    
                                    global $link;

                                    $FIO = mysqli_real_escape_string($link,$FIO);
                                    $year = mysqli_real_escape_string($link,$year);
                                    $Adress = mysqli_real_escape_string($link,$Adress);
                                    $Groupe_name = mysqli_real_escape_string($link,$Groupe_name);
                              
                                    $Groupe_name = mb_strtoupper($Groupe_name, 'UTF-8');
                                    $gpoupe_pr = proverka_gpoupe ($Groupe_name);
                              
                                   if($gpoupe_pr != 'Такой группы нету в бд'){
                            
                                    $alert_anketa = insert_Students_anketa ($login, $FIO, $year, $Adress,$Groupe_name);
                                   }
                              else
                                    {
                                         $alert_anketa = 'Такой группы нету в бд';
                                    }
                              
                            }
            }
    }
?>
	
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-6 height">
			
           
            <div id="signupleft">
            <?php if (!empty($errors_anketa)): ?>
            
            <div id="upsign"><p><?=array_shift($errors_anketa)?></p></div>
            
            <?php else: ?>
            
            <div id="upsign"><p><?=$alert_anketa?></p></div>
            
            <? endif; ?>
            
            <?php if ($proverka_st=="update"): ?>
                <form action="/anketa_port.php" method="POST">

                    <input placeholder="Введите ФИО" class="input_anketa" type="text" name="FIO" required="required" value="<?php echo @$FIO_db;?>">

                <br>


                <input placeholder="Введите год рождения" class="input_anketa" type="text" name="year" required="required" value="<?php echo @$year_db;?>">


                <br>

                <input placeholder="Введите ваш адрес" class="input_anketa" type="text" name="Adress" required="required" value="<?php echo @$Adress_db;?>">


                <br>

                
                 <input placeholder="Введите название группы" class="input_anketa" type="text" name="Group_name" required="required" value="<?php echo @$Groupe_name;?>">


                <br>

                <p>
                    <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_anketa">Обновить</button>
                </p>
                </form>
	
	<?php else: ?>
	
                    <form action="/anketa_port.php" method="POST">

                    <input placeholder="Введите ФИО" class="input_anketa" type="text" name="FIO" required="required" value="<?php echo @$_POST['FIO'];?>">

                <br>


                <input placeholder="Введите год рождения" class="input_anketa" type="text" name="year" required="required" value="<?php echo @$_POST['year'];?>">


                <br>

                <input placeholder="Введите ваш адрес" class="input_anketa" type="text" name="Adress" required="required" value="<?php echo @$_POST['Adress'];?>">


                <br>
                
                
                 <input placeholder="Введите название группы" class="input_anketa" type="text" name="Group_name" required="required" value="<?php echo @$_POST['Group_name'];?>">


                <br>


                <p>
                    <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_anketa">Подтвердить</button>
                </p>
                </form>
	
	<? endif; ?>
		</div>
			
<div id="signupright">
           
           
           
           <?php if(empty($errors)):?>
            
		<div id="upsign"><p><?=$alert?></p></div>
		
		<?php else: ?>
		
		<div id="upsign"><p><?=array_shift($errors)?></p></div>
		
		<?php endif;?>
		
		
	
	

		<form action="/anketa_port.php" method="post" enctype="multipart/form-data">
		    
		    <input class="send_image" type="file" name="image" accept="image/png,image/jpeg">
		    
		    <input class="dws-submit5" class="dws-submit5:hover" type="submit">

		   
		    
		</form>
		<br><br>
		<div id="image_send">
	<img src="/images/<?=$_FILES['image']['name']?>">
	</div>

           
           
           
           
           
           
            </div>
			
		</div>  
		<div class="blur">
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>