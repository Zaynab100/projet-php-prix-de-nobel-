<?php
function getDebutHTML(string $title='Title content') : string {
return "<!doctype html>
<html lang='fr'>
<head>
    <meta charset='utf-8'>
    <title>$title</title>
    <link rel='stylesheet' href='Projet.css'>
    <link rel='icon' href='https://etapes.com/app/uploads/2011/01/rio-devoile-le-logo-des-jo-2016-1.jpg'>
</head>
<body>";
}

function intoBalise(string $nomElement, string $contenuElement,
                    array $params = null) : string {
    $resu = "<$nomElement "; // amorce la construction de la balise ouvrante
    if (isset($params)) { // traite le 3e parametre s'il existe
        foreach ($params as $attribut => $valeur)
            $resu .= $attribut."='$valeur' "; // construit les attributs de la balise HTML
    }
    if ($contenuElement==='')
        $resu .=' />'; // ferme la balise s'il s'agit d'un élément vide
    else
        $resu .= ">$contenuElement</$nomElement>"; // termine la balise ouvrante, intègre le contenu et ferme la balise
    return $resu; // retourne la chaine de caractères construite
}
function getInputText(array $name){
    $formulaire = "";
    foreach($name as $attribut){
        $formulaire .= "<label> $attribut : <input type='text' name='$attribut' size='15' /></label>";
    }
    return $formulaire;
}
function getRadiosFromArray(array $valeurs, string $nomVar): string {
    $lesRadios = "";
    foreach ($valeurs as $valeur) {
        $lesRadios .= "$valeur <input type='radio' name='$nomVar' ";
        if (isset($_REQUEST[$nomVar]) && $valeur == $_REQUEST[$nomVar]) {
            $lesRadios .= "checked='checked' ";
        }
        $lesRadios .= "value='$valeur'>\n";
    }
    return $lesRadios;
}
function getFinHTML(): string {
    return '</body></html>';
}