<?php
function format_phone($phone) {
	return '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,-4);
}


/**
* Generates an HTML input element with the given attribute values.
* this function also examines SESSION data for previously
* entered avlues with the same name
* @param String $name
* @param String $placeholder
* @return HTML input element
*/
function input($name, $placeholder, $value=null, $class='') {
	if($value == null && isset($_SESSION['POST'] [$name])) {
		$value = $_SESSION['POST'] [$name];

		// Remove from session data
		unset($_SESSION['POST'] [$name]);

		if($value == '') {
			$class .= ' error';
		} 
	} else {
		$value = '';
	}
	return "<input class=\"$class\" type=\"text\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\" />";
}

/**
* Generates an HTML select element witht he given name
* attribute and option elements
* This function also examines session data for a previously
* submitted value
* @param String $name Name attribute
* @param Array $options Array of options in the POST value => text
* @return HTML select element
*/
function dropdown($name, $options, $group_id = 0) {
	$select = "<select name=\"$name\">";

	// Add option elements to select element
	foreach($options as $value => $text) {
		// If there is session POST data for $name, AND its value
		// is the same as the current array element, select it
		if(isset($_SESSION['POST'] [$name]) && $_SESSION['POST'] [$name] == $value) {
			unset($_SESSION['POST'] [$name]);
			$selected = 'selected="selected"';
		} else if($group_id == $value) {
			$selected = 'selected="selected"';
		} else {
			$selected = '';
		}
		$select .= "<option $selected value=\"$value\">$text</option>";
	}

	$select .= "</select>";
	return $select;
}

function radio($name, $options) {
	$cards = '';
	foreach($options as $value => $text) {
		if(isset($_SESSION['POST'] [$name]) && $_SESSION['POST'] [$name] == $value) {
			unset($_SESSION['POST'] [$name]);
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}
		$cards .="<label><input type=\"radio\" name=\"$name\" value=\"$value\" $checked />$text</input></label>";
	}
	return $cards;
}