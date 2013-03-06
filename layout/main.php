<?php
// Display message if there is one in session data
if(isset($_SESSION['message'])) {
	// Display message
	echo "<div class=\"alert alert-{$_SESSION['message']['type']}\">{$_SESSION['message']['text']}<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a></div>";
	// Remove message from session
	unset($_SESSION['message']);
}
// Store the 'p' paramater from the QS into a variable
if (!isset($_SESSION['user'])) {
	$p = 'login_page';
}elseif(isset($_GET['p'])) {
	$p = $_GET['p'];	
} else {
	$p = DEFAULT_PAGE;
}
if(isset($_GET['lo'])) {
	unset($_SESSION['user']);
	header('Location:./');
}
include("pages/$p.php");
?>