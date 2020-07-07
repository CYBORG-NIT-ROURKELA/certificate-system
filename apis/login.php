<?php
session_start();
include 'db.php';
include 'data.php';
include 'data1.php';
// echo $email;
if($_SERVER["REQUEST_METHOD"] === "POST" ){

    $loginEmail=$_POST['loginEmail'];
    $loginPassword=$_POST['loginPassword'];

  	  if(!empty($loginEmail) && !empty($loginPassword))
   	 {
		  $loginPassword=hash('sha512', $loginPassword);

       		 $query1 ="SELECT * FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
       		 $query1_run=mysqli_query($con,$query1);
		        if(mysqli_num_rows($query1_run)==1)
       		 { 
                  $query_row = mysqli_fetch_array($query1_run,MYSQLI_ASSOC);
                  $_SESSION['logged_in'] = 1;
                  $_SESSION['name'] = $query_row['name'];
                  $_SESSION['user_id']=$query_row['id'];
                  $_SESSION['Email']=$query_row['email'];
                  $user_id = $_SESSION['user_id'];
                  
                  if(($user_id=="1") || ($user_id=="2") || ($user_id=="3"))
                  {
                   
                    echo(json_encode(array('status'=>'success1')));
                    }
                  else
                  {
                    echo(json_encode(array('status'=>'success')));
                  }

                  
            }
       		   else
       		   {
       	 	      echo(json_encode(array('status'=>'failure','message' => 'Wrong password  or unregistered email')));
     	 	    }
     	  } 
	    else
	    {
	    
         echo(json_encode(array('status'=>'failure','message' => 'Please fill out all the fields')));
   	 	   
             }
        
      }
      else
      {
      echo(json_encode(array('status'=>'failure','message' => 'Not a post request')));
      }

	mysqli_close($con);
	?>
