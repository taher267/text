<?php
require_once("connect.php");

	if(isset($_COOKIE["comMer"])){
		setcookie("comMer","",time()-(86400*50));
		header("location:login.php?logout");
	}else{
		header("location:login.php?logout");
	}







