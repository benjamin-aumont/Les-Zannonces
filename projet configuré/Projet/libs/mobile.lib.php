<?php

function is_mobile() {
	if ( $user_agent = @$_SERVER['HTTP_USER_AGENT'] ) {
		if ( stripos($user_agent, 'iphone') ) return true ;
		if ( stripos($user_agent, 'android') ) return true ;
		if ( stripos($user_agent, 'opera mini') ) return true ;
		if ( stripos($user_agent, 'blackberry') ) return true ;
		if ( stripos($user_agent, 'ipod') ) return true ;
		//if ( stripos($user_agent, 'Googlebot-Mobile') ) return true ; // Google mobile trouvera les liens alternates dans le sitemap et dans les entêtes des pages
		//if ( stripos($user_agent, 'mobile') ) return true ; // faux positif ipad...
	}
	return false ;
}

?>