<?php
sleep(1.5);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    $login = $data['login'];


      $errors;

        $login = $mysqli->real_escape_string($login);
     
        $Select_messenge = new Select();

      $table_name_messenge = 'users';
    
        $pole_name_messenge = 'login';
    

      $posts_messenge = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
    
                    $pass_pr = $posts_messenge['code'];

                    $email = $posts_messenge['email'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }
                    else{
                        $errors = "Проблемы с аккаунтом";
                    }

    if(iconv_strlen($login) > 40){
       $errors = "Слишком большой логин";
    }





    if(empty($errors)){
        
             
            $limit = $Select_messenge->get_num_rows_where('Students_achivka','students_login',$login);
             
            if($limit>10){
                echo 'У вас превышен лимит на кол-во достижений, их должо быть не больше 10, у вас '.$limit.'. Вы можете удалить не нужные достижения перейдя в соотвествующий пункт меню или нажав на это сообщение';
            }
            else{
                echo 'Okay';
            }

        
         }
else{
    echo $errors;
}

