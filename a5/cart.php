
<?php 
session_start();
require 'config.php';
if(isset($_POST["cart_update"]))
{
	if(isset($_SESSION["cart"]))
	{
		$purchaseArr_id = array_column($_SESSION["cart"], "pid");
		if(!in_array($_GET["id"], $purchaseArr_id))
		{
			$count = count($_SESSION["cart"]);
			$purchaseArr = array(
				'pid'			=>	$_GET["id"],
				'pbrand'	=>	$_POST["product_brand"],


				'pname'			=>	$_POST["product_name"],
				'price'		=>	$_POST["product_price"],
				'pquantity'		=>	$_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $purchaseArr;
		}
		
	}
	else
	{
		$purchaseArr = array(
			'pid' =>	$_GET["id"],
			'pbrand'	=>	$_POST["product_brand"],

			'pname' => $_POST["product_name"],
			'price'	=> $_POST["product_price"],
			'pquantity' => $_POST["quantity"]
		);
		$_SESSION["cart"][0] = $purchaseArr;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["pid"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Assignment 5 </title>
	<meta charset="UTF-8">
	<meta name="description" content="The Plaza eCommerce Template">
	<meta name="keywords" content="plaza, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="./nav.css" />

	<link rel="stylesheet" href="css/animate.css" />
	<style>
		 input[type="text"] { 
    width:250px; 
    height: 35px;
    margin:5px 0px; 
    border: grey 1px solid;
    border-radius: 8px;
} 
input[type="email"] { 
  width:250px; 
  height: 35px;
  margin:5px 0px; 
  border: grey 1px solid;
  border-radius: 8px;
} 
input[type="tel"] { 
  width:250px; 
  height: 35px;
  margin:5px 0px; 
  border: grey 1px solid;
  border-radius: 8px;
} 
input[type="month"] { 
  width:250px; 
  height: 35px;
  margin:5px 0px; 
  border: grey 1px solid;
  border-radius: 8px;
} 
.legend{
  margin-left: 3%; 
  margin-right: 0; 
  padding-left: 2%; 
  padding-right: 2%; 

  width: inherit;
}



.order-btn {
  display: flex;
  justify-content: center;
  padding: 0px 20px;
  min-width: 100px;
  height: 50px;
  background-color: #da8757;
  border-radius: 25px;
  font-family: Poppins-Medium;
  font-size: 16px;
  color: #fff;
  box-shadow: 0px 9px 28px 0px rgba(240, 177, 135, 0.5);
  align-items: center;
  margin-left: 55%;
  margin-top: 50px;
}
.order-btn:hover {
  background-color: #333333;
  box-shadow: grey
}
	</style>

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<nav id="navigtion" class="sticky">
      <ul>
	  <li><a class="nav-item nav-link" href="index.php"> Home </a></li>
		<li><a class="nav-item nav-link" href="category.php"> Product detail </a></li>
		<li><a class="nav-item nav-link" href="cart.php"> Cart</a></li>

        <li><a class="nav-item nav-link" href="contact.php"> Contact </a></li>
      </ul>
    </nav>
	<!-- Header section end -->


	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a> /
				
				<span>Cart</span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">

		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	
	<h3>Order Details</h3>
	<div class="table-responsive" id="purchase_data">  
                               <table class="table table-bordered">  
                                    <tr>  
										 <th width="20%">Product Name</th>  
										 <th width="20%">Brand</th>  

                                         <th width="10%">Quantity</th>  
                                         <th width="20%">Price</th>  
                                         <th width="15%">Total</th>  
                                         <th width="5%">Action</th>  
                                    </tr>  
                                    <?php  
                                    if(!empty($_SESSION["my_cart"]))  
                                    {  
                                         $total = 0;  
                                         foreach($_SESSION["my_cart"] as $keys => $values)  
                                         {                                               
                                    ?>  
                                    <tr>  
										 <td><?php echo $values["pname"]; ?></td>  
										 <td><?php echo $values["pbrand"]; ?></td>  

                                         <td><input type="text" name="quantity[]" id="quantity<?php echo $values["pid"]; ?>" value="<?php echo $values["pquantity"]; ?>" data-pid="<?php echo $values["pid"]; ?>" class="form-control quantity" /></td>  
                                         <td align="right">$ <?php echo $values["pprice"]; ?></td>  
                                         <td align="right">$ <?php echo number_format($values["pquantity"] * $values["pprice"], 2); ?></td>  
                                         <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["pid"]; ?>">Remove</button></td>  
                                    </tr>  
                                    <?php  
                                              $total = $total + ($values["pquantity"] * $values["pprice"]);  
                                         }  
                                    ?>  
                                    <tr>  
                                         <td colspan="3" align="right">Total</td>  
                                         <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                         <td></td>  
                                    </tr>  
                                    <tr>  
                                         <td colspan="5" align="center">  
                                              <!-- <form method="post" action="cart1.php">  
                                                   <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                              </form>   -->
                                         </td>  
                                    </tr>  
                                    <?php  
                                    }  
                                    ?>  
                               </table>  
                          </div> 
		</div>
	</div>
	<br />


		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="shipping-info">
							<h4>Shipping information</h4>
							<div class="col-lg-6">
									<form action="" method="GET">
              <fieldset class="customer-info">
                </br>
                <label for="cust-name"> Name </label><input style="width: 300px"type="text" name="name" id="cust-name"
                   required>
				<br>
				<br>
                <label for="cust-mail">Email </label><input  style="width: 300px" type="email" name="email" id="cust-mail" required>
				<br>
				<br>
                <label for="cust-mobile">Mobile </label><input  style="width: 300px" type="tel" name="mobile"
                  
                  required>
				<br>
				<br>
				<label for="cust-name"> Address </label><input  style="width: 300px" type="text" name="address" id="cust-address"
                   required>
				<br>
				<br>
                <label for="cust-credit">Creditcard </label><input  style="width: 300px" type="text" name="credit_card"
                 id="cust-credit" required>
                <br>
				<br>
                
				<br>
				<br>
			
                <button class="order-btn" type="submit" id="order" onclick="showTotal()">
                  Order
                  <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                </button>
			  </fieldset>
			  </form>
            </div>
				<h4></h4>
					<p></p>
						<div class="cupon-input">
							</div>
						</div>
					</div>

				<?php 
				if(isset($_GET['name'])){
				$name = $_GET['name'];
				}
				if( isset($_GET['address'])){
					$address = $_GET['address'];
				}
				if( isset($_GET['mobile'])){
					$mobile = $_GET['mobile'];
				}
				if(!empty($_SESSION["my_cart"]))  
				{  
					$total = 0;  
					foreach($_SESSION["my_cart"] as $keys => $values)  
					{   
					$totalPrice = $totalPrice + ($values["pquantity"] * $values["pprice"]);
					}
				}
				?>
					<div class="offset-lg-2 col-lg-6">
						<div class="cart-total-details">
							<h4>Cart total</h4>
							<p>Final Info</p>
							<ul class="cart-total-card">
								<li>Name<span> <?=$name;?> </span></li>
								<li>Address<span> <?=$address?></span></li>
								<li>Mobile number <span> <?=$mobile?></span></li>

								<li class="total">Total<span> <?=$totalPrice?> </span></li>
							</ul>
							<a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
						</div>
					</div>
				</div>
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
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<script> $(document).on('click', '.delete', function(){  
           var pid = $(this).attr("id");  
           var action = "remove";  
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{pid:pid, action:action},  
                     success:function(data){  
                          $('#purchase_data').html(data.purchase_data);  
                          $('.badge').text(data.shopping_item);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });
	  </script>