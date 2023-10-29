<?php


$link = mysqli_connect('a222068.mysql.mchost.ru','a222068_5','mr.ilya557799','a222068_5');
mysqli_query ($link, "SET NAMES UTF8");
session_start();

if(mysqli_connect_errno())
{
    echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '. mysqli_connect_error();
  
    exit();
}
