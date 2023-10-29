<?php 
 if(!isset($_COOKIE['limit0'])){
                    SetCookie("limit0", 0);
                }


                 if(!isset($_COOKIE['limit0'])){
                        $limit0 = 0;
                    }
                    else{
                        $limit0 = $_COOKIE['limit0'];
                    }

                

                if(isset($_POST ['do_plus'])){
                    $limit0 +=12;
                    SetCookie("limit0", $limit0);
                }
                if(isset($_POST ['do_minus'])){
                    $limit0 -=12;
                    SetCookie("limit0", $limit0);
                }
                if(isset($_POST ['do_start'])){
                   $limit0 = 0;
                    SetCookie("limit0", $limit0);
                }
    require_once "include/pr_cookie.php";
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

                
            $finish = false;

            $limit1 = 12;

               

           
            if($limit0 < 0){
                $limit0 = 0;
            }



            $Select = new Users_info();

            $Select_t = new Select();
                
            $posts = $Select->select_post_content_limit($limit0,$limit1);

            if(isset($_POST ['submit_post'])){
                
                $posts_tags = $Select_t->get_fetch_all('img_post');
                
                
                
                 $posts = array();       
                
                $pr = new Proverka();

                $submit_tag = $pr->proverka_input($_POST['submit_post']);
                
                //$submit_tag = '1семестр';
                $pr_tags;
                foreach($posts_tags as $tags_p){
                    
                    
                     $teachers_pieces = explode(" ", $tags_p['tags']);  
                
                     array_push($teachers_pieces, "apple");  

                     $end_pieces_t = end($teachers_pieces);

                     $i = 0;

                     do{

                         if($submit_tag == $teachers_pieces[$i]){
                             
                             if($pr_tags != $tags_p){
                                 $posts[] = $tags_p;
                             }
                             $pr_tags = $tags_p;
                             

                         }

                         $i++;
                         if($i > 100){
                             break;
                         }

                     }while($teachers_pieces[$i]!=$end_pieces_t);
                    
                    
                    
                }

                
                
                
                
                
                }

            

            
            $teachers_can = false;

            $ipost = 0;


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Портфолио студентов ККМТ</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Илья Алексеевич(авторство)">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
	</head>
	
	<body>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
       
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	
	
	    <div class="cd-fixed-bg cd-fixed-bg--1" id="top">
			<div class="cd-fixed-bg__content">
				<h1>Колледж космического машиностроения и технологий</h1>
				
			</div>
		</div> 
       
       
       
        
        
	
          
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
       
       
        <div class="col text-main mb-5 bg-white">
            <h1 class="text-center pt-5 mb-5">Портфолио студентов</h1>
            <p class="text-center px-md-5">Данный портал предназначен для автоматизации процесса сбора информации о достижениях студентов и представление их в электронном виде на сайте образовательной организации.</p>
        </div>
	
	
	
	
	
	<div class="row justify-content-around mr-0 ml-0 mt-5 pt-5" id="contentposts">
        
            <?php foreach ($posts as $post):?>
            
            <?php
                $text = mb_substr($post['text'],0,250);
                $text = mb_substr($text, 0, mb_strrpos($text,' '));
            ?>
            
            <?php if(!empty(trim($post['teacher'])) && !empty(trim($post['group_name']))): ?>
            
            
            
             <div class="col-lg-5 mb-5">
             <a href="post_p.php?post_id=<?=$post['id']?>">
            <div class="card shadow">
          <div class='single-item'>
              <!-- <iframe class="card-img-top" src="https://www.youtube.com/embed/AcL0MeVZIxM" frameborder="0" allowfullscreen="" style="height:500px;">
</iframe>-->
               <?php
                $info_prepod = $Select_t->get_select_where_fetch_assoc('teatchers_anketa','login',$post['teacher']);
    
    
    
                $teachers_can = false;
                $user_can = false;
    if($pr_cookie == "teacher"){
        
    
    
    $teachers_arr = $Select_t->get_select_where_fetch_assoc('img_post','id',$post['id']);
                

                 if($_COOKIE['login_teacher'] == $post['teacher']){
                     $teachers_can = true;
                 }
                 
                 $i++;
                 if($i > 100){
                     break;
                 }
                 

                
             }   
                
                if($pr_cookie == 'user'){
                    $user_anketa= $Select_t->get_select_where_fetch_assoc('Students_anketa','students_login',$_COOKIE['login']);
                    
                    $groupe_user_name = $user_anketa['Group_name'];
                    
                    if($post['group_name'] == $groupe_user_name){
                        $user_can = true;
                    }
                }
              
             $pieces_area = explode(" ", trim($post['img_min']));
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
              do
                                        {
              
              ?>
               
               
               
                <div><img src="<?=$pieces_area[$i]?>"></div>
    
                
                
                
                <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                
                
                if(!empty($post['user_connect'])){
                    
                
                
                 $pieces_area = explode(" ", $post['user_connect']);
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
                                    do
                                        {
                                        
                                         
                                           $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                    
                    }
                else{
                    $i = 0;
                }

                      
                       ?>
          </div>
          </a>
          <div class="card-body">
                <h5 class="card-title"><?=$post['title']?></h5>
                <p class="card-text">
                    <?=$text?>...
                 </p> 
                  <p class="card-text">
                          <small class="text-muted"><?=$post['data']?> 
                              <p>
                                  <?php if($post['type'] == "open" && $pr_cookie == "user" && $user_can == true):?>
                                        <a class="conntect_a" style="color:#0060c6;" id="<?=$post['id']?>">
                                            <?=$i?> <i class="fas fa-user-plus"></i>
                                        </a>
                                   <?php endif;?>
                                   <?php
                                       $count_comments = $Select_t->get_num_rows_where('comments','id_post',$post['id']);
                                    ?>
                                    <!--<i class="far fa-eye mr-1 ml-2"></i>89-->
                                    <i class="fas fa-comments mr-1 ml-2"></i><?= $count_comments ?>
                              </p>
                      </small>
                  </p>

                <form action="/" method="post" style="display: inline-block;">
                       <?php
              
             $pieces_area = explode(" ", trim($post['tags']));
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
              do
                                        {
              
              ?> 
                      <!--<button class="btn color-block text-white b-r mb-2"><?=$pieces_area[$i]?></button>-->
                      <input class="btn color-block text-white b-r mb-2" type='submit' name='submit_post' value='<?=$pieces_area[$i]?>' />
                <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                      
                       ?>
                       </form>
            
                 
                  <button type="button" class="btn btn-primary dropdown-toggle mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em;"><i class="fas fa-share"></i></button>
    <div class="dropdown-menu">
     <div class="social" data-url="http://onlinesborka.mcdir.ru/post_p.php?post_id=<?=$post['id']?>" data-title="<?=$text?>">
      <a class="dropdown-item" data-id="fb"><i class="fab fa-facebook pr-1"></i>Facebook</a>
      <a class="dropdown-item" data-id="tw"><i class="fab fa-twitter pr-1"></i>Twitter</a>
      <a class="dropdown-item" data-id="vk"><i class="fab fa-vk pr-1"></i>Вконтакте</a>
      <!--<a class="dropdown-item" data-id="gp"><i class="fab fa-google-plus pr-1"></i>Google+</a>-->
      <a class="dropdown-item" data-id="ok"><i class="fab fa-odnoklassniki pr-1"></i>ОК</a>
        </div>
    </div>
        <br>
        <div id="<?=$post['id']?>" class="end-posts">
         <?php if($pr_cookie == "admin"): ?>
                <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#delete_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-primary text-center update_post" data-toggle="modal" data-target="#update_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-pen"></i>
                </button>
         <?php endif; ?>
         <?php if($pr_cookie == "admin" || $teachers_can == true): ?>
               <?php if($post['type'] == "open"): ?>
                <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#close_achivka_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-hourglass-end"></i>
                </button>
                <?php endif; ?>
         <?php endif; ?>
                  <?php if($pr_cookie == "admin" || $teachers_can == true): ?>
               <?php if(!empty($post['user_connect']) && $post['type'] != "open"): ?>
               <!-- <button type="button" class="btn btn-primary text-center select_edit_user" data-toggle="modal" data-target="#edit_user_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-user-edit"></i>
                </button>-->
                 <!--<a href="edit_user.php?post_id=<?=$post['id']?>">
                      <button type="button" class="btn btn-primary text-center" style="border-radius:50%; cursor: pointer;">
                      <i class="fas fa-user-edit"></i>
                    </button>
                </a>-->
                <button type="button" data-toggle="modal" data-target="#score_achivka_modal" class="btn btn-primary text-center score-button" style="border-radius:50%; cursor: pointer;">
                      <i class="fas fa-user-edit"></i>
                    </button>
                <?php endif; ?>
         <?php endif; ?>
                 </div>
                 <?php if($pr_cookie == "admin" && !empty($info_prepod['Name'])): ?>
                     <small>Добавил(а) <?=$info_prepod['Name']?></small>
                 <?php endif;?>
          </div>
        </div>
         
        </div>
            
            
            
            
            
            
            
            
            
            
            <?php else:?>
            
             <div class="col-lg-5 mb-5">
             <a href="post_p.php?post_id=<?=$post['id']?>">
            <div class="card shadow">
          <div class='single-item'>
              <!-- <iframe class="card-img-top" src="https://www.youtube.com/embed/AcL0MeVZIxM" frameborder="0" allowfullscreen="" style="height:500px;">
</iframe>-->
               <?php
                $teachers_can = false;
                if(!empty($post['teacher'])){
                    if($post['teacher'] == 'admin'){
                        $FIO_predod = 'Админ';
                    }else{
                        $info_prepod = $Select_t->get_select_where_fetch_assoc('teatchers_anketa','login',$post['teacher']);
                        $FIO_predod = $info_prepod['Name'];
                    }
                }
    if($pr_cookie == "teacher"){
        
    
    
    $teachers_arr = $Select_t->get_select_where_fetch_assoc('img_post','id',$post['id']);
                
             $teachers_pieces =  explode(" ", $teachers_arr['teachers_ar']);  
                
             array_push($teachers_pieces, "apple");  
                
             $end_pieces_t = end($teachers_pieces);
                
             $i = 0;
                
             do{
                 
                 if($_COOKIE['login_teacher'] == $teachers_pieces[$i]){
                     $teachers_can = true;
                 }
                 
                 $i++;
                 if($i > 100){
                     break;
                 }
                 
             }while($teachers_pieces[$i]!=$end_pieces_t);
                
             }   
              
             $pieces_area = explode(" ", trim($post['img_min']));
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
              do
                                        {
              
              ?>
               
               
               
                <div><img src="<?=$pieces_area[$i]?>"></div>
    
                
                
                
                <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                
                
                if(!empty($post['user_connect'])){
                    
                
                
                 $pieces_area = explode(" ", $post['user_connect']);
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
                                    do
                                        {
                                        
                                         
                                           $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                    
                    }
                else{
                    $i = 0;
                }
                      
                       ?>
          </div>
          </a>
          <div class="card-body">
                <h5 class="card-title"><?=$post['title']?></h5>
                <p class="card-text">
                    <?=$text?>...
                 </p> 
                  <p class="card-text">
                          <small class="text-muted"><?=$post['data']?> 
                              <p>
                                  <?php if($post['type'] == "open" && $pr_cookie == "user"):?>
                                        <a class="conntect_a" style="color:#0060c6;" id="<?=$post['id']?>">
                                            <?=$i?> <i class="fas fa-user-plus"></i>
                                        </a>
                                   <?php endif;?>
                                   <?php
                                       $count_comments = $Select_t->get_num_rows_where('comments','id_post',$post['id']);
                                    ?>
                                    <!--<i class="far fa-eye mr-1 ml-2"></i>89-->
                                    <i class="fas fa-comments mr-1 ml-2"></i><?= $count_comments ?>
                              </p>
                      </small>
                  </p>

                <form action="/" method="post" style="display: inline-block;">
                       <?php
              
             $pieces_area = explode(" ", trim($post['tags']));
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
              do
                                        {
              
              ?> 
                      <!--<button class="btn color-block text-white b-r mb-2"><?=$pieces_area[$i]?></button>-->
                      <input class="btn color-block text-white b-r mb-2" type='submit' name='submit_post' value='<?=$pieces_area[$i]?>' />
                <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                      
                       ?>
                       </form>
            
                 
                  <button type="button" class="btn btn-primary dropdown-toggle mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em;"><i class="fas fa-share"></i></button>
    <div class="dropdown-menu">
     <div class="social" data-url="http://onlinesborka.mcdir.ru/post_p.php?post_id=<?=$post['id']?>" data-title="<?=$text?>">
      <a class="dropdown-item" data-id="fb"><i class="fab fa-facebook pr-1"></i>Facebook</a>
      <a class="dropdown-item" data-id="tw"><i class="fab fa-twitter pr-1"></i>Twitter</a>
      <a class="dropdown-item" data-id="vk"><i class="fab fa-vk pr-1"></i>Вконтакте</a>
      <!--<a class="dropdown-item" data-id="gp"><i class="fab fa-google-plus pr-1"></i>Google+</a>-->
      <a class="dropdown-item" data-id="ok"><i class="fab fa-odnoklassniki pr-1"></i>ОК</a>
        </div>
    </div>
        <br>
        <div id="<?=$post['id']?>" class="end-posts">
         <?php if($pr_cookie == "admin"): ?>
                <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#delete_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-primary text-center update_post" data-toggle="modal" data-target="#update_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-pen"></i>
                </button>
         <?php endif; ?>
         <?php if($pr_cookie == "admin" || $teachers_can == true): ?>
               <?php if($post['type'] == "open"): ?>
                <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#close_achivka_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-hourglass-end"></i>
                </button>
                <?php endif; ?>
         <?php endif; ?>
                  <?php if($pr_cookie == "admin" || $teachers_can == true): ?>
               <?php if(!empty($post['user_connect']) && $post['type'] != "open"): ?>
               <!-- <button type="button" class="btn btn-primary text-center select_edit_user" data-toggle="modal" data-target="#edit_user_modal" style="border-radius:50%; cursor: pointer;">
                  <i class="fas fa-user-edit"></i>
                </button>-->
                 <!--<a href="edit_user.php?post_id=<?=$post['id']?>">
                      <button type="button" class="btn btn-primary text-center" style="border-radius:50%; cursor: pointer;">
                      <i class="fas fa-user-edit"></i>
                    </button>
                </a>-->
                <button type="button" data-toggle="modal" data-target="#score_achivka_modal" class="btn btn-primary text-center score-button" style="border-radius:50%; cursor: pointer;">
                      <i class="fas fa-user-edit"></i>
                    </button>
                <?php endif; ?>
         <?php endif; ?>
                 </div>
                 <?php if($pr_cookie == "admin" && !empty($FIO_predod)): ?>
                     <small>Добавил(а) <?=$FIO_predod?></small>
                 <?php elseif($pr_cookie == "admin"):?>
                     <small>Добавил(а) Админ</small>
                 <?php endif;?>
          </div>
        </div>
         
          </div>
          <?php endif;?>
            <?php $ipost++?>
          <?php    endforeach;?>
          <?php
                if($ipost < 12){
                    $finish = true;
                }
        ?>
          
               <div class="col-12">
               
               <form action="/" method="POST">
              
            <p class="text-center font-size-arrow">
             <?php if($limit0 != 0):?>
            <button class="btn btn-primary btn-lg mr-3 b-r" id="minus" name="do_minus">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            </button>
            <?php endif;?>
            <?php if($finish == false):?>
            <button class="btn btn-primary btn-lg ml-3 b-r" id="plus" name="do_plus">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </button>
            <?php endif;?>
            </p>
            <?php if($limit0 != 0):?>
           <p class="text-center">
            <button class="btn btn-primary btn-lg mt-4 b-r" name="do_start">
            К началу
            </button>
            </p>
            <?php endif;?>
            </form>
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

	
	