<?php
include_once'connexion.php';
include_once 'fonctions (1).php';
include('index.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laureat </title>
    </head>
    <body>

    <h2 >Gagne </h2>
    <form method="post" action="Gagne.php"  >

<?php

$strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

$connexion = pg_connect($strConnex);


echo "<table><th ></th><th ></th>";
$requete = "select * from gagne order by gagne_id";
$ptrQuery = pg_query($connexion, $requete);
if ($ptrQuery) {

    echo "<table >";
    echo "<tr><th> </th><th>ID </th><th> Laureat ID </th><th>Prix ID</th><th>Nom Laureat</th><th>discipline</th><th>Prix Année </th></tr>";
    while ($ligne = pg_fetch_assoc($ptrQuery)) {
        $intg = $ligne['gagne_id'];
        echo "<tr><td><input type='radio' name='id' value='$intg'></td><td>" . $ligne['gagne_id'] .  "</td><td>"  . $ligne['laureat_id'] . "</td><td>". $ligne['prix_id'] .  "</td><td>".$ligne['laureat_nom'] .  "</td><td>".$ligne['prix_comite']. "</td><td> ".$ligne['prix_annee']."</td></tr>";
    }
}
echo "</table>";





echo "<input type='submit' name='modifier' value='MODIFIER'>";


echo "<input type='submit' name='Supprimer' value='Supprimer' onclick=\"return confirm('Voulez-vous supprimer ?');\">";

?>
modifierLaureat
    </form>
    <?php
    if(isset($_POST["Supprimer"])&&!empty($_POST["id"]))
    {   $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

        $connexion = pg_connect($strConnex);
        $id=$_POST["id"];
        SupprimerGagne($connexion,$id);
        if (isset($_POST["AJOUTER"]) && (filter_var($_POST["date"], FILTER_VALIDATE_INT) && $_POST["date"]  < 2023) ) {
            AjouterGagne($connexion,$_POST["Laureat"],$_POST["Prix"],$_POST["date"]);
        }
    }
    ?>
    </body>
</html>