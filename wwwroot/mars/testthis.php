<?php

// Define parameters for shell command
$letter = "Z";
$location = "\\FILES\MassAction";
$user = "SQLIIS@Domain";
$pass = "DT56DsI3lPgB18jg";

system("whoami");

system("dir \\\10.129.3.21\\MassAction\\'");
system("net use " . $letter . ": \"".$location."\" ".$pass." /user:".$user." /persistent:no>nul 2>&1");

opendir('//10.129.3.21/MassAction/');

$dir = opendir('X:/Macys');
readdir('X:/Macys');
?>