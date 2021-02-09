<?php

//only accepts post requests
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
	exit();
}

//enable session
session_start();

//unset session
unset($_SESSION["unit"]);

?>