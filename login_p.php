<?php
//sleep(1.9);
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;



    
    

     $errors;

    $pr = new Proverka();
            
    $login = $pr->proverka_input($data['login']);

    $password = $pr->proverka_input($data['pass']);

    $kod = $pr->proverka_input($data['kod']);


    $Select = new Select();

    $Delete = new Delete();

    $Update = new Update();





    if(iconv_strlen($login) > 40){
       $errors = "Слишком большой логин";
    }

    if(iconv_strlen($password) > 40){
        $errors = "Слишком большой пароль";
    }

    $rewrite_login = $Select->get_select_where_fetch_assoc('teachers','email',$login);

        if(!empty($rewrite_login)){
            $login = $rewrite_login['login'];
        }
        else{
            $rewrite_login = $Select->get_select_where_fetch_assoc('users','email',$login);
                if(!empty($rewrite_login)){
                    $login = $rewrite_login['login'];
                }
        }








    $userlogin = $Select->get_select_where_fetch_assoc('admins','login_admins',$login);
        
        if(!empty($userlogin)){//admin
            
            $err_s = $userlogin['errors'];
            
            $email = $userlogin['email_admins'];
            
            $pass_users = 'password_admins';
            
            $login_cookie = "login_admin";
            
            $code_cookie = "code_admin";
            
            $update_login = 'admins';
            
            $update_login_where = 'login_admins';
            
        }
        else{//teacher
            
            $userlogin = $Select->get_select_where_fetch_assoc('teachers','login',$login);
            
            if(!empty($userlogin)){
                
                $err_s = $userlogin['errors'];
                
                $email = $userlogin['email'];
                
                $pass_users = 'password';
                
                $login_cookie = "login_teacher";
            
                $code_cookie = "code_teacher";
                
                $update_login = 'teachers';
            
                $update_login_where = 'login';
                
                
            }
            else{//student
                
                $userlogin = $Select->get_select_where_fetch_assoc('users','login',$login);
                
                if(!empty($userlogin)){
                    
                    $err_s = $userlogin['errors'];
                    
                    $email = $userlogin['email'];
                    
                    $pass_users = 'password';
                    
                    $login_cookie = "login";
            
                    $code_cookie = "code";
                    
                    $update_login = 'users';
            
                    $update_login_where = 'login';
                    
                }
                else{
                    
                    $errors = 'Пользователь с таким логином не найден';
                    
                }
                
            }
            
        }


/*$data1 = array(                                                        ////////////////////////////////////////////////
            'secret' => "6LfvFHoUAAAAABiuKd7gPsITOyw70WBU8meAtWlc",
            'response' => $_POST["captcha"]
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data1));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        //var_dump($response);
      /* if ($response ['success'] != true) {
                echo 'no';
                } else {
                echo 'yes';
                }*/
     
   // $response = json_decode($response);                                   ////////////////////////////////////////////////


if($err_s >= 3){
    
    
    
        $code_s = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
                                
                                    if(empty($code_s)){
                                        
                                        $len = 5;

                                        $code = new Generate_code();

                                        $kod_s = $code->generate_code_for_cokie($len);



                                       $to  = "<".$email.">" ;

                                       $subject = "Подтверждение email для регистрации на сайте Портфолио Студентов ККМТ"; 

                                        $message = ' Ваш код для регистрации: '.$kod_s.'';

                                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                       mail($to, $subject, $message, $headers); 

                                        $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                                        
                                        $Insert_code = new Insert();

                                        $Insert_code->insert_values_two("code_sign","email","value",$email,$kod_sesi);

                                        
                                        
                                    }
    
    
    
            
            $errors = 'capcha';
            
        }

else{
    
    
    
    
        
  /* if ($response->score < 0.7 ) {             /////////////////////////////////////////////////////////////////
       
       
                            
                            

                          
                                
                                
                                $err_s++;
                            $Update->update_where($update_login,'errors', $err_s, $update_login_where, $login);
                                
                               $errors =  "Recaptcha посчитала вас роботом ".$response->score;
                                // var_dump($response);
                                
                            
       
       
       
                     
                }*/                             /////////////////////////////////////////////////////////////////
    
}

   


    
 

 


    if($err_s >= 3 && !empty(trim($kod)) && !empty(trim($login)) && $errors != 'Пользователь с таким логином не найден'){
            
                   $code_sign = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
            
                    if(password_verify($kod, $code_sign['value'])){
                        
                       $pass = $userlogin[$pass_users];//
                       $cookie_code = $userlogin['code'];
            
                        if(password_verify($password, $pass))
                                {

                                        $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);

            
                                        SetCookie($login_cookie, $login,time()+60*60*24*365*10);//
                                        SetCookie($code_cookie, $cookie_code,time()+60*60*24*365*10); //
                            
                                        $Update->update_where($update_login,'errors', 0, $update_login_where, $login);//
                            
                                        $Delete->get_delete_where('code_sign','email',$email);//

                                        echo 'Location';
                                }
                                else{
                                    echo 'Неверные данные';
                                }
                        
                    }
                    
                    else{
                        echo 'Неверные данные';
                    }
            
        }

    else{
        
    


    if(empty($errors)){ // если нету ошибок
        
        
        
        
   

    if($login=='admin' and !empty($password)) // для админа
    {
        $Select = new Select();
        $table_name = "admins";
        $pole_name = "login_admins";
        $admin_data = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login); // вывод полей из таблицы admins, где поле равно login_admins
        $cookie_code = $admin_data['code'];
        $pass_admin = $admin_data['password_admins'];
        
         if(password_verify($password, $pass_admin)) // если пароли совпадают, то создаем куки с логином и кодом
        {
            
            $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);
            
            SetCookie("login_admin", $login,time()+60*60*24*365*10);
            SetCookie("code_admin", $cookie_code,time()+60*60*24*365*10);
             
             $Update->update_where($update_login,'errors', 0, $update_login_where, $login);
            

            echo 'Location';
        }
        else{
                            
                            
                            
                            if($err_s >= 3){
                                
                                $code_s = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
                                
                                    if(empty($code_s)){
                                        
                                        $len = 5;

                                        $code = new Generate_code();

                                        $kod_s = $code->generate_code_for_cokie($len);



                                       $to  = "<".$email.">" ;

                                       $subject = "Подтверждение email для регистрации на сайте Портфолио Студентов ККМТ"; 

                                        $message = ' Ваш код для регистрации: '.$kod_s.'';

                                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                       mail($to, $subject, $message, $headers); 

                                        $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                                        
                                        $Insert_code = new Insert();

                                        $Insert_code->insert_values_two("code_sign","email","value",$email,$kod_sesi);

                                        echo 'capcha';
                                        
                                    }
                                
                                
                                
                            }
                            else{
                                
                                $err_s++;
                            $Update->update_where('admins','errors', $err_s, 'login_admins', $login);
                                
                                echo 'Неверные данные';
                                
                            }
        }
    }
   
            else{
                    $Select = new Select();
                    $table_name = "teachers";
                    $pole_name = "login";
                    $teatchers_login = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                
                  if(empty($teatchers_login)){ // для пользователя студента
                    
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
                         
                         $Update->update_where($update_login,'errors', 0, $update_login_where, $login);

                                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);


                                SetCookie("login", $login,time()+60*60*24*365*10);
                                SetCookie("code", $cookie_code,time()+60*60*24*365*10);

                                echo 'Location';
                        }
                        else{
                            
                           
                            
                            
                            if($err_s >= 3){
                                
                                $code_s = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
                                
                                    if(empty($code_s)){
                                        
                                        $len = 5;

                                        $code = new Generate_code();

                                        $kod_s = $code->generate_code_for_cokie($len);



                                       $to  = "<".$email.">" ;

                                       $subject = "Подтверждение email для регистрации на сайте Портфолио Студентов ККМТ"; 

                                        $message = ' Ваш код для регистрации: '.$kod_s.'';

                                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                       mail($to, $subject, $message, $headers); 

                                        $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                                        
                                        $Insert_code = new Insert();

                                        $Insert_code->insert_values_two("code_sign","email","value",$email,$kod_sesi);

                                        echo 'capcha';
                                        
                                    }
                                
                                
                                
                            }
                            else{
                                
                                 $err_s++;
                            $Update->update_where('users','errors', $err_s, 'login', $login);
                                
                                echo 'Неверные данные';
                                
                            }
                        }
                      
                  }
                
                else{ // для пользователя преподавателя
                    
                    $pass = $teatchers_login['password'];
                    $email = $teatchers_login['email'];
                    $id = $teatchers_login['id'];
                    $cookie_code = $teatchers_login['code'];
                    
                    
                         if(password_verify($password, $pass))
                        {
                             
                             $Update->update_where($update_login,'errors', 0, $update_login_where, $login);

                                $cookie_code = password_hash($cookie_code, PASSWORD_DEFAULT);


                                SetCookie("login_teacher", $login,time()+60*60*24*365*10);
                                SetCookie("code_teacher", $cookie_code,time()+60*60*24*365*10);

                         
                                echo 'Location';
                        }
                        else{
                            
                            
                            
                            
                            if($err_s >= 3){
                                
                                $code_s = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
                                
                                    if(empty($code_s)){
                                        
                                        $len = 5;

                                        $code = new Generate_code();

                                        $kod_s = $code->generate_code_for_cokie($len);



                                       $to  = "<".$email.">" ;

                                       $subject = "Подтверждение email для регистрации на сайте Портфолио Студентов ККМТ"; 

                                        $message = ' Ваш код для регистрации: '.$kod_s.'';

                                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                       mail($to, $subject, $message, $headers); 

                                        $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                                        
                                        $Insert_code = new Insert();

                                        $Insert_code->insert_values_two("code_sign","email","value",$email,$kod_sesi);

                                        echo 'capcha';
                                        
                                    }
                                
                                
                                
                            }
                            else{
                                
                                $err_s++;
                            $Update->update_where('teachers','errors', $err_s, 'login', $login);
                                
                                echo 'Неверные данные';
                                
                            }
                        }
                    
                }
            }
         }
else{ // отправка ошибок, если они есть
    echo $errors;
}
        
        }

