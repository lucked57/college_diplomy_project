<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

    if($pr_cookie != "admin"){
        exit();
        echo $pr_cookie;
    }

    $errors;

    $alert;

    $Select = new Select();


    $alboms = $Select->get_fetch_all('Alboms');






    if(isset($_POST['do_add'])){
        
        $abc_put = './';
        
        global $mysqli;
        
        $albom =  $_POST['albom'];
        
        $proverka = new Proverka();
        
        $albom = $proverka->proverka_input($albom);
        
        $total = count($_FILES['image']['name']);
        
        for( $j=0 ; $j < $total ; $j++ ){
        
        
        $file_name = $_FILES['image']['name'][$j];
        $file_size = $_FILES['image']['size'][$j];
        $file_tmp = $_FILES['image']['tmp_name'][$j];
        $file_type = $_FILES['image']['type'][$j];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'][$j])));
        
       
            $imageinfo = getimagesize($_FILES['image']['tmp_name'][$j]);
        if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
          $errors = 'Неподдерживаемый тип файла min';
         }
            
            if(empty($albom)){
                
                $errors = "Введите название альбома";
                
            }
            
            if(iconv_strlen($albom) > 100){
                
                $errors = "Слишком длинное название альбома";
                
            }
        
    
    
            
        
            if(empty($errors)){
                
                
                
                
                
                
                
                
                    $Insert = new Insert();
                
                    $Select = new Select();
                
                    $Update = new Update();
                
                
                    if($j == 0){
                    
                    $Insert->insert_values('Alboms','name',$albom);
                    
                }
                    
                    clearstatcache();
                    
                    $img_name = new Downloading_img(); 
                      
                    $name_img = $img_name->generate_name_for_img(50);
                
                    $full_img_name = $name_img;
                
                    $_FILES['image']['name'][$j]=$name_img."full.jpeg";
                
                    $uploads_dir = $abc_put.'img/gallery/';
                
                    $uploadfile = $uploads_dir . basename($_FILES['image']['name'][$j]);
                
                    move_uploaded_file($file_tmp,$uploadfile);
                
                    $file = './img/gallery/'.$name_img.'full.jpeg';
                    $copyfile = './img/gallery/'.$name_img.'min.jpeg';

                if (!copy($file, $copyfile)) {
                    echo "не удалось скопировать $file...\n";
                }
                
                    
                
                
                
                
                
                
               if(filesize($copyfile) > 30000) {
                    
                
                
                    $i = 0;
                    $percent = 1;
                    do{
                        
                        
                        
                        list($width, $height) = getimagesize($copyfile);
                        
                        $new_width = $width * $percent;
                        $new_height = $height * $percent;
                        $image_p = imagecreatetruecolor($new_width, $new_height);

                        
                        
                        
                        if($percent > 0.019){
                           $percent = $percent - 0.019; 
                        }
                        
                        if($i > 100){
                            break;
                        }
                        
                        $i++;
                        
                    }while($new_width > 350 || $new_height > 350);
                
                
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $i = 0;
                
           
                  
                  
                  if (exif_imagetype($copyfile) == IMAGETYPE_JPEG) {
                                $image = imagecreatefromjpeg($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagejpeg($image_p, $copyfile, 40);
                         }
                
                if (exif_imagetype($copyfile) == IMAGETYPE_PNG) {
                                $image = imagecreatefrompng($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagepng($image_p, $copyfile, 9, 30);
                          }
                  
                     }
                
                
  
                
                
                    
                    $file_put = 'img/gallery/'.$full_img_name.'min.jpeg';
                
                    $file_put_full = 'img/gallery/'.$full_img_name.'full.jpeg';
                    
                   // $Insert->insert_values_two("gallery","img_min","img_full",$file_put,$file_put_full);
                
                    $Insert->insert_values_three("gallery","img_min","img_full",'albom',$file_put,$file_put_full,$albom);
                    
                    $img_pr = $Select->get_select_where_fetch_assoc('gallery','img_min',$file_put);
                    
                        if(!empty($img_pr)){
                            $alert = "Все данные успешно добавлены";
                        }
                        else{
                            $alert = "Что-то пошло не так";
                        }
                
            }
            else{
                $alert = $errors;
                $errors = 'Ошибка';
            }
        
        }
        
    }

?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>сайт</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Илья Алексеевич(авторство)">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
	</head>
	
	<body>
       
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	
	
                    
		
            <div class="container sign-admin mt-5 pt-5" id="top">
             <?php if (!empty($alert)): ?>
              <div class="alert alert-primary" role="alert">
        <button type="button" class="close" id="close-alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading"><?=$errors?></h4>
  <p id="text-alert"><?=$alert?>.</p>
</div>
 <? endif; ?>
 
  <form id="form_admin" action="/add_img_gal.php" method="POST" enctype="multipart/form-data">
  
  
<select class="custom-select mb-3 b-r" id="select_albom">
  <option selected>Выбрать альбом</option>
  <?php foreach($alboms as $albom): ?>
   <option value="<?=$albom['name']?>"><?=$albom['name']?></option>
   <?php endforeach; ?>
</select>
  
  
  
  
  <div class="form-group row">
              <label class="col-sm-2 col-form-label">Альбом</label>
              <div class="col-sm-10">
                <input type="text" name="albom" class="form-control b-r" id="new_albom" placeholder="Введите название альбома" required>
              </div>
            </div>
   
   
   <div class="custom-file mb-3">
  <input name="image[]" type="file" multiple="multiple" id="customFile" accept="image/png,image/jpeg" required />
</div>
  
    
   
    
  


    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn color-block text-white b-r" name="do_add">Добавить</button>
      </div>
    </div>
  </form>
</div>
        
        
<script>
        $(function() {
    $('#close-alert').click(function(){

        
       $('.alert').fadeOut(300);

    });
});
    $( "#select_albom" ).change(function() {
        var albom =  $("#select_albom").val();
        if(albom != 'Выбрать альбом'){
            $('#new_albom').val(albom);
        }
        else{
            $('#new_albom').val('');
        }
});
   //
        </script>
		<!-- footer -->
 
 <?php
        include "include/footer_p.php";
?>


