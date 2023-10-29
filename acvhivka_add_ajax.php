<?php
//sleep(1.5);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    



    $errors;

        $title = $mysqli->real_escape_string($data['title']);
        $text = $mysqli->real_escape_string($data['text']);
        $checked_img = $mysqli->real_escape_string($data['checked_img']);
        $checked_main = $mysqli->real_escape_string($data['checked_main']);
        $id = $data['id_add'];

$login = $_COOKIE['login'];

    if(iconv_strlen($title) > 40){
       $errors = "Слишком большой test";
    }
if(iconv_strlen($text) > 5000){
       $errors = "Слишком большой text";
    }
    if(empty($title) or empty($text) or empty($checked_img) or empty($checked_main) or empty($id) or empty($login)){
        $errors = "Есть пустые значение";
    }


     
    

    $Select_messenge = new Select();

      $table_name_messenge = 'users';
    
        $pole_name_messenge = 'login';
    

      $posts_messenge = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
    
                    $pass_pr = $posts_messenge['code'];

                    $email = $posts_messenge['email'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }
                    else{
                        $errors = "Проблемы с аккаунтом";
                    }


           $check_anketa = $Select_messenge->get_select_where_fetch_assoc('Students_anketa','students_login',$login);

        if(!empty($check_anketa)){
            $groupe_name = $check_anketa['Group_name'];
        }
        else{
            $errors = "Чтобы выкладывать достижения нужно заполнить анкету";
        }



    if(empty($errors)){
        
            if($checked_img == 'No'){
                
            $Update = new Update();
        
            $table_name = 'Students_achivka';
        
           // $Update->update_where($table_name,"students_login", $login, "id", $id);
        
            $Update->update_where_five('Students_achivka','students_login','title', 'text_achivka', 'check_achiv','Group_name', $login,$title,$text, $checked_main, $groupe_name,'id', $id[0]);
                
                $check_pr = $Select_messenge->get_select_where_fetch_assoc('Students_achivka','id',$id[0]);
                
                if(!empty($check_pr['check_achiv'])){
                    if($check_pr['check_achiv']=='Yes'){
                        echo 'Достижение успешно добавлено, оно будет видно на главной странице. Данные достижение можно изменить перейдя в соответсвующий пукнт меню или нажав на это сообщение';
                    }
                    else{
                        echo 'Достижение успешно добавлено, оно не будет видно на главной странице. Данные достижение можно изменить перейдя в соответсвующий пукнт меню или нажав на это сообщение';
                    }
                }
                else{
                    $errors = 'Что-то пошло не так';
                    echo $errors;
                }
                
            }
            else{
            $Insert = new Insert();
            $Insert->insert_values_five('Students_achivka','students_login','title','text_achivka','check_achiv','Group_name',$login,$title,$text,$checked_main,$groupe_name);
                echo 'Достижение успешно добавлено, оно не будет видно на главной странице. Данные достижение можно изменить перейдя в соответсвующий пукнт меню или нажав на это сообщение';
            }
        

 
        
         }
else{
    echo $errors;
}

