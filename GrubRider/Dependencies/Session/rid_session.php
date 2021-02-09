<?php

isset($_SESSION) ?: session_start();
$rid_login = isset($_SESSION["rid_email"]) ? TRUE :  FALSE;

?>