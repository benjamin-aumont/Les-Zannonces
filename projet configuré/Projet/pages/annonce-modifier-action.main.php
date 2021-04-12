<?php
    namespace petitesAnnonces;
    require 'libs/http.lib.php';
    require_once 'classes/DbPetitesAnnonces.class.php';
    $bdd = DB\DbPetitesAnnonces::getInstance();
    
    $requete = "UPDATE annonces SET id_annonce=:id_annonce, contenu=:contenu, prix=:prix, titre=:titre , id_categorie=:id_categorie, id_utilisateur=:id_utilisateur WHERE id_annonce=:id_annonce";
    $stmt = $bdd->prepare($requete);
    $stmt->execute(array(
        'id_annonce' => $_POST['id_annonce'],
        'contenu' => $_POST['contenu'],
        'prix' => $_POST['prix'],
        'titre' => $_POST['titre'],
        'id_categorie' => $_POST['id_categorie'],
        'id_utilisateur' => $_POST['id_utilisateur']
    ));
    $stmt->closeCursor();
    http_redirect("index.php?page=liste-annonces");
    ?>