<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
    require_once "include/pr_cookie.php";
    global $mysqli;
    $data=$_POST;



    
    

     $errors;

    $pr = new Proverka();
            
    $pass = $pr->proverka_input(trim($data['pass']));

    $pass_new = $pr->proverka_input(trim($data['pass_new']));


    $Select = new Select();

    $Delete = new Delete();

    $Update = new Update();

    $code = new Generate_code();


    if($pr_cookie != 'user' && $pr_cookie != 'teacher' && $pr_cookie != 'admin'){
        $errors = 'У вас нету права доступа к данной функции';
    }
    else{
        if($pr_cookie == 'user'){
            $login = $_COOKIE['login'];
        }
        elseif($pr_cookie == 'teacher'){
            $login = $_COOKIE['login_teacher'];
        }
    }

    if(empty($pass) || empty($pass_new)){
        $errors = 'Заполните все поля';
    }

    if($pass == $pass_new){
        $errors = 'Новый пароль не должен совпадать со старым';
    }


     if(iconv_strlen($pass_new) < 8){
       $errors = "Пароль должен содержать хотя бы 8 символов";
    }

    if(iconv_strlen($pass_new) > 40){
       $errors = "Пароль не должен содержать более 40 символов";
    }

    if(empty($errors)){
        
        
        
        if($pr_cookie == 'admin'){
            
            $pass_arr = $Select->get_select_where_fetch_assoc($pr_cookie.'s','login_admins','admin');
        
            if(password_verify($pass, $pass_arr['password_admins']))
                {

                  $pass_new = password_hash($pass_new, PASSWORD_DEFAULT);
                
                  $code_for_cookie = $code->generate_code_for_cokie(99);
                            
                  $Update->update_where($pr_cookie.'s','password_admins', $pass_new, 'login_admins', 'admin');
                
                  $Update->update_where($pr_cookie.'s','code', $code_for_cookie, 'login_admins','admin');

                  echo 'Пароль успешно был изменен';
                }
                else{
                    echo 'Неверный текущий пароль';
                }
        }
        else{
             $pass_arr = $Select->get_select_where_fetch_assoc($pr_cookie.'s','login',$login);
        
            if(password_verify($pass, $pass_arr['password']))
                {

                  $pass_new = password_hash($pass_new, PASSWORD_DEFAULT);
                
                  $code_for_cookie = $code->generate_code_for_cokie(99);
                            
                  $Update->update_where($pr_cookie.'s','password', $pass_new, 'login', $login);
                
                  $Update->update_where($pr_cookie.'s','code', $code_for_cookie, 'login', $login);

                  echo 'Пароль успешно был изменен';
                }
                else{
                    echo 'Неверный текущий пароль';
                }
        }
        
        
        
        
        
           
    }
    else
    {
        echo $errors;
    }