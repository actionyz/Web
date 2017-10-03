<?php
ini_set('display_errors', false);
header('Content-Type: text/html; charset=utf-8');
define('IN_APP', true);
define('CACHE_DIR', changedir(__DIR__ . '/cache/'));
$DBHOST="127.0.0.1";
$DBUSER="root";
$DBPASS="111111";
$DBNAME='ctf';

function get_db($username,$password)
{

    echo 1;
    global $DBHOST, $DBUSER, $DBPASS,$DBNAME;
    $connect = mysql_connect($DBHOST, $DBUSER, $DBPASS) or die("Database connect error! Please connect the manager!");
    mysql_select_db($DBNAME) or die("Database error! Please connect the manager!");
     $result = mysql_query("select * from users where username='$username' and password='$password'");
    //$result = mysql_query("select * from yz");
    $row = mysql_fetch_array($result);
    return $row;
    
}

function is_login() {
    return !empty($_SESSION['username']);
}
function changedir($dir)
{
    return str_replace('/', DIRECTORY_SEPARATOR, $dir);
}
function is_valid($title, $data)
{
    $data = $title . $data;
    return preg_match('|\A[ _a-zA-Z0-9]+\z|is', $data);
}
function get_username()
{
    return $_SESSION['username'];
}
function clean_username($username)
{
    return preg_match('|\A[_a-zA-Z0-9]+\z|is', $username);
}
function write_cache($title, $content)
{
    $dir = changedir(CACHE_DIR . get_username() . '/');
    if(!is_dir($dir)) {
        mkdir($dir);
    }
    ini_set('open_basedir', $dir);

    if (!is_valid($title, $content)) {
        exit("title or content error");
    }

    $filename = "{$dir}{$title}.php";

    file_put_contents($filename, $content);
    ini_set('open_basedir', __DIR__ . '/');
}
function read_cache($title)
{
    $dir = changedir(CACHE_DIR . get_username() . '/');
    ini_set('open_basedir', $dir);
    $filename = "{$dir}{$title}.php";
    if(file_exists($filename)) {
        $data = file_get_contents($filename);
    } else {
        $data = '';
    }

    ini_set('open_basedir', __DIR__ . '/');
    return $data;
}
function get_list()
{
    $dir = changedir(CACHE_DIR . get_username() . '/');
    ini_set('open_basedir', $dir);

    $arr = [];
    foreach(glob($dir . '*.php') as $filename) {
        $title = substr(basename($filename), 0, -4);
        $arr[$title] = read_cache($title);
        if(count($arr) > 5) {
            break;
        }
    }
    ini_set('open_basedir', __DIR__ . '/');
    return $arr;
}
