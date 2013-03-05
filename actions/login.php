<?php session_start() ?>
<?php
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

$required = array(
	'user_username',
	'user_password'
);

// Extract form data
extract($_POST);

// Validate form data
foreach($required as $r) {
	// If invalid, redirect with message
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// Set message
		$_SESSION['message'] = array(
			'type' => 'danger',
			'text' => 'Please provide all required information.'
			);
		// Store form data into session data
		$_SESSION['POST'] = $_POST;
		// Set location header
		header('Location:../');
		// Kill script
		die();
	}
}
// check for correct username and password
$sql = "SELECT * FROM users WHERE user_username='$user_username' AND
      user_password=md5('$user_password')";
// connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Query DB
$result = $conn->query($sql);

// Check for SQL error
if($conn->errno > 0) {
	echo "<p>SQL error #{$conn->errno}: {$conn->error}</p>";
	echo "<p><strong>SQL:</strong> $sql</p>";
}
// authenticate username and password
$num_rows = $result->num_rows;
if($num_rows > 0) {
      $_SESSION['is_logged_in'] = '1';
    } else {
    	$_SESSION['is_logged_in'] = '';
    }

// Close connection
$conn->close();
// Set message
$_SESSION['message'] = array(
		'text' => 'Welcome',
		'type' => 'success'
		);
// Set location header
header('Location:../');