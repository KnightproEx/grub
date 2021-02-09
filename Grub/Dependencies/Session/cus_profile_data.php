<?php

//database object
require_once("../../Assets/PHP/db_object.php");


//user data
$cus_email = "";
$cus_name = "";
$cus_contact = "";


//fetch user data
if(isset($_SESSION["cus_email"]) && $cus_login) {

	$query = "SELECT cust_email, name, contact ";
	$query .= "FROM customer ";
	$query .= "WHERE cust_email=?;";
	$paraArray = array("s", $_SESSION["cus_email"]);

	if (@!$db -> query($query, $paraArray)) {
		echo $db -> getError();
		exit();
	}

	if ($db -> getRow() == 1) {
		$result = $db -> getResult();
		$row = $result -> fetch_assoc();

		$cus_email = $row["cust_email"];
		$cus_name = $row["name"];
		$cus_contact = $row["contact"];
	}

}

?>