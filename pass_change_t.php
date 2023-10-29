	<?php
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
?>
	<?php 
        
                    $login = $_COOKIE['login_teacher'];

                    $Select = new Select();
                    
                    $table_name = "teachers";
                    
                    $pole_name = "login";
                    
                    $pass_pr_array = $Select->get_select_where_fetch_assoc($table_name,$pole_name,$login);
                    
                    $pass_pr = $pass_pr_array['code'];

                    $email = $pass_pr_array['email'];
        
                    if(password_verify($pass_pr, $_COOKIE['code_teacher'])){
                        
                        $pr_cookie = "teacher";
                        
                    }

                    $anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);

                    $FIO = $anketa['Name'];

                    $group_name = $anketa['Group_name'];
        ?>

    <?php if($pr_cookie == "teacher"):?>
    
<div class="signup-div" id="pass_div_t">

    <div id="upsign" class="upsign">
        <p></p>
    </div>



    <div class="container_info"> <div class="account left click"><p>Сменить пароль</p></div>
    <div class="account right"><p id="account_t_r">Данные</p></div></div>
    
    <div class="mobile-account-menu"></div>
    
    <div class="close pass" id="close_pass_t"></div>

    <form id="form_pass_t" onsubmit="return false">

        <input placeholder="Введите текущий пароль" id="pass_now" maxlength="40" class="input top" type="password" name="pass_now">

        <br>


        <input placeholder="Введите новый пароль" id="pass_change" maxlength="40" class="input" type="password" name="pass_change">
        
        <br>
        
        <input placeholder="Введите новый пароль повторно" id="pass_change_again" maxlength="40" class="input" type="password" name="pass_change_again">
        
        <br><br>

        <p>
            <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass" id="do_pass_ajax_t">Подтвердить</button>
        </p>
    </form>


    <form id="form_pass_t_after" onsubmit="return false">
      
      
       <input placeholder="Введите текущий пароль" id="pass_now" maxlength="40" class="input top" type="password" name="pass_now">

        <br>


        <input placeholder="Введите новый пароль" id="pass_change" maxlength="40" class="input" type="password" name="pass_change">
        
        <br>
        
        <input placeholder="Введите новый пароль повторно" id="pass_change_again" maxlength="40" class="input" type="password" name="pass_change_again">
        
        <br><br>

        <p>
            <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_pass" id="do_pass_ajax_t_after">Подтвердить</button>
        </p>

    </form>

</div>
   
      <div class="signup-div" id="account_div_t">

 
   <div class="container_info"> <div class="account left"><p id="account_t_l">Сменить пароль</p></div>
    <div class="account right click"><p>Данные</p></div></div>
    
    <div class="close pass" id="close_account_t"></div>

     <div class="info">
    <p>Почта: <?=$email?></p>
    <p>Логин: <?=$login?></p>
    <?php if(!empty($FIO)):?>
    <p>ФИО: <?=$FIO?></p>
    <p>Группа: <?=$group_name?></p>
    <?php else: ?>
    <p>Ваша анкета не заполнена</p>
    <?php endif;?>
    </div>
</div>
    

<div class="signup-div" id="anketa_t_div">
      
	     <div id="upsign" class="upsign"><p></p></div>
	      
	
     
   <div class="close" id="close_anketa_t"></div>
   
    <form id="form_anketa_t" onsubmit="return false">
       
        <input placeholder="Введите ваше ФИО" id="FIO_anketa_t" maxlength="40" class="input top" type="text">
    
    <br>
    
    
    <input placeholder="Введите название вашей группы" id="group_anketa_t" maxlength="40" class="input" type="text">
      <br>
      
      <input placeholder="Введите ваш номер телефона" id="phone_anketa_t" maxlength="40" class="input" type="text">
    <br>
      
    <input id="img_anketa_t"class="send_image" type="file" accept="image/png,image/jpeg">
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_anketa_t_ajax">Подтвердить</button>
    </p>
             </form>   
             
             
                 <form id="form_anketa_t_after" onsubmit="return false">
   <input placeholder="Введите логин" id="login_l" maxlength="40" class="input top" type="text">
    
    <br>
    
    
    <input placeholder="Введите пароль" id="pass_l" maxlength="40" class="input" type="password">
    <br>
                   
                 <input placeholder="Введите ваш номер телефона" id="phone_anketa_t" maxlength="40" class="input" type="text">
    <br>
                   
                   
               <input id="img_anketa_t5"class="send_image" type="file" accept="image/png,image/jpeg">
    <br><br>

    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_login" id="do_logindd_ajax">Подтвердить</button>
    </p>

             </form>  
             
	</div>

  <div class="accept-div" id="accept_t_d">
      <div class="accept-div-top">
      <p>Вы действительно хотите удалить выбранные достижения?</p>
      </div>
      <div class="accept-div-choise left">
          <p>Да</p>
      </div>
      <div class="accept-div-choise right" id="renouncement">
          <p>Нет</p>
      </div>
  </div>

   <?php endif;?>