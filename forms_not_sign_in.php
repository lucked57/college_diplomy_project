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
                <form id="form_login" class="form-sign" onsubmit="return false">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Логин</label>
              <div class="col-sm-10">
                <input type="email" id="login_l" class="form-control" placeholder="Введите логин">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_l" class="form-control" placeholder="Введите пароль">
              </div>
            </div>


            <div class="form-group row" style="display:none;" id="kod">
      <label class="col-sm-2 col-form-label">Kod</label>
      <div class="col-sm-10">
        <input type="password" id="kod_l" class="form-control" placeholder="Введите код" style="border-radius: 50em;">
      </div>
    </div>
           
           
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Авторизироваться</button>
                <button type="button" class="btn btn-link">Не помню пароль</button>
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
                <form id="form_sing" class="form-sign" onsubmit="return false">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Логин</label>
              <div class="col-sm-10">
                <input type="email" id="login_s" class="form-control" placeholder="Введите логин">
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
              <label class="col-sm-2 col-form-label">Пароль</label>
              <div class="col-sm-10">
                <input type="password" id="pass_s_agian" class="form-control" placeholder="Введите повтроно пароль">
                <div class="form-control-feedback"></div>
              </div>
            </div>
            

            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>