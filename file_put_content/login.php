<?php
require_once "common.php";
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
$error = '';

if($username && $password){
    $db = get_db($username,$password);
    var_dump($db);
    if($db!=false&&array_key_exists('username', $db)&&array_key_exists('password', $db)){
        session_start();
        $_SESSION['username'] = clean_username($db['username']);
        header("Location: index.php");
        exit;
    }
    else{
        $error='username or password error!';
    }
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>61D财务中心</title>

  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bendawang.css">

</head>

<body>
  <div class="login">
  <h1>Login</h1>
    <div class="col-sm-offset-2">
           <?php if ($error): ?>
           <p class="text-danger"><?=$error?></p>
           <?php endif; ?>
    </div>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">SignIn</button>
    </form>
</div>

    <script src="js/index.js"></script>

</body>
<script src="js/prefixfree.min.js"></script>
</html>
