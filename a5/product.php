<?php   
session_start();  
require 'system/helper.php';
include("templates/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title> Assignment 5</title>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="nav.css" />
	<style>
		.description {
			margin-top: 30px
		}
		.description p {
			font-size: 25px
		}
		.des {
			color: #a3363d;
			font-family: 'Raleway', sans-serif;
		}
	
		.image img {
			width: 380px;
			margin-bottom: 10px
		}
		.image h2 {
			text-align: center;
			font-family: cursive; 
			color: #b249c9;
			font-size: 40px;
			padding-left: 50px
		}
	</style>
</head>
<body>
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a> /
			
				<a href="">Shirt</a> /
				<span> Shirt for women  </span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<br/>
	<div class="container-fluid">
	<div class="row">
			
			<div class="col-lg-3">
					
			<?php 
			if (isset($_GET["pid"])){
			$pid = $_GET["pid"];
			//  echo $pid;
			$sql = "SELECT * FROM tbl_product WHERE id='$pid'";
			$result = $conn->query($sql);  
				 while($row = $result->fetch_assoc())  
				 {  
				   $brand = $row['brand'];
				   $name = $row['name'];
				   $price = $row['price'];
				   $description = $row['description'];
				   $image = $row['image'];
				   ?>
				    <div class="image">
					   <div> <h2 style="text-align: center">  <?=$name?> </h2> </div>

					  	<img src='assets/img/clothes/<?=$image?>'/>
					
		<?php
			}
		}
		?>
		<?php 
			if (isset($_GET["pid"])){
			$pid = $_GET["pid"];
			//  echo $pid;
			$sql = "SELECT * FROM tbl_product WHERE id='$pid'";
			$result = $conn->query($sql);  
				 while($row = $result->fetch_assoc())  
				 {  
					$image = $row['image'];
					?>
		</div>	
	</div>
	<?php }  } ?>
	<div class="col-lg-1">	
	</div>
				<div class="col-lg-8">		
						<?php 
						if (isset($_GET["pid"])){
							$pid = $_GET["pid"];
							//  echo $pid;
							$sql = "SELECT * FROM tbl_product WHERE id='$pid'";
							$result = $conn->query($sql);  
							   while($row = $result->fetch_assoc())  
							   {  
								 $brand = $row['brand'];
								 $name = $row['name'];
								 $price = number_format($row['price'], 2);
								 $description = $row['description'];
								 $image = $row['image'];
								 ?>
								 <div class="description">
								<p> <span class="des"><b> Description: </b></span> <?= $description ?> </p>
								<br/>
								<h4 > <span style="font-family: 'Raleway', sans-serif; font-size: 30px ; color: #a3363d"> Price: </span> <?=$price?> </h4> 
								<br/>
								<br/>
								<h4 class="text-danger"> <span  style="font-family: cursive; font-size: 30px ;" > Flash Sale </span> <span style="color: grey ;font-size: 21px"> <i> Begin after 17:00 </i></span> </h4> 
								<input type="hidden" name="product_name" id="name<?= $row["id"]; ?>" value="<?= $row["name"]; ?>" />  
								<input type="hidden" name="product_brand" id="brand<?= $row["id"]; ?>" value="<?= $row["brand"]; ?>" />  
								<input type="hidden" name="product_price" id="price<?= $row["id"]; ?>" value="<?= $row["price"]; ?>" />  
								<br/>
								<div class="col-lg-5">	
								<input type="text" name="quantity" id="quantity<?= $row["id"]; ?>" class="form-control" value="1" />  
								<input type="button" name="cart_update" id="<?= $row["id"]; ?>" style="margin-top:10px; height: 42px; padding-bottom: 5px; color: white;" class="btn btn-danger btn-block btn-lg form-control cart_update" value="Add to Cart" />  	
								</div>
								</div>
					  <?php
							  }
							  }
				?>
				</div>
				


			</div>
</div>
	<!-- Page end -->


	<!-- Footer top section -->
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="img/logo.png" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus
							urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="img/cards/5.png" alt="">
							<img src="img/cards/4.png" alt="">
							<img src="img/cards/3.png" alt="">
							<img src="img/cards/2.png" alt="">
							<img src="img/cards/1.png" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Your Company Ltd </p>
							<p>1481 Creekside Lane Avila Beach, CA 93424, </p>
							<p>+53 345 7953 32453</p>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->


	<!-- Footer section -->
	<?php  include("templates/footer.php"); ?>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script async defer src='filter.js'></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>