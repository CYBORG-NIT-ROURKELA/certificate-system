<?php

    include('db.php');
    session_start();

function validateAdress($adress){
    if($adress==""){
        echo(json_encode(array('status'=>'failure','message'=>'adress ,city and state are required')));
    return 0;

    }
    return 1;
}

function validateName($name){
    // echo $name;
    if($name==''){
        echo(json_encode(array('status'=>'failure','message'=>' first and last name required')));
        return 0;
    }

    if(!preg_match("/^[a-zA-Z ]+$/", $name)){
    echo(json_encode(array('status'=>'failure','message'=>' name should contain letters and spaces only')));
    return  0;
    }   
    return 1;
}

function validateRoll($rollno){
    if($rollno==''){
        echo(json_encode(array('status'=>'failure','message'=>'roll number is required')));
        return 0;
    }
         if(!preg_match('/^[17]{1}\d{1}[65]{1}[a-zA-Z]{2}\d{4}/',$rollno)){

        echo(json_encode(array('status'=>'failure','message'=>'rollno should be of format 116ee0265/116EE0265')));
        return 0;
        }
    return 1;
    
}

function validatePhone($phone) {
    if ($phone == '') {

        echo(json_encode(array('status' => 'failure', 'message' => 'Phone number is required')));
        return 0;
    }
    if (!preg_match('/^[6-9][0-9]{9}$/', $phone)) {

        echo(json_encode(array('status' => 'failure', 'message' => 'Phone number should have 10 digits and should start with 6,7,8, or 9')));
        return 0;
    }
    return 1;
}






    if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
    { 

        
        $name=$_POST['name'];
        
        $phoneno=$_POST['phoneno'];
        $adress=$_POST['adress'];
        $rollno=$_POST['rollno'];
        $user_id = $_SESSION['user_id'];
        if(validateRoll($rollno) && validatePhone($phoneno) && validateAdress($adress) && validateName($name))
        {
      
        $query = mysqli_query($con, "UPDATE users SET name='$name',phoneno='$phoneno',rollno='$rollno',adress='$adress' WHERE   id ='".$user_id."'");
        if ($query)
        {
            echo(json_encode(array('status'=>'success','message' => 'Validation success')));
        }
        
        }
        

        
        
    }
    else
    {
       echo(json_encode(array('status'=>'failure','message' => 'Validation failed')));
    }



?>
