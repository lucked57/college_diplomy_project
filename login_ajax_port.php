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

    if(iconv_strlen($login) > 20){
       $errors = "Слишком большой логин";
    }

    if(iconv_strlen($password) > 40){
        $errors = "Слишком большой пароль";
    }



    if(empty($errors)){
        
   

    if($login=='admin' and !empty($password))
    {
        $Select = new Select();
        $table_name = "admins";
        $pole_name = "login_admins";
        $admin_data = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
        $cookie_code = $admin_data['code'];
        $pass_admin = $admin_data['password_admins'];
        
         if(password_verify($password, $pass_admin))
        {
            
            $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);
            
            SetCookie("login_admin", $login,time()+60*60*24*365*10);
            SetCookie("code_admin", $cookie_code,time()+60*60*24*365*10);
            

            echo 'Location';
        }
        else{
            echo 'Неверные данные';
        }
    }
   
            else{
                    $Select = new Select();
                    $table_name = "teachers";
                    $pole_name = "login";
                    $teatchers_login = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                
                  if(empty($teatchers_login)){
                    
                    $Select_users = new Select();
                    $table_name = "users";
                    $pole_name = "login";
                    $userlogin = $Select_users->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                      
                    $pass = $userlogin['password'];
                    $email = $userlogin['email'];
                    $id = $userlogin['id'];
                    $cookie_code = $userlogin['code'];
                      
                     if(password_verify($password, $pass))
                        {

                                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);


                                SetCookie("login", $login,time()+60*60*24*365*10);
                                SetCookie("code", $cookie_code,time()+60*60*24*365*10);

                                echo 'Location';
                        }
                        else{
                            echo 'Неверные данные';
                        }
                      
                  }
                
                else{
                    
                    $pass = $teatchers_login['password'];
                    $email = $teatchers_login['email'];
                    $id = $teatchers_login['id'];
                    $cookie_code = $teatchers_login['code'];
                    
                    
                         if(password_verify($password, $pass))
                        {

                                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);


                                SetCookie("login_teacher", $login,time()+60*60*24*365*10);
                                SetCookie("code_teacher", $cookie_code,time()+60*60*24*365*10);

                         
                                echo 'Location';
                        }
                        else{
                            echo 'Неверные данные';
                        }
                    
                }
            }
         }
else{
    echo $errors;
}

