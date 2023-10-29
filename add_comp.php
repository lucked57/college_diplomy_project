<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/functions.php';
    require_once 'include/classes_add.php';
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
     <script src="js/jquery-3.3.1.min.js"></script>
  	<script src="js/preloader_an.js"></script>
	<title>Добавление новостей</title>
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
	   <?php

    $login = $_COOKIE['login_admin'];
    $admins_posts = new Proverka_cookie();
    $admins_posts = $admins_posts->find_cookie_for_admin($login);
    
        

            $cookie_code = $admins_posts['code'];

    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_admin'])):?>
	<?php
	$login = $_COOKIE['login'];
        
   
    
    
   
   
      if(isset($_POST['do_achivka'])){
          
          $errors=array();
          
         
                $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        
         

        $imageinfo = getimagesize($_FILES['image']['tmp_name']);
 if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
  $errors[] = 'Не поддерживаемый тип файла';
 }
    $height_img = $imageinfo[0]; 
    $width_img = $imageinfo[1];          
              
    if(($height_img/$width_img)<1.5){
        $errors[] = 'Соотношение сторон изображение не должно быть меньше 1.5, у вас: '.$height_img/$width_img;
    }
              
              
              
              
        
          
           if(trim($_POST['title_achivka'])=='')
    {
        $errors[]= 'Введите название!';
    }
              if(trim($_POST['text_area'])=='')
    {
        $errors[]= 'Введите описание!';
    }
 
          
          if(empty($errors)){
          
            
              
              $title = $_POST['title_achivka'];
              
              $text = $_POST['text_area'];
              
              
              if($check_image !='No'){
              
               clearstatcache();//очистим кеш для избежания ошибки 
        
        $login = $_COOKIE['login'];
            
           $img_up = get_img_uploadfile($login);
            
            foreach($img_up as $post){
              $uploadfileee =  $post['img_uploads_dir'];
            }
            
            if(is_file($uploadfileee)){
            
            unlink($uploadfileee);
            
            }
            
            $name_img = generate_name_for_img($lenght = 198);
            
            $_FILES['image']['name']=$name_img.".jpeg";
        
            
        $uploads_dir = '/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images_posts/';
        $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
            
            
            move_uploaded_file($file_tmp,$uploadfile);
            
           // chmod($uploadfile,0777);
            
            $file_put = 'images_posts/'.$_FILES['image']['name'];
                  }
            
            //$alert = users_img_file_for_achivka($uploadfile,$login,$file_put);
              
              $Add = new Add_news();
              
              $alert = $Add->add_posts($title, $text,$uploadfile, $file_put);
              
            //$alert = insert_Students_achivka ($title, $text,$uploadfile, $file_put);
          
            //$alert = users_img_change($uploadfile,$login);
            //$alert='Успешно загружено';
              
              
              
              
              
          
            }
          
         }
 
    
    
    
?>
	
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           <h1>Добавить новость</h1>
           
		</div>
	
<div id="achivka_block">

   <form action="/add_comp.php" method="POST" enctype="multipart/form-data">
       
            <?php if (!empty($errors)): ?>
            
            <div id="upsign"><p><?=array_shift($errors)?></p></div>
            
            <?php elseif(!empty($alert)): ?>
            
            <div id="upsign"><p><?=$alert?></p></div>
            
            <? endif; ?>
    <input placeholder="Заголовок статьи" maxlength="19" class="input_achivka" type="text" required="required" name="title_achivka"value="<?php echo @$_POST['title_achivka'];?>">
    
    
    <p><textarea id="textarea_achivka"rows="19" cols="70" maxlength="750" name="text_area" wrap="soft" required="required" placeholder="Описание статьи..." value="<?php echo @$_POST['text_area'];?>"></textarea></p>
    
    
    
		    
		    <input class="send_image" type="file" name="image" accept="image/png,image/jpeg">
		       
	
		<br><br>
		<div id="image_send">
	<img src="/images/<?=$_FILES['image']['name']?>">
	</div>
    
    
  		
        <button class="dws-submit_achivka" class="dws-submit_achivka:hover" type="submit" name="do_achivka">Добавить</button>
        <br><br><br><br><br>
    </form>

</div>
			
		
		
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval.php'
    ?>