<?php

class Vehicule{

    public $id;
    public $marque;
    public $modele;
    public $immatriculation;
    public $statut;
    public $prix;


public function __construct(array $row = []) {
    $this->id = $row["id_voiture"];
    $this->marque = $row["marque"];
    $this->modele = $row["modele"];
    $this->immatriculation = $row["immatriculation"];
    $this->prix = $row["prix"];
    $this->statut = $row["statut"];

}

public static function all(){
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
    if (!isset($pdo)){
        echo "erreur de connexion";
    }
    $sql="SELECT * FROM voitures";
    $temp=$pdo->query($sql);
    $result=$temp->fetchAll();
    $vehicules=[];
    foreach ($result as $row){
        $vehicules[] = new Vehicule($row);
    }
    return $vehicules;
}
}


?>