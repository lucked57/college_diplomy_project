<?php 
    require_once "include/pr_cookie.php";
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

        if($pr_cookie != "admin"){
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
       
       <div class="container mt-5 pt-5" id="top">
            <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text b-r" id="year_delete5">Пример: 19</span>
          </div>
          <input type="number" id="year_delete" class="form-control b-r" placeholder="Год" aria-label="Username" aria-describedby="year_delete" max="99">
        </div>
        
        <div class="form-group mt-5">
      <select id="curs_delete" class="form-control b-r">
        <option selected>Выберите курс...</option>
        <option value="4">4 курс</option>
        <option value="5">5 курс</option>
      </select>
    </div>
    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary b-r" id="delete_curs_do">Удалить</button>
    </div>
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

	
	