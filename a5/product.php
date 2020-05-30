<?php
 session_start();  

 require 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title> Assignment 5</title>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="nav.css" />
</head>

<body>
	<nav id="navigtion" class="sticky">
      <ul>
	  <li><a class="nav-item nav-link" href="index.php"> Home </a></li>
		<li><a class="nav-item nav-link" href="category.php"> Product detail </a></li>
		<li><a class="nav-item nav-link" href="cart.php"> Cart</a></li>
        <li><a class="nav-item nav-link" href="contact.php"> Contact </a></li>
      </ul>
    </nav>
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<a href="">Sales</a> /
				<a href="">Shirt</a> /
				<span> Shirt for women  </span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
                <h3 style="text-align:center" id="title"> All products </h3> <br/>  
                     <div id="products" class="tab-pane fade in active">  
                     <?php  
                     $query1 = "SELECT * FROM tbl_product ORDER BY id ASC";  
                     $result1 = $conn->query($query1);  
                     while($row = $result1->fetch_assoc())  
                     {  
                     ?>  
					  <div class="container-fluid">  
           <div class="row">
                     <div class="col-md-3" id="brand<?=$row['brand']?>">  
                          <div style="background-color: #f2d9ff ;border: 1.2px solid #e072a6;  border-radius:8px; padding:15px;   margin-bottom: 20px">  
							   <img src="img/clothes/<?= $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info" style="text-align:center;">Name: <?= $row["name"]; ?></h4>  
							   <h5 class="text-danger" style="text-align:center;"> Brand: <?= $row["brand"]; ?></h5>  
                               <h5 class="text-danger" style="text-align:center;">Price: $ <?= $row["price"]; ?></h5>  
							   <div style="height: 150px; "> <p> <span class="text-danger"> Description:</span> <?= $row['description'];?></p> </div>
                               <input type="text" name="quantity" id="quantity<?= $row["id"]; ?>" class="form-control" value="1" />  
							   <input type="hidden" name="product_name" id="name<?= $row["id"]; ?>" value="<?= $row["name"]; ?>" />  
							   <input type="hidden" name="product_brand" id="brand<?= $row["id"]; ?>" value="<?= $row["brand"]; ?>" />  
                               <input type="hidden" name="product_price" id="price<?= $row["id"]; ?>" value="<?= $row["price"]; ?>" />  
                               <input type="button" name="cart_update" id="<?= $row["id"]; ?>" style="margin-top:10px; height: 42px; padding-bottom: 5px; color: white" class="btn btn-danger btn-block btn-lg form-control cart_update" value="Add to Cart" />  
						  </div>  
	
                     </div>  
                     <?php  
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
	<footer class="footer-section">
		<div class="container">
			<p class="copyright">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;
				<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
				with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
					target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script async defer src='filter.js'></script>
	<script async defer src='cart.js'></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>