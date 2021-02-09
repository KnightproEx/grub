<?php

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
$email = trim($json_data -> login);
$password = $json_data -> password;


//mysql query
$query = "SELECT cust_email ";
$query .= "FROM customer ";
$query .= "WHERE cust_email=? AND psswd=?;";
$paraArray = array("ss", $email, $password);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}

if ($db -> getRow() == 1) {
	$row = $db -> getResult() -> fetch_assoc();

	session_start();
	$_SESSION["cus_email"] = $row["cust_email"];

	setcookie("cus_email", $row["cust_email"], time() + 7200, "/");

	$responseObj -> login = TRUE;
}


//response with json encoded object
echo json_encode($responseObj);

?>