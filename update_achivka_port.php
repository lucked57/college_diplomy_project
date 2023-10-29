<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display errors', 1);
//ini_set('display_startup_errors', 1);
//require_once 'include/database.php';
//require_once 'include/functions.php';
 require_once 'include/database_for_podborka.php';
 require_once 'include/classes.php';

if(!isset($_POST['do_achivka'])){
    
    $post_id=$_GET['post_id'];

//$post_id = $_SESSION['post'];

if (!is_numeric($post_id))    exit();

//$post = get_posts_by_id($post_id);
$Select = new Users_info();

$post = $Select->get_Students_achivka_posts_by_id($post_id);

$_POST['title_achivka'] = $post['title'];

$_POST['text_area'] = $post['text_achivka'];
    
     SetCookie("post_id", $post_id);
     
         //$_SESSION['post']=$post['id'];
         
     
     
     
    }
//$_SESSION['kod']=$_GET['post_id'];

//$post_id = $_SESSION['kod'];


//if (!is_numeric($post_id))    exit();

//$post = get_posts_by_id($post_id);
//$Select = new Users_info();

//$post = $Select->get_Students_achivka_posts_by_id($post_id);

//$_POST['title_achivka'] = $post['title'];

//$_POST['text_area'] = $post['text_achivka'];
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
      <?php
        include 'style.php';
    ?>
  <!--<link rel="stylesheet/less" type="text/css" href="cssforportfoli/styles_v1.05.less">
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script> --> 
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
    <script src="js/ajaxscript_s_v1.07f.js"></script>
    <?php endif;?>
  

	    <?php
     $login = $_COOKIE['login'];
    
 $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_students($login);
    
    $cookie_code = $pr_cookie['code'];
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code'])):?>
	<?php
	$login = $_COOKIE['login'];
        
       // $proverka_st = proverka_Students_anketa_login ($login);
    
     
         
         
        
    
    
    
   
   
      if(isset($_POST['do_achivka'])){
          
          $errors=array();
          

          
          if($_POST['checkbox-img']!="Yes"){
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
              
            // if(($height_img/$width_img)<1.5){
            //   $errors[] = 'Соотношение сторон изображение не должно быть меньше 1.5, у вас: '.$height_img/$width_img;
            // }
              
              
              
              
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
        $errors[]= 'Заполните описание!';
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
            
            $Update_img = new Downloading_img();
                  
            $Update_img = $Update_img->get_img_uploadfile($_COOKIE['post_id']);      
                  
            $uploadfileee =  $Update_img['img_uploads_dir'];
 
          //  echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>';
           //       var_dump($uploadfileee);
                  
            //if(is_file($uploadfileee)){
            
            unlink($uploadfileee);
            
           // }
                  
            $img_name = new Downloading_img(); 
                  
                  $lenght = 198;
                      
            $name_img = $img_name->generate_name_for_img($lenght);   
            
            $_FILES['image']['name']=$name_img.".jpeg";
        
            
        $uploads_dir = '/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/';
        $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
            
             //var_dump($uploadfile).'<br><br>';
                  
            move_uploaded_file($file_tmp,$uploadfile);
            
           // chmod($uploadfile,0777);
            
            $file_put = 'images/'.$_FILES['image']['name'];
                  }
            
            //$alert = users_img_file_for_achivka($uploadfile,$login,$file_put);
              
              
              $Update_img_end = new Downloading_img();
              
              
              if((empty($uploadfile)) and (empty($file_put))){
                  
                  $uploadfile = null;
                  
                  $file_put = null;
                  
                  //$_SESSION['post'] = 6;
              }
              
           //  var_dump($check_image);
              
            $alert = $Update_img_end->update_achivka($_COOKIE['post_id'], $title, $text,$uploadfile, $file_put,$check,$check_image);
          
            //$alert = users_img_change($uploadfile,$login);
            //$alert='Успешно загружено';
              
              
              
              
              
          
            }
          
         }
 
    
?>
	
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-7" style="background-image: url('/<?=$post['img']?>')">
			
           <h1>Достижения <?=$_COOKIE['login']?></h1>
           
		</div>
	<div class="blur">
<div id="achivka_block">
  
   <form action="/update_achivka_port.php" method="POST" enctype="multipart/form-data">
       
            <?php if (!empty($errors)): ?>
            
            <div id="upsign"><p><?=array_shift($errors)?></p></div>
            
            <?php elseif(!empty($alert)): ?>
            
            <div id="upsign"><p><?=$alert?></p></div>
            
            <? endif; ?>
    <input placeholder="Заголовок достижения" maxlength="19" class="input_achivka" type="text" required="required" name="title_achivka"value="<?php echo @$_POST['title_achivka'];?>">
    
    
    <p><textarea id="textarea_achivka"rows="19" cols="70" maxlength="5000" name="text_area" wrap="soft" required="required" placeholder="Описание достижения..." ><?php echo @$_POST['text_area'];?></textarea></p>
    
    
    
		    
		    <input class="send_image" type="file" name="image" accept="image/png,image/jpeg">
            <label class="checkbox">
           <div class="achivla-margin">
<input class="checkbox" type="checkbox" name="checkbox-img" value="Yes">
     <span class="box height">
         <div class="text"></div>
     </span>
      <p class="p_checkbox_file">Не менять картинку</p>
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

</div>
			
		
		
		
<?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    
    <?php
    include 'podval_port.php'
    ?>
   
    
