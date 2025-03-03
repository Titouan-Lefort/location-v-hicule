

<?php
        include("lien_sql.php");

    if (isset($_GET["marque"]) AND isset($_GET["modele"]) AND isset($_GET["immatriculation"]) AND isset($_GET["statut"]) AND isset($_GET["prix"])){
        if($_GET["bouton"] == "modifier"){
            $sql="UPDATE voitures SET marque='".$_GET["marque"]."',modele='".$_GET["modele"]."',immatriculation='".$_GET["immatriculation"]."',statut='".$_GET["statut"]."',prix='".$_GET["prix"]."' WHERE id_voiture=".$_GET["id"] ;
            $pdo->exec($sql);
        }
        if($_GET["bouton"] == "ajouter"){
            $sql="INSERT INTO voitures (marque, modele, immatriculation, statut, prix) VALUES ('".$_GET["marque"]."','".$_GET["modele"]."','".$_GET["immatriculation"]."','".$_GET["statut"]."','".$_GET["prix"]."')";
            $pdo->exec($sql);
        }
    }

    
    if (isset($_REQUEST["del"])){
        if($_REQUEST["del"] == 1){
            $sql="DELETE FROM voitures WHERE id_voiture =".$_REQUEST["id"];
            $pdo->exec($sql);
        }
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voiture</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once ("vehicule.php");
    
    $vehicules = Vehicule::all();
    session_start();
    echo "</table><a href='formulaire.php?action=ajouter'>ajouter</a>";
    echo "
            <table>
            <tr>
            <th>Id</th>
            <th>Marque</th>
            <th>Modele</th>
            <th>Date immatriculation</th>
            <th>Disponibilité</th>
            <th>Prix/jour</th>
            <th>Info</th>
            ";if ($_SESSION["admin"] == 1){ echo"<th>Action</th>";}
            "</tr>";?>
<?php foreach ($vehicules as $vehicule): ?>
    <tr>
        <td><?php echo $vehicule->id; ?></td>
        <td><?php echo $vehicule->marque; ?></td>
        <td><?php echo $vehicule->modele; ?></td>
        <td><?php echo $vehicule->immatriculation; ?></td>
        <td><?php echo $vehicule->statut; ?></td>
        <td><?php echo $vehicule->prix; ?> €</td>
        <td><a href=''><img id='detail' src='info.png'></a></td>
        <td><?php echo "<a href='formulaire.php?id=".$vehicule->id."&action=modifier'>Modifier</a>"?></td>
        <td><?php echo "<a href='voiture.php?del=1&id=".$vehicule->id."'>supprimer</a>"?></td>
        
    </tr>
    <?php endforeach; ?>
    <!-- <a href="connexion.php">Déconnexion</a>
    <?php 
        echo "
        <table>
        <tr>
        <th>Id</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Date immatriculation</th>
        <th>Disponibilité</th>
        <th>Prix/jour</th>
        <th>Info</th>
        ";if ($_SESSION["admin"] == 1){ echo"<th>Action</th>";}
        "</tr>";
        
        while ($resultat = $temp->fetch()){
            echo "<tr><td>".$resultat["id_voiture"]."</td><td>".$resultat["marque"]."</td><td>".$resultat["modele"]."</td><td>".$resultat["immatriculation"]."</td><td>".$resultat["statut"]."</td><td>".$resultat["prix"]." € </td><td><a href=''><img id='detail' src='info.png'></a></td>"; if($_SESSION["admin"] == 1){echo "</td><td><a href='formulaire.php?id=".$resultat["id_voiture"]."&action=modifier'>Modifier</a>"."   /   "."<a href='voiture.php?del=1&id=".$resultat["id_voiture"]."'>supprimer</a></td>";}"</tr>";
        }
        echo "</table>
        <a href='formulaire.php?action=ajouter'>ajouter</a>";
        
    ?> -->

<script src="script.js"></script>
</body>
</html>