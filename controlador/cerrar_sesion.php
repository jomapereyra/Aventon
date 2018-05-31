<?php
	session_start();//se debe reanudar la sesion antes de destruirla
	session_destroy();
	header("location:../index.php");
?>