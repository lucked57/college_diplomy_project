<?php
    include "include/pr_cookie.php";
    require_once 'include/database_for_podborka.php';
    require_once 'include/classes.php';
    global $mysqli;

    $Select = new Select();

    $Insert = new Insert();

    //$posts = $Select->get_fetch_all_order_count('users');

    //$i = 1;
    $SQL = new SQL_native();
    if($pr_cookie != 'admin'){
        exit();
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>сайт</title>
  		<meta name="keywords" content="...">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Илья Алексеевич(авторство)">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      
     <?php include "include/style_p.php" ?>
     <?php include "include/header_p.php" ?>
       
	<?php include "include/forms_not_sign_in.php"; ?>
	</head>
	
	<body>
	
      <form action="/stats_teacher.php" method="POST" enctype="multipart/form-data" id="top">
      <ul class="nav mt-5 pt-5">
         
          <li class="nav-item">
            <a class="nav-link active" href="stats_teacher.php">Все</a>
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
                  <th scope="col">Кол-во мероприятий</th>
                </tr>
              </thead>
              <tbody>

                <?php if(isset($_POST['for_year'])): ?>
                
                    <?php
                  
                        $posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                  
                        $arr = [];
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                    
                    
                     <?php if(!empty($post['teachers_ar'])): ?>
                                              
                                              
                            <?php 
                  
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
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
                               $pieces_area = explode(" ", trim($post['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    if(empty($arr[$name])){
                                        $arr[$name] = 1;
                                    }
                                    else{
                                        $arr[$name]++;
                                    }
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            }
                  
                  
                               ?>
                                              
                       <?php endif; ?>
                    
                       <!-- <tr>
                          <th scope="col"><?php echo $arr['qwerty']?></th>
                          <th scope="col"><?=$name?></th>
                          <th scope="col">Группа</th>
                          <th scope="col">Кол-во мероприятий</th>
                        </tr>-->
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$key);
                        
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['Name'])): ?>
                        
                             <tr>
                              <th scope="col"><?=$ij?></th>
                              <th scope="col"><?=$Anketa['Name']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                              <th scope="col">
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                  
                                  <?php foreach($posts as $post_teacher):?>
                                  
                                  <?php 
                                    $year = substr($post_teacher['data'], 6);
                  
                                $month = substr($post_teacher['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                  
                        if( ($year == $current_year-1 && $current_month <= $month) || ( $year == $current_year) ){
                  

                               $pieces_area = explode(" ", trim($post_teacher['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ijq = 0;
                                do{
                                    
                                  
                                                     
                                ?>
                                  
                                   <?php if($key == $pieces_area[$ijq]):?>
                                    <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$post_teacher['id']?>">
                                    <?=$post_teacher['title']?>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php
                                    
                                    $ijq++;
                     
                                              
                                 }while($pieces_area[$ijq]!=$end_pieces); 
                            
                  
                        }
                               ?>
                                    
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                                </th>
                            </tr>
                        
                        <?php endif; ?>
                        
                        
                        <?php $ij++; } ?>
                    
                  
                
                
                <?php elseif(isset($_POST['for_sim'])): ?>
                
                
                
                
                
                
                
                
                
                
                
                
                  <?php
                  
                        $posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                  
                        $arr = [];
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                    
                    
                     <?php if(!empty($post['teachers_ar'])): ?>
                                              
                                              
                            <?php 
                  
                                $year = substr($post['data'], 6);
                  
                                $month = substr($post['data'], 3, 2);
                  
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
                               $pieces_area = explode(" ", trim($post['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    if(empty($arr[$name])){
                                        $arr[$name] = 1;
                                    }
                                    else{
                                        $arr[$name]++;
                                    }
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            }
                  
                  
                               ?>
                                              
                       <?php endif; ?>
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$key);
                        
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['Name'])): ?>
                        
                             <tr>
                              <th scope="col"><?=$ij?></th>
                              <th scope="col"><?=$Anketa['Name']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                              <th scope="col">
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                  
                                  <?php foreach($posts as $post_teacher):?>
                                  
                                  <?php 
                                    $year = substr($post_teacher['data'], 6);
                  
                                $month = substr($post_teacher['data'], 3, 2);
                  
                                if(substr($month, 0, 1) == 0){
                                    $month = substr($month, 1, 1);
                                }
                  
                  
                  
                        if( $year == $current_year && $simestr >= $month && $month <= 8){
                  

                               $pieces_area = explode(" ", trim($post_teacher['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ijq = 0;
                                do{
                                    
                                  
                                                     
                                ?>
                                  
                                   <?php if($key == $pieces_area[$ijq]):?>
                                    <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$post_teacher['id']?>">
                                    <?=$post_teacher['title']?>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php
                                    
                                    $ijq++;
                     
                                              
                                 }while($pieces_area[$ijq]!=$end_pieces); 
                            
                  
                        }
                               ?>
                                    
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                                </th>
                            </tr>
                        
                        <?php endif; ?>
                        
                        
                        <?php $ij++; } ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                <?php else: ?>
                <?php
                  
                        $posts = $Select->get_select_where_fetch_all('img_post','type','close');
                  
                  
                        $arr = [];
            
                  
                        
                  
                    ?>
                    
                    
                    
                  
                    
                
                    <?php foreach($posts as $post): ?>
                    
                    
                     <?php if(!empty($post['teachers_ar'])): ?>
                                              
                                              
                            <?php 
                  
                  

                               $pieces_area = explode(" ", trim($post['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ij = 0;
                                do{
                                                     
                                    $name = $pieces_area[$ij];
                                    if(empty($arr[$name])){
                                        $arr[$name] = 1;
                                    }
                                    else{
                                        $arr[$name]++;
                                    }
                                                     
                                $ij++;
                     
                                              
                                 }while($pieces_area[$ij]!=$end_pieces); 
                            
                  
                  
                               ?>
                                              
                       <?php endif; ?>
                    
                    <?php endforeach; ?>
                    
                <?php
                    arsort($arr); //key - login, val - num
                    $ij = 1;
                    foreach ($arr as $key => $val) {
                        
                        $Anketa = $Select->get_select_where_fetch_assoc('teatchers_anketa','login',$key);
                        
                        ?>
                        
                        
                        <?php if(!empty($Anketa['Name'])): ?>
                        
                             <tr>
                              <th scope="col"><?=$ij?></th>
                              <th scope="col"><?=$Anketa['Name']?></th>
                              <th scope="col"><?=$Anketa['Group_name']?></th>
                              <th scope="col">
                              <div class="dropdown">
                                  <button class="btn btn-link" type="button" id="<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$val?>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="<?=$key?>">
                                  
                                  <?php foreach($posts as $post_teacher):?>
                                  
                                  <?php 
                  
                  

                               $pieces_area = explode(" ", trim($post_teacher['teachers_ar']));
                               array_push($pieces_area, "apple");
                                $end_pieces = end($pieces_area);
                                $ijq = 0;
                                do{
                                    
                                  
                                                     
                                ?>
                                  
                                   <?php if($key == $pieces_area[$ijq]):?>
                                    <a class="dropdown-item" target="_blank" href="post_p.php?post_id=<?=$post_teacher['id']?>">
                                    <?=$post_teacher['title']?>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php
                                    
                                    $ijq++;
                     
                                              
                                 }while($pieces_area[$ijq]!=$end_pieces); 
                            
                  
                  
                               ?>
                                    
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