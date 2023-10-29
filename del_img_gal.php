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











    if(isset($_POST['do_add'])){
        
        $abc_put = './';
        
        global $mysqli;
        
        $albom =  $_POST['albom'];
        
        $proverka = new Proverka();
        
        $id = $proverka->proverka_input($albom);
            
            if(empty($id)){
                
                $errors = "Введите название альбома";
                
            }
            
            if(iconv_strlen($id) > 100){
                
                $errors = "Слишком длинное название альбома";
                
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


                                $alert = $Delete->get_delete_where('gallery','id',$id);



                        }
                        else{
                            $alert = "Такой картинки нету";
                        }
                
                
                    
                    
                
                
                
                
                
                
               
                
            }
            else{
                $alert = $errors;
                $errors = 'Ошибка';
            }
        
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
	</head>
	
	<body>
       
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	
	
                    
		
            <div class="container sign-admin mt-5 pt-5">
             <?php if (!empty($alert)): ?>
              <div class="alert alert-primary" role="alert">
        <button type="button" class="close" id="close-alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading"><?=$errors?></h4>
  <p id="text-alert"><?=$alert?>.</p>
</div>
 <? endif; ?>
 
  <form id="form_admin" action="/del_img_gal.php" method="POST" enctype="multipart/form-data">
  
  
  <div class="form-group row">
              <label class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input type="text" name="albom" class="form-control b-r" placeholder="Введите id картинки">
              </div>
            </div>
  
    
   
    
  


    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn color-block text-white b-r" name="do_add">Удалить</button>
      </div>
    </div>
  </form>
</div>
        
        
<script>
        $(function() {
    $('#close-alert').click(function(){

        
       $('.alert').fadeOut(300);

    });
});
        </script>
		<!-- footer -->
 
 <?php
        include "include/footer_p.php";
?>


