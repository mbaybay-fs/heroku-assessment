<?php

include 'connect.php';
$id = $_GET['id'];
$sql = "Select * from `users` where id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row["id"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$address = $row["physical_address"];
$billing = $row["billing_address"];

if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $billing = $_POST['billing'];

  $sql = "update `users` set id=$id, firstname='$firstname', lastname='$lastname', physical_address='$address', billing_address='$billing' where id='$id'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header('location:index.php');
  } else {
    die(mysqli_error($con));
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Heroku Assessment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">
    <form method="POST">
      <div class="mb-3">
        <label for="firstname" class="form-label">Firstname</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>">
      </div>
      <div class="mb-3">
        <label for="lastname" class="form-label">Lastname</label>
        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Current Address</label>
        <input type="text" class="form-control" name="address" value="<?php echo $address ?>">
      </div>
      <div class="mb-3">
        <label for="billing" class="form-label">Billing Address</label>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="sameAddress">
          <label class="form-check-label" for="sameAddress">Same as current address</label>
        </div>
        <input type="text" class="form-control" name="billing" value="<?php echo $billing ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>