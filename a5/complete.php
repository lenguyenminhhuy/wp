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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac ante cursus lorem maximus semper non vitae nibh. Aenean aliquam lorem at lectus pulvinar, at eleifend enim rutrum. Suspendisse potenti. Donec bibendum arcu sed sapien convallis ullamcorper. Ut posuere urna velit, a luctus turpis cursus sit amet. </p>
            </div> 
            </div>
        </div>
    </div>

	<!-- Page end -->

<?php include("templates/footer.php"); ?>