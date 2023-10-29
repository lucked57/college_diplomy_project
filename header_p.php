<div id="p_prldr">
            <div class="contpre">
                <div class="cssload-container">
                    <ul class="cssload-flex-container">
                        <li>
                            <span class="cssload-loading"></span>
                        </li>
                    </ul>
                </div>
                Подождите<br><small>идет загрузка...</small></div>
        </div>
        
        
        
        
       <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm"> <!--sticky-top -->
	    <a href="#" class="navbar-brand"><span class="fas fa-graduation-cap"></span><span style="margin-left: 5px;">kkmt-portfolio</span></a>
	    <span class="fas fa-bell" data-container="body" data-toggle="popover" data-placement="bottom" data-content="У вас нету новых уведомлений" tabindex="0" data-trigger="focus" role="button" style="font-size: 17px;"></span>
       <?php if($pr_cookie == "admin"):?>
            
                <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="images/user_.png" alt="users" class="ml-md-2">
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" href="#">Админ</a>
                <a class="dropdown-item" href="#">Сменить пароль</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>
              </div>
            </div>
        <?php elseif($pr_cookie == "user"):?>
            <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="images/user_.png" alt="users" class="ml-md-2">
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" href="#">Пользователь</a>
                <a class="dropdown-item" href="#">Сменить пароль</a>
                <a class="dropdown-item" href="#">Сменить аватар</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>
              </div>
            </div>
        <?php elseif($pr_cookie == "teacher"):?>
            <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="images/user_.png" alt="users" class="ml-md-2">
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" href="#">Наставник</a>
                <a class="dropdown-item" href="#">Сменить пароль</a>
                <a class="dropdown-item" href="#">Сменить аватар</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>
              </div>
            </div>
        <?php endif;?>
	
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigations" style="border: none;">
	        <img src="img/menu.png" style="width:30px;">
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	                <li class="nav-item">
	                    <a href="http://kkmt-portfolio.loc/" class="nav-link">Главная</a>
	                </li>
	                <?php if(empty($pr_cookie)):?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-login">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sing-in">Регистрация</a>
                        </li>
	                <?php endif;?>
	                <li class="nav-item">
	                    <a href="#" class="nav-link" >Галерея</a>
	                </li>
	                <li class="nav-item swin_href">
	                    <a href="#contacts" class="nav-link">Контакты</a>
	                </li>
                   <?php if($pr_cookie == "admin"):?>
                    <li class="nav-item">
                            <div class="btn-group d-block" >
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em; background:#0062cc;">
                                Мероприятия5
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_post.php" class="nav-link">Добавить</a>
                                <a class="dropdown-item" href="#" class="nav-link">Удалить</a>
                                <a class="dropdown-item" href="#" class="nav-link">Обновить</a>
 
                              </div>
                            </div>
	                </li>
                   <?php endif;?>
                    <?php if($pr_cookie == "admin" || $pr_cookie == "user" || $pr_cookie == "teacher"):?>
                        <li class="nav-item">
                            <a href="logout_p.php" class="nav-link" >Выйти</a>
                        </li>
                <?php endif;?>

	            </ul>
	           <form class="form-inline pull-xs-right search">
    <input class="form-control mr-md-5" type="text" placeholder="Поиск...">
    <!--<button  class="btn btn-outline-warning ml-md-1 mt-1 mt-sm-0" type="submit">Поиск</button>-->
  </form>
	    </div>
	</nav>