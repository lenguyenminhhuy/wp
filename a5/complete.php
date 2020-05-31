<?php 
session_start();
require 'system/helper.php';
include("templates/header.php");
?>
	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a> /
				<span>Order complete</span>
			</div>
			<img src="assets/img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->

    <div class="cart-warp">
        <div class="container">
            <div class="row">
            <h3>Order Successfully Submitted</h3>
            <p>Your order has been successful and your parcel will be dispatched within the next 2 working days.
	** Please note you will not receive a further order confirmation. You will receive an email notification when your order has been shipped. Otherwise we will only contact you if there is a problem or delay. **
	<br/>
	</br>
	Important information relating to your order
	Average shipping times
	<ul>
	<li> 
	UK & Europe: 5-7 working days
	</li>
	<li>
	USA & Rest of World: 7-14 working days
	</li>
	</ul>

	Delivery addresses
	We will ship to the address provided with the order. Please do not worry if you address is classed as ‘unconfirmed’ on your order email, this is set by PayPal and will not affect our dispatch. </p>
            </div> 
            </div>
        </div>
    </div>

	<!-- Page end -->

<?php include("templates/footer.php"); ?>