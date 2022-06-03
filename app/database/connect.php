<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'u1615265_dinamic-site';
$db_user = 'u1615265_root';
$db_pass = 'uI9jV2iG3ouH5h';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options
    );
}catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}