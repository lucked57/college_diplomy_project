<?php 
    require_once "include/pr_cookie.php";
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

            if($pr_cookie != "admin" && $teachers_can == false){
                exit();
            }

            $Select = new Users_info();

            $Select = new Select();

            $students = $Select->get_fetch_all('Group_name');

            $return .= '<div class="list-group">
                      <p href="#" class="list-group-item list-group-item-action active">
                        '.$Groupe_name.'
                      </p>';
            foreach($students as $student_info){
                    $return .= '<a class="list-group-item list-group-item-action group-all-admin" value="'.$student_info['name'].'">'.$student_info['name'].'</a>';
                }

            $return .= '</div>';

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
    <div class="table-responsive" id="users_admin_d">
                 <?php echo $return ?>
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

	
	