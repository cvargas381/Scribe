<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="./">Notes</a>
	  	<ul class="nav">
	  		<?php foreach($pages as $file => $text): ?>
	  			<li><a href="./?p=<?php echo $file ?>"><?php echo $text ?></a></li>
	  		<?php endforeach ?>
		</ul>
		<ul class="nav right">
			<li><a href="./?lo">Logout</a></li>
		</ul>
	</div>
</div>