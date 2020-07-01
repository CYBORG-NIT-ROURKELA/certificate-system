<?php

    include('db.php');
    session_start();






    if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
    { 

        
        $name=$_POST['name'];
        
        $phoneno=$_POST['phoneno'];
        $adress=$_POST['adress'];
        $rollno=$_POST['rollno'];
        $user_id = $_SESSION['user_id'];
      
$query = mysqli_query($conn, "UPDATE users SET name='$name',phoneno='$phoneno',rollno='$rollno',adress='$adress' WHERE   id ='".$user_id."'");
        

        if($query)
        {
            echo" <div class='alert alert-screen'>Data done</div>";
        }
        else
        {
            echo" <div class='alert alert-screen'>Error</div>";
        }
    }
    else
    {
        echo" <div class='alert alert-screen'>Error Again</div>";
    }



?>