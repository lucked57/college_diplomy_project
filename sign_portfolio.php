<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

sleep(1);
global $mysqli;
$data=$_POST;

    $errors;

    $pr = new Proverka();

    $email = $pr->proverka_input($data['email']); 

    $kod = $pr->proverka_input($data['kod']);

    $kod_again = $pr->proverka_input($data['kod_again']);

    $kod_groupe = $pr->proverka_input($data['kod_groupe']);



     if(iconv_strlen($kod) > 20){
       $errors = "Слишком большой kod";
    }
  if(iconv_strlen($email) > 40){
       $errors = "Слишком большой email";
    }

    $Select = new Select();

    $Delete = new Delete();

    $Update = new Update();

    $Insert = new Insert();

    $code = new Generate_code();

    $search_t_new = $Select->get_select_where_fetch_assoc('teatchers_emails','teacher_email',$email);

    //$search_us_new = $Select->get_select_where_fetch_assoc('Students_email','email',$email);


    if(!empty($kod_groupe)){
        $pr_groupe_kod = $Select->get_select_where_fetch_assoc('Group_name','kod',$kod_groupe);
    }

    



    if(empty($search_t_new)  && empty($pr_groupe_kod)){
        if(empty($pr_groupe_kod)){
            $errors = 'Группа с данным кодом не найдена';
        }
        else{
            $errors = $email.' не найден';
        }
        
    }

    if($kod != "send_again" && $kod == "not visibale" && $kod_again != "send_account_again"){
       $kod_send = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
        
            if(!empty($kod_send)){
                $errors = "На ваш email уже был отправлен код подтверждения, проверьте спам или нажмите отправить повторно";
            }
    }
    
    $pr_email_us = $Select->get_select_where_fetch_assoc('users','email',$email);

    $pr_email_tea = $Select->get_select_where_fetch_assoc('teachers','email',$email);

    if((!empty($pr_email_tea) || !empty($pr_email_us)) && $kod_again != "send_account_again"){
        $errors = 'Уже есть пользователь с данным email';
    }

    if(empty($errors)){
        
        
        
        if($kod!="send_again"){
            
            
              $search_us_in = $Select->get_select_where_fetch_assoc('users','email',$email);
            
                    $search_t_in = $Select->get_select_where_fetch_assoc('teachers','email',$email);
                    
                    if(empty($search_t_in)  && empty($search_us_in)){

                        if(!empty($pr_groupe_kod)){
                            $table = 'users';
                        }
                        if(!empty($search_t_new)){
                            $table = 'teachers';
                        }
            
            
            
            $code_email_pr = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
            
            
                if(empty($code_email_pr)){ //Если пользователь еще не доказал, что это его почта
                    
                    $kod_sesi = $code->generate_code_for_cokie(5);
                    
                    $to  = "<".$email.">" ;

                        $subject = "Код подтверждения на сайте Портфолио Студентов ККМТ"; 

                        /*$message = '
                            <html>
                            <head>
                              <title>Ваш код:</title>
                            </head>
                            <body>
                              <p>Код: '.$kod_sesi.';</p> 
                            </body>
                            </html>
                            ';*/
                        $message = 'Ваш код: '.$kod_sesi;
                    
                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    
                       /* $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();*/
        

                        mail($to, $subject, $message, $headers);
                    
                    
                    $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);
                    
                    $in_table_email = $Insert->insert_values_two("code_sign","email","value",$email,$kod_sesi);
                    
                    
                    echo "На ваш email выслан код подтверждения";
                    
                }
                else{
                    
                    
                    
                    
                    if(iconv_strlen($kod)==5){
                        
                        
                        $code_pr_array = $Select->get_select_where_fetch_assoc("code_sign","email",$email);
                    
                        $code_pr = $code_pr_array['value'];
                        
                        if (password_verify($kod, $code_pr)){
                    
                    
                    
                    
                  
                    
                        $i = 0;
                        
                        do {
                            $i++;
                            $login = substr($email, 0, 5);
                            $login = $login . $code->generate_code_for_cokie(5);
                            $pr_login = $Select->get_select_where_fetch_assoc($table,"login",$login);
                            
                            if($i>100){
                                break;
                            }
                            
                        } while (!empty($pr_login));
                        

                        $pass = $code->generate_code_for_cokie(8);

                        $to  = "<".$email.">" ;

                        $subject = "Данные аккаунта для входа на сайте Портфолио Студентов ККМТ"; 

                        /*$message = '
                            <html>
                            <head>
                              <title>Ваши данные:</title>
                            </head>
                            <body>
                              <p>Логин: '.$email.';</p> 
                              <p>Пароль: '.$pass.' </p>
                            </body>
                            </html>
                            ';

                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Content-type: text/html; charset=UTF-8' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();*/
                            
                        $message = 'Логин: '.$email.'; Пароль: '.$pass;
                        
                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers); 

                        $code_for_cookie = $code->generate_code_for_cokie(99);

                        $pass = password_hash($pass, PASSWORD_DEFAULT);

                        $in_table = $Insert->insert_values_four($table,'login','password','email','code',$login,$pass,$email,$code_for_cookie);
                            
                        $Delete->get_delete_where('code_sign','email',$email);

                        echo "Готово! На ваш email высланы данные для входа";
                    
                        
                    }
                    else{
                       echo "Код не совпадает";
                    }
                        
                    }
                    else{
                        "Код должен состоять из 5 символов";
                    }
                    
                }
                            }
                    else{
                        
                        
                        if($kod_again != "send_account_again"){
                            echo "Аккаунт с данным email уже активирован ".$kod_again;
                        }
                        else{
                            
                $kod_send = $Select->get_select_where_fetch_assoc('code_sign','email',$email);
                            
                            if(!empty($kod_send)){
                                
                                if(password_verify($kod, $kod_send['value'])){
                                    
                                    $search_us_new = $Select->get_select_where_fetch_assoc('users','email',$email);
                                    
                                    $search_t_new = $Select->get_select_where_fetch_assoc('teachers','email',$email);
                                    
                                    if(!empty($search_us_new)){
                                        $table = 'users';
                                    }
                                    if(!empty($search_t_new)){
                                        $table = 'teachers';
                                    }
                                    //echo $table.' '.$email;
                                    //echo 'test557799';
                                    
                                if(!empty($table)){
                                    
                                
                                    
                                    $account_info = $Select->get_select_where_fetch_assoc($table,'email',$email);
                                    
                                    $login = $account_info['login'];
                                    
                                    
                                    
                                    $pass = $code->generate_code_for_cokie(8);

                                    $to  = "<".$email.">" ;

                                    $subject = "Данные аккаунта для входа на сайте Портфолио Студентов ККМТ"; 

                                   /* $message = '
                                        <html>
                                        <head>
                                          <title>Ваши данные:</title>
                                        </head>
                                        <body>
                                          <p>Логин: '.$email.';</p> 
                                          <p>Пароль: '.$pass.' </p>
                                        </body>
                                        </html>
                                        ';

                                    $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                    'Content-type: text/html; charset=UTF-8' . "\r\n" .
                                    'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();*/

                                    $message = 'Логин: '.$email.'; Пароль: '.$pass;

                                    $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                    'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();

                                    mail($to, $subject, $message, $headers); 

                                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                                    $Update->update_where($table,'password', $pass, 'email', $email);

                                    $Delete->get_delete_where('code_sign','email',$email);
                                    
                                    
                                    echo "Данные повторно аккаунта отравлены на вашу почту ";
                                    }
                                    else{
                                        echo 'Данный пользователей не найден';
                                    }
                                }
                                else{
                                    echo "Введенный вами код не совпадает";
                                }
                                
                                
                            }
                            else{
                                
                                $Delete->get_delete_where('code_sign','email',$email);
            
                                $kod_sesi = $code->generate_code_for_cokie(5);

                                        $to  = "<".$email.">" ;

                                            $subject = "Код подтверждения на сайте Портфолио Студентов ККМТ"; 

                                            /*$message = '
                                                <html>
                                                <head>
                                                  <title>Ваш код:</title>
                                                </head>
                                                <body>
                                                  <p>Код: '.$kod_sesi.';</p> 
                                                </body>
                                                </html>
                                                ';*/
                                            $message = 'Ваш код: '.$kod_sesi;

                                            /*$headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                                            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                            'X-Mailer: PHP/' . phpversion();*/
                                            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                                            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                                            'X-Mailer: PHP/' . phpversion();

                                            mail($to, $subject, $message, $headers);


                                        $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);

                                        $in_table_email = $Insert->insert_values_two("code_sign","email","value",$email,$kod_sesi);
                                
                                echo "На ваш email выслан код подтверждения";
                            }
                            
                        }
                        
                    }
            
            
            
           
            
        }
        else{
            
            $Delete->get_delete_where('code_sign','email',$email);
            
            $kod_sesi = $code->generate_code_for_cokie(5);
                    
                    $to  = "<".$email.">" ;

                        $subject = "Код подтверждения на сайте Портфолио Студентов ККМТ"; 

                        /*$message = '
                            <html>
                            <head>
                              <title>Ваш код:</title>
                            </head>
                            <body>
                              <p>Код: '.$kod_sesi.';</p> 
                            </body>
                            </html>
                            ';

                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();*/
            
                        $message = 'Ваш код: '.$kod_sesi;
            
            
                        $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
                        'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                    
                    
                    $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);
                    
                    $in_table_email = $Insert->insert_values_two("code_sign","email","value",$email,$kod_sesi);
            
            echo "Код подтверждения отправлен повторно";

        }
        
    }
    else{
        echo $errors;
    }
 
