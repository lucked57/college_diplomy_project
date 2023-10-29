<?php
//sleep(1.9);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    
$errors;

    $Select = new Select();

    $pr = new Proverka();

    $FIO = $pr->proverka_input($data['FIO']); 

    $pieces_area = explode(" ", $FIO);
    if(empty($pieces_area[0]) || empty($pieces_area[1]) || empty($pieces_area[2])){
        $errors = 'Неправильный формат ФИО, пример: Иван Иванович Иванов';
    }
    if(!empty($pieces_area[3])){
        $errors = 'Неправильный формат ФИО, пример: Иван Иванович Иванов';
    }

    $Gpoupe_name_seacrh = $pr->proverka_input($data['group']);

    $pr_groupe_kod = $Select->get_select_where_fetch_assoc('Group_name','kod',$Gpoupe_name_seacrh);

    if(empty($pr_groupe_kod)){
        $errors = "Группы с таким кодом не найдено";
    }
    else{
        $Gpoupe_name = $pr_groupe_kod['name'];
    }

    //$Gpoupe_name = $pr->proverka_input($data['group']);

    //$Gpoupe_name = mb_strtoupper($Gpoupe_name, 'UTF-8');

    $year = $pr->proverka_input($data['year']);

    $update_t = $pr->proverka_input($data['update']);

    $adress = $pr->proverka_input($data['adress']);

     

  /*  $FIO = $mysqli->real_escape_string($data['FIO']);
    
    $Gpoupe_name = $mysqli->real_escape_string($data['group']);

    $Gpoupe_name = mb_strtoupper($Gpoupe_name, 'UTF-8');

    $update_t = $mysqli->real_escape_string($data['update']);

    $year = $mysqli->real_escape_string($data['year']);

    $adress = $mysqli->real_escape_string($data['adress']);*/


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
        $errors = "Группа с таким кодом не найдена";
    }

    if(empty($year)){
        $errors = "group year";
    }

    if(empty($adress)){
        $errors = "adress empty";
    }

    $Select_messenge5 = new Select();

    

      $posts_messenge5 = $Select_messenge5->get_select_where_fetch_assoc('users','login',$_COOKIE['login']);
    
                    $pass_pr = $posts_messenge5['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
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
        
                    $login = $_COOKIE['login'];
                 
                    if($update_t == "true"){
                        

                        
                        if(!empty($select_update)){
                            
                            $Students = new Students_anketa();
                            
                            $alert = $Students->update_anketa_s($Gpoupe_name,$FIO,$login,$year,$adress);
                          
                          $update_gr = new Update();
                            
                           $update_gr->update_where('Students_achivka','Group_name', $Gpoupe_name, 'students_login', $login);
                            
                            echo $alert;
                            
                        }
                        else{
                            echo 'Данной группы нету в бд';
                        }
                        
                    }
                    else{
                        
                          if(!empty($select_update)){


                            $Students = new Students_anketa();

                            $alert = $Students->insert_anketa_s($Gpoupe_name,$FIO,$login,$year,$adress);
                              
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

