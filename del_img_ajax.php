<?php include "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';

    if($pr_cookie != "admin"){
        exit();
        echo $pr_cookie;
    }

    $errors;

    $alert;

        
        $abc_put = './';
        
        global $mysqli;
        
        $id =  $_POST['id'];
        
        $proverka = new Proverka();
        
        $id = $proverka->proverka_input($id);
            
            if(empty($id)){
                
                $errors = "Введите название id альбома";
                
            }
            
            if(iconv_strlen($id) > 100){
                
                $errors = "Слишком длинное id альбома";
                
            }
        
    
    
            
        
            if(empty($errors)){
                
                    $Insert = new Insert();
                
                    $Select = new Select();
                
                    $Update = new Update();
                
                    $Delete = new Delete();
                
                    $card_info = $Select->get_select_where_fetch_assoc('gallery','id',$id);
            
                        if(!empty($card_info)){


                                unlink($abc_put.$card_info['img_full']);

                                unlink($abc_put.$card_info['img_min']);


                                $Delete->get_delete_where('gallery','id',$id);
                            
                                $pr_img = $Select->get_select_where_fetch_assoc('gallery','albom',$card_info['albom']);

                                if(empty($pr_img['albom'])){
                                    $Delete->get_delete_where('Alboms','name',$card_info['albom']);
                                }
                            
                                
                                echo 'Картинка успешно удалена';


                        }
                        else{
                            echo "Такой картинки нету";
                        }
                
                
                    
                    
                
                
                
                
                
                
               
                
            }
            else{
                echo $errors;
            }
        
        
        
    

?>