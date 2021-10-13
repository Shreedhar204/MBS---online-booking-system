<?php
 session_start();





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mbsdb";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstName,pickUp, dropOff, `date`, `time` FROM mbstbl WHERE emailAddress = '$_SESSION['username']' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo'
    <p>Pick-up destination: <span id="firstName">'.$row["firstName"].'</span></p>
    <p>Pick-up destination: <span id="pickUp">'.$row["pickUp"].'</span></p>
    <p>Drop-off destination: <span id="dropOff">'.$row["dropOff"].'</span></p>
    <p>Date: <span id="date">'.$row["date"].'</span></p>
    <p>Time: <span id="time">'.$row["time"].'</span></p>';
    echo "id: " . $row["pickUp"]. " - Name: " . $row["dropOff"]. " " . $row["date"]. $row["time"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>