<div class='row'>
	<div class="col-lg-2 main_box">
		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Download List'>
		</form>

		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Upload List'>
		</form>

		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Save Drafts'>
		</form>

		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='System Settings'>
		</form>
	</div>

	<div class='col-lg-2 main_box'>
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($emails as $e) {
						echo "<tr>";
						echo 	"<td>" . $e['email_address'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>