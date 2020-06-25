<?php

    include('db.php');
    session_start();
	

    if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
    { 
    if($_SESSION['user_id']!=0) {
        try 
        {
                $user_id = $_SESSION['user_id'];
                $basicInfo=[];
                //basicInfo
                $query = mysqli_query($conn, "SELECT * FROM users where id ='".$user_id."'");
                if (mysqli_num_rows($query) == 0) {
                    return json_encode(array('status' => 'failure', 'result' => 'user_id not found'));
                } else {
                    $basicInfo = mysqli_fetch_array($query,MYSQLI_ASSOC);           
                }
 
                echo json_encode(array('status' => 'success', 'result' => $basicInfo));

        }
        catch(Exception $e) 
        {
            echo json_encode(array('status' => 'failure', 'result' => $e->getMessage()));
        }
        
	}
    else
    {
       echo json_encode(array('status' => 'failure', 'result' => 'incorrect user_id'));
    }
}
else
{
    echo json_encode(array('status' => 'failure', 'result' => 'not logged in'));
}

?>