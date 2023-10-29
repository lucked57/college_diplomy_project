<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    include "include/pr_cookie.php";
    global $mysqli;

    if($pr_cookie != "admin" && $pr_cookie != 'teacher' && $pr_cookie != 'user'){
        exit();
    }
    if($pr_cookie == 'admin'){
       $login = $_COOKIE['login_admin'];
    }
    elseif($pr_cookie == 'teacher'){
        $login = $_COOKIE['login_teacher'];
    }
    elseif($pr_cookie == 'user'){
        $login = $_COOKIE['login'];
    }

    if(empty($_POST['id'])){
        $errors = 'empty';
    }

    $errors;

    $pr = new Proverka();

    $SQL = new SQL_native();

    //$id = $pr->proverka_input($_POST['id']); 


    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();


    if(empty($errors)){
    
      $Delete->get_delete_where('Messenge_for_users','login',$login);
        echo 'Запрос выполнен';
    }
    else{
        echo $errors;
    }

    



 
