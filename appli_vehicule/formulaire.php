<?php 
include("Bdd.php");
$pdo=Bdd::PDO();

if (isset($_REQUEST["id"])){
    $sql="SELECT * FROM voitures WHERE id_voiture=".$_REQUEST["id"];
    $temp = $pdo->query($sql);
    $modifier = $temp->fetch();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include("vehicule.php");
    $vehicules = Vehicule::all();
    if($_REQUEST["action"] == "modifier"){
        foreach ($vehicules as $vehicule):
            echo"
                <form method='get' action='voiture.php'>
                    <input name='marque' type='text' value=".$vehicule->marque.">
                    <input name='modele' type='text' value=".$vehicule->modele.">
                    <input name='immatriculation' type='date' value=".$vehicule->immatriculation.">
                    <select name='statut'>
                        <option value='1'>Disponible</option>
                        <option value='0' ";if ($modifier["statut"] == 0){echo "selected";} echo">Non disponible</option>
                    </select>
                    <input name='prix' type='number' value=".$vehicule->prix.">
                    <input name='id' type='hidden' value=".$_REQUEST["id"].">
                    <input name ='bouton' type='submit' value='modifier'>
                </form>";
        endforeach;
        }
    if($_REQUEST["action"] == "ajouter"){
        echo"
            <form method='get' action='voiture.php'>
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
?>
<script src="script.js"></script>
</body>
</html>