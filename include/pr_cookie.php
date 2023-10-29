<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
?>
	<?php 
    if(isset($_COOKIE['login_admin'])){
        
                    $login = $_COOKIE['login_admin'];

                    $Select = new Select();
                    
                    $table_name = "admins";
                    
                    $pole_name = "login_admins";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_admin'])){
                        
                        $pr_cookie = "admin";
                        
                    }
    }
    elseif(isset($_COOKIE['login'])){
        
                    $login = $_COOKIE['login'];

                    $Select = new Select();
                    
                    $table_name = "users";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                        $Select_messenge = new Select();
    
                        $posts_messenge_s = $Select_messenge->get_select_where_fetch_assoc('Students_anketa','students_login',$login);
                        
                    }
        
    }
    elseif(isset($_COOKIE['login_teacher'])){

                    $login = $_COOKIE['login_teacher'];

                    $Select = new Select();
                    
                    $table_name = "teachers";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_teacher'])){
                        
                        $pr_cookie = "teacher";
                        
                        $Select_messenge = new Select();
    
                        $posts_messenge_t = $Select_messenge->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
                        
                    }

    }

     $Select = new Select();


    if(!empty($pr_cookie)){
        
       if($pr_cookie == 'admin'){
            $login_add = 'login_admins';
            $login = 'admin';
        }
        elseif($pr_cookie == 'user'){
            $login_add = 'login';
            $login = $_COOKIE['login'];
        }
        elseif($pr_cookie == 'teacher'){
            $login_add = 'login';
            $login = $_COOKIE['login_teacher'];
        }

        $count_messenge = $Select->get_num_rows_where('Messenge_for_users','login',$login);
        
        $messenge_for_user = $Select->get_select_where_fetch_all('Messenge_for_users','login',$login);
        
        $count_score = $Select->get_num_rows_where('users_score','verify','');

    
    $img_user_av = $Select->get_select_where_fetch_assoc($pr_cookie.'s',$login_add, $login);

    $img_avatar = $img_user_av['img']; 
        
    }
    else{
        $img_avatar = false;
    }
?>