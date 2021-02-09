<?php


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


//mysql query
$query = "SELECT DISTINCT address ";
$query .= "FROM restaurant ";
$query .= "WHERE rest_email != ?;";
$paraArray = array("s","");


//execute query and check for errors
if (@!$db -> query($query, $paraArray)) {
  $responseObj -> error = TRUE;
  $responseObj -> errorMsg = $db -> getError();
  
  echo json_encode($responseObj);
  exit();
}

$i = 0;

while ($row = $db -> getResult() -> fetch_assoc()) {

  $responseObj -> itemlist[$i] = $row["address"];

  $i++;
}


//response with json encoded object
echo json_encode($responseObj);

?>