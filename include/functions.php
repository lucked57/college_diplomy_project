<?php

function get_categories()
{
    
    global $link;
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($link, $sql);
        

    $categories  = mysqli_fetch_all($result,MYSQLI_ASSOC); 
    return $categories;
    mysqli_free_result($result);
}


function get_posts()
{
    global $link;
    
    
    $sql="SELECT * FROM posts order by id DESC LIMIT 12";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
    
}

function get_postsleft()
{
    global $link;
    
     $i='left';
    
    $sql="SELECT * FROM posts where id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
    
}

function get_postsright()
{
    global $link;
    
     $i='right';
    
    $sql="SELECT * FROM posts where id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_postsGPUleft()
{
    global $link;
    
    $i='left';
     
     $query = 'gpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' and id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}


function get_postsGPUright()
{
    global $link;
    
    $i='right';
     
     $query = 'gpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' and id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}


function get_postsCPUleft()
{
    global $link;
    
    $i='left';
     
     $query = 'cpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' and id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}


function get_postsCPUright()
{
    global $link;
    
    $i='right';
     
     $query = 'cpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' and id_v_blocke = '$i'";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_posts_by_id($post_id)
{
    global $link;
    
    
    $sql = "select * from posts where id=".$post_id;
    
    $result = mysqli_query($link, $sql);
    
    $post = mysqli_fetch_assoc($result);
    
    return $post;
    mysqli_free_result($result);
}

function generate_code($lenght = 8)
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

function insert_subscriber ($link,$email)
{
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from subscribes where email = '$email'";
    
    $result = mysqli_query($link, $query);
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        //Если его нет, то создаем с уникальным кодом(неактивен)
        $subscrider_code = generate_code();
        
       // echo $subscrider_code;
        
        $insert_query = "insert into subscribes (email, code) values ('$email', '$subscrider_code')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Ваш email добавлен в базу данных';
        }
        else
        {
            return 'Неизвестная ошибка, обратитесь к администратору';
        }
    }
    else
    {
        //если уже есть подписчик с таким email
        return 'Вы уже подписанны';
    }
    
    
}

function get_cpu($cpu)
{
    global $link;
    
   
    
     
    
    $sql="SELECT * FROM cpu  WHERE Namecpu = '$cpu'";
    
    $result = mysqli_query($link, $sql);
    
    $cpu_socket = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_socket;
    mysqli_free_result($result);
}

function get_matka($matka)
{
    global $link;
    
  

    $sql="SELECT * FROM Matka  WHERE Namematka = '$matka'";
    
    $result = mysqli_query($link, $sql);
    
    $matka_socket = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $matka_socket;
    mysqli_free_result($result);
}


function get_search($query)
{
    global $link;
    
   
    
     
    
    $sql="SELECT * FROM posts  WHERE text LIKE '%$query%' or content LIKE '%$query%'";
    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
     mysqli_free_result($result);
}

function insert_users ($link, $email,$login,$password,$code_for_cookie)
{
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from users where login = '$login' or email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        //Если его нет, то создаем с уникальным кодом(неактивен)
        //$subscrider_code = generate_code();
        
       // echo $subscrider_code;
        
        $insert_query = "insert into users (login, password,email,code) values ('$login', '$password', '$email','$code_for_cookie')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
    //    if($result)
   //     {
    //        return 'created';
   //     }
   //     else
  //      {
  //          return 'fail';
 //       }
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
    
}

function find_login($link,$login)
{
    //$login = mysqli_real_escape_string($link,$login);
    $query = "select * from users where login = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
   
    $login_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $login_query;
    mysqli_free_result($result);
}

function find_password($link,$password)
{
    //$password='test5';
    $query = "select * from users where password = '$password'";
    
    
    
    $result = mysqli_query($link, $query);
   
    $password_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $password_query;
    mysqli_free_result($result);
}


function get_ram($ram)
{
    global $link;
    
  

    $sql="SELECT * FROM ram WHERE Nameram = '$ram'";
    
    $result = mysqli_query($link, $sql);
    
    $ram_ddr = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $ram_ddr;
    mysqli_free_result($result);
}


function get_matkaddr($matkaddr)
{
    global $link;
    
  

    $sql="SELECT * FROM Matka WHERE Namematka = '$matkaddr'";
    
    $result = mysqli_query($link, $sql);
    
    $matka_ddr5 = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $matka_ddr5;
    mysqli_free_result($result);
}


function get_gpu($gputdp)
{
    global $link;
    
  

    $sql="SELECT * FROM gpu WHERE namegpu = '$gputdp'";
    
    $result = mysqli_query($link, $sql);
    
    $gputdp = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $gputdp;
    mysqli_free_result($result);
}

function get_power($powertdp)
{
    global $link;
    
  

    $sql="SELECT * FROM power_supply WHERE namepower = '$powertdp'";
    
    $result = mysqli_query($link, $sql);
    
    $powertdp = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $powertdp;
    mysqli_free_result($result);
}

function get_cpupower($cputdp)
{
    global $link;
    
  

    $sql="SELECT * FROM cpu WHERE Namecpu = '$cputdp'";
    
    $result = mysqli_query($link, $sql);
    
    $cputdp = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cputdp;
    mysqli_free_result($result);
}

function get_accountinfo($info_login)
{
    global $link;
    
  

    $sql="SELECT * FROM users WHERE login = '$info_login'";
    
    $result = mysqli_query($link, $sql);
    
    $info_login = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $info_login;
    mysqli_free_result($result);
}


function find_adminpass($login)
{
    global $link;
    
    $query = "select * from admins where login_admins = '$login'";
    
    $result = mysqli_query($link, $query);
   
    $admin_pass = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $admin_pass;
    mysqli_free_result($result);
}

function get_accountinfo_for_admins()
{
    global $link;
    
  

    $sql="SELECT * FROM users";
    
    $result = mysqli_query($link, $sql);
    
    $info_login = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $info_login;
    mysqli_free_result($result);
}

function get_ubscribeinfo_for_admins()
{
    global $link;
    
    $sql="SELECT * FROM subscribes";
    
    $result = mysqli_query($link, $sql);
    
    $info_subscribe = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $info_subscribe;
    mysqli_free_result($result);
}


function get_from_matka()
{
    global $link;
    
    
    $sql="SELECT * FROM Matka order by Namematka ASC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_from_cpu()
{
    global $link;
    
    
    $sql="SELECT * FROM cpu order by socket ASC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_from_ram()
{
    global $link;
    
    
    $sql="SELECT * FROM ram order by DDR ASC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_from_gpu()
{
    global $link;
    
    
    $sql="SELECT * FROM gpu order by namegpu ASC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_from_power()
{
    global $link;
    
    
    $sql="SELECT * FROM power_supply order by namepower ASC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}


function get_gpuposts()
{
    global $link;
    
  
     
     $query = 'gpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' order by id DESC LIMIT 50";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
}

function get_cpuposts()
{
    global $link;
    
  
     
     $query = 'cpu';
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' order by id DESC LIMIT 50";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    
    mysqli_free_result($result);
}

function generate_code_signup($lenght = 5)
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


function pr_status()
{
    global $link;
    
  
    
    $sql="SELECT * FROM posts  WHERE categoriya LIKE '%$query%' order by id DESC LIMIT 50";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    
    mysqli_free_result($result);
}

function proverka_users ($link, $email,$login)
{
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from users where login = '$login' or email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
}


function proverka_email_students($link,$email)
{
    
   
    
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли email в бд
    $query = "select * from Students_email where email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        
        $faill= 'Такого email нету';
        return $faill;
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $faill= '';
        return $faill;
    }
    
}



function stats_users()
{
    global $link;
    
     $query = "select * from users";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    $posts = mysqli_num_rows($result);
  
  return $posts;
    
    mysqli_free_result($result);
    
    
}


function stats_emails_students()
{
    global $link;
    
     $query = "select * from Students_email";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    $posts = mysqli_num_rows($result);
  
  return $posts;
    
    mysqli_free_result($result);
    
    
}


function stats_subscribes()
{
    global $link;
    
     $query = "select * from subscribes";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    $posts = mysqli_num_rows($result);
  
  return $posts;
    
    mysqli_free_result($result);
    
    
}


function stats_gpu()
{
    global $link;
    
     $query = "select * from gpu";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    $posts = mysqli_num_rows($result);
  
  return $posts;
    
    mysqli_free_result($result);
    
    
}


function stats_Students_anketa()
{
    global $link;
    
     $query = "select * from Students_anketa";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    $posts = mysqli_num_rows($result);
  
  return $posts;
    
    mysqli_free_result($result);
    
    
}



function insert_students_emals ($email)
{
    global $link;
    
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from Students_email where email = '$email'";
    
    $result = mysqli_query($link, $query);
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        //Если его нет, то создаем с уникальным кодом(неактивен)
        
       // echo $subscrider_code;
        
        $insert_query = "insert into Students_email (email) values ('$email')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'email '.$email. ' добавлен в базу данных';
        }
        else
        {
            return 'Неизвестная ошибка, обратитесь к администратору';
        }
    }
    else
    {
        //если уже есть подписчик с таким email
        return 'email '.$email. ' уже добавлен';
    }
    mysqli_free_result($result);
    
}









        function user_pass_change($pass_change,$login){
            
        global $link;
            
        $insert_query = "UPDATE users SET password = '$pass_change' WHERE login = '$login'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Пароль успешно изменен';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}


function find_email($email){
    
    global $link;
    
    
    $query = "select * from users where email = '$email'";
    
    $result = mysqli_query($link, $query);
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
        
        if(mysqli_num_rows($result))
        {
            $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $posts;
        }
        else
        {
            return 'данного email нету в базе данных';
        }
    
    
}


function generate_code_pass($lenght = 8)
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




  function users_email_pass_change($pass_users,$email){
            
        global $link;
            
        $insert_query = "UPDATE users SET password = '$pass_users' WHERE email = '$email'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Новый пароль выслан вам на email';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}




function get_search_from_userstable($query_users_id, $query_users_login, $query_users_email, $query_users_fio, $query_users_data)
{
    global $link;
    
     if(empty($query_users_fio)){
        $query_users_fio = '`';
    }
    
     if(empty($query_users_data)){
        $query_users_data = '1';
    }
    
   if(!empty($query_users_id)){
       
       $sql="SELECT * FROM users WHERE id ='$query_users_id'";
   }
else{
    $sql="SELECT * FROM users WHERE login = '$query_users_login' or email = '$query_users_email' or login IN(SELECT students_login from Students_anketa where FIO = '$query_users_fio' or year = '$query_users_data')";
}

     
    
    
    
    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
    
     mysqli_free_result($result);
}






  function users_img_change($file_put,$login){
            
        global $link;
            
        $insert_query = "UPDATE Students_anketa SET img_anketa = '$file_put' WHERE students_login = '$login'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Картинка успешно загружена';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}





function get_Students_anketa()
{
    global $link;
    
    
    $sql="SELECT * FROM Students_anketa order by id DESC LIMIT 12";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
    
}





function get_students_posts_by_id($post_id)
{
    global $link;
    
    
    $sql = "select * from Students_anketa where id=".$post_id;
    
    $result = mysqli_query($link, $sql);
    
    $post = mysqli_fetch_assoc($result);
    
    return $post;
    mysqli_free_result($result);
}





function insert_Students_anketa_login ($login)
{
    global $link;
    
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from Students_anketa where students_login = '$login'";
    
    $result = mysqli_query($link, $query);
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        //Если его нет, то создаем с уникальным кодом(неактивен)
        
       // echo $subscrider_code;
        
        $insert_query = "insert into Students_anketa (students_login) values ('$login')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Логин '.$login. ' добавлен в базу данных';
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
    mysqli_free_result($result);
    
}










function get_search_adout_students($query)
{
    global $link;
    
   
    
     
    
    $sql="SELECT * FROM Students_achivka  WHERE text_achivka LIKE '%$query%' or title LIKE '%$query%'";
    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
     mysqli_free_result($result);
}




function generate_name_for_img($lenght = 18)
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




  function users_img_uploadfile($uploadfile,$login){
            
        global $link;
            
        $insert_query = "UPDATE Students_anketa SET img_uploads_dir = '$uploadfile' WHERE students_login = '$login'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return ' ';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}




function get_img_uploadfile($login)
{
    global $link;
    
   
    
     
    
    $sql="SELECT * FROM Students_anketa  WHERE students_login = '$login'";
    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
    
     mysqli_free_result($result);
}


function get_search_from_Students_anketa($query_users_fio, $query_users_data){
    
    global $link;
    
    if(empty($query_users_fio)){
        $query_users_fio = '`';
    }
    
     if(empty($query_users_data)){
        $query_users_data = '1';
    }
    
    $sql = "SELECT * FROM users WHERE login IN(SELECT students_login from Students_anketa where FIO = '$query_users_fio' or year = '$query_users_data')";
    
    
    //$sql="SELECT * FROM Students_anketa WHERE FIO = '$query_users_fio' or year = '$query_users_data'";

    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
    
     mysqli_free_result($result);
}




function proverka_Students_anketa_login ($login)
{
    global $link;
    
    
    $query = "select * from Students_anketa where students_login = '$login'";
    
    $result = mysqli_query($link, $query);
    
  
    
    if (!mysqli_num_rows($result))
    {
            return 'insert';
    }
    else
    {
       
        return 'update';
    }
    mysqli_free_result($result);
    
}


function insert_Students_anketa ($login, $FIO, $year, $Adress, $Groupe_name)
{
    global $link;
    
    

    $query = "select * from Students_anketa where students_login = '$login'";
    
    $result = mysqli_query($link, $query);
    

    
    if (!mysqli_num_rows($result))
    {

        
        $insert_query = "insert into Students_anketa (students_login, FIO, year, Adress, Group_name) values ('$login','$FIO','$year','$Adress','$Groupe_name')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
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
    mysqli_free_result($result);
    
}



function update_Students_anketa ($login, $FIO, $year, $Adress,$Groupe_name){
    
    global $link;
    
    $insert_query = "UPDATE Students_anketa SET FIO = '$FIO', year = '$year', Adress = '$Adress', Group_name = '$Groupe_name' WHERE students_login = '$login'";
    
    
    $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Анкета успешно обновлена';
        }
        else
        {
            return 'Неизвестная ошибка, обратитесь к администратору';
        }
    
    mysqli_free_result($result);
}




function generate_code_for_cokie($len)
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




function find_cookie($login)
{
    
     global $link;
    //$login = mysqli_real_escape_string($link,$login);
    $query = "select * from users where login = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
   
    $login_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $login_query;
    mysqli_free_result($result);
}


function find_cookie_for_admin($login)
{
    
     global $link;
    //$login = mysqli_real_escape_string($link,$login);
    $query = "select * from admins where login_admins = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
   
    $login_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $login_query;
    mysqli_free_result($result);
}



function get_img_uploadfile_achivka($login)
{
    global $link;
    
   
    
     
    
    $sql="SELECT * FROM Students_achivka  WHERE students_login = '$login'";
    
    $result = mysqli_query($link, $sql);
    
    $cpu_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $cpu_query;
    
     mysqli_free_result($result);
}



  function users_img_file_for_achivka($uploadfile,$login,$file_put){
            
        global $link;
            
        $insert_query = "UPDATE Students_achivka SET img_uploads_dir = '$uploadfile', img = '$file_put' WHERE students_login = '$login'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return ' ';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}



function insert_Students_achivka ($login, $title, $text,$uploadfile, $file_put,$check,$check_image)
{
    global $link;
    
    

    //$query = "select * from Students_achivka where students_login = '$login'";
    
    //$result = mysqli_query($link, $query);
    

    
    //if (!mysqli_num_rows($result))
   // {
        if($check_image='No'){
        
        $insert_query = "insert into Students_achivka (students_login, title, text_achivka,img_uploads_dir,img,check_achiv) values ('$login','$title','$text','$uploadfile','$file_put','$check')";
        
        $result = mysqli_query($link, $insert_query);
        
        }
        else{
             $insert_query = "insert into Students_achivka (students_login, title, text_achivka,check_achiv) values ('$login','$title','$text','$check')";
        
        $result = mysqli_query($link, $insert_query);
        }
        
        if($result)
        {
            return 'Достижение успешно добавлено!';
        }
        else
        {
            return 'Неизвестная ошибка, обратитесь к администратору';
        }
  //  }
  //  else
  //  {
        //если уже есть подписчик с таким email
   //     return 'Логин '.$login. ' уже добавлен';
  //  }
    mysqli_free_result($result);
    
}




function get_Students_achivka_posts_by_id($post_id)
{
    global $link;
    
    
    $sql = "select * from Students_achivka where id=".$post_id;
    
    $result = mysqli_query($link, $sql);
    
    $post = mysqli_fetch_assoc($result);
    
    return $post;
    mysqli_free_result($result);
}



function get_Students_achivka()
{
    global $link;
    
    
    $sql="SELECT * FROM Students_achivka where check_achiv = 'Yes' order by id DESC LIMIT 12";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    return $posts;
    mysqli_free_result($result);
    
}



function proverka_teachers ($link, $email,$login)
{
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from teachers where login = '$login' or email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
}


function proverka_email_teachers($link,$email)
{
    
   
    
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли email в бд
    $query = "select * from teatchers_emails where teacher_email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        
        $faill= 'Такого email нету';
        return $faill;
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $faill= 'Препод email есть';
        return $faill;
    }
    
}



function insert_teatchers ($link, $email,$login,$password,$code_for_cookie)
{
    $email = mysqli_real_escape_string($link,$email);// для безопастности
    
    //проверка есть ли подписчик в таблице subscribes
    $query = "select * from teachers where login = '$login' or email = '$email'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        //Если его нет, то создаем с уникальным кодом(неактивен)
        //$subscrider_code = generate_code();
        
       // echo $subscrider_code;
        
        $insert_query = "insert into teachers (login, password,email,code) values ('$login', '$password', '$email','$code_for_cookie')";
        
        $result = mysqli_query($link, $insert_query);
        
        
        
    //    if($result)
   //     {
    //        return 'created';
   //     }
   //     else
  //      {
  //          return 'fail';
 //       }
    }
    else
    {
        //если уже есть подписчик с таким login перенаправим его на главную
        $fail= 'Пользователей с таким логином или email уже существует';
        return $fail;
    }
    
    
}



function find_login_teachers($link,$login)
{
    //$login = mysqli_real_escape_string($link,$login);
    $query = "select * from teachers where login = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
   
    $login_query = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $login_query;
    mysqli_free_result($result);
}



function find_email_teachers($email){
    
    global $link;
    
    
    $query = "select * from teachers where email = '$email'";
    
    $result = mysqli_query($link, $query);
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
        
        if(mysqli_num_rows($result))
        {
            $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $posts;
        }
        else
        {
            return 'Препод email не найден';
        }
    
    
}


  function teatchers_email_pass_change($pass_users,$email){
            
        global $link;
            
        $insert_query = "UPDATE teachers SET password = '$pass_users' WHERE email = '$email'";
     
        
        
        $result = mysqli_query($link, $insert_query);
        
        
        
        if($result)
        {
            return 'Новый пароль выслан вам на email';
        }
        else
        {
            return 'Что-то пошло не так';
        }
        mysqli_free_result($result);     
}




function proverka_gpoupe ($login)
{
    
    global $link;
    
    $query = "select * from Group_name where name = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
    
  
    
    
    
    //$num_rows = mysqli_num_rows($result); //кол-во полученных строк из результата
    //exit;
    
    if (!mysqli_num_rows($result))
    {
        $fail= 'Такой группы нету в бд';
        return $fail;
    }
    else
    {
        return 'yes';
        
    }
    
}




function proverka_count_achivka($login)
{
    
    global $link;
    
    $query = "select * from Students_achivka where students_login = '$login'";
    
    
    
    $result = mysqli_query($link, $query);
    
    $result = mysqli_num_rows($result);
  
    return $result;
}
