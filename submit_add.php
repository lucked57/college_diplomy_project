<?php
    require_once 'include/database_for_podborka.php';
  require_once 'include/classes.php';
//sleep(1.9);

if( isset( $_POST['image'] ) ){  
    

    $uploaddir = './images'; 
    
    $errors = null;
    
  
     $login = $_COOKIE['login'];
    
   // $ios = $_COOKIE['ios'];

    $Select_messenge = new Select();

      $table_name_messenge = 'users';
    
        $pole_name_messenge = 'login';
  
  
     $check_anketa = $Select_messenge->get_select_where_fetch_assoc('Students_anketa','students_login',$login);

        if(!empty($check_anketa)){
            $groupe_name = $check_anketa['Group_name'];
        }
        else{
            $errors = "Чтобы выкладывать достижения нужно заполнить анкету";
        }
    

      $posts_messenge = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
    
                    $pass_pr = $posts_messenge['code'];

                    $email = $posts_messenge['email'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }
                    else{
                        $errors = "Проблемы с аккаунтом";
                    }

    if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );

    $files      = $_FILES; 
    $done_files = array();

    
    foreach( $files as $file ){

        if($file['size']>9000000){
   
            $errors = "слишком большой размер";

        }
        
        $imageinfo = getimagesize($file['tmp_name']);
        
         if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
  $errors = "неподдерживаемый формат";
 }
        
        if(empty($errors)){
            
            do {
              
              if($file['size']>500000){
              
               $percent = 0.5;
                list($width, $height) = getimagesize($file['tmp_name']);
                $new_width = $width * $percent;
                $new_height = $height * $percent;
                $image_p = imagecreatetruecolor($new_width, $new_height);
                
                
                if (exif_imagetype($file['tmp_name']) == IMAGETYPE_JPEG) {
                $image = imagecreatefromjpeg($file['tmp_name']);
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($image_p, $file['tmp_name'], 50);
            }
                
                  if (exif_imagetype($file['tmp_name']) == IMAGETYPE_PNG) {
                $image = imagecreatefrompng($file['tmp_name']);
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagepng($image_p, $file['tmp_name'], 9, 50);
            }
              
            }
              
              
                $Generate_code = new Generate_code();
            
                $file_name = $Generate_code->generate_code_for_cokie(98);
            
                $file_name = $file_name.".jpeg";
                
                $file_name_test = "/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/".$file_name.".jpeg";
                
                $table_name_messenge = 'Students_achivka';
    
                $pole_name_messenge = 'img_uploads_dir';
    

                $posts_messenge = $Select_messenge->get_num_rows_where($table_name_messenge,$pole_name_messenge,$file_name_test);
                
            } while ($posts_messenge > 0);
            
        

        if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
            //$done_files[] = realpath( "$uploaddir/$file_name" );
            
            
           
            $full_dir = "/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/".$file_name;
            
            $dir_img = "images/".$file_name;
            
            $insert = new Insert();
            
            $insert->insert_values_two('Students_achivka','img','img_uploads_dir',$dir_img,$full_dir);
            
                $table_name_messenge = 'Students_achivka';
    
            $pole_name_messenge = 'img_uploads_dir';
            
            $check_img_update = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$full_dir);
            
            if(!empty($check_img_update['id'])){
                
                $done_files[] = $check_img_update['id'];
                
            }
            else{
                $errors = "Проблемы с добавлением в БД";
            }
            
        }
    }
        else{
            
            
            if(!empty($check_anketa)){
            
        $errors = "Не получилось загрузить картинку";
                
            }
            else{
                $errors = "Чтобы выкладывать достижения нужно заполнить анкету";
            }
            
        }
    
    }
    
    
    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки картинки, '.$errors);

    
    die( json_encode( $data ) );
}


