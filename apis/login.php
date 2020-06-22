<?php
session_start();
include 'db.php';
$loginEmail=$_POST['loginEmail'];
$loginPassword=$_POST['loginPassword'];
// echo $email;
    if(!empty($loginEmail) && !empty($loginPassword))
    {

		

        $query1 ="SELECT * FROM users WHERE email='$loginEmail'";
        $query1_run=mysqli_query($conn,$query1);
	if(mysqli_num_rows($query1_run)>0)
        {  
	      $loginPassword=hash('sha512', $loginPassword);
              $query2 ="SELECT * FROM users WHERE password='$loginPassword'";
              $query2_run=mysqli_query($conn,$query2);
              $query_row=mysqli_fetch_array($query2_run);
              if(mysqli_num_rows($query2_run)>0)
                {  
                  $_SESSION['name'] = $query_row['name'];
                  $_SESSION['Email']=$query_row['email'];
                  echo(json_encode(array('status'=>'success','message'=>$_SESSION['name'])));
                 }
       		   else
       		   {
       	 	      echo(json_encode(array('status'=>'failure','message' => 'Wrong password')));
     	 	    }
     	  } 
	    else
	    {
   	 	    echo(json_encode(array('status'=>'failure','message' => 'Unregistered email')));
             }
        
      }
      else
      {
         echo(json_encode(array('status'=>'failure','message' => 'Please fill out all the fields')));
      }

	mysqli_close($conn);
	?>
