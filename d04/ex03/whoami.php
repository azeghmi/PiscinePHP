<?php
session_start();
if ($_SESSION['loggued_on_user'])
	echo $_SESSION['loggued_on_user']."\n";
else if ($_SESSION['loggued_on_user'] === "")
	echo "ERROR\n";
else
	echo "ERROR\n";


?>