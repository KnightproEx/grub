<?php

//database object
require_once("../../Assets/PHP/db_object.php");


//user data
$res_email = "";
$res_name = "";
$res_coname = "";
$res_contact = "";
$res_desc = "";
$res_address = "";


//fetch user data
if(isset($_SESSION["res_email"]) && $res_login) {

	$query = "SELECT rest_email, rest_name, co_name, contact, description, address, rest_img ";
	$query .= "FROM restaurant ";
	$query .= "WHERE rest_email=?;";
	$paraArray = array("s", $_SESSION["res_email"]);

	if (@$db -> query($query, $paraArray)) {

		if ($db -> getRow() == 1) {
			$result = $db -> getResult();
			$row = $result -> fetch_assoc();

			$res_email = $row["rest_email"];
			$res_name = $row["rest_name"];
			$res_coname = $row["co_name"];
			$res_contact = $row["contact"];
			$res_desc = $row["description"];
			$res_address = $row["address"];
			$res_img = $row["rest_img"];
		}

	} else {
		echo $db -> getError();
		exit();
	}

}

?>