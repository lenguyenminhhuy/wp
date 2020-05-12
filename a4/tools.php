<?php
  session_start();

// Put your PHP functions and modules here

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