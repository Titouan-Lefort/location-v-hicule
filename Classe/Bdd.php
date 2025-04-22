<?php
class Bdd
{

    private $host;
    private $db;
    private $user;
    private $pass;
    private $port;
    private $charset;
    private $dsn ; 
    private $option;

    public static function PDO(){
    $host = "localhost";
    $db = "appli_vehicule";
    $user = "root";
    $pass = "";
    $port = "3306";
    $charset = "utf8mb4";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
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
    return $pdo;
}


public static function execution($sql, array $parametre) {
    $pdo = Bdd::PDO();
    $com = $pdo->prepare($sql);
    $com->execute([
        ':marque' => $parametre[0],
        ':modele' => $parametre[1],
        ':immatriculation' => $parametre[2],
        ':statut' => $parametre[3],
        ':prix' => $parametre[4]
    ]);
    $_SESSION["action"] = "";
}
}
?>