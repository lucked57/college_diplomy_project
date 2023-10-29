<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
require_once("PHPExcel.php");
    require_once("PHPExcel/Writer/Excel5.php");

 include "include/pr_cookie.php";

if($pr_cookie != "admin" && $pr_cookie != "teacher"){
        exit();
    }
$Pr = new Proverka();

$SQL = new SQL_native();

if($pr_cookie == 'teacher'){
    $who_in_login = $_COOKIE['login_teacher'];
}
else{
    $who_in_login = 'admin';
}


if(isset($_POST['do_add'])){
        
        $abc_put = './';
        
        global $mysqli;
        
       // $total = count($_FILES['image']['name']);
        
        $arr = [];

                                /*if(empty($arr[$name])){
                                        $arr[$name] = $post['score'];
                                    }
                                    else{
                                        $arr[$name] = $arr[$name] + $post['score'];
                                    }*/
        
       $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        
            
            


        
                   
                
                $uploadfile = $abc_put . basename($_FILES['image']['name']);
                
                    move_uploaded_file($file_tmp,$uploadfile);
                
                
                
                
                    $Insert = new Insert();
                
                    $Select = new Select();
                
                    $Update = new Update();
    
                    $Delete = new Delete();
    
    
                    $errors;
                //$Delete->get_delete_where('towar');
                
    
    //$posts = $Select->get_fetch_all('towar');
    
    /*foreach ($posts as $post){
        
        $Delete->get_delete_where('towar','id',$post['id']);
        
    }*/
                
                    //$File= $_FILES['image']['name'];
                $abc_put = './';
                
    $report = $_SERVER['DOCUMENT_ROOT'].'/'.$_FILES['image']['name']; 
    
    $objPHPExcel = PHPExcel_IOFactory::load($report);
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheetTitle     = $worksheet->getTitle();
        $highestRow         = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $nrColumns = ord($highestColumn) - 64;
        echo '<br><br><br><br><br>Data: <table border="1"><tr>';
        for ($row = 2; $row <= $highestRow; ++ $row) {
            echo '<tr>';
            $stack = array();
              
            for ($col = 0; $col < 9; ++ $col) {
                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                $val = $cell->getValue();
                array_push($stack, $val);
                //$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
                
                if($row == 2){
                
                switch ($col) {
                    case 0:
                        $Category = $val;
                        $Category = $Pr->proverka_input(trim($Category));
                        if(empty($Category)){
                            $errors = 'Категория пустая';
                        }
                        
                        $total = count($_FILES['images']['name']);
                            
                        for( $j=0 ; $j < $total ; $j++ ){
                            $file_name = $_FILES['images']['name'][$j];
                            $file_size = $_FILES['images']['size'][$j];
                            $file_tmp = $_FILES['images']['tmp_name'][$j];
                            $file_type = $_FILES['images']['type'][$j];
                            $file_ext = strtolower(end(explode('.', $_FILES['images']['name'][$j])));
                            
                            $imageinfo = getimagesize($_FILES['images']['tmp_name'][$j]);
                            if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
                              $errors = 'Неподдерживаемый тип файла min';
                             }
                        }
                        if(empty($errors)){
                            switch ($Category):
                                case 'Волонтерство':
                                    $Category = 'volunteering';
                                    break;
                                case 'Творчество':
                                    $Category = 'creation';
                                    break;
                                case 'Лекции(встречи)':
                                    break;
                                    $Category = 'lectures';
                                case 'Собрания':
                                    $Category = 'meetings';
                                    break;
                                case 'Спорт':
                                    $Category = 'sport';
                                    break;
                                case 'Другое':
                                    $Category = 'another';
                                    break;
                                default:
                                    $errors = "Данной категории не найдено";
                            endswitch;
                        }
                        break;
                    case 1:
                        $text = $val;
                        $text = $Pr->proverka_input(trim($text));
                        if(empty($text)){
                            $errors = 'Текст пустой';
                        }
                        break;
                    case 2:
                        $title = $val;
                        $title = $Pr->proverka_input(trim($title));
                        if(empty($title)){
                            $errors = 'Название пустое';
                        }
                        break;
                    case 3:
                        $data = $val;
                        $data = $Pr->proverka_input(trim($data));
                        if(empty($data)){
                            $errors = 'Дата пустая';
                        }
                        if(empty($errors)){
                        $pos = strpos($data, ' ');
                        if ($pos === false) {
                            $errors = "неправильный формат даты, пример: 28 01 2018";
                        } else
                        {

                            if($pos == 2){

                                $str = substr($data, 3);
                                $pos = strpos($str, ' ');
                                if($pos == 2){
                                    $length = iconv_strlen($data,'UTF-8');
                                    if($length != 10){
                                        $errors = "неправильный формат даты, пример: 28 01 2018";
                                    }
                                }
                                else{
                                    $errors = "неправильный формат даты, пример: 28 01 2018";
                                }
                            }
                            else{
                                $errors = "неправильный формат даты, пример: 28 01 2018";
                            }
                            $data = str_replace(' ', '.', $data);

                        }
                        }
                        break;
                    case 4:
                        $tags = $val;
                        $tags = $Pr->proverka_input(trim($tags));
                        if(empty($tags)){
                            $errors = 'теги пустые';
                        }
                        /*if(empty($errors)){
                        $pieces_area = explode(" ", $tags);
                         array_push($pieces_area, "apple");
                         $end_pieces = end($pieces_area);
                         $i = 0;

                        do
                           {
                           echo $pieces_area[$i];

                            $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                        }*/
                        break;
                  /*  case 5:
                        $groupe = $val;
                        $groupe = $Pr->proverka_input(trim($groupe));
                        if(empty($groupe)){
                            $errors = 'группа пустая';
                        }
                        if(empty($errors)){
                            $groupe_name = $Select->get_select_where_fetch_assoc('Group_name','name',$groupe);
                            if(!empty($groupe_name['name'])){
                                $groupe = $groupe_name['name'];
                            }
                            else{
                                $errors = 'группы '.$groupe.' не найдено';
                            }
                        }
                        break;*/
                    case 5:
                        $teacher = $val;
                        $teacher = $Pr->proverka_input(trim($teacher));
                        if(empty($teacher)){
                            $errors = 'преподаватель пустой';
                        }
                        if(empty($errors)){
                            $teacher_pr = $Select->get_select_where_fetch_assoc('teatchers_anketa','Name',$teacher);
                            if(!empty($teacher_pr['Name'])){
                                $teacher = $teacher_pr['Name'];
                                $teacher_login = $teacher_pr['login'];
                            }
                            else{
                                $teacher = 'admin';
                                $teacher_login = 'admin';
                            }
                        }
                        break;
                    case 6:
                        $level = $val;
                        $level = $Pr->proverka_input(trim($level));
                        if(empty($level)){
                            $errors = 'уровень пустой';
                        }
                        break;
                    case 7:
                        $user_connect = $val;
                        $user_connect = $Pr->proverka_input(trim($user_connect));
                        $users = '';
                        if(empty($user_connect)){
                            $errors = 'user пустая';
                        }
                        
                        
                        
                         $pieces_area = explode(",", $user_connect);
                         array_push($pieces_area, "apple");
                         $end_pieces = end($pieces_area);
                         $i = 0;

                        do
                           {
                            $pieces_user = explode("-", $pieces_area[$i]);
                            $FIO = trim($pieces_user[0]);
                            $score = trim($pieces_user[1]);
                            $pr_fio = $Select->get_select_where_fetch_assoc('Students_anketa','FIO',$FIO);
                            if(!empty($pr_fio['FIO']) && !empty($score)){
                                $FIO = $pr_fio['FIO'];
                                $users .= ' '.$pr_fio['students_login'];
                            }
                            else{
                                $errors = 'ФИО '.$FIO.' не найдено или нету баллов';
                            }
                            $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                        
                        
                        if(empty($errors)){
                            
                            
                           
                        
                            
                        $users = trim($users);
                            
                       /* $SQL->query("insert into img_post (category, text, title, data, tags, type, user_connect, level, group_name, teacher) values ('$Category','$text','$title','$data','$tags','close', '$users','$level','$groupe', '$who_in_login')");*/
                        $SQL->query("insert into img_post (category, text, title, data, tags, type, user_connect, level, teacher) values ('$Category','$text','$title','$data','$tags','close', '$users','$level', '$who_in_login')");
                            
                        $last_id = $mysqli->insert_id; 
                            
//////////////////////////Картинка
                        $total = count($_FILES['images']['name']);
                            
                        for( $j=0 ; $j < $total ; $j++ ){
                            $file_name = $_FILES['images']['name'][$j];
                            $file_size = $_FILES['images']['size'][$j];
                            $file_tmp = $_FILES['images']['tmp_name'][$j];
                            $file_type = $_FILES['images']['type'][$j];
                            $file_ext = strtolower(end(explode('.', $_FILES['images']['name'][$j])));
                            
                            $imageinfo = getimagesize($_FILES['images']['tmp_name'][$j]);
                            if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
                              $errors = 'Неподдерживаемый тип файла min';
                             }
                            
                            
                            clearstatcache();
                    
                            $img_name = new Downloading_img(); 

                            $name_img = $img_name->generate_name_for_img(50);

                            $full_img_name = $name_img;

                            $_FILES['images']['name'][$j]=$name_img."full.jpeg";

                            $uploads_dir = $abc_put.'img/img_post/';

                            $uploadfile = $uploads_dir . basename($_FILES['images']['name'][$j]);

                            move_uploaded_file($file_tmp,$uploadfile);

                            $file = './img/img_post/'.$name_img.'full.jpeg';
                            $copyfile = './img/img_post/'.$name_img.'min.jpeg';

                            if (!copy($file, $copyfile)) {
                                echo "не удалось скопировать $file...\n";
                            }
                            
                            if(filesize($copyfile) > 30000) {
                    
                
                
                            $i = 0;
                            $percent = 1;
                            do{



                                list($width, $height) = getimagesize($copyfile);

                                $new_width = $width * $percent;
                                $new_height = $height * $percent;
                                $image_p = imagecreatetruecolor($new_width, $new_height);




                                if($percent > 0.019){
                                   $percent = $percent - 0.019; 
                                }

                                if($i > 100){
                                    break;
                                }

                                $i++;

                            }while($new_width > 600 || $new_height > 600);


                            $image_p = imagecreatetruecolor($new_width, $new_height);
                            $i = 0;




                          if (exif_imagetype($copyfile) == IMAGETYPE_JPEG) {
                                        $image = imagecreatefromjpeg($copyfile);
                                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                        imagejpeg($image_p, $copyfile, 70);
                                 }

                        if (exif_imagetype($copyfile) == IMAGETYPE_PNG) {
                                        $image = imagecreatefrompng($copyfile);
                                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                        imagepng($image_p, $copyfile, 9, 30);
                                  }
                  
                        }
                            
                            
                            $file_put = 'img/img_post/'.$full_img_name.'min.jpeg';
                
                            $file_put_full = 'img/img_post/'.$full_img_name.'full.jpeg';
                            
                            $img_sel = $Select->get_select_where_fetch_assoc('img_post','id',$last_id);
                            
                            if(!empty($file_put) && !empty($file_put_full)){
                                $Update->update_where('img_post','img_min', $img_sel['img_min']." ".$file_put, 'id', $last_id);
                                $Update->update_where('img_post','img_full', $img_sel['img_full']." ".$file_put_full, 'id', $last_id);
                            } 
                            
                            
                        }   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        $pieces_area = explode(",", $user_connect);
                         array_push($pieces_area, "apple");
                         $end_pieces = end($pieces_area);
                         $i = 0;

                        do
                           {
                            $pieces_user = explode("-", $pieces_area[$i]);
                            $FIO = trim($pieces_user[0]);
                            $score = trim($pieces_user[1]);
                            $pr_fio = $Select->get_select_where_fetch_assoc('Students_anketa','FIO',$FIO);
                            if(!empty($pr_fio['FIO']) && !empty($score)){
                                $FIO = $pr_fio['FIO'];
                                $login = $pr_fio['students_login'];
                                $SQL->query("insert into users_score (id_post, user_login, login, score, verify) values ('$last_id','$login','$teacher_login','$score','')");
                                //$arr[$login] = $login;
                            }
                            else{
                                $errors = 'ФИО '.$FIO.' не найдено';
                            }
                            $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                        }
                        break;
                }
                
                //if(empty($errors)){
                    
               // }
               // else{
                //    echo $errors;
               // }
                
                
                }
                else{
                    if($col == 7){



                        $user_connect = $val;
                        $pieces_user = explode("-", $user_connect);
                        $FIO = trim($pieces_user[0]);
                        $score = trim($pieces_user[1]);
                        $pr_fio = $Select->get_select_where_fetch_assoc('Students_anketa','FIO',$FIO);
                        $users_connect_s = $Select->get_select_where_fetch_assoc('img_post','id',$last_id);
                        if(!empty($pr_fio['FIO']) && !empty($score)){
                            $FIO = $pr_fio['FIO'];
                            $login = $pr_fio['students_login'];
                            $pr_score = $SQL->query("select * from users_score where id_post = '$last_id' and user_login = '$login'");
                            if(empty($pr_score)){
                                $SQL->query("insert into users_score (id_post, user_login, login, score, verify) values ('$last_id','$login','$teacher_login','$score','')");
                                $Update->update_where('img_post','user_connect', $users_connect_s['user_connect'].' '.$login, 'id', $last_id);
                            }
                            else{
                               $errors = 'ФИО '.$FIO.' уже добавлен'; 
                            }
                            

                        }
                        else{
 
                                $errors = 'ФИО '.$FIO.' не найдено';

                        }
                      /* $pieces_area = explode(",", $user_connect);
                         array_push($pieces_area, "apple");
                         $end_pieces = end($pieces_area);
                         $i = 0;

                        do
                           {
                            $pieces_user = explode("-", $pieces_area[$i]);
                            $FIO = trim($pieces_user[0]);
                            $score = trim($pieces_user[1]);
                            $pr_fio = $Select->get_select_where_fetch_assoc('Students_anketa','FIO',$FIO);
                            if(!empty($pr_fio['FIO']) && !empty($score)){
                                $FIO = $pr_fio['FIO'];
                                $login = $pr_fio['students_login'];
                                $SQL->query("insert into users_score (id_post, user_login, login, score, verify) values ('$last_id','$login','$teacher_login','$score','')");
                            }
                            else{
                                $errors = 'ФИО '.$FIO.' не найдено';
                            }
                            $i++;
                        }while($pieces_area[$i]!=$end_pieces);*/
                    }
                    
                }
                
              // echo '<td>' . $val . ' <br></td>';
            }
            
        
          /*          
                   echo '<td>' . $stack[0] . '<br></td>';
            echo '<td>' . $stack[1] . '<br></td>'; 
             echo '<td>' . $stack[2] . '<br></td>'; 
             echo '<td>' . $stack[3] . '<br></td>'; 
            echo '<td>' . $stack[4] . '<br></td>';
            echo '<td>' . $stack[5] . '<br></td>';
            echo '<td>' . $stack[6] . '<br></td>';
            echo '<td>' . $stack[7] . '<br></td>';
            echo '<td>' . $stack[8] . '<br></td>';*/
             //$Insert->insert_values_four("towar","About","Prixod","Rashod","img",$stack[0],$stack[1],$stack[2],$stack[3]);       
                
            echo '</tr>';
            //$row = $highestRow; 
        }
        echo '</table>';
    }
      
                
                   
                    
            
                  //  $Insert->insert_values_four("towar","img","About","Rashod","Prixod",$file_put,$about,$Rashod,$Prixod);

       

                    
                    

                
     
        
        
        
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>сайт</title>
        <meta name="keywords" content="...">
        <meta name="description" content="ключевые слова для посика страницы, теги">
        <meta name="author" lang="ru" content="Илья Алексеевич(авторство)">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
     <?php include "include/header_p.php" ?>
       
    <?php include "include/forms_not_sign_in.php"; ?>
    </head>
<body>
     <div class="container-fluid" id="top">

    
            <div class="row justify-content-around mt-5 pt-5">


                    <div class="col-md-4">
                        <form action="excel_import.php" method="POST" enctype="multipart/form-data"> 
                            <div class="card">
                            <?php if(!empty($errors)):?>
                                
                                    <p><?=$errors?></p>
                     
                                <?php endif;?>
                             <img class="card-img-top" src="img/cd-bg/RWhFpz.png">
                              <div class="card-img-overlay">
                                   <div class="custom-file text-center">
                                       <div class="col  align-self-center">
                                        <input name="image" type="file" id="customFile" class="mt-5 pt-md-5" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1667d4452c9%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1667d4452c9%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.421875%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E">
                              <div class="card-img-overlay" style="margin-top: 100%;">
                                   <div class="custom-file text-center">
                                       <div class="col  align-self-center">
                                        <input name="images[]" type="file" multiple="multiple" id="customFile" accept="image/png,image/jpeg" class="mt-5 pt-md-5"/>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
    
                                
                                
                                
                                
                               
                                
                              </div>
                            </div>
                            
       
       
                            <button  class="btn btn-primary btn-block b-r my-5" type="submit" name="do_add">Загрузить</button>
                       </form>
                    </div>



          </div>
    </div>
</body>
</html>
<?php
        include "include/footer_p.php";
?>