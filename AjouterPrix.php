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
    <title>Ajouter un prix</title>
</head>
<body>
   
<h2>Ajouter un prix</h2>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method ="POST">
  <label >Discipline :</label>
  <input type="text" name="prix_discipline"><br><br>
  <label >Montant :</label>
  <input type="number" step="0.01" name="prix_montant" ><br><br>
  <label >Comité :</label>
  <select  name="prix_comite">
     
      <option value="Academie royale des sciences de Suede">Académie royale des sciences de Suède</option>
      <option value="Academie suedoise">Académie suédoise</option>
      <option value="Comite Nobel norvegien">Comité Nobel norvégien</option>
      <option value="Institut Karolinska">Institut Karolinska</option>
  </select>
  <br><br>
        <input type="submit" value="Ajouter_le_prix" name="Ajouter_le_prix">
    </form>
<?php
$strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

$connexion = pg_connect($strConnex);
    if ( isset($_POST["Ajouter_le_prix"])){
        InsererPrix($connexion,$_POST["prix_discipline"],$_POST["prix_montant"],$_POST["prix_comite"]);
     }
   ?>
</body>
</html>
