<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    include "include/pr_cookie.php";
    global $mysqli;

    if($pr_cookie != "admin"){
        exit();
    }

    $errors;

    $pr = new Proverka();

    $id = $pr->proverka_input($_POST['id']); 

    $meta = $pr->proverka_input($_POST['meta']);


    if(empty($id)){
        $errors = "данные пустые".$id;
    }


     /*if(iconv_strlen($email) > 5000 || iconv_strlen($option) > 40){
       $errors = "Слишком большой email";
    }*/

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();


    

    if(empty($errors)){
        
        if($meta == 'delete'){
            $Delete->get_delete_where('category','id',$id);
            echo 'удалено';
        }
        if($meta == 'add'){
            $Insert->insert_values('category','Name',$id);
            echo 'добавлено';
        }
        

        
    }
    else{
        echo $errors;
    }

    



 
