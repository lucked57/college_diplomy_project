
 <?php require_once "include/pr_cookie.php"; ?>

 
 <div id="modal-login"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Авторизация</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form class="form-sign" action="" method="post" id="form_login" onsubmit="return false">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Логин</label>
              <div class="col-sm-10">
                <input type="text" id="login_l" name="login" class="form-control" placeholder="Введите email">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_l" name="pass" class="form-control" placeholder="Введите пароль">
                <div class="form-control-feedback" id="login-feedback"><p class="text-center"></p></div>
              </div>
            </div>
            
              <div class="form-group row" style="display:none;" id="kod">
      <label class="col-sm-2 col-form-label">Kod</label>
      <div class="col-sm-10">
        <input type="password" id="kod_l" class="form-control" name="kod" placeholder="Введите код" style="border-radius: 50em;">
      </div>
    </div>
            
           <!-- <input type="hidden" name="captcha" id="captcha_token" value=""/>
	            
	            <div class="g-recaptcha-response" data-sitekey="6LfvFHoUAAAAADxb9ihiA7vfOkVV_Q7oxL5s6uqh"></div>-->


            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="do_login_ajax">Авторизация</button>
                <button type="button" class="btn btn-link" id="dont_remember_pass" data-toggle="modal" data-target="#modal-sign-in_newv">Не помню пароль</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>


<!--<script>
grecaptcha.ready(function() {
grecaptcha.execute('6LfvFHoUAAAAADxb9ihiA7vfOkVV_Q7oxL5s6uqh', {action: 'homepage'})
.then(function(token) {
    $('#captcha_token').val(token);
});
});
</script>-->



<div id="modal-sign-in_newv"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Регистрация</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form class="form-sign" action="" method="post" id="form_sign_newv" onsubmit="return false">
                
             
                
                <div class="alert" role="alert" id="sign-feedback_newv" style="display:none; background: #007bff;">
                      <p class="text-center text-white"></p>
                </div>
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" id="email_newv" class="form-control" placeholder="Введите email">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Код группы</label>
              <div class="col-sm-10">
                <input type="text" name="kod_groupe" id="kod_groupe_newv" class="form-control" placeholder="Введите код вашей группы (для студентов)">
              </div>
            </div>
            
            
            
             <div class="form-group row" id="kod_form_newv" style="display:none;">
              <label class="col-sm-2 col-form-label">Код</label>
              <div class="col-sm-10">
                <input type="text" name="kod" id="kod_newv" class="form-control b-r" placeholder="Введите код высланный вам на email" maxlength="5">
              </div>
              <div class="form-control-feedback ml-3 mt-5">
                    <p class="text-center mt-2">Если вы не получили код, то нажмите отправииь повторно</p>
                </div>
             
              <button class="btn btn-sm col-sm-4 ml-3 b-r" id="again_sign_newv_code">Отправить повторно</button>
            </div>
            


            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="do_sign_newv_ajax">Продолжить</button>
               <button type="submit" class="btn btn-link" id="do_sign_newv_ajax_again">Отправить данные повторно</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
























<div id="modal-sing-in" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Регистрация</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Логин</label>
              <div class="col-sm-10">
                <input type="text" id="login_s" class="form-control b-r" placeholder="Введите логин" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Почта</label>
              <div class="col-sm-10">
                <input type="email" id="email_s" class="form-control b-r" placeholder="Введите email" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_s" class="form-control b-r" placeholder="Введите пароль" maxlength="40">
              </div>
            </div>
            
            
            
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_again_s" class="form-control b-r" placeholder="Введите повтроно пароль" maxlength="40">
                <div class="form-control-feedback" id="sign-feedback">
                    <p class="text-center mt-2"></p>
                </div>
              </div>
            </div>
            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_sign_ajax">Зарегестрироваться</button>
              </div>
            </div>
            
            
            
             <div class="form-group row" id="kod_form">
              <label class="col-sm-2 col-form-label">Код</label>
              <div class="col-sm-10">
                <input type="text" id="inputkod_sign" class="form-control b-r" placeholder="Введите код высланный вам на email" maxlength="5">
              </div>
              <div class="form-control-feedback">
                    <p class="text-center mt-2">Если вы не получили код, то нажмите отправииь повторно</p>
                </div>
              <label class="col-sm-2 col-form-label"></label>
              <button class="btn btn-primary btn-sm col-sm-4 ml-3 mt-1 b-r" id="again_sign_code">Отправить повторно</button>
            </div>
         
          
      </div>
    </div>
  </div>
</div>








<!--<div id="modal-sing-in" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Регистрация</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form id="form_sign" class="form-sign" onsubmit="return false">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Логин</label>
              <div class="col-sm-10">
                <input type="text" id="login_s" class="form-control" placeholder="Введите логин">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Почта</label>
              <div class="col-sm-10">
                <input type="email" id="email_s" class="form-control" placeholder="Введите email">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_s" class="form-control" placeholder="Введите пароль">
              </div>
            </div>
            
            
             <div class="form-group row">
              <label class="col-sm-2 col-form-label">Код</label>
              <div class="col-sm-10">
                <input type="text" id="inputkod_sign" class="form-control" placeholder="Введите код высланный вам на email">
              </div>
              <label class="col-sm-2 col-form-label"></label>
              <button class="btn btn-primary btn-sm col-sm-4 ml-3 mt-1" id="again_sign_code">Отправить повторно</button>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_s_agian" class="form-control" placeholder="Введите повтроно пароль">
                <div class="form-control-feedback" id="sign-feedback">
                    <p class="text-center"></p>
                </div>
              </div>
            </div>
            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="do_sign_ajax">Зарегестрироваться</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>-->

<div id="modal-addemail"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавить email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form class="form-sign" action="" method="post" id="form_add_email" onsubmit="return false">
                
                <div class="form-control-feedback" id="add_email-feedback">
                    <p class="text-center mt-2"></p>
                </div>
                
                
            <div class="form-group row">
              <label for="email_add" class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-10">    
                <textarea class="form-control" id="email_add" rows="5" placeholder="Перечислите через ; email"></textarea>
              </div>
            </div>

            
            
            <select class="custom-select mr-sm-2 mb-2 b-r" id="inlineFormCustomSelect">
            <option selected>Выбрать...</option>
            <option value="users">Студент</option>
            <option value="teachers">Наставник</option>
            <option value="groupe">Группа</option>
          </select>




            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="do_add_email">Добавить</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>














<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вы действительно хотите удалить данное мероприятие?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="del_achivka">Удалить</button>
      </div>
    </div>
  </div>
</div>








<div class="modal fade" id="close_achivka_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Вы действительно хотите завершить данное мероприятие?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="end_achivka">Завершить</button>
      </div>
    </div>
  </div>
</div>














<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Отметьте пользователей</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="custom-control custom-checkbox my-1 mr-sm-2" id="teacherts_edit_err">
                <input type="checkbox" name="formDoor[]" value="login" class="custom-control-input" id="login">
                <label class="custom-control-label" for="login">Name</label>
            </div>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="edit_user">Продолжить</button>
      </div>
    </div>
  </div>
</div>
















<div id="modal-anketa-t" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Анкета</h5>
        <?php if(!empty($posts_messenge_t)): ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        <?php endif; ?>
      </div>
      <div class="modal-body">
               
               <div class="form-control-feedback" id="anketa-t-feedback">
                    <p class="text-center mt-2"></p>
                </div>
               
               
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ФИО</label>
              <div class="col-sm-10">
                <input type="text" id="FIO_anketa_t" class="form-control b-r" placeholder="Введите ФИО" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Группа</label>
              <div class="col-sm-10">
                <input type="text" id="group_anketa_t" class="form-control b-r" placeholder="Введите группу" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Телефон</label>
              <div class="col-sm-10">
                <input type="text" id="phone_anketa_t" class="form-control b-r" placeholder="Введите номер телефона" maxlength="40">
              </div>
            </div>
            
            
            
            

            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_anketa_t_ajax">Продолжить</button>
              </div>
            </div>
            
            
         
          
      </div>
    </div>
  </div>
</div>














<div id="modal-anketa-s" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Анкета</h5>
        <?php if(!empty($posts_messenge_s)): ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        <?php endif; ?>
      </div>
      <div class="modal-body">
               
               <div class="form-control-feedback" id="anketa-feedback">
                    <p class="text-center mt-2"></p>
                </div>
               
               
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ФИО</label>
              <div class="col-sm-10">
                <input type="text" id="FIO_anketa" class="form-control b-r" placeholder="Введите ФИО" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Группа</label>
              <div class="col-sm-10">
                <input type="text" id="group_anketa" class="form-control b-r" placeholder="Введите код группы" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Год рождения</label>
              <div class="col-sm-10">
                <input type="text" id="data_anketa" class="form-control b-r" placeholder="Введите год рождения" maxlength="40">
              </div>
            </div>
            
            
             <div class="form-group row">
              <label class="col-sm-2 col-form-label">Город</label>
              <div class="col-sm-10">
                <input type="text" id="adress_anketa" class="form-control b-r" placeholder="Введите город проживания" maxlength="40">
              </div>
            </div>
            
            
            
            
            

            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_anketa_ajax">Продолжить</button>
              </div>
            </div>
            
            
         
          
      </div>
    </div>
  </div>
</div>






















<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Изменить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
               <div class="form-control-feedback" id="anketa-feedback">
                    <p class="text-center mt-2"></p>
                </div>
               
               
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Название</label>
              <div class="col-sm-10">
                <input type="text" id="title_post" class="form-control b-r" placeholder="Введите ФИО" maxlength="40">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Группа</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="text_post" name="text" rows="5" placeholder="Описание поста..."></textarea>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Дата</label>
              <div class="col-sm-10">
                <input type="date" id="data_post" class="form-control b-r" placeholder="Введите дату">
              </div>
            </div>
            
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">теги</label>
              <div class="col-sm-10">
                <input type="text" id="tags_post" class="form-control b-r" placeholder="теги" maxlength="40">
              </div>
            </div>
            
            
            
            

            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_updatepost_ajax">Продолжить</button>
              </div>
            </div>
            
            
         
          
      </div>
    </div>
  </div>
</div>















<div id="modal-pass-change" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Смена пароля</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
               <div class="form-control-feedback" id="pass-change-feedback">
                    <p class="text-center mt-2"></p>
                </div>
               
               
                
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Текущий пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_change" class="form-control b-r" placeholder="Введите текущий пароль" maxlength="40">
              </div>
            </div>
            
           <div class="form-group row">
              <label class="col-sm-2 col-form-label">Новый пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_change_new" class="form-control b-r" placeholder="Введите новый пароль" maxlength="40">
              </div>
            </div>
            
            
            
             <div class="form-group row">
              <label class="col-sm-2 col-form-label">Повторно новый пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_change_new_again" class="form-control b-r" placeholder="Введите повторно новый пароль" maxlength="40">
              </div>
            </div>
            
            

            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_pass_change_ajax">Продолжить</button>
              </div>
            </div>
            
            
         
          
      </div>
    </div>
  </div>
</div>






















































<div id="modal-img-change" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Смена аватарки</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
            <form id="form_anketa" onsubmit="return false" enctype="multipart/form-data" style="">
               
               <div class="form-control-feedback" id="img-change-feedback">
                    <p class="text-center mt-2"></p>
                </div>
               

            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Загрузить</label>
              <div class="col-sm-10">
                <input id="img_anketa" class="send_image" type="file" accept="image/*">
              </div>
            </div>

            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary b-r" id="do_img_change_ajax">Продолжить</button>
              </div>
            </div>
            
            
         
          </form>
      </div>
    </div>
  </div>
</div>

































































<div id="modal-user-stats" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="width: 100%; height: 100%; right: 0; bottom: 0;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Статистика</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <ul class="nav">
         
                      <li class="nav-item">
                        <a class="nav-link active text-primary" id="stats">Все</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active text-primary" id="for_year">За год</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active text-primary" id="for_sim">За семестр</a>
                      </li>

                </ul>
               <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody id="user_stats_table">
              
              
                  
              
              
              
               </tbody>
            </table>
        </div>
       
      </div>
    </div>
  </div>
</div>














































<div id="modal-stats-for-teachers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Пользователи</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="stats-teachers">
           <!--<div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                Студенты группы
              </a>
              <a href="#" class="list-group-item list-group-item-action student-group">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action student-group">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action student-group">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-action student-group">Vestibulum at eros</a>
            </div>
              <ul class="nav">
         
                      <li class="nav-item">
                        <a class="nav-link active" id="stats">Все</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="for_year">За год</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="for_sim">За семестр</a>
                      </li>

                </ul>
               <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Группа</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody id="user_stats_table">
              
              
                  
              
              
              
               </tbody>
            </table>
        </div>-->
       
      </div>
    </div>
  </div>
</div>





























<div class="modal fade" id="delete-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вы действительно хотите данный комментарий?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r comments-icons-ajax">Удалить</button>
      </div>
    </div>
  </div>
</div>

























<div class="modal fade" id="change-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Изменить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
    <label for="change_comment_textarea">Измените текст</label>
    <textarea class="form-control" id="change_comment_textarea" rows="5"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r comments-icons-ajax">Подтвердить</button>
      </div>
    </div>
  </div>
</div>























<div class="modal fade" id="answer-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ответить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
    <label for="answer_comment_textarea">Комментарий</label>
    <textarea class="form-control" id="answer_comment_textarea" rows="5"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r comments-icons-ajax">Подтвердить</button>
      </div>
    </div>
  </div>
</div>









































<div class="modal fade" id="modal-messenge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Уведомления <span class="fas fa-bell"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php foreach($messenge_for_user as $messenge): ?>
           <p class="mb-5"><i class="fas fa-comments"></i> <?=$messenge['Messenge']?></p>
       <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="messenge_delete">Удалить</button>
      </div>
    </div>
  </div>
</div>




































<div id="modal-stats-for-all" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Пользователи</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="stats-all">
          <div class="list-group">
             <!-- <a href="#" class="list-group-item list-group-item-action active">
                Студенты группы
              </a>-->
              <a href="#" class="list-group-item list-group-item-action all-group">ИС1-15</a>
              <a href="#" class="list-group-item list-group-item-action all-group">П1-15</a>
              <a href="#" class="list-group-item list-group-item-action all-group">ЛА1С-15</a>
              <a href="#" class="list-group-item list-group-item-action all-group">Ю1-15</a>
              <a href="#" class="list-group-item list-group-item-action all-group">П1-14</a>
            </div>
            <!--  <ul class="nav">
         
                      <li class="nav-item">
                        <a class="nav-link active" id="stats_all">Все</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="for_year_all">За год</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="for_sim_all">За семестр</a>
                      </li>

                </ul>
               <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Группа</th>
                  <th scope="col">Название</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody id="all_stats_table">
              
              
                  
              
              
              
               </tbody>
            </table>
        </div>-->
       
      </div>
    </div>
  </div>
</div>

























































<div class="modal fade" id="score_achivka_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Выставление оценок и подтверждение участия</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Если пользователь по каким-то причинам не участовал, то достаточно ему не выставлять баллы.</p>
           <form id="score-form">
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">ФИО</label>
                <div class="col-sm-10">
                  <input type="number" min="0" max="10" step="1" class="form-control b-r input-score input-score0" placeholder="Баллы" login="support5">
                </div>
                   </div>
                   <div class="form-group row">
                <label class="col-sm-2 col-form-label">ФИО1</label>
                <div class="col-sm-10">
                  <input type="number" min="0" max="10" step="1" class="form-control b-r input-score input-score1" login="support7" placeholder="Баллы">
                </div>
                   </div>
             
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="score_achivka">Готово</button>
      </div>
    </div>
  </div>
</div>
















































<div class="modal fade" id="verify_achivka_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Подтверждение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="verify-score-form">

            
             
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary b-r" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary b-r" id="delete_score_achivka">Удалить</button>
        <button type="button" class="btn btn-primary b-r" id="verify_score_achivka">Продолжить</button>
      </div>
    </div>
  </div>
</div>