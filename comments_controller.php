<?php
    include "include/pr_cookie.php";
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();

    $SQL = new SQL_native();

    $pr = new Proverka();

    $text = $pr->proverka_input($_POST['text']);

    $id = $pr->proverka_input($_POST['id']);

    if(empty(trim($text))){
        $errors = "пустой текст";
    }

    

    //$meta = $pr->proverka_input($_POST['meta']);

    if($pr_cookie != "admin" && $pr_cookie != "teacher" && $pr_cookie != "user"){
                   $errors = 'У вас нету прав доступа';
               }
            else{
                if($pr_cookie == "user"){
                    $login = $_COOKIE['login'];
                }
                else{
                    $login = $_COOKIE['login_'.$pr_cookie];
                }
            }



    if($pr_cookie == 'user'){
        $posts_messenge_s = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$login);
        if(empty($posts_messenge_s)){
            $errors = 'У вас не заполнена анкета';
        }
    }

    if($pr_cookie == 'teacher'){
        $posts_messenge_t = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
        if(empty($posts_messenge_t)){
            $errors = 'У вас не заполнена анкета';
        }
    }


    $achivka = $Select->get_select_where_fetch_all('img_post','id',$id);

    //$achivka = $SQL->query("select * from img_post where id = '$id'");

    

    if(empty($achivka)){
        $errors = "Ошибка обработки мероприятия, вероятнее всего, данное мероприятие было удалено";
    }


    if(empty($errors)){
        $SQL->query("insert into comments (text, id_post, login, rights) values ('$text','$id','$login','$pr_cookie')");
        //echo 'add';

    }
    else{
        echo $errors;
    }