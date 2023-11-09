<?php
  session_start();

include 'db.php';

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'guestdeleted';
    header("Location: index.php");
} else {
    header("Location: index.php?message=guestdeletefail");
}

mysqli_close($conn);
?>