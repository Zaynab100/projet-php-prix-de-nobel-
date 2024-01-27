<?php
include_once('connexion.php');
 function InsererLaureat($connexion,$nom,$date,$sexe,$nationalite){
    $count=1;
    $sql = "SELECT * FROM Laureat";
    $result = pg_query($connexion,$sql);
    if ($result) {
        while($ligne = pg_fetch_assoc($result) ) {
            if(strcasecmp($ligne['laureat_nom'], $nom ) == 0 && strcasecmp($ligne['laureat_date_naissance'],$date)==0 && strcasecmp($ligne['laureat_sexe'], $sexe ) == 0 && strcasecmp($ligne['laureat_nationalite'], $nationalite ) == 0 ) {
                $count=-1;
                break;
                /* vérification que les information insérer n'exsite pas déjà dans notre base de données */
            }
        }
        if($count!=-1){
            /* on ajoute les informations insérer dans la table Clubs de notre base de données */
            $sql1 = "INSERT INTO Laureat (laureat_nom,laureat_date_naissance, laureat_sexe,laureat_nationalite) VALUES('$nom','$date','$sexe','$nationalite')";
            $exec=pg_query($connexion,$sql1);
           /* header("location:page1.php");*/
        }
        else{
            echo "Ce Laureat  existe déjà";
        }
    }
}
function InsererPrix($connexion,$discipline,$montant,$comite){
    $verification=1;
    $sql = "SELECT * FROM Prix";
    $result = pg_query($connexion,$sql);
    if ($result) {
        while($ligne = pg_fetch_assoc($result) ) {
            if(strcasecmp($ligne['prix_discipline'], $discipline ) == 0 && strcasecmp($ligne['prix_montant'],$montant)==0 && strcasecmp($ligne['prix_comite'], $comite ) == 0 ) {
                $verification=-1;
                break;
                /* vérification que les information insérer n'exsite pas déjà dans notre base de données */
            }
        }
        if($verification!=-1){
            /* on ajoute les informations insérer dans la table Clubs de notre base de données */
            $sql1 = "INSERT INTO Prix (prix_discipline,prix_montant, prix_comite) VALUES('$discipline','$montant','$comite')";
            $exec=pg_query($connexion,$sql1);
            /*header("location:page3.php");*/
        }
        else{
            echo "Ce Prix   existe déjà";
        }
    }
}
function AjouterGagne($connexion,$a,$s,$n){
    $sql="SELECT  laureat_id FROM gagne WHERE laureat_id='$a' AND prix_id='$s'";
    $result =pg_query($connexion,$sql);
    if(pg_num_rows($result)==0){
        $sql1 ="INSERT INTO gagne (laureat_id, prix_id, prix_annee) VALUES ('$a','$s','$n')";
        $exec=pg_query($connexion,$sql1);
       // header("location:page3.php");
    }
    else{
        echo "Cette Personne est déja gane ce prix  ";
    }
}
function SupprimerLaureat($connexion,$id){

    $sql1="DELETE FROM  Laureat WHERE laureat_id='$id'";
        $exec=pg_query($connexion,$sql1);
      // header("location:Laureat.php");

}
function ModifierLaureat($connexion,$id,$nom,$date,$sexe,$nationalite){
    $count=1;
    echo "she is ".$id;
    $sql="SELECT  * FROM Laureat WHERE laureat_id='$id' ";
    $result = pg_query($connexion, $sql);
    if ($result) {
        while ($ligne = pg_fetch_array($result)) {
            if (strcasecmp($ligne['laureat_nom'], $nom) == 0 && strcasecmp($ligne['laureat_date_naissance'],$date)==0 && strcasecmp($ligne['laureat_sexe'], $sexe ) == 0 && strcasecmp($ligne['laureat_nationalite'], $nationalite ) == 0 ) {
                $count=-1;
                break;
            }
        }
        if ($count!=-1) {
            $sql1 = "UPDATE Laureat SET laureat_nom ='$nom',laureat_sexe='$sexe',laureat_nationalite='$nationalite' WHERE laureat_id='$id'";
            $exec = pg_query($connexion,$sql1);
            //header("location:Laureat.php");
        } else {
            echo "<script>alert(\"Ce Laureat existe deja\")</script>";
        }
    }
}

function ModifierPrix($connexion,$id,$discipline,$montant,$comite){
    $count=1;
    echo "she is ".$id;
    $sql="SELECT  * FROM Prix WHERE prix_id='$id' ";
    $result = pg_query($connexion, $sql);
    if ($result) {
        while ($ligne = pg_fetch_array($result)) {
            if (strcasecmp($ligne['prix_discipline'], $discipline) == 0 && strcasecmp($ligne['prix_montant'], $montant) == 0 && strcasecmp($ligne['prix_comite'], $comite)) {
                $count = -1;
                break;
            }
        }
        if ($count != -1) {
            $sql1 = "UPDATE Prix SET prix_discipline ='$discipline' WHERE prix_id='$id'";
            $exec = pg_query($connexion, $sql1);
            //header("location:Laureat.php");
        } else {
            echo "<script>alert(\"Ce prix existe deja\")</script>";
        }
        pg_close($connexion);
    }
}
function connexion(){
    $strConnex = 'host='.$_ENV['dbHost'].' dbname='.$_ENV['dbName'].' user='.$_ENV['dbUser'].' password='.$_ENV['dbPassword'];
    $ptrDB = pg_connect($strConnex);
    return $ptrDB;
}
function SupprimerPrix($connexion,$id){

    $sql1 = "DELETE FROM Prix  WHERE prix_id= '$id'";
    $exec=pg_query($connexion,$sql1);
    // header("location:Laureat.php");

}
function SupprimerGagne($cnx,$id){
    $sql1="DELETE FROM  gagne WHERE gagne_id='$id'";
    $exec=pg_query($cnx,$sql1);
  //  header("location:page2.php");
}


?>



