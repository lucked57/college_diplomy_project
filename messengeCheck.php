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
        
             $Select_messenge = new Select();

      $table_name_messenge = 'Messenge_for_users';
    
        $pole_name_messenge = 'login';
    

      $posts_messenge = $Select_messenge->get_select_where_fetch_all($table_name_messenge,$pole_name_messenge,$login);
        
           //$post_messenge['Messenge'];
                   $i = 1;
                  
                 $massiv = array();
                if(!empty($posts_messenge)){
                    
                
                foreach ($posts_messenge as $post_messenge){
                    
                    $massiv[$i] = $post_messenge['Messenge'];
                    $i++;
                    
                }
        
               
        
                echo json_encode($massiv);
                    }
        else{
            echo "empty";
        }
        
         }
else{
    echo $errors;
}

