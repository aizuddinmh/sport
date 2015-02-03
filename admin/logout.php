<?php
session_start();

function returnheader($location){
	$returnheader = header("location: $location");
	return $returnheader;
}
session_destroy();
returnheader("../index.php");
?>