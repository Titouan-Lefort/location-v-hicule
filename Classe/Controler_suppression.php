<?php
class Controler_suppression
{
    public function supp(){
        if (isset($_REQUEST["action"])){
            if ($_REQUEST["action"] == "supprimer"){
                $pdo = Bdd::PDO();
                $sql = "DELETE FROM voitures WHERE id_voiture =".$_REQUEST["id"];
                $pdo->exec($sql);
            }   
        }
    }
}
?>