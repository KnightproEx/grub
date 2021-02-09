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
$query = "SELECT item_id, name, m.description, price, food_img ";
$query .= "FROM restaurant r, menu m ";
$query .= "WHERE r.ssm_reg = m.ssm_reg ";
$query .= "AND rest_email=?;";
$paraArray = array("s", $email);


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
  $responseObj -> error = TRUE;
  $responseObj -> errorMsg = $db -> getError();
  
  echo json_encode($responseObj);
  exit();
}


//if no result then exit
if ($db -> getRow() <= 0) {
  echo json_encode($responseObj);
  exit();
}


$i = 0;

while ($row = $db -> getResult() -> fetch_assoc()) {

  $responseObj -> itemlist[$i] = [
    "item_id" => $row["item_id"],
    "title" => $row["name"],
    "description" => $row["description"],
    "price" => $row["price"],
    "src" => $row["food_img"],
    "index" => $i
  ];

  $i++;
}


//response with json encoded object
echo json_encode($responseObj);

?>