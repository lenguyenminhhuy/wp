<?php   
session_start();  
require 'system/helper.php';
include("templates/header.php"); ?>

	<!-- Hero section -->
	<section class="hero-section set-bg">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-left">
                    <img src="assets/img/slider-img.png" alt="">
                </div>
				<div class="hs-right">
				</div>
			</div>		
    </section>
  
    <div class="container-fluid" style="padding-top: 50px; padding-bottom: 50px">  
        <div class="row">
			<div class="col-lg-3">
                <h3 style="text-align:center"> Select brand </h3>
                <ul class="list-group" >
                    <li class="list-group-item" style="border: 1.2px solid #e072a6;border-radius:8px;  background-color: #f2d9ff; margin-bottom: 10px;padding-top: 30px; " > 
                        <input type="button" class="btn btn-danger btn-block btn-lg" onclick="filterProduct('*')" value="All brands" id="all_brands"> </br>	
                    </li>				
                    <?php
                    foreach(get_brands() as $rowBrand) {
                    ?>
                        
                    <li class="list-group-item" style="border: 1.2px solid #e072a6;border-radius:8px;  background-color: #f2d9ff; margin-bottom: 10px;padding-top: 30px; " > 
                        <input type="button" 
                                class="btn btn-danger btn-block btn-lg" 
                                onclick="filterProduct('<?= $rowBrand['brand']; ?>')" 
                                value="<?= $rowBrand['brand']; ?>" 
                                id="brand<?=$rowBrand['brand']?>"> </br>
                    </li>
                    <?php } ?>
                </ul>
			</div>
            <div class="col-lg-9">
                <h3 style="text-align:center" id="title1"> All products </h3>  
                <div id="products" class="tab-pane in active">  
                    <div class="row">
                    <?php  
                    foreach(get_products() as $row) {
                        $pid = $row['id'];
                    ?>  
                    <div class="col-md-4" id="brand<?=$row['brand']?>">  
                        <div class="products-panel">  
                            <img src="assets/img/clothes/<?= $row["image"]; ?>" class="img-responsive" /><br />  
                            <h4 class="text-danger"> Brand: <?= $row["brand"]; ?></h4>  
                            <h5 class="text-info">Name: <?= $row["name"]; ?></h5>  
                            <h5 class="text-danger">Price: $ <?= $row["price"]; ?></h5>  
                            <input type="text" name="quantity" id="quantity<?= $row["id"]; ?>" class="form-control" value="1" />  
                            <input type="hidden" name="product_name" id="name<?= $row["id"]; ?>" value="<?= $row["name"]; ?>" />  
                            <input type="hidden" name="product_brand" id="brand<?= $row["id"]; ?>" value="<?= $row["brand"]; ?>" />  
                            <input type="hidden" name="product_price" id="price<?= $row["id"]; ?>" value="<?= $row["price"]; ?>" />  
                            <input type="button" name="cart_update" id="<?= $row["id"]; ?>" style="margin-top:10px; height: 42px; padding-bottom: 5px; color: white" class="btn btn-danger btn-block btn-lg form-control cart_update" value="Add to Cart" />  
                            <a href="product.php?pid=<?=$pid?>"><input type="button"  name="detail" id="<?= $row["id"]; ?>" style="margin-top:10px; height: 42px; padding-bottom: 5px; color: white" class="btn btn-danger btn-block btn-lg form-control " value="See detail" /></a> 
                        </div>  
                    </div>  
                    <?php } ?>  
                    </div>
				</div>  
            </div>  
        </div>  
    </div>

<?php include("templates/footer.php"); ?>


