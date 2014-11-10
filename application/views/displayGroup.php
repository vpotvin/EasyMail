<div class="col-lg-4 display_group">
	<table class='table table-bordered table-hover table-condensed'>
		<thead>
			<tr>
				<th>Email Address</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($addrs as $a){
					echo "<tr>";
					echo 	"<td>";
					echo 		$a['email_address'];
					echo 	"</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>

<div class="col-lg-6 dislplay_group">
	<div class="input-group">
  		<span class="input-group-btn">
    		<button class="btn btn-default" type="button">Search</button>
  		</span>
 	 	<input type="text" class="form-control" onkeyup="showResult(this.value)">
	</div><!-- /input-group -->
	<table class='table table-bordered table-hover table-condensed'>
		<tbody id="showResults">
		</tbody>
	</table>
</div><!-- /.col-lg-6 -->

<script>
	var gid = <?php echo $groupID; ?>;
	function showResult(str) {
		if(str != ""){
			console.log(str);
			$( "#showResults" ).load("/search/index/" + str);
		}
	}
</script>


