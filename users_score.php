<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    include "include/pr_cookie.php";
    global $mysqli;

    if($pr_cookie != "admin" && $pr_cookie != 'teacher'){
        exit();
    }
    if($pr_cookie == 'admin'){
       $this_login = $_COOKIE['login_admin'];
    }
    else{
        $this_login = $_COOKIE['login_teacher'];
    }

    $errors;

    $pr = new Proverka();

    $SQL = new SQL_native();

    $id = $pr->proverka_input($_POST['id']); 

    $meta = $pr->proverka_input($_POST['meta']);

    $array = $_POST['array'];

    $array_verify = $_POST['post_verify'];

    if(empty($id) || empty($meta)){
        $errors = "данные пустые".$id.' '.$meta;
    }


     /*if(iconv_strlen($email) > 5000 || iconv_strlen($option) > 40){
       $errors = "Слишком большой email";
    }*/

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();


    if(empty($errors)){
        
        if($meta == 'select'){
            $return;
            //$pieces_area[$i] $name['FIO']
            $posts = $Select->get_select_where_fetch_assoc('img_post','id',$id);
            $level = $posts['level'];
            $levels = $Select->get_select_where_fetch_assoc('levels','level',$level);
            $max = $levels['max'];
            if(!empty($posts['user_connect'])){
               $pieces_area = explode(" ", trim($posts['user_connect']));
                array_push($pieces_area, "apple");
                $end_pieces = end($pieces_area);
                $i = 0;
                    do{                                
                     $name = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$pieces_area[$i]);
                    
                        
            $return .= ' <div class="form-group row">
                <label class="col-sm-2 col-form-label">'.$name['FIO'].'</label>
                <div class="col-sm-10">
                  <input type="number" min="0" max="'.$max.'" step="1" class="form-control b-r input-score input-score'.$i.'" placeholder="Введите значение от 1 до '.$max.'" login="'.$pieces_area[$i].'">
                </div>
                   </div>';   
                        
                        $i++; 
                    }while($pieces_area[$i]!=$end_pieces); 
                echo $return;
            }
            
        }
         if($meta == 'score'){
             $level = $Select->get_select_where_fetch_assoc('img_post','id',$id);
             $max_level = $level['level'];
             $levels = $Select->get_select_where_fetch_assoc('levels','level',$max_level);
             $max = $levels['max'];
             $pr_post = $Select->get_select_where_fetch_assoc('users_score','id_post',$id);
             if(!empty($max) && empty($pr_post)){
                 $array = json_decode($array);
                 foreach($array as $arr){
                     $arr = $pr->proverka_input($arr);
                     $pieces_area = explode("!-----!", $arr);
                     $score = $pieces_area[0];
                     $login = $pieces_area[1];
                     if($score > $max){
                         $score = $max;
                     }
                     if(!empty($score) && !empty($login)){
                       $SQL->query("insert into users_score (id_post, user_login, login, score) values ('$id','$login','$this_login','$score')"); 
                         //echo 'После подтверждения админом данные будут добавлены';
                     }
                     else{
                         echo 'не удалось получить необходимые данные';
                     }
                     
                 }
                 echo 'После подтверждения админом данные будут добавлены';
             }
             else{
                 if(!empty($pr_post['login'])){
                     $fio_us = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$pr_post['login']);
                     if(!empty($fio_us)){
                         $FIO = $fio_us['Name'];
                     }
                     else{
                         $FIO = 'admin';
                     }
                     echo 'Наставник '.$FIO.' уже выстовил оценки';
                 }
                 else{
                   echo 'не удалось определить уровень';  
                 }
             }
         }
        if($meta == 'select_verify'){
            $users_score = $Select->get_select_where_fetch_all('users_score','verify','');
            
            if(!empty($users_score)){
                
            
            
            $arr = [];
            
            foreach($users_score as $score){
               $name = $score['id_post'];
                if(empty($arr[$name])){
                   $arr[$name] = $name;
                } 
            }
            
            foreach ($arr as $key => $val) {
                //$return .= $val;
                $post_info_one = $Select->get_select_where_fetch_assoc('users_score','id_post',$val);
                
                $FIO_teacher_s = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$post_info_one['login']);
                
                if(!empty($FIO_teacher_s)){
                    $FIO_teacher = $FIO_teacher_s['Name'];
                }
                else{
                    $FIO_teacher = 'admin';
                }
                $return .= '<p><i class="fas fa-graduation-cap"></i> Наставник: '.$FIO_teacher.'</p>';
                
                $post_info = $Select->get_select_where_fetch_all('users_score','id_post',$val);
                
                foreach($post_info as $info){
                    
                    $FIO_user = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['user_login']);
                    
                    $return .= '<p>'.$FIO_user['FIO'].' - '.$info['score'].' баллов</p>';
                }
                
                $return .= '
           <div class="form-group mt-1">
               
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                   <input id="id_checl'.$val.'" type="checkbox" value="'.$val.'" class="custom-control-input check_user_score">
                   <label class="custom-control-label" for="id_checl'.$val.'">Подтвердить</label>
                </div>
           </div>';
            }
            
            
            
            
            echo $return;
                }
                else{
                    echo 'Нету заявок';
                }
        }
        if($meta == 'verify'){
            if($pr_cookie != "admin"){
                    exit();
                }
            else{
                $array = json_decode($array_verify);
                foreach($array as $arr){
                     $arr = $pr->proverka_input($arr);
                     if(!empty($arr)){
                         $Update->update_where('users_score','verify', 'true', 'id_post', $arr);
                     }
                 }
            echo 'Запрос выполнен'; 
            }
        }
        
        
        if($meta == 'delete'){
            if($pr_cookie != "admin"){
                    exit();
                }
            else{
                $array = json_decode($array_verify);
                foreach($array as $arr){
                     $arr = $pr->proverka_input($arr);
                     if(!empty($arr)){
                         $Update->update_where('img_post','type', 'open', 'id', $arr);
                         $Delete->get_delete_where('users_score','id_post',$arr);
                     }
                 }
            echo 'Запрос выполнен'; 
            }
        }
        
    }
    else{
        echo $errors;
    }

    



 
