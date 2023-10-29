<div class="footer" id="contacts">
	    <div class="container">
	        <div class="row">
	            <div class="col mt-5 pt-5">
	                <h2><span>Контакты</span></h2>
	                <ul>
	                    <li>+7 (495) 516-99-29</li>
	                    <li>+7 (495) 516-99-46</li>
	                    <li><a href="https://unitech-mo.ru/">unitech-mo.ru</a></li>
	                </ul>
	                <div class="social">
	                    <a href="https://vk.com/kkmtlive"><i class="fab fa-vk"></i></a>
	                    <a href="https://www.instagram.com/kkmtlive/"><i class="fab fa-instagram"></i></a>
	                </div>
	            </div>
	            <div class="col-12 mt-5">
                    <?php
                     $now = new DateTime();
                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    ?>
	                <p><?=$current_year?> © Все права защищены</p>
	            </div>
	        </div>
	    </div>
	    <div class="fix-footer"></div>
	</div>
</main>
</body>
</html>
<script defer src="js/share.js"></script>
<script
  src="js/main_src.js?v1"></script>
<script
  src="js/ajax_sr_v1.06.js?v25"></script>
  <script>
           $(function () {
  $('[data-toggle="popover"]').popover()
})
      $('.popover-dismiss').popover({
  trigger: 'focus'
})
</script>
<script>
        if ($(window).width() <= 992){
    $(window).scroll(function(){
  $('.navbar-collapse').collapse('hide');
}); 
    }
</script>
