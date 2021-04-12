<?php


/**
 * Redéfinition pour compatibilité (au cas où PHP<5.4)
 */
if ( !function_exists('http_response_code') ) {
	function http_response_code($code) {
		return header('X-PHP-Response-Code: '.$code, true, $code) ;
	}
}

function http_header_nocache() {
	// Don't use cache
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date passée
	header('Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0') ; // HTTP/1.1
	header('Pragma: no-cache') ; // HTTP/1.0
}

/**
 * Effectue une redirection (303 par defaut)
 * @param String $url  URL de redirection
 * @param int    $code HTTP response code (303 par defaut)
 * @param bool   $allow_external_domain Pour authoriser des redirections vers des domaines autres qu'EasyZic
 */
function http_redirect($url, $code=303, $allow_external_domain=false) {
	if ( $url{0}==='/' && @$url{1}!=='/' ) $url = '//'.$_SERVER['HTTP_HOST'].$url ;
	http_response_code($code) ;
	header("Location: ".$url) ;
	echo "<a href='".htmlentities($url)."'>Cliquez sur ce lien si la page ne s'affiche pas !</a>" ;
	exit() ;
}
