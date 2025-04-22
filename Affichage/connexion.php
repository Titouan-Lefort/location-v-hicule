<?php
    include("header.php");
    include("../Classe/Bdd.php");
    $pdo=Bdd::PDO();                                            
    $validation=0;
    $_SESSION["admin"] = 0;
    $_SESSION["connexion"] = 0;
    $sql="SELECT * FROM utilisateur";
    $temp = $pdo->query($sql);
    while($resultat=$temp->fetch()){
        if(isset($_POST["nom"]) AND isset($_POST["mdp"]))
            if($_POST["nom"] == $resultat["nom"] AND $_POST["mdp"] == $resultat["mdp"]){
                $validation = 1;
                if ($resultat["admin"] == 1)
                    $_SESSION["admin"] = 1;
                    echo $_SESSION["admin"];
            }
        }
?>
<body>
    <?php
        if ($validation == 0){
            $_SESSION["connexion"] = 0;
            echo "<form method='post' action='connexion.php'>
                    <input name='nom' type='text' placeholder='Identifiant'>
                    <input name='mdp' type='password' placeholder='Mot de passe'>
                    <input type='submit' value='valider'>
                </form>";
            }
        if ($validation == 1){
            $_SESSION["connexion"] = 1;
            echo $_SESSION["admin"];
            header('Location: index.php');
        }
        include("footer.php")
    ?>
