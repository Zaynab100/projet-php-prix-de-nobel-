<?php
include_once'connexion.php';
include_once 'fonctions (1).php';
include('index.php');
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Projet PHP</title>


    </head>
<body>

    <form method="post"  action="AjouterGagne.php">

       <H1> Ajouter le prix qui est gagner  </H1>
        <br>
     <label > Laureat* :</label>
                <select id="Laureat" name="Laureat">
                    <?php
                    $strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

                    $connexion = pg_connect($strConnex);
                    $sql="SELECT * FROM Laureat  ";
                    $result =pg_query($connexion,$sql);
                    if ($result) {
                        while($row = pg_fetch_assoc($result) ) {
                            echo "<option value=".$row["laureat_id"].">".$row["laureat_nom"]."</option>";
                        }
                    }
                    ?>
                </select>
    <br><br>
        <label>Prix*:</label>
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
           <br>  <br>
      <label>date*:</label> <input type=number required="required"  name=date><br>
    <br><br>



    <input type="submit" value="AJOUTER" name="AJOUTER">
    </form>
<?php
/* vérification des champs obligatoires */
if (isset($_POST["AJOUTER"]) && (filter_var($_POST["date"], FILTER_VALIDATE_INT) && $_POST["date"]  < 2023) ) {
    AjouterGagne($connexion,$_POST["Laureat"],$_POST["Prix"],$_POST["date"]);
}
?>

</body>
</html>
