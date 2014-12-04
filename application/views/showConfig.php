<!--Shows user their current email configuration-->
<div class='col-lg-4 col-lg-offset-4'>
	<h1>Current Configuration</h1>
		<table class='table'>
			<thead>
				<tr>
					<th>Outgoing Server</th>
					<th>Email Account Username</th>
					<th>Email Account Password</th>
				</tr>
			</thead>
			<tbody>
				<tr>
			<?php
				echo "<td>";
					echo $settings['smpt_addr'];
				echo "</td>";
				echo "<td>";
					echo $settings['email_username'];
				echo "</td>";
				echo "<td>";
					echo $settings['email_password'];
				echo "</td>";
			?>
				</tr>
			</tbody>
		</table>
		 <form action='/config/editConfig' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Edit Configuration'>
		</form>
</div>