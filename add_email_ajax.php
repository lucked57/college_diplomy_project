<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    include "include/pr_cookie.php";
    global $mysqli;

    sleep(1);

    if($pr_cookie != "admin"){
        $errors = 'Вы не админ';
        exit();
    }

    $errors;

    $pr = new Proverka();

    $email = $pr->proverka_input($_POST['email']); 

    $option = $pr->proverka_input($_POST['select']);


    if(empty(trim($email))){
        $errors = 'пустые данные';
    }


     if(iconv_strlen($email) > 5000 || iconv_strlen($option) > 40){
       $errors = "Слишком большой email";
    }

    if( $option == "users"){
        $table = "Students_email";
        $pole_name = "email";
    }
    elseif( $option == "teachers"){
        $table = "teatchers_emails";
        $pole_name = "teacher_email";
    }
    elseif( $option == "groupe"){
        $table = "Group_name";
        $pole_name = "name";
    }
    else{
        $errors = "Неправильный select";
    }

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    


    if(empty($errors)){
        
        
            if($option == 'groupe'){
                
                $groupe_kode = $Select->get_select_where_fetch_all('Group_name','kod','');
                
                //$groupe_kode = $Select->get_fetch_all('Group_name');
                
                if(!empty($groupe_kode)){
                        foreach($groupe_kode as $generate){

                        $Update->update_where('Group_name','kod', $generate['name'].substr(uniqid(), 7), 'id', $generate['id']);
                    }
                }
                
                
                
                
                
                
                
                                        $pieces_area = explode(";", $email);
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                           if(!empty(trim($pieces_area[$i]))){
                                             do
                                                {    
                                                 
                                                 
                                                    $pieces_area[$i] = $pr->proverka_input(trim($pieces_area[$i]));
                                                 
                                                    if(!empty($pieces_area[$i])){
                                                        //$Insert->insert_values($table,$pole_name,$pieces_area[$i]); 
                    $Insert->insert_values_two('Group_name','name','kod',$pieces_area[$i],$pieces_area[$i].substr(uniqid(), 7));
                                                    }

                                                           


                                                    $i++;
                                                }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        echo "add";
                                        }
        
        
            }
        else{
            
        
        
        
        
             $pieces_area = explode(";", $email);
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
        
        do{
            
            $email_add = trim($pieces_area[$i]);
            
            $pr_email_us = $Select->get_select_where_fetch_assoc("Students_email","email",$email_add);

            $pr_email_t = $Select->get_select_where_fetch_assoc("teatchers_emails","teacher_email",$email_add);

            if( empty($pr_email_us) && empty($pr_email_t)){
                if (filter_var($email_add, FILTER_VALIDATE_EMAIL)) {
                    $Insert->insert_values($table,$pole_name,$email_add);
                } else {
                    $errors_email .= '; '.$email_add;
                }
                
            }
            else{
                $errors_email .= '; '.$email_add;
            }
            
            
            
           
            $i++;
                if($i>100){
                    break;
                }
        }while($pieces_area[$i] != $end_pieces);
        
        
        //$Insert->insert_values($table,$pole_name,$email);
        
        //$pr_email = $Select->get_select_where_fetch_assoc($table,$pole_name,$email);
        

            echo "email'ы успешно добавлен".$errors_email;

        }
        
    }
    else{
        echo $errors;
    }

    



 
