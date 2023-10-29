<?php
class Teachers_messange{
    
    
                    public function send_messenge($login, $messenge,$gropupe_name){
                        
                    
    
                        global $mysqli; 

                        $insert = "insert into Messenge_for_users (login, Messenge,Gropupe_name) values ('$login','$messenge','$gropupe_name')";

                        $result = $mysqli->query($insert);



                        if($result)
                        {
                            return 'Сообщения успешно отправлены';
                        }
                        else
                        {
                            return 'Неизвестная ошибка, обратитесь к администратору';
                        }
    
                        $mysqli->free($result);
                        
                    }
    
}



class Add_news{
    
    
     public function add_posts($title,$text,$uploadfile,$file_put){
                        
                    
    
                        global $mysqli; 

                        $insert = "insert into posts (title,text,img_uploads_dir,image) values ('$title','$text','$uploadfile','$file_put')";

                        $result = $mysqli->query($insert);



                        if($result)
                        {
                            return 'Новость успешно добавлена';
                        }
                        else
                        {
                            return 'Неизвестная ошибка, обратитесь к администратору';
                        }
    
                        $mysqli->free($result);
                        
                    }
    
}





class Teachers_anketa {
    
              
                public function insert_anketa($Gpoupe_name,$FIO,$login){
    
                global $mysqli;               
                    
                $sql="select * from teatchers_anketa where login = '$login'";

                $result = $mysqli->query($sql);



                if (!$result->num_rows)
                {


                    $insert = "insert into teatchers_anketa (Name, Group_name, login) values ('$FIO','$Gpoupe_name','$login')";

                    $result = $mysqli->query($insert);



                    if($result)
                    {
                        return 'Анкета успешно заполнена';
                    }
                    else
                    {
                        return 'Неизвестная ошибка, обратитесь к администратору';
                    }
                }
                else
                {
                    //если уже есть подписчик с таким email
                    return 'Логин '.$login. ' уже добавлен';
                }
                    
                $mysqli->free($result);
                    
                    }
    
    
    
                 public function update_anketa($Gpoupe_name,$FIO,$login){
                     
                     
                     global $mysqli;
                     
                     
                     $sql="UPDATE teatchers_anketa SET Name = '$FIO', Group_name = '$Gpoupe_name' WHERE login = '$login'";
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result)
                     {
                         
                         return 'Данные анкеты успешно обновлены, ФИО: '.$FIO.' Группа: '.$Gpoupe_name;
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
    
    
}


class Proverka_cookie{
    
            public function find_cookie_for_admin($login){
            
            global $mysqli;
            
            $sql="select * from admins where login_admins = '$login'";

            $result = $mysqli->query($sql);

            $posts = $result->fetch_assoc();

            return $posts;

            $mysqli->free($result);
            
        }
    
    
            public function find_cookie_for_teatchers($login){
            
            global $mysqli;
            
            $sql="select * from teachers where login = '$login'";

            $result = $mysqli->query($sql);

            $posts = $result->fetch_assoc();

            return $posts;

            $mysqli->free($result);
            
        }
    
}


class Select{
    
        public function get_num_rows($stats){
        
        global $mysqli;
        
        $sql = "select * from ".$stats."";
    
        $result = $mysqli->query($sql);

        $posts = $result->num_rows;

        return $posts;

        $mysqli->free($result);
        
    }
    
       public function get_num_rows_where($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql = "select * from ".$table_name." where ".$pole_name." = '$name'";
    
        $result = $mysqli->query($sql);

        $posts = $result->num_rows;

        return $posts;

        $mysqli->free($result);
        
    }
    
        public function get_fetch_assoc($stats){
        
        global $mysqli;
        
        $sql = "select * from ".$stats."";
    
        $result = $mysqli->query($sql);

        $posts = $result->fetch_assoc();

        return $posts;

        $mysqli->free($result);
        
    }
    
        public function get_fetch_all($stats){
        
        global $mysqli;
        
        $sql = "select * from ".$stats."";
    
        $result = $mysqli->query($sql);

        $posts = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;

        $mysqli->free($result);
        
    }
    
    
        public function get_select_where_fetch_all($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql = "select * from ".$table_name." where ".$pole_name." = '$name'";
    
        $result = $mysqli->query($sql);

        $posts = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;

        $mysqli->free($result);
        
    }
    
    
        public function get_select_where_fetch_assoc($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql = "select * from ".$table_name." where ".$pole_name." = '$name'";
    
        $result = $mysqli->query($sql);

        $posts = $result->fetch_assoc();

        return $posts;

        $mysqli->free($result);
        
    }
    
}



?>