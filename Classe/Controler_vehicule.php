<?php
include("Bdd.php");
class Controler_vehicule
{
    private $admin;
    private $parametres;
    public function __construct() {
        $this->admin = isset($_SESSION["admin"]) && $_SESSION["admin"] == 1;
            $this->parametres = [
                'marque' => $_GET["marque"] ?? null,
                'modele' => $_GET["modele"] ?? null,
                'immatriculation' => $_GET["immatriculation"] ?? null,
                'statut' => $_GET["statut"] ?? null,
                'prix' => $_GET["prix"] ?? null,
            ];
        }
    public function param(){
        if ($this->admin){
                $parametre =[
                    $this->parametres["marque"],
                    $this->parametres["modele"],
                    $this->parametres["immatriculation"],
                    $this->parametres["statut"],
                    $this->parametres["prix"],
                ];
            Controler_vehicule::commande($_SESSION["action"], $parametre);
        }
    }
    private function verification() {
        foreach (['marque', 'modele', 'immatriculation', 'statut', 'prix', 'id'] as $champ) {
            if (empty($this->params[$champ])) {
                return false;
            }
        }
        return true;
    }
    public static function commande($type, array $parametre){
        $pdo = Bdd::PDO();
        if ($type == "modifier") {
            $sql = "UPDATE voitures     
                    SET marque = :marque, 
                        modele = :modele, 
                        immatriculation = :immatriculation, 
                        statut = :statut, 
                        prix = :prix 
                    WHERE id_voiture = ".$_SESSION["id"];
        }
        if ($type == "ajouter") {
            $sql = "INSERT INTO voitures (marque, modele, immatriculation, statut, prix) 
                    VALUES (:marque, :modele, :immatriculation, :statut, :prix)";
        } 
        if (isset($sql)){
            Bdd::execution($sql, $parametre);
        }
    }   
}
?>