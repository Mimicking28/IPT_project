<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $username = $_POST['username'];

  if (!empty($username) && !is_numeric($username)) {

    //READ  DATABASE
    $query = "Select * from users where username = '$username' limit 1";

    $result = mysqli_query($con, $query);
    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['username'] === $username) {
          $_SESSION['username'] = $user_data['username'];
          header("Location: index.php");
          die;
        }
      }
    }
    echo "Invalid, that meowsername doesn't exist!!";
  } else {
    echo "Please enter some valid information!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
      <style>
        body{
            text-align: center;
            margin-top: 20px;
            background-image: url('crypto.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
          .second-submit{
              display: flex;
              justify-content: center;
              margin-top: 20px;
            }
        }
      </style>
      <title>Bitcoin Currency Converter</title>
</head>

<body>
  <div class="container">
  <div class="jumbotron">
      <h2>Log in your account!</h2>
      
      <form method="post">
        <input type="text" name="email" class="input-field" />
        <input type="text" name="password" class="input-field" />
        <div class="second-submit"><input type="submit" value="Submit" /></div>
      </form>
    </div>
  </div>
</body>

</html>