<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
 unset($_SESSION['login']);
    unset($_SESSION['pass']);

     SetCookie("login","");
            SetCookie("code","");

SetCookie("login_teacher","");
            SetCookie("code_teacher","");
    header('Location: http://onlinesborka.mcdir.ru.mcpre.ru/index_port.php');
?>

   
    
	