<?php

if(!$rid_login) {
	session_destroy();
	header("Location: ../../Grub/PartnerLogin/LoginPage.php");
}

?>