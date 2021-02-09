<?php

if(!$res_login) {
	session_destroy();
	header("Location: ../../Grub/PartnerLogin/LoginPage.php");
}

?>