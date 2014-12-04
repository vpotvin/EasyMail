<!--Shows a list of the user's saved drafts-->
<div class="col-lg-6">
	<table class='table table-bordered table-hover table-condensed'>
		<thead>
			<tr>
				<th>Subject</th>
				<th>To</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($drafts as $d){
					if($d['subject'] != "" && $d['sendType'] != ""){
						echo "<tr>";
						echo 	"<td>";
						echo 		$d['subject'];
						echo 	"</td>";
						echo 	"<td>";
						echo 		$d['sendType'];
						echo 	"</td>";
						echo 	"<td>";
						echo 		"<a href='/email/displayDraft/" . $d['did'] . "'>Load</a>";
						echo 	"</td>";
						echo "</tr>";
					}
				}
			?>
		</tbody>
	</table>
</div>
