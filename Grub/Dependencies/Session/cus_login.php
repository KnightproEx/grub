<?php

if (!$cus_login) {
	session_destroy();
	header("Location: ../Home/HomePage.php");
}

?>