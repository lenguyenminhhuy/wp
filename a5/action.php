<?php
// require 'config.php';

// if(isset($_POST['action'])){
//     $sql = "SELECT * FROM tbl_product WHERE brand !=''";
//     if (isset($_POST['brand'])){
//         $brand = implode("','", $_POST['brand']);
//         $sql .= "AND brand IN('".$brand."')";
//     }
//     $result = $conn->query($sql);
//     $output = '';
//     if ($result -> num_rows > 0) {
//         while($row=$result->fetch_assoc()){
//             $output .= '';
//         }
//     }
// }
?>


<?php  
 //action.php  
 session_start();  
require 'config.php';
 if(isset($_POST["pid"]))  
 {  
      $purchase_data = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["my_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["my_cart"] as $keys => $values)  
                {  
                     if($_SESSION["my_cart"][$keys]['pid'] == $_POST["pid"])  
                     {  
                          $is_available++;  
                          $_SESSION["my_cart"][$keys]['pquantity'] = $_SESSION["my_cart"][$keys]['pquantity'] + $_POST["pquantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $purchaseArr = array(  
                          'pid' => $_POST["pid"],  
                          'pname'  => $_POST["pname"],  
                          'pbrand' =>	$_POST["pbrand"],

                          'pprice'   => $_POST["pprice"],  
                          'pquantity' => $_POST["pquantity"]  
                     );  
                     $_SESSION["my_cart"][] = $purchaseArr;  
                }  
           }  
           else  
           {  
                $purchaseArr = array(  
                     'pid' => $_POST["pid"],  
                     'pname' => $_POST["pname"],  
                     'pbrand' =>	$_POST["pbrand"],

                     'pprice' =>  $_POST["pprice"],  
                     'pquantity' => $_POST["pquantity"]  
                );  
                $_SESSION["my_cart"][] = $purchaseArr;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["my_cart"] as $keys => $values)  
           {  
                if($values["pid"] == $_POST["pid"])  
                {  
                     unset($_SESSION["my_cart"][$keys]);  
                     $message = '<label class="text-success">Product has been removed</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["my_cart"] as $keys => $values)  
           {  
                if($_SESSION["my_cart"][$keys]['pid'] == $_POST["pid"])  
                {  
                     $_SESSION["my_cart"][$keys]['pquantity'] = $_POST["quantity"];  
                }  
           }  
      }  
      $purchase_data .= '  
           '.$message.'  
           <table class="table table-bordered">  
                <tr>  
                     <th width="20%">Product Name</th>  
                     <th width="20%"> Brand </th>  

                     <th width="10%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Total</th>  
                     <th width="5%">Action</th>  
                </tr>  
           ';  
      if(!empty($_SESSION["my_cart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["my_cart"] as $keys => $values)  
           {  
                $purchase_data .= '  
                     <tr>  
                          <td>'.$values["pname"].'</td>  
                          <td>'.$values["pbrand"].'</td>  
                          <td><input type="text" name="quantity[]" id="quantity'.$values["pid"].'" value="'.$values["pquantity"].'" class="form-control quantity" data-pid="'.$values["pid"].'" /></td>  
                          <td align="right">$ '.$values["pprice"].'</td>  
                          <td align="right">$ '.number_format($values["pquantity"] * $values["pprice"], 2).'</td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["pid"].'">Remove</button></td>  
                     </tr>  
                ';  
                $total = $total + ($values["pquantity"] * $values["pprice"]);  
           }  
           $purchase_data .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">$ '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>           ';  
      }  
      $purchase_data .= '</table>';  
      $output = array(  
           'purchase_data'     =>     $purchase_data,  
           'shopping_item'          =>     count($_SESSION["my_cart"])  
      );  
      echo json_encode($output);  
 }  
 ?>