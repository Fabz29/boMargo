<?php

/**
 * Classe d'accès aux données
 * Utilise PDO
 * 
 * @author Fabien ZANETTI
 */
class PdoMargo {

    private static $monPdo;
    private static $monPdoMargo = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        PdoMargo::$monPdo = new PDO('sqlsrv:server=MACPC;DataBase=Margo', 'Margo', 'Margo123');
        PdoMargo::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct() {
        PdoMargo::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instanceMargo = PdoMargo::getPdoMargo();
     * @return l'unique objet de la classe PdoMargo
     */
    public static function getPdoMargo() {
        if (PdoMargo::$monPdoMargo == null) {
            PdoMargo::$monPdoMargo = new PdoMargo();
        }
        return PdoMargo::$monPdoMargo;
    }

    /**
     * Retourne les informations de tous les thèmes
     * @return l'id, le nom et la durée sous la forme d'un tableau associatif 
     */
    public function getInfoThemes() {
        $req = "SELECT idTheme, nomTheme, dureeTheme FROM Themes";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute();
        $lignes = $stmp->fetchAll();
        return $lignes;
    }

    /**
     * Ajoute un nouveau thème

     * @param $nomTheme
     * @param $dureeTheme
     */
    public function addTheme($nomTheme, $dureeTheme) {
        $req = "INSERT INTO Themes (nomTheme, dureeTheme) VALUES (:nomTheme, :dureeTheme)";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':nomTheme' => $nomTheme, ':dureeTheme' => $dureeTheme));
    }

    /**
     * Modifie les valeurs d'une thème

     * @param $idTheme
     * @param $nomTheme
     * @param $dureeTheme
     */
    public function modifierTheme($idTheme, $nomTheme, $dureeTheme) {
        $req = "UPDATE Themes SET nomTheme = :nomTheme, dureeTheme = :dureeTheme WHERE idTheme = :idTheme";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':nomTheme' => $nomTheme, ':dureeTheme' => $dureeTheme, ':idTheme' => $idTheme));
    }

    /**
     * Modifie un thème
     * @param $idTheme
     */
    public function supprimerTheme($idTheme) {
        $req = "DELETE FROM Themes WHERE idTheme = :idTheme";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':idTheme' => $idTheme));
    }

    /**
     * Récupère tous les mots d'un thème

     * @param $idThemeMot
     * @return l'id, le contenu, le nombre de points et la durée sous la forme d'un tableau associatif 
     */
    public function getLesMots($idThemeMot) {
        $req = "SELECT idMot, contenuMot, nbPointsMot, dureeMot FROM Mots WHERE idThemeMot = :idThemeMot";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':idThemeMot' => $idThemeMot));
        $lignes = $stmp->fetchAll();
        return $lignes;
    }

    /**
     * Ajoute un nouveau mot dans un thème

     * @param $libMot
     * @param $dureeMot
     * @param $idTheme
     * @param $nbPointsMot
     */
    public function addNouveauMot($libMot, $dureeMot, $idTheme, $nbPointsMot) {
        $req = "INSERT INTO Mots VALUES (:libMot, :nbPointsMot, :idTheme, :dureeMot)";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':libMot' => $libMot, ':nbPointsMot' => $nbPointsMot, ':idTheme' => $idTheme, ':dureeMot' => $dureeMot));
    }

    /**
     * Modifie un mot d'un thème

     * @param $libMot
     * @param $dureeMot
     * @param $idTheme
     * @param $nbPointsMot
     */
    public function modifierMot($idMot, $libMot, $dureeMot, $idTheme, $nbPointsMot) {
        $req = "UPDATE Mots SET contenuMot = :libMot, nbPointsMot = :nbPointsMot, idThemeMot = :idTheme, dureeMot = :dureeMot WHERE idMot = :idMot";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':libMot' => $libMot, ':nbPointsMot' => $nbPointsMot, ':idTheme' => $idTheme, ':dureeMot' => $dureeMot, ':idMot' => $idMot));
    }

    /**
     * Supprime un nouveau mot dans un thème

     * @param $libMot
     * @param $dureeMot
     * @param $idTheme
     * @param $nbPointsMot
     */
    public function supprimerMot($idMot) {
        $req = "DELETE FROM Mots WHERE idMot = :idMot";
        $stmp = PdoMargo::$monPdo->prepare($req);
        $stmp->execute(array(':idMot' => $idMot));
    }

}

?>