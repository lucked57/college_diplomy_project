<?php
   if(isset($_COOKIE['admin'])){
       include 'proverka_d.php';
   }
?>
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter10376521 = new Ya.Metrika({id:10376521, enableAll: true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/10376521" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<a href="tel:+79035870259" id="phone-href">
 <wrapper>
    <div class="dws" id="dws-phone" data-toggle="modal"> <!-- data-target="#ContactPhoneClick"-->
        <div class="pulse shadow">
            <div class="bloc shadow"></div>
            <div class="phone shadow"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div class="text">Связь со мной</div>
        </div>
    </div>
     
</wrapper>
    </a>
   <script>
          
            if ($(window).width() <= 768){ // mobille
                $("#phone-href").attr("href", "tel:+79035870259");
            }
            // pc
            else{ 
                $("#phone-href").attr("href", "skype:test5579");
            }
      

        </script>
        <!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top"> <!--sticky-top -->
    <div id="navbar-brand">
	    <a href="#topw" class="navbar-brand">
	        <span class="fa fa-paw"></span>
	        <span style="margin-left: 5px;">dress-show.ru</span>
	    </a>
	    </div>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigations">
	        <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	                <li class="nav-item">
	                    <a href="index_dress.php" class="nav-link">На главную</a>
	                </li>
	                <li class="nav-item" id="review">
	                    <a href="#reviews" class="nav-link">Отзывы</a>
	                </li>
	                <li class="nav-item" id="review_notmain">
	                    <a href="http://onlinesborka.mcdir.ru.mcpre.ru/index_dress.php#reviews" class="nav-link">Отзывы</a>
	                </li>
	                <li class="nav-item">
	                    <a href="photo_video.php" class="nav-link">Фото/Видео</a>
	                </li>
	                <li class="nav-item" id="footer-href">
	                    <a href="#footer" class="nav-link">Контакты</a>
	                </li>
                  <?php if($pr_cookie == "admin"):?>
                 <li class="nav-item">
	                    <a class="nav-link" data-toggle="modal" data-target="#gridSystemModal">Сменить пароль</a>
	                </li>
                  <li class="nav-item">
	                    <a href="add_card.php" class="nav-link">Добавить</a>
	                </li>
                  <li class="nav-item">
	                    <a href="del_card.php" class="nav-link">Удалить</a>
	                </li>
                  <li class="nav-item">
	                    <a href="up_card.php" class="nav-link">Обновить</a>
	                </li>
	                <li class="nav-item">
	                    <a href="up_gal.php" class="nav-link">Добавить гал</a>
	                </li>
	                <li class="nav-item">
	                    <a href="del_gal.php" class="nav-link">Удалить гал</a>
	                </li>
	                <li class="nav-item">
	                    <a href="http://metrika.yandex.ru/stat/?id=10376521" target="_blank" class="nav-link">Яндекс Метрика</a>
	                </li>
	                 <?php endif;?>
	            </ul>
	            <?php if($pr_cookie == "admin"):?>
	           <a href="logout_d.php" class="nav-link">
    <button class="btn btn-outline-warning form-inline pull-xs-righ" type="submit">Выйти</button>
    </a>
     <?php endif;?>
	    </div>
	</nav>
<?php if($pr_cookie == "admin"):?>
	<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="gridModalLabel">Смена пароля</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid bd-example-row">
          <!-- form pass change -->
           <form id="form_pass_change" onsubmit="return false">
           
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Текущий</label>
      <div class="col-sm-10">
        <input type="password" id="pass_t" class="form-control" placeholder="Введите текущий пароль">
      </div>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Новый</label>
      <div class="col-sm-10">
        <input type="password" id="pass_c" class="form-control" placeholder="Введите новый пароль">
      </div>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Повторно</label>
      <div class="col-sm-10">
        <input type="password" id="pass_c_again" class="form-control" placeholder="Введите повторно новый пароль">
      </div>
    </div>
    
  </form>
          <!-- -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success">Изменить пароль</button>
      </div>
    </div>
  </div>
</div>
<?php endif;?>