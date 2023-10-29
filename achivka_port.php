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
  <link rel="stylesheet/less" type="text/css" href="cssforportfoli/styles_v1.05.less">
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>  
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
             <?php if(isset($_COOKIE['login'])):?>
    <script src="js/ajaxscript_s_v1.05.js"></script>
    <?php endif;?>
  

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
            }
        
     }
   
      if(isset($_POST['do_achivka']) and ($proverka_st=="update")){
          
          $errors=array();
          
          if($_POST['checkbox-img']!="Yes"){
                $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        
            $pr_count =  proverka_count_achivka($login);
    
    if($pr_count>10){
        $errors[] = 'У вас превышен лимит на кол-во достижений';
    }   

        $imageinfo = getimagesize($_FILES['image']['tmp_name']);
 if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
  $errors[] = 'Не поддерживаемый тип файла';
 }
            
             $height_img = $imageinfo[0]; 
    $width_img = $imageinfo[1];          
              
    if(($height_img/$width_img)<1.5){
        $errors[] = 'Соотношение сторон изображение не должно быть меньше 1.5, у вас: '.$height_img/$width_img;
    }
            
            
          }
          else{
              $check_image = 'No';
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
          
              if($_POST['checkbox-test']=="Yes"){
              $check = 'Yes';
          }
              else{
                  $check = 'No';
              }
              
              
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
        
            
        $uploads_dir = '/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/';
        $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
            
            
            move_uploaded_file($file_tmp,$uploadfile);
            
           // chmod($uploadfile,0777);
            
            $file_put = 'images/'.$_FILES['image']['name'];
                  }
            
            //$alert = users_img_file_for_achivka($uploadfile,$login,$file_put);
              
            $alert = insert_Students_achivka ($login, $title, $text,$uploadfile, $file_put,$check,$check_image);
          
            //$alert = users_img_change($uploadfile,$login);
            //$alert='Успешно загружено';
              
              
              
              
              
          
            }
          
         }
 
    
    
    
?>
	
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-7">
			
           <h1>Достижения <?=$_COOKIE['login']?></h1>
           
		</div>
	<div class="blur">
<div id="achivka_block">
   <?php if ($proverka_st=="update"): ?>
   <form action="/achivka_port.php" method="POST" enctype="multipart/form-data">
       
            <?php if (!empty($errors)): ?>
            
            <div id="upsign"><p><?=array_shift($errors)?></p></div>
            
            <?php elseif(!empty($alert)): ?>
            
            <div id="upsign"><p><?=$alert?></p></div>
            
            <? endif; ?>
    <input placeholder="Заголовок достижения" maxlength="29" class="input_achivka" type="text" name="title_achivka" required="required"  value="<?php echo @$_POST['title_achivka'];?>">
    
    
    <p><textarea id="textarea_achivka"rows="19" cols="70" maxlength="5000" name="text_area" wrap="soft" placeholder="Описание достижения..."  required="required"  value="<?php echo @$_POST['text_area'];?>"></textarea></p>
    
    
    
		    
		   <input class="send_image" type="file" name="image" accept="image/png,image/jpeg">
           <label class="checkbox">
<div class="achivla-margin">
      <input class="checkbox" type="checkbox" name="checkbox-img" value="Yes">
      <span class="box height">
      <div class="text"></div>
      </span>
      <p class="p_checkbox_file">Отправить без картинки</p>
      </div>
       </label>
		<br><br>
	
    
    
  		
       <button class="dws-submit_achivka" class="dws-submit_achivka:hover" type="submit" name="do_achivka">Добавить</button>
      <label class="checkbox">
           <div class="achivla-margin"> 
           <input class="checkbox" type="checkbox" name="checkbox-test" value="Yes">
           <span class="box height">
           <div class="text"></div>
           </span>
           <p class="p_checkbox">На главную</p>
           </div>
       </label>
    </form>
    <?php else: ?>
 <p id="Admins_block">Вначале заполните анкету!</p>
				<?php endif;?>
</div>
			
		
		
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>