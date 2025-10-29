<?php
  require('credentials.php');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Create database
  $sql = "CREATE DATABASE $dbname";
  if (mysqli_query($conn, $sql)) {
      echo "Database created successfully<br>";
  } else {
      echo "Error creating database: " . mysqli_error($conn) . "<br>";
  }
  
  // Create database
  $sql = "use $dbname";
  if (mysqli_query($conn, $sql)) {
      echo "Database selected successfully<br>";
  } else {
      echo "Error creating database: " . mysqli_error($conn) . "<br>";
  }

  // sql to create table
  $sql = "CREATE TABLE Comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    comment VARCHAR(250) NOT NULL,
    reg_date TIMESTAMP
  )";

  if (mysqli_query($conn, $sql)) {
      echo "Table Comments created successfully<br>";
  } else {
      echo "Error creating table: " . mysqli_error($conn) . "<br>";
  }

  mysqli_close($conn);
?>
