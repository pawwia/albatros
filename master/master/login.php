<?php
require("connect.php");
session_start();
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];
if ($_POST["user"]&&$_POST["pass"])
{
	
if (($_POST["user"]==$masteruser)&&($_POST["pass"]=="xxx"))	
{
	$_SESSION["logged"]=$_POST["user"];
header("Location:../master.php");
	
	
}
	
}

?>