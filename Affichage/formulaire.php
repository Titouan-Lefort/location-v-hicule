<?php 
include("../Classe/Bdd.php");
include('header.php');
$pdo=Bdd::PDO();
$_SESSION["action"] = $_GET["action"];
if (isset($_REQUEST["id"])){
    $_SESSION["id"] = $_REQUEST["id"];
    $sql="SELECT * FROM voitures WHERE id_voiture=".$_REQUEST["id"];
    $temp = $pdo->query($sql);
    $modifier = $temp->fetch();
}
    include('../Classe/Vehicule.php');
    $vehicules = Vehicule::all();
    if($_REQUEST["action"] == "modifier"){
        foreach ($vehicules as $vehicule):
            var_dump($vehicule->id);
            echo"
                <form method='get' action='index.php'>
                    <input name='marque' type='text' value=".$vehicule->marque.">
                    <input name='modele' type='text' value=".$vehicule->modele.">
                    <input name='immatriculation' type='date' value=".$vehicule->immatriculation.">
                    <select name='statut'>
                        <option value='1'>Disponible</option>
                        <option value='0' ";if ($modifier["statut"] == 0){echo "selected";} echo">Non disponible</option>
                    </select>
                    <input name='prix' type='number' value=".$vehicule->prix.">
                    <input name='id' type='hidden' value=".$vehicule->id.">
                    <input name ='bouton' type='submit' value='modifier'>
                </form>";
        endforeach;
        }
    if($_REQUEST["action"] == "ajouter"){
        echo"
            <form method='get' action='index.php'>
                <input name='marque' type='text' placeholder='marque'>
                <input name='modele' type='text' placeholder='modèle'>
                <input name='immatriculation' type='date'>
                <select name='statut' >
                    <option value='1'>Disponible</option>
                    <option value='0'>Non disponible</option>
                </select>
                <input name='prix' type='number' placeholder='prix'>
                <input name ='bouton' type='submit' value='ajouter'>
            </form>";
    }
include("footer.php")
?>


