<?php require_once "include/pr_cookie.php" ?>

<?php
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
global $mysqli;
$post_id=$_GET['post_id']; // получение данных из get запроса

if (!is_numeric($post_id))    exit(); // если переменная $post_id
$post_id  = $mysqli->real_escape_string($post_id);

$post_id = str_replace("'", "", $post_id);
        
$post_id = str_replace("<", "", $post_id);
        
$post_id = str_replace(">", "", $post_id);

$Select = new Select();
$post = $Select->get_select_where_fetch_assoc('img_post','id',$post_id);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$post['title']?></title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья Алексеевич">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
  
	</head>
	
	<body>
	 <div class="swin_href">
                <a href="#top">
                <div class="back-to-top">
                    <div class="back-to-top-in shadow-lg">
                        <i class="fas fa-angle-up mt-3"></i>
                    </div>
                </div>
                </a>
        </div>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
       
       
          <style>
          
         .slick-prev:before,
      .slick-next:before {
        display: block;

      }
      .slick-prev {
            left: 25px;
          position: absolute;
          display: block;
          z-index: 999;
}
                 .slick-next {
    right: 25px;
}
              
              @media only screen and (max-width: 1260px) {
                  .slick-prev:before,
      .slick-next:before {
          color: rgba(253, 253, 253, 0);

      }
              }
              
        </style>
       
       <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
  
  
  
  <div class='single-item-center' id="top">
               
               <?php
              
             $pieces_area = explode(" ", trim($post['img_full']));
             array_push($pieces_area, "apple");
             $end_pieces = end($pieces_area);
             $i = 0;
              
              do
                                        {
              
              ?>
               
               
               
                <div><img src="<?=$pieces_area[$i]?>"></div>
    
                
                
                
                <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                      
                       ?>
          </div>
        <div class="container in-container-messenge">
              <div class="col-12 mt-5">
                <h5 class="text-center card-title"><?=$post['title']?></h5>
                 <p class="card-text"><?=$post['text']?></p> 
                
              </div>
              <div class="col-12 mt-5 container-messenge">
                   <h5>Комментарии</h5>
                     <hr>
                     <input type="text" class="d-none gdhwgdgtrg" value="<?=$post_id?>">
                     <?php if($pr_cookie == "admin" || $pr_cookie == "user" || $pr_cookie == "teacher"):?>
                        
                
                      <div class="form-group">
                                <label for="text_comment">Добавить комментарий</label>
                                <textarea class="form-control" id="text_comment" rows="3" placeholder="Введите текст комментария"></textarea>
                                
                          </div>
                          <button class="btn btn-primary b-r color-block" id="add_comment">Добавить</button>
                          
                          <?php endif;?>
                    <div class="comments-div">
                        <div class="messenge_box"><p>Статью стоило прочитать перед написанием возражений. Явно же написано — автобус приходит в среднем каждые 10 минут, а не всегда. И по коду это тоже видно.</p></div>
                     <div class="messenge_box"><p>На практике автобус не просто ходит «в среднем каждые 10 минут», а имеет конкретную привязку ко времени, от которой может отклоняться в ту или иную сторону с некоторым распределением. И это заметно более жесткое ограничение.</p></div>
                    </div>
                     
                 </div>
          </div>
  
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script>
  $(".single-item-center").slick({
	dots: true
});
</script>
  <script>
      var meta;
      var id_comment;
      var answer;
      var login_for_replay;
      
      function Change_text_comment(){
          $.ajax({
                  url: "comments_update.php",
                  type: "POST",
                  dataType: "html",
                  data: ({id: id_comment, meta: 'text-comment'}),
                  success: function(data){
                        //alert(data);

                        $('#change_comment_textarea').val(data);
                  } 
              });
      }
      
      
      
      
      function Comments_controller(){
    






$(document).ready(function(){
    
        
        
    
    
    
    
        $(".replay-comment").on("click", function(){
    
            meta = 'answer';
        });
    
        $(".delete-comment").on("click", function(){
    
            meta = 'delete';
          //  $('#delete-comment').modal('show');
        });
    
        $(".change-comment").on("click", function(){
    
            meta = 'change';
          
            setTimeout(Change_text_comment, 150);
            
        });
    
    
        
        $(".comments-icons").on("click", function(){

            id_comment = $(this).attr('value');
            answer = $(this).attr('answer');
            login_for_replay = $(this).attr('login');
        });

              
          
                    
              
          });


}
      
      
      
      
      
      
      var id_post = $('.gdhwgdgtrg').attr('value');
      function Update_comments(){
                $.ajax({
                  url: "comments_update.php",
                  type: "POST",
                  dataType: "html",
                  data: ({id: id_post, meta: 'select'}),
                  success: function(data){
                        $('.comments-div').html(data.trim());
                      Comments_controller();
                  } 
              });
            }
    
            Update_comments();
            var timerId = setInterval(function() {
                 Update_comments();
                }, 10000);
      
      
      
      $(".comments-icons-ajax").on("click", function(){
              
            //alert(meta);
            var text_comment;
              
              if(meta == 'change'){
                  text_comment = $('#change_comment_textarea').val();
              }
              if(meta == 'answer'){
                  text_comment = $('#answer_comment_textarea').val();
              }
              
              
              
              var errors = false;
              
              
              
                //alert(id_comment);
              
              
              
              if(errors == false){
                    $.ajax({
                  url: "comments_update.php",
                  type: "POST",
                  dataType: "html",
                  data: ({meta: meta, id: id_comment, text_comment: text_comment, answer: answer, id_post: id_post, login_replay: login_for_replay}),
                  success: function(data){
                      funcSuccess();
                      $('#delete-comment').modal('hide');
                      $('#change-comment').modal('hide');
                      $('#answer-comment').modal('hide');
                      if(data.trim().length != 0){
                          alert(data);
                      }
                        
                        $.ajax({
                                      url: "comments_update.php",
                                      type: "POST",
                                      dataType: "html",
                                      data: ({id: id_post, meta: 'select'}),
                                      success: function(data){
                                            $('.comments-div').html(data);
                                          Comments_controller();
                                          $('#answer_comment_textarea').val("");
                                      } 
                                  });
                  } 
              });
              
              }
              else{
                 alert(errors);
              }
            
          }); 
        </script>
  
  
   <?php
        include "include/footer_p.php";
?>
   
    
