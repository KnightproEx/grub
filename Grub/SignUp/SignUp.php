<?php

//deny unauthorized request
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
$email = trim($json_data -> email);
$name = trim($json_data -> name);
$contact = trim($json_data -> contact);
$password = $json_data -> password;


//check for empty fields
$validate = TRUE;
$email ?? FALSE ?: $validate = FALSE;
$name ?? FALSE ?: $validate = FALSE;
$contact ?? FALSE ?: $validate = FALSE;
$password ?? FALSE ?: $validate = FALSE;


//response with errors if inputs are not valid
if (!$validate) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Please fill all the fields!";
	echo json_encode($responseObj);
	exit();
}


//email duplication checks
$query = "SELECT * ";
$query .= "FROM customer ";
$query .= "WHERE cust_email=?;";
$paraArray = array("s", $email);

if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() == 1) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Email already exist!";
	echo json_encode($responseObj);
	exit();
}


//mysql query
$query = "INSERT INTO customer ";
$query .= "(cust_email, name, contact, psswd) ";
$query .= "VALUES (?, ?, ?, ?);";
$paraArray = array("ssss", $email, $name, $contact, $password);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}


//response with json encoded object
echo json_encode($responseObj);

?>