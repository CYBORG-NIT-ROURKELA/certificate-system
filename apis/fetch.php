<?php  
 //fetch.php  
 include('db.php');
    session_start();
 
	if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
    {  
 	$user_id = $_SESSION['user_id'];
      $query = "SELECT * FROM users WHERE id = '".$user_id."'"; 

      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>