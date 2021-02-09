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
$name = trim($json_data -> resname);
$description = trim($json_data -> description);
$contact = trim($json_data -> contact);
$address = trim($json_data -> address);
$image = $json_data -> image;


//check for empty fields
$validate = TRUE;
$name ?? FALSE ?: $validate = FALSE;
$description ?? FALSE ?: $validate = FALSE;
$contact ?? FALSE ?: $validate = FALSE;
$address ?? FALSE ?: $validate = FALSE;


//response with errors if inputs are not valid
if (!$validate) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Field cannot be empty!";
	echo json_encode($responseObj);
	exit();
}

//upload image
$path = "../../Uploads/Restaurant/" . $email . "/Profile/";
$allowed_extensions = array("jpg","jpeg","png");
$max_file_size = 50000000;

if (@!$upload -> upload_file("image", $path, "res_img", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$image_path = $upload -> getPath();


//mysql query
$query = "UPDATE restaurant SET ";
$query .= "rest_name=?, description=?, contact=?, address=?, rest_img=? ";
$query .= "WHERE rest_email=?;";
$paraArray = array("ssssss", $name, $description, $contact, $address, $image_path, $email);


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
