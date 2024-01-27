<?php

include 'connexion.php';


include_once 'fonctions (1).php';
include('index.php');

$strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

$connexion = pg_connect($strConnex);


/* si l'utilisateur clique sur "modifier" alors on récupère "id = Clubs_id" apres on enregistre id dans une session pour qu'on puisse le récupèrer
 dans les autres pages */

if( isset($_POST["Supprimer"])) {
    $id = $_POST["id"];
    supprimerPrix($connexion, $id);

}


if(isset($_POST["id"]) && isset($_POST["modifier"])) {
    $id = $_POST["id"];
    echo '
    <form action="modifierprix.php" method="POST">';
    echo ' <label>Discipline :</label>';
    echo '<input type="text" name="prix_discipline" value=" '.$_POST["prix_discipline"].'"><br><br>';
     echo ' <label>Montant :</label>';
     echo ' <input type="number" step="0.01" name="prix_montant" value=" '.$_POST["prix_montant"].'"><br><br>';
    echo ' <label>Comité :</label> echo ';
    echo ' <select name="prix_comite" value=" '.$_POST["prix_comite"].'">
        <option value="Academie royale des sciences de Suede">Académie royale des sciences de Suède</option>
        <option value="Academie suedoise">Académie suédoise</option>
        <option value="Comite Nobel norvegien">Comité Nobel norvégien</option>
        <option value="Institut Karolinska">Institut Karolinska</option>
      </select><br><br>
      <input type="submit" value="envoyer" name="envoyer">
    </form>';
    printf("en");


    ModifierPrix($connexion, $id,$_POST["prix_discipline"] , $_POST["prix_montant"], $_POST["laureat_sexe"], $_POST["prix_comite"]);

}