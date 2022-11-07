<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heroku Assessment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a></button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Physical Address</th>
          <th scope="col">Billing Address</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "Select * from `users`";
        $result = mysqli_query($con, $sql);

        if ($result) {
          $row = mysqli_fetch_assoc($result);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $address = $row["physical_address"];
            $billing = $row["billing_address"];
            echo '
              <tr>
                <th scope="row">' . $id . '</th>
                <td>' . $firstname . '</td>
                <td>' . $lastname . '</td>
                <td>' . $address . '</td>
                <td>' . $billing . '</td>
                <td>
                  <button class="btn btn-primary"><a href="update.php?id=' . $id . '" class="text-light">Update</a></button>
                  <button class="btn btn-danger"><a href="delete.php?id=' . $id . '" class="text-light">Delete</a></button>
                </td>
              </tr>
            ';
          }
        }

        ?>
      </tbody>
    </table>
  </div>
</body>

</html>