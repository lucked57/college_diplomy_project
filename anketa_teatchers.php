<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>
<?php
$data=$_POST;

$login = $_COOKIE['login_teacher'];

$pr_cookie = new Proverka_cookie();
    
$pr_cookie = $pr_cookie->find_cookie_for_teatchers($login);
     
global $mysqli;

            $cookie_code = $pr_cookie['code'];

$table_name = "teatchers_anketa";
        $pole_name = "login";  
    
    $login = $_COOKIE['login_teacher'];

    $select_pr = new Select();
        $select_pr = $select_pr->get_select_where_fetch_assoc($table_name,$pole_name,$login);


    
    if((isset($data['do_login'])) and (!empty($select_pr)))
{
    $errors = array();
    
    
    $FIO = $data['FIO'];
    $Gpoupe_name = $data['Groupe_name'];
    
    $FIO = $mysqli->real_escape_string(trim($FIO));
    
   $Gpoupe_name = $mysqli->real_escape_string(trim($Gpoupe_name));
    
    $Groupe_name = mb_strtoupper($Groupe_name, 'UTF-8');
      
       
        
    
    
    
    if((!empty($FIO)) and (!empty($Gpoupe_name))){
        
        $table_name = "Group_name";
        $pole_name = "name";
        
        $select_update = new Select();
        $select_update = $select_update->get_num_rows_where($table_name,$pole_name,$Gpoupe_name);
        
        if(!empty($select_update)){
            
            $login = $_COOKIE['login_teacher'];
            
            $Teachers_update = new Teachers_anketa();
            
            $FIO = $data['FIO'];
            $Gpoupe_name = $data['Groupe_name'];
            
            $alert = $Teachers_update->update_anketa($Gpoupe_name,$FIO,$login);
            
        }
        else{
            $errors[] = 'Группы '.$Gpoupe_name.' нету в бд';
        }
        
    }
    else{
        $errors[] = 'Заполните все поля!';
    }
        
}
    


    


if((isset($data['do_login'])) and (empty($select_pr)))
{
    $errors = array();
    
    
    $FIO = $data['FIO'];
    $Gpoupe_name = $data['Groupe_name'];
    
    $FIO = $mysqli->real_escape_string(trim($FIO));
    
   $Gpoupe_name = $mysqli->real_escape_string(trim($Gpoupe_name));
    
    $Groupe_name = mb_strtoupper($Groupe_name, 'UTF-8');
      
       
        
    
    
    
    if((!empty($FIO)) and (!empty($Gpoupe_name))){
        
        $table_name = "Group_name";
        $pole_name = "name";
        
        $select = new Select();
        $select = $select->get_num_rows_where($table_name,$pole_name,$Gpoupe_name);
        
        if(!empty($select)){
            
            $login = $_COOKIE['login_teacher'];
            
            $Teachers = new Teachers_anketa();
            
            $alert = $Teachers->insert_anketa($Gpoupe_name,$FIO,$login);
            
        }
        else{
            $errors[] = 'Группы '.$Gpoupe_name.' нету в бд';
        }
        
    }
    else{
        $errors[] = 'Заполните все поля!';
    }
        
}
    
if(!empty($select_pr)){
    
    $data['FIO'] = $select_pr["Name"];
    $data['Groupe_name'] = $select_pr["Group_name"];
    }
?>

<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Портфолио студентов ККМТ">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">
      <?php
        include 'style.php';
    ?> 
	<script src="js/modernizr.js"></script> 
  	  	<link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
  	<script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/loading_an_v1.05.js"></script>
	<title>Регистрация</title>
</head>
<body>
  <div id="p_prldr"><div class="contpre">
 <div class="cssload-container">
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading"></span>
		</li>
</div>	
   Подождите<br><small>идет загрузка...</small></div></div>
	<?php
        include 'menu.php';
   if(isset($_COOKIE['login_teacher'])){
        
        include 'pass_change_t.php';
        
    }
    ?>

	<?php if(password_verify($cookie_code, $_COOKIE['code_teacher'])):?>
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">

    <?php
               // var_dump($teatchers_login);
                if(!empty($alert)){
                   echo '<div id="upsign"><p>'.$alert.'</p></div>'; 
                }
                
                
                
                if(!empty($errors))
       
    {
        echo '<div id="upsign"><p>'. array_shift($errors).'</p></div>';
    }
                ?>
			    
			    
			    
			    <form action="/anketa_teatchers.php" method="POST">
     
   
    
        <input placeholder="Введите ваше ФИО" class="input" type="text" name="FIO" required="required" value="<?php echo @$data['FIO'];?>">
    
    <br>
   
     <input placeholder="Введите номер вашей группы" class="input" type="text" name="Groupe_name" required="required" value="<?php echo @$data['Groupe_name'];?>">
    
    <br>
   

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login">Подтвердить</button>
    </p>
                </form>
			</div>
			

    
			
		</div>   
<div class="blur">
     <?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
    <?php
    include 'podval_port.php'
    ?>