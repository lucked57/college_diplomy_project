<?php
    //require_once 'include/database.php';
    //require_once 'include/functions.php';
     unset($_SESSION['admin']);
     unset($_SESSION['pass']);
     SetCookie("admin","");
     SetCookie("code","");
    header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_dress.php');
//header('Location: /');
?>

   
    
	