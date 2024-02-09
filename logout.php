<?php
session_start();
include("lock.php");
if(isset($_SESSION['login'])){
	unset($_SESSION['login']);
	
	if(!isset($_SESSION['login']))
	{
		header("location:index.php");
	}
	
}

?>