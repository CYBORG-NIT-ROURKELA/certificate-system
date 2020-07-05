<?php
include('db.php');
    session_start();
 if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
    { 

    	$user_id =$_POST['id'];
    	$app="1";

    	$query = mysqli_query($conn, "UPDATE users SET approval='$app' WHERE  id ='".$user_id."'");

    	 if ($query)
        {
            echo(json_encode(array('status'=>'success','message' => 'Approved')));
        }
        else
        {
        	echo(json_encode(array('status'=>'failure','message' => 'Cannot be approved currently')));
        }
    }
    ?>