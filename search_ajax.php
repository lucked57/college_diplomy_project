<?php
//sleep(0.3);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    $query = $data['query'];


$errors;

        $query = $mysqli->real_escape_string($query);
     
    

    if(iconv_strlen($query) > 100){
       $errors = "Слишком большой query";
    }

    if(empty(trim($query))){
        $errors = "пустой запрос";
    }

    if(empty($errors)){
        
             //echo "<a href='vk.com'><li>test ajax search li appdend</li></a>";
        
            $Select = new Users_info();
                
            $posts = $Select->get_search_users_ajax($query);
        
            if(!empty($posts)){
                $massiv = array();
        
            $i = 1;
        
            foreach($posts as $post){
                
                $massiv[$i] = "<a href='post_port.php?post_id=".$post['id']."'><li>".mb_substr($post['text_achivka'],0,78)."</li></a>";
                $i++;
            }
            
            echo json_encode($massiv);
        
        
            
            }
        
            else{
                echo 'empty';
            }
        
            
    
         }
else{
    echo $errors;
}

