<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    
                    global $mysqli;


                    $login = $_COOKIE['admin'];
    
                    $Select = new Select();
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc('admin','email',$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "admin";
                        
                    }
?>
