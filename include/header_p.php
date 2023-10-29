          <!--<div id="p_prldr">
            <div class="contpre">
                <div class="alert-animate">
                    <i class="fas fa-user-graduate"></i>
                </div>
                </div>
        </div>-->

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
        
        <div class="swin_href">
                <a href="#top">
                <div class="back-to-top">
                    <div class="back-to-top-in shadow-lg">
                        <i class="fas fa-angle-up mt-3"></i>
                    </div>
                </div>
                </a>
        </div>
        
       <nav class="navbar navbar-expand-md navbar-dark fixed-top shadow-sm" style="background-color: #0060c6;"> <!--sticky-top -->
	    <a href="/" class="navbar-brand"><span class="fas fa-graduation-cap"></span><span style="margin-left: 5px;">kkmt-portfolio</span></a>
	    <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <p class="text-messenge text-white">
               <?php if(!empty($count_messenge)): ?>
               <?=$count_messenge?>
               <?php endif; ?>
               </p>
                <span class="fas fa-bell mr-2"></span>
              </a>
              <div style="width: 100px; position:  absolute; margin-top: 23px;">
                  <div class="dropdown-menu menu-mr">
                   <?php if(!empty($count_messenge)): ?>
                       <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-messenge">У вас  
                       <?=$count_messenge?> новый уведомлений</a>
                   <?php else: ?>
                        <a class="dropdown-item" href="#">У вас нету новых уведомлений</a>
                    <?php endif; ?>
                  </div>
              </div>
            </div>
       <?php if($pr_cookie == "admin"):?>
            
                <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php if(!empty($img_avatar)): ?>
                   <img src="<?=$img_avatar?>" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php else: ?>
                    <img src="images/user_.png" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php endif; ?>
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" style="color:#0060c6;">Админ</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-stats-for-all" id="stats_click_all">Группы</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-img-change" >Сменить аватар</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-pass-change" >Сменить пароль</a>
                <a href="logout_p.php" class="dropdown-item" >Выйти</a>
               <!--<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>-->
              </div>
            </div>
        <?php elseif($pr_cookie == "user"):?>
            <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php if(!empty($img_avatar)): ?>
                   <img src="<?=$img_avatar?>" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php else: ?>
                    <img src="images/user_.png" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php endif; ?>
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" style="color:#0060c6;">Пользователь</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-user-stats" id="user_stats">Мои достижения</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-stats-for-all" id="stats_click_all">Группы</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-img-change" >Сменить аватар</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-pass-change" >Сменить пароль</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-anketa-s" >Анкета</a>
                <a href="logout_p.php" class="dropdown-item" >Выйти</a>
                <!--<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>-->
              </div>
            </div>
        <?php elseif($pr_cookie == "teacher"):?>
            <div class="btn-group">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php if(!empty($img_avatar)): ?>
                   <img src="<?=$img_avatar?>" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php else: ?>
                    <img src="images/user_.png" alt="users" class="ml-md-2 rounded-circle" id="img-avatar">
                <?php endif; ?>
              </a>
              <div class="dropdown-menu menu-mr">
                <a class="dropdown-item" style="color:#0060c6;">Наставник</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-stats-for-all" id="stats_click_all">Группы</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-stats-for-teachers" id="teachers_stats_click">Моя группа</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-img-change" >Сменить аватар</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-pass-change" >Сменить пароль</a>
                 <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-anketa-t" >Анкета</a>
                <a href="logout_p.php" class="dropdown-item" >Выйти</a>
                <!--<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">еще</a>-->
              </div>
            </div>
        <?php endif;?>
	
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigations" style="border: none;">
	       <img src="img/menu.png" style="width:30px;">
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	              <!--  <li class="nav-item">
	                    <a href="/" class="nav-link">Главная</a>
	                </li>-->
	                <?php if(empty($pr_cookie)):?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-login">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sign-in_newv">Регистрация</a>
                        </li>
	                <?php endif;?>
	                <?php if($pr_cookie == "teacher"):?>
                      <li class="nav-item">
	                    <a href="add_post_teacher.php" class="nav-link">Добавить</a>
	                </li>
	                <li class="nav-item">
	                    <a href="excel_import.php" class="nav-link"><i class="fas fa-file-excel"></i> Excel</a>
	                </li>
	                <?php endif;?>
	                <li class="nav-item">
	                    <a href="gallery.php" class="nav-link" >Галерея</a>
	                </li>
	                 <li class="nav-item">
	                    <a href="stats.php" class="nav-link" >Рейтинг</a>
	                </li>
	                <li class="nav-item swin_href">
	                    <a href="#contacts" class="nav-link">Контакты</a>
	                </li>
                   <?php if($pr_cookie == "admin"):?>
                   <li class="nav-item">
	                    <a href="excel_import.php" class="nav-link"><i class="fas fa-file-excel"></i> Excel</a>
	                </li>
                   <!-- <li class="nav-item">
                            <div class="btn-group d-block" >
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em; background:#0062cc;">
                                Мероприятия
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_post.php" class="nav-link">Добавить</a>
 
                              </div>
                            </div>
	                </li>
                    <li class="nav-item">
                            <div class="btn-group d-block" >
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em; background:#0062cc;">
                                Галерея
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_img_gal.php" class="nav-link">Добавить</a>
                                <a class="dropdown-item" href="del_img_gal.php" class="nav-link">Удалить</a>
                            
 
                              </div>
                            </div>
	                </li>-->
	                
	                
                  <li class="nav-item" data-toggle="modal" data-target="#modal-addemail">
	                    <a class="nav-link"><i class="fas fa-plus-circle"></i>email</a>
	                </li>
                  <li class="nav-item" data-toggle="modal" data-target="#verify_achivka_modal" id="verify_score_admin">
	                    <p class="text-messenge text-white" style="margin-left:69px; margin-top: -3px;">
                           <?php if(!empty($count_score)): ?>
                           <?=$count_score?>
                           <?php endif; ?>
                           </p>
	                    <a class="nav-link"><i class="fas fa-star"></i>баллы</a>
	                </li>
                   <li class="nav-item">
	                    <a class="nav-link"href="groupe_code.php"><i class="fas fa-users-cog"></i>Коды</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="stats_teacher.php"><i class="fas fa-graduation-cap"></i>Наставники</a>
	                </li>
	                
	                
	                 <li class="nav-item">
	                    <a class="nav-link" href="category.php"><i class="fas fa-book"></i>Категории</a>
	                </li>
	                
	                <li class="nav-item">
                            <div class="btn-group d-block" >
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em; background:#0062cc;">
                                Добавить
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_post.php" class="nav-link">Мероприятие</a>
                                <a class="dropdown-item" href="add_img_gal.php" class="nav-link">Галерея</a>
                              </div>
                            </div>
	                </li>
	                
                  <li class="nav-item">
                            <div class="btn-group d-block" >
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 50em; background:#0062cc;">
                               Пользователи
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="users_admin.php" class="nav-link">По отдельности</a>
                                 <a class="dropdown-item" href="users_admin_del.php" class="nav-link">Удалить по курсам</a>
                              </div>
                            </div>
	                </li>
                   <?php endif;?>
                   
                 <!--  <?php if($pr_cookie == "teacher"): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-anketa-t" >Анкета</a>
                        </li>
                     <? endif; ?>
                     
                     <?php if($pr_cookie == "user"): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-anketa-s" >Анкета</a>
                        </li>
                     <? endif; ?>
                   
                   
                    <?php if($pr_cookie == "admin" || $pr_cookie == "user" || $pr_cookie == "teacher"):?>
                        <li class="nav-item">
                            <a href="logout_p.php" class="nav-link" >Выйти</a>
                        </li>
                <?php endif;?>-->
                
                
                
	            </ul>
	         <!--  <form class="form-inline pull-xs-right search">
    <input class="form-control mr-md-5" type="text" placeholder="Поиск...">
    <button  class="btn btn-outline-warning ml-md-1 mt-1 mt-sm-0" type="submit">Поиск</button>
  </form>-->
	    </div>
	</nav>