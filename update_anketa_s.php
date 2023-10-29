<?php
sleep(1.5);
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
        
             $Select_messenge = new Select();

      $table_name_messenge = 'Students_anketa';
    
        $pole_name_messenge = 'students_login';
    

      $posts_messenge = $Select_messenge->get_select_where_fetch_assoc($table_name_messenge,$pole_name_messenge,$login);
        
           //$post_messenge['Messenge'];
                   $i = 1;
                  
                 $massiv = array();
                if(!empty($posts_messenge)){
                    
                    $massiv[1] =  $posts_messenge['FIO'];
                    $massiv[2] =  $posts_messenge['Group_name'];
                    $massiv[3] =  $posts_messenge['year'];
                    $massiv[4] =  $posts_messenge['Adress'];
                

               
        
                echo json_encode($massiv);
                    }
        else{
            echo "empty";
        }
        
         }
else{
    echo $errors;
}

