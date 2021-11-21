<?php
session_start();



$pickUp=$_POST['pickUp'];
$dropOff=$_POST['dropOff'];
$date=$_POST['date'];
$time=$_POST['time'];
$username = $_SESSION['username'];
$isPaid;


//Database connection
$conn = new mysqli("localhost", "root", "", "mbsdb");
if ($conn->connect_error) {
    die('Connection failed :'.$conn->connect_error);
}



$sql = "update mbstbl set pickUp='$pickUp', dropOff='$dropOff', date='$date', time='$time' where emailAddress='$username'";
    if ($conn->query($sql) === TRUE) {
        echo"Booking successful";
        header('Location: http://localhost/mbs%20website/viewBookingH.php');
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();

   
?>

