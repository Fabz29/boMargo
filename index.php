<?php

require_once("include/pdo.php");
require_once("include/functions.php");
$_SESSION['idUtilisateur'] = 'Fabien';
include("vues/v_entete.php");
$pdo = PdoMargo::getPdoMargo();
if (!isset($_REQUEST['uc'])) {
    $_REQUEST['uc'] = 'administration';
}

$uc = $_REQUEST['uc'];
switch ($uc) {
    case 'administration': {
            include("controleur/c_getAdmin.php");
            break;
        }
    case 'gererMots' : {
            include("controleur/c_gererMots.php");
            break;
        }
}
include("vues/v_pied.php");
?>

