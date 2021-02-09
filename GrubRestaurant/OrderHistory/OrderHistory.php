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
$email = $_SESSION["res_email"];


//mysql query
$query = "SELECT cd.item_id, m.name, SUM(quantity) sq, SUM(quantity)*price st, order_date, d.description ";
$query .= "FROM cart c, cart_details cd, menu m, restaurant r, tracking t, del_stats d ";
$query .= "WHERE c.cart_id = cd.cart_id ";
$query .= "AND cd.item_id = m.item_id ";
$query .= "AND m.ssm_reg = r.ssm_reg ";
$query .= "AND t.cart_id = c.cart_id ";
$query .= "AND t.stats_id = d.stats_id ";
$query .= "AND rest_email=? ";
$query .= "GROUP BY cd.item_id, order_date;";
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
    "itemid" => $row["item_id"],
    "name" => $row["name"],
    "quantity" => $row["sq"],
    "total" => "RM " . $row["st"],
    "orderdate" => $row["order_date"],
    "status" => $row["description"]
  ];

  $i++;
}


//response with json encoded object
echo json_encode($responseObj);

?>
