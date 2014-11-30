<div class='col-lg-4 col-lg-offset-4'>
	<h1>Edit Configuration</h1>
		<form action='/config/editConfigProc' method='post'>
			<div class="form-group">
    			<label for="smtpServer">Outgoing SMTP</label>
    			<input type="text" name="smtpServer" class="form-control" value=<?php echo $settings['smpt_addr']?>>
 	 		</div>
 	 		<div class="form-group">
    			<label for="username">Email Account Username</label>
    			<input type="text" name="username" class="form-control" value=<?php echo $settings['email_username']?>>
 	 		</div>
 	 		<div class="form-group">
    			<label for="password">Email Account Password</label>
    			<input type="text" name="password" class="form-control" value=<?php echo $settings['email_password']?>>
 	 		</div>
			<input type='submit' class='btn btn-info main_side_link' value='Save Configuration'>
		</form>
</div>