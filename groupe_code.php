<?php 
    require_once "include/pr_cookie.php";
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';



            $Select = new Users_info();

            $Select = new Select();
                
            $groupe_code = $Select->get_fetch_all('Group_name');


            if($pr_cookie != 'admin'){
                exit();
            }

            ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>сайт</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья Алексеевич(авторство)">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
	</head>
	
	<body>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
       
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	
	
       
       
       
        
        
	
          
    <main> 
       
       <div class="swin_href">
                <a href="#top">
                <div class="back-to-top">
                    <div class="back-to-top-in shadow-lg">
                        <i class="fas fa-angle-up mt-3"></i>
                    </div>
                </div>
                </a>
        </div>
       
       
	<div class="container my-5 py-5" id="top">
    <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">Группа</th>
                  <th scope="col">Код</th>
                </tr>
              </thead>
              <tbody>
            <?php foreach($groupe_code as $groupe): ?>
              <tr>
                    <th scope="col"><?=$groupe['name']?></th>
                     <th scope="col"><?=$groupe['kod']?></th>
                  </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
	    

	   
	</div>
	
	
	
	

	
	
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script>
  $(".single-item").slick({
	dots: true
});
</script>
	
	
	
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
	
	 
	
	<script>
   $(document).ready(function($) {
  $('.card').matchHeight();
});
        </script>

 
 <?php
        include "include/footer_p.php";
?>

	
	