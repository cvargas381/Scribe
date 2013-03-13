<?php session_start() ?>
<?php
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute the query
$sql = "DELETE FROM notes WHERE user_id='{$_SESSION['user']}' and note_id='{$_POST['id']}'";
$conn->query($sql);

// Close the connection
$conn->close();
$_SESSION['message'] = array(
		'text' => 'Your note has been deleted.',
		'type' => 'danger'
		);
// Redirect
header('Location:../');