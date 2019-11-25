<?php
$conn = new mysqli("localhost", "root", "rootroot", "f_minishop");
// Check connection
if ($conn->connect_error)
	die("Connection failed: " . $conn->connect_error);
?>
