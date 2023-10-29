	<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>
	
	
	<header class="cd-header">
		
<?php
            if(isset($_COOKIE['login'])){
                
                $select = new Select();
                
                $table_name = "Messenge_for_users";
                
                $pole_name = "login";
                
                $name = $_COOKIE['login'];
                
                $notice = $select->get_num_rows_where($table_name,$pole_name,$name);
            }
        ?>
		<nav class="cd-main-nav">
			<ul>
			<?php if(isset($_COOKIE['login_admin'])):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li><a href="#0">Пользователи</a></li>
				<li><a href="#0">Email</a></li>
				<li><a href="#0">Подписчики</a></li>
				<li><a href="#0">Посты</a></li>
				<?php elseif(isset($_COOKIE['login'])):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li><a href="all_achivka_port.php">Достижения</a></li>
				<li><a href="anketa_port.php">Анкета</a></li>
				<li><a href="messenge_port.php" title="У вас <?=$notice?> новых сообщейний">Уведомления: <?=$notice?></a></li>
				<?php elseif(isset($_COOKIE['login_teacher'])):?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li><a href="anketa_teatchers.php">Анкета</a></li>
				<li><a href="#0">Группа</a></li>
				<li><a href="#0">Новости</a></li>
				<?php else: ?>
				<li><a title="Вернуться на главную" href="index_port.php">Главная</a></li>
				<li id="contact_href"><p>Контакты</p></li>
				<li><a href="#0">Галерея</a></li>
				<li><a href="#0">Новости</a></li>
				<li><a href="#0">Помощь</a></li>
				<?php endif;?>
			</ul>
		</nav> 
		<div class="before-nav">
		<nav class="cd-main-nav-mobile">
			<ul>
			<?php if(isset($_COOKIE['login_admin'])):?>
				<a title="Вернуться на главную" href="index_port.php"><li>Главная</li></a>
				<a href="#0"><li>Пользователи</li></a>
				<a href="#0"><li>Email</li></a>
				<a href="#0"><li>Подписчики</li></a>
				<a href="#0"><li>Посты</li></a>
				<?php elseif(isset($_COOKIE['login'])):?>
				<!--<li id="accoint_st_href"><p><?php echo $_COOKIE['login']; ?></p></li>-->
				<a href="accountinfo_port.php"><li><?php echo $_COOKIE['login']; ?></li></a>
				<li id="contact_href"><p>Контакты</p></li>
				<a href="all_achivka_port.php"><li>Достижения</li></a>
				<a href="anketa_port.php"><li>Анкета</li></a>
				<a href="logout_port.php"><li>Выйти</li></a>
				<a href="messenge_port.php" title="У вас <?=$notice?> новых сообщейний"><li>Уведомления: <?=$notice?></li></a>
				<?php elseif(isset($_COOKIE['login_teacher'])):?>
				<a href="info_for_teatchers.php"><li><?php echo $_COOKIE['login_teacher']; ?></li></a>
				<li id="contact_href"><p>Контакты</p></li>
				<a href="anketa_teatchers.php"><li>Анкета</li></a>
				<a href="#0"><li>Группа</li></a>
				<a href="#0"><li>Новости</li></a>
				<a href="logout_port.php"><li>Выйти</li></a>
				<?php else: ?>
				<!--<li id="login_href"><p>Войти</p></li>
				<li id="sigh_href"><p>Регистрация</p></li>-->
                <a href="login_port.php"><li>Войти</li></a>
           <a href="signup_port.php"><li>Регистрация</li></a>
				 <li id="contact_href"><p>Контакты</p></li>
				<a href="#0"><li>Галерея</li></a>
				<a href="#0"><li>Новости</li></a>
				<a href="#0"><li>Помощь</li></a>
				<?php endif;?>
			</ul>
		</nav> 
		</div>
		<nav class="left-cd-nav">
           <?php if(isset($_COOKIE['login_admin'])):?>
            <ul class="login">
		        <li><a href="logout_admins_port.php" >Выйти</a></li>
				<li><a href="accountinfo_admins_port.php"><?php echo $_COOKIE['login_admin']; ?></a></li>
		    </ul>
           <?php elseif(isset($_COOKIE['login'])):?>
           <ul class="login">
		        <li><a href="logout_port.php" >Выйти</a></li>
				<li><a href="accountinfo_port.php"><?php echo $_COOKIE['login']; ?></a></li>
             <!--<li id="accoint_st_href"><p><?php echo $_COOKIE['login']; ?></p></li>-->
		    </ul>
           <?php elseif(isset($_COOKIE['login_teacher'])):?>
           <ul class="login">
		        <li><a href="logout_port.php" >Выйти</a></li>
				<li><a href="info_for_teatchers.php"><?php echo $_COOKIE['login_teacher']; ?></a></li>
		    </ul>
           <?php else: ?>
            <ul class="login">
            <li><a href="login_port.php" >Войти</a></li>
            
            <li><a href="signup_port.php">Регистрация</a></li>
		       <!-- <li id="login_href"><p>Войти</p></li>
				<li id="sigh_href"><p>Регистрация</p></li>-->
		    </ul>
		    <?php endif;?>
		</nav>
		
		<nav class="left-cd-nav-mobile">
           <?php if(isset($_COOKIE['login_admin'])):?>
            <ul class="login">
		        <li><a href="logout_admins_port.php" >Выйти</a></li>
				<li><a href="accountinfo_admins_port.php"><?php echo $_COOKIE['login_admin']; ?></a></li>
		    </ul>
           <?php elseif(isset($_COOKIE['login'])):?>
           <ul class="login">
				<li><a title="Вернуться на главную" href="index_port.php">На главную</a></li>
		    </ul>
           <?php elseif(isset($_COOKIE['login_teacher'])):?>
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
	
	
	
	<div class="contact-div" id="contact_div">
       <div class="close" id="close_contact"></div>
        <p><a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения" title="Вы получите ответное письмо на ваш email">Написать на email</a></p>
    </div>
	
	
	
	<div class="signup-div" id="login_div">
	     <form action="/login_port.php" method="POST">
     
   <div class="close" id="close_login"></div>
    
        <input placeholder="Введите логин" class="input top" type="text" name="login" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите пароль" class="input" type="password" name="password"value="">
    <br><br>
<div class="cant_login">
   <a href="cant_login.php"><p>Не могу войти</p></a>
</div>
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login">Авторизироваться</button>
    </p>
             
                </form>
	</div>
	






	<div class="signup-div" id="sign_div">
      <?php if(!empty($alert)): ?>
	      <div id="upsign"><p><?=$alert?></p></div>
	      <?php endif; ?>
			    
			    <form action="/signup_port.php" method="POST">
			    <div class="close" id="close_sing"></div>
    <?php 
   //var_dump($teatcher_table);
    ?>
       <?php if($alert !== 'Вы успешно зарегистировались'):?>
        <input placeholder="Введите логин" class="input top" type="text" maxlength="40" name="login" value="<?php echo @$data['login'];?>">
    
    <br>
    
    
    <input placeholder="Введите email" class="input" type="email" maxlength="40" name="email"value="<?php echo @$data['email'];?>">
    
    
    <br>
    
    
    <?php if ($i_kod>0): ?>
    <input placeholder="Введите пароль" class="input" maxlength="40" type="password" name="password"value="<?php echo @$data['password'];?>">
    <br>
    <?php else: ?>
    <input placeholder="Введите пароль" class="input" maxlength="40" type="password" name="password"value="">
    <br>
    <? endif; ?>
    
    
    
    
    
    <?php if ($i_kod>0): ?>
   <input placeholder="Повторно введите пароль" class="input" maxlength="40" type="password" name="password_1"value="<?php echo @$data['password_1'];?>">
   <br>
   <?php else: ?>
    <input placeholder="Повторно введите пароль" class="input" maxlength="40" type="password" name="password_1"value="">
    <br>
   <? endif; ?>
    
    <p>
      <?php if ($i_kod>0): ?>
       <input placeholder="Введите код" class="inputkod" type="text" maxlength="5" name="kod" value="<?php echo @$data['kod'];?>">
      
       <br>
       
       
     <? endif; ?>
       
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
               <?php
                //echo $_SESSION['kod'].'<br>';
                   
                //   echo $kod;
                    ?>
                    <?php elseif($alert == 'Вы успешно зарегистировались'):?>
                    <?php endif;?>
                </form>
	</div>

