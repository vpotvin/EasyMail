<div class='row'>
	<div class="col-lg-2 main_box">
		<form action='/downloads/full' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Download List'>
		</form>

		<form action='uploadfile' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Upload List'>
		</form>

		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Saved Drafts'>
		</form>

		<form action='#' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='System Settings'>
		</form>

		<form action='/group/create' method='get'>
			<input type='submit' class='btn btn-info main_side_link' value='Create Group'>
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

	<div class='col-lg-2 main_box'>
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Groups</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($groups as $g) {
						echo "<tr>";
						echo 	"<td><span class='box_label label label-" . $g['group_color'] . "'><a class='black_link' href=/group/display/" . $g['gid'] . ">" . $g['group_name'] . "</a></span></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>