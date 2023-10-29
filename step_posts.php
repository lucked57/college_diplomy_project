<?php
//sleep(0.5);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
global $mysqli;
$data=$_POST;

    
    $limit_0 = $data['limit_0'];
    $limit_1 = $data['limit_1'];


$errors;


     





    if(empty($errors)){
        
             $Select = new Users_info();

        mb_internal_encoding("UTF-8");
        
        $posts_messenge= $Select->select_users_limit($limit_0,$limit_1);
        
           //$post_messenge['Messenge'];
                   $i = 1;
                  
                 $massiv = array();
                if(!empty($posts_messenge)){
                    foreach($posts_messenge as $post){
                        
                    $massiv[$i] = '<a id="block-href" class="block-href" href="post_port.php?post_id='.$post['id'].'"><div class="blockpost"><img  src="'.$post['img'].'"><p>'.mb_substr($post['text_achivka'],0,219).'...</p><p>'.$post['FIO'].'</p></div></a>';
          
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
