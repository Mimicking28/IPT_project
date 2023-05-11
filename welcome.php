<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>  
        <title>Bitcoin Currency Converter</title>
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
	    	}
            #button{
                font-family: 'Galindo', ;
                padding: 10px 20px;
                border: solid;
                border-radius: 10px;
                cursor: pointer;
                margin-left: 20px;
                margin-right: 20px;
}
	    </style>
		
</head>

<body>
    <div class="container"> 
    <div class="jumbotron">
    <h2> Bitcoin Currency Converter </h2>
    <h2 class="first-h">Do you have an existing account? </h2>
    <div class="buttons">
        <a href="login.php"><button id="button">Yes</button></a>
        <a href="signup.php"><button id="button">No</button></a>
    </div>

</body>

</html>