<!DOCTYPE html>
<!-- saved from url=(0023)http://localhost:18285/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Home Page</title>
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
                </ul>
            </div>
        </div>
        <div id="main">
<script type="text/javascript">
    $(document).ready(function () {
        $('#sendDocSubmit').live("click", function (e) {
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
                });
    });
  
</script>
 <fieldset>
    <legend>Ping</legend>
<div id="tabs">  
    <div id="general-tab">
    <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
     <p title="The personal API access key that you&#39;ve been assigned." class="required" id="errorkey">Api key</p>
                    <input id="ApiKey" name="ApiKey" type="text" value="">
                    <br>
                    <br>
        <input name="pingButton" type="submit" value="Test Ping" id="sendDocSubmit">
         <div id="pingResult">
<?php
if (isset($_REQUEST['pingButton'])) {
    include("classes/EchoSignApiClient.class.php");
    $query=new EchoSignApiClient();
    echo "Result: ".$query->testPing($_REQUEST['ApiKey']);
}
?>
</div>
    </form>
    </div>
   
    </fieldset>

</div>

        </div>
        
    </div>


</body></html>