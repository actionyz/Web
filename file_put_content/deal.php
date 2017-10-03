<?php
require_once "common.php";
session_start();
if(!is_login()) {
    header("Location: login.php");
    exit;
}

$title = isset($_POST['title'])?$_POST['title']:"";
$content =isset($_POST['content'])?$_POST['content']:"";

if($title && $content) {
    write_cache($title, $content);
}

header('Location: index.php');
