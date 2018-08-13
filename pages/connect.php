<?php


$conn = new mysqli("localhost", "encoder", "encoder", "school");

session_start();
if(!isset( $_SESSION['User_LoggedIn'])){
	header("Location:login.html");
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



?>
<!--justin lo--> 