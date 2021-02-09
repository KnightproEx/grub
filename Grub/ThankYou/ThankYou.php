<?php


//enables session
session_start();


//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
  exit();
}


//database object
require_once("../../Assets/PHP/db_object.php");


//pre-encoded response object
class responseObj {
  public $error = FALSE;
  public $errorMsg = "";
  public $item = [];
}
$responseObj = new responseObj();


//data variables
$email = $_SESSION["cus_email"];


//mysql query
$query = "SELECT t.cart_id, order_date, p.description, r.address, house_unit, total ";
$query .= "FROM tracking t, cart c, cart_details d, payment p, restaurant r, menu m ";
$query .= "WHERE t.cart_id = c.cart_id ";
$query .= "AND c.cart_id = d.cart_id ";
$query .= "AND c.payment_id = p.payment_id ";
$query .= "AND d.item_id = m.item_id ";
$query .= "AND m.ssm_reg = r.ssm_reg ";
$query .= "AND cust_email=? ";
$query .= "ORDER BY t.track_id DESC ";
$query .= "LIMIT 1;";
$paraArray = array("s", $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
  $responseObj -> error = TRUE;
  $responseObj -> errorMsg = $db -> getError();
  
  echo json_encode($responseObj);
  exit();
}


//query result
if ($db -> getRow() < 1) {
  $responseObj -> error = TRUE;
  $responseObj -> errorMsg = "No record found.";
  echo json_encode($responseObj);
  exit();
}

$row = $db -> getResult() -> fetch_assoc();
$responseObj -> item = [
  "id" => $row["cart_id"],
  "date" => $row["order_date"],
  "unit" => $row["house_unit"],
  "address" => $row["address"],
  "payment" => $row["description"],
  "total" => $row["total"]
];


//response with json encoded object
echo json_encode($responseObj);

?>