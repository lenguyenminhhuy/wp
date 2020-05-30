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
                url: "action.php",
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

    $(document).on('keyup', '.quantity', function () {
        var action = "quantity_change";
        var pid = $(this).data("pid");
        var quantity = $(this).val();

        if (quantity != '') {
            $.ajax({
                url: "action.php",
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