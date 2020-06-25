<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb="userinfo";

// mysql_connect($servername,$username,$password);
// mysql_select_db($mydb);

// Create connection
$conn = mysqli_connect($servername, $username, $password,$mydb);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>