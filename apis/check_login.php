<?php
include('../../db.php');

session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {

echo(json_encode(array("status"=>"success", 'result' => 'login')));

}
else
{
	echo(json_encode(array("status"=>"Try again")));
}

?>
