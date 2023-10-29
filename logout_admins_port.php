<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
 unset($_SESSION['login_admin']);
    unset($_SESSION['pass_admin']);
    SetCookie("login_admin","");
           SetCookie("code_admin","");
header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php');
?>

   
    
	