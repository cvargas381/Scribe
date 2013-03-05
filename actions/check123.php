<?php
  session_start();
require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    mysql_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    @mysql_select_db("scribe") or die( "Unable to connect to database");
    $username = mysql_real_escape_string($_POST['user_username']);
    $password = mysql_real_escape_string($_POST['user_password']);
    $result = mysql_query("SELECT * FROM users WHERE username='$user_username' AND
      password=md5('$user_password')");

    if(mysql_num_rows($result) > 0) {
      $_SESSION['is_logged_in'] = 1;
    }
  }

  if(!isset($_SESSION['is_logged_in'])) {
    header("location:../");
  } else {
    //header("location:authenticated.php");
  }
?>