<?php

$host="localhost";
$db="appli_vehicule";
$user="root";
$pass="";
$port="3306";
$charset="utf8mb4";
$dsn="mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$option=[
    PDO::ATTR_ERRMODE   =>\PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try{
    $pdo=new PDO($dsn, $user, $pass, $option);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>