<?php

//database object
require_once("../../Assets/PHP/db_object.php");


//user data
$rid_email = "";
$rid_name = "";
$rid_contact = "";
$rid_address = "";


//fetch user data
if(isset($_SESSION["rid_email"]) && $rid_login) {

	$query = "SELECT rid_email, name, contact, address ";
	$query .= "FROM rider ";
	$query .= "WHERE rid_email=?;";
	$paraArray = array("s", $_SESSION["rid_email"]);

	if (@!$db -> query($query, $paraArray)) {
		echo $db -> getError();
		exit();
	}

	if ($db -> getRow() == 1) {
		$result = $db -> getResult();
		$row = $result -> fetch_assoc();

		$rid_email = $row["rid_email"];
		$rid_name = $row["name"];
		$rid_contact = $row["contact"];
		$rid_address = $row["address"];
	}

}

?>