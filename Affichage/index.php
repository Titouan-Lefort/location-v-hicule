<?php
    include("header.php");
    require_once ("../Classe/Vehicule.php"); 
    require_once ("../Classe/Controler_vehicule.php"); 
    require_once("../Classe/Controler_suppression.php");
    $Controler_vehicule = new Controler_vehicule();
    $Controler_vehicule->param();
    $Controler_supression = new Controler_suppression();
    $Controler_supression->supp();
    $vehicules = Vehicule::all();
    echo "
            <table>
            <tr>
            <th>Id</th>
            <th>Marque</th>
            <th>Modele</th>
            <th>Date immatriculation</th>
            <th>Disponibilité</th>
            <th>Prix/jour</th>
            <th>Info</th>";
            if (isset($_SESSION["admin"])){
                if ($_SESSION["admin"] == 1){ echo"<th>Action</th>";}}
            "</tr>";?>
<?php foreach ($vehicules as $vehicule): ?>
    <tr>
        <td class='table'><?php echo $vehicule->id; ?></td>
        <td class='table'><?php echo $vehicule->marque; ?></td>
        <td class='table'><?php echo $vehicule->modele; ?></td>
        <td class='table'><?php echo $vehicule->immatriculation; ?></td>
        <td class='table'><?php echo $vehicule->statut; ?></td>
        <td class='table'><?php echo $vehicule->prix; ?> €</td>
        <td><a href=''><img id='detail' src='../image/info.png'></a></td>
        <td><?php if (isset($_SESSION["admin"])){if ($_SESSION["admin"] == 1){ echo "<a class='action' href='formulaire.php?id=".$vehicule->id."&action=modifier'>Modifier</a>";}}?></td>
        <td><?php if (isset($_SESSION["admin"])){if ($_SESSION["admin"] == 1){ echo "<a class='action' href='index.php?action=supprimer&id=".$vehicule->id."'>supprimer</a>";}}?></td>
        
    </tr>
    <?php endforeach; 
            echo "</table>";
    ?>
<script src="script.js"></script>
</body>
</html>