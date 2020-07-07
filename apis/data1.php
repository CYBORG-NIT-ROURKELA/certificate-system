<?php




  
     function get_data1()
     {

    $con = mysqli_connect("localhost", "root","","userinfo");
     $res="1";
     $app="1";
    $query = mysqli_query($con, "SELECT * FROM users WHERE request='$res'AND approval='$app'");
    
    $data = array();
  
    while ($row = mysqli_fetch_assoc($query))
   {
       
       
       

       $data[] = array( 

        'id' => $row['id'],
        'name' => $row['name'],
        'rollno' => $row['rollno'],
        'request' => $row['request']



       );

    }
   
  
 
  return  json_encode($data);
}


$file_name = 'abc1'.'.json';
if(file_put_contents($file_name, get_data1()))
{
  
}
else
{
  
}


?>
