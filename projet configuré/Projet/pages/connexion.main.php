<?php
namespace petitesAnnonces;
$DOCUMENT = HtmlDocument::getCurrentInstance() ;

$DOCUMENT->addUniqueHeader('title', "<title>Connectez-vous !</title>") ;

?>
<h1>Connectez-vous !</h1>

<label for='user'>Nom d'utilisateur</label>
<input type='text' id='user' name='user' />
<label for='password'>Mot de passe</label>
<input type='password' id='password' name='password' />
