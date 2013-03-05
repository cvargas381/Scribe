<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand" href="#">Scribe</a>
    <ul class="nav right">
      <li><p class="navbar-text">Don't have an account?</p></li>
      <li><a href="#myModal" role="button" data-toggle="modal">Register Here</a></li>
    </ul>
  </div>
</div>
<h1>Log In</h1>
<form class="form-horizontal" action="./actions/login.php" method="post">
	<div class="control-group">
	  <label class="control-label" for="user_username"></label>
	  <div class="controls">
	    <?php echo input('user_username','Username') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="user_password"></label>
	  <div class="controls">
	    <?php echo input('user_password','Password') ?>
	  </div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Log In</button>
	</div> 
</form>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Please enter the following information</h3>
  </div>
  <?php
  // Display message if there is one in session data
if(isset($_SESSION['messagefr'])) {
	// Display message
	echo "<div class=\"alert alert-{$_SESSION['messagefr']['type']}\">{$_SESSION['messagefr']['text']}<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a></div>";
	// Remove message from session
	unset($_SESSION['messagefr']);
}
?>
  <div class="modal-body">
    <form class="form-horizontal" action="./actions/register.php" method="post">
	<div class="control-group">
	  <label class="control-label" for="user_firstname">Name</label>
	  <div class="controls">
	    <?php echo input('user_firstname','first name') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="user_lastname"></label>
	  <div class="controls">
	    <?php echo input('user_lastname','last name') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="user_username">Username</label>
	  <div class="controls">
	    <?php echo input('user_username','username') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="user_password">Password</label>
	  <div class="controls">
	    <?php echo input('user_password','password') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="user_email">Email</label>
	  <div class="controls">
	    <?php echo input('user_email','you@example.com') ?>
	  </div>
	</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type="submit"class="btn btn-primary">Register</button>
  </div>
  </form>
</div>

<?php if(isset($_SESSION['fr'])) {
	echo '<script>$("#myModal").modal({show:true})</script>';
	unset($_SESSION['fr']);
}