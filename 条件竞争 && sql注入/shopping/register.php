<?php
include "conn/common.php";
include "header.php";
if(!empty($_POST['username']) && !empty($_POST['password']&&isset($_POST['submit'])))
{
    $username = $_POST['username'];
    $password = md5($_POST['password'].$salt);
    if($ret = sql_get("select * from users where name='{$username}'"))
    {
        echo "<script>alert('Username has used！');</script>";
//        echo "<script>alert('Username has used！');</script>";
    }
    else
    {
        sql_get("INSERT INTO `users`(`name`, `pass`, `money`,`level`) VALUES ('$username','$password',100,1)");
        sql_get("update users set level=0 where name = '$username'");
        sql_get("INSERT INTO `have`(`name`, `article1`, `article2`, `article3`, `article4`, `article5`,`article6`,`TS`) VALUES ('$username',0,0,0,0,0,0,0)");
        echo "<script>alert('register success!');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

}

?>
<!--content-->
<div class=" container">
<div class=" register">
	<h1>Register</h1>
		  	  <form method="post">
				 <div class="col-md-6 register-top-grid">
					<h3>Personal infomation</h3>
					 <div>
						<span>First Name</span>
						<input type="text" name="username"> 
					 </div>
					
					 
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="col-md-6 register-bottom-grid">
						    <h3>Login information</h3>
							 <div>
								<span>Password</span>
								<input type="password" name="password" >
							 </div>
							 <input type="submit" name="submit">
							
					 </div>
					 <div class="clearfix"> </div>
				</form>
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
			