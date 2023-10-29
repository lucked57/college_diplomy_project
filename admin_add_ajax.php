<?php
sleep(1);
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';

    $errors;

    $type = $_POST['type'];

     



    
    $login = $_COOKIE['login_admin'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_admin($login);
    
    $cookie_code = $pr_cookie['code'];
    
if(password_verify($cookie_code, $_COOKIE['code_admin'])){
     $text_area = $_POST['text'];
     $pieces_area = explode(",", $text_area);
}
else{
    $errors = "Авторизируйтесь под админом";
}

        if(empty($errors)){
            
        
            $select = new Select();

									if($type == 'students'){
                                      
                                    // $pieces_area[0];
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {

                                             if (filter_var(trim($pieces_area[$i]), FILTER_VALIDATE_EMAIL)) {
  
                                                 
             
                          $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
    $pr_email = $select->get_select_where_fetch_all("teatchers_emails","teacher_email",$pieces_area[$i]);
                                                 
                                                 
                                        if(empty($pr_email)){
                                            
                                        
                                                 
                                        $Insert = new Insert();
                                        
                                        $table_name = "Students_email";
                                        
                                        $pole_name = "email";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                 }
                                                }
                                             else{
                                                 $alert .= $pieces_area[$i].' не email, ';
                                             }
                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          echo "add";
                                        
                                            
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
                                        }
                                    }
  




                                        if($type == 'prepod'){
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {
                                            //$pieces_area[$i];
                                             if (filter_var(trim($pieces_area[$i]), FILTER_VALIDATE_EMAIL)) {
    
                                                 
                                                 
                      $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
 $pr_email = $select->get_select_where_fetch_all("Students_email","email",$pieces_area[$i]);
                                                 
                                        if(empty($pr_email)){
                                            
                                       
                                        $Insert = new Insert();
                                        
                                        $table_name = "teatchers_emails";
                                        
                                        $pole_name = "teacher_email";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                  }
                                                }
                                             else{
                                                 $alert .= $pieces_area[$i].' не email, ';
                                             }
                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        
                                            echo "add";
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
                                        }
                                    }
  
        











                                        if($type == 'gpoupe'){
                                        array_push($pieces_area, "apple");
                                        $end_pieces = end($pieces_area);
                                        $i = 0;
                                       if(!empty($pieces_area[0])){
                                         do
                                        {
                                          global $mysqli;       
                                                 
                                        $pieces_area[$i] = $mysqli->real_escape_string(trim($pieces_area[$i]));
                                        
                                        
                                        $Insert = new Insert();
                                        
                                        $table_name = "Group_name";
                                        
                                        $pole_name = "name";
                                        
                                        $Insert->insert_values($table_name,$pole_name,trim($pieces_area[$i]));        
                                                 

                                            $i++;
                                        }while($pieces_area[$i]!=$end_pieces);
                                           
                                          
                                        echo "add";
                                            
                                        
                                    }
                                    else{
                                            $alert =  'Заполните поля!';
                                        }
                                    }
            
            
            }
            else{
                echo $errors;
            }

    
    
    ?>