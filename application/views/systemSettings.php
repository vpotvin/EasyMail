<!--User interface for editing configuration -->
<div class='row'>
	<div class="col-lg-2">
            <form action="setConfigData" method="post">
                SMTP Server: $address= <input type = "text" name="smtp_host"><br>
                Port: $port=<input type = "text" name="smtp_port"><br>
                Username: $user=<input type = "text" name="smtp_user"><br>
                Password: $pass=<input type = "text" name="smtp_pass"><br>
                <input type="submit">
            </form>
        </div>
</div>

function setConfigData()
{
    

}
