<?php 

#!php 
# GOAL: overwrite password for admin (id=1) 
#       Try to login as admin 
# $yourInfo=array( //this is your user data in the db 
#   'id'    => 8, 
#   'name'  => 'jimbo18714', 
#   'pass'  => 'MAYBECHANGED', 
#   'level' => 1 
# ); 

$link=new mysqli("localhost","root","root","test") or die("有错误".mysql_error());
function mres($str) { 
    return @mysql_real_escape_string($str); 
}
$userInfo = @unserialize($_GET['userInfo']); 

$query = 'SELECT * FROM users WHERE id = \''.'1'.'\' AND pass = \''.'root'.'\''; 

$result = $link->query($query);  
echo var_dump($result);
if(!$result  || $result->num_rows<1 ){ 
    die('Invalid password!'); 
}
$row = @mysqli_fetch_assoc($result);

// echo  $row['name'];

foreach($row as $key => $value){ 
    $userInfo[$key] = $value; 
}
// echo var_dump($userInfo); 
$oldPass = @$_GET['oldPass'];
$newPass = @$_GET['newPass'];
// echo $oldPass,$userInfo['pass'];
if($oldPass == $userInfo['pass']){ 
    $userInfo['pass'] = $newPass; 
    $query = 'UPDATE users SET pass = \''.mres($newPass).'\' WHERE id = \''.mres($userInfo['id']).'\';'; 
    $result = $link->query($query);  
    // mysql_query($query); 
    echo 'Password Changed.'; 
}
else{ 
    echo 'Invalid old password entered.'; 
}

?>