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


    <title>Ajouter Laureat</title>
</head>
<body>
   
<h2>ajouter un laureat </h2>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method ="POST">
    <label>Nom :</label>
    <input type="text" name="laureat_nom" ><br>  <br>
    <label>Date de naissance :</label>
    <input type="date" name="laureat_date_naissance" ><br><br>
    <label>Sexe :</label>
    <select name="laureat_sexe" >
        <option value="F">F</option>
        <option value="H">H</option>
    </select><br><br>
    <label>Nationalité :</label>
    <input type="text" name="laureat_nationalite" ><br><br>
    <input type="submit" value="Ajouter"  name="Ajouter">
</form>

</body>
</html>
<?php
$strConnex = 'host='.'localhost'.' dbname='.'c2i'.' user='.'c2i'.' password='.'c2i';

$connexion = pg_connect($strConnex);
if ( isset($_POST["Ajouter"])){
    InsererLaureat($connexion,$_POST["laureat_nom"],$_POST["laureat_date_naissance"],$_POST["laureat_sexe"],$_POST["laureat_nationalite"]);
 }
?>