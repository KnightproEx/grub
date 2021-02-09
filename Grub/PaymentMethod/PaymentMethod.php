<?php

//enables session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}


//database object
require_once("../../Assets/PHP/db_object.php");


//decode json request
$json_data = json_decode(file_get_contents("php://input"));

class responseObj {
	public $error;
	public $errorMsg;
}
$responseObj = new responseObj();

//data variables
$email = $_SESSION["cus_email"];
$unit = $_SESSION["unit"];
$cart = json_decode($_SESSION["cart"]);
$payment = $json_data -> payment_method;
$date = date("Y-m-d");

$total = 5;
for ($i=0; $i < count($cart); $i++) {
	$item_list = $cart[$i];
	$total += ($item_list -> price * $item_list -> quantity) * 1.06;
}
$total = number_format((float) $total, 2, ".", "");

//mysql query
$query = "INSERT INTO cart ";
$query .= "(total, order_date, house_unit, cust_email, payment_id) ";
$query .= "VALUES(?, ?, ?, ?, ?);";
$paraArray = array("dssss", $total, $date, $unit, $email, $payment);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	exit();
}


//fetch cart id
$query = "SELECT cart_id ";
$query .= "FROM cart ";
$query .= "WHERE cust_email=? ";
$query .= "ORDER BY cart_id DESC ";
$query .= "LIMIT 1;";
$paraArray = array("s", $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	exit();
}

if ($db -> getRow() != 1) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = "Cart id not found!";
	exit();
}

$row = $db -> getResult() -> fetch_assoc();
$cart_id = $row["cart_id"];


//tracking query
$query = "INSERT INTO tracking ";
$query .= "(cart_id, stats_id) ";
$query .= "VALUES (?, ?);";
$paraArray = array("ss", $cart_id, "4");


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
	$responseObj -> error = TRUE;
	$responseObj -> errorMsg = $db -> getError();
	exit();
}


//cart detail queries
for ($i=0; $i < count($cart); $i++) {

	$item_list = $cart[$i];

	$quantity = $item_list -> quantity;
	$subtotal = number_format((float) ($item_list -> price * $item_list -> quantity), 2, ".", "");
	$item_id = $item_list -> id;

	//mysql query
	$query = "INSERT INTO cart_details ";
	$query .= "(cart_id, quantity, subtotal, item_id) ";
	$query .= "VALUES (?, ?, ?, ?);";
	$paraArray = array("ssds", $cart_id, $quantity, $subtotal, $item_id);


	//execute query and check for errors
	if (@!$db -> query($query, $paraArray)) {
		$responseObj -> error = TRUE;
		$responseObj -> errorMsg = $db -> getError();
		exit();
	}

}

echo $responseObj;

?>
