<?php
    include "include/pr_cookie.php";
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();

    $pr = new Proverka();

    //$meta = $pr->proverka_input($_POST['meta']);

    if($pr_cookie != "teacher"){
                   $errors = 'У вас нету прав доступа';
               }
                else{
                    $login = $_COOKIE['login_teacher'];
                    $Anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
                    $FIO = $Anketa['Name'];
                    $Groupe_name = $Anketa['Group_name'];
                }


    if(empty($errors)){
        $students = $Select->get_select_where_fetch_all('Students_anketa','Group_name',$Groupe_name);
        
        $return;
        
        $return .= '<div class="list-group" id="groupe_teach">
                  <p href="#" class="list-group-item list-group-item-action active">
                    '.$Groupe_name.'
                  </p>';
        
            foreach($students as $student_info){
                $return .= '<a class="list-group-item list-group-item-action student-group" value="'.$student_info['students_login'].'">'.$student_info['FIO'].'</a>';
                
            }
        
        $return .= '</div>';
        
        echo $return;
    }
    else{
        echo $errors;
    }