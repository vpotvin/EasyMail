<!--User interface to allow the user to download a copy of the list as a .txt file-->
<div class='col-lg-4 col-lg-offset-4'>
    <form action="downloads/downloadById" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
        <div class="ui labeled icon button">
			<label for="downloadFile">Download Email List:</label>
                        <button type="submit" onclick=downloads::downloadById()>Download!</button>
	</div>
    </form>
</div>