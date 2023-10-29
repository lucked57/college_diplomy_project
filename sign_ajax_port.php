<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    $errors;

    $pr = new Proverka();

    $login = $pr->proverka_input($data['login']); 

    $password = $pr->proverka_input($data['pass']);

    $email = $pr->proverka_input($data['email']);

    $kod = $pr->proverka_input($data['kod']);


           if(iconv_strlen($login) > 20){
       $errors = "Слишком большой логин";
    }

    if(iconv_strlen($password) > 40){
        $errors = "Слишком большой пароль";
    }

     if(iconv_strlen($kod) > 20){
       $errors = "Слишком большой логин";
    }
  if(iconv_strlen($email) > 40){
       $errors = "Слишком большой логин";
    }


      $Select_again_code = new Select();
            
    $email_code_sign = $Select_again_code->get_select_where_fetch_assoc('code_sign','email',$email);

    if(!empty( $email_code_sign) && $kod!="send_again" && iconv_strlen($kod)!= 5){
        $errors = "На ваш email уже был отправлен код подтверждения, проверьте спам или нажмите отправить повторно";
    }

        
            
       


       
            
            
            
        

        $Proverka = new Proverka_us();
        
        $table_name = "users";
        
        $pole_name = "email";
        
        $proverka_email_us = $Proverka->proverka_users($table_name,$pole_name,$email);
            
        $table_name = "users";
        
        $pole_name = "login";
        
        $proverka_login_us = $Proverka->proverka_users($table_name,$pole_name,$login);
        
        
        $table_name = "Students_email";
        
        $pole_name = "email";
        
        $user_studensts = $Proverka->proverka_users($table_name,$pole_name,$email);
        
        
        
        
        
        $table_name = "teachers";
        
        $pole_name = "email";
        
        $proverka_email_teachers = $Proverka->proverka_users($table_name,$pole_name,$email);
        
        $table_name = "teachers";
        
        $pole_name = "login";
        
        $proverka_login_teachers = $Proverka->proverka_users($table_name,$pole_name,$login);
        
        
        
        $table_name = "teatchers_emails";
        
        $pole_name = "teacher_email";
        
        $teacher_email = $Proverka->proverka_users($table_name,$pole_name,$email);

         if(($proverka_email_us=='Уже есть') or ($proverka_login_us=='Уже есть'))
        {
            $errors = 'Пользователей с таким логином или email уже существует!';
        }

             if(($proverka_email_teachers=='Уже есть') or ($proverka_login_teachers=='Уже есть'))
        {
            $errors = 'Учетная запись преподавателя с таким логином или email уже существует!';
        }
        

    
    
    
          if(empty($errors)){
          
         if($kod!="send_again"){
        
        if(($proverka_email_us=='Уже есть') or ($proverka_login_us=='Уже есть'))
        {
            echo 'Пользователей с таким логином или email уже существует!';
        }

        elseif(($user_studensts == 'Еще нету') and ($teacher_email == 'Еще нету')){
            echo 'Вашего email нету в БД, обратитесь к админу!';
        }

        elseif ($teacher_email!='Уже есть')
        {
          
          $Select_email = new Select();
            
            $email_stud = $Select_email->get_select_where_fetch_assoc('Students_email','email',$email);
            
            $email = $email_stud['email'];
          
          
                      if($kod == "not visibale"){
                          
                          
                          
                          
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
                             
                    $password = password_hash($password, PASSWORD_DEFAULT);
        
                    $len=184;
                    
                    $code = new Generate_code();
                    
                  $code_for_cookie = $code->generate_code_for_cokie($len);
                    
                    
                    $insert_us = new Signup();
                    
                    $user_table = $insert_us->insert_users ($email,$login,$password,$code_for_cookie);
                    
                //$user_table = insert_users($link, $email,$login,$password,$code_for_cookie);
                    
                //   $Students_anketa =  insert_Students_anketa_login ($login);
                             
                             $Delete = new Delete();
                             
                             $Delete->get_delete_where($table_name,$pole_name,$email);
                    
               echo 'Вы успешно зарегистировались';
                    unset($_SESSION['kod']);
                    
                }
                else{
                    echo 'Ваш код не совпадает';
                }
                    
                    
                    
                    
                    
                }
            
            
            
            
            
        }
            
            if(($proverka_email_teachers=='Уже есть') or ($proverka_login_teachers=='Уже есть'))
        {
            echo 'Учетная запись преподавателя с таким логином или email уже существует!';
        }
             elseif($teacher_email=='Уже есть')
                 
                 
        {
               
          
          $Select_email_t = new Select();
            
            $email_teach = $Select_email_t->get_select_where_fetch_assoc('teatchers_emails','teacher_email',$email);
            
            $email = $email_teach['teacher_email'];
                 
                 
                      if($kod == "not visibale"){
                          
                          
                          
                          
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
                             
                    $password = password_hash($password, PASSWORD_DEFAULT);
        
                    $len=195;
                    
                    $code = new Generate_code();
                    
                  $code_for_cookie = $code->generate_code_for_cokie($len);
                    
                    
                   $insert_teachers = new Signup();
                    
                    $user_table = $insert_teachers->insert_teatchers($email,$login,$password,$code_for_cookie);
                    
                //$user_table = insert_users($link, $email,$login,$password,$code_for_cookie);
                    
                //   $Students_anketa =  insert_Students_anketa_login ($login);
                             
                             $Delete = new Delete();
                             
                             $Delete->get_delete_where($table_name,$pole_name,$email);
                    
               echo 'Вы успешно зарегистировались';
                   
                    
                }
                else{
                    echo 'Ваш код не совпадает';
                }
                    
                    
                    
                    
                    
                }
                 
                 
        }
            
            
            
            }
            
            
            
            
            
            
            
            
            else{
                
             if(($proverka_email_us=='Уже есть') or ($proverka_login_us=='Уже есть'))
        {
            $errors = 'Пользователей с таким логином или email уже существует!';
        }

        if(($user_studensts == 'Еще нету') and ($teacher_email == 'Еще нету')){
            $errors = 'Вашего email нету в БД, обратитесь к админу!';
        }
                
                
                if ($teacher_email!='Уже есть')
        {
            
            $Select_email = new Select();
            
            $email_stud = $Select_email->get_select_where_fetch_assoc('Students_email','email',$email);
            
            $email = $email_stud['email'];
                
                }
                
                if($teacher_email=='Уже есть')
                 
                 
        {
               
                 $Select_email_t = new Select();
            
            $email_teach = $Select_email_t->get_select_where_fetch_assoc('teatchers_emails','teacher_email',$email);
            
            $email = $email_teach['teacher_email'];
                    
                }
                
                if(empty($errors)){
                    
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
                
               // $_SESSION['kod'] = $kod_sesi;
                          
                          $Update_code = new Update();
                          
                          $table_name = "code_sign";
                          
                          $pole_name = "value";
                          
                          $pole_name_where = "email";
                          
                          $Update_code->update_where($table_name,$pole_name, $kod_sesi, $pole_name_where, $email);
                    
                    echo "again kod";
                }

                else{
                    echo $errors;


                }
                
                
            }
 }
else{
    echo $errors;
    
    
}


      
//echo $kod;
