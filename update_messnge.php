<?php
//sleep(1.9);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    $login = $data['login'];


$errors;

        $login = $mysqli->real_escape_string($login);
     
    

    if(iconv_strlen($login) > 40){
       $errors = "Слишком большой логин";
    }


$Select_messenge5 = new Select();

    

      $posts_messenge5 = $Select_messenge5->get_select_where_fetch_assoc('users','login',$_COOKIE['login']);
    
                    $pass_pr = $posts_messenge5['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }
                    else{
                        $errors = "Проблемы с аккаунтом";
                    }


    if(empty($errors)){
        
              $select = new Select();
                
                $table_name = "Messenge_for_users";
                
                $pole_name = "login";
                
                $notice = $select->get_num_rows_where($table_name,$pole_name,$login);
        
                echo $notice;
    
         }
else{
    echo $errors;
}

