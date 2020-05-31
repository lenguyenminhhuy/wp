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
				<span>Cart</span>
			</div>
			<img src="assets/img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->

    <div class="cart-warp">
        <div class="container">
            <div class="row">
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
                            foreach($_SESSION["my_cart"] as $keys => $values) {  ?>  
                            <tr>  
                                    <td><?php echo $values["pname"]; ?></td>  
                                    <td><?php echo $values["pbrand"]; ?></td>  

                                    <td><input type="text" name="quantity[]" id="quantity<?php echo $values["pid"]; ?>" value="<?php echo $values["pquantity"]; ?>" data-pid="<?php echo $values["pid"]; ?>" class="form-control quantity" /></td>  
                                    <td align="right">$ <?php echo $values["pprice"]; ?></td>  
                                    <td align="right">$ <?php echo number_format($values["pquantity"] * $values["pprice"], 2); ?></td>  
                                    <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["pid"]; ?>">Remove</button></td>  
                            </tr>  
                            <?php $total += $values["pquantity"] * $values["pprice"];  } ?>  
                        <tr>  
                                <td colspan="4" align="right">Total</td>  
                                <td align="right">$ <?= number_format($total, 2) ?></td>  
                                <td></td>  
                        </tr>  
                        <?php } ?>  
                    </table>  
                </div> 
            </div>
        </div>
    </div>

    <div class="card-warp">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="shipping-info">
                        <h4>Shipping information</h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="shipping-form" action="">
                                    <fieldset class="customer-info">
                                        <label for="cust-name"> Name  </label><input type="text" name="name" id="cust-name" required>
                                        <label for="cust-mail">Email </label><input type="email" name="email" id="cust-mail" required>
                                        <label for="cust-mobile">Mobile </label><input type="tel" name="mobile" required>
                                        <label for="cust-name"> Address </label><input type="text" name="address" id="cust-address" required>
                                        <label for="cust-credit">Credit Card </label><input type="text" name="credit_card" id="cust-credit" required>
                                        <button class="card-btn" type="submit" id="order">
                                            Submit information
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-6">
                    <div id="order-info" class="cart-total-details">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- Page end -->

<?php include("templates/footer.php"); ?>