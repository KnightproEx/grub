<?php

//enables session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}


//database object
require_once("../../Assets/PHP/db_object.php");


//decode json request
$json_data = json_decode(file_get_contents("php://input"));


//data variables
$unit = $json_data -> unit;


//set session
$_SESSION["unit"] = $unit;


?>