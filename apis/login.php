<?php
session_start();
include 'db.php';
$loginEmail=$_POST['loginEmail'];
$loginPassword=$_POST['loginPassword'];
// echo $email;
if($_SERVER["REQUEST_METHOD"] === "POST" ){
  	  if(!empty($loginEmail) && !empty($loginPassword))
   	 {
		  $loginPassword=hash('sha512', $loginPassword);

       		 $query1 ="SELECT * FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
       		 $query1_run=mysqli_query($conn,$query1);
		if(mysqli_num_rows($query1_run)>0)
       		 { 
                  $_SESSION['name'] = $query_row['name'];
                  $_SESSION['Email']=$query_row['email'];
                  echo(json_encode(array('status'=>'success','message'=>$_SESSION['name'])));
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

	mysqli_close($conn);
	?>
