<?php

$link = mysql_connect('127.0.0.1','root','111111');
mysql_select_db('test', $link);
echo  "<center><h1>Welcome to my site</h1></center><br>";
$id = $_GET['id']?waf($_GET['id']):1;
$sql = "select * from yz  where b = $id";
echo var_dump($sql);
echo "<!--view source /source.php-->";
$row = mysql_fetch_array(mysql_query($sql));
echo var_dump($row);
if (empty($row) or mysql_error()){
        echo "<center>no content detail</center>".mysql_error();

}else{
        echo "<center><table border=1><tr><th>title</th><th>Content</th></tr><tr><td>${row['c']}</td><td>${row['d']}</td></tr></table></center>";

}


function waf($var){
    if(stristr($_SERVER['HTTP_USER_AGENT'],'sqlmap')){
            echo "<center>hacker<center>";
                die();

    }
    $var = preg_replace('/([^a-z]+)(union|from)/i', '&#160;$2', $var);
    return $var;

}
