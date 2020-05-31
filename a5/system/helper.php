<?php
require 'config.php';

function get_data($query) {
    global $conn;
    $sql = $query;
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function get_brands() {
    return get_data("SELECT DISTINCT brand FROM tbl_product ORDER BY brand");
}

function get_products() {
    return get_data("SELECT * FROM tbl_product ORDER BY id ASC");
}

function get_cart_total_price() {
    if(!empty($_SESSION["my_cart"])) {  
        foreach($_SESSION["my_cart"] as $keys => $values) {   
            $totalPrice = $totalPrice + ($values["pquantity"] * $values["pprice"]);
        }
        return $totalPrice;
    } else {
        return 0;
    }
}

// prevent XSS when values from GET/POST is entered 
function get_value_safely($name) {
    if (isset($_GET[$name])) {
        return htmlspecialchars($_GET[$name], ENT_QUOTES, 'UTF-8');
    }
    return '';
}
