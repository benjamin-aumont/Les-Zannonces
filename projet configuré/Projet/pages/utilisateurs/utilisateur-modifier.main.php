<?php
    namespace petitesAnnonces;
    require 'libs/http.lib.php';
    require_once 'classes/DbPetitesAnnonces.class.php';
    $bdd = DB\DbPetitesAnnonces::getInstance();
    HtmlDocument::getCurrentInstance()->addHeader("<title>Modifier Annonces</title>");
    
    if(isset($_GET['id_utilisateur'])){
        $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
        $id = $_GET['id_utilisateur'];
        $stmt->execute(array($id));
        
    }
    $donnees = $stmt->fetch();
    
    echo"<form method=\"post\" action=\"?page=utilisateurs/utilisateur-modifier-action\">";
    echo"<input type=\"hidden\" name=\"id_utilisateur\" value=".$donnees['id_utilisateur']."></br>";
    echo"<input type=\"text\" name=\"nom\" value=".$donnees['nom']."></br>";
    echo"<input type=\"text\" name=\"prenom\" value=".$donnees['prenom']." min=0></br>";
    echo"<textarea maxlength=150 name=\"adresse\" rows=8>".$donnees['adresse']."</textarea></br>";
    echo"<input type=\"text\" name=\"telephone\" value=".$donnees['telephone']."></br>";
    echo"<input type=\"submit\" value=\"Modifier\">";
    echo"</form>";

    $stmt->closeCursor();

?>