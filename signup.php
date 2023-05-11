<?php

session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $name = $_POST['name']; 
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if (!empty($name) && !empty($email) && !empty($pass) &&  !is_numeric($email)) {

    //checking if the username already exist first
    $query = "Select * from users where username = '$email' limit 1";
    $result = mysqli_query($con, $query);
    if ($result) {
      if ($result && mysqli_num_rows($result) == 0) {

        //SAVE TO DATABASE if the username didn't exist
        $query = "insert into users (name, email, password) values('$name', '$email', '$pass')";
        mysqli_query($con, $query);

        //just checking again if the new username exist in the database
        $query = "Select * from users where username = '$email' limit 1";
        $result = mysqli_query($con, $query);
        if ($result) {
          if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['email'] === $email) {
              $_SESSION['email'] = $user_data['email'];
              header("Location: index.php");
              die;
            }
          }
        }

      }
    }

    echo "That username already exist!!";
  } else {
    echo "Please enter some valid information!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <title>BitCoin Curency Converter: Sign Up</title>
  <style>
	    	body{
	    		text-align: center;
	    		margin-top: 20px;
				background-image: url('crypto.png');
  				background-repeat: no-repeat;
 				background-attachment: fixed;
 				background-size: cover;
	    	}
        .second-submit{
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
	    </style>
</head>

<body>
        <div       class="container">
        <div class="jumbotron">
        
        <h2>Welcome To Bitcoin Curency Converter!</h2>
          <h3>Create a new Account</h3>
          
      <form method="post">
        <input type="text" name="Name" class="input-field" placeholder="Your Name" />
        <input type="text" name="username" class="input-field" placeholder="Your New Username" />
        <input type="text" name="Password" class="input-field" placeholder="Your New Password" />
        <div class="second-submit"><input type="submit" value="Submit" /></div>
      </form>
    </div>
  </div>
</body>

</html>