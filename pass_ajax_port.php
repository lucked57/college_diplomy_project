<?php
//sleep(1.9);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    
$errors;

     

    $pass_now = $mysqli->real_escape_string($data['pass_now']);
    
    $pass_change = $mysqli->real_escape_string($data['pass_change']);

    $pass_change_again = $mysqli->real_escape_string($data['pass_change_again']);

    if(iconv_strlen($pass_change) < 8){
       $errors = "Слишком короткий пароль";
    }

    if(iconv_strlen($pass_change) > 40){
        $errors = "Слишком большой пароль";
    }



    if(empty($errors)){
        
                    $login = $_COOKIE['login'];

                    $Select = new Select();
                    
                    $table_name = "users";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
        
                    $pass_pr_now = $pass_pr_array['password'];
        
                    if(password_verify($pass_now, $pass_pr_now)){
                        
                        $pass_change = password_hash($pass_change, PASSWORD_DEFAULT);
                        
                        $Update = new Update();
                        
                        $table_name = "users";
                        
                        $pole_name = "password";
                        
                        $pole_name_where = "login";
                        
                        $Update->update_where($table_name,$pole_name, $pass_change, $pole_name_where, $login);
                        
                        echo "Пароль успешно изменен";
                        
                    }
                       else{
                           
                           echo "Введенный пароль не совпадает с текущим, вы также можете сменить его с помощью email";
                           
                       }
        
    }
        
   


else{
    echo $errors;
}

