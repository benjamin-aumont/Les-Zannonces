<?php
    namespace petitesAnnonces;
    require 'libs/http.lib.php';
    require_once 'classes/DbPetitesAnnonces.class.php';
    $bdd = DB\DbPetitesAnnonces::getInstance();
    HtmlDocument::getCurrentInstance()->addHeader("<title>Modifier Annonces</title>");
    
    if(isset($_GET['id_annonce'])){
        $stmt = $bdd->prepare("SELECT * FROM annonces WHERE id_annonce = ?");
        $id = $_GET['id_annonce'];
        $stmt->execute(array($id));
    }

    $donnees = $stmt->fetch();

    echo"<form method=\"post\" action=\"?page=annonce-modifier-action\">";
    echo"<input type=\"hidden\" name=\"id_annonce\" value=".$donnees['id_annonce']."></br>";
    echo"<input type=\"text\" name=\"titre\" value=".$donnees['titre']."></br>";
    echo"<textarea maxlength=150 name=\"contenu\" rows=8>".$donnees['contenu']."</textarea></br>";
    echo"<input type=\"number\" name=\"prix\" value=".$donnees['prix']." min=0></br>";
    echo"<input type=\"hidden\" name=\"id_categorie\" value=".$donnees['id_categorie']."></br>";
    echo"<input type=\"hidden\" name=\"id_utilisateur\" value=".$donnees['id_utilisateur']."></br>";
    echo"<input type=\"submit\" value=\"Modifier\">";
    echo"</form>";

    $stmt->closeCursor();
   
?>