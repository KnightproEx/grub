<?php

//enable session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}


//decode json request
$json_data = json_decode(file_get_contents("php://input"));


//set session
$_SESSION["cart"] = json_encode($json_data -> cart);


//unset session if empty
if (!$json_data -> cart) {
	unset($_SESSION["cart"]);
}

?>