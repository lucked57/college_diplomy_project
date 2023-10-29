<?php
    include'header_port.php';
ini_set('error_reporting', E_ALL);
ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
?>

		<?php
                //$posts = get_Students_achivka();

            $Select = new Users_info();

            $limit0 = '0';

            $limit1 = '12';

            $posts = $Select->select_users_limit($limit0,$limit1);
                
            mb_internal_encoding("UTF-8");
//$mystring = mb_substr($string,5,1);
            ?>
     
		 <div class="contentposts" id="contentposts">
        <?php foreach ($posts as $post):?>
          <a id="block-href" class="block-href" href="post_port.php?post_id=<?=$post['id']?>">
           <div class="blockpost">
           <img  src="<?=$post['img']?>">
            <p> <?=mb_substr($post['text_achivka'],0,219)?>...</p>
            <p><?=$post['FIO']?></p>
        </div>
        </a>
        
        <?php    endforeach;?>
       
    </div>
     <div class="postsafter">
            <div class="step" id="minus"><img src="img/icons8-step.png"></div>
            <div class="step" id="plus"><img src="img/icons8-step_right.png"></div>
        </div>
    <?php
    include 'podval_port.php'
    ?>
	
	