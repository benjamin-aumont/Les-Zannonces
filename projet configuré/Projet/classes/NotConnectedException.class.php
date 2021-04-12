<?php
namespace petitesAnnonces;
class NotConnectedException extends Exception {
	public function __construct() {
		parent::__construct("Authentification requise") ;
	}
}

?>