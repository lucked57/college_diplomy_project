<?php
//sleep(1.9);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    

$errors;

 $email = $data['email'];

    $email = $mysqli->real_escape_string($email);

        $kod = $data['kod'];

        $kod = $mysqli->real_escape_string($kod);



           if(iconv_strlen($email) > 40){
       $errors = "Слишком большой email";
    }


        
        $Proverka = new Proverka_us();
        
        
        $table_name = "users";
        
        $pole_name = "email";
        
        $proverka_email_us = $Proverka->proverka_users($table_name,$pole_name,$email);
        
        
        $table_name = "teachers";
        
        $pole_name = "email";
        
        $proverka_email_pr = $Proverka->proverka_users($table_name,$pole_name,$email);
        
        
        if(($proverka_email_us == 'Еще нету') and ($proverka_email_pr == 'Еще нету')){
            $errors = "email ".$email." нету среди зарегестрированных пользователей";
        }
        

if(empty($errors)){
    
    
    if($kod!="send_again"){

         if($proverka_email_us == 'Уже есть'){
             
             if($kod == "not visibale"){
                 
                  $len = 5;
                          
                          $code = new Generate_code();
                
                 $kod_s = $code->generate_code_for_cokie($len);
                          
                  //$kod_s = "12345";     
               
                 $to  = "<".$email.">" ;

           $subject = "Подтверждение email для восстановления пароля на сайте Портфолио Студентов ККМТ"; 

            $message = ' Ваш код для восстановления: '.$kod_s.'';

            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                
               // $_SESSION['kod'] = $kod_sesi;
                          
                          $Insert_code = new Insert();
                          
                          $table_name = "code_sign";
                          
                          $pole_name = "email";
                          
                          $pole_name_two = "value";
                          
                          $Insert_code->insert_values_two($table_name,$pole_name,$pole_name_two,$email,$kod_sesi);
                          
                          echo "visibale";
                 
             }
             elseif(iconv_strlen($kod)==5){
                 
                 
                 $Select = new Select();
                    
                    $table_name = "code_sign";
                    
                    $pole_name = "email";
                    
                    $code_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$email);
                    
                    $code_pr = $code_pr_array['value'];
                 
                 
                    if (password_verify($kod, $code_pr)){
                        
                        $Select = new Select();
                    
                    $table_name = "users";
                    
                    $pole_name = "email";
                    
                    $login_users_array= $Select->get_select_where_fetch_assoc($table_name,$pole_name,$email);
                    
                    $login_users = $login_users_array['login'];
                        
                        
                        
                        
                        $table_name = "code_sign";
                    
                        $pole_name = "email";
                        
                        $Delete = new Delete();
                             
                        $Delete->get_delete_where($table_name,$pole_name,$email);
                        
                        
                        
                         $len = 8;
                          
                          $code = new Generate_code();
                
                        $pass_users = $code->generate_code_for_cokie($len);
                        
                        
                    
                            $to  = "<".$email.">" ;

                   $subject = "Новый пароль"; 

                    $message = ' Ваш новый пароль: '.$pass_users.' от аккаунта '.$login_users.'';

                    $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

                   mail($to, $subject, $message, $headers); 

                        $pass_users = password_hash($pass_users, PASSWORD_DEFAULT);
                        
                         $Update_code = new Update();
                          
                          $table_name = "users";
                          
                          $pole_name = "password";
                          
                          $pole_name_where = "email";
                          
                          $Update_code->update_where($table_name,$pole_name, $pass_users, $pole_name_where, $email);
                        
                        echo ' Новый пароль от аккаунта '.$login_users.' выслан на ваш email';
                        
                    }
                 
                 
                  else{
                    echo 'Ваш код не совпадает';
                }
                 
                 
             }
                 
             
             
         }
        
        
        
        
        
        
        
        
        
          if($proverka_email_pr == 'Уже есть'){
             
             if($kod == "not visibale"){
                 
                 
                 
                 
            
                 
                  $len = 5;
                          
                          $code = new Generate_code();
                
                 $kod_s = $code->generate_code_for_cokie($len);
                          
       
               
                 $to  = "<".$email.">" ;

           $subject = "Подтверждение email для восстановления пароля на сайте Портфолио Студентов ККМТ"; 

            $message = ' Ваш код для восстановления: '.$kod_s.'';

            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                
               // $_SESSION['kod'] = $kod_sesi;
                          
                          $Insert_code = new Insert();
                          
                          $table_name = "code_sign";
                          
                          $pole_name = "email";
                          
                          $pole_name_two = "value";
                          
                          $Insert_code->insert_values_two($table_name,$pole_name,$pole_name_two,$email,$kod_sesi);
                          
                          echo "visibale";
                 
             }
             elseif(iconv_strlen($kod)==5){
                 
                 
                 $Select = new Select();
                    
                    $table_name = "code_sign";
                    
                    $pole_name = "email";
                    
                    $code_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$email);
                    
                    $code_pr = $code_pr_array['value'];
                 
                 
                    if (password_verify($kod, $code_pr)){
                        
                        $Select = new Select();
                    
                    $table_name = "teachers";
                    
                    $pole_name = "email";
                    
                    $login_users_array= $Select->get_select_where_fetch_assoc($table_name,$pole_name,$email);
                    
                    $login_users = $login_users_array['login'];
                        
                        
                        
                        
                        $table_name = "code_sign";
                    
                        $pole_name = "email";
                        
                        $Delete = new Delete();
                             
                        $Delete->get_delete_where($table_name,$pole_name,$email);
                        
                        
                        
                         $len = 8;
                          
                          $code = new Generate_code();
                
                        $pass_users = $code->generate_code_for_cokie($len);
                        
                        
                        
                    
                            $to  = "<".$email.">" ;

                   $subject = "Новый пароль"; 
                        
                        
                       

                    $message = ' Ваш новый пароль: '.$pass_users.' от аккаунта '.$login_users.'';

                    $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

                   mail($to, $subject, $message, $headers); 

                        $pass_users = password_hash($pass_users, PASSWORD_DEFAULT);
                        
                         $Update_code = new Update();
                          
                          $table_name = "teachers";
                          
                          $pole_name = "password";
                          
                          $pole_name_where = "email";
                          
                          $Update_code->update_where($table_name,$pole_name, $pass_users, $pole_name_where, $email);
                        
                        echo ' Новый пароль от аккаунта '.$login_users.' выслан на ваш email';
                        
                    }
                 
                 
                  else{
                    echo 'Ваш код не совпадает';
                }
                 
                 
             }
                 
                 
             }
             
         }
    

        
    
    else{
        
        $len = 5;
                          
                          $code = new Generate_code();
                
                 $kod_s = $code->generate_code_for_cokie($len);
                          
                       //$kod_s = "12345";
               
                 $to  = "<".$email.">" ;

           $subject = "Подтверждение email для регистрации на сайте Портфолио Студентов ККМТ"; 

            $message = ' Ваш повторный код для регистрации: '.$kod_s.'';

            $headers = 'From: KKMT-Portfolio@example.com' . "\r\n" .
            'Reply-To: KKMT-Portfolio@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $message, $headers); 
                
                $kod_sesi = password_hash($kod_s, PASSWORD_DEFAULT);
                
               // $_SESSION['kod'] = $kod_sesi;
                          
                          $Update_code = new Update();
                          
                          $table_name = "code_sign";
                          
                          $pole_name = "value";
                          
                          $pole_name_where = "email";
                          
                          $Update_code->update_where($table_name,$pole_name, $kod_sesi, $pole_name_where, $email);
                    
                    echo "again kod";
        
        
    }
    
    

}

else{
    
    echo $errors;
    
}