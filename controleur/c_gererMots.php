<?php

/**
 * Contrôleur des mots
 * 
 * @author Fabien ZANETTI
 */
/*
 * On vérifie si la requête est défini
 * Par défaut on demande d'afficher les mots
 */
if (!isset($_REQUEST['action'])) {
    $action = 'afficherMots';
} else {
    $action = $_REQUEST['action'];
}

$idTheme = $_REQUEST['idTheme']; // On récupère l'id du thème séléctionné 
$idMotModif = -1;  // Instancier à -1 afin de n'afficher aucun le formulaire pour modifier un mot

switch ($action) {

    /*
     * cas d'ajout d'un nouveau mot
     * Provoque son enregistrement en base de donnée
     */
    case 'validerNouveauMot': {
            // on récupère les données de manière sécurisé
            $libMot = htmlspecialchars($_REQUEST['libMot']);
            $dureeMot = htmlspecialchars($_REQUEST['dureeMot']);
            // On vérifie que les valeurs sont valides
            $nbPointsMot = htmlspecialchars($_REQUEST['nbPointsMot']);
            valideInfosMot($libMot, $dureeMot, $nbPointsMot);
            if (nbErreurs() != 0) { // Il y a une erreur 
                include("vues/v_erreurs.php");
            } else { // Pas d'erreurs
                $pdo->addNouveauMot($libMot, $dureeMot, $idTheme, $nbPointsMot); // Enregistre le nouveau mots
            }
            break;
        }

    /*
     * Cas de modification d'un mot
     * Provoque l'affichage du formulaire du mot séléctionné
     */
    case 'modifierMot': {
            $idMotModif = $_REQUEST['idMot']; // Renvoit l'id du thème à modifier
            break;
        }

    /*
     * Cas d'enregistrement des modifications sur un mot
     * Provoque la mise à jour en base de donnée
     */
    case 'validerModifierMot': {
            // on récupère les données de manière sécurisé
            $idMot = htmlspecialchars($_REQUEST['idMot']);
            $idTheme = htmlspecialchars($_REQUEST['idTheme']);
            $libMot = htmlspecialchars($_REQUEST['libMot']);
            $dureeMot = htmlspecialchars($_REQUEST['dureeMot']);
            $nbPointsMot = htmlspecialchars($_REQUEST['nbPointsMot']);
            // On vérifie que les valeurs sont valides
            valideInfosMot($libMot, $dureeMot, $nbPointsMot);
            if (nbErreurs() != 0) { // Il y a une erreur
                include("vues/v_erreurs.php");
            } else { // Pas d'erreurs
                $pdo->modifierMot($idMot, $libMot, $dureeMot, $idTheme, $nbPointsMot);
            }
            break;
        }

    /*
     * Cas de suppression d'un mot
     * Provoque sa suppression en base de donnée
     */
    case 'supprimerMot': {
            $idMot = $_REQUEST['idMot'];
            $pdo->supprimerMot($idMot);
            break;
        }
}

// Récupère tous les thèmes et affiches la vue
$lesMots = $pdo->getLesMots($idTheme);
include("vues/v_listeMots.php");
?>
