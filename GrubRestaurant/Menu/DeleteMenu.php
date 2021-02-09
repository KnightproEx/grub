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
}
$responseObj = new responseObj();


//decoded request data variables
$item_id = $json_data -> item_id;


//mysql query
$query = "DELETE FROM menu ";
$query .= "WHERE item_id=?;";
$paraArray = array("s", $item_id);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}


//response with json encoded object
echo json_encode($responseObj);

?>