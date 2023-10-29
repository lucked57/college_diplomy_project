<?php
sleep(1.5);
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
    require_once "include/pr_cookie.php";
    global $mysqli;
    $data=$_POST;

    $Select = new Select();

    $Delete = new Delete();

    $Update = new Update();


if( isset( $_POST['image'] ) ){  
    
    $abc_put = './';

    $uploaddir = './img/avatar'; 
    
    $errors = null;
    
    if($pr_cookie != 'user' && $pr_cookie != 'teacher' && $pr_cookie != 'admin'){
        $errors = 'У вас нету права доступа к данной функции';
    }
    else{
        if($pr_cookie == 'admin'){
            $login_add = 'login_admins';
            $login = 'admin';
        }
        elseif($pr_cookie == 'user'){
            $login_add = 'login';
            $login = $_COOKIE['login'];
        }
        elseif($pr_cookie == 'teacher'){
            $login_add = 'login';
            $login = $_COOKIE['login_teacher'];
        }
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
                
                
                do {
                        $i++;
                        if($i > 100){
                            break;
                        }
                    $file_name = "img/avatar/".uniqid().".jpeg";
                } while (file_exists($file_name));
            
            
            $delete_img_dir = $Select->get_select_where_fetch_assoc($pr_cookie.'s',$login_add,$login);
            
            
            $uploadfile_delete = $delete_img_dir['img'];
            
            if(is_file($uploadfile_delete)){
            
                unlink($uploadfile_delete);
            
            }
            
     
            move_uploaded_file( $file['tmp_name'], "./".$file_name );
            $done_files[] = $file_name;
            
            $Update->update_where($pr_cookie.'s','img',  $file_name, $login_add, $login);
        


    }

    
    }
    
    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки картинки, '.$errors);

    
    die( json_encode( $data ) );
}


