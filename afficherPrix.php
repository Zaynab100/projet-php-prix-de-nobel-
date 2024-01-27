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

<h2>Prix </h2>
<form method="post" action="modifierprix.php"  >

    <?php

    $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

    $connexion = pg_connect($strConnex);


    echo "<table><th ></th><th ></th>";
    $requete = "select * from Prix order by prix_id";
    $ptrQuery = pg_query($connexion, $requete);
    if ($ptrQuery) {

        echo "<table >";
        echo "<tr><th>ID</th><th>ID</th><th>discipline</th><th>Montant</th><th>comité</th></tr>";
        while ($ligne = pg_fetch_assoc($ptrQuery)) {
            $intg = $ligne['prix_id'];


            echo "<tr><td><input type='radio' name='id' value='$intg'></td><td>".$ligne['prix_id']."</td><td>" . $ligne['prix_discipline'] . "</td><td>" . $ligne['prix_montant'] . "</td><td>" . $ligne['prix_comite'] . "</td></tr>";
        }
    }
    echo "</table>";





    echo "<input type='submit' name='modifier' value='MODIFIER'>";


    echo "<input type='submit' name='Supprimer' value='Supprimer' onclick=\"return confirm('Voulez-vous supprimer ?');\">";

    ?>



</form>

<?php
if(isset($_POST["Supprimer"])&&!empty($_POST["id"]))
{   $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

    $connexion = pg_connect($strConnex);
    $id=$_POST["id"];
    SupprimerPrix($connexion,$id);

}
?>
</body>
</html>

