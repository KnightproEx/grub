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
}
$responseObj = new responseObj();


//decoded request data variables
$email = $_SESSION["rid_email"];
$name = trim($json_data -> name);
$contact = trim($json_data -> contact);


//check for empty fields
$validate = TRUE;
$name ?? FALSE ?: $validate = FALSE;
$contact ?? FALSE ?: $validate = FALSE;


//response with errors if inputs are not valid
if (!$validate) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Fields cannot be empty!";
	echo json_encode($responseObj);
	exit();
}


//mysql query
$query = "UPDATE rider SET ";
$query .= "name=?, contact=? ";
$query .= "WHERE rid_email=?;";
$paraArray = array("sss", $name, $contact, $email);


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