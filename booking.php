<?php
session_start();
echo $_SESSION['username'];
if(!isset($_SESSION['username'])){
    echo"You are not logged in";
}else{
    echo"You are logged in";
}

$pickUp=$_POST['pickUp'];
$dropOff=$_POST['dropOff'];
$date=$_POST['date'];
$time=$_POST['time'];
$username = $_SESSION['username'];
//Database connection
$conn = new mysqli("localhost", "root", "", "mbsdb");
if ($conn->connect_error) {
    die('Connection failed :'.$conn->connect_error);
}

$sql = "update mbstbl set pickUp='$pickUp', dropOff='$dropOff', date='$date', time='$time' where emailAddress='$username'";
    if ($conn->query($sql) === TRUE) {
        echo"Booking successful";
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();

?>