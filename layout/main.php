<?php
// Display message if there is one in session data
if(isset($_SESSION['message'])) {
	// Display message
	echo "<div class=\"alert alert-{$_SESSION['message']['type']}\">{$_SESSION['message']['text']}<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a></div>";
	// Remove message from session
	unset($_SESSION['message']);
}
// Store the 'p' paramater from the QS into a variable
if (!isset($_SESSION['logged_in'])) {
	$p = 'login_page';
}elseif(isset($_GET['p'])) {
	$p = $_GET['p'];	
} else {
	$p = DEFAULT_PAGE;
}


include("pages/$p.php");
?>