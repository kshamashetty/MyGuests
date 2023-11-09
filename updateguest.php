<?php
  session_start();

include 'db.php';

$sql = "UPDATE MyGuests SET firstname = '{$_POST['firstname']}', lastname='{$_POST['lastname']}', email='{$_POST['email']}' WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'guestupdated';
    header("Location: index.php");
  } else {
    header("Location: index.php?message=guestupdatefail");
}

  mysqli_close($conn);
?>