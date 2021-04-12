<?php
namespace petitesAnnonces;
require_once 'classes/DbPetitesAnnonces.class.php';
$bdd = DB\DbPetitesAnnonces::getInstance();
HtmlDocument::getCurrentInstance()->addHeader("<title>Annonces</title>");


if(isset($_GET['categorie'])){
   $requete = "SELECT * FROM annonces WHERE id_categorie = :id_categorie";
   $stmt = $bdd->prepare($requete);
   $stmt->execute(array('id_categorie' => $_GET['categorie']));

}

else{
    $requete = "SELECT * FROM annonces";
    $stmt = $bdd->query($requete);
}

$stmt->setFetchMode(\PDO::FETCH_ASSOC);
echo'<table>';
while ($donnees = $stmt->fetch()) {
    $id = htmlspecialchars($donnees['id_annonce']);
    echo'<tr>';
    echo'<th>';
        echo "<td>" .htmlspecialchars($donnees['date'])."</td>";
        echo "<td>" .htmlspecialchars($donnees['titre'])."</td>";
        echo "<td>" .htmlspecialchars($donnees['prix'])."</td>";
        echo "<td>" .htmlspecialchars(substr($donnees['contenu'],0,150))."</td>";
        echo "<td>";
        echo"<a href=\"index.php?page=annonce-modifier&id_annonce=$id\">Modifer</a>";
        echo "</td>";
        echo'</th>';
    echo'</tr>';
}
echo'</table>';
$stmt->closeCursor();

?>