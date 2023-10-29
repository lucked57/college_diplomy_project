<?php
    require_once 'include/database_for_podborka.php';
  require_once 'include/classes.php';


if( isset( $_POST['image'] ) ){  
    

    $uploaddir = './images'; 
    
    $errors = null;
    
  
     $login = $_COOKIE['login'];
  
  // $ios = $_COOKIE['ios'];

    $Select_messenge = new Select();

      $table_name_messenge = 'Students_anketa';
    
        $pole_name_messenge = 'students_login';
    

      $posts_messenge = $Select_messenge->get_num_rows_where($table_name_messenge,$pole_name_messenge,$login);
    
    if($posts_messenge != 1){
        $errors = "проблемы с БД";
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
            
                $file_name = $Generate_code->generate_code_for_cokie(99);
            
                $file_name = $file_name.".jpeg";
                
                $file_name_test = "/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/".$file_name.".jpeg";
                
                $table_name_messenge = 'Students_anketa';
    
                $pole_name_messenge = 'img_uploads_dir';
    

                $posts_messenge = $Select_messenge->get_num_rows_where($table_name_messenge,$pole_name_messenge,$file_name_test);
                
            } while ($posts_messenge > 0);
            
        

        if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
            $done_files[] = realpath( "$uploaddir/$file_name" );
            
            $Update = new Update();
            
            
            $table_name_messenge = 'Students_anketa';
    
            $pole_name_messenge = 'students_login';
            
            $delete_img_dir = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
            
            
            $uploadfile_delete = $delete_img_dir['img_uploads_dir'];
            
               if(is_file($uploadfile_delete)){
            
            unlink($uploadfile_delete);
            
            }
            
            //пути для добавления в бд
            $full_dir = "/home/httpd/vhosts/onlinesborka.mcdir.ru/httpdocs/images/".$file_name;
            
            $dir_img = "images/".$file_name;
            
            $Update->update_where("Students_anketa","img_uploads_dir", $full_dir, "students_login", $login);
            
            $Update->update_where("Students_anketa","img_anketa", $dir_img, "students_login", $login);
        }
    }
       else{
            
            $table_name_messenge = 'Students_anketa';
    
            $pole_name_messenge = 'students_login';
            
            $check_img_update = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
            
            if(empty($check_img_update['img_anketa'])){
                
                            $delete = new Delete;
            $delete->get_delete_where('Students_anketa','students_login',$login);
                
            }
            
        }
    
    }
    
    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки картинки, '.$errors);

    
    die( json_encode( $data ) );
}


