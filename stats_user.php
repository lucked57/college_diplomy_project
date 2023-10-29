<?php
    include "include/pr_cookie.php";
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    $pr = new Proverka();

    $meta = $pr->proverka_input($_POST['meta']);


    $login_select = $pr->proverka_input($_POST['login_select']);

    


           $errors;    
                
                  
                        $posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                  
                        $arr = [];
            
                  
                        $return;
                  
               
               if($pr_cookie != "user" && $pr_cookie != "teacher"){
                   $errors = 'У вас нету прав доступа';
               }
                else{
                    
                    
                    if(!empty($login_select)){
                        $login = $login_select;
                    }
                    else{
                        $login = $_COOKIE['login'];
                    }
                    
                    
                    
                    $Anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$login);
                    $FIO = $Anketa['FIO'];
                    $Groupe_name = $Anketa['Group_name'];
                }

                
                    
                    
                  
            if(empty($errors)){
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                   $i = 1;
                
                
                
                
                if($meta == "stats"){
                    
                
                 foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                              
                                              
                        
                  
                  

                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                  
                  
                             
                                              
                       }
                    
                    }
                
                

                    
                    
                    }
                    elseif($meta == "for_year"){
                        
                        
                        
                        
                        
                        
                        
                        
                        foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                                    $now = new DateTime();
                                    $now->format('Y-m-d H:i:s');    // MySQL datetime format
                                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                                    $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }               
                                              
                        
                  
                        if( ($year == $current_year-1 && $current_month <= $month) || ( $year == $current_year) ){

                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                        }
                  
                             
                                              
                       }
                    
                    }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    }
                
                
                elseif($meta == "for_sim"){
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                              
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                              $now = new DateTime();
                                 $now->format('Y-m-d H:i:s');    // MySQL datetime format
                                $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                                $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }
                  
                  
                                if($current_month >= 1 && $current_month <= 8){
                                    $simestr = 8;
                                }
                                else{
                                    $simestr = 12;
                                }              
                        
                  
                  
                            if( $year == $current_year && $simestr >= $month && $month <= 8){
                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                  
                            }
                             
                                              
                       }
                    
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
                
                
                elseif(!empty($login_select) && $meta == 'all'){
                    
                    
                    
                    $return .= '<button class="btn btn-primary b-r" id="stats_back"><i class="fas fa-long-arrow-alt-left"></i></button>
                    <h3 class="test-center">За все время</h3>
                    <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody>';
                    
                    
                    
                     foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                              
                                              
                        
                  
                  

                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login_select){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                  
                  
                             
                                              
                       }
                    
                    }
                    
                    
                    
                    $return .= ' </tbody>
            </table>
        </div>';
                    
                    
                    
                    
                   $return .= '<h3 class="test-center">За год</h3>
                    <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody>'; 
                    
                    $i = 1;
                    
                   foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                                    $now = new DateTime();
                                    $now->format('Y-m-d H:i:s');    // MySQL datetime format
                                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                                    $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }               
                                              
                        
                  
                        if( ($year == $current_year-1 && $current_month <= $month) || ( $year == $current_year) ){

                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login_select){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                        }
                  
                             
                                              
                       }
                    
                    }
                    
                    
                    
                    $return .= ' </tbody>
            </table>
        </div>';
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    $return .= '<h3 class="test-center">За семестр</h3>
                    <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody>'; 
                    
                    
                    
                    
                $i = 1;
                    
                  foreach($posts as $post){
                        
                    
                    
                    
                    
                        if(!empty($post['user_connect'])){
                            
                        
                                              
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                              $now = new DateTime();
                                 $now->format('Y-m-d H:i:s');    // MySQL datetime format
                                $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                                $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }
                  
                  
                                if($current_month >= 1 && $current_month <= 8){
                                    $simestr = 8;
                                }
                                else{
                                    $simestr = 12;
                                }              
                        
                  
                  
                            if( $year == $current_year && $simestr >= $month && $month <= 8){
                               $pieces_area = explode(" ", trim($post['user_connect']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    
                                    
                                    if($name == $login_select){
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post['category'].'</th>
                                              <th scope="col">'.$post['title'].'</th>
                                              <th scope="col">'.mb_substr($post['text'],0,219).'...</th>
                                              </tr>';
                                        
                                            $i++;
                                        

                                        
                                    }
                                    
                                    
                                    
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                  
                            }
                             
                                              
                       }
                    
                    }
                    
                    
                    
                    $return .= ' </tbody>
            </table>
        </div>';
                         
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
                
                
                
                
                    
                        
                        echo $return;
                
                
                }
                else{
                        echo $errors;
                }
                   