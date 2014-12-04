<!--Notifies user of attempt to send message to bad email addresses-->
<div class="col-lg-6">
	<div class="panel panel-warning">
	  <div class="panel-heading">
	    <h3 class="panel-title">Unknown Email Address</h3>
	  </div>
	  <div class="panel-body">
	    These Email Address' Appear to be Invalid, Please Confirm Each Address You Would Still LIke To Add.
	    Be Aware That if an Invalid Email Address is Added There May be an Error When Attemption to Use it, 
	    Causing a Group Send to Fail.
	  </div>
	</div>
	<form class='form' method="POST" action="/procConfirm">
	<?php
		foreach ($badAddr as $a) {
			echo "<div class='checkbox'>";
    		echo 	"<label>";
      		echo 		"<input type='checkbox' name='formConfirm[]' value='" . $a . "'> " . $a;
    		echo 	"</label>";
  			echo "</div>";
		}
	?>
	 <button type="submit" class="btn btn-primary">Confirm</button>
</div>
