<?php
    include "include/pr_cookie.php";
    require_once 'include/database_connect.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    //$posts = $Select->get_fetch_all_order_count('users');
    $count_ach = 10;
    //$i = 1;
    $SQL = new SQL_native();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Рейтинг</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья Алексеевич">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
     <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	</head>
	
	<body>
	
      <form action="/stats.php" method="POST" enctype="multipart/form-data" id="top">
      <ul class="nav mt-5 pt-5">
         
          <li class="nav-item">
            <a class="nav-link active" href="stats.php">Все</a>
          </li>
          <li class="nav-item">
            <button class="btn btn-link" type="submit" name="for_year">За год</button>
          </li>
          <li class="nav-item">
            <button class="btn btn-link" type="submit" name="for_sim">За семестр</button>
          </li>
          
    </ul>
      </form>
      
       
        <div class="table-responsive">
                    <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">ФИО</th>
                  <th scope="col">Группа</th>
                  <th scope="col">Кол-во баллов</th>
                </tr>
              </thead>
              <tbody>

                <?php if(isset($_POST['for_year'])): ?>
                
                    <?php
                  
                        //$posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                        $posts = $Select->get_select_where_fetch_all('users_score','verify','true');
                  
                  
                        $arr = [];
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                    
                    
                    
                                              
                                              
                            <?php 
                  
                            $about_post = $Select->get_select_where_fetch_assoc('img_post','id',$post['id_post']);
                  
                                $year = substr($about_post['data'], 6);
                  
                                $month = substr($about_post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                  $now = new DateTime();
                     $now->format('Y-m-d H:i:s');    // MySQL datetime format
                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }
                  
                  
      if( ($year == $current_year-1 && $current_month <= $month) || ( $year == $current_year) ){
                               $name = $post['user_login'];
                                    if(empty($arr[$name])){
                                        $arr[$name] = $post['score'];
                                    }
                                    else{
                                        $arr[$name] = $arr[$name] + $post['score'];
                                    }
                            }
                  
                  
                               ?>
                                              
                    
                    
                       <!-- <tr>
                          <th scope="col"><?php echo $arr['qwerty']?></th>
                          <th scope="col"><?=$name?></th>
                          <th scope="col">Группа</th>
                          <th scope="col">Кол-во мероприятий</th>
                        </tr>-->
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $arr= array_slice($arr,0,$count_ach);
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$key);
                        
                        $posts_ac = $SQL->query_all("select * from users_score where user_login = '$key' AND verify = 'true'");
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['FIO'])): ?>
                        
                             <tr>
                              <th scope="col">
                                  <?=$ij?>
                              </th>
                              <th scope="col"><?=$Anketa['FIO']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                               <th>
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                   <?php foreach($posts_ac as $ac):?>
                                      <?php 
                                        $title = $Select->get_select_where_fetch_assoc('img_post','id',$ac['id_post']);
                        
                                        $year = substr($title['data'], 6);
                  
                                        $month = substr($title['data'], 3, 2);

                                        if(substr($month, 0, 1) == 0){
                                            $month = substr($month, 1, 1);
                                        }
                                      ?>
                                      <?php if( ($year == $current_year-1 && $current_month <= $month) || ( $year == $current_year) ):?>
                                      <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$ac['id_post']?>"><?=$title['title']?> - <?=$ac['score']?> (<?=$title['category']?>)</a>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                                </th>
                            </tr>
                        
                        <?php endif; ?>
                        
                        
                        <?php $ij++; } ?>
                    
                  
                
                
                <?php elseif(isset($_POST['for_sim'])): ?>
                
                
                
                
                
                
                
                
                
                
                
                
                  <?php
                  
                        //$posts = $Select->get_select_where_fetch_all('img_post','type','close');
                        $posts = $Select->get_select_where_fetch_all('users_score','verify','true');
                        
                        
                  
                        $arr = [];
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                    
                    
                    
                                              
                                              
                            <?php 
                  
                                $about_post = $Select->get_select_where_fetch_assoc('img_post','id',$post['id_post']);
                  
                                $year = substr($about_post['data'], 6);
                  
                                $month = substr($about_post['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                      
                  $now = new DateTime();
                     $now->format('Y-m-d H:i:s');    // MySQL datetime format
                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    $current_month = substr($now->format('Y-m-d H:i:s'), 5, 2);
                  
                                if(substr($current_month, 0, 1) == 0){
                                    $current_month = substr($current_month, 1, 1);
                                }
                  
                  
                                if($current_month >= 1 && $current_month <= 8){
                                    $simestr = 8;
                                }
                                else{
                                    $simestr = 12;
                                }
                  
                  
      if( $year == $current_year && $simestr >= $month && $month <= 8){
                               $name = $post['user_login'];
                                    if(empty($arr[$name])){
                                        $arr[$name] = $post['score'];
                                    }
                                    else{
                                        $arr[$name] = $arr[$name] + $post['score'];
                                    }
                            }
                  
                  
                               ?>
                                              
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $arr= array_slice($arr,0,$count_ach);
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$key);
                        
                        $posts_ac = $SQL->query_all("select * from users_score where user_login = '$key' AND verify = 'true'");
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['FIO'])): ?>
                        
                             <tr>
                              <th scope="col">
                                  <?=$ij?>
                              </th>
                              <th scope="col"><?=$Anketa['FIO']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                              <th>
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                   <?php foreach($posts_ac as $ac):?>
                                      <?php 
                                        $title = $Select->get_select_where_fetch_assoc('img_post','id',$ac['id_post']);
                        
                                        $year = substr($title['data'], 6);
                  
                                        $month = substr($title['data'], 3, 2);

                                        if(substr($month, 0, 1) == 0){
                                            $month = substr($month, 1, 1);
                                        }
                                      ?>
                                      <?php if( $year == $current_year && $simestr >= $month && $month <= 8):?>
                                      <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$ac['id_post']?>"><?=$title['title']?> - <?=$ac['score']?> (<?=$title['category']?>)</a>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                                </th>
                            </tr>
                        
                        <?php endif; ?>
                        
                        
                        <?php $ij++; } ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                <?php else: ?>
                <?php
                  
                  
                  
                        $posts = $Select->get_select_where_fetch_all('users_score','verify','true');
                  
                  
                        $arr = [];
            
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                                              
                                              
                            <?php 
                  
                  
                                    
                                                     
                                    $name = $post['user_login'];
                                    if(empty($arr[$name])){
                                        $arr[$name] = $post['score'];
                                    }
                                    else{
                                        $arr[$name] = $arr[$name] + $post['score'];
                                    }
                                                     

                            
                  
                  
                               ?>
                    
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $arr= array_slice($arr,0,$count_ach);
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('Students_anketa','students_login',$key);
                        
                        $posts_ac = $SQL->query_all("select * from users_score where user_login = '$key' AND verify = 'true'");
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['FIO'])): ?>
                        
                             <tr>
                              <th scope="col"><?=$ij?></th>
                              <th scope="col"><?=$Anketa['FIO']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                              <th scope="col">
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                   <?php foreach($posts_ac as $ac):?>
                                       <?php $title = $Select->get_select_where_fetch_assoc('img_post','id',$ac['id_post']);?>
                                    <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$ac['id_post']?>"><?=$title['title']?> - <?=$ac['score']?> (<?=$title['category']?>)</a>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                                </th>
                            </tr>
                        
                        <?php endif; ?>
                        
                        
                        <?php $ij++; } ?>

            <?php endif;?>

              </tbody>
            </table>
        </div>


<?php
        include "include/footer_p.php";
?>