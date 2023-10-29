<?php
//sleep(1.5);
require_once 'include/database_connect.php';
require_once 'include/classes.php';

if(isset($_POST['user_connect'])){
    
$Select = new Select();

$Delete = new Delete();

$Update = new Update();
    
$Insert = new Insert();


 include "include/pr_cookie.php";

    
    if($pr_cookie != "user"){
        $errors = 'Только пользователи-студенты могут присоединиться к мероприятиям';
    }

    if(empty(trim($_POST['id']))){
        $errors = 'Запрос пустой';
    }
    
    
        $pr = new Proverka();
            
        $id = $pr->proverka_input(trim($_POST['id']));
        
        $img_post = $Select->get_select_where_fetch_assoc('img_post','id',$id);
        
        $user_login = $Select->get_select_where_fetch_assoc('users','login',$_COOKIE['login']);
    
    
    
        
    //$errors = substr($_POST['id'], 1, iconv_strlen($_POST['id']));
    
     $pieces_area = explode(" ", $img_post['user_connect']);
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
                                    do
                                        {
                                        
                                            if($user_login['login'] == $pieces_area[$i]){
                                                $errors = "Вы уже присоединились";
                                            }
                                        
                                         
                                           $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
    
    
    

    if(empty($errors)){
        
        
        
        
        if(!empty($user_login['login'])){
            
            //$add_array = str_replace($_COOKIE['login'], "", $add_array);
            
            $count_post = $user_login['count_posts'] + 1;
            
            $add_array = trim($img_post['user_connect'].' '.$user_login['login']);
            
            $Update->update_where('img_post','user_connect', $add_array, 'id', $id);
            
            $Update->update_where('users','count_posts', $count_post, 'login', $user_login['login']);
            
            echo "Вы успешно присоединились!";
                
        }
        else{
            echo "Логин пустой";
        }
        
        
        
       // echo $img_post['id'].' '.$user_login['login'];
        
    }
    else{
        
        echo $errors;
        
    }
    
}

//var_dump($_POST);

?>

