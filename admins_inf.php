<?php
    require_once 'include/database.php';
    require_once 'include/classes.php';
?>

<?php
									if(isset($_POST['do_matka']) ){
                               
                                        $name_matka = $_POST['name_matka'];
                                        
                                        $socket_matka = $_POST['socket_matka'];
                                        
                                        $ddr_matka = $_POST['name_DDR'];
                                        
                                       if(!empty($name_matka) and (!empty($socket_matka))  and (!empty($ddr_matka)) ){
                                        
                                            
                                            
                                        $name_matka = trim($name_matka);
      
                                        $name_matka = $mysqli->real_escape_string($name_matka);
                                         
                                        $socket_matka = trim($socket_matka);
      
                                        $socket_matka = $mysqli->real_escape_string($socket_matka);
                                           
                                        $ddr_matka = trim($ddr_matka);
      
                                        $ddr_matka = $mysqli->real_escape_string($ddr_matka);
                                           
                                             
                                        $table = "Matka";
                                             
                                        $name = "Namematka";
                                             
                                        $socket = "socket";
                                             
                                        $DDR = "DDR";
                                             
                                        $insert_matka = new Insert_for_admin();
                                             
                                        $insert_matka = $insert_matka->insert_comp($name_matka,$table,$name,$socket,$socket_matka,$DDR,$ddr_matka);
                                             
                                        //insert_students_emals(trim($pieces_area[$i]));
                                                             
                                        $alert_matka = $insert_matka;
                                            
                                        
                                    }
                                    else{
                                            $alert_matka =  'Заполните поле!';
                                        }
                                    }
  
        
                    



                                    if(isset($_POST['do_cpu']) ){
                               
                                        $name_matka = $_POST['name_cpu'];
                                        
                                        $socket_matka = $_POST['socket_cpu'];
                                        
                                        $ddr_matka = $_POST['cpu_tdp'];
                                        
                                       if(!empty($name_matka) and (!empty($socket_matka))  and (!empty($ddr_matka)) ){
                                        
                                            
                                            
                                        $name_matka = trim($name_matka);
      
                                        $name_matka = $mysqli->real_escape_string($name_matka);
                                         
                                        $socket_matka = trim($socket_matka);
      
                                        $socket_matka = $mysqli->real_escape_string($socket_matka);
                                           
                                        $ddr_matka = trim($ddr_matka);
      
                                        $ddr_matka = $mysqli->real_escape_string($ddr_matka);
                                           
                                             
                                        $table = "cpu";
                                             
                                        $name = "Namecpu";
                                             
                                        $socket = "socket";
                                             
                                        $DDR = "energy";
                                             
                                        $insert_matka = new Insert_for_admin();
                                             
                                        $insert_matka = $insert_matka->insert_comp($name_matka,$table,$name,$socket,$socket_matka,$DDR,$ddr_matka);
                                             
                                        //insert_students_emals(trim($pieces_area[$i]));
                                                             
                                        $alert_cpu = $insert_matka;
                                            
                                        
                                    }
                                    else{
                                            $alert_cpu =  'Заполните поле!';
                                        }
                                    }
    





                                    if(isset($_POST['do_ddr']) ){
                               
                                        $name_matka = $_POST['name_ram'];
                                        
                                        $socket_matka = $_POST['socket_ddr'];
                                        
                                        
                                       if(!empty($name_matka) and (!empty($socket_matka)) ){
                                        
                                            
                                            
                                        $name_matka = trim($name_matka);
      
                                        $name_matka = $mysqli->real_escape_string($name_matka);
                                         
                                        $socket_matka = trim($socket_matka);
      
                                        $socket_matka = $mysqli->real_escape_string($socket_matka);
                                                                                  
                                             
                                        $table = "ram";
                                             
                                        $name = "Nameram";
                                             
                                        $socket = "DDR";
                                             
                                        $insert_matka = new Insert_for_admin();
                                             
                                        $insert_matka = $insert_matka->insert_comp($name_matka,$table,$name,$socket,$socket_matka,$DDR,$ddr_matka);
                                             
                                        //insert_students_emals(trim($pieces_area[$i]));
                                                             
                                        $alert_ram = $insert_matka;
                                            
                                        
                                    }
                                    else{
                                            $alert_ram =  'Заполните поле!';
                                        }
                                    }






                                     if(isset($_POST['do_gpu']) ){
                               
                                        $name_matka = $_POST['name_gpu'];
                                        
                                        $socket_matka = $_POST['tdp_gpu'];
                                        
                                        
                                       if(!empty($name_matka) and (!empty($socket_matka)) ){
                                        
                                            
                                            
                                        $name_matka = trim($name_matka);
      
                                        $name_matka = $mysqli->real_escape_string($name_matka);
                                         
                                        $socket_matka = trim($socket_matka);
      
                                        $socket_matka = $mysqli->real_escape_string($socket_matka);
                                                                                  
                                             
                                        $table = "gpu";
                                             
                                        $name = "namegpu";
                                             
                                        $socket = "energy";
                                             
                                        $insert_matka = new Insert_for_admin();
                                             
                                        $insert_matka = $insert_matka->insert_comp($name_matka,$table,$name,$socket,$socket_matka,$DDR,$ddr_matka);
                                             
                                        //insert_students_emals(trim($pieces_area[$i]));
                                                             
                                        $alert_gpu = $insert_matka;
                                            
                                        
                                    }
                                    else{
                                            $alert_gpu =  'Заполните поле!';
                                        }
                                    }








                                      if(isset($_POST['do_power']) ){
                               
                                        $name_matka = $_POST['name_power'];
                                        
                                        $socket_matka = $_POST['energy_power'];
                                        
                                        $ddr_matka = $_POST['real_energy'];
                                        
                                       if(!empty($name_matka) and (!empty($socket_matka))  and (!empty($ddr_matka)) ){
                                        
                                            
                                            
                                        $name_matka = trim($name_matka);
      
                                        $name_matka = $mysqli->real_escape_string($name_matka);
                                         
                                        $socket_matka = trim($socket_matka);
      
                                        $socket_matka = $mysqli->real_escape_string($socket_matka);
                                           
                                        $ddr_matka = trim($ddr_matka);
      
                                        $ddr_matka = $mysqli->real_escape_string($ddr_matka);
                                           
                                             
                                        $table = "power_supply";
                                             
                                        $name = "namepower";
                                             
                                        $socket = "energy";
                                             
                                        $DDR = "realenergy";
                                             
                                        $insert_matka = new Insert_for_admin();
                                             
                                        $insert_matka = $insert_matka->insert_comp($name_matka,$table,$name,$socket,$socket_matka,$DDR,$ddr_matka);
                                             
                                        //insert_students_emals(trim($pieces_area[$i]));
                                                             
                                        $alert_power = $insert_matka;
                                            
                                        
                                    }
                                    else{
                                            $alert_power =  'Заполните поле!';
                                        }
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

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style_admin.css">
	<link rel="stylesheet" href="css/responsive_admin.css"> 
	<script src="js/modernizr.js"></script> 
  	
	<title>Админ</title>
</head>
<body>

	<?php
        include 'upmenu.php';
    ?>
  
    <?php

    $login = $_COOKIE['login_admin'];
    $admins_posts = new Proverka_cookie();
    $admins_posts = $admins_posts->find_cookie_for_admin($login);
    
        

            $cookie_code = $admins_posts['code'];

    ?>
    
<?php if(password_verify($cookie_code, $_COOKIE['code_admin'])):?>
    
    <?php
        
        $stats_matka = new Stats();
        $stats = 'Matka';
        $stats_matka = $stats_matka->get_info($stats);
    
        $stats = 'cpu';
        $stats_cpu = new Stats();
        $stats_cpu = $stats_cpu->get_info($stats);
    
        $stats = 'ram';
        $stats_ram = new Stats();
        $stats_ram = $stats_ram->get_info($stats);
    
        $stats = 'gpu';
        $stats_gpu = new Stats();
        $stats_gpu = $stats_gpu->get_info($stats);
    
        $stats = 'power_supply';
        $stats_power = new Stats();
        $stats_power = $stats_power->get_info($stats);
    ?>

    <div id="admins">
   
       <div class="container">
           <div class="box_stats color-1">
               <p>Материнские платы</p>
               <p><?=$stats_matka?></p>
               
           </div>
           <div class="box_stats color-2">
               <p>Процессоры</p>
               <p><?=$stats_cpu?></p>
           </div>
           <div class="box_stats color-3">
               <p>Оперативная память</p>
               <p><?=$stats_ram?></p>
           </div>
            <div class="box_stats color-4">
               <p>Видеокарты</p>
               <p><?=$stats_gpu?></p>
           </div>
            <div class="box_stats color-5">
               <p>Блоки питания</p>
               <p><?=$stats_power?></p>
           </div>
       </div>
   
   
       <div class="container_admin">
       <?php if(!empty($alert_matka)): ?>
       <div id="upsight_admins"><p><?=$alert_matka?></p></div>
        <?php endif; ?>
                                          
									<form action="/accountinfo_admins.php" method="POST">
									
									 <input placeholder="Введите название мат.платы" class="input_admin" type="text" name="name_matka"value="<?php echo @$_POST['name_matka'];?>"><br>
                                       
									<input placeholder="Введите socket" class="input_admin" type="text" name="socket_matka"value="<?php echo @$_POST['socket_matka'];?>"><br>
									
									<input placeholder="Введите DDR" class="input_admin" type="text" name="name_DDR"value="<?php echo @$_POST['name_DDR'];?>">
									<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_matka">Добавить</button>
    </p>
    </form>
        </div>
        
        
     <div class="container_admin">
       <?php if(!empty($alert_cpu)): ?>
       <div id="upsight_admins"><p><?=$alert_cpu?></p></div>
        <?php endif; ?>
                                          
									<form action="/accountinfo_admins.php" method="POST">
									
									 <input placeholder="Введите название процессора" class="input_admin" type="text" name="name_cpu"value="<?php echo @$_POST['name_cpu'];?>"><br>
                                       
									<input placeholder="Введите socket" class="input_admin" type="text" name="socket_cpu"value="<?php echo @$_POST['socket_cpu'];?>"><br>
									
									<input placeholder="Введите tdp" class="input_admin" type="text" name="cpu_tdp"value="<?php echo @$_POST['cpu_tdp'];?>">
									<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_cpu">Добавить</button>
    </p>
    </form>
        </div>
        
        
       <div class="container_admin">
       <?php if(!empty($alert_ram)): ?>
       <div id="upsight_admins"><p><?=$alert_ram?></p></div>
        <?php endif; ?>
                                          
									<form action="/accountinfo_admins.php" method="POST">
									
									 <input placeholder="Введите название ram" class="input_admin" type="text" name="name_ram"value="<?php echo @$_POST['name_ram'];?>"><br>
                                       
									<input placeholder="Введите DDR" class="input_admin" type="text" name="socket_ddr"value="<?php echo @$_POST['socket_ddr'];?>"><br>
					<p>				
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_ddr">Добавить</button>
    </p>
    </form>
        </div> 
        
        
        
        
        
         <div class="container_admin">
       <?php if(!empty($alert_gpu)): ?>
       <div id="upsight_admins"><p><?=$alert_gpu?></p></div>
        <?php endif; ?>
                                          
									<form action="/accountinfo_admins.php" method="POST">
									
									 <input placeholder="Введите название видеокарты" class="input_admin" type="text" name="name_gpu"value="<?php echo @$_POST['name_gpu'];?>"><br>
                                       
									<input placeholder="Введите tdp" class="input_admin" type="text" name="tdp_gpu"value="<?php echo @$_POST['tdp_gpu'];?>"><br>
					<p>				
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_gpu">Добавить</button>
    </p>
    </form>
        </div> 
        
        
        
        
        
             <div class="container_admin">
       <?php if(!empty($alert_power)): ?>
       <div id="upsight_admins"><p><?=$alert_power?></p></div>
        <?php endif; ?>
                                          
									<form action="/accountinfo_admins.php" method="POST">
									
									 <input placeholder="Введите название блока питания" class="input_admin" type="text" name="name_power"value="<?php echo @$_POST['name_power'];?>"><br>
                                       
									<input placeholder="Введите energy" class="input_admin" type="text" name="energy_power"value="<?php echo @$_POST['energy_power'];?>"><br>
									
									<input placeholder="Введите real energy" class="input_admin" type="text" name="real_energy"value="<?php echo @$_POST['real_energy'];?>">
									<p>
        <button class="dws-submit_search" class="dws-submit_search:hover" type="submit" name="do_power">Добавить</button>
    </p>
    </form>
        </div>
        
    </div>


<?php else: ?>
				<p id="Admins_block">Войдите под админом!</p>
				<?php endif;?>
    <?php
    include 'podval.php'
    ?>
    
	