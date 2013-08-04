<?php
set_time_limit(0);
 
function getmicrotime() {
   list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
} 
 
$time_start = getmicrotime();
 
// algorithm of hash
// see http://php.net/hash_algos for available algorithms
define('HASH_ALGO', 'md5');
 
// max length of password to try
define('PASSWORD_MAX_LENGTH', 8);
 
$charset = 'abcdefghijklmnopqrstuvwxyz';
$charset .= '0123456789';
$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charset .= '~`!@#$%^&*()-_\/\'";:,.+=<>? ';
$str_length = strlen($charset);
 
 
// If no arguments given present usage info
//originally:
#if ($_SERVER["argc"] < 1) {
if ($_GET['hash'] < 1) {
  print "Usage: attack.php <hash>\n";
  exit;
}
 
// Get MD5 checksum from command line
//originally:
#$hash_password = $_SERVER["argv"][1];
$hash_password = $_GET['hash'];
 
function check($password)
{
        global $hash_password, $time_start;     
 
        if (hash(HASH_ALGO, $password) == $hash_password) {
 
                echo "\n\n" . "FOUND MATCH, password: " . $password . "\n\n";
                $time_end = getmicrotime();
                $time = $time_end - $time_start; 
                echo "Found in " . $time . " seconds\n";
                exit;
        }
}
 
 
function recurse($width, $position, $base_string)
{
        global $charset, $str_length;
 
        for ($i = 0; $i < $str_length; ++$i) {
                if ($position  < $width - 1) {
                        recurse($width, $position + 1, $base_string . $charset[$i]);
                }
                check($base_string . $charset[$i]);
        }
}
 
echo "Target hash: " . $hash_password . "\n";
for ($i = 1; $i < PASSWORD_MAX_LENGTH + 1; ++$i) {
        echo "\n" . "Checking passwords with length:" .$i;
        $time_check = getmicrotime();
        $time = $time_check - $time_start;
        echo "\n" . "Runtime: " . $time . " seconds";
        recurse($i, 0, '');
}
 
echo "Execution complete, no password found\r\n";
?>