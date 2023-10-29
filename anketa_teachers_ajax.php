<?php
//sleep(1.9);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    
$errors;

$pr = new Proverka();

    $FIO = $pr->proverka_input($data['FIO']); 

    $pieces_area = explode(" ", $FIO);
    if(empty($pieces_area[0]) || empty($pieces_area[1]) || empty($pieces_area[2])){
        $errors = 'Неправильный формат ФИО, пример: Иван Иванович Иванов';
    }
    if(!empty($pieces_area[3])){
        $errors = 'Неправильный формат ФИО, пример: Иван Иванович Иванов';
    }

    $Gpoupe_name = $pr->proverka_input($data['group']);

    $phone = $pr->proverka_input($data['phone']);

    $update_t = $pr->proverka_input($data['update']);

    $Gpoupe_name = mb_strtoupper($Gpoupe_name, 'UTF-8');

     

   /* $FIO = $mysqli->real_escape_string($data['FIO']);
    
    $Gpoupe_name = $mysqli->real_escape_string($data['group']);

   $phone = $mysqli->real_escape_string($data['phone']);

    $update_t = $mysqli->real_escape_string($data['update']);*/


    if(iconv_strlen($FIO) > 40){
       $errors = "Слишком большой FIO";
    }

    if(iconv_strlen($Gpoupe_name) > 40){
        $errors = "Слишком большой Group";
    }

    if(empty($FIO)){
        $errors = "FIO empty";
    }

    if(empty($Gpoupe_name)){
        $errors = "group empty";
    }

if(empty($phone)){
            $errors = "phone empty";
        }

$Select_messenge5 = new Select();

$posts_messenge5 = $Select_messenge5->get_select_where_fetch_assoc('teachers','login',$_COOKIE['login_teacher']);
    
                    $pass_pr = $posts_messenge5['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_teacher'])){
                        
                        $pr_cookie = "user";
                        
                    }
                    else{
                        $errors = "Проблемы с аккаунтом";
                    }

    if(empty($errors)){
        
                $table_name = "Group_name";
                $pole_name = "name";

                $select_update = new Select();
                $select_update = $select_update->get_num_rows_where($table_name,$pole_name,$Gpoupe_name);
        
                    $login = $_COOKIE['login_teacher'];
                 
                    if($update_t == "true"){
                        

                        
                        if(!empty($select_update)){
                            
                            $Teachers_update = new Teachers_anketa();
                            
                            $alert = $Teachers_update->update_anketa($Gpoupe_name,$FIO,$phone,$login);
                            
                            echo $alert;
                            
                        }
                        else{
                            echo 'Данной группы нету в бд';
                        }
                        
                    }
                    else{
                        
                          if(!empty($select_update)){


                            $Teachers = new Teachers_anketa();

                            $alert = $Teachers->insert_anketa($Gpoupe_name,$FIO,$phone,$login);
                              
                            echo "анкета успешно заполнена";

                        }
                        else{
                             echo 'Данной группы нету в бд';
                        }
                        
                    }
                   
        
    }
        
   


else{
    echo $errors;
}

