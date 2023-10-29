
            
            <div class="cd-fixed-bg cd-fixed-bg--4 height" id="footer">
				<div class="col-md-6 offset-md-3 pt-4 pt-md-5">
			<p class="text-center text-light text-footer py-md-5"></p>
   <p class="text-center text-light text-footer pb-md-5"></p>
   <p class="text-center text-light text-footer pb-md-1"></p>
    <a href="mailto:zaikets1@mail.ru?subject=Вопрос по сайту"><p class="text-center text-light text-footer "></p></a>
    </div>
  <!-- social buttons -->
    <div id="share" class="text-light">
	<p class="text-light text-footer pt-md-5"></p>
	<div>
		<a class="push facebook"><i class="fa fa-facebook-official"></i></a>
		<a class="push twitter"><i class="fa fa-twitter"></i> </a>
		<a class="push vkontakte"><i class="fa fa-vk"></i> </a>
		<a class="push google"><i class="fa fa-youtube"></i> </a>
		<a class="push ok"><i class="fa fa-instagram"></i> </a>
	</div>
</div>
      <!-- -->
       <div class="text-footer-b">
        <p class="text-center text-light text-footer">
             <br>
        </p>
        <a href="sign.php">
            <p class="text-center text-light text-footer ">
                Вход для администратора
            </p>
        </a>
        </div>
		</div> 
        
	</main>
	<script>
        $(document).ready(function(){
	$("#footer-href, #navbar-brand").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		
		$('body,html').animate({scrollTop: top}, 1500, "swing");
	});
});
    </script>
<script defer src="js/share.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="js/mainsrc_v1.01.js"></script>




