<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
    
    $Select = new Select();
    $img_albom = $Select->get_fetch_all_limit('Alboms','0','100');
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Галерея</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья Алексеевич">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
     
     

	</head>

	<body>
        <div class="swin_href">
                <a href="#top">
                <div class="back-to-top">
                    <div class="back-to-top-in shadow-lg">
                        <i class="fas fa-angle-up mt-3"></i>
                    </div>
                </div>
                </a>
        </div>
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	
	
                    <div class="container pt-5 mt-5" id="top">
                   
                         <div class="row">
                          
                          <?php foreach ($img_albom as $img):?>
                        
                        <?php
                        $img_last = $Select->get_select_where_limit_one_fetch_assoc('gallery','albom',$img['name']);
                        
                        
                        
                        $copyfile = './'.$img_last['img_full'];
                        
                        
                        
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
                        
                    }while($new_width > 1000 || $new_height > 1000);
                
                
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $i = 0;
                
           
                  
                  
                  if (exif_imagetype($copyfile) == IMAGETYPE_JPEG) {
                                $image = imagecreatefromjpeg($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagejpeg($image_p, $copyfile, 60);
                         }
                
                if (exif_imagetype($copyfile) == IMAGETYPE_PNG) {
                                $image = imagecreatefrompng($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagepng($image_p, $copyfile, 9, 60);
                          }
                  
                     }
                        
                        
                        
                            ?>
                          
                        
                         <div class="col albom-col ml-1">
                               <a href="gallery_get.php?name=<?=$img['name']?>">
                                    <img src="<?=$copyfile?>" class="img-albom" alt="" />
                                    <p><?=$img['name']?></p>
                                </a>
                            </div>
                            
                       
                            <?php    endforeach;?> 
                            </div>
                    </div>
             
                    
		

		 
		  
	
	
	

	

	


 
 <?php
        include "include/footer_p.php";
?>


	