<?php
namespace petitesAnnonces;
require_once 'libs/session.lib.php' ;
require_once 'classes/NotConnectedException.class.php' ;

if ( !user_is_connected() ) throw new NotConnectedException() ;


$DOCUMENT = HtmlDocument::getCurrentInstance() ;

$DOCUMENT->addUniqueHeader('title', "<title>Mon compte</title>") ;

?>
Bienvenue sur votre espace personnel