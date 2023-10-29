<?php
    require_once 'include/database_for_podborka.php';
   // require_once 'include/functions.php';
    require_once 'include/classes.php';
    require_once("PHPExcel.php");
    require_once("PHPExcel/Writer/Excel5.php");
?>
<?php

global $mysqli;

        $login = $_COOKIE['login_teacher'];

        $select = new Select();
        $anketa = $select->get_select_where_fetch_assoc('teatchers_anketa','login',$login);
        $gropupe_name = $anketa['Group_name'];

        $achivka = $select->get_select_where_fetch_all('Students_achivka','Group_name',$gropupe_name);

        





 $doc_body ="
 <style>


.table_teaches table {
font-family: 'Times New Roman', Times, serif;
text-align: center;
border-collapse: separate;
border-spacing: 5px;
background: #fff;
color: #656665;
}
.table_teaches table th {
font-size: 2rem;
padding: 10px;
background: #f5f5f5;

}
.table_teaches table td {
    
background: #45b4eb;
    font-size: 2rem;
padding: 10px;
    color: #fff;
    vertical-align: middle;
    
}

.table_teaches table td:nth-child(3){
    
    width: 400px;
    
}

 </style>
 <div class='table_teaches'>
    <table>
<tr>
  <th> № </th>
  <th>Заголовок</th>
  <th>Описание достижения</th>
  <th>Доступ</th>
  <th>Группа</th>
  <th>ФИО</th>
  </tr>
 <tr>
 ";



mb_convert_encoding($doc_body, "UTF-8");


  if(isset($_POST['submit_docs'])){
      
      $i = 1;
      
        $aDoor = $_POST['formDoor'];
      
        if(empty($aDoor)){
            
              
            foreach ($achivka as $info){
                $select_fio = $select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['students_login']);

                $doc_body.= "  <td>".$i."</td>
              <td>".$info['title']."</td>
              <td>".mb_substr($info['text_achivka'],0,100)."</td>
              <td>".$info['check_achiv']."</td>
              <td>".$select_fio['Group_name']."</td>
              <td>".$select_fio['FIO']."</td>
             </tr>
             ";
                $i++;

            }
            
        }
      else{
          
          $N = count($aDoor);
          
         for($j=0; $i <= $N; $j++){
             
             $id = $aDoor[$j];
             
             $info = $select->get_select_where_fetch_assoc('Students_achivka','id',$id);
             
             $select_fio = $select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['students_login']);
             
             $doc_body.= "  <td>".$i."</td>
              <td>".$info['title']."</td>
              <td>".mb_substr($info['text_achivka'],0,100)."</td>
              <td>".$info['check_achiv']."</td>
              <td>".$select_fio['Group_name']."</td>
              <td>".$select_fio['FIO']."</td>
             </tr>
             ";
                $i++;
             
         }
          
          
      }
      
      
                  




$doc_body.=  "</table>
</div>";
      
      
          header("Content-Type: application/vnd.msword");
          header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
          header("content-disposition: attachment;filename=infoaboutusers.doc");
      
      
          echo "<html lang='ru'>";
          echo "<head>
        <meta charset='UTF-8'>";   
          echo "$doc_body";
          echo "</head>";
          echo "</html>"; 
      
           
  } 

if(isset($_POST['submit_excel'])){
    $myXls = new PHPExcel();
$myXls->setActiveSheetIndex(0);
$mySheet = $myXls->getActiveSheet();
$mySheet->setTitle("Информация о студентах");
    
    $mySheet->setCellValue("A1", "№");
    $mySheet->setCellValue("B1", "Заголовок");
    $mySheet->setCellValue("C1", "Описание достижения");
    $mySheet->setCellValue("D1", "Доступ");
    $mySheet->setCellValue("E1", "Группа");
    $mySheet->setCellValue("F1", "ФИО");
    
                $mySheet->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("B1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("C1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("D1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("E1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("F1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    
    
     $i = 1;
     $ex = 2;
      
        $aDoor = $_POST['formDoor'];
      
        if(empty($aDoor)){
            
              
            foreach ($achivka as $info){
                $select_fio = $select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['students_login']);
                
                $mySheet->getStyle("A".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("B".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("C".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("D".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("E".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("F".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                
                
                
                $mySheet->setCellValue("A".$ex, $i);
                $mySheet->setCellValue("B".$ex, $info['title']);
                $mySheet->setCellValue("C".$ex, mb_substr($info['text_achivka'],0,100)."...");
                $mySheet->setCellValue("D".$ex, $info['check_achiv']);
                $mySheet->setCellValue("E".$ex, $select_fio['Group_name']);
                $mySheet->setCellValue("F".$ex, $select_fio['FIO']);

                $i++;
                $ex++;

            }
            
        }
      else{
          
          $N = count($aDoor);
          
         for($j=0; $i <= $N; $j++){
             
             $id = $aDoor[$j];
             
             $info = $select->get_select_where_fetch_assoc('Students_achivka','id',$id);
             
             $select_fio = $select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['students_login']);
             
               $mySheet->getStyle("A".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("B".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("C".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("D".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("E".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $mySheet->getStyle("F".$ex)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                
                
                
                $mySheet->setCellValue("A".$ex, $i);
                $mySheet->setCellValue("B".$ex, $info['title']);
                $mySheet->setCellValue("C".$ex, mb_substr($info['text_achivka'],0,100)."...");
                $mySheet->setCellValue("D".$ex, $info['check_achiv']);
                $mySheet->setCellValue("E".$ex, $select_fio['Group_name']);
                $mySheet->setCellValue("F".$ex, $select_fio['FIO']);

                $i++;
                $ex++;
             
         }
          
          
      }
    
    
    
    
    

    $mySheet ->getColumnDimension("A")->setAutoSize(true);
    $mySheet ->getColumnDimension("B")->setAutoSize(true);
    $mySheet ->getColumnDimension("C")->setAutoSize(true);
    $mySheet ->getColumnDimension("D")->setAutoSize(true);
    $mySheet ->getColumnDimension("E")->setAutoSize(true);
    $mySheet ->getColumnDimension("F")->setAutoSize(true);


header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=info_about_students.xls");


$objWriter = new PHPExcel_Writer_Excel5($myXls);
$objWriter->save("php://output");
    
    
}
?>


<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="новости о пк">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="cssforportfoli/fonts.css">

	<link rel="stylesheet" href="cssforportfoli/reset.css">

	  <?php
        include 'style.php';
    ?>
   <link rel="stylesheet" href="cssforportfoli/preloader_v1.07.css"> 
   <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>
 <script src="js/loading_an_v1.05.js"></script>
	<title>Портфолио студентов</title>
</head>
<body>
<div id="p_prldr"><div class="contpre">
 <div class="cssload-container">
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading"></span>
		</li>
     </ul>
</div>	
   Подождите<br><small>идет загрузка...</small></div></div>
	<?php
        include 'menu.php';
        if(isset($_COOKIE['login'])){
        
        include 'login_modal.php';
        
    }
    if(isset($_COOKIE['login_teacher'])){
        
        include 'pass_change_t.php';
        
    }
    ?>
       <?php if(isset($_COOKIE['login_teacher'])):?>
  <script src="js/ajaxscript_t_v1.07.js"></script>
    <?php endif;?>
    <div class="blur">

 <?php

    $login = $_COOKIE['login_teacher'];
    
    $pr_cookie = new Proverka_cookie();
    
    $pr_cookie = $pr_cookie->find_cookie_for_teatchers($login);
    
$i = 1;
        

            $cookie_code = $pr_cookie['code'];
        
    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_teacher'])):?>
<div id="admins">
    




<div class="adminsafter">



 
  







<?php
								
                                        
                                        
   $i = 1;                         
    

mb_internal_encoding("UTF-8");
    
//$info_login = get_accountinfo_for_admins();

        ?>

    <div class="table_teaches all-achivka">
    <form name="proposal_form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    <table>
<tr>
     <th></th>
  <th> № </th>
  <th>Заголовок</th>
  <th>Описание достижения</th>
  <th>Доступ</th>
  <th>Группа</th>
  <th>ФИО</th>
  </tr>
  <?php foreach ($achivka as $info):?>
  <?php
        $select_fio = $select->get_select_where_fetch_assoc('Students_anketa','students_login',$info['students_login']);
        ?>
 <tr>
 <td>
 <label class="checkbox">
    <input type="checkbox" name="formDoor[]" value="<?=$info['id']?>"/><span class="box"><div class="text"></div></span>
    </label>
    </td>
  <td><?=$i?></td>
  <td><?=$info['title']?></td>
  <td><?=mb_substr($info['text_achivka'],0,100)?>...</td>
  <td><?=$info['check_achiv']?></td>
  <td><?=$select_fio['Group_name']?></td>
  <td><?=$select_fio['FIO']?></td>
 </tr>
 <?php $i++?>
 <?php    endforeach;?>
 
 
 

</table>
    <input type="submit" name="submit_docs" class="dws-submit" value="Экспорт в MS Word" class="input-button" />
      <input type="submit" name="submit_excel" class="dws-submit" value="Экспорт в MS Excel" class="input-button" />
      <div class="accept_d" id="delete_achivka_for_t">
        <p>Удалить</p>
    </div>
</form>
    </div>
    
    
    
    
    </div>
        

    
    
    

<?php
    
    
    
    

    
    
        ?>
    <?php else: ?>
				<p id="Admins_block">Войдите под вашим логином!</p>
				<?php endif;?>
				
				
   <?php
    include 'podval_port.php';
    ?>
   
    
