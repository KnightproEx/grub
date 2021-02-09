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
  public $invalid = FALSE;
  public $itemlist = array();
}
$responseObj = new responseObj();


//decoded request data variables
$res_email = $_SESSION["res"];


//mysql query
$query = "SELECT item_id, name, m.description, price, food_img ";
$query .= "FROM restaurant r, menu m ";
$query .= "WHERE r.ssm_reg = m.ssm_reg ";
$query .= "AND rest_email=?;";
$paraArray = array("s", $res_email);


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
    "id" => $row["item_id"],
    "name" => $row["name"],
    "description" => $row["description"],
    "price" => $row["price"],
    "image" => $row["food_img"]
  ];

  $i++;
}

if ($db -> getRow() <= 0) {
  $responseObj -> invalid = TRUE;
  unset($_SESSION["res"]);
}


//response with json encoded object
echo json_encode($responseObj);

?>