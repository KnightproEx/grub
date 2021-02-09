<?php

//deny unauthorized request
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
$email = trim($json_data -> email);
$name = trim($json_data -> name);
$contact = trim($json_data -> contact);
$address = trim($json_data -> address);
$password = $json_data -> password;


//check for empty fields
$validate = TRUE;
$email ?? FALSE ?: $validate = FALSE;
$name ?? FALSE ?: $validate = FALSE;
$contact ?? FALSE ?: $validate = FALSE;
$address ?? FALSE ?: $validate = FALSE;
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
$query .= "FROM rider, restaurant ";
$query .= "WHERE rid_email=? OR rest_email=?;";
$paraArray = array("ss", $email, $email);

if (!@$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() > 0) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Email already exist!";
	echo json_encode($responseObj);
	exit();
}


//upload files
$path = "../../Uploads/Rider/" . $email . "/Profile/";
$allowed_extensions = array("jpg","jpeg","png");
$max_file_size = 50000000;

if (@!$upload -> upload_file("selfie", $path, "selfie", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$selfie_path = $upload -> getPath();

if (@!$upload -> upload_file("license", $path, "license", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$license_path = $upload -> getPath();

if (@!$upload -> upload_file("ic", $path, "ic", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$ic_path = $upload -> getPath();


//mysql query
$query = "INSERT INTO rider ";
$query .= "(rid_email, name, contact, address, psswd, face_id, license, ic_copy) ";
$query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
$paraArray = array("ssssssss", $email, $name, $contact, $address, $password, $selfie_path, $license_path, $ic_path);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}


//response with json encoded object
echo json_encode($responseObj);

?>