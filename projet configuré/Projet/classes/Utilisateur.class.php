<?php
namespace petitesAnnonces;
require_once 'classes/DbPetitesAnnonces.class.php';

class Utilisateur extends Entity{

    private $utilisateur;
    private $id_utilisateur;

    public function __construct(){
        parent::__construct("utilisateur", "id_utilisateur");
    }

    public static function find($id){
        $bdd = DB\DbPetitesAnnonces::getInstance();
        $requete = "SELECT * FROM utilisateurs WHERE id_utilisateur =:id_utilisateur";
        $stmt = $bdd->prepare($requete);
        $stmt->execute(array('id_utilisateur'=>$id));
        $donnees=$stmt->fetch();
        $utilisateur = new Utilisateur();
        $utilisateur->hydrate($donnees);
        return $utilisateur;
        
        
    }

    public static function findAll(){
        $bdd = DB\DbPetitesAnnonces::getInstance();
        $requete = "SELECT * FROM utilisateurs";
        $stmt = $bdd->prepare($requete);
        $stmt -> execute(array());
        $allUtilisateurs = array();
        while($donnees = $stmt->fetch()){
            $utilisateur = new Utilisateur();
            $utilisateur->hydrate($donnees);
            array_push($allUtilisateurs, $utilisateur);
        }
        return $allUtilisateurs;

    }

}

?>