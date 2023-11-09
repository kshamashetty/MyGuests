<?php
  session_start();

include 'db.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}')";

if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'guestadded';
  header("Location: index.php");
} else {
  header("Location: index.php?message=guestaddfail");
}

mysqli_close($conn);
?>