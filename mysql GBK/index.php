<?php
header("Content-Type: text/html;charset=gbk");


function sql_get($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    $ret = array();
    while ($ret[] = @mysqli_fetch_assoc($result));
    echo var_dump($ret);
    return $ret;
}

$a = addslashes($_GET['a']);
$b = addslashes($_GET['b']);

$conn=mysqli_connect('127.0.0.1','root','','test');
if (!$conn) {   
  die('Could not connect to MySQL: ' . mysqli_error());   
} 
$conn->query("SET NAMES 'gbk'");



echo "select * from yz where b='$a' and c='$b'";
echo var_dump(sql_get("select * from yz where b='$a' and c='$b'"));
echo var_dump(sql_get("show variables like \"%char%\""));
mysqli_query($conn,"insert into yz(`a`,`b`,`c`) values('$a',1,1)");
// echo "誠";
