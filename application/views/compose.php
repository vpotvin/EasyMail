<?php require_once "application/richtexteditor/include_rte.php" ?> 
<div class="col-lg-11"> 
    <form action="send" method="POST" role="form" class="form-horizontal">
 
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="text" name="to" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" class="form-control">
                </div>

                <!-- <form id="form1" method="POST">  -->  
                    <?php   
                        // Create Editor instance and use Text property to load content into the RTE.  
                        $rte=new RichTextEditor();   
                        $rte->Text="Type here"; 
                        // Set a unique ID to Editor   
                        $rte->ID="Editor1";    
                        $rte->MvcInit();   
                        // Render Editor 
                        echo $rte->GetString();  
                    ?>   
                <!-- </form>  -->

                <div class="col-lg-1 col-lg-offset-7">
                    <div class="form-group">
                        <input type="submit" value="Send To All" class="btn btn-success btn-lg btn-block">
                    </div>
                </div>
    </form>
</div>


        

