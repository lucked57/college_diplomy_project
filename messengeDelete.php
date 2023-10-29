<?php
//sleep(1.5);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    $login = $data['login'];


$errors;

        $login = $mysqli->real_escape_string($login);
     
    

    if(iconv_strlen($login) > 40){
       $errors = "Слишком большой логин";
    }





    if(empty($errors)){
        
        
        $delete = new Delete();
       
       $table_name = "Messenge_for_users";
       
       $pole_name = "login";
       
       $alert = $delete->get_delete_where($table_name,$pole_name,$login);
        
        echo "delete";

        
         }
else{
    echo $errors;
}

