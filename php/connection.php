<?php
	session_start();
	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'sog';

	$link = mysqli_connect($server ,$user ,$pass ,$db) 
	or die ("Unable to connect");
?>