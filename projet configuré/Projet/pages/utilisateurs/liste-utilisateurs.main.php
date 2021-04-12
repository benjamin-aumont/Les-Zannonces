<?php
namespace petitesAnnonces;
require_once 'classes/DbPetitesAnnonces.class.php';
$bdd = DB\DbPetitesAnnonces::getInstance();
HtmlDocument::getCurrentInstance()->addHeader("<title>Liste utilisateur</title>");

if(isset($_GET['id_utilisateur'])){
    $requete = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
    $stmt = $bdd->prepare($requete);
    $stmt->execute(array('id_utilisateur' => $_GET['id_utilisateur']));
 
 }
 
 else{
     $requete = "SELECT * FROM utilisateurs";
     $stmt = $bdd->query($requete);
 }
 
 $stmt->setFetchMode(\PDO::FETCH_ASSOC);
 echo'<table>';
 while ($donnees = $stmt->fetch()) {
     $id = htmlspecialchars($donnees['id_utilisateur']);
     echo'<tr>';
     echo'<th>';
         echo "<td>" .htmlspecialchars($donnees['nom'])."</td>";
         echo "<td>" .htmlspecialchars($donnees['prenom'])."</td>";
         echo "<td>" .htmlspecialchars($donnees['adresse'])."</td>";
         echo "<td>" .htmlspecialchars(($donnees['telephone']))."</td>";
         echo "<td>";
         echo"<a href=\"index.php?page=utilisateurs/utilisateur-modifier&id_utilisateur=$id\">Modifer</a>";
         echo "</td>";
         echo'</th>';
     echo'</tr>';
 }
 echo'</table>';
 $stmt->closeCursor();

 


?>