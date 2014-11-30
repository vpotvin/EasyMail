<div class='col-lg-4 col-lg-offset-4'>
	<form action="upload/processUpload" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="emailFile">Email File:</label>
			<input type="file" name="emailFile" class="form-control">
		</div>
      		<div class="checkbox">
        		<label>
          			<input type="checkbox" name="dupes" value="Y"> Remove Duplicates?
        		</label>
      		</div>

		<div class="form-group">
			<input type="submit" value="Upload" class="btn btn-success btn-lg btn-block">
		</div>
		<br/>
	</form>
</div>