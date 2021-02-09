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
$location = $_SESSION["loc"];


//mysql query
$query = "SELECT rest_email, rest_name, description, rest_img ";
$query .= "FROM restaurant ";
$query .= "WHERE ssm_reg IN (SELECT ssm_reg FROM menu) ";
$query .= "AND address=?;";
$paraArray = array("s", $location);


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
    "email" => $row["rest_email"],
    "name" => $row["rest_name"],
    "description" => $row["description"],
    "image" => $row["rest_img"]
  ];

  $i++;
}

if ($db -> getRow() <= 0) {
  $responseObj -> invalid = TRUE;
  unset($_SESSION["loc"]);
}


//response with json encoded object
echo json_encode($responseObj);

?>