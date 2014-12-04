<!--Form to allow Administrator to create a user-->
<div class='col-lg-4 col-lg-offset-4'>
	<form action="/user/createUserProc" method="POST" role="form" class="form-horizontal">
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="checkbox">
        		<label>
          			<input type="checkbox" name="admin" value="Y"> Is an Admin?
        		</label>
      		</div>

		<div class="form-group">
			<input type="submit" value="Create User" class="btn btn-success btn-lg btn-block">
		</div>
	</form>
</div>