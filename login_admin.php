<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    
    global $mysqli;
    $data=$_POST;


    $login = $data['login'];

    $errors;

    $login = $mysqli->real_escape_string($login); 
    
    $password = $data['pass'];

    $password  = $mysqli->real_escape_string($password);

    $Select = new Select();

    $userlogin = $Select->get_select_where_fetch_assoc('admin','email',$login);

        if(empty($userlogin)){
            $errors = 'Пользователь с логином '.$login.' не найден';
        }

        if(empty($errors)){
            
            $pass = $userlogin['pass'];
            $cookie_code = $userlogin['code'];
            
                if(password_verify($password, $pass))
                        {

                                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);


                                SetCookie("admin", $login);
                                SetCookie("code", $cookie_code);

                                echo 'Location';
                        }
                        else{
                            echo 'Неверные данные';
                        }
        }
        else{
                echo $errors;
            }
        //echo 'Location';
?>
