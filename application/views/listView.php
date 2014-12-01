
<div class="col-lg-4 col-lg-offset-4">
	<h1>Email List</h1>
	<div class="input-group">
  		<span class="input-group-btn">
    		<button class="btn btn-default" type="button">Search</button>
  		</span>
 	 	<input type="text" class="form-control" onkeyup="showResult(this.value)">
	</div><!-- /input-group -->
	<table class="table" id="etable">
		<thead>
			<tr>
				<th>Address</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="displayBody">
		<?php
			foreach ($addr as $a) {
				echo "<tr>";
					echo "<td>";
						echo $a['email_address'];
					echo "</td>";

					echo "<td>";
						echo "<a href='/listmng/remove/". $a['eaid'] . "'>Remove Address</a>";
					echo "</td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
</div>
<div class="col-lg-2 col-lg-offset-1">
	<h3>List Managment</h3>
	<form method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Sort Acending' onclick="return getByOrder('asc');">
	</form>
	<form method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Sort Decending' onclick="return getByOrder('desc');">
	</form>
	<form action='/uploadfile?' method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Upload/Merge List'>
	</form>
	<form method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Download Current' onclick="return getCurrentList()">
	</form>
	<form action='/downloads/full' method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Download Full'>
	</form>
	<form action='/listmng/removeDupes' method='get'>
		<input type='submit' class='btn btn-primary main_side_link' value='Remove Duplicates'>
	</form>
</div>

<script>
	function showResult(searchStr){
		$("#displayBody").empty();
		$.post( "/liveListSearch", { searchString: searchStr},function(returnData){
			if(returnData){
				$("#displayBody").append(returnData);
			}
		});
	}

	function getByOrder(oType){
		$("#displayBody").empty();
		$.post( "/liveGetAllOrder", {orderType: oType},function(returnData){
			if(returnData){
				$("#displayBody").append(returnData);
			}
		});
		return false;
	}

	function getCurrentList(){
		var obj = {}
		etable = document.getElementById("etable")
		for (var i = 1, row; row = etable.rows[i]; i++) {
			obj[i] = row.cells[0].innerHTML;
		}
		strObj = JSON.stringify(obj);
		// $.get( "/listmng/downloadCurrent", {data: strObj},function(returnData){
		// 	if(returnData){
		// 		//console.log(returnData);
		// 		//$("#displayBody").append(returnData);
		// 	}
		// });

		var url = "/listmng/downloadCurrent"
		var form = $("<form action='" + url + "' method='post'>" +
  			"<input type='text' name='data' value='" + strObj + "'/>" +
  			"</form>");
		$('body').append(form);

		form.submit();
		form.remove();
		
		return false
	}

</script>
