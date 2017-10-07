<?
session_start();
$salt = "4ct10n";
$_POST['username'] = addslashes($_POST['username']);
$_POST['password'] = addslashes($_POST['password']);

error_reporting(1);
$conn=mysqli_connect('127.0.0.1','root','111111','shop');
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_error());
}
$conn->query("SET NAMES 'utf8'");
// mysql_query("set character set 'utf8'");//读库
// mysql_query("set names 'utf8'");//写库
function sql_get($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    $ret = array();
    while ($ret[] = @mysqli_fetch_assoc($result));
    array_pop($ret);
    return $ret;
}
$price = 1;
$have = 1;
function fresh()
{
    global $price,$have;
    $_SESSION['money'] = sql_get("select money from users where name='$_SESSION[username]'")[0]['money'];
    $price = sql_get("select * from have where name='price'")[0];
    $have = sql_get("select * from have where name='$_SESSION[username]'")[0];
}

fresh();
//echo var_dump(sql_get("SELECT `name`, `pass`, `money` FROM `users` WHERE 1"));