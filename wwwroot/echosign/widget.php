<!DOCTYPE html>
<!-- saved from url=(0034)http://localhost:18285/Home/Widget -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Widget</title>
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
            
            

<h2>
    Widget</h2>
<script type="text/javascript">
    $(document).ready(function () {
        $('#createWidget').live("click", function (e) {
            var file1 = $('#widgetfile').val();
            if (file1 == "" ) {
                e.preventDefault();
                $('#errorWidgetFile').css("color", "red");
            }
            else {
                $('#errorWidgetFile').css("color", "black");
            }
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
            var name = $('#name').val();
            if (name == "") {
                e.preventDefault();
                $('#errorname').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorname").offset().top - 100
                }, 100);
            }
            else {
                $('#errorname').css("color","black");
            }
            var email=$('#Email').attr("value");
            var pass=$('#Password').attr("value");
            if(email!="" && pass=="") {
                 e.preventDefault();
                $('#errorPassword').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorPassword").offset().top - 100
                }, 100);
            }
            else {
                $('#errorPassword').css("color","black");
            }
            if(email=="" && pass!="") {
                 e.preventDefault();
                $('#errorEmail').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorEmail").offset().top - 100
                }, 100);
            }
            else {
                $('#errorEmail').css("color","black");
            }
            var secpass=$('#sopassword').attr("value");
            var check1=$('#soprotectOpen').is(":checked");  
            var check2=$('#soprotectSignature').is(":checked");
            if(secpass!="" && !check1 && !check2) {
                 e.preventDefault();
                $('#errorSecPass').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorSecPass").offset().top - 100
                }, 100);
            }
            else if((check1 || check2) && secpass=="") {
                 e.preventDefault();
                $('#errorSecPass').css("color","red");
               
                $('html, body').animate({
                    scrollTop: $("#errorSecPass").offset().top - 100
                }, 100);
            }
            else {
                $('#errorSecPass').css("color","black");
            }
        });
    });
</script>
<?php
if(isset($_REQUEST['widget'])) {
    include("classes/EchoSignApiClient.class.php");
    $query=new EchoSignApiClient();
    $result=$query->createEmbeddedWidget($_REQUEST['ApiKey'], $_REQUEST['MergeFieldsNames'], $_REQUEST['MergeFieldsValues'], $_FILES, $_REQUEST['UserKey'], $_REQUEST['Email'], $_REQUEST['Password'], $_REQUEST['name'], $_REQUEST['SignatureFlow'], $_REQUEST['Locale'], $_REQUEST['CallBackUrl'], $_REQUEST['sopassword'], $_REQUEST['soprotectSignature'], $_REQUEST['soprotectOpen'], $_REQUEST['wcurl'], $_REQUEST['wcdelay']);
    echo "Document key: ".$result->documentKey."<br />";
    echo $result->javascript;
 ?>
 <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" enctype="multipart/form-data" method="post">     <table style="width: 100%;">
 <input name="documentkey" type="hidden" value="<?php echo $result->documentKey;?>">
<input name="ApiKey" type="hidden" value="<?php echo $_REQUEST['ApiKey'];?>">
 <input type="submit" value="Get form data"  name="getdata">
    
<?php
}  
elseif (isset($_REQUEST['getdata'])) {
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
else {
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" enctype="multipart/form-data" method="post">     <table style="width: 100%;">
        <tbody><tr>
            <td class="sendDocCell">
                <p>
                    <b>Required fields</b></p>
            </td>
            <td class="sendDocCell">
                <p>
                    <b>Optional fields</b></p>
            </td>
        </tr>
        <tr>
            <td class="sendDocCell">
                <div style="height: 1100px;">
                <fieldset>

                        <legend title="The personal API access key that you've been assigned.">Api key</legend>

                  <p title="The personal API access key that you&#39;ve been assigned." class="required" id="errorkey">Api key</p>
                    <input id="ApiKey" name="ApiKey" type="text" value="">
                    </fieldset>

                    <br>
                    <br>
                    <fieldset>

                        <legend>Widget info</legend>

                    <p class="required"  class="required" id="errorname">Name</p>
                    <div class="editor-field">
                        <input data-val="true" data-val-required="Name is required." id="name" name="name" type="text" value="">
                        <span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                    </div>
                    
                    <br>
                    
                   
                     <fieldset>

                            <legend title="Selects which workflow you'd like to use - whether the signer needs to sign before the recipient, after the recipient, or not at all"

                                class="required">Signature flow</legend>

                    <input checked="checked" data-val="true" data-val-required="The SignatureFlow field is required." id="SignatureFlow" name="SignatureFlow" type="radio" value="SENDER_SIGNATURE_NOT_REQUIRED">
                    <span>Sender signature not required</span><br>
                    
<!--                    <input id="SignatureFlow" name="SignatureFlow" type="radio" value="SENDER_SIGNS_FIRST">
                    <span>Sender signs first</span><br>-->
                    
                    <input id="SignatureFlow" name="SignatureFlow" type="radio" value="SENDER_SIGNS_LAST">
                    <span>Sender signs last</span><br>
                     </fieldset>
 <fieldset>

                            <legend class="required" title="A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out.">

                                Select document(s)</legend>

                    <p class="required" id="errorFile">Select document(s)</p>
                    
                    <input type="file" name="file1" value="Select" id="file1">
                    <br>
                    <input type="file" name="file2" value="Select" id="file2">
                    <br>
                    <input type="file" name="file3" value="Select" id="file3">
                    </fieldset>

                    </fieldset>
                </div>
            </td>
            <td class="sendDocCell">
                <div style="height: 1100px">
                    
                   
                    
                   <fieldset>

                        <legend title="Information about the sender of the agreement. If one is not provided, the agreement is sent from the user for whom the API access key was provisioned. Please see our Single Sign On documentation for more information.">Sender Info</legend>


                    <p>User key</p>
                    <input id="UserKey" name="UserKey" type="text" value="">
                   
                   <p class="required" id="errorEmail">Email</p>
                    <input id="Email" name="Email" type="text" value="">
                   
                    <p class="required" id="errorPassword">Password</p>
                    <input id="Password" name="Password" type="password">
                     </fieldset>

                    <br>
                    <br>
                <fieldset>

                        <legend>Additional fields</legend>

                    <p>
                        Call back url</p>
                    <input id="CallBackUrl" name="CallBackUrl" type="text" value="">
                    
                    <p>Language</p>
                    <input id="Locale" name="Locale" type="text" value="">
                    <br>
                    
                    <p>Merge Fields Names (separate by ';')</p>
                    <textarea cols="20" id="MergeFieldsNames" name="MergeFieldsNames" rows="2"></textarea>
                    <br>
                    
                    <p>Merge Fields Values (separate by ';')</p>
                    <textarea cols="20" id="MergeFieldsValues" name="MergeFieldsValues" rows="2"></textarea>
                    <br>
                    </fieldset>
                    <fieldset>

                        <legend title="Sets optional secondary security parameters for your document.">Security

                            options</legend>

                    <p class="required" id="errorSecPass">Password (if it's filled, at least one of checkboxes below should be checked)</p>
                    <input name="sopassword" id ="sopassword" type="password">
                    <br><input name="soprotectOpen" type="hidden" value="false">
                    <input name="soprotectOpen" id="soprotectOpen" type="checkbox" value="true"><span>Protect open</span>
                    <br><input name="soprotectSignature" type="hidden" value="false">
                    <input name="soprotectSignature" id="soprotectSignature" type="checkbox" value="true"><span>Protect signature</span> </fieldset>

                    <br>

                    <fieldset>

                        <legend title="URL and associated properties for the success page the user will be taken to after filling out the widget">

                            Widget completion info</legend>

                    <p>Url</p>
                    <input id="WidgetCompletionInfo_url" name="wcurl" type="text">
                    <br><input name="WidgetCompletionInfo.deframe" type="hidden" value="false">
                    <!--<input data-val="true" data-val-required="The deframe field is required." id="wcdeframe" name="wcdeframe" type="checkbox" value="true"><span>Is deframe</span>-->
                    <p>Delay</p>
                    <input value="0" data-val="true" data-val-number="The field delay must be a number." data-val-required="The delay field is required." id="wcdelay" name="wcdelay" type="text">
                    </fieldset>

                    <br>

                </div>
            </td>
        </tr>
    </tbody></table>
    <br>
    <input type="submit" value="Create Widget" id="createWidget" name="widget">
</form>

        </div>
        <div id="footer">
        </div>
    </div>


</body></html>
<?php
}
?>