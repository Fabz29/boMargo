<?php

/**
 * Fonctions répondants aux besoins de l'application
 * pour l'application boMargo
 * 
 * @author      Fabien ZANETTI
 * @version     1.0
 */

/**
 * Cette fonction vérifie les informations 
 * entrées par l'utilisateur dans le formulaire 
 * pour créer et modifier le thème
 * @return string : le message d'erreur
 */
function valideInfosTheme($libTheme, $dureeTheme) {
    if ($libTheme == "") {
        ajouterErreur("Veuillez rentrer un nom pour le thème !");
    } else if (!is_string($libTheme)) {
        ajouterErreur("Attention les caractères ne sont pas valide");
    }
    if ($dureeTheme == "") {
        ajouterErreur("Veuillez indiquer la durée du thème !");
    } else if (!is_numeric($dureeTheme)) {
        ajouterErreur("La durée du  thème n'est pas valide");
    }
}


/**
 * Cette fonction vérifie les informations 
 * entrées par l'utilisateur dans le formulaire 
 * pour créer et modifier les mots
 * @return string : le message d'erreur
 */
function valideInfosMot($libMot, $dureeMot, $nbPointsMot) {
    if ($libMot == "") {
        ajouterErreur("Veuillez rentrer un nom pour le mot !");
    } else if (!is_string($libMot)) {
        ajouterErreur("Attention les caractères ne sont pas valide");
    }
    if ($dureeMot == "") {
        ajouterErreur("Veuillez indiquer la durée du mot !");
    } else if (!is_numeric($dureeMot)) {
        ajouterErreur("La durée du mot n'est pas valide");
    }
    if ($nbPointsMot == "") {
        ajouterErreur("Veuillez indiquer le nombre de point pour le mot !");
    } else if (!is_numeric($dureeMot)) {
        ajouterErreur("Le nombre de point n'est pas valide");
    }
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 

 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg) {
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}

/**
 * Retoune le nombre de lignes du tableau des erreurs 

 * @return le nombre d'erreurs
 */
function nbErreurs() {
    if (!isset($_REQUEST['erreurs'])) {
        return 0;
    } else {
        return count($_REQUEST['erreurs']);
    }
}

?>
