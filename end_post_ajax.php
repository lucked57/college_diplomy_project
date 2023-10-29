<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';


    $Insert = new Insert();

    $Select = new Select();

    $Update = new Update();

    $pr = new Proverka();

    $id = $pr->proverka_input($_POST['id']); 

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
        
            if($teachers_can == false){
                    if($_COOKIE['login_teacher'] == $teachers_arr['teacher']){
                     $teachers_can = true;
                    }
                }
                
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
                
                $result = $Update->update_where('img_post','type', 'close', 'id', $id);
                
                
                //echo $result;
            }
            else{
                echo $errors;
            }
                
                
                
                
                
                
                
                
                    
                
   


