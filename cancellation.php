<?php
session_start();





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mbsdb";
$current = $_SESSION['username'];
$pickUp = "none";
$dropOff = "none";
$date = "none";
$time = "none";
$paid = "R0";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "update mbstbl set pickUp='$pickUp', dropOff='$dropOff', date='$date', time='$time', paid = '$paid' where emailAddress='$current'";
$result = $conn->query($sql);


$conn->close();
header("Location: http://localhost/mbs%20website/booking.html")
?>