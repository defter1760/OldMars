<?php 
class ftp{ 
    public $conn; 

    public function __construct($url){ 
        $this->conn = ftp_connect($url); 
    } 
    
    public function __call($func,$a){ 
        if(strstr($func,'ftp_') !== false && function_exists($func)){ 
            array_unshift($a,$this->conn); 
            return call_user_func_array($func,$a); 
        }else{ 
            // replace with your own error handler. 
            die("$func is not a valid FTP function"); 
        } 
    } 
} 
?>
<?php

// set up basic connection
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir = '/test_folder/bob';
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// get contents of the current directory
$contents = ftp_nlist($conn_id, ".");

ftp_mkdir($conn_id, $dir);

// output $contents
#var_dump($contents);



?>