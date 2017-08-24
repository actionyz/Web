<?php 
 
// 测试环境 linux + apache2  + php 
// 没有开rewrite ，所以写 .htaccess 没用
// 没有用cgi ，所以写 .user.ini 也没有 
// 要求 getshell 
// 修改配置文件，crontab之类的都是没权限的。 
 
$content = $_POST['content']; 
$filename = $_POST['filename']; 
$filename = "upload/".$filename;
 
if(preg_match('/.+\.ph(p[3457]?|t|tml)$/i', $filename)){
   die("Bad file extension");
}else{
    $f = fopen($filename, 'w');
    fwrite($f, $content);
    fclose($f);
}
?>