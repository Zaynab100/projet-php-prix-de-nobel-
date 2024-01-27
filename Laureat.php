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

     <h2>Laureat </h2>
     <form method="post" action="Laureat.php"  >

         <?php

         $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

         $connexion = pg_connect($strConnex);


         echo "<table><th ></th><th ></th>";
         $requete = "select * from Laureat order by laureat_id";
         $ptrQuery = pg_query($connexion, $requete);
         if ($ptrQuery) {

             echo "<table >";
             echo "<tr><th></th><th>ID</th><th>Nom</th><th>Date de naissance</th><th>Sexe</th><th>Nationalité</th></tr>";
             while ($ligne = pg_fetch_assoc($ptrQuery)) {
                 $intg = $ligne['laureat_id'];


                 echo "<tr><td><input type='radio' name='id' value='$intg'></td><td>" . $ligne['laureat_id'] . " </td><td> " . $ligne['laureat_nom'] . " </td><td> " . $ligne['laureat_date_naissance'] . " </td><td>" . $ligne['laureat_sexe'] . " </td><td> " . $ligne['laureat_nationalite'] . "</td></tr>";
             }
         }
         echo "</table>";







         echo "<input type='submit' name='modifier' value='modifier'>";


         echo "<input type='submit' name='Supprimer' value='Supprimer' onclick=\"return confirm('Voulez-vous supprimer ?');\">";

         ?>



     </form>

     <?php

     $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

     $connexion = pg_connect($strConnex);
     if( isset($_POST["Supprimer"])) {
         $id = $_POST["id"];
         SupprimerLaureat($connexion, $id);

         if( isset($_POST["modifier"]))
             header("location:ModifierLaureat");
     }
     ?>
</body>
</html>
