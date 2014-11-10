<div class='col-lg-4 col-lg-offset-4'>
	<form action="/group/procCreate" method="POST" role="form" class="form-horizontal">
		<div class="form-group">
			<label for="groupName">Group Name:</label>
			<input type="text" name="groupName" class="form-control">
		</div>
		<div class="form-group">
			<label for="groupColor">Group Color:</label>
			<select name="groupColor" class="form-control">
  				<option value="default">	Grey		</option>
  				<option value="primary">	Dark Blue 	</option>
  				<option value="success">	Green 		</option>
  				<option value="info">		Light Blue 	</option>
  				<option value="warning"> 	Orange 		</option>
  				<option value="danger"> 	Red 		</option>
			</select>
		</div>

		<div class="form-group">
			<input type="submit" value="Create" class="btn btn-success btn-lg btn-block">
		</div>
	</form>
</div>