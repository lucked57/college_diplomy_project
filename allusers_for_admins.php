<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
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
	<title>Админ</title>
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
    ?>
 <?php
 $login = $_COOKIE['login_admin'];
    $admins_posts = find_cookie_for_admin($login);
        
        foreach ($admins_posts as $pass)
        {
            $cookie_code = $pass['code'];
        }
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_admin'])):?>
<div id="admins">
    




<div id="adminsafter">
<div id="allusers_for_admins_search">
   
									<form action="/allusers_for_admins.php" method="POST">
									  <input class="search_admin"type="text" name="query_users_id" placeholder="Поиск по id" value="<?php echo @$_POST['query_users_id'];?>">
								 <br>
									 <input class="search_admin"type="text" name="query_users_login" placeholder="Поиск по login" value="<?php echo @$_POST['query_users_login'];?>">
								<br>
									 <input class="search_admin"type="text" name="query_users_email" placeholder="Поиск по email" value="<?php echo @$_POST['query_users_email'];?>">
								<br>
									 <input class="search_admin"type="text" name="query_users_fio" placeholder="Поиск по fio" value="<?php echo @$_POST['query_users_fio'];?>">
								<br>
									 <input class="search_admin"type="text" name="query_users_data" placeholder="Поиск по data" value="<?php echo @$_POST['query_users_data'];?>">
									
									<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_search">Найти</button>
    </p>
    </form>
</div>

<?php
									if(isset($_POST['do_search']) ){
                                        
                                    $query_users_id = $_POST['query_users_id'];
                                        
                                    $query_users_login = $_POST['query_users_login'];
                                        
                                    $query_users_email = $_POST['query_users_email'];
                                        
                                    $query_users_fio = $_POST['query_users_fio'];
                                        
                                    $query_users_data = $_POST['query_users_data'];
                                        
                                        
                                        global $link;
                                        
                                        $query_users_id = mysqli_real_escape_string($link,$query_users_id);
                                        
                                        $query_users_login = mysqli_real_escape_string($link,$query_users_login);
                                        
                                        $query_users_email = mysqli_real_escape_string($link,$query_users_email);
                                        
                                        $query_users_fio = mysqli_real_escape_string($link,$query_users_fio);
                                        
                                        $query_users_data = mysqli_real_escape_string($link,$query_users_data);
                                        
                                        if(!empty($query_users_id) or !empty($query_users_login) or !empty($query_users_email) or !empty($query_users_fio) or !empty($query_users_data)){
                                            
                                           $info_from_userstable = get_search_from_userstable($query_users_id, $query_users_login, $query_users_email, $query_users_fio, $query_users_data); 
                                            
                                        }
                                        
                                        
                                        
                                            
                                            
                                        if(!empty($info_from_userstable))
                                        {
                                            
                                        
                                        ?>
                                        <div id="contentposts">
                                        
                                        <?php if (!empty($info_from_userstable)): ?>
        <?php foreach ($info_from_userstable as $info):?>
          <a href="info_adout_users.php?post_id=<?=$info['id']?>">
           <div id="blockpostinfousers">
            <p id="contentpost">
            ID: <?=$info['id']?><br><br>
            Логин: <?=$info['login']?><br><br>
            Почта: <?=$info['email']?>
            </p>
             <p></p>
        </div>
        </a>
        <?php    endforeach;?>
        <?php endif; ?>
        <div id="postsafter">
            
        </div>
    </div>
     </div>                                   
                           
                                   <?php            
                                    }
   

                                        
   }                                     
else{
    

    
    
    
$info_login = get_accountinfo_for_admins();

        ?>
        <div id="contentposts">
        <?php foreach ($info_login as $info):?>
          <a href="info_adout_users.php?post_id=<?=$info['id']?>">
           <div id="blockpostinfousers">
            <p id="contentpost">
            ID: <?=$info['id']?><br><br>
            Логин: <?=$info['login']?><br><br>
            Почта: <?=$info['email']?><br><br>
            <?php
                                       // var_dump ($info_login);
                                        ?>
            </p>
             <p></p>
        </div>
        </a>
        <?php    endforeach;?>
        <div id="postsafter">
            
        </div>
    </div>
    </div>
        

    
    
    

<?php
    }
    
    
    include 'admins_menu.php';

    
    
        ?>
    <?php else: ?>
				<p id="Admins_block">Войдите под админом!</p>
				<?php endif;?>
				
				
   <?php
    include 'podval_port.php';
    ?>
    
	