<?php
require_once 'classes/Entity.class.php' ;
require_once 'classes/Utilisateur.class.php';
require_once 'classes/Annonces.class.php';
require_once 'classes/DbPetitesAnnonces.class.php';

$utilisateur = petitesAnnonces\Utilisateur::find(3);
echo '<h1>'.$utilisateur->getNom().'</h1>';
echo '<h1>'.$utilisateur->getPrenom().'</h1>';
//$utilisateur = petitesAnnonces\Utilisateur::findALL();
//var_dump($utilisateur);

//$annonce = petitesAnnonces\Annonces::find(1);
$annonce = petitesAnnonces\Annonces::findALL();
echo '<h1>'.$annonce[1]->getTitre().'</h1>';
echo '<h1>'.$annonce[3]->getContenu().'</h1>';
//var_dump($annonce);




$UTILISATEUR = new \petitesAnnonces\Utilisateur();
$UTILISATEUR->hydrate([
'id_utilisateur' => 2,
'nom' => "MANGUIN",
'prenom' => "Paul",
]) ;
$UTILISATEUR->setNom('Proust') ;
$UTILISATEUR->setPrenom('Marcel') ;
$UTILISATEUR->save();

var_dump($UTILISATEUR);
?>