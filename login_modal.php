		<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>
	<?php 
        
                    $login = $_COOKIE['login'];

                    $Select = new Select();
                    
                    $table_name = "users";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];

                    $email = $pass_pr_array['email'];
        
                    if(password_verify($pass_pr, $_COOKIE['code'])){
                        
                        $pr_cookie = "user";
                        
                    }


                    $anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$login);

                    $FIO = $anketa['FIO'];

                    $year = $anketa['year'];

                    $Adress = $anketa['Adress'];

                    $group_name = $anketa['Group_name'];


                    if(!empty($group_name)){
                        
                        $teacher_an = $Select->get_select_where_fetch_assoc('teatchers_anketa','Group_name',$group_name);
                        
                        $teacher_FIO = $teacher_an['Name'];
                        
                        $teacher_phone = $teacher_an['phone'];
                        
                        $teacher_login = $teacher_an['login'];
                        
                        $teacher_ac = $Select->get_select_where_fetch_assoc('teachers','login',$teacher_login);
                        
                        $teacher_email = $teacher_ac['email'];
                    }
        ?>

    <?php if($pr_cookie == "user"):?>
    
<div class="signup-div" id="pass_div">

    <div id="upsign" class="upsign">
        <p></p>
    </div>
 
   <div class="container_info"> <div class="account left click"><p>Сменить пароль</p></div>
    <div class="account right"><p id="account_us_r">Данные</p></div></div>
    
    <div class="mobile-account-menu"></div>
    
    <div class="close pass" id="close_pass"></div>


    <form id="form_pass" onsubmit="return false">

        <input placeholder="Введите текущий пароль" id="pass_now" maxlength="40" class="input" type="password" name="pass_now">

        <br>


        <input placeholder="Введите новый пароль" id="pass_change" maxlength="40" class="input" type="password" name="pass_change">
        
        <br>
        
        <input placeholder="Введите новый пароль повторно" id="pass_change_again" maxlength="40" class="input" type="password" name="pass_change_again">
        
        <br><br>

        <p>
            <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass" id="do_pass_ajax">Подтвердить</button>
        </p>
    </form>


    <form id="form_pass_after" onsubmit="return false">
      
      
       <input placeholder="Введите текущий пароль" id="pass_now" maxlength="40" class="input" type="password" name="pass_now">

        <br>


        <input placeholder="Введите новый пароль" id="pass_change" maxlength="40" class="input" type="password" name="pass_change">
        
        <br>
        
        <input placeholder="Введите новый пароль повторно" id="pass_change_again" maxlength="40" class="input" type="password" name="pass_change_again">
        
        <br><br>

        <p>
            <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass" id="do_pass_ajax_after">Подтвердить</button>
        </p>

    </form>

</div>






   
   <div class="signup-div" id="account_div">

 
   <div class="container_info"> <div class="account left"><p id="account_us_l">Сменить пароль</p></div>
    <div class="account right click"><p>Данные</p></div></div>
    
    <div class="close pass" id="close_account"></div>

    <div class="info" id="info_anketa">
    <p>Почта: <?=$email?></p>
    <p>Логин: <?=$login?></p>
    <?php if(!empty($FIO)):?>
    <p>ФИО: <?=$FIO?></p>
    <p>Группа: <?=$group_name?></p>
    <p>Год рождения: <?=$year?></p>
    <p>Адрес: <?=$Adress?></p>
    <?php else: ?>
    <p>У вас не заполнена анкета</p>
    <?php endif;?>
    </div>

</div>

  <div class="messenge-show" id="messenge-show">
    <div class="close" id="close_messenge_block"></div>
	    <div class="messenge-show-in">
	        
	    </div>
		 <!--   <div class="messenge_box"><p></p></div>-->
		   
	    
<p><button class="dws-submit" class="dws-submit:hover" type="submit" name="email" id="do_messenge_block_ajax">Удалить</button></p>
    
	</div>

<div class="signup-div" id="anketa_div">
      
	     <div id="upsign" class="upsign"><p></p></div>
	      
	
     
   <div class="close" id="close_anketa"></div>
   
    <form id="form_anketa" onsubmit="return false" enctype="multipart/form-data">
       
        <input placeholder="Введите ваше ФИО" id="FIO_anketa" maxlength="40" class="input top" type="text">
    
    <br>
    
    
     <input placeholder="Введите год рождения" id="data_anketa" maxlength="40" class="input" type="text">
    
    <br>
    
     <input placeholder="Введите ваш город" id="adress_anketa" maxlength="40" class="input" type="text">
    
    <br>
    
    <input placeholder="Введите название вашей группы" id="group_anketa" maxlength="40" class="input" type="text">
    <br>
    
    <input id="img_anketa"class="send_image" type="file" accept="image/png,image/jpeg">
    
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_anketa_ajax">Подтвердить</button>
    </p>
             </form>   
             
             
                 <form id="form_anketa_after" onsubmit="return false">
                 
         <input placeholder="Введите ваше ФИО" id="FIO_anketa" maxlength="40" class="input top" type="text">
    
    <br>
    
    
     <input placeholder="Введите год рождения" id="data_anketa" maxlength="40" class="input" type="text">
    
    <br>
    
     <input placeholder="Введите ваш город" id="adress_anketa" maxlength="40" class="input" type="text">
    
    <br>
    
    <input placeholder="Введите название вашей группы" id="group_anketa" maxlength="40" class="input" type="text">
    <br>
    
    <input class="send_image" type="file" accept="image/png,image/jpeg">
    
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_logindd_ajax">Подтвердить</button>
    </p>

             </form>  
             
	</div>


  <div class="messenge-show" id="add_achivka">
    <div class="close" id="close_add_achivka"></div>
        <form id="form_add_achivka" onsubmit="return false" enctype="multipart/form-data">
            <input placeholder="Заголовок достижения" maxlength="29" class="input_achivka" type="text"id="title_achivka">
            <br>
            <p><textarea id="textarea_achivka"rows="19" cols="70" maxlength="5000" wrap="soft" placeholder="Описание достижения..." ></textarea></p>
            <br>
                <input id="img_achivka_add"class="send_image" type="file" accept="image/png,image/jpeg">
                           <label class="checkbox">
                        <div class="achivla-margin file">
                              <input class="checkbox" type="checkbox" id="checkbox_img_add">
                              <span class="box height">
                              <div class="text"></div>
                              </span>
                              <p class="p_checkbox_file">Отправить без картинки</p>
                              </div>
                               </label>
                                <br><br>
                                
                    <button class="dws-submit_achivka" class="dws-submit_achivka:hover" type="submit" id="do_achivka_add">Добавить</button>
                       <label class="checkbox">
                           <div class="achivla-margin"> 
                           <input class="checkbox" type="checkbox" id="checkbox_main_add">
                           <span class="box height">
                           <div class="text"></div>
                           </span>
                           <p class="p_checkbox">На главную</p>
                           </div>
                       </label>
                       <br><br>
        </form>
        
                <form id="form_add_achivka_after" onsubmit="return false" enctype="multipart/form-data">
            <input placeholder="Заголовок достижения" maxlength="19" class="input_achivka" type="text" id="title_achivka">
            <br>
            <p><textarea id="textarea_achivka"rows="19" cols="70" maxlength="5000" wrap="soft" placeholder="Описание достижения..." ></textarea></p>
            <br>
                <input id="img_achivka_add"class="send_image" type="file" accept="image/png,image/jpeg">
                           <label class="checkbox">
                        <div class="achivla-margin file">
                              <input class="checkbox" type="checkbox" name="checkbox-img" id="checkbox-img" value="Yes">
                              <span class="box height">
                              <div class="text"></div>
                              </span>
                              <p class="p_checkbox_file">Отправить без картинки</p>
                              </div>
                               </label>
                                <br><br>
                                
                       <button class="dws-submit_achivka" class="dws-submit_achivka:hover" type="submit" name="do_achivka">Добавить</button>
                       <label class="checkbox">
                           <div class="achivla-margin"> 
                           <input class="checkbox" type="checkbox" name="checkbox-test" id="checkbox-test" value="Yes">
                           <span class="box height">
                           <div class="text"></div>
                           </span>
                           <p class="p_checkbox">На главную</p>
                           </div>
                       </label>
                       <br><br>
        </form>
    
	</div>
    
<div class="contact-div" id="contact_div_t">
       <div class="close" id="close_contact_t"></div>
         <?php if(!empty($teacher_FIO)):?>
        <p id="contact_div_t_before"><a href="mailto:<?=$teacher_email?>?subject=<?=$FIO?>, группа <?=$group_name?>" title="Вы получите ответное письмо на ваш email">Написать на email</a></p>
        <div class="info">
        <p>ФИО вашего куратора: <?=$teacher_FIO?></p>
        <p>Номер телефона: <?=$teacher_phone?></p>
          </div>
        <?php elseif(empty($group_name)): ?>
            <div class="info">
        <p>Вначале заполните анкету</p>
              </div>
        <?php else: ?>
            <div class="info">
        <p>Ваш преподаватель еще не заполнил анкету</p>
              </div>
        <?php endif;?>
        
        
    </div>

          

   <?php endif;?>