


<?php

include('../../db.php');
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 1)
{
$id = $_SESSION['id'];
$basicInfo=[];
$query = mysqli_query($conn,  "SELECT id FROM userinfo where id ='".$id."'");
if (mysqli_num_rows($query) == 0) 
{
return json_encode(array('status' => 'failure', 'result' => 'id not found'));
}
else
{

$basicInfo = mysqli_fetch_array($query,MYSQLI_ASSOC); 

echo json_encode(array('status' => 'success'));
echo json_encode(array($data));

}

}
else
{
    echo(json_encode(array("status"=>"failure")));
}

?>
