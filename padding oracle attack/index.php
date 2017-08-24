<?php 
error_reporting(0);
define("SECRET_KEY", "1234567812345678");
define("METHOD", "aes-128-cbc");
$token = '1234567890123456';
$j = 'flag{111111111}';

if ($_GET['a']) {
    $e = hex2bin($_GET['a']);
    $token = $_GET['token'];
    
    if(openssl_decrypt($e, METHOD, SECRET_KEY, OPENSSL_RAW_DATA, $token ))
    {
        echo "congratulation",openssl_decrypt($e, METHOD, SECRET_KEY, OPENSSL_RAW_DATA, $token );
    }
    else
    {
        echo "decrypt failed";
    }
}
else
{
echo openssl_encrypt($j, METHOD, SECRET_KEY, OPENSSL_RAW_DATA, $token );
 }

 ?>
