<?php
require "config/config.php";
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");

if(isset($_SESSION["username"])){

    $userLoggedIn = $_SESSION["username"];
    $userInfo = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
    $user = mysqli_fetch_array($userInfo);
 
}
else{
    header("Location: register.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNECTOR</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>

    <!-- css -->
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css">
	
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>

</head>

<body>
    <div class="top_bar">
        <div class="logo">
            <a href="index.php"><span>C</span>onnector</a>
        </div>
        <!-- Navigation bar -->
        <nav>
            <a href="<?php echo $userLoggedIn?>">
               <?php 
                 echo $user['first_name'];
               ?>
            </a>
            <a href="index.php">
                <i class="fa fa-home fa-lg" aria-hidden="true"></i>
            </a>
            <a href="javascript:void(0)" onclick="getDropdownData(<?php echo $userLoggedIn; ?>, 'message')">
                <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-bell-o fa-lg" aria-hidden="true"></i>
            </a>
            <a href="requests.php">
                <i class="fa fa-users fa-lg" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
            </a>
            <a href="includes/handlers/logout.php">
                <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>
            </a>

        </nav>

        <div class="dropdown_data_window"></div>
        <input type="hidden" id="dropdown_data_type" value="">
</div>

<div class="wrapper">

