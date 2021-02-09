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
$email = $_SESSION["cus_email"];


//mysql query
$query = "SELECT m.name, rest_name, m.description, quantity, total, order_date ";
$query .= "FROM customer cu, cart c, cart_details d, menu m, restaurant r ";
$query .= "WHERE cu.cust_email = c.cust_email ";
$query .= "AND c.cart_id = d.cart_id ";
$query .= "AND m.item_id = d.item_id ";
$query .= "AND r.ssm_reg = m.ssm_reg ";
$query .= "AND cu.cust_email=? ";
$query .= "ORDER BY c.cart_id DESC;";
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
    "name" => $row["name"],
    "res_name" => $row["rest_name"],
    "description" => $row["description"],
    "quantity" => "(" . $row["quantity"] . ")",
    "price" => "RM" . $row["total"],
    "date" => $row["order_date"]
  ];

  $i++;
}

if ($db -> getRow() <= 0) {
  $responseObj -> itemlist[0] = [
    "name" => "No record found.",
    "quantity" => ""
  ];
}


//response with json encoded object
echo json_encode($responseObj);

?>
