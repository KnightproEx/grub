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
  public $id = "";
  public $date = "";
  public $step = "";
}
$responseObj = new responseObj();


//data variables
$email = $_SESSION["cus_email"];


//mysql query
$query = "SELECT t.track_id, order_date, stats_id ";
$query .= "FROM tracking t, cart c ";
$query .= "WHERE t.cart_id = c.cart_id ";
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
$responseObj -> id = $row["track_id"];
$responseObj -> date = $row["order_date"];
$responseObj -> step = $row["stats_id"];


//response with json encoded object
echo json_encode($responseObj);

?>