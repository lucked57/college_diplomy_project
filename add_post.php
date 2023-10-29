<?php include "include/pr_cookie.php" ?>
<?php
    
    if($pr_cookie != "admin"){
        exit();
        echo $pr_cookie;
    }
    


    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

    $select_t = new Select();

    $levels = $select_t->get_fetch_all('levels');

    $posts = $select_t->get_fetch_all('teatchers_anketa');

    $category_img = $select_t->get_fetch_all('category');
    
if(isset($_POST['do_add'])){
        
        $abc_put = './';
        
        global $mysqli;
        
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
            
            
            $pr = new Proverka();
            
            $title = $pr->proverka_input($_POST['title']);
            
            $date = $pr->proverka_input($_POST['date']);
            
            $tags = $pr->proverka_input($_POST['tags']);
            
            $text = $pr->proverka_input($_POST['text']);
            
            $select_type = $pr->proverka_input($_POST['select_type']);
            
            $select_category = $pr->proverka_input($_POST['select_category']);
            
            $select_level = $pr->proverka_input($_POST['select_level']);
        
             if(empty($title) || empty($date) || empty($tags) || empty($text) || empty($select_type) || empty($select_category) || empty($_POST['formDoor']) || empty($select_level)){
                $errors = "есть пустые значения";
            }
            
            $data = substr($date, -3); //число
            
            $data .= substr($date, -6, -3); //месяц
            
            $data .= '-';
            
            $data .= substr($date, 0, 4); //год
            
            $data = substr($data, 1);
            
            $data = str_replace("-", ".", $data);
            
           /* $pos = strpos($data, '.');
                if ($pos === false) {
                    $errors = "неправильный формат даты, пример: 28.01.2018";
                } else
                {
                    
                    if($pos == 2){
                  
                        $str = substr($data, 3);
                        $pos = strpos($str, '.');
                        if($pos == 2){
                            $length = iconv_strlen($data,'UTF-8');
                            if($length != 10){
                                $errors = "неправильный формат даты, пример: 28.01.2018";
                            }
                        }
                        else{
                            $errors = "неправильный формат даты, пример: 28.01.2018";
                        }
                    }
                    else{
                        $errors = "неправильный формат даты, пример: 28.01.2018";
                    }
                    

                }*/
            
        
            if(empty($errors)){
                
                
                
                
                
                
                    $Insert = new Insert();
                
                    $Select = new Select();
                
                    $Update = new Update();
                    
                    clearstatcache();
                    
                    $img_name = new Downloading_img(); 
                      
                    $name_img = $img_name->generate_name_for_img(50);
                
                    $full_img_name = $name_img;
                
                    $_FILES['image']['name'][$j]=$name_img."full.jpeg";
                
                    $uploads_dir = $abc_put.'img/img_post/';
                
                    $uploadfile = $uploads_dir . basename($_FILES['image']['name'][$j]);
                
                    move_uploaded_file($file_tmp,$uploadfile);
                
                    $file = './img/img_post/'.$name_img.'full.jpeg';
                    $copyfile = './img/img_post/'.$name_img.'min.jpeg';

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
                        
                    }while($new_width > 600 || $new_height > 600);
                
                
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $i = 0;
                
           
                  
                  
                  if (exif_imagetype($copyfile) == IMAGETYPE_JPEG) {
                                $image = imagecreatefromjpeg($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagejpeg($image_p, $copyfile, 70);
                         }
                
                if (exif_imagetype($copyfile) == IMAGETYPE_PNG) {
                                $image = imagecreatefrompng($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagepng($image_p, $copyfile, 9, 30);
                          }
                  
                     }
                
                
  
                
                
                    
                    $file_put = 'img/img_post/'.$full_img_name.'min.jpeg';
                
                    $file_put_full = 'img/img_post/'.$full_img_name.'full.jpeg';
                    
                if($j == 0)    {
                   // $Insert->insert_values_four("img_post","img_min","img_full","title","text",$file_put,$file_put_full,$title,$text);
                    
                    $SQl = new SQL_native();
                    $SQl->query("insert into img_post (img_min, img_full, title, text, data, date, tags, type, category, level) values ('$file_put','$file_put_full','$title','$text','$data','$date','$tags','$select_type','$select_category','$select_level')");
                    
                    $img_pr = $Select->get_select_where_fetch_assoc('img_post','img_min',$file_put);
                    
                    /*$Update->update_where('img_post','data', $data, 'id', $img_pr['id']);
                    $Update->update_where('img_post','tags', $tags, 'id', $img_pr['id']);
                    $Update->update_where('img_post','type', $select_type, 'id', $img_pr['id']);
                    $Update->update_where('img_post','category', $select_category, 'id', $img_pr['id']);*/
                    
                    $teachers_massiv = $_POST['formDoor'];
                    
                    $N = count($teachers_massiv);
                    
                    for($ji=0; $ji <= $N; $ji++){
                        
                        $teacher_logins_add .= ' '.$teachers_massiv[$ji];
                        
                        
                        
                    }
                    
                    $Update->update_where('img_post','teachers_ar', trim($teacher_logins_add), 'id', $img_pr['id']);
                        
                        //$teacher_logins = $Select->get_fetch_all("img_post");
                
                        
                   
                    
                }
                else{
                    
                    $img_sel = $Select->get_select_where_fetch_assoc('img_post','id',$img_pr['id']);
                    
                $Update->update_where('img_post','img_min', $img_sel['img_min']." ".$file_put, 'id', $img_pr['id']);
                $Update->update_where('img_post','img_full', $img_sel['img_full']." ".$file_put_full, 'id', $img_pr['id']);
                    
                    
                }

                    
                    

                
            }
            else{
                $errors;

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
	
	
	
        
        
	
            
	
	
	<div class="container-fluid" id="top">
	
            <div class="row justify-content-around mt-5 pt-5">


                    <div class="col-xl-4 col-md-8">
                       <?php if (!empty($errors)): ?>
                            <div class="alert alert-primary" role="alert">
                                <button type="button" class="close" id="close-alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="alert-heading">Ошибка!</h4>
                                  <p id="text-alert"><?=$errors?>.</p>
                            </div>
                         <? endif; ?>
                       
                       
                       
                        <form action="/add_post.php" method="POST" enctype="multipart/form-data"> 
                            <div class="card">
                              <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1667d4452c9%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1667d4452c9%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.421875%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E">
                              <div class="card-img-overlay">
                                   <div class="custom-file text-center">
                                       <div class="col  align-self-center">
                                        <input name="image[]" type="file" multiple="multiple" id="customFile" accept="image/png,image/jpeg" class="mt-5 pt-md-5"/ required>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Название</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control b-r" placeholder="Введите название..."  value="<?php echo $title;?>" required>
                                      </div>
                                </div>
                                <!--<div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Дата</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="data" class="form-control b-r" placeholder="Введите дату..." value="<?php echo $data;?>">
                                      </div>
                                </div>-->
                                <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Теги</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="tags" class="form-control b-r" placeholder="Перечеслите через пробел теги..." value="<?php echo $tags;?>" required>
                                      </div>
                                </div>
                                
                                
                                
                               
                                
                              </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                    <input type="date" name="date" class="form-control  b-r" placeholder="Дата начала" required value="<?php echo $date;?>">
                                    <small class="form-text text-muted">Введите дату в формате 2019-04-19.</small>
                                  </div>
                            
                             <div class="form-group mt-1">
                                    
                                    <textarea class="form-control" name="text" rows="5" placeholder="Описание поста..." value="<?php echo $text;?>" required></textarea>
                                  </div>
                                  
                                  
                                  <div class="form-group mt-1" style="overflow-y: auto; max-height: 200px;">
                                      <?php foreach ($posts as $post):?>
                                       <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" name="formDoor[]" value="<?=$post['login']?>" class="custom-control-input" id="<?=$post['login']?>">
                                        <label class="custom-control-label" for="<?=$post['login']?>"><?=$post['Name']?></label>
                                      </div>
                                      <?php endforeach;?>
                                  </div>
                                  
                                 
                                  <select class="custom-select mb-3 b-r" name="select_category" required>
                                    <option selected value=''>Выбрать категорию</option>
                                      <?php foreach($category_img as $category):?>
                                      <option value="<?=$category['Name']?>"><?=$category['Name']?></option>
                                      <?php endforeach;?>
                                      <option value="Другое">Другое</option>
                                    </select>
                                    
                                    <select class="custom-select mb-3 b-r" name="select_level" required>
                                      <option selected value=''>Выбрать уровень</option>
                                      <?php foreach($levels as $level): ?>
                                      <option value="<?=$level['level']?>">Уровень <?=$level['level']?> ( до <?=$level['max']?> баллов)</option>
                                      <?php endforeach; ?>
                                    </select>
                                  
                                  

                                  
                                  <select class="custom-select mb-3 b-r" name="select_type" required>
                                      <option selected value=''>Выбрать тип</option>
                                      <option value="open">Открытое</option>
                                      <option value="close">Закрытое</option>
                                    </select>
                            <button  class="btn btn-primary btn-block b-r" type="submit" name="do_add">Добавить</button>
                       </form>
                    </div>



          </div>
	</div>
	
	

	
	
	 <script
  src="js/main_src.js"></script>
	
	<script>
             $(function() {
    $('#close-alert').click(function(){

        
       $('.alert').fadeOut(300);

    });
});
        
        
        
        $(function () {
  $('[data-toggle="popover"]').popover()
})
      $('.popover-dismiss').popover({
  trigger: 'focus'
})

        </script>

 
 <?php
        include "include/footer_p.php";
?>
	