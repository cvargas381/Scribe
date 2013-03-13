<?php session_start() ?>
<?php
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

// Extract POST data to variables
extract($_POST);
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute query
$sql = "UPDATE notes SET note_name='$note_name', note_content='$note_content' WHERE note_id={$_POST['note_id']} ";
$conn->query($sql);

if($conn->errno >0) {
	echo $conn->error;
}

// clsoe DB connection 
$conn->close();
$_SESSION['message'] = array(
		'text' => 'Your Note has been edited.',
		'type' => 'info'
		);
// Redirect to list
header('Location:../');