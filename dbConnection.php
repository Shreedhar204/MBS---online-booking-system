<?php
$firstName=$_POST['firstName'];
$surname=$_POST['surname'];
$emailAddress=$_POST['emailAddress'];
$password=$_POST['password'];

//Database connection
$conn = new mysqli("localhost", "root", "", "mbsdb");
if ($conn->connect_error) {
    die('Connection failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into mbstbl(firstName, surname, emailAddress, password)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$firstName, $surname, $emailAddress, $password);
    $stmt->execute();
    echo"registration successful";
    $stmt->close();
    $conn->close();
}


?>
