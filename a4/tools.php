<?php
  session_start();

$seatArray = [
    'STA' => "Standard Adult",
    'STP' => "Standard Concession",
    'STC' => "Standard Children",
    'FCA' => "First Class Adult",
    'FCP' => "First Class Concession",
    'FCC' => "First Class Children",
   
];

$priceArray = [
  'STA' => [14, 19.8],
  'STP' => [12.5, 17.5],
  'STC' => [11, 15.3],
  'FCA' => [24, 30],
  'FCP' => [22.5, 27],
  'FCC' => [21, 24],
  
];

// Print POST,GET,SESSION
  function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
       return $ret;
  else 
      echo $ret; 
}

// Print page code
function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
         echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}


// Validate Text input
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
  //Name
  if (empty($_POST["cust[name]"])){
      $nameErr = "Name is required";
  }else{
    $name = $_POST["cust[name]"];
    if (!preg_match("/^[a-zA-Z ]*$/", $name)){
    $nameErr = "Only western letters and spaces are allowed";
    }
  }


  //Mail
  if (empty($_POST["cust[email]"])){
      $mailErr = "Mail is required";
  }else{
    $mail = $_POST["cust[email]"];
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $mailErr = "Only valid mail account is allowed";
    }
  }


  //Mobile
  if (empty($_POST["cust[mobile]"])){
      $mobileErr = "Mobile number is required";
  }else{
    $mobile = $_POST["cust[mobile]"];
    if (!preg_match("/^(\s\(04\)|\s04|\s\+614)( ?[0-9]){8}$/", $mobile)){
      $mobileErr = "Australian number only";
  }
  }

  //Credit card
  if (empty($_POST["cust[card]"])){
      $cardErr = "Card is required";
  }else{
    $card = $_POST["cust[card]"];
    if (!preg_match("/^[a-zA-Z \-.']{1,100}$/", $card)){
      $cardErr = "Only numbers and spaces are allowed";
  }
  }
}







// function preShow( $arr, $returnAsString=false ) {
//   $ret  = '<pre>' . print_r($arr, true) . '</pre>';
//   if ($returnAsString)
//        return $ret;
//  else 
//       echo $ret; 
// }
// preShow($_POST);     // ie echo a string
//                 preShow($_SESSION);
//                $aaarg = preShow($my_bad_array, true);    // ie return as a string
//                echo "Why is \n $aaarg \n not working?"; 
// function printMyCode() {
//                    $lines = file($_SERVER['SCRIPT_FILENAME']);
//                    echo "<pre class='mycode'><ol>";
//                    foreach ($lines as $line)
//                           echo '<li>'.rtrim(htmlentities($line)).'</li>';
//                    echo '</ol></pre>';
//              }
//              printMyCode();    // prints all lines of code in this file with line numbers
// function php2js( $arr, $arrName ) {
//                    $lineEnd="";
//                    echo "<script>\n";
//                    echo "/* Generated with A4's php2js() function */";
//                    echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
//                    echo "</script>\n\n";
//                }
//               $pricesArrayPHP = array ( ... );
//               php2js($pricesArrayPHP, 'pricesArrayJS');   // ie echos javascript equivalent code
// if (isset($_POST['session-reset'])) {
//                   foreach($_SESSION as $something => &$whatever) {
//                        unset($whatever);
//                   }
//              }
//              <form ... >
//                    ... 
//                    <input type='submit' name='session-reset' value='Reset the session' >
//                     ...
//              </form>

?>