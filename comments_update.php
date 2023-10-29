<?php
    include "include/pr_cookie.php";
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();

    $Delete = new Delete();

    $SQL = new SQL_native();

    $pr = new Proverka();

    $id = $pr->proverka_input($_POST['id']);

    $id_post = $pr->proverka_input($_POST['id_post']);

    $meta = $pr->proverka_input($_POST['meta']);
        
    $answer = $pr->proverka_input($_POST['answer']);

    $text = $pr->proverka_input(trim($_POST['text_comment']));

    $login_replay = $pr->proverka_input(trim($_POST['login_replay']));

    if(empty(trim($id))){
        $errors = "пустой текст";
    }


    if($pr_cookie != "admin" && $pr_cookie != "teacher" && $pr_cookie != "user"){
   
               }
            else{
                if($pr_cookie == "user"){
                    $login = $_COOKIE['login'];
                }
                else{
                    $login = $_COOKIE['login_'.$pr_cookie];
                }
            }

    if($pr_cookie == 'user'){
        $posts_messenge_s = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$login);
        if(empty($posts_messenge_s)){
            $errors = 'У вас не заполнена анкета';
        }
    }

    if($pr_cookie == 'teacher'){
        $posts_messenge_t = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
        if(empty($posts_messenge_t)){
            $errors = 'У вас не заполнена анкета';
        }
    }

    if($meta == 'select'){
            $achivka = $Select->get_select_where_fetch_all('comments','id_post',$id); 

        if(empty($achivka)){
            $errors = "Комметариев пока что нет. Будьте первым!";
        }
    }


    

    $return;
    if(empty($errors)){
        
        
        if($meta == 'select'){
            
        
        
        
        foreach($achivka as $post){
            
            
            if(empty($post['answer'])){
                
            
            
            
            if($post['rights'] == 'teacher'){
                $users_info = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$post['login']);
                $FIO = $users_info['Name'];
                
                $img_av = $Select->get_select_where_fetch_assoc($post['rights'].'s','login',$post['login']);
                $img = $img_av['img'];
                
            }
            elseif($post['rights'] == 'user'){
                $users_info = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$post['login']);
                $FIO = $users_info['FIO'];
                
                $img_av = $Select->get_select_where_fetch_assoc($post['rights'].'s','login',$post['login']);
                $img = $img_av['img'];
            }
            elseif($post['rights'] == 'admin'){
                $img_av = $Select->get_select_where_fetch_assoc($post['rights'].'s','login_admins',$post['login']);
                $img = $img_av['img'];
                $FIO = 'admin';
            }
            
            if(empty($img)){
                $img = 'images/user_.png';
            }
            if(empty($FIO)){
                $FIO = 'не заполнена анкета';
            }
            
                
            
            
            
            
                if($login == $post['login'] || $pr_cookie == "admin"){
                    $return .= '<div class="messenge_box">
                        <p>'.$post['text'].'</p>
                        <a class="comments-icons text-white" value="'.$post['id'].'" answer="'.$post['id'].'" login="'.$post['login'].'">
                            <i class="fas fa-reply replay-comment" style="cursor:pointer;" data-toggle="modal" data-target="#answer-comment"></i>
                            <i class="fas fa-trash-alt ml-2 delete-comment" style="cursor:pointer;" data-toggle="modal" data-target="#delete-comment"></i>
                            <i class="fas fa-pen ml-2 change-comment" style="cursor:pointer;" data-toggle="modal" data-target="#change-comment"></i>
                        </a>

                        <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>

                    </div>';
                }
                elseif(!empty($login)){
                    $return .= '<div class="messenge_box">
                        <p>'.$post['text'].'</p>
                        <a class="comments-icons text-white" value="'.$post['id'].'" answer="'.$post['id'].'" login="'.$post['login'].'">
                            <i class="fas fa-reply replay-comment" style="cursor:pointer;" data-toggle="modal" data-target="#answer-comment"></i>
                        </a>
                       <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>
                    </div>';
                }
                else{
                    $return .= '<div class="messenge_box">
                        <p>'.$post['text'].'</p>
                       <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>
                    </div>';
                }
            

                }
 
                
                $comment_replay = $Select->get_select_where_fetch_all('comments','answer',$post['id']);
            
                if(!empty($comment_replay)){
                    
                
                
                
                
                
                
                
                
                foreach($comment_replay as $comment_anser){
                    
                    
                    if($comment_anser['rights'] == 'teacher'){
                $users_info = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$comment_anser['login']);
                $FIO = $users_info['Name'];
                
                $img_av = $Select->get_select_where_fetch_assoc($comment_anser['rights'].'s','login',$comment_anser['login']);
                $img = $img_av['img'];
                
                }
                elseif($comment_anser['rights'] == 'user'){
                    $users_info = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$comment_anser['login']);
                    $FIO = $users_info['FIO'];

                    $img_av = $Select->get_select_where_fetch_assoc($comment_anser['rights'].'s','login',$comment_anser['login']);
                    $img = $img_av['img'];
                }
                elseif($comment_anser['rights'] == 'admin'){
                    $img_av = $Select->get_select_where_fetch_assoc($comment_anser['rights'].'s','login_admins',$comment_anser['login']);
                    $img = $img_av['img'];
                    $FIO = 'admin';
                }

                if(empty($img)){
                    $img = 'images/user_.png';
                }
                if(empty($FIO)){
                    $FIO = 'не заполнена анкета';
                }
                    
                    
                     if($login == $comment_anser['login'] || $pr_cookie == "admin"){
                    $return .= '<div class="messenge_box ml-5">
                        <p>'.$comment_anser['text'].'</p>
                        <a class="comments-icons text-white" value="'.$comment_anser['id'].'" answer="'.$comment_anser['answer'].'" login="'.$comment_anser['login'].'">
                            <i class="fas fa-reply replay-comment" style="cursor:pointer;" data-toggle="modal" data-target="#answer-comment"></i>
                            <i class="fas fa-trash-alt ml-2 delete-comment" style="cursor:pointer;" data-toggle="modal" data-target="#delete-comment"></i>
                            <i class="fas fa-pen ml-2 change-comment" style="cursor:pointer;" data-toggle="modal" data-target="#change-comment"></i>
                        </a>

                        <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>

                    </div>';
                }
                elseif(!empty($login)){
                    $return .= '<div class="messenge_box ml-5">
                        <p>'.$comment_anser['text'].'</p>
                        <a class="comments-icons text-white" value="'.$comment_anser['id'].'" answer="'.$comment_anser['answer'].'" login="'.$comment_anser['login'].'">
                            <i class="fas fa-reply replay-comment" style="cursor:pointer;" data-toggle="modal" data-target="#answer-comment"></i>
                        </a>
                       <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>
                    </div>';
                }
                else{
                    $return .= '<div class="messenge_box ml-5">
                        <p>'.$comment_anser['text'].'</p>
                       <p class="text-right mt-2">
                        <img src="'.$img.'" alt="users" class="ml-md-2 rounded-circle" style="width:25px; height:25px; object-fit: cover;">
                        <small class="text-white">'.$FIO.'</small>
                        </p>
                    </div>';
                }
                    
                    
                }
                
                }
                
                
            
            
          
      }
        
        echo $return;
            }
        
        
        if($meta == 'delete'){
            
            $pr_login = $Select->get_select_where_fetch_assoc('comments','id',$id);
            
                if($pr_login['login'] == $login || $pr_cookie == "admin"){
                    
                    
                    $comment_replay = $Select->get_select_where_fetch_all('comments','answer',$id);
                    
                        if(!empty($comment_replay)){
                            $Delete->get_delete_where('comments','answer',$id);
                        }
                    
                    $Delete->get_delete_where('comments','id',$id);
                }
                else{
                    echo 'У вас нету прав на это действие';
                }
            
        }
        
        
        if($meta == "text-comment"){
            $pr_login = $Select->get_select_where_fetch_assoc('comments','id',$id);
            echo $pr_login['text'];
        }
        if($meta == "change"){
            
            $pr_login = $Select->get_select_where_fetch_assoc('comments','id',$id);
            
                if($pr_login['login'] == $login){
                    $Update->update_where('comments','text', $text, 'id',$id);
                }
                else{
                    echo 'У вас нету прав на это действие';
                }
  
        }
        if($meta == 'answer'){
            $answer;
            if(!empty(trim($text))){
                $SQL->query("insert into comments (text, id_post, login, rights, answer) values ('$text','$id_post','$login','$pr_cookie','$answer')");
                //$login_answer = $Select->get_select_where_fetch_assoc('comments','id',$answer);
                //$login_answer = $login_answer['login'];
                $SQL->query("insert into Messenge_for_users (login, Messenge, id_post, rights) values ('$login_replay','$text','$id_post','$pr_cookie')");
                //echo 'add';
            }
            else{
                echo 'Текст пустой';
            }
            
        }
        
        
        
        
        
        
        
        
    }
    else{
        echo $errors;
    }