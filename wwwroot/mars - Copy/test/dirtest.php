<?PHP
$brandname = "Macys";
$filename = "Signer, Retainer - 76H29RT3LQJU48X5M";
//$ftp_server = '10.129.3.21';
//$ftp_user_name = 'sqlsrv';
//$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
#$file = "$filename" . "$ext";
#$file2 = "$filename2" . "$ext";
//$conn_id = ftp_connect($ftp_server);
//$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
//ftp_mkdir($conn_id, $dir3);
//ftp_chdir($conn_id, $dir3);
//ftp_put($conn_id, $file2, $file2, FTP_BINARY);
//ftp_close($conn_id);
//unlink($file2);

if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$dir3.''))
{
    echo 'Exists';
}
else
{
    echo 'Not exists!';
}
?>