<?php

isset($_SESSION) ?: session_start();
$res_login = isset($_SESSION["res_email"]) ? TRUE :  FALSE;

?>