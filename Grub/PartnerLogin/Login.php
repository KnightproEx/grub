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
	public $page = "";
}
$responseObj = new responseObj();


//decoded request data variables
$email = trim($json_data -> email);
$password = $json_data -> password;


//restaurant query
$query = "SELECT rest_email ";
$query .= "FROM restaurant ";
$query .= "WHERE rest_email=? AND psswd=?;";
$paraArray = array("ss", $email, $password);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();

	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() == 1) {
	$row = $db -> getResult() -> fetch_assoc();

	session_start();
	$_SESSION["res_email"] = $row["rest_email"];

	setcookie("part_email", $row["rest_email"], time() + 7200, "/");

	$responseObj -> page = "../../GrubRestaurant/OrderHistory/OrderHistoryPage.php";
	$responseObj -> login = TRUE;

	echo json_encode($responseObj);
	exit();
}


//rider query
$query = "SELECT rid_email ";
$query .= "FROM rider ";
$query .= "WHERE rid_email=? AND psswd=?;";
$paraArray = array("ss", $email, $password);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();

	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() == 1) {
	$row = $db -> getResult() -> fetch_assoc();

	session_start();
	$_SESSION["rid_email"] = $row["rid_email"];

	setcookie("part_email", $row["rid_email"], time() + 7200, "/");

	$responseObj -> page = "../../GrubRider/ActivityHistory/ActivityHistoryPage.php";
	$responseObj -> login = TRUE;

	echo json_encode($responseObj);
	exit();
}


//response with json encoded object
echo json_encode($responseObj);

?>