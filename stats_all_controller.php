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

    $meta = $pr->proverka_input($_POST['meta']);

    $sel_pr = $pr->proverka_input($_POST['select']);

    $SQL = new SQL_native();

   /* if($pr_cookie != "teacher"){
                   $errors = 'У вас нету прав доступа';
               }
                else{
                    $login = $_COOKIE['login_teacher'];
                    $Anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
                    $FIO = $Anketa['Name'];
                    $Groupe_name = $Anketa['Group_name'];
                }*/


    if(empty($errors)){
        
        
        if($meta == 'group'){
            
        
            $students = $Select->get_fetch_all('Group_name');

            $return .= '<div class="list-group">
                      <p href="#" class="list-group-item list-group-item-action active">
                        '.$Groupe_name.'
                      </p>';
            foreach($students as $student_info){
                    $return .= '<a class="list-group-item list-group-item-action group-all" value="'.$student_info['name'].'">'.$student_info['name'].'</a>';
                }

            $return .= '</div>';

            echo $return;
        
            
        }
        
        
        if($meta == 'students'){
            
        
            $students = $Select->get_select_where_fetch_all('Students_anketa','Group_name',$sel_pr);
        
            $return .= '<button class="btn btn-primary b-r" id="stats_back_group"><i class="fas fa-long-arrow-alt-left"></i></button>
            <div class="list-group" id="groupe_teach">
                  <p href="#" class="list-group-item list-group-item-action active">
                    '.$Groupe_name.'
                  </p>';
        
            foreach($students as $student_info){
                $return .= '<a class="list-group-item list-group-item-action student-group" value="'.$student_info['students_login'].'">'.$student_info['FIO'].'</a>';
                
            }
        
            $return .= '</div>';

            echo $return;
        
            
        }  
        if($meta == 'stats'){
             $login_select = $sel_pr;
            
            
            $posts = $SQL->query_all("select * from users_score where user_login = '$login_select' AND verify = 'true'");
        
            //$posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                  
            $arr = [];
            
                  
            $return;
            
            if(!empty($posts)){
                $login = $login_select;
                $Anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$login);
                $FIO = $Anketa['FIO'];
                $Groupe_name = $Anketa['Group_name'];
                
                $i = 1;
                
                  $return .= '<button class="btn btn-primary b-r" id="stats_back_students"><i class="fas fa-long-arrow-alt-left"></i></button>
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
                  <th scope="col">Кол-во баллов</th>
                </tr>
              </thead>
              <tbody>';
                    
                    
                    
                     foreach($posts as $post){
                        
                            
                        
                                    $post_ac = $Select->get_select_where_fetch_assoc('img_post','id',$post['id_post']);
                                              
                        
                  
                  

                            
                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post_ac['category'].'</th>
                                              <th scope="col">'.$post_ac['title'].'</th>
                                              <th scope="col">'.mb_substr($post_ac['text'],0,219).'...</th>
                                              <th scope="col">'.$post['score'].'</th>
                                              </tr>';
                                        
                                 
                            
                  
                  
                             
                                   $i++;           
                       
                    
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
                  <th scope="col">Кол-во баллов</th>
                </tr>
              </thead>
              <tbody>'; 
                    
                    $i = 1;
                    
                   foreach($posts as $post){
                        
                    
                    $post_ac = $Select->get_select_where_fetch_assoc('img_post','id',$post['id_post']);
                    
                    
                      
                            
                        
                                $year = substr($post_ac['data'], 6);
                  
                                $month = substr($post_ac['data'], 3, 2);
                  
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

                                        
                                        
                                        
                                            $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post_ac['category'].'</th>
                                              <th scope="col">'.$post_ac['title'].'</th>
                                              <th scope="col">'.mb_substr($post_ac['text'],0,219).'...</th>
                                              <th scope="col">'.$post['score'].'</th>
                                              </tr>';
                                        
                                          
                                        

                                        
                                    
                                    
                                    
                               $i++;     

                            
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
                  <th scope="col">Кол-во баллов</th>
                </tr>
              </thead>
              <tbody>'; 
                    
                    
                    
                    
                $i = 1;
                    
                  foreach($posts as $post){
                        
                    
                    $post_ac = $Select->get_select_where_fetch_assoc('img_post','id',$post['id_post']);
                    
                    
             
                            
                        
                                              
                                $year = substr($post_ac['data'], 6);
                  
                                $month = substr($post_ac['data'], 3, 2);
                  
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

                                    
                                    
                                   $return  .='  <tr>
                                              <th scope="col">'.$i.'</th>
                                              <th scope="col">'.$FIO.'</th>
                                              <th scope="col">'.$post_ac['category'].'</th>
                                              <th scope="col">'.$post_ac['title'].'</th>
                                              <th scope="col">'.mb_substr($post_ac['text'],0,219).'...</th>
                                              <th scope="col">'.$post['score'].'</th>
                                              </tr>';

                            
                                $i++;
                            }
                             
                                              
                         
                    
                    }
                    
                    
                    
                    $return .= ' </tbody>
            </table>
        </div>';
        }
            else{
                $return = '<button class="btn btn-primary b-r" id="stats_back_students"><i class="fas fa-long-arrow-alt-left"></i></button> <p>У данного пользователя еще нету мероприятий</p>';
            }
            echo $return;
        }
    }
    else{
        echo $errors;
    }