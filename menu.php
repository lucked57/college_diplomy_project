	<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>
	<?php 
    if(isset($_COOKIE['login_admin'])){
        
                    $login = $_COOKIE['login_admin'];

                    $Select = new Select();
                    
                    $table_name = "admins";
                    
                    $pole_name = "login_admins";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_admin'])){
                        
                        $pr_cookie = "admin";
                        
                    }
    }
    elseif(isset($_COOKIE['login'])){
        
                    $login = $_COOKIE['login'];

                    $Select = new Select();
                    
                    $table_name = "users";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }
        
    }
    elseif(isset($_COOKIE['login_teacher'])){

                    $login = $_COOKIE['login_teacher'];

                    $Select = new Select();
                    
                    $table_name = "teachers";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_teacher'])){
                        
                        $pr_cookie = "teacher";
                        
                    }

    }
?>
	<script src="js/jquery-3.3.1.min.js"></script>
<script>
    
    function funcSuccess_messenge(data){
    //alert(data);
        messenge = data;
        $('.messenge_href p').html('Уведомления: '+messenge);
    }
    
    
    function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
        
        var login_cookie = getCookie ("login");

if(login_cookie.length > 0){
    
    setInterval(function() {
   $.ajax({
                url: "update_messnge.php",
                type: "POST",
                data: ({
                    login: login_cookie,
                }),
                dataType: "html",
                success: funcSuccess_messenge
            });
}, 10000);
    
}
    
</script>

	<header class="cd-header">
		
<?php
            if($pr_cookie == "user"){
                
                $select = new Select();
                
                $table_name = "Messenge_for_users";
                
                $pole_name = "login";
                
                $name = $_COOKIE['login'];
                
                $notice = $select->get_num_rows_where($table_name,$pole_name,$name);
            }
        ?>
		<nav class="cd-main-nav">
			<ul>
			<?php if($pr_cookie == "admin"):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li id="add_admins_href"><p>Добавить</p></li>
				<li><a href="#0">Email</a></li>
				<li><a href="#0">Подписчики</a></li>
				<li><a href="#0">Посты</a></li>
				<!--<li><a href="#0"><?=$pr_cookie?></a></li>-->
				<?php elseif($pr_cookie == "user"):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
              <li id="search_href"><p>Поиск</p></li>
				<li id="contact_href_s"><p>Контакты</p></li>
				<li id="achivka_add"><p>Добавить</p></li>
				<a href="all_achivka_port.php"><li>Изменить</li></a>
				<li id="anketa_href"><p>Анкета</p></li>
				<!--<a href="messenge_port.php" title="У вас <?=$notice?> новых сообщейний"><li>Уведомления: <?=$notice?></li></a>-->
				<li class="messenge_href"><p>Уведомления: <?=$notice?></p></li>
				<?php elseif($pr_cookie == "teacher"):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
              <li id="search_href"><p>Поиск</p></li>
                <li><a href="info_for_teatchers.php">Группа</a></li>
              <li><a href="all_achivka_for_teachers.php">Достижения</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li id="anketa_t_href"><p>Анкета</p></li>
				<?php else: ?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li id="search_href"><p>Поиск</p></li>
				<li><a href="#0">Новости</a></li>
				<li><a href="#0">Помощь</a></li>
				<?php endif;?>
			</ul>
		</nav> 
		<div class="before-nav">
		<nav class="cd-main-nav-mobile">
			<ul>
			<?php if($pr_cookie == "admin"):?>
				<a title="Вернуться на главную" href="index_port.php"><li>Главная</li></a>
				<li id="add_admins_href"><p>Добавить</p></li>
				<a href="#0"><li>Email</li></a>
				<a href="#0"><li>Подписчики</li></a>
				<a href="#0"><li>Посты</li></a>
				<?php elseif($pr_cookie == "user"):?>
				<!--<li id="accoint_st_href"><p><?php echo $_COOKIE['login']; ?></p></li>-->
				<li id="pass_href"><p>Аккаунт</p></li>
              <li id="search_href"><p>Поиск</p></li>
				<li id="contact_href_s"><p>Контакты</p></li>
				<li id="achivka_add"><p>Добавить</p></li>
				<a href="all_achivka_port.php"><li>Изменить</li></a>
				<li id="anketa_href"><p>Анкета</p></li>
				<a href="logout_port.php"><li>Выйти</li></a>
				<!--<a href="messenge_port.php" title="У вас <?=$notice?> новых сообщейний"><li>Уведомления: <?=$notice?></li></a>-->
				<li class="messenge_href"><p>Уведомления: <?=$notice?></p></li>
				<?php elseif($pr_cookie == "teacher"):?>
				<li id="pass_href_t"><p>Аккаунт</p></li>
              <li id="search_href"><p>Поиск</p></li>
				<a href="info_for_teatchers.php"><li>Группа</li></a>
              <li><a href="all_achivka_for_teachers.php">Достижения</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li id="anketa_t_href"><p>Анкета</p></li>
				<a href="logout_port.php"><li>Выйти</li></a>
				<?php else: ?>
				<!--<a href="login_port.php"><li>Войти</li></a>
				<a href="signup_port.php"><li>Регистрация</li></a>-->
				<li id="login_href"><p>Войти</p></li>
            <li id="sigh_href"><p>Регистрация</p></li>
				 <li id="contact_href"><p>Контакты</p></li>
				<li id="search_href"><p>Поиск</p></li>
				<a href="#0"><li>Новости</li></a>
				<a href="#0"><li>Помощь</li></a>
				<?php endif;?>
			</ul>
		</nav> 
		</div>
		<nav class="left-cd-nav">
           <?php if($pr_cookie == "admin"):?>
            <ul>
                <li><a href="logout_admins_port.php" ><button class="button button--wayra">Выйти</button></a></li>
                <li><a href="accountinfo_admins_port.php"><button class="button button--wayra"><?php echo $_COOKIE['login_admin']; ?></button></a></li>
		    </ul>
           <?php elseif($pr_cookie == "user"):?>
           <ul>
		        <li><a href="logout_port.php" ><button class="button button--wayra">Выйти</button></a></li>
				<li id="pass_href"><button class="button button--wayra">Аккаунт</button></li>
             <!--<li id="accoint_st_href"><p><?php echo $_COOKIE['login']; ?></p></li>-->
		    </ul>
           <?php elseif($pr_cookie == "teacher"):?>
           <ul>
               <li><a href="logout_port.php" ><button class="button button--wayra">Выйти</button></a></li>
               <li id="pass_href_t"><button class="button button--wayra">Аккаунт</button></li>
		    </ul>
           <?php else: ?>
            <ul class="login">
            <li id="login_href"><button class="button button--wayra">Войти</button></li>
            <li id="sigh_href"><button class="button button--wayra">Регистрация</button></li>
            <!--  <li id="login_href"><button class="button button--wayra">Войти</button></li>
            <li id="sigh_href"><button class="button button--wayra">Регистрация</button></li>
		      <li><a href="login_port.php" >Войти</a></li>
				<li><a href="signup_port.php">Регистрация</a></li>-->
		    </ul>
		    <?php endif;?>
		</nav>
		
		<nav class="left-cd-nav-mobile">
           <?php if($pr_cookie == "admin"):?>
            <ul class="login">
		        <li><a href="logout_admins_port.php" >Выйти</a></li>
				<li><a href="accountinfo_admins_port.php"><?php echo $_COOKIE['login_admin']; ?></a></li>
		    </ul>
           <?php elseif($pr_cookie == "user"):?>
           <ul class="login">
				<li><a title="Вернуться на главную" href="index_port.php">На главную</a></li>
		    </ul>
           <?php elseif($pr_cookie == "teacher"):?>
           <ul class="login">
		        <li><a title="Вернуться на главную" href="index_port.php">На главную</a></li>
		    </ul>
           <?php else: ?>
            <ul class="login">
		        <li><a title="Вернуться на главную" href="index_port.php">На главную</a></li>
		    </ul>
		    <?php endif;?>
		</nav>
	</header>
	
	<div class="modal" id="modal_div">
	    
	</div>
	<div class="modal-div-m"></div>


	<div class="messenge" id="messenge_login">
        <div class="close-messenge" id="close_messenge"></div>
	    <p></p>
	</div>



<div id="messenge_href_study" class="messenge_href5">
        <div class="close-messenge" id="close_messenge5"></div>
	    <p></p>
	</div>

<div class="search" id="search_div">
	<div class="close search_close" id="close_search"></div>
  
  <input id="search_query"type="text" placeholder="Искать здесь..." name="query_search">
  <button type="submit"></button>
  <ul class="search_result">
  </ul>
  
</div>


	
	<div class="contact-div" id="contact_div">
       <div class="close" id="close_contact"></div>
        <p><a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения" title="Вы получите ответное письмо на ваш email">Написать на email</a></p>
    </div>
	
		<div class="signup-div prozr" id="loading_div">
      
          <div class="ajax_loader">  <span class="cssload-loader"><span class="cssload-loader-inner"></span></span></div>
            
	</div>




<div class="signup-div" id="change_email_div">
      
	     <div id="upsign" class="upsign"><p></p></div>
	      
	
     
   <div class="close" id="close_change_email"></div>
   
    
       <br><br>
        <input placeholder="Введите email" id="email_C" maxlength="40" class="input top" type="email" name="login">
    <br>

    <p>

       <input placeholder="Введите код" id="inputkod_change_email" class="inputkod" type="text" maxlength="5" name="kod">
        </p>
        <div class="again-code" id="again_change_email_code"><p>Отправить повторно</p></div>
        <div class="again-code" id="again_change_email_code_after"><p>Отправить повторно</p></div>
       <br>
   
   
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="email" id="do_change_email_ajax">Подтвердить</button>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="email" id="do_change_email_ajax_after">Подтвердить</button>
    </p>

      
             
            
	</div>
	
	
	<div class="signup-div" id="login_div">
      
	     <div id="upsign" class="upsign"><p></p></div>
	      
	
     
   <div class="close" id="close_login"></div>
   
    <form id="form_login" onsubmit="return false">
       
        <input placeholder="Введите логин" id="login_l" maxlength="40" class="input top" type="text" name="login">
    
    <br>
    
    
    <input placeholder="Введите пароль" id="pass_l" maxlength="40" class="input" type="password" name="password">
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_login_ajax">Авторизироваться</button>
    </p>
   <div class="cant_login" id="new_pass">
  <p>Восстановить пароль</p>
</div>
             <div class="cant_login right" id="cant-login-right">
   <p>Нету аккаунта?</p>
</div>
             </form>   
             
             
                 <form id="form_login_after" onsubmit="return false">
   <input placeholder="Введите логин" id="login_l" maxlength="40" class="input top" type="text" name="login">
    
    <br>
    
    
    <input placeholder="Введите пароль" id="pass_l" maxlength="40" class="input" type="password" name="password">
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_login_ajax">Авторизироваться</button>
    </p>
   <div class="cant_login">
  <p>Восстановить пароль</p>
</div>
             <div class="cant_login right" id="cant-login-right">
   <p>Нету аккаунта?</p>
</div>
             </form>  
             
	</div>
	






	<div class="signup-div" id="sign_div">

	      <div id="upsign" class="upsign"><p></p></div>

			    
			    
			    <div class="close" id="close_sing"></div>

        <input placeholder="Введите логин" id="login_s"class="input top" required="required" type="text" maxlength="40" name="login" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите email" id="email_s" class="input" type="email" required="required" maxlength="40" name="email"value="<?php echo @$data['email'];?>">
    
    
    <br>
    
    

    <input placeholder="Введите пароль" id="pass_s" class="input" required="required" maxlength="40" type="password" name="password"value="<?php echo @$data['password'];?>">
    <br>

    <input placeholder="Введите пароль" id="pass_again_s" class="input" required="required" maxlength="40" type="password" name="password"value="">
    <br>

    
    
    
    

    
    <p>

       <input placeholder="Введите код" id="inputkod_sign" class="inputkod" type="text" maxlength="5" name="kod" value="<?php echo @$data['kod'];?>">
        </p>
        <div class="again-code" id="again_sign_code"><p>Отправить повторно</p></div>
       <br>
       

       <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" id="do_sign_ajax" name="do_signup">Зарегистрироваться</button>
    </p>
  
               <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_sign_ajax_after">Зарегистрироваться</button>
    </p>     
               
	</div>
