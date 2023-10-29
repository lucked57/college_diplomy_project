<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';


    $Insert = new Insert();

    $Select = new Select();

    $Update = new Update();

    $pr = new Proverka();

    $post_id = $_GET['post_id']; 

    if (!is_numeric($post_id))    exit(); 

    $id = $pr->proverka_input($post_id); 

    $teachers_can = false;


    if($pr_cookie == "teacher"){
        
    
    
    $teachers_arr = $Select->get_select_where_fetch_assoc('img_post','id',$id);
                
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





    if($pr_cookie != "admin" && $teachers_can == false){
        exit();
    }

    $errors;

    $alert;

    if(empty($id)){
        $errors = 'id empty';
    }


    
        
    
    
            
        
            if(empty($errors)){
                $posts = $Select->get_select_where_fetch_assoc('img_post','id',$id);
                
                if(isset($_POST['do_add'])){
                    
                    
                    
                    
                    
                       $teachers_pieces =  explode(" ", $posts['user_connect']);  
                
                     array_push($teachers_pieces, "apple");  

                     $end_pieces_t = end($teachers_pieces);

                     $i = 0;

                     do{

                         $posts = $Select->get_select_where_fetch_assoc('users','login',$teachers_pieces[$i]);
                         
                         $count_post = $posts['count_posts'] - 1;
                         
                         $Update->update_where('users','count_posts', $count_post, 'login', $teachers_pieces[$i]);

                         $i++;
                         if($i > 1000){
                             break;
                         }

                     }while($teachers_pieces[$i]!=$end_pieces_t);
                    
                    
                    
                    
                    
                    
                    if(!empty($_POST['formDoor'])){
                         $teachers_massiv = $_POST['formDoor'];

                        $N = count($teachers_massiv);

                        for($ji=0; $ji <= $N; $ji++){
                            
                            
                            $posts = $Select->get_select_where_fetch_assoc('users','login',$teachers_massiv[$ji]);
                         
                             $count_post = $posts['count_posts'] + 1;

                             $Update->update_where('users','count_posts', $count_post, 'login', $teachers_massiv[$ji]);


                            $teacher_logins_add .= ' '.$teachers_massiv[$ji];



                        }

                        $Update->update_where('img_post','user_connect', trim($teacher_logins_add), 'id', $id);

                        $alert_info = 'Данные обновлены';
                    }
                    else{
                        $alert_info = 'Ничего не выбрано';
                    }
                    
                    
                   
                }
             
            }
            else{
                echo $errors;
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
	
	
	
        
        
	
            
	
	
	<div class="container-fluid">
	
            <div class="row justify-content-around mt-5 pt-5">


                    <div class="col-md-4">
                        <form action="/edit_user.php?post_id=<?=$id?>" method="POST" enctype="multipart/form-data"> 
                            <div class="card">
            
                              <div class="card-body">
              
                                
                                <?php if(!empty($errors)):?>
                                
                                    <p><?=$errors?></p>
                     
                                <?php endif;?>
                                
                                <?php if(!empty($alert_info)):?>
                                
                                    <p><?=$alert_info?></p>
                     
                                <?php endif;?>
                                
                                
                               
                                
                              </div>
                            </div>
                            
                  
                                  
                                  
                                  <div class="form-group mt-1">
                                        
                                          <?php if(!empty($posts['user_connect'])): ?>
                                              
                                              
                                              <?php 
                                                $pieces_area = explode(" ", trim($posts['user_connect']));
                                                 array_push($pieces_area, "apple");
                                                 $end_pieces = end($pieces_area);
                                                 $i = 0;
                                                 do{
                                                     
                                                     $name = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$pieces_area[$i]);
                                                     
                                                     ?>
                                              
                                               <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                <input type="checkbox" name="formDoor[]" value="<?=$pieces_area[$i]?>" class="custom-control-input" id="<?=$i?>">
                                                <?php if(!empty($name['FIO'])): ?>
                                                <label class="custom-control-label" for="<?=$i?>"><?=$name['FIO']?></label>
                                                <?php else: ?>
                                                <label class="custom-control-label" for="<?=$i?>"><?=$pieces_area[$i]?> (не заполнена анкета)</label>
                                                <?php endif; ?>
                                              </div>
                                              
                                              <?php $i++; }while($pieces_area[$i]!=$end_pieces); ?>
                                              
                                            <?php endif; ?>
                                   
                                  </div>
                            <button  class="btn btn-primary btn-block" type="submit" name="do_add">Обновить</button>
                       </form>
                    </div>



          </div>
	</div>
	
	

	
	
	 <script
  src="js/main_src.js"></script>
	
	<script>
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
                
                
                
                
                
                
                
                    
                
   


