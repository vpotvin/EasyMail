<?php 
    require_once "application/richtexteditor/include_rte.php";
  
    // Create Editor instance and use Text property to load content into the RTE.  
    $rte=new RichTextEditor();
    include "application/views/_header.php"; // Manually include this make the Header right
?>
    <div class='col-lg-6'>
        <form action="/email/send" method="POST" role="form" class="form-horizontal">
            <div class="form-group">
                <label for="sendType">To Individual or To All:</label>
                <select name="sendType" id="selectOption" class="form-control" onchange="sendSelect()">
                    <option value="" disabled selected required>Send Type</option>
                    <option value="toAll">Send To All</option>
                    <option value="toIndividual">Send To Individual</option>
                </select>
            </div>

            <div class="form-group">
                <label for="to">To Individual:</label>
                <input type="text" name="to" id="indiTo" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" class="form-control">
            </div>
  
                <?php  
                    $rte->Text="";
                    // Set a unique ID to Editor   
                    $rte->ID="Editor1";    
                    $rte->MvcInit();   
                    // Render Editor 
                    echo $rte->GetString();  
                ?>
            <div class="form-group" id="customBut">
                <input type="submit" value="Send" class="btn btn-primary btn-lg">
            </div> 
        </form>
    </div>
<!-- MOVE EVERYTHING BELOW TO EXTERNAL FILES -->
<script>
    function sendSelect(){
        var myselect = document.getElementById("selectOption");
        if(myselect.options[myselect.selectedIndex].value == "toIndividual"){
            var toBox = document.getElementById("indiTo");
            if ($(toBox).attr('disabled')) {
                $(toBox).removeAttr('disabled');
            }
        } else if(myselect.options[myselect.selectedIndex].value == "toAll"){
            document.getElementById('indiTo').disabled = true;
        };
    }
</script>

<style>
    #customBut{
        margin-top: 5px;
    }
</style>

