<?php


$mysqli = new mysqli('localhost','vh147395_ip5797','xgyrs5OV','vh147395_ip5797');
$mysqli->query ("SET NAMES UTF8");


if ($mysqli->connect_errno) {
    die('Ошибка соединения: ' . $mysqli->connect_errno);
}
