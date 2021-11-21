<?php

session_start();
    $emailAddress = $_POST["emailAddress"];
    $password = $_POST["password"];
    

   

    //Database connection
$con = new mysqli("localhost", "root", "", "mbsdb");
if ($con ->connect_error) {
    die("Failed to connect : ".$con->connect_error);
}else{
    $stmt = $con->prepare("select * from mbstbl where emailAddress = ?");
    $stmt->bind_param("s", $emailAddress);
    $stmt ->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
            echo"Login succussfully";
            $_SESSION['username'] = $emailAddress;
            header("Location: http://localhost/mbs%20website/booking.html");
            exit();
        }else{
            echo"Invalid email or password. Please go back and try again.";
        }
    }else{
        echo "Invalid email or password. Please go back and try again.";
    }
}


?>


<!-- include"dbConnection.php";

if(isset($_POST["email"], $_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = mysqli_query($conn,"SELECT EmailAddress, Password FROM mbstbl WHERE email = '".$email."' AND password = '".$password."' ");

    // if ($query || mysqli_num_rows($query) == 0) {
    if (mysqli_num_rows($query)>0){
       $_SESSION["name"] = 
        
    }
    else{
        echo"user does not exist";
    }

} -->