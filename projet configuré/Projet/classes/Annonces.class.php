<?php
namespace petitesAnnonces;
require_once 'classes/DbPetitesAnnonces.class.php';

class Annonces extends Entity{
    private $annonce;
    private $id_annonce;

    public function __construct(){
        parent::__construct("annonce", "id_annonce");

    }

    public static function find($id){
        $bdd = DB\DbPetitesAnnonces::getInstance();
        $requete = "SELECT * FROM annonces WHERE id_annonce =:id_annonce";
        $stmt = $bdd->prepare($requete);
        $stmt->execute(array('id_annonce'=>$id));
        $donnees=$stmt->fetch();
        $utilisateur = new Utilisateur();
        $utilisateur->hydrate($donnees);
        return $utilisateur;

    }

    public static function findAll(){
        $bdd = DB\DbPetitesAnnonces::getInstance();
        $requete = "SELECT * FROM annonces";
        $stmt = $bdd->prepare($requete);
        $stmt -> execute(array());
        $allAnnonce = array();
        while($donnees = $stmt->fetch()){
            $annonce = new Annonces();
            $annonce->hydrate($donnees);
            array_push($allAnnonce, $annonce);
        }
        return $allAnnonce;

    }

}
?>