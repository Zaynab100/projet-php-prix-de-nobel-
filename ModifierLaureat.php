<?php

include 'connexion.php';


include_once 'fonctions (1).php';
include('index.php');

$strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

$connexion = pg_connect($strConnex);


/* si l'utilisateur clique sur "modifier" alors on récupère "id = Clubs_id" apres on enregistre id dans une session pour qu'on puisse le récupèrer
 dans les autres pages */
if(isset($_POST["modifier"]))
    $id = $_POST["id"];

    echo '<form method="post" action="ModifierLaureat.php">';
    echo '<table>';
    echo '<h2>modifier un lauréat </h2>';
    echo '<tr><td> Nom de Lauréat:</td></tr>';
    echo '<tr><td><input type="text" required="required" name="laureat_nom" value="' . $_POST["laureat_nom"] . '"></td></tr>';
    echo '<tr><td> Date de naissance:</td></tr>';
    echo '<tr><td><input type="date"  name="laureat_date_naissance" value="' . $_POST["laureat_date_naissance"] . '"></td></tr>';
    echo '<tr><td> Sexe:</td></tr>';
    echo '<tr><td><select name="laureat_sexe">';
    echo '<option value="F"' . ($_POST["laureat_sexe"] == "F" ? ' selected' : '') . '>F</option>';
    echo '<option value="H"' . ($_POST["laureat_sexe"] == "H" ? ' selected' : '') . '>H</option>';
    echo '</select></td></tr>';
    echo '<tr><td> Nationalité:</td></tr>';
    echo '<tr><td><input type="text" required="required" name="laureat_nationalite" value="' . $_POST["laureat_nationalite"] . '" pattern="[a-zA-ZÀ-ÿ]{4,}"></td></tr>';
    echo '</table>';
    echo '<input type="submit" name="Envoyer" value="Envoyer">';
    echo '<input type="submit" name="ANNULER" value="Annuler">';
    echo '</form>';

printf("en");


        ModifierLaureat($connexion, $id, $_POST["laureat_nom"], $_POST["laureat_date_naissance"], $_POST["laureat_sexe"], $_POST["laureat_nationalite"]);


   if( isset($_POST["ANNULER"])) header("location:laureat.php");


?>