<? session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
</head>
<body>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="search">
					<form>
						<input type="text" value="Search " onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="Go">
					</form>
			</div>
            <?php
            if (isset($_GET['logout']))
            {
                session_start();
                session_unset();
                session_destroy();
//                var_dump($_SESSION);

                header( 'Location: login.php' ) ;
            }


            ?>
			<div class="header-left">		
					<ul>
                        <li ><a href="header.php?logout=1"  >Logout</a></li>
						<li ><a href="login.php"  >Login</a></li>
						<li><a  href="register.php"  >Register</a></li>
                        <li><a  href="#"  >username:<? echo $_SESSION['username'];?></a></li>
					</ul>
					<div class="cart box_1">
<!--						<a href="checkout.php">-->
						<h3>
                            <div class="total"><? echo 'total:$'.$_SESSION['money'];?>
							    </div>

							<img src="images/cart.png" alt=""/></h3>
						</a>


					</div>
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>	
				</div>
		  <div class=" h_menu4">
				<ul class="memenu skyblue">
					  <li class="active grid"><a class="color8" href="index.php">Home</a></li>	
				      <li><a class="color1" href="#">Men</a>
				      	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.php">Accessories</a></li>
										<li><a href="products.php">Bags</a></li>
										<li><a href="products.php">Caps & Hats</a></li>
										<li><a href="products.php">Hoodies & Sweatshirts</a></li>
										<li><a href="products.php">Jackets & Coats</a></li>
										<li><a href="products.php">Jeans</a></li>
										<li><a href="products.php">Jewellery</a></li>
										<li><a href="products.php">Jumpers & Cardigans</a></li>
										<li><a href="products.php">Leather Jackets</a></li>
										<li><a href="products.php">Long Sleeve T-Shirts</a></li>
										<li><a href="products.php">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.php">Shirts</a></li>
										<li><a href="products.php">Shoes, Boots & Trainers</a></li>
										<li><a href="products.php">Shorts</a></li>
										<li><a href="products.php">Suits & Blazers</a></li>
										<li><a href="products.php">Sunglasses</a></li>
										<li><a href="products.php">Sweatpants</a></li>
										<li><a href="products.php">Swimwear</a></li>
										<li><a href="products.php">Trousers & Chinos</a></li>
										<li><a href="products.php">T-Shirts</a></li>
										<li><a href="products.php">Underwear & Socks</a></li>
										<li><a href="products.php">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="products.php">Levis</a></li>
										<li><a href="products.php">Persol</a></li>
										<li><a href="products.php">Nike</a></li>
										<li><a href="products.php">Edwin</a></li>
										<li><a href="products.php">New Balance</a></li>
										<li><a href="products.php">Jack & Jones</a></li>
										<li><a href="products.php">Paul Smith</a></li>
										<li><a href="products.php">Ray-Ban</a></li>
										<li><a href="products.php">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					</li>
				    <li class="grid"><a class="color2" href="#">	Women</a>
					  	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.php">Accessories</a></li>
										<li><a href="products.php">Bags</a></li>
										<li><a href="products.php">Caps & Hats</a></li>
										<li><a href="products.php">Hoodies & Sweatshirts</a></li>
										<li><a href="products.php">Jackets & Coats</a></li>
										<li><a href="products.php">Jeans</a></li>
										<li><a href="products.php">Jewellery</a></li>
										<li><a href="products.php">Jumpers & Cardigans</a></li>
										<li><a href="products.php">Leather Jackets</a></li>
										<li><a href="products.php">Long Sleeve T-Shirts</a></li>
										<li><a href="products.php">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.php">Shirts</a></li>
										<li><a href="products.php">Shoes, Boots & Trainers</a></li>
										<li><a href="products.php">Shorts</a></li>
										<li><a href="products.php">Suits & Blazers</a></li>
										<li><a href="products.php">Sunglasses</a></li>
										<li><a href="products.php">Sweatpants</a></li>
										<li><a href="products.php">Swimwear</a></li>
										<li><a href="products.php">Trousers & Chinos</a></li>
										<li><a href="products.php">T-Shirts</a></li>
										<li><a href="products.php">Underwear & Socks</a></li>
										<li><a href="products.php">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="products.php">Levis</a></li>
										<li><a href="products.php">Persol</a></li>
										<li><a href="products.php">Nike</a></li>
										<li><a href="products.php">Edwin</a></li>
										<li><a href="products.php">New Balance</a></li>
										<li><a href="products.php">Jack & Jones</a></li>
										<li><a href="products.php">Paul Smith</a></li>
										<li><a href="products.php">Ray-Ban</a></li>
										<li><a href="products.php">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
			    </li>
		
			  </ul> 
			</div>
				
				<div class="clearfix"> </div>
		</div>
		</div>

	</div>

	<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>
					
						<div class="banner-text">
							<h3>Lorem Ipsum is not simply dummy  </h3>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
						<a href="products.php">Learn More</a>
						</div>
				
				</li>
				<li>
					
						<div class="banner-text">
							<h3>There are many variations </h3>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
												<a href="single.php">Learn More</a>

						</div>
					
				</li>
				<li>
						<div class="banner-text">
							<h3>Sed ut perspiciatis unde omnis</h3>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
								<a href="single.php">Learn More</a>

						</div>
					
				</li>
			</ul>
		</div>

	</div>
	</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
<? if ($_SESSION['level']==1) echo "flag{register_login_faster};" ?>