    <?php
    if(isset($_REQUEST['download'])) {
    include("classes/EchoSignApiClient.class.php");
    $query=new EchoSignApiClient();
    $query->getLatestDocument($_REQUEST['ApiKey'], $_REQUEST['Key']);
    }
    ?>
<!DOCTYPE html>
<!-- saved from url=(0040)http://localhost:18285/Home/SendDocument -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Status</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="page">
        <div id="header">
            <div id="title">
                <a href="index.php">
                    <h1>EchoSign PHP</h1>
                </a>
            </div>
            
            <div id="nav">
                <ul id="menu">
                    <li><a href="index.php">Test Ping</a></li>
                    <li><a href="senddocument.php">Send Document</a></li>
                    <li><a href="widget.php">Widget</a></li>
                    <li><a href="status.php">Status</a></li>
                    <li><a href="download.php">Download Source Code</a></li>
            </div>
        </div>
        <div id="main">
<script type="text/javascript">
    $(document).ready(function () {
        $('#check').live("click", function (e) {
            var apikey = $('#ApiKey').val();
            if (apikey == "") {
                e.preventDefault();
                $('#errorkey').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorkey").offset().top - 100
                }, 100);
            }
            else {
                $('#errorkey').css("color","black");
            }
            var dockey = $('#documentKey').val();
            if (dockey == "") {
                e.preventDefault();
                $('#errordockey').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errordockey").offset().top - 100
                }, 100);
            }
            else {
                $('#errordockey').css("color","black");
            }
                });
    });
    $(document).ready(function () {
        $('#download').live("click", function (e) {
            var apikey = $('#ApiKey').val();
            if (apikey == "") {
                e.preventDefault();
                $('#errorkey').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorkey").offset().top - 100
                }, 100);
            }
            else {
                $('#errorkey').css("color","black");
            }
            var download = $('#Key').val();
            if (download == "") {
                e.preventDefault();
                $('#errordownkey').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errordownkey").offset().top - 100
                }, 100);
            }
            else {
                $('#errordownkey').css("color","black");
            }
                });
    });
    $(document).ready(function () {
        $('#formdata').live("click", function (e) {
            var apikey = $('#ApiKey').val();
            if (apikey == "") {
                e.preventDefault();
                $('#errorkey').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorkey").offset().top - 100
                }, 100);
            }
            else {
                $('#errorkey').css("color","black");
            }
            var formdata = $('#documentkey').val();
            if (formdata == "") {
                e.preventDefault();
                $('#errorform').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorform").offset().top - 100
                }, 100);
            }
            else {
                $('#errorform').css("color","black");
            }
                });
    });
  
</script>            
<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
<fieldset>

    <legend>Status</legend>

    <p title="The personal API access key that you&#39;ve been assigned." class="required" id="errorkey">Api key</p>
                    <input id="ApiKey" name="ApiKey" type="text" value="">
                    <br>
                    <br>
    <p class="required" id="errordockey">
        Enter document key to check it status</p>
    <input id="documentKey" name="documentKey" type="text">
    <br>  
    <input name="status" type="submit" value="Check" id="check">
    <div id="checkResult" >
    <?php
    if(isset($_REQUEST['status'])) {
    include("classes/EchoSignApiClient.class.php");
    $query=new EchoSignApiClient();
    echo "Document status: ".$query->getDocumentInfo($_REQUEST['ApiKey'], $_REQUEST['documentKey']);
    }
    ?>
    </div>


<br>


<p class="required" id="errordownkey">Enter document key to download PDF</p>

    <div class="editor-field">
        <input class="text-box single-line" id="Key" name="Key" type="text" value="">
    </div>
    <input name="download" type="submit" value="Download" id="download">
    
    <p class="required" id="errorform">Enter document key to get form data</p>

    <div class="editor-field">
        <input class="text-box single-line" id="documentkey" name="documentkey" type="text" value="">
    </div>
    <input name="formdata" type="submit" value="Get form data" id="formdata">
    </fieldset>

      <div id="formdataResult" >
    <?php
    if(isset($_REQUEST['formdata'])) {
    include("classes/EchoSignApiClient.class.php");
    $query=new EchoSignApiClient();
    $result=$query->getFormData($_REQUEST['ApiKey'], $_REQUEST['documentkey']);
    if (is_string($result)) echo $result;
    elseif (is_array($result)) {
        $content="<table>";
        foreach ($result as $key=>$value) {
            $content.="<tr><td>$key</td><td>$value</td></tr>";    
        }
        $content.="</table>";
        echo $content;
    }
    }
    ?>
    </div>
</form>
        </div>
        <div id="footer">
        </div>
    </div>


</body>
</html>