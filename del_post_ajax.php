<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';


    $Insert = new Insert();

    $Select = new Select();

    $Update = new Update();

    $Delete = new Delete();

    $teachers_can = false;


    if($pr_cookie == "teacher"){
        
    
    
    $teachers_arr = $Select->get_select_where_fetch_assoc('img_post','id',$post['id']);
                
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
    
    $pr = new Proverka();

    $id = $pr->proverka_input($_POST['id']); 

    if(empty($id)){
        $errors = 'id empty';
    }

    $del_post = $Select->get_select_where_fetch_assoc('img_post','id',$id);

    if(empty($del_post)){
        $errors = 'пост с таким id не найден';
    }
    
        
    
    
            
        
            if(empty($errors)){
                
                
                
                    $teachers_pieces =  explode(" ", $del_post['user_connect']);  
                
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
                
                
                
                
                
                
                
                
                
                
                $abc_put = './';
                
                
                 $pieces_area = explode(" ", $del_post['img_min']);
                 array_push($pieces_area, "apple");
                 $end_pieces = end($pieces_area);
                 $i = 0;

                  do{
                        unlink($abc_put.$pieces_area[$i]);
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                
                
                
                
                 $pieces_area = explode(" ", $del_post['img_full']);
                 array_push($pieces_area, "apple");
                 $end_pieces = end($pieces_area);
                 $i = 0;

                  do{
                        unlink($abc_put.$pieces_area[$i]);
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                
                
                
                
                $Delete->get_delete_where('comments','id_post',$id);

                $alert = $Delete->get_delete_where('img_post','id',$id);
                
                
                //echo $result;
            }
            else{
                echo $errors;
            }
                

