<form action="send" method="POST" role="form" class="form-horizontal">

    <div class='col-lg-5 col-lg-offset-3'>
        <div class="form-group">
            <label for="to">To:</label>
            <input type="text" name="to" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" class="form-control">
        </div>

        <div class="form-group">
            <label for="message">Message:</label>

            <input type="text_area" name="message" class="form-control" >
        </div>
    </div>

    <div class="col-lg-1 col-lg-offset-7">
        <div class="form-group">
            <input type="submit" value="Send To All" class="btn btn-success btn-lg btn-block">
        </div>
    </div>
</form>

