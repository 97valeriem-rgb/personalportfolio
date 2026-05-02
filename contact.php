<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contacts (name, email, message)
          VALUES ('$name', '$email', '$message')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php?success=1");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>