<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guests</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

            
    <h1>My Guests</h1>

    <?php
    if(isset($_SESSION['message'])){
      if($_SESSION['message'] == 'guestadded'){
        echo '<div class="alert alert-success">
        <strong>Success!</strong> Guest Added!
        </div>';

      }
      else if($_SESSION['message'] == 'guestdeleted'){
        echo '<div class="alert alert-danger">
        <strong>Success!</strong> Guest Deleted.
        </div>';

      }
      else if($_SESSION['message'] == 'guestupdated'){
        echo '<div class="alert alert-info">
        <strong>Success!</strong> Guest Updated.
        </div>';

      }

      unset($_SESSION['message']);
        
    }
    ?>

    <?php
    if(isset($_POST['editguest'])){
      echo '<form action="updateguest.php" method="POST">';
    }
    else{
      echo '<form action="addguest.php" method="POST">';
    }
    ?>

      <div class="form-group">
        <input type="text" class="form-control" name="firstname" value="<?=$_POST['firstname']?>" placeholder="First Name" required>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="lastname" value="<?=$_POST['lastname']?>" placeholder="Last Name" required>
      </div>

      <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?=$_POST['email']?>" placeholder="Email" required>
      </div>


        <?php

        if(isset($_POST['editguest'])){
          echo '<button type="submit" name="updateguest" class="btn btn-info">Update Guest</button>';
        }
        else{
          echo '<button type="submit" name="addguest" class="btn btn-primary">Add Guest</button>';
        }

        ?>

    </form>

    <br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Email</th>
        <th>Reg Date</th>
        <th></th>
        <th></th>
    </tr>
    <?php

include 'db.php';

$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['firstname']?></td>
        <td><?=$row['lastname']?></td>
        <td><?=$row['email']?></td>
        <td><?=$row['reg_date']?></td>
        <td>
        <form action="index.php" method="POST">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
            <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
            <input type="hidden" name="email" value="<?=$row['email']?>">
            <button type="submit" name="updateguest" class="btn btn-xs btn-success">Edit</button>
          </form>
        </td>
        <td>
          <form action="deleteguest.php" method="POST">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <button type="submit" name="deleteguest" class="btn btn-xs btn-danger">X</button>
          </form>
        </td>
    </tr>


<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</table>
</div>
        </div>
    </div>
</body>
</html>