<?php
// Connect to the database
// new mysqli (host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$sql = "SELECT * FROM notes WHERE user_id='{$_SESSION['user']}'";
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
      <?php 
      $notes = array();
      while(($note = $results->fetch_assoc()) != null) {
        $notes[] = $note;    
      } 
      foreach ($notes as $note) {
        extract($note);
        if ($note_sticky == '2') {
          echo "<h4>$note_name</h4>";
          echo "<p>$note_content</p>";
        }
      }
      ?>
    </div>
    <div class="span10">
      <!--Body content-->
      <?php
      foreach ($notes as $note) {
        extract($note);
        if ($note_sticky == '1') {
          echo "<h4>$note_name</h4>";
          echo "<p>$note_content</p>";
        }
      }
      ?>
    </div>
  </div>
</div>
<?php 
// close the DB connection
$conn->close(); 
?>	