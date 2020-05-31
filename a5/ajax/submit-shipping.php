<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') die("Invalid method.");
require('../system/helper.php');
if (!isset($_SESSION['shipping'])) $_SESSION['shipping'] = array();
foreach ($_POST as $key => $value) {
    $_SESSION['shipping'][$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<h4>Order Information</h4>
<br>
<ul class="cart-total-card">
    <li><b>Name: </b>
        <span><?= $_SESSION['shipping']['name'] ?> </span>
    </li>
    <li><b>Email: </b>
        <span><?= $_SESSION['shipping']['email'] ?> </span>
    </li>
    <li><b>Mobile number: </b>
        <span><?= $_SESSION['shipping']['mobile'] ?></span>
    </li>
    <li><b>Address: </b>
        <span><?= $_SESSION['shipping']['address'] ?></span>
    </li>
    <li><b>Creadit Card: </b>
        <span><?= $_SESSION['shipping']['credit_card'] ?></span>
    </li>
    <li class="total"><b>Total: </b>
        <span>$ <?= number_format(get_cart_total_price(), 2) ?> </span>
    </li>
</ul>
<button id="confirm-order-btn" onclick="location.href = 'complete.php';" class="card-btn">Confirm order</button>