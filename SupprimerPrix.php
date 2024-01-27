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
    <title>Document</title>
</head>
<body>

<form method="post"  action="SupprimerPrix.php">
    <table>
        <tr><td> <h2> Supprimer Laureat  </h2></td></tr>
        <tr><td> Prix* :</td><td>
                <select id="Prix" name="Prix">
                    <?php
                    $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

                    $connexion = pg_connect($strConnex);
                    $sql="SELECT * FROM Prix  ";
                    $result =pg_query($connexion,$sql);
                    if ($result) {
                        while($row = pg_fetch_assoc($result) ) {
                            echo "<option value=".$row["prix_id"].">".$row["prix_discipline"]."</option>";
                        }
                    }
                    ?>
                </select>
            </td></tr> <br>
    </table>

    <input name="Supprimer" type="submit" onclick="if(!confirm('Voulez-vous supprimer?')) return false;" value="Supprimer" />
    <?php

    $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

    $connexion = pg_connect($strConnex);

    if(isset($_POST['Supprimer'])&&!empty($_POST['Prix'])){
        SupprimerPrix($connexion,$_POST['Prix']);

    }

    ?>
</body>

</html>
