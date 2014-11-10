<div class='col-lg-4 col-lg-offset-4'>
	<form action="/group/procCreate" method="POST" role="form" class="form-horizontal">
		<div class="form-group">
			<label for="groupName">Group Name:</label>
			<input type="text" name="groupName" class="form-control">
		</div>
		<div class="form-group">
			<label for="groupColor">Group Color:</label>
			<select name="groupColor" class="form-control">
  				<option>Grey</option>
  				<option>Dark Blue</option>
  				<option>Green</option>
  				<option>Light Blue</option>
  				<option>Orange Red</option>
			</select>
		</div>

		<div class="form-group">
			<input type="submit" value="Create" class="btn btn-success btn-lg btn-block">
		</div>
	</form>
</div>