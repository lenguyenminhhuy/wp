$(document).ready(function (data) {
    $('.cart_update').click(function () {
        var action = "add";
        var pid = $(this).attr("id");
        var pname = $('#name' + pid).val();
        var pbrand = $('#brand' + pid).val();
        var pprice = $('#price' + pid).val();
        var pquantity = $('#quantity' + pid).val();
        if (pquantity > 0) {
            $.ajax({
                url: "ajax/action.php",
                method: "POST",
                dataType: "json",
                data: {
                    pid: pid,
                    pname: pname,
                    pbrand: pbrand,
                    pprice: pprice,
                    pquantity: pquantity,
                    action: action
                },
                success: function (data) {
                    $('#purchase_data').html(data.purchase_data);
                    $('.badge').text(data.cart_item);
                    alert("Product has been added into Cart. Click to Cart on the navbar to see your order.");
                }
            });
        }
        else {
            alert("Please enter the number of quantity. (not zero) ")
        }
    });

    $('#shipping-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "ajax/submit-shipping.php",
            method: "POST",
            dataType: "html",
            data: $('#shipping-form').serialize(),
            beforeSend: function() {
                $('#order-info').hide();
            },
            success: function (data) {
                $('#order-info').html(data);
                $('#order-info').slideDown();
            }
        });
    });

    $(document).on('keyup', '.quantity', function () {
        var action = "quantity_change";
        var pid = $(this).data("pid");
        var quantity = $(this).val();

        if (quantity != '') {
            $.ajax({
                url: "ajax/action.php",
                method: "POST",
                dataType: "json",
                data: { pid: pid, quantity: quantity, action: action },
                success: function (data) {
                    $('#purchase_data').html(data.purchase_data);
                }
            });
        }
    });
});  

$(document).on('click', '.delete', function(){  
    var pid = $(this).attr("id");  
    var action = "remove";  
    if(confirm("Are you sure you want to remove this product?"))  
    {  
         $.ajax({  
              url:"ajax/action.php",  
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