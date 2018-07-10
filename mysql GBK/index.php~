<?php
header("Content-Type: text/html;charset=gbk");
$a = ($_GET['a']);
$b = addslashes($_GET['b']);
echo strlen($a);
echo "select * from yz where b='$a' and c='$b'";
error_reporting(1);
$conn=mysqli_connect('127.0.0.1','root','','test');
if (!$conn) {   
  die('Could not connect to MySQL: ' . mysqli_error());   
} 
// $conn->query("SET NAMES 'utf8'");
$conn->query("SET character_set_client = gbk");
$conn->query("SET character_set_connection = utf8");
$conn->query("SET character_set_results = gbk");
// mysql_query("set character set 'utf8'");//读库 
// mysql_query("set names 'utf8'");//写库 
function sql_get($sql){
        global $conn;
        $result = mysqli_query($conn,$sql);
        $ret = array();
        while ($ret[] = @mysqli_fetch_assoc($result));
        echo var_dump($ret);
        return $ret;
    }

echo var_dump(sql_get("select * from yz where b='$a' and c='$b'"));
echo var_dump(sql_get("show variables like \"%char%\""));
mysqli_query($conn,"insert into yz(`a`,`b`,`c`) values('$a',1,1)");
// echo "誠";
