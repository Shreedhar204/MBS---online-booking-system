<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mbsdb";
$current = $_SESSION['username'];
// $payment = $_POST['payment'];
$payment = "R50";
$isPaid = FALSE;
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE mbstbl SET paid='$payment' WHERE emailAddress='$current'";
$result = $conn->query($sql);

// if ($conn->query($sql) === TRUE) {
//     echo"Payment successful";
    
// }else{
//     echo "Error: ".$sql."<br>".$conn->error;
// }
// echo"Payment successful. Please go back to the previous screen!";





$conn->close();


header("Location: http://localhost/mbs%20website/viewBookingH.php");
?>