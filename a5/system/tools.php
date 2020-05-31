<?php 

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $login = array('admin1' => '123456788', 'admin2' => '1234567899');

$adminName = isset($_POST['adminName']) ? $_POST['adminName'] : '';
$adminPass = isset($_POST['adminPass']) ? $_POST['adminPass'] : '';


    if (isset($login[$adminName]) && $login[$adminName] == $adminPass ){
        $_SESSION['Userdata']['adminName'] = $adminName;
        // header("location: index.html");
        exit;
    }
    else{
        $Msg = "<span style='color:red'> Invalid Login Details </span>";
        echo $Msg;
    }

}



?>