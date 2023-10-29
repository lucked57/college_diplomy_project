<header class="cd-header">
		

		<nav class="cd-main-nav">
			<ul>
			<?php if(isset($_COOKIE['login_admin'])):?>
				<li><a title="Вернуться на главную"href="index.php">Главная</a></li>
				<li><a href="add_comp.php">Добавить_новость</a></li>
				<li><a href="Spisok.php" target="_blank">Комплектующие</a></li>
				<li><a href="word.php">Word</a></li>
              <li><a href="#0">Пользователи</a></li>
				 <?php elseif (isset($_COOKIE['login'])):?>
				 <li><a title="Вернуться на главную"href="index.php">Главная</a></li>
				<li><a href="Spisok.php" target="_blank">Комплектующие</a></li>
				<li> <a href="proverka.php" >Проверка</a></li>
				<li><a href="podborka.php">Подбор</a></li>
				<li><a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения">Контакты</a></li>
				<?php else: ?>
				<li><a title="Вернуться на главную"href="index.php">Главная</a></li>
				 <li> <a href="proverka.php" >Проверка</a></li>
				<li><a href="podborka.php">Подбор</a></li>
				<li><a href="Spisok.php" target="_blank">Комплектующие</a></li>
				<li><a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения">Контакты</a></li>
				<?php endif;?>
			</ul>
		</nav> 
		<div class="before-nav">
		<nav class="cd-main-nav-mobile">
			<ul>
			<?php if(isset($_COOKIE['login_admin'])):?>
				<a title="Вернуться на главную" href="index.php"><li>Главная</li></a>
				<a href="add_comp.php"><li>Добавить_новость</li></a>
				<a href="Spisok.php" target="_blank"><li>Комплектующие</li></a>
				<a href="#0"><li>Пользователи</li></a>
				<a href="#0"><li>Подписчики</li></a>
				<?php elseif(isset($_COOKIE['login'])):?>
				<a href="accountinfo.php"><li><?php echo $_COOKIE['login']; ?></li></a>
               <a href="proverka.php" ><li>Проверка</li></a>
				<a href="podborka.php"><li>Подбор</li></a>
                <a href="Spisok.php" target="_blank"><li>Комплектующие</li></a>
                <a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения"><li>Контакты</li></a>
				<a href="logout.php"><li>Выйти</li></a>

				<?php else: ?>
			    <a href="login.php" ><li>Войти</li></a>
              <a href="signup.php"><li>Регистрация</li></a>
              <a href="Spisok.php" target="_blank"><li>Комплектующие</li></a>
			    <a href="proverka.php" ><li>Проверка</li></a>
				<a href="podborka.php"><li>Подбор</li></a>
				<a href="mailto:ip557799@gmail.com?subject=Вопросы и предложения"><li>Контакты</li></a>
				<?php endif;?>
			</ul>
		</nav> 
		</div>
		<nav class="left-cd-nav">
		   <?php if(isset($_COOKIE['login_admin'])):?>
            <ul class="admin">
		        <li><a href="logout_admins.php" >Выйти</a></li>
				<li><a href="accountinfo_admins.php"><?php echo $_COOKIE['login_admin']; ?></a></li>
		    </ul>
           <?php elseif (isset($_COOKIE['login'])):?>
           <ul class="login">
		        <li><a href="logout.php" >Выйти</a></li>
				<li><a href="accountinfo.php"><?php echo $_COOKIE['login']; ?></a></li>
		    </ul>
           <?php else: ?>
            <ul class="login">
		        <li><a href="login.php" >Войти</a></li>
				<li><a href="signup.php">Регистрация</a></li>
		    </ul>
		    <?php endif;?>
		</nav>
		
			<nav class="left-cd-nav-mobile">
           <?php if(isset($_COOKIE['login_admin'])):?>
            <ul class="admin">
		        <li><a href="logout_admins.php" >Выйти</a></li>
				<li><a href="accountinfo_admins.php"><?php echo $_COOKIE['login_admin']; ?></a></li>
		    </ul>
           <?php elseif(isset($_COOKIE['login'])):?>
           <ul class="login">
				<li><a title="Вернуться на главную" href="index.php">На главную</a></li>
		    </ul>
           <?php else: ?>
            <ul class="login">
		        <li><a title="Вернуться на главную" href="index.php">На главную</a></li>
		    </ul>
		    <?php endif;?>
		</nav>
	</header>