<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    include "include/pr_cookie.php";
    global $mysqli;

    //sleep(1);

    if($pr_cookie != "admin"){
        exit();
    }

    $errors;

    $pr = new Proverka();

    $id = $pr->proverka_input($_POST['id']); 

    $meta = $pr->proverka_input($_POST['meta']);

    $title = $pr->proverka_input($_POST['title']); 

    $text = $pr->proverka_input($_POST['text']);

    $date = $pr->proverka_input($_POST['data']);

    $tags = $pr->proverka_input($_POST['tags']);


    if(empty($id) || empty($meta)){
        $errors = "данные пустые".$id.' '.$meta;
    }


     /*if(iconv_strlen($email) > 5000 || iconv_strlen($option) > 40){
       $errors = "Слишком большой email";
    }*/

    $Select = new Select();

    $Insert = new Insert();

    $Update = new Update();


    if($meta == 'update'){
        
        if(empty($id) || empty($meta) || empty($date) || empty($tags)){
        $errors = "данные пустые".$id.' '.$meta;
    }

        
        $data = substr($date, -3); //число
            
            
            $data .= substr($date, -6, -3); //месяц
            
            $data .= '-';
            
            $data .= substr($date, 0, 4); //год
            
            $data = substr($data, 1);
            
            $data = str_replace("-", ".", $data);
   /* $pos = strpos($data, '.');
                if ($pos === false) {
                    $errors = "неправильный формат даты, пример: 28.01.2018";
                } else
                {
                    
                    if($pos == 2){
                  
                        $str = substr($data, 3);
                        $pos = strpos($str, '.');
                        if($pos == 2){
                            $length = iconv_strlen($data,'UTF-8');
                            if($length != 10){
                                $errors = "неправильный формат даты, пример: 28.01.2018";
                            }
                        }
                        else{
                            $errors = "неправильный формат даты, пример: 28.01.2018";
                        }
                    }
                    else{
                        $errors = "неправильный формат даты, пример: 28.01.2018";
                    }
                    

                }*/
            }

    if(empty($errors)){
        
        if($meta == 'select'){
            $post_info = $Select->get_select_where_fetch_assoc('img_post','id',$id);
            echo $post_info['title'].'<>'.$post_info['text'].'<>'.$post_info['date'].'<>'.$post_info['tags'];
        }
        
        if($meta == 'update'){
            $Update->update_where('img_post','title', $title, 'id', $id);
            $Update->update_where('img_post','text', $text, 'id', $id);
            $Update->update_where('img_post','tags', $tags, 'id', $id);
            $Update->update_where('img_post','data', $data, 'id', $id);
            $Update->update_where('img_post','date', $date, 'id', $id);
            echo 'данные успешно обновлены';
        }

        
    }
    else{
        echo $errors;
    }

    



 
