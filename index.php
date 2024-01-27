<?php
include 'connexion.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel ="stylesheet" type="text/css" href="style.css">

    <title>Accueil</title>

</head>
<style >


</style>
<body class="texte">



<div class="menu-bar">



    <ul>
        <li class="active"><a href="Acceuil.php"><i class="fa fa-home"></i>Accueil</a></li>
        <li><a href="Laureat.php"><i class="fa fa-user"></i>Laureat</a>
            <div class="sub-menu-1">
                <ul>
                    <li ><a href="AjouterLaureat.php"><i class="fa fa-plus"></i>Ajout</a></li>
                    <li><a href="Laureat.php"><i class="fa-solid fa-clipboard-list"></i>Affichage</a></li>
                    <li><a href="supprimerLaureat.php"><i class="fas fa-trash"></i>Supprimer</a></li>
                </ul>
            </div>
        </li>
        <li><a href="afficherPrix.php"><i class="fas fa-award"></i>Prix</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="AjouterPrix.php"><i class="fa fa-plus"></i>Ajouter</a></li>
                    <li><a href="afficherPrix.php"><i class="fa-solid fa-clipboard-list"></i>Affichage</a></li>
                    <li><a href="SupprimerPrix.php"><i class="fas fa-trash"></i>Supprimer</a></li>

                </ul>
            </div>
        </li>
        <li><a href="Gagne.php"><i class="fa-solid fa-trophy"></i>Gagne</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="AjouterGagne.php"><i class="fa fa-plus"></i>Ajouter</a></li>
                    <li><a href="Gagne.php"><i class="fa-solid fa-clipboard-list"></i>Affichage</a></li>
                    <li><a href="SupprimerGagne.php"><i class="fas fa-trash"></i>Supprimer</a></li>

                </ul>
            </div>
        </li>
    </ul>


</div>

</body>



</html>
