<?php

//enable session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}


//database object
require_once("../../Assets/PHP/db_object.php");
require_once("../../Assets/PHP/upload.php");


//decode json request
$json_data = json_decode($_POST["data"]);


//pre-encoded response object
class responseObj {
	public $error = FALSE;
	public $errorMsg = "";
}
$responseObj = new responseObj();


//decoded request data variables
$email = $_SESSION["res_email"];
$name = trim($json_data -> name);
$description = trim($json_data -> description);
$price = $json_data -> price;


//check for empty fields
$validate = TRUE;
$name ?? FALSE ?: $validate = FALSE;
$description ?? FALSE ?: $validate = FALSE;
$price ?? FALSE ?: $validate = FALSE;


//response with errors if inputs are not valid
if (!$validate) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Field cannot be empty!";
	echo json_encode($responseObj);
	exit();
}


//mysql query
$query = "SELECT ssm_reg ";
$query .= "FROM restaurant ";
$query .= "WHERE rest_email=?;";
$paraArray = array("s", $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	
	echo json_encode($responseObj);
	exit();
}
$row = $db -> getResult() -> fetch_assoc();


//mysql query
$query = "INSERT INTO menu ";
$query .= "(ssm_reg) ";
$query .= "VALUES (?);";
$paraArray = array("s", $row["ssm_reg"]);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	
	echo json_encode($responseObj);
	exit();
}


//mysql query
$query = "SELECT item_id ";
$query .= "FROM menu ";
$query .= "WHERE ssm_reg=? ";
$query .= "ORDER BY item_id DESC ";
$query .= "LIMIT 1;";
$paraArray = array("s", $row["ssm_reg"]);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	
	echo json_encode($responseObj);
	exit();
}
$row = $db -> getResult() -> fetch_assoc();


//upload files
$path = "../../Uploads/Restaurant/" . $email . "/Menu/";
$allowed_extensions = array("jpg","jpeg","png");
$max_file_size = 50000000;

if (@!$upload -> upload_file("image", $path, $row["item_id"], $allowed_extensions, $max_file_size)) {

	//mysql query
	$query = "DELETE FROM menu ";
	$query .= "WHERE item_id=?;";
	$paraArray = array("s", $row["item_id"]);

	//execute query and check for errors
	if (@!$db -> query($query, $paraArray)) {
		$responseObj -> error = TRUE;
		$responseObj -> errorMsg = $db -> getError();
		
		echo json_encode($responseObj);
		exit();
	}

	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$image_path = $upload -> getPath();


//mysql query
$query = "UPDATE menu SET ";
$query .= "name=?, description=?, price=?, food_img=? ";
$query .= "WHERE item_id=?;";
$paraArray = array("sssss", $name, $description, $price, $image_path, $row["item_id"]);


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