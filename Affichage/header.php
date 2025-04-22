<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../CSS/style.css">
    <div class="header">
        <div class="nav">
            <h1>Location véhicules</h1>
            <?php 
            if (isset($_SESSION["connexion"]) && isset($_SESSION["admin"])){
            if ($_SESSION["connexion"] == 1){ echo '<a href="connexion.php" class="deco">Déconnexion</a>';}}?>
            <a href='../Affichage/connexion.php' class="deco">Connexion</a>
            <a href="../Affichage/index.php" class="navig">Accueil</a>
            <?php 
            if (isset($_SESSION["connexion"]) && isset($_SESSION["admin"])){
                if ($_SESSION["connexion"] == 1){echo '<a class="navig" href="">Profil</a>';}
                if ($_SESSION["admin"] == 1){ echo '<a class="navig" href="formulaire.php?action=ajouter" >Ajouter</a>';}}?>
        </div>
    </div>
</head>
