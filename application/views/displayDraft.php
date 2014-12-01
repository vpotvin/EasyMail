<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type='text/css' href='/css/main.css' media='screen'>

        <!--[if lt IE 9 ]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
    </style>

    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img alt="Brand" src="/images/newlogo.png">
                        EasyMail
                    </a>
                </div>
                <?php
                    if(!$logged_in) {
                        echo "<form action='/login' method='get' class='cred'>";
                        echo    "<input type='submit' class='btn btn-success' value='LOGIN'>";
                        echo "</form>";
                    } else {
                        echo "<form action='/logout' class='cred'>";
                        echo    "<input type='submit' class='btn btn-danger' value='LOGOUT'>";
                        echo "</form>";
                    }
                ?>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></a>
                         <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Upload Email List</a></li>
                            <li><a href="#">Download Email List</a></li>
                            <li><a href="#">Remove Duplicates</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Saved Drafts</a></li>
                            <li class="divider"></li>
                            <li><a href="#">System Settings</a></li>
                        </ul>
                    </li>
                </ul>
        </nav>

        <div class="container-fluid">
        <div class="row">
            <?php 
                if($flashMessages) {
                    //print_r($flashMessages);
                    foreach ($flashMessages as $message) { 
                        echo "<div class='col-lg-12'>";
                        echo "  <div class='alert alert-" . $message['CSS'] . " fade in'>";
                        echo "      <a href='#' data-dismiss='alert' class='close'>X</a>";
                        echo        $message['message'];
                        echo "  </div>";
                        echo "</div>";
                    }
                }
            ?>


        </div>
        <div class="col-lg-6 col-lg-offset-2">
            <h1>Compose Message</h1>
            <div class="alert alert-success" id="saveDiv" style="display: none;" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                    Draft Saved
            </div>
            <form action="/email/send" method="POST" role="form" class="form-horizontal">
                <?php 
                    require_once "application/richtexteditor/include_rte.php";
                    // Create Editor instance and use Text property to load content into the RTE.  
                    $rte=new RichTextEditor();
                ?>
                <div class="form-group">
                    <label for="sendType">To Individual or To All:</label>
                    <select name="sendType" id="selectOption" class="form-control" onchange="sendSelect()">
                        <option value="" disabled selected required>Send Type</option>
                        <option value="toAll" <?php if($draft['sendType'] == 'toAll'){echo "selected";}?> >Send To All</option>
                        <option value="toIndividual" <?php if($draft['sendType'] == 'toIndividual'){echo "selected";}?> >Send To Individual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="to">To Individual:</label>
                    <input type="text" name="to" id="indiTo" class="form-control" 
                        <?php
                            if($draft['sendType'] == 'toAll'){
                                echo 'disabled';
                            } else{
                                echo "value='" . $draft['sendTo'] . "'";
                            }
                        ?>
                    >
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" class="form-control" id='subject'
                        <?php
                            echo "value='" . $draft['subject'] . "'";
                        ?>
                    >
                </div>
  
                <?php 
                    $rte->Text = $draft['message'];
                    // Set a unique ID to Editor   
                    $rte->ID="Editor1";    
                    $rte->MvcInit();
                    $rte->Width="950px";
                    $rte->Height="600";    
                    // Render Editor 
                    echo $rte->GetString();  
                ?>

                <div class="form-group" id="customBut">
                    <input type="submit" value="Send" class="btn btn-primary btn-lg">
                </div> 
            </form>
        </div>
        <div class="col-lg-2 col-lg-offset-1">
            <h3>Usefull Links</h3>
            <form action='drafts/display' method='get'>
                <input type='submit' class='btn btn-info main_side_link' value='Saved Drafts'>
            </form>
            <form method='get'>
                <input type='submit' class='btn btn-info main_side_link' value='System Settings'>
            </form>
            <form action='/uploadfile?' method='get'>
                <input type='submit' class='btn btn-info main_side_link' value='Manage Contacts'>
            </form>
            <form method='get'>
                <input type='submit' class='btn btn-info main_side_link' value='Manage Groups'>
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

    $(document).ready(function() { 
        saveTimer();
    });

    function saveTimer(){
        window.setInterval(function(){
            var sendToHandle = document.getElementById("selectOption");
            
            var subjectHandle = document.getElementById("subject");
            var messageHandle = document.getElementById("Editor1");

            var sendToData = sendToHandle.options[sendToHandle.selectedIndex].value;
            var subjectData = subjectHandle.value;
            var messageData = messageHandle.value;
            var indiData = null;

            if(sendToData == 'toIndividual'){
                var indiHandle = document.getElementById("indiTo");
                indiData = indiHandle.value;
            }

            $.post('/drafts/ajaxSave', {sendTo: sendToData, subject: subjectData, message: messageData, address: indiData})
                .done(function(d){
                    $('#saveDiv').show();
                    setTimeout(function(){
                        $('#saveDiv').fadeOut();
                    }, 3000);
                    console.log(d);
                });

        }, 30000);
    }
</script>

<style>
    #customBut{
        margin-top: 5px;
    }
</style>