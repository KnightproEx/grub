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
$item_id = $json_data -> item_id;
$name = trim($json_data -> name);
$description = trim($json_data -> description);
$price = $json_data -> price;
$image = $json_data -> image;


//check for empty fields
$validate = TRUE;
$item_id ?? FALSE ?: $validate = FALSE;
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
$query = "UPDATE menu SET ";
$query .= "name=?, description=?, price=? ";
$query .= "WHERE item_id=?;";
$paraArray = array("ssss", $name, $description, $price, $item_id);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	
	echo json_encode($responseObj);
	exit();
}


if (!$image) {
	echo json_encode($responseObj);
	exit();
}


//upload files
$path = "../../Uploads/Restaurant/" . $email . "/Menu/";
$allowed_extensions = array("jpg","jpeg","png");
$max_file_size = 50000000;

if (@!$upload -> upload_file("image", $path, $item_id, $allowed_extensions, $max_file_size)) {

	//mysql query
	$query = "DELETE FROM menu ";
	$query .= "WHERE item_id=?;";
	$paraArray = array("s", $item_id);

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


//update image path query
$query = "UPDATE menu SET ";
$query .= "food_img=? ";
$query .= "WHERE item_id=?;";
$paraArray = array("ss", $image_path, $item_id);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}

//response with json encoded object
echo json_encode($responseObj);

?>