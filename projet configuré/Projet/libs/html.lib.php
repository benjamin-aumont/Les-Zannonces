<?php

/**
 * Génération d'une balise <a>
 */
function anchor($href, $libelle=null, $padding='') {
	if (!$href) return '<span '.$padding.'>'.htmlspecialchars($libelle).'</span>' ;
	if ($libelle === null) {
		$readable_href = $href ;
		if ( strpos($readable_href, '%') ) $readable_href = urldecode($readable_href) ;
		if ( strlen($readable_href)<70 ) $libelle = $readable_href ;
		else if ( $p=strpos($readable_href,'/',strpos($readable_href,'://')+3) ) $libelle = substr($readable_href,0,$p+1).'(...)'.mb_substr($readable_href,$p-65) ;
		else $libelle = substr($readable_href,0,25).'(...)'.substr($readable_href,-40) ;
	}
	return '<a href="'.htmlspecialchars($href).'" '.$padding.'>'.htmlspecialchars($libelle).'</a>' ;
}

/**
 * Impression d'un formulaire select a partir d'une hash-table
 *
 * @param string $name        Le nom que prendra le select
 * @param array  $values      Une hash table ($id => $value_name) contenant les valeurs à prendre en compte. Peut être une table à 2 dimensions dans le cas où l'on souhaite gérer des groupes.
 * @param mixed  $id_selected Clé de la valeur qui doit être préselectionnée par défaut (peut être un tableau de clés si plusieures valeurs)
 * @param string $padding     Propriétés additionnelles pour la balise <select> générée
 * @return La balise <select> correspondante
 */
function form_select($name, $values, $id_selected=null, $padding='') {
	$code = "<select name='".$name."' ".$padding.">" ;
	foreach ($values as $id => $libelle) {
		if ( is_array($libelle) ) {
			// ds ce cas, l' $id correspond au libelle du groupement
			$code .= "<optgroup label='".htmlspecialchars($id)."'>" ;
			foreach ($libelle as $id2 => $libelle2) {
				if ( $id_selected === null ) $is_selected = false ;
				else if ( is_array($id_selected) ) $is_selected = in_array($id2, $id_selected) ;
				else $is_selected = (strcmp($id_selected,$id2)===0) ;
				$code .= form_option($id2, $libelle2, $is_selected) ;
			}
			$code .= "</optgroup>\n" ;
		}
		else {
			if ( $id_selected === null ) $is_selected = false ;
			else if ( is_array($id_selected) ) $is_selected = in_array($id, $id_selected) ;
			else $is_selected = (strcmp($id_selected,$id)===0) ;
			$code .= form_option($id, $libelle, $is_selected) ;
		}
	}
	$code .= "</select>" ;
	return $code ;
}
function form_option($id, $libelle, $is_selected=false) {
	$code = '<option value="'.$id.'"' ;
	if ($is_selected) $code .= " selected='selected'" ;
	$code .= ">".htmlspecialchars($libelle)."</option>" ;
	return $code ;
}

/**
 * Génération d'un bouton de soumission de formulaire
 */
function input_button($value, $name='action', $padding='') {
	return '<input type="submit" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" '.$padding.' />' ;
}

/**
 * Champ de formulaire texte
 *
 * @param String $name
 * @param String $value
 * @param String $padding
 * @param String [$type] Pour les formats HTML5 ('number', 'email', 'range', etc...). Par defaut 'text'
 */
function input_text($name, $value='', $padding='', $type='text') {
	return '<input type="'.$type.'" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" '.$padding.' />' ;
}

