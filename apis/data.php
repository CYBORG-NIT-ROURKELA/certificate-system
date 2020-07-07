<?php




  
     function get_data()
     {

    $con = mysqli_connect("localhost", "root","","userinfo");
     $res="1";
     $app="0";
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


$file_name = 'abc'.'.json';
if(file_put_contents($file_name, get_data()))
{
  
}
else
{
  
}


?>
