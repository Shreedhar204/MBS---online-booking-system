<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="viewBookingStyles.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <title>View booking</title>
  </head>
  <body>
    <header>
      <div class="container--header row">
        <button class="nav-toggle" aria-label="open navigation">
          <span class="hamburger"></span>
        </button>
        <div class="logo"><img src="icons/logo2.png" alt="" /></div>
        <nav class="nav hidden">
          <ul class="nav__list nav__list--primary">
            <li class="nav__item">
              <a href="booking.html" class="nav__link">Make a booking</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">About</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="main_container">
      <h1>My booking</h1>
      <div class="bottom_container">
      <?php






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mbsdb";
$current = $_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstName,pickUp, dropOff, `date`, `time` FROM mbstbl WHERE emailAddress = '$current' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo'
    <p>Pick-up destination: <span id="firstName">'.$row["firstName"].'</span></p>
    <p>Pick-up destination: <span id="pickUp">'.$row["pickUp"].'</span></p>
    <p>Drop-off destination: <span id="dropOff">'.$row["dropOff"].'</span></p>
    <p>Date: <span id="date">'.$row["date"].'</span></p>
    <p>Time: <span id="time">'.$row["time"].'</span></p>';
    
  }
} else {
  echo "0 results";
}
$conn->close();

?>
        <form action="viewBooking.php" method="post">
          <div class="btn_section col">
            <input type="text" value="yes" class="hidden" />
            <input
              type="submit"
              value="Pay"
              name="pay"
              class="btn btn--submit submit"
            />
            <input
              type="submit"
              value="Cancel"
              name="cancel"
              class="btn btn--submit submit"
            />
          </div>
        </form>
      </div>
    </div>

    <script src="scriptIndex.js"></script>
  </body>
</html>
