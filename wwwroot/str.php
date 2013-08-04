<?php
//check if post is submitted
if (!$_POST['submit']) {
//form not submitted show form
//entry field
echo '<form action="'.$SERVER['PHP_SELF'].'" method="post">';
echo 'Enter a string or a number containing commas, example 15,020: ';
echo '<input type="text" name="entry" size="20">';
echo '<br />';
echo '<input type="submit" name="submit" value="Submit">';
echo '</form>';
}
else {
//form submitted get data
$entry=trim($_POST['entry']);
//replace comma with space
$entry = str_replace(",", "",$entry);
//echo to the browser
echo '<br />'.$entry;
}
?>