<?php
session_start();
echo $_SESSION['username'];
if(!isset($_SESSION['username'])){
    echo"You are not logged in";
}else{
    echo"You are logged in";
}
?>