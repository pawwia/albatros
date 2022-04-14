<?php
ob_start();
session_start();

require("connect.php");

$datestart=$_GET["dstart"];
$dateend=$_GET["dstop"];
$house=$_GET["house"];

	if( (czywolne($datestart, $dateend, $house))==true)
	{
		
		
echo 0;
	}
else{	echo 1;

}
ob_end_flush();
?>