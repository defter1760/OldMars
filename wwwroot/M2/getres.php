
<?php
if(isset($_COOKIE["users_resolution"]))
$screen_res = $_COOKIE["users_resolution"];
else //means cookie is not found set it using Javascript
{
echo "\n";
echo "<script language=\"javascript\">";
echo "\n";
echo "writeCookie();";
echo "\n";
echo "function writeCookie()";
echo "\n";
echo "{";
    echo "\n\t";
    echo "var today = new Date();";
    echo "\n\t";
    echo "var the_date = new Date(\"December 31, 2023\");";
    echo "\n\t";
    echo "var the_cookie_date = the_date.toGMTString();";
    echo "\n\t";
    echo "var the_cookie = \"users_resolution=\"+ screen.width +\"x\"+ screen.height;";
    echo "\n\t";
    echo "var the_cookie = the_cookie + \";expires=\" + the_cookie_date;";
    echo "\n\t";
    echo "document.cookie=the_cookie";
echo "}";
echo "</script>";

}

echo "Your screen resolution is set at ". $screen_res;
?>
