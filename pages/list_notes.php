<h2>Notes</h2>

<?php
// Connect to the database
// new mysqli (host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$sql = "SELECT * FROM notes";
$results = $conn->query($sql);

// If there was a MySQL error on the last query,
// display error and kill the current script
if($conn->errno > 0) {
	echo $conn->error;
	die();
}
?>
<!--show results-->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
      <p>stick-it notes</p>
    </div>
    <div class="span10">
      <!--Body content-->
      <p> notes body </p>
    </div>
  </div>
</div>
<?php 
// close the DB connection
$conn->close(); 
?>	