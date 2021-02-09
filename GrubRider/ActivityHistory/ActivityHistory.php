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
  public $itemlist = array();
}
$responseObj = new responseObj();


//decoded request data variables
$email = $_SESSION["rid_email"];


//mysql query
$query = "SELECT track_id, order_date, address, total ";
$query .= "FROM tracking t, cart c, cart_details d, menu m, restaurant r ";
$query .= "WHERE t.cart_id = c.cart_id ";
$query .= "AND c.cart_id = d.cart_id ";
$query .= "AND d.item_id = m.item_id ";
$query .= "AND r.ssm_reg = m.ssm_reg ";
$query .= "AND rid_email=?;";
$paraArray = array("s", $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
  $responseObj -> error = TRUE;
  $responseObj -> errorMsg = $db -> getError();
  
  echo json_encode($responseObj);
  exit();
}

$i = 0;

while ($row = $db -> getResult() -> fetch_assoc()) {

  $responseObj -> itemlist[$i] = [
    "title" => "Tracking ID : " . $row["track_id"],
    "action" => $row["order_date"],
    "location" => $row["address"],
    "paymentamount" => "RM " . $row["total"]
  ];

  $i++;
}

if ($db -> getRow() <= 0) {
  $responseObj -> itemlist[0] = ["title" => "No record found."];
}


//response with json encoded object
echo json_encode($responseObj);

?>