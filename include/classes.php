<?php
class SQL_native{
    public function query($sql){
        
        global $mysqli;
    
        $result = $mysqli->query($sql);

        $posts = $result->num_rows;

        return $posts;

        $mysqli->free($result);
        
    }
    public function query_all($sql){
        
        global $mysqli;
    
        $result = $mysqli->query($sql);

        //$posts = $result->fetch_all(MYSQLI_ASSOC);
        $posts = array();
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;

        $mysqli->free($result);
        
    }
     public function query_assoc($sql){
        
        global $mysqli;
    
        $result = $mysqli->query($sql);

        $posts = $result->fetch_assoc();

        return $posts;

        $mysqli->free($result);
        
    }
}










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
    
    
                    public function get_select_in($name){

                        global $mysqli;

                        $sql = "select * from Students_anketa where Group_name = '$name'";

                        $result = $mysqli->query($sql);

                        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                        return $posts;

                        $mysqli->free($result);
    
}

}

class Proverka{
    
    
    public function proverka_input($name){
        
        global $mysqli;
        

    $name = str_replace("'", "", $name);
        
    $name = str_replace("<", "", $name);
        
    $name = str_replace(">", "", $name);
        
    $name  = $mysqli->real_escape_string($name);
        
        return $name;
        
        
    }
    
}

class Downloading_img{
    
            public function get_img_uploadfile($post_id){

                global $mysqli;

                $sql="select * from Students_achivka where id=".$post_id;

                $result = $mysqli->query($sql);

                $posts = $result->fetch_assoc();

                return $posts;

                $mysqli->free($result);
        
    }
    
            public function generate_name_for_img($lenght)
        {
            $string = '';

            $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM9876543210';

            $num_chars = strlen($chars);

            for ($i = 0; $i < $lenght; $i++)
            {
                $string .= substr($chars, rand(1,$num_chars)-1, 1);
            }
            return $string;

        }
    
    
                    public function update_achivka($post_id, $title, $text,$uploadfile, $file_put,$check,$check_image){
                     
                     
                     global $mysqli;
                     
                     
                     if((empty($uploadfile)) and (empty($file_put))){
                         
                        $sql="UPDATE Students_achivka SET title = '$title', text_achivka = '$text', check_achiv = '$check' WHERE id = '$post_id'"; 
                         
                     }
                    else{
                        
                        $sql="UPDATE Students_achivka SET title = '$title', text_achivka = '$text', check_achiv = '$check', img_uploads_dir = '$uploadfile', img = '$file_put' WHERE id = '$post_id'";
                        
                    }
                    
                     
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result)
                     {
                         
                         return 'Данные достижения успешно обновлены';
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
    
            
    
}

class Users_info{
    
    
            public function select_users($limit){
            
                global $mysqli;

                $sql="select * from Students_achivka INNER JOIN Students_anketa ON Students_achivka.students_login = Students_anketa.students_login where check_achiv = 'Yes' order by Students_achivka.id DESC limit ".$limit."";

                $result = $mysqli->query($sql);

                $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                return $posts;

                $mysqli->free($result);
            
        }
    
                    public function select_users_limit($limit0,$limit1){
                        

            
                global $mysqli;

                $sql="select * from Students_achivka INNER JOIN Students_anketa ON Students_achivka.students_login = Students_anketa.students_login where check_achiv = 'Yes' order by Students_achivka.id DESC limit ".$limit0." ,".$limit1."";

                $result = $mysqli->query($sql);

                $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                return $posts;

                $mysqli->free($result);
            
        }
    
    
         public function select_card_content_limit($limit0,$limit1){
                        

            
                global $mysqli;

                $sql="SELECT * FROM card_content order by id DESC limit ".$limit0." ,".$limit1."";

                $result = $mysqli->query($sql);

                $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                return $posts;

                $mysqli->free($result);
            
        }
    
    
     public function select_post_content_limit($limit0, $limit1){
                        
                global $mysqli;

                $sql="SELECT * FROM img_post order by date DESC limit ".$limit0." ,".$limit1."";

                $result = $mysqli->query($sql);

                //$posts = $result->fetch_all(MYSQLI_ASSOC);
         
                $posts = array();
                while($row = $result->fetch_assoc()) {
                    $posts[] = $row;
                }

                return $posts;

                $mysqli->free($result);
            
        }
        
    
            public function get_search_adout_students($query){
            
                global $mysqli;

                $sql="SELECT * FROM Students_achivka  WHERE (text_achivka LIKE '%$query%' or title LIKE '%$query%') and check_achiv = 'Yes'";

                $result = $mysqli->query($sql);

                $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                return $posts;

                $mysqli->free($result);
            
        }
    
    
    
             public function get_search_users_ajax($query){
            
                global $mysqli;
                 
                 $select = new Select();

                $anketa = $select->get_select_where_fetch_assoc('Students_anketa','FIO',$query);
                     
                     $login = $anketa['students_login'];
                     
                     $sql="SELECT * FROM Students_achivka  WHERE (students_login = '$login') and check_achiv = 'Yes' order by Students_achivka.id DESC limit 50";
                     
                     $result = $mysqli->query($sql);
                 
                 if (!$result->num_rows){

                     
                $sql="SELECT * FROM Students_achivka  WHERE (Group_name = '$query') and check_achiv = 'Yes' order by Students_achivka.id DESC limit 50";

                $result = $mysqli->query($sql);
                 
                 if (!$result->num_rows){
                     
                     $sql="SELECT * FROM Students_achivka  WHERE (text_achivka LIKE '%$query%' or title LIKE '%$query%') and check_achiv = 'Yes' order by Students_achivka.id DESC limit 50";

                    $result = $mysqli->query($sql);
                     
                 }
                     
                 }
                

               

                $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

                return $posts;

                $mysqli->free($result);
            
        }
    
    
            public function get_Students_achivka_posts_by_id($post_id){
            
                global $mysqli;

                $sql="select * from Students_achivka where id=".$post_id;

                $result = $mysqli->query($sql);

                $posts = $result->fetch_assoc();

                return $posts;

                $mysqli->free($result);
            
        }
    
    
    
               
            
    
}


class Teachers_anketa {
    
              
                public function insert_anketa($Gpoupe_name,$FIO,$phone,$login){
    
                    global $mysqli;               

                    $sql="select * from teatchers_anketa where login = '$login'";

                    $result = $mysqli->query($sql);



                    if (!$result->num_rows)
                    {


                        $insert = "insert into teatchers_anketa (Name, Group_name, phone, login) values ('$FIO','$Gpoupe_name','$phone','$login')";

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
                        return 'Анкета была только что заполнена, чтобы обновить перезагрузите страницу';
                    }

                    $mysqli->free($result);

                    }
    
    
    
                 public function update_anketa($Gpoupe_name,$FIO,$phone,$login){
                     
                     
                     global $mysqli;
                     
                     
                     $sql="UPDATE teatchers_anketa SET Name = '$FIO', Group_name = '$Gpoupe_name', phone = '$phone' WHERE login = '$login'";
                     
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
    
            public function find_cookie_for_students($login){
            
            global $mysqli;
            
            $sql="select * from users where login = '$login'";

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

        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

        return $posts;

        $mysqli->free($result);
        
    }
    
    
     public function get_fetch_all_order_count($stats){
        
        global $mysqli;
        
        $sql = "select * from ".$stats." order by count_posts DESC";
    
        $result = $mysqli->query($sql);

        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

        return $posts;

        $mysqli->free($result);
        
    }
    
    public function get_fetch_all_limit($stats,$limit0,$limit1){
        
        global $mysqli;
        
        $sql = "select * from ".$stats." order by id DESC limit ".$limit0." ,".$limit1."";
    
        $result = $mysqli->query($sql);

        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

        return $posts;

        $mysqli->free($result);
        
    }
    
    
        public function get_select_where_fetch_all($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql = "select * from ".$table_name." where ".$pole_name." = '$name'";
    
        $result = $mysqli->query($sql);

        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

        return $posts;

        $mysqli->free($result);
        
    }
    
        public function get_select_where_fetch_all_order_by_id($table_name,$pole_name,$name){
        
            global $mysqli;

            $sql = "select * from ".$table_name." where ".$pole_name." = '$name' order by id DESC";

            $result = $mysqli->query($sql);

            $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }

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
    
    
      public function get_select_where_limit_one_fetch_assoc($table_name,$pole_name,$name){
        
            global $mysqli;

            $sql = "select * from ".$table_name." where ".$pole_name." = '$name' ORDER BY ID DESC LIMIT 1";

            $result = $mysqli->query($sql);

            $posts = $result->fetch_assoc();

            return $posts;

            $mysqli->free($result);
        
    }
    
    //SELECT * FROM `gallery` WHERE albom = 'test' ORDER BY ID DESC LIMIT 1
    
}

class Insert{
    
        public function insert_values($table_name,$pole_name,$email){
        
            global $mysqli;

            $sql = "select * from ".$table_name." where ".$pole_name." = '$email'";

            $result = $mysqli->query($sql);

            if (!$result->num_rows)
            {

                $insert_query = "insert into ".$table_name." (".$pole_name.") values ('$email')";

                $result = $mysqli->query($insert_query);



                if($result)
                {
                    return $email. ' добавлен в базу данных';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }
            }
            else
            {
                //если уже есть подписчик с таким email
                return $email. ' уже добавлен';
            }
            $mysqli->free($result);
        
    }
    
    
    
    
         public function insert_values_two($table_name,$pole_name,$pole_name_two,$email,$code){
        
            global $mysqli;

            $sql = "select * from ".$table_name." where ".$pole_name." = '$email'";

            $result = $mysqli->query($sql);

            if (!$result->num_rows)
            {

                $insert_query = "insert into ".$table_name." (".$pole_name.",".$pole_name_two.") values ('$email','$code')";

                $result = $mysqli->query($insert_query);



                if($result)
                {
                    return $email. ' добавлен в базу данных';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }
            }
            else
            {
                //если уже есть подписчик с таким email
                return $email. ' уже добавлен';
            }
            $mysqli->free($result);
        
    }
    
    
    public function insert_values_three($table_name,$pole_name,$pole_name_2,$pole_name_3,$value,$value_2,$value_3){
        
            global $mysqli;

                $insert_query = "insert into ".$table_name." (".$pole_name.",".$pole_name_2.",".$pole_name_3.") values ('$value','$value_2','$value_3')";

                $result = $mysqli->query($insert_query);



                if($result->num_rows)
                {
                    return $email. ' добавлен в базу данных';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }

            $mysqli->free($result);
        
    }
    
    
        public function insert_values_four($table_name,$pole_name,$pole_name_2,$pole_name_3,$pole_name_4,$value,$value_2,$value_3,$value_4){
        
            global $mysqli;

                $insert_query = "insert into ".$table_name." (".$pole_name.",".$pole_name_2.",".$pole_name_3.",".$pole_name_4.") values ('$value','$value_2','$value_3','$value_4')";

                $result = $mysqli->query($insert_query);



                if($result->num_rows)
                {
                    return $email. ' добавлен в базу данных';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }

            $mysqli->free($result);
        
    }
    
    
    
         public function insert_values_five($table_name,$pole_name,$pole_name_2,$pole_name_3,$pole_name_4,$pole_name_5,$value,$value_2,$value_3,$value_4,$value_5){
        
            global $mysqli;

                $insert_query = "insert into ".$table_name." (".$pole_name.",".$pole_name_2.",".$pole_name_3.",".$pole_name_4.",".$pole_name_5.") values ('$value','$value_2','$value_3','$value_4','$value_5')";

                $result = $mysqli->query($insert_query);



                if($result->num_rows)
                {
                    return $email. ' добавлен в базу данных';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }

            $mysqli->free($result);
        
    }
}

class Delete{
    
      public function get_delete_where($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql = "DELETE FROM ".$table_name." WHERE ".$pole_name." = '$name'";    
    
        $result = $mysqli->query($sql);

        if($result)
                {
                    return 'Сообщения успешно удалены';
                }
                else
                {
                    return 'Неизвестная ошибка, обратитесь к администратору';
                }

        $mysqli->free($result);
        
    }
    
}

class Proverka_us{
    
    public function proverka_users($table_name,$pole_name,$name){
        
        global $mysqli;
        
        $sql="select * from ".$table_name." where ".$pole_name." = '$name'";
        
        $result = $mysqli->query($sql);
        
        if(!$result->num_rows){
            
            $fail= 'Еще нету';
            
        return $fail;
            
        }
        else{
            
        $fail= 'Уже есть';
            
        return $fail;
            
        }
        
    }
    
}

class Generate_code{
    
    public function generate_code_for_cokie($len)
{
    $string = '';
    
    $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM9876543210';
    
    $num_chars = strlen($chars);
    
    for ($i = 0; $i < $len; $i++)
    {
        $string .= substr($chars, rand(1,$num_chars)-1, 1);
    }
    return $string;
    
}
    
}

class Signup{
    
    public function insert_users ($email,$login,$password,$code_for_cookie)
{
        
    global $mysqli;

    $query = "select * from users where login = '$login' or email = '$email'";
    
    
    
    $result = $mysqli->query($query);
    

    
    if (!$result->num_rows)
    {

        $insert_query = "insert into users (login, password,email,code) values ('$login', '$password', '$email','$code_for_cookie')";
        
        $result = $mysqli->query($insert_query);
        
        

    }
    else
    {
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
    
}
    
    public function insert_teatchers($email,$login,$password,$code_for_cookie)
{
    
    global $mysqli;
    
        
    $query = "select * from teachers where login = '$login' or email = '$email'";
    
    
    
    $result = $mysqli->query($query);
    
    
    if (!$result->num_rows)
    {

        
        $insert_query = "insert into teachers (login, password,email,code) values ('$login', '$password', '$email','$code_for_cookie')";
        
        $result = $mysqli->query($insert_query);
        
        

    }
    else
    {
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
    
}
    
}

    class Update{
        
            public function update_where($table_name,$pole_name, $value, $pole_name_where, $where){
                     
                     
                     global $mysqli;
                     
                     
                         
                        $sql="UPDATE ".$table_name." SET ".$pole_name." = '$value' WHERE ".$pole_name_where." = '$where'"; 
                         
                    
                     
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result->num_rows)
                     {
                         
                         return 'Данные достижения успешно обновлены';
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
        
                public function update_where_four($table_name,$pole_name,$pole_name2, $pole_name3, $pole_name4, $value,$value2,$value3, $value4, $pole_name_where, $where){
                     
                     
                     global $mysqli;
                     
                     
                         
                        $sql="UPDATE ".$table_name." SET ".$pole_name." = '$value', ".$pole_name2." = '$value2', ".$pole_name3." = '$value3' , ".$pole_name4." = '$value4' WHERE ".$pole_name_where." = '$where'"; 
                         
                    
                     
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result->num_rows)
                     {
                         
                         return 'Данные достижения успешно обновлены';
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
        
        
                public function update_where_five($table_name,$pole_name,$pole_name2, $pole_name3, $pole_name4, $pole_name5, $value,$value2,$value3, $value4, $value5, $pole_name_where, $where){
                     
                     
                     global $mysqli;
                     
                     
                         
                        $sql="UPDATE ".$table_name." SET ".$pole_name." = '$value', ".$pole_name2." = '$value2', ".$pole_name3." = '$value3' , ".$pole_name4." = '$value4', ".$pole_name5." = '$value5' WHERE ".$pole_name_where." = '$where'"; 
                         
                    
                     
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result->num_rows)
                     {
                         
                         return 'Данные достижения успешно обновлены';
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
        
    }













class Students_anketa {
    
              
                public function insert_anketa_s($Gpoupe_name,$FIO,$login,$year,$adress){
    
                    global $mysqli;               

                    $sql="select * from Students_anketa where students_login = '$login'";

                    $result = $mysqli->query($sql);



                    if (!$result->num_rows)
                    {


                        $insert = "insert into Students_anketa (FIO, year, Adress, Group_name, students_login) values ('$FIO','$year','$adress','$Gpoupe_name','$login')";

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
                        return 'Анкета была только что заполнена, чтобы обновить перезагрузите страницу';
                    }

                    $mysqli->free($result);

                    }
    
    
    
                 public function update_anketa_s($Gpoupe_name,$FIO,$login,$year,$adress){
                     
                     
                     global $mysqli;
                     
                     
                     $sql="UPDATE Students_anketa SET FIO = '$FIO', Group_name = '$Gpoupe_name', year = '$year', Adress = '$adress' WHERE students_login = '$login'";
                     
                     $result = $mysqli->query($sql);
                     
                     if ($result)
                     {
                         
                         return 'Данные анкеты успешно обновлены, ФИО: '.$FIO.', Группа: '.$Gpoupe_name.' Адрес: '.$adress.' Год рождения: '.$year;
                         
                     }
                     else{
                         
                         return 'Произошла ошибка, обратитесь к администратору';
                     }
                     
                     $mysqli->free($result);
                     
                 }
    
    
}












?>