
<?php   
 session_start();  
 require 'config.php';
    if (isset($_POST['session-reset'])) {
      $resetSession = session_destroy();
      if ($resetSession) {
          unset($_POST['session-reset']);
          header("Location: index.php");
      };
    } ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Assignment 5</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" href="nav.css"/>

        </head>  
      <body>   
	<nav id="navigtion" class="sticky">
      <ul>
	  <li><a class="nav-item nav-link" href="index.php">About Us</a></li>
		<li><a class="nav-item nav-link" href="category.php"> Product detail </a></li>
		<li><a class="nav-item nav-link" href="cart.php"> Cart</a></li>
        <li><a class="nav-item nav-link" href="contact.php"> Contact </a></li>
      </ul>
    </nav>
           <br />  
           <div class="container-fluid">  
           <div class="row">
				<div class="col-lg-3">
					<h3 style="text-align:center"> Select brand </h3>
					<ul class="list-group" >
						<?php
						$sql = "SELECT DISTINCT brand FROM tbl_product ORDER BY brand";
						$resultBrand =$conn->query($sql);
						while ($rowBrand=$resultBrand->fetch_assoc()){
						?>
						<li class="list-group-item" style="background-color: #f2d9ff; margin-bottom: 10px; padding: 20px" > 
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input pcheck" value="<?= $rowBrand['brand']; ?>" id="brand"> <?= $rowBrand['brand'];?> </br>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>
                </div>
                <div class="col-lg-9">
                <h3 style="text-align:center"> All products </h3>  
                     <div id="products" class="tab-pane fade in active">  
                     <?php  
                     $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                     $result = $conn->query($query);  
                     while($row = $result->fetch_assoc())  
                     {  
                     ?>  
                     <div class="col-md-4" >  
                          <div style="background-color: #f2d9ff ;border: 1.2px solid #e072a6;  border-radius:8px; padding:15px;  text-align:center">  
							   <img src="img/clothes/<?= $row["image"]; ?>" class="img-responsive" /><br />  
							   <h4 class="text-danger"> Brand: <?= $row["brand"]; ?></h4>  

                               <h5 class="text-info">Name: <?= $row["name"]; ?></h5>  
                               <h5 class="text-danger">Price: $ <?= $row["price"]; ?></h5>  
                               <input type="text" name="quantity" id="quantity<?= $row["id"]; ?>" class="form-control" value="1" />  
							   <input type="hidden" name="product_name" id="name<?= $row["id"]; ?>" value="<?= $row["name"]; ?>" />  
							   <input type="hidden" name="product_brand" id="brand<?= $row["id"]; ?>" value="<?= $row["brand"]; ?>" />  
                               <input type="hidden" name="product_price" id="price<?= $row["id"]; ?>" value="<?= $row["price"]; ?>" />  
                               <input type="button" name="cart_update" id="<?= $row["id"]; ?>" style="margin-top:5px; background-color: #a12f4f; color: white" class="btn  form-control cart_update" value="Add to Cart" />  
                          </div>  
                     </div>  
                     <?php  
                     }  
                     ?>  
					 </div>  
					 <!-- <div id="cart" class="tab-pane fade">  
                         
                     </div>   -->
                </div>  
           </div>  
           <form method="POST">
          <input type="submit" value="Reset data" name='session-reset'>
      </form> 
      </body>  
 </html>  
 <script>  
 $(document).ready(function(data){  
      $('.cart_update').click(function(){ 
		var action = "add";   
           var pid = $(this).attr("id");  
           var pname = $('#name'+pid).val();  
		   var pbrand = $('#brand'+pid).val();
           var pprice = $('#price'+pid).val();  
           var pquantity = $('#quantity'+pid).val();  
          
           if(pquantity > 0)  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          pid:pid,   
                          pname:pname, 
						  pbrand:pbrand,  
                          pprice:pprice,   
                          pquantity:pquantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#purchase_data').html(data.purchase_data);  
                          $('.badge').text(data.cart_item);  
                          alert("Product has been added into Cart. Click to Cart on the navbar to see your order.");  
                     }  
                });  
           }  
           else  
           {  
                alert("Please enter the number of quantity. (not zero) ")  
           }  
      });  
     
      $(document).on('keyup', '.quantity', function(){  
			var action = "quantity_change";  
           var pid = $(this).data("pid");  
           var quantity = $(this).val();  
         
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{pid:pid, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#purchase_data').html(data.purchase_data);  
                     }  
                });  
           }  
      });  
 });  
 </script>

<script type="text/javascript">
					
						$(".pcheck").click(function(){
							var action = 'data';
							var brand = get_filter_text('brand');
							$.ajax({
								url: 'action.php',
								method:'POST',
								data:{action:action, brand:brand},
								success: function(response){
									$("#products").html(response);
									$("#textChange").text("Filter Products");
								}
							});
						});
						$(document).ready(function(){
						funtion get_filter_text(text_id){
							var filterData =[];
							$('#'+text_id+':checked').each(function(){
								filterData.push($(this).val());
							});
							return filterData;
						}
					});
		</script>