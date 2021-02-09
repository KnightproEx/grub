<?php

//enable session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}


//database object
require_once("../../Assets/PHP/db_object.php");


//decode json request
$json_data = json_decode(file_get_contents("php://input"));


//pre-encoded response object
class responseObj {
	public $error = FALSE;
	public $errorMsg = "";
	public $login = FALSE;
}
$responseObj = new responseObj();


//decoded request data variables
$email = $_SESSION["cus_email"];
$oldpass = $json_data -> oldpass;
$newpass = $json_data -> newpass;


//old password verification
$query = "SELECT * ";
$query .= "FROM customer ";
$query .= "WHERE cust_email=? AND psswd=?;";
$paraArray = array("ss", $email, $oldpass);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();

	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() != 1) {
	echo json_encode($responseObj);
	exit();
}


//update response object
$responseObj -> login = TRUE;


//validate new password
if ($newpass == "") {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Password cannot be empty!";

	echo json_encode($responseObj);
	exit();
}


//update password query
$query = "UPDATE customer SET ";
$query .= "psswd=? ";
$query .= "WHERE cust_email=?;";
$paraArray = array("ss", $newpass, $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	
	echo json_encode($responseObj);
	exit();
}


//response with json encoded object
echo json_encode($responseObj);

?>