<?php session_start() ?>
<?php
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

$required = array(
	'note_name',
	'note_content',
	'note_sticky'
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
		header('Location:../?p=add_notes');
		// Kill script
		die();
	}
}
// Add contact to DB
$sql = "INSERT INTO notes (note_name,note_content,user_id,note_sticky) VALUES ('$note_name','$note_content','{$_SESSION['user']}','$note_sticky')";
// connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Query DB
$conn->query($sql);
// Close connection
$conn->close();
// Set message
$_SESSION['message'] = array(
		'text' => 'Your Note has been added.',
		'type' => 'success'
		);
// Set location header
header('Location:../');