<?php session_start() ?>
<?php
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

$required = array(
	'user_firstname',
	'user_lastname',
	'user_username',
	'user_password',
	'user_email'
);

// Extract form data
extract($_POST);

// Validate form data
foreach($required as $r) {
	// If invalid, redirect with message
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// Set message
		$_SESSION['messagefr'] = array(
			'type' => 'danger',
			'text' => 'Please provide all required information.'
			);
		// Store form data into session data
		$_SESSION['POST'] = $_POST;
		// Set failed register in session data
		$_SESSION['fr'] = 'true';
		// Set location header
		header('Location:../');
		// Kill script
		die();
	}
}
// Add contact to DB
$sql = "INSERT INTO users (user_firstname,user_lastname,user_username,user_password,user_email) VALUES ('$user_firstname','$user_lastname','$user_username',MD5('$user_password'),'$user_email')";
// connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Query DB
$conn->query($sql);

// Check for SQL error
if($conn->errno > 0) {
	echo "<p>SQL error #{$conn->errno}: {$conn->error}</p>";
	echo "<p><strong>SQL:</strong> $sql</p>";
}

// Close connection
$conn->close();
// Set message
$_SESSION['message'] = array(
		'text' => 'You have been succesfully registered.',
		'type' => 'success'
		);
// Set location header
header('Location:../');