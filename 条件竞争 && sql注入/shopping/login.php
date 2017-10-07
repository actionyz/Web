
<?php

include "conn/common.php";
include "header.php";
if(isset($_POST['sub']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password'].$salt);
    if($ret = sql_get("select * from users where name='{$username}' and pass='{$password}'")[0])
    {
//    	unset($_SESSION);
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $ret['level'];
        $_SESSION['money'] = $ret['money'];
        $_SESSION['buy'] = 0 ;//buy锁
        $_SESSION['sale'] = 0;//sale锁
        echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('error!');</script>";
    }

}

?>

<div class="container">
		<div class="account">
		<h1>Account</h1>
		<div class="account-pass">
		<div class="col-md-8 account-top">
			<form method="post">
				
			<div> 	
				<span>Username</span>
				<input type="text" name="username">
			</div>
			<div> 
				<span >Password</span>
				<input type="password" name="password">
			</div>				
				<input type="submit" value="Login" name="sub">
			</form>
		</div>
		<div class="col-md-4 left-account ">
			 <img class="img-responsive " src="images/1.png" alt=""> 
			<div class="five">
			<h2>25% </h2><span>discount</span>
			</div>
			
<div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
	</div>
	</div>

</div>

<!--//content-->
<div class="footer">
				<div class="container">
			<div class="footer-top-at">
			
				<div class="col-md-4 amet-sed">
				<h4>MORE INFO</h4>
				<ul class="nav-bottom">
						<li><a href="#">How to order</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Location</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Membership</a></li>	
					</ul>	
				</div>
				<div class="col-md-4 amet-sed ">
				<h4>CONTACT US</h4>
				
					<p>
Contrary to popular belief</p>
					<p>The standard chunk</p>
					<p>office:  +12 34 995 0792</p>
					<ul class="social">
						<li><a href="#"><i> </i></a></li>						
						<li><a href="#"><i class="twitter"> </i></a></li>
						<li><a href="#"><i class="rss"> </i></a></li>
						<li><a href="#"><i class="gmail"> </i></a></li>
						
					</ul>
				</div>
				<div class="col-md-4 amet-sed">
					<h4>Newsletter</h4>
					<p>Sign Up to get all news update
and promo</p>
					<form>
						<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
						<input type="submit" value="Sign up">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-class">
		<p >Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
		</div>
</body>
</html>
			