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
$ssm_reg = trim($json_data -> ssmreg);
$name = trim($json_data -> name);
$coname = trim($json_data -> coname);
$description = trim($json_data -> description);
$email = trim($json_data -> email);
$contact = trim($json_data -> contact);
$address = trim($json_data -> address);
$password = $json_data -> password;


//check for empty fields
$validate = TRUE;
$ssm_reg ?? FALSE ?: $validate = FALSE;
$name ?? FALSE ?: $validate = FALSE;
$coname ?? FALSE ?: $validate = FALSE;
$description ?? FALSE ?: $validate = FALSE;
$email ?? FALSE ?: $validate = FALSE;
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


//ssm duplication check
$query = "SELECT * ";
$query .= "FROM restaurant ";
$query .= "WHERE ssm_reg=?;";
$paraArray = array("s", $ssm_reg);

if (!@$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	echo json_encode($responseObj);
	exit();
}

if ($db -> getRow() > 0) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "SSM already exists!!";
	echo json_encode($responseObj);
	exit();
}


//email duplication check
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
$path = "../../Uploads/Restaurant/" . $email . "/Profile/";
$allowed_extensions = array("jpg","jpeg","png");
$max_file_size = 50000000;

if (@!$upload -> upload_file("ssm_img", $path, "ssm_img", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$ssm_path = $upload -> getPath();

if (@!$upload -> upload_file("res_img", $path, "res_img", $allowed_extensions, $max_file_size)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $upload -> getError();
	echo json_encode($responseObj);
	exit();
}
$res_path = $upload -> getPath();


//mysql query
$query = "INSERT INTO restaurant ";
$query .= "(ssm_reg, rest_name, co_name, description, rest_email, contact, address, psswd, ssm_copy, rest_img) ";
$query .= "VALUES (?,?,?,?,?,?,?,?,?,?);";
$paraArray = array("ssssssssss", $ssm_reg, $name, $coname, $description, $email, $contact, $address, $password, $ssm_path, $res_path);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
}


//response with json encoded object
echo json_encode($responseObj);

?>