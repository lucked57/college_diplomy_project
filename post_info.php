<?php
     require_once 'include/database_for_podborka.php';
     require_once 'include/classes.php';
     global $mysqli;

     $post_id=$_GET['post_id'];
     if (!is_numeric($post_id))    exit();
     $post_id  = $mysqli->real_escape_string($post_id);

     $Select = new Select();
     $card_info = $Select->get_select_where_fetch_assoc('card_content','id',$post_id);

     $pieces_area = explode(" ", $card_info['img_array']);
     array_push($pieces_area, "apple");
     $end_pieces = end($pieces_area);
     $i = 0;
?>


<!doctype html>
<html>
<head>
<title>Екатерина Зайцева - <?=$card_info['title']?></title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="http://onlinesborka.mcdir.ru.mcpre.ru/<?=$card_info['img']?>">
	
  

<?php 
include('meta.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
</head>

<body>
    <!-- header -->
     <?php 
include('header_d.php');
?>
    <!-- content -->
	<main>
		<div class="cd-fixed-bg cd-fixed-bg--5" id="topw" style="background-image: url('/<?=$card_info['img']?>')">
			<div class="cd-fixed-bg__content">
				<h1><?=$card_info['title']?></h1>
			</div>
		</div> 

		<div class="cd-scrolling-bg cd-scrolling-bg--color-4">
			<div class="cd-scrolling-bg__content-no-main">
				<p><?=$card_info['text']?></p>
				<div class="gallery">
                  <?php if(!empty($card_info['img_array'])):?>
                  <?php
                 
                        do
                                        {
                    ?>
                   
                    <div class="ramka">
                        <a href="<?=$pieces_area[$i]?>" data-lightbox="roadtrip"><img src="<?=$pieces_area[$i]?>" /></a>
                    </div>
                    
                    <?php
                        $i++;
                        }while($pieces_area[$i]!=$end_pieces);
                      
                       ?>
                    <?php endif;?>
                </div>
			</div> 
		</div> 
		<!-- footer -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>
	<script>
 lightbox.option({
      'fadeDuration': 250,
     'imageFadeDuration': 0,
     'resizeDuration': 250,
     'alwaysShowNavOnTouchDevices': true, //показывать стрелки на мобильных
     'wrapAround': true,
    })
        </script>
        <?php 
include('footer.php');
?>


</body>
</html>