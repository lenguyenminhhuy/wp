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
    <title> Receipt</title>
    
    <script  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script async defer src='script.js'></script>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" id='stylecss' type="text/css" href="style.css">
    <link rel="stylesheet" id='wireframecss' type="text/css" href="../wireframe.css" disabled>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <noscript>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" id='wireframecss' type="text/css" href="../wireframe.css" disabled>
        <link rel="stylesheet" id='stylecss' type="text/css" href="style.css">
    </noscript>
    <script  src='../wireframe.js'></script>
</head>

<body>
    <header>
      <a href="index.php"> Back to booking page </a>
        <div>
        <img id="logo" src="media2/logo-op.png" />
    <div id="quote">More than just a cinematic experience</div>
    <h4 style="text-align: center">ABN: 00 123 456 789</h4>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="row row-cols-2" style="border: 4px rgb(241, 177, 145) solid; margin-bottom: 10px; margin-left: 2.2%; background-color: rgb(225, 210, 198)">
                <div class="col" id='cust-info'>
                    <div class="row">
                        <h2>Customer information:</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Name</div>  
                        <div class="col-sm-9">: <?php echo $_SESSION['name'] ?></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-3">Mobile</div>
                        <div class="col-sm-9">: <?php echo$_SESSION['mobile'] ?></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-3">Email</div> 
                        <div class="col-sm-9">: <?php echo $_SESSION['email'] ?></div>
                    </div>
                    <br/>

                    
                    <div class="row">
                        <div class="col-sm-3"> Credit card </div>
                        <div class="col-sm-9">: <?php echo $_SESSION['card'] ?></div>
                    </div>
                </div>

                <div class="col" id='movie-info'>
                    <div class="row">
                        <h2>Movie information:</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Day</div>
                        <div class="col-sm-9">: <?php echo $day ?></div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-sm-3">Hour</div> 
                        <div class="col-sm-9">: <?php echo $hour ?></div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-sm-3">Movie</div>
                        <div class="col-sm-9">: <?php echo  $name?></div> 
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-3"> Booking at </div> 
                        <div class="col-sm-9">: <?php date_default_timezone_set("Asia/Bangkok"); echo date("l d-m-Y H:i"); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <h1 style="text-align: center; font-family: Poppins-Medium"> THIS IS YOUR TICKET INFORMATION </h1>
            <table >
                <thead>
                    <tr>
                        <th scope="col">Origin Number</th>
                        <th scope="col">Type of seat</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // assign origin number
                    $originalNumber = 1;
                    // format number
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
                    foreach ($_SESSION['seats'] as $typeOfSeat => $numberOfSeat) { 
                        if ($numberOfSeat > 0) {
                            $total = $discountPrice ? 
                            convert($priceArray[$typeOfSeat][0] * $numberOfSeat) : convert($priceArray[$typeOfSeat][1] * $numberOfSeat);
                            echo "<tr>";
                            echo "<th scope=\"row\">  $originalNumber  </th>";
                            echo "<td>  $seatArray[$typeOfSeat]  </td>"; 
                            echo "<td> $numberOfSeat </td> ";
                            echo "<td> $"   . $total . "</td> ";
                            echo "</tr>";
                            $originalNumber += 1;
                            $totalPrice = $totalPrice + $total;
                            $GST = $totalPrice*1/11;
                           
                        }
                    } 
                    ?>
                    <tr> 
                    <th  scope="row" colspan="3"> <?php echo "GST" ?> </th>
                    <td> <?php echo "$" . convert($GST) ?> </td>
                    </tr>
                    <tr>
                    <th  scope="row" colspan="3"> <?php echo "Total price" ?> </th>
                    <td> <?php echo "$" . convert($totalPrice + $GST)?> </td>
                    </tr>
                    </tr>
              
                    <?php
                    // booking form information
                    
                    $information = [
                        date("y-m-d"),
                        $_SESSION['name'],
                        $_SESSION['email'],
                        $_SESSION['mobile'],
                        $_SESSION['card'],
                        $_SESSION['movie']['day'],
                        $_SESSION['movie']['hour'],
                        $_SESSION['movie']['name'],
                        $idMovie . " " . $day . " "  . $hour,
                        $_SESSION['seats']['STA'],
                        $_SESSION['seats']['STP'],
                        $_SESSION['seats']['STC'],
                        $_SESSION['seats']['FCA'],
                        $_SESSION['seats']['FCP'],
                        $_SESSION['seats']['FCC'],
                        convert($totalPrice + $GST)
                    ];
                    // save data to bookings.txt file 
                    $file = fopen("bookings.txt", "a");
                    flock($file, LOCK_SH);
                    fputcsv($file, $information, "\t");
                    flock($file, LOCK_UN);
                    fclose($file);
                    ?>
                    <tr id="buttons">
                    <td colspan="2">
                            <form action="indiTicket.php" method="post">
                                <input type="submit" value="Print a single ticket" class="btn btn-success btn-block btn-lg">
                            </form>
                            <?php 
                      
                            ?>
                        </td>
                        <td colspan="2">
                            <button type="button" class="btn btn-warning btn-block btn-lg" onclick="window.print();">Print all tickets</button>
                        </td>
                  
                    </tr>
                </tbody>
            </table>  

        </div>
    </section>
    <footer>
      
    </footer>
</body>
</html>
