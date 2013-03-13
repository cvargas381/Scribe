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
      <h3>Urgent</h3>
      <div class="sticky_note_body">
      <!--Sidebar content-->
      <?php 
      $notes = array();
      while(($note = $results->fetch_assoc()) != null) {
        $notes[] = $note;    
      } 
      foreach ($notes as $note_num => $note) {
        extract($note);
        if ($note_sticky == '2') {
          echo "<div class=\"note\" data-id=\"$note_id\">";
          echo "<h4 class=\"$note_num\">$note_name</h4>";
          echo '<form style="display:inline;" method="post" action="actions/delete_note.php">';
          echo "<input type=\"hidden\" name=\"id\" value=\"$note_id\" />";
          echo "</form>";
          echo "<p class=\"$note_num sticky\">$note_content</p>";
          echo "<a href=\"#\" note-sticky=\"$note_sticky\" data-target=\"$note_id\" class=\"$note_num\"><i class=\"icon-edit\"></i></a>";
          $onclick = "return confirm('Are you sure you want to delete $note_name?')";
          echo "<button onclick=\"$onclick\" class=\" no_format\" type=\"submit\"><i class=\"icon-trash\"></i></button>";
          echo "</div>";
        }
      }
      ?>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        $("a").click(function(){
          // var num = $(this).attr("class");
          // var title = $("h4." + num).text();

          var note_sticky = $(this).attr('note-sticky');
          var note_id = $(this).attr('data-target');
          var $note_div = $('div[data-id=' + note_id + ']');
          var note_name = $note_div.children('h4').first().text();
          var note_content = $note_div.children('p').first().text();

          if (note_sticky == '2') {
            var textarea = 'edit_sticky_note_content';
            var sticky_name = 'edit_sticky_note_name';
            var edit_sticky = 'edit_sticky';
            //variable for text on edit button
            var button_text = 'Edit';
            var button_size = 'btn-mini';
          } else if(note_sticky == '1') {
            var textarea = 'edit_note_content';
            var sticky_name = '';
            var edit_sticky = '';
            //variable for text on edit button
            var button_text = 'Edit Note';
            var button_size = '';
          };
          
          // $("h4." + num).html('<form action="./actions/update.php" method="post"><div class="control-group"><div class="controls"><input type="text" name="note_title" value="'+title+'"/></div></div>')
          // var text = $("p." + num).text();
          // $("p." + num).html('<div class="control-group"><div class="controls"><textarea class="edit_note_content" name="note_content" >' + text + '</textarea></div></div><div><button type="submit" class="btn btn-warning edit"><i class="icon-edit icon-white"></i>Edit Note</button><a href="./"><button type="button" class="btn">Cancel</button></a></div></form>');
          
          var html = '<form action="./actions/update_notes.php" method="post"><input type="hidden" name="note_id" value="' + note_id + '" /><div class="control-group"><div class="controls"><input type="text" class="'+ sticky_name +'" name="note_name" value="'+ note_name +'"/></div></div>';
          html += '<div class="control-group textarea_bottom"><div class="controls"><textarea class="' + textarea + '" name="note_content" >' + note_content + '</textarea></div></div><div><button type="submit" class="btn btn-info edit '+ edit_sticky +' '+ button_size +'"><i class="icon-edit icon-white"></i>'+ button_text +'</button><a href="./"><button type="button" class="btn btn-inverse '+ button_size +'">Cancel</button></a></div></form>';

         $note_div.html(html);
        });
      });
    </script>
    <div class="span10">
      <h3>Common</h3>
      <div class="common_note_body">
      <!--Body content-->
      <?php
      foreach ($notes as $note_num => $note) {
        extract($note);
        if ($note_sticky == '1') {
          echo "<div class=\"note\" data-id=\"$note_id\">";
          echo "<h4 class=\"$note_num\">$note_name</h4>";
          echo "<a href=\"#\" note-sticky=\"$note_sticky\" data-target=\"$note_id\" class=\"$note_num\"><i class=\"icon-edit\"></i></a>";
          echo '<form style="display:inline;" method="post" action="actions/delete_note.php">';
          echo "<input type=\"hidden\" name=\"id\" value=\"$note_id\" />";
          $onclick = "return confirm('Are you sure you want to delete $note_name?')";
          echo "<button onclick=\"$onclick\" class=\" no_format\" type=\"submit\"><i class=\"icon-trash\"></i></button>";
          echo "</form>";
          echo "<p class=\"$note_num\">$note_content</p>";
          echo "</div>";
        }
      }
      ?>
      </div>
    </div>
  </div>
</div>
<?php 
// close the DB connection
$conn->close(); 
?>	