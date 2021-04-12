<?php
    namespace petitesAnnonces;
    require 'libs/http.lib.php';
    require_once 'classes/DbPetitesAnnonces.class.php';
    $bdd = DB\DbPetitesAnnonces::getInstance();
    
    $requete = "UPDATE utilisateurs SET id_utilisateur=:id_utilisateur, nom=:nom, prenom=:prenom, adresse=:adresse , telephone=:telephone WHERE id_utilisateur=:id_utilisateur";
    $stmt = $bdd->prepare($requete);
    $stmt->execute(array(
        'id_utilisateur' => $_POST['id_utilisateur'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone']
    ));
    $stmt->closeCursor();
    http_redirect("index.php?page=utilisateurs/liste-utilisateurs");
    ?>