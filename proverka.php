<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
?>

<!doctype html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="новости о пк">
		<meta name="description" content="ключевые слова для посика страницы, теги">
		<meta name="author" lang="ru" content="Певнев Илья">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/styleproverka.css">
<link rel="stylesheet" href="cssadmin/style_podborka_v1.17.css">
	<link rel="stylesheet" href="cssadmin/responsive_podborka_v1.16.css"> 
	<script src="js/modernizr.js"></script> 
  	  <link rel="stylesheet" href="style/preloader.css"> 
    <script src="js/jquery-3.3.1.min.js"></script>	
  	<script src="js/preloader_an.js"></script>
	<title>Проверка</title>
</head>
<body>
    <div id="p_prldr"><div class="contpre">
  
  <div class="loader">
	<div class="square"></div>
	<div class="square"></div>
	<div class="square last"></div>
	<div class="square clear"></div>
	<div class="square"></div>
	<div class="square last"></div>
	<div class="square clear"></div>
	<div class="square"></div>
	<div class="square last"></div>
</div>
 <br>
  
   <br>Подождите<br><small>идет загрузка...</small></div></div>
		<?php
    
    include_once 'upmenu.php';
    
    ?>
	
		<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-5">
			
           
            <div id="signup">
<?php
$_POST;
                $do=null;
if(isset($_POST['do_prov']))
{
  $do=1;
    $pr=null;
    
    if(empty($_POST['matka']) and empty($_POST['cpu']) and empty($_POST['ddr'])and empty($_POST['gpu'])and empty($_POST['power']))
    {
         
        echo '<div id="upsign"><p>Не заполненно ни одного поля</p></div>';
        $pr=1;
    
    }
}
    ?>
    
			    
			    
			    
			    <form action="/proverka.php" method="POST">
     
   
    
        <input  class="input" type="matka" name="matka" value="<?php echo @$_POST['matka'];?>" placeholder="Введите название мат.платы">
    
    <br>
    
    
    <input  class="input" type="cpu" name="cpu" value="<?php echo @$_POST['cpu'];?>"  placeholder="Введите название процессора">
    
    
    <br>
    
    <input  class="input" type="ddr" name="ddr" value="<?php echo @$_POST['ddr'];?>"  placeholder="Введите название ОЗУ">
    
    
    <br>
   
    <input  class="input" type="gpu" name="gpu" value="<?php echo @$_POST['gpu'];?>"  placeholder="Введите название видеокарты">
    
    <br>
    
    <input  class="input" type="power" name="power" value="<?php echo @$_POST['power'];?>"  placeholder="Введите название блока питания">
    <p>
        <button class="dws-submit" class="dws-submit:hover" type="submit" name="do_prov">Проверить</button>
    </p>
                </form>
			</div>
		
 
    
			
		</div>   
		<div id="razdel">
       
   </div>
   <?php
if(($pr!==1) and ($do==1))
{
    

   if(!empty($_POST['matka']) and !empty($_POST['cpu']) )
    {
      
      global $link;
      
      $matka = trim($_POST['matka']);
      
      $cpu = trim($_POST['cpu']);
      
      $matka = mysqli_real_escape_string($link,$matka);
      
       $cpu = mysqli_real_escape_string($link,$cpu);
      
     
                $cpu_socket = get_cpu($cpu);
            
                $matka_socket = get_matka($matka);
                
               // echo $matka_socket,$cpu_socket;

	
                
 
					
	
        
            foreach ($cpu_socket as $cpu) {
            
$cpupr =$cpu['socket'] ;   
       // echo $cpupr;
    

     // echo $matka, $cpu;
      
        }
        
        foreach ($matka_socket as $matka) {
            
$matkapr =$matka['socket'] ;   
        //echo $matkapr;
    

     // echo $matka, $cpu;
      
        }
        if(!empty($cpupr) and !empty($matkapr))
        {
        if($matkapr == $cpupr)
        {
            $matkacpu='Мат. плата '.$_POST['matka'].' подходит под процессор '.$_POST['cpu'].' ,т.к. у них одинаковый сокет: '.$matkapr.'.';
        }
        else
        {
            $matkacpu='Мат. плата '.$_POST['matka'].' не подходит под процессор '.$_POST['cpu'].' ,т.к. у них разные сокеты: '.$matkapr.' у мат.платы и '.$cpupr.' у процессора.';
        }
    }
    else
    {
        $matkacpu= 'Правильно заполните поля';
    }
    }
    else 
    {
        $matkacpu= 'Заполните поля';
        //header('Location: /');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    if(!empty($_POST['matka']) and !empty($_POST['ddr']) )
    {
      $matkaddr = trim($_POST['matka']);
      
      //echo $matkaddr;
      
      $ram = trim($_POST['ddr']);
      
      $matkaddr = mysqli_real_escape_string($link,$matkaddr);
      
        $ram = mysqli_real_escape_string($link,$ram);
     
                $ram_ddr = get_ram($ram);
            
                $matka_ddr5 = get_matkaddr($matkaddr);
                
                //var_dump($matka_ddr5);
               // echo $matka_socket,$cpu_socket;

	
                
 
					
	
        
            foreach ($ram_ddr as $ddr) {
            
$ram_ddr = $ddr['DDR'] ;   
       // echo $cpupr;
    

     // echo $matka, $cpu;
      
        }
        
        foreach ($matka_ddr5 as $ddr) {
            
$matka_ddr5 =$ddr['DDR'] ; 

        //echo $matkapr;
    

     // echo $matka, $cpu;
      
        }
        
        
        
        
        if(!empty($ram_ddr) and !empty($matka_ddr5))
        {
        if($ram_ddr == $matka_ddr5)
        {
            $matkaddr='Под мат. плату '.$_POST['matka'].' подходит оперативная память '.$_POST['ddr'].' ,т.к. у них одинаковый тип ram: '.$matka_ddr5.'.';
        }
        else
        {
            $matkaddr='Под мат. плату '.$_POST['matka'].' не подходит оперативная память '.$_POST['ddr'].' ,т.к. у них разный тип ram: '.$matka_ddr5.' у мат.платы и '.$ram_ddr.' у ОЗУ.';
        }
    }
    else
    {
        $matkaddr= 'Правильно заполните поля';
    }
    }
    else 
    {
        $matkaddr= 'Заполните поля';
        //header('Location: /');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    if(!empty($_POST['gpu']) and !empty($_POST['power']) and !empty($_POST['cpu']) )
    {
      $gputdp = trim($_POST['gpu']);
      
      //echo $matkaddr;
      
      $powertdp = trim($_POST['power']);
      
      $cputdp = trim($_POST['cpu']);
      
      $gputdp = mysqli_real_escape_string($link,$gputdp);
        
        $powertdp = mysqli_real_escape_string($link,$powertdp);
        
        $cputdp = mysqli_real_escape_string($link,$cputdp);
     
                $gputdp = get_gpu($gputdp);
            
                $powertdp = get_power($powertdp);
                
                $cputdp = get_cpupower($cputdp);
    
     foreach ($gputdp as $gpu) {
            
$gputdp = $gpu['energy'] ;   
       // echo $cpupr;
    

     // echo $matka, $cpu;
      
        }
        
        foreach ($powertdp as $power) {
            
$powertdp =$power['energy'] ; 

$realpowertdp =$power['realenergy'] ;

        //echo $matkapr;
    

     // echo $matka, $cpu;
      
        }
        
        foreach ($cputdp as $power) {
            
$cputdp =$power['energy'] ; 

        //echo $matkapr;
    

     // echo $matka, $cpu;
      
        }
        
        
        
        
        if(!empty($gputdp) and !empty($powertdp) and !empty($cputdp) and !empty($realpowertdp))
        {
          //  echo '<br>'.$gputdp.'<br>'; 
           //   echo '<br>'.$powertdp.'<br>'; 
           //   echo '<br>'.$cputdp.'<br>'; 
           //   echo '<br>'.$realpowertdp.'<br>'; 
            $full_tdp = $gputdp+$cputdp;
            $max_tdp = $realpowertdp;
            
            $real_tdp = $max_tdp-$full_tdp; 
            
            
            
            $energy='Энергопотребление: '.$gputdp.' ватт (видеокарта) + '.$cputdp.' ватт (процессор) = '.$full_tdp.' ватт';
            if ($real_tdp > 150 )
            {
                $tdp = $energy.' и остается достаточный запас в '.$real_tdp.' ватт(с учетом погрешности на КПД блока питания) на остальные компоненты.';
            }
            else if(($real_tdp < 150) and ($real_tdp > 1))
            {
                $need_tdp = 150 - $real_tdp;
                $tdp = $energy.' и остается '.$real_tdp.' ватт(с учетом погрешности на КПД блока питания), поэтому нужен блок питания с большей мощностью, т.к. этого хватит на видеокарту и процессор, но для других компонентов нужен больший запас, примерно еще не хватает '.$need_tdp.' ватт.';
            }
            else{
                $tdp=$energy.' ватт(с учетом погрешности на КПД блока питания) А это даже меньше, чем мощность блока питания: '.$max_tdp.' ватт(с учетом погрешности на КПД блока питания). Поэтому мощности данного блока питания будет не достаточно даже для видеокарты и процессора, не говоря уже об остальных компонентах.';
            }
            
        }
        else {
            $tdp= 'Правильно заполните поля';
        }
        
    }
    else {
        $tdp= 'Заполните поля';
    }
    }
    //echo '<div style="width: 600px; float: left; height: 400px; background:rgb(90, 161, 142,0.1); margin-top:-750px; margin-left: 190px"><font   size="6" color="#fffff" face="Arial" >'.$matkacpu.'<br>'.$matkaddr.'<br>'.$tdp.'</font></div>';
?>
   
   
<div id="contentposts">

          
           <div id="blockpost5">
           
            <p id="contentpost"><?=$matkacpu?><br>
            <?=$matkaddr?><br>
            <?=$tdp?>
            </p>
        </div>
        

        <div id="postsafter">
            
        </div>
    </div>
    
    <?php
    include 'podval.php'
    ?>
   
    
	