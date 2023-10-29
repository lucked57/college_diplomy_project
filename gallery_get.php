<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
    global $mysqli;

    $name = $_GET['name'];

    
    if (empty($name))    exit();

    $pr = new Proverka();

    $name = $pr->proverka_input($name);

    //echo $name;

    $Select = new Select();
    $img_albom = $Select->get_select_where_fetch_all('gallery','albom',$name);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$name?></title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья Алексеевич">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
     
     
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.css" />

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
                        <div class="gallery-d">
                             <?php foreach ($img_albom as $img):?>
                        <!--data-caption="Caption for single image"-->
                        <?php if($pr_cookie == "admin"):?>
                            <i class="fas fa-trash-alt delete-img-admin" value="<?=$img['id']?>"> Удалить</i>
                            <a href="<?=$img['img_full']?>" data-fancybox="gallery" data-caption="<?=$img['id']?>" >
                        <?php else: ?>
                            <a href="<?=$img['img_full']?>" data-fancybox="gallery" >
                        <?php endif; ?>
                                <img src="<?=$img['img_min']?>" alt="" />
                            </a>
                           
                            <?php    endforeach;?>
                          </div>
                    </div>
             
                    
		

		 
		  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.js"></script>
	
	

	

	


 
 <?php
        include "include/footer_p.php";
?>


	