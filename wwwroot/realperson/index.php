<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<style type="text/css">

@import "css/jquery.realperson.css";

label { display: inline-block; width: 20%; }

.realperson-challenge { display: inline-block }

</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.realperson.js"></script>

<script type="text/javascript">

$(function() {

	$('#defaultReal').realperson();
        $('#defaultReal').realperson({length: 4});

});

</script>
</head>
<h1>jQuery Real Person</h1>

<p>This page demonstrates the very basics of the

	<a href="http://keith-wood.name/realPerson.html">jQuery Real Person plugin</a>.

	It contains the minimum requirements for using the plugin and

	can be used as the basis for your own experimentation.</p>

<p>For more detail see the <a href="http://keith-wood.name/realPersonRef.html">

	documentation reference</a> page.</p>

<form action="jquery.realperson.php" method="post">

	<p><label>Other fields:</label><input type="text" id="field"></p>
<br><br>
	<p><label>Please enter the letters displayed:</label>

		<input type="text" id="defaultReal" name="defaultReal"></p>

	<p style="clear: both;"><label>&nbsp;</label><input type="submit" value="Submit"></p>

</form>





</body>

</html>