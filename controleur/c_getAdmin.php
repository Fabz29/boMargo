<?php

/**
 * Contrôleur des thèmes
 * 
 * @author Fabien ZANETTI
 */
/*
 * On vérifie si la requête est défini
 * Par défaut on demande d'afficher les thèmes
 */
if (!isset($_REQUEST['action'])) {
    $action = 'afficherThemes';
} else {
    $action = $_REQUEST['action'];
}

$idThemeModif = -1; // Instancier à -1 afin de n'afficher aucun le formulaire pour modifier un thème


switch ($action) {

    /*
     * cas d'ajout d'un nouveau thème
     * Provoque son enregistrement en base de donnée
     */
    case 'ajouterTheme': {
            // on récupère les données de manière sécurisé
            $libTheme = htmlspecialchars($_POST['nomTheme']);
            $dureeTheme = htmlspecialchars($_POST['dureeTheme']);
            // On vérifie que les valeurs sont valides
            valideInfosTheme($libTheme, $dureeTheme);
            if (nbErreurs() != 0) { // Il y a une erreur 
                include("vues/v_erreurs.php");
            } else { // Pas d'erreurs
                $pdo->addTheme($libTheme, $dureeTheme); // Enregistre le nouveau thème
            }
            break;
        }

    /*
     * Cas de modification d'une thème
     * Provoque l'affichage du formulaire du thème séléctionné
     */
    case 'modifierTheme': {
            $idThemeModif = $_REQUEST['idTheme']; // Renvoit l'id du thème à modifier
            break;
        }

    /*
     * Cas d'enregistrement des modifications sur un thème
     * Provoque la mise à jour en base de donnée
     */
    case 'validerModifierTheme': {
            // on récupère les données de manière sécurisé
            $idTheme = htmlspecialchars($_REQUEST['idTheme']);
            $nomTheme = htmlspecialchars($_REQUEST['nomTheme']);
            $dureeTheme = htmlspecialchars($_REQUEST['dureeTheme']);
            // On vérifie que les valeurs sont valides
            valideInfosTheme($nomTheme, $dureeTheme);
            if (nbErreurs() != 0) { // Il y a une erreur
                include("vues/v_erreurs.php");
            } else { // Pas d'erreurs
                $pdo->modifierTheme($idTheme, $nomTheme, $dureeTheme); // Met à jour le thème
            }
            break;
        }

    /*
     * Cas de suppression d'un thème
     * Provoque sa suppression en base de donnée
     */
    case 'supprimerTheme': {
            $idTheme = $_GET['idTheme'];
            $pdo->supprimerTheme($idTheme);
            break;
        }
}

// Récupère tous les thèmes et affiches la vue
$lesThemes = $pdo->getInfoThemes();
include("vues/v_administration.php");
?>