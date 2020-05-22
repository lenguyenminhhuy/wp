<?php 
session_start();
include 'tools.php';
if (empty($_SESSION)) header("Location: index.php");

$movie = $_SESSION['movie'];
$idMovie = $movie['id'];
$day =  $movie['day'];
$hour =  $movie['hour'];
$name = $movie['name'];
$seat = $_SESSION['seats'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Ticket</title>
        
    <script  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src='script.js'></script>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" id='stylecss' type="text/css" href="style.css">
    <link rel="stylesheet" id='wireframecss' type="text/css" href="../wireframe.css" disabled>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" media="print" href="print.css" />
    <noscript>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" id='wireframecss' type="text/css" href="../wireframe.css" disabled>
        <link rel="stylesheet" id='stylecss' type="text/css" href="style.css">
    </noscript>
    <script  src='../wireframe.js'></script>
 
</head>
<body onload="window.print()">
<?php 
$date = date_default_timezone_set("Asia/Bangkok");
$timeBooking = date("l d-m-Y H:i");

 function convert($num)
  {
return number_format((float)$num, 2, '.', ''); //number_format ( $number, $decimals, $decimalpoint, $sep )
}
 // check whether that type is discount  or not
if (
(($day !== "Saturday" && $day !== "Sunday") && $hour === '12pm') ||
($day === "Monday" || $day === "Wednesday")
)
$discountPrice = true;
else
 $discountPrice = false;
// get value from each selection 
foreach ($_SESSION['seats'] as $type => $quantity) {
    if ($quantity > 0) {
        $priceTicket = $discountPrice ? 
        convert($priceArray[$type][0]) : convert($priceArray[$type][1]);
        echo $a = <<<ticket
        <header>
        <a href="index.php"> Back to booking page </a>
          <div>
          <img id="logo" src="media2/logo-op.png" />
        <div id="quote">More than just a cinematic experience</div>
        <h4 style="text-align: center">ABN: 00 123 456 789</h4>
          </div>
        </header>
        <section style="padding-bottom: 700px;">
          <div class="container">
              <div class="row row-cols-2" style="border: 4px rgb(241, 177, 145) solid; margin-bottom: 10px; margin-left: 2.2%; background-color: rgb(225, 210, 198)">
                  <div class="col" id='cust-info'>
                      <div class="row">
                          <h2>Customer information:</h2>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">Name</div>  
                          <div class="col-sm-9">: {$_SESSION['name']}</div>
                      </div>
                      <br/>
                      <div class="row">
                          <div class="col-sm-3">Email</div> 
                          <div class="col-sm-9">: {$_SESSION['email']} </div>
                      </div>
                      <br/>
        
                      <div class="row">
                          <div class="col-sm-3">Mobile</div>
                          <div class="col-sm-9">: {$_SESSION['mobile']} </div>
                      </div>
                      <br/>
                      <div class="row">
                          <div class="col-sm-3"> Credit card </div>
                          <div class="col-sm-9">: {$_SESSION['card']} </div>
                      </div>
                  </div>
        
                  <div class="col" id='movie-info'>
                      <div class="row">
                          <h2>Movie information:</h2>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">Day</div>
                          <div class="col-sm-9">:  {$day} </div>
                      </div>
                      <br/>
        
                      <div class="row">
                          <div class="col-sm-3">Hour</div> 
                          <div class="col-sm-9">: {$hour} </div>
                      </div>
                      <br/>
        
                      <div class="row">
                          <div class="col-sm-3">Movie</div>
                          <div class="col-sm-9">:{$name} </div> 
                      </div>
                      <br/>
                      <div class="row">
                          <div class="col-sm-3"> Booking at </div> 
                          <div class="col-sm-9">: {$date}{$timeBooking}
                          </div>
                      </div>
                      
                  </div>
              </div>
              <h1 style="text-align: center; font-family: Poppins-Medium"> THIS IS YOUR TICKET INFORMATION </h1>
              <table>
                  <thead>
                      <tr>
                          <th scope="col">Type of seat</th>
                          <th scope="col">Price</th>
                      </tr>
                  </thead>
                  <tbody>
        ticket;
        $priceTicket = convert($priceTicket);
        $GST = $priceTicket*1/11;
        $GST = convert($GST);
        $total = $GST + $priceTicket;
        echo $b = <<<infoPrice
        <td>  $seatArray[$type]  </td> 
        <td> $ $priceTicket </td>
        </tr>
        <tr>
        <th colspan="1" scope="row">GST</th>
        <td> $ {$GST} </td>
        </tr>
        <tr>
        <th colspan="1" scope="row">Total</th>
        <td> $ {$total} </td>
        </tr>
        </tbody>
        </table>
        </section>
        infoPrice;
        }
} 
?>
                 
</body>
</html>