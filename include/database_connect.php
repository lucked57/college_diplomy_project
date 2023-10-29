<?php




$mysqli = new mysqli('localhost','vh147395_ip5797','xgyrs5OV','vh147395_ip5797');





if(mysqli_connect_errno())
{
    echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '. mysqli_connect_error();
    exit();
}
$mysqli->query ("SET NAMES UTF8");

if ($mysqli->connect_errno) {
    die('Ошибка соединения: ' . $mysqli->connect_errno);
}


