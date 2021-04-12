<?php
namespace petitesAnnonces;
define("ROOT", __DIR__);

require 'classes/HtmlDocument.class.php';
require 'libs/mobile.lib.php'; 

$page = isset($_GET['page']) ? $_GET['page'] : 'index' ;


$doc = new HtmlDocument($page);

$doc->applyTemplate( is_mobile() ? 'mobile' : 'defaut' );

$doc->render();

?>