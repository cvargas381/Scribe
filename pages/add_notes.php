<form class="form_center" action="./actions/create_note.php" method="post">
	<div class="control-group">
	  <label class="control-label" for="note_name">Note Name</label>
	  <div class="controls">
	    <?php echo input('note_name','Title',null,'note_title') ?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="note_content">Content</label>
	  <div class="controls">
	    <textarea class="note_content" name="note_content" placeholder="...."></textarea>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="note_sticky">Make a Sticky Note?</label>
	  <div class="controls">
	    <?php   $options = array('2' => 'Yes','1' => 'No');
				echo radio('note_sticky',$options);
		?>
	  </div>
	</div>
	<button type="submit" class="btn btn-success">Add Note</button>
	<a href="./"><button type="button" class="btn">Cancel</button></a>
</form>